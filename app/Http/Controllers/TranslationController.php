<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\File;

class TranslationController extends Controller
{
    /**
     * Get the lang directory path.
     */
    protected function getLangPath(): string
    {
        return lang_path();
    }

    /**
     * Display a listing of translations.
     */
    public function index()
    {
        return view('backend.cms.translations.index');
    }

    /**
     * Get translations data for DataTable.
     */
    public function data(Request $request): JsonResponse
    {
        $translations = $this->getAllTranslations();
        
        // Get filter values
        $filterLocale = $request->input('filterLocale');
        $filterFile = $request->input('filterFile');
        
        // Flatten translations into a searchable array
        $flattenedData = [];
        foreach ($translations as $locale => $files) {
            // Filter by locale if specified
            if (!empty($filterLocale) && $locale !== $filterLocale) {
                continue;
            }
            
            foreach ($files as $file => $keys) {
                // Filter by file if specified
                if (!empty($filterFile) && $file !== $filterFile) {
                    continue;
                }
                
                foreach ($keys as $key => $value) {
                    $flattenedData[] = [
                        'id' => base64_encode("{$locale}|{$file}|{$key}"),
                        'locale' => $locale,
                        'file' => $file,
                        'key' => $key,
                        'value' => is_array($value) ? json_encode($value) : $value,
                        'file_path' => "{$locale}/{$file}.php",
                    ];
                }
            }
        }

        // Get total before search filtering
        $totalRecords = count($flattenedData);

        // Search
        if ($request->has('search') && !empty($request->search['value'])) {
            $search = strtolower($request->search['value']);
            $flattenedData = array_filter($flattenedData, function ($item) use ($search) {
                return str_contains(strtolower($item['key']), $search) ||
                       str_contains(strtolower($item['value']), $search) ||
                       str_contains(strtolower($item['file']), $search) ||
                       str_contains(strtolower($item['locale']), $search);
            });
        }

        $filteredRecords = count($flattenedData);

        // Ordering
        if ($request->has('order')) {
            $columnIndex = $request->order[0]['column'];
            $columnName = $request->columns[$columnIndex]['data'] ?? 'key';
            $columnDirection = $request->order[0]['dir'];
            
            usort($flattenedData, function ($a, $b) use ($columnName, $columnDirection) {
                $compare = strcmp($a[$columnName] ?? '', $b[$columnName] ?? '');
                return $columnDirection === 'asc' ? $compare : -$compare;
            });
        }

        // Pagination
        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $pagedData = array_slice(array_values($flattenedData), $start, $length);

        return response()->json([
            'draw' => intval($request->draw),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $filteredRecords,
            'data' => $pagedData,
        ]);
    }

    /**
     * Get all translations from all files (PHP and JSON).
     */
    protected function getAllTranslations(): array
    {
        $langPath = $this->getLangPath();
        $translations = [];

        if (!File::exists($langPath)) {
            File::makeDirectory($langPath, 0755, true);
        }

        // Get PHP translations from locale directories
        $locales = File::directories($langPath);
        foreach ($locales as $localePath) {
            $locale = basename($localePath);
            $translations[$locale] = [];

            $files = File::files($localePath);
            foreach ($files as $file) {
                if ($file->getExtension() === 'php') {
                    $fileName = $file->getFilenameWithoutExtension();
                    $content = include $file->getPathname();
                    if (is_array($content)) {
                        $translations[$locale][$fileName] = $this->flattenArray($content);
                    }
                }
            }
        }

        // Get JSON translations (lang/en.json, lang/ar.json, etc.)
        $jsonFiles = File::files($langPath);
        foreach ($jsonFiles as $file) {
            if ($file->getExtension() === 'json') {
                $locale = $file->getFilenameWithoutExtension();
                $content = json_decode(File::get($file->getPathname()), true);
                if (is_array($content)) {
                    if (!isset($translations[$locale])) {
                        $translations[$locale] = [];
                    }
                    $translations[$locale]['_json'] = $content;
                }
            }
        }

        return $translations;
    }

    /**
     * Flatten nested array with dot notation.
     */
    protected function flattenArray(array $array, string $prefix = ''): array
    {
        $result = [];
        foreach ($array as $key => $value) {
            $newKey = $prefix ? "{$prefix}.{$key}" : $key;
            if (is_array($value)) {
                $result = array_merge($result, $this->flattenArray($value, $newKey));
            } else {
                $result[$newKey] = $value;
            }
        }
        return $result;
    }

    /**
     * Show the form for creating a new translation.
     */
    public function create()
    {
        $locales = $this->getAvailableLocales();
        $files = $this->getAvailableFiles();
        return view('backend.cms.translations.create', compact('locales', 'files'));
    }

    /**
     * Store a newly created translation.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'locale' => 'required|string|max:10',
            'file' => 'required|string|max:255',
            'key' => 'required|string|max:255',
            'value' => 'required|string',
        ]);

        $locale = $validated['locale'];
        $file = $validated['file'];
        $key = $validated['key'];
        $value = $validated['value'];

        // Handle JSON file (_json)
        if ($file === '_json') {
            $filePath = $this->getLangPath() . "/{$locale}.json";
            
            $translations = [];
            if (File::exists($filePath)) {
                $translations = json_decode(File::get($filePath), true) ?? [];
            }

            $translations[$key] = $value;
            
            File::put($filePath, json_encode($translations, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        } else {
            // Handle PHP file
            $file = preg_replace('/[^a-zA-Z0-9_-]/', '', $file);
            $filePath = $this->getLangPath() . "/{$locale}/{$file}.php";
            
            // Create locale directory if it doesn't exist
            $localeDir = $this->getLangPath() . "/{$locale}";
            if (!File::exists($localeDir)) {
                File::makeDirectory($localeDir, 0755, true);
            }

            // Load existing translations or create new array
            $translations = [];
            if (File::exists($filePath)) {
                $translations = include $filePath;
            }

            // Set the translation using dot notation
            $this->setNestedValue($translations, $key, $value);

            // Save the file
            $this->saveTranslationFile($filePath, $translations);
        }

        return response()->json([
            'success' => true,
            'message' => __('Translation added successfully'),
        ]);
    }

    /**
     * Show the form for editing a translation.
     */
    public function edit(string $id)
    {
        $decoded = base64_decode($id);
        [$locale, $file, $key] = explode('|', $decoded, 3);

        $filePath = $this->getLangPath() . "/{$locale}/{$file}.php";
        $translations = File::exists($filePath) ? include $filePath : [];
        
        $value = $this->getNestedValue($translations, $key);

        $locales = $this->getAvailableLocales();
        $files = $this->getAvailableFiles();

        return view('backend.cms.translations.edit', compact('id', 'locale', 'file', 'key', 'value', 'locales', 'files'));
    }

    /**
     * Update the specified translation.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $validated = $request->validate([
            'locale' => 'required|string|max:10',
            'file' => 'required|string|max:255',
            'key' => 'required|string|max:255',
            'value' => 'required|string',
        ]);

        // Decode original ID
        $decoded = base64_decode($id);
        [$oldLocale, $oldFile, $oldKey] = explode('|', $decoded, 3);

        $newLocale = $validated['locale'];
        $newFile = $validated['file'];
        $newKey = $validated['key'];
        $newValue = $validated['value'];

        // If location changed, remove from old file
        if ($oldLocale !== $newLocale || $oldFile !== $newFile || $oldKey !== $newKey) {
            if ($oldFile === '_json') {
                $oldFilePath = $this->getLangPath() . "/{$oldLocale}.json";
                if (File::exists($oldFilePath)) {
                    $oldTranslations = json_decode(File::get($oldFilePath), true) ?? [];
                    unset($oldTranslations[$oldKey]);
                    File::put($oldFilePath, json_encode($oldTranslations, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                }
            } else {
                $oldFilePath = $this->getLangPath() . "/{$oldLocale}/{$oldFile}.php";
                if (File::exists($oldFilePath)) {
                    $oldTranslations = include $oldFilePath;
                    $this->removeNestedValue($oldTranslations, $oldKey);
                    $this->saveTranslationFile($oldFilePath, $oldTranslations);
                }
            }
        }

        // Add/Update in new location
        if ($newFile === '_json') {
            $newFilePath = $this->getLangPath() . "/{$newLocale}.json";
            
            $translations = [];
            if (File::exists($newFilePath)) {
                $translations = json_decode(File::get($newFilePath), true) ?? [];
            }

            $translations[$newKey] = $newValue;
            File::put($newFilePath, json_encode($translations, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        } else {
            $newFile = preg_replace('/[^a-zA-Z0-9_-]/', '', $newFile);
            $newFilePath = $this->getLangPath() . "/{$newLocale}/{$newFile}.php";
            
            // Create locale directory if it doesn't exist
            $localeDir = $this->getLangPath() . "/{$newLocale}";
            if (!File::exists($localeDir)) {
                File::makeDirectory($localeDir, 0755, true);
            }

            $translations = [];
            if (File::exists($newFilePath)) {
                $translations = include $newFilePath;
            }

            $this->setNestedValue($translations, $newKey, $newValue);
            $this->saveTranslationFile($newFilePath, $translations);
        }

        return response()->json([
            'success' => true,
            'message' => __('Translation updated successfully'),
        ]);
    }

    /**
     * Remove the specified translation.
     */
    public function destroy(string $id): JsonResponse
    {
        $decoded = base64_decode($id);
        [$locale, $file, $key] = explode('|', $decoded, 3);

        if ($file === '_json') {
            $filePath = $this->getLangPath() . "/{$locale}.json";
            if (File::exists($filePath)) {
                $translations = json_decode(File::get($filePath), true) ?? [];
                unset($translations[$key]);
                File::put($filePath, json_encode($translations, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            }
        } else {
            $filePath = $this->getLangPath() . "/{$locale}/{$file}.php";
            if (File::exists($filePath)) {
                $translations = include $filePath;
                $this->removeNestedValue($translations, $key);
                $this->saveTranslationFile($filePath, $translations);
            }
        }

        return response()->json([
            'success' => true,
            'message' => __('Translation deleted successfully'),
        ]);
    }

    /**
     * Get available locales.
     */
    protected function getAvailableLocales(): array
    {
        $langPath = $this->getLangPath();
        $locales = [];

        if (File::exists($langPath)) {
            // Get locales from directories
            foreach (File::directories($langPath) as $dir) {
                $locales[] = basename($dir);
            }
            
            // Get locales from JSON files
            foreach (File::files($langPath) as $file) {
                if ($file->getExtension() === 'json') {
                    $locale = $file->getFilenameWithoutExtension();
                    if (!in_array($locale, $locales)) {
                        $locales[] = $locale;
                    }
                }
            }
        }

        // Add default locales if none exist
        if (empty($locales)) {
            $locales = ['en', 'ar'];
        }

        sort($locales);
        return $locales;
    }

    /**
     * Get available translation files.
     */
    protected function getAvailableFiles(): array
    {
        $langPath = $this->getLangPath();
        $files = [];
        $hasJson = false;

        if (File::exists($langPath)) {
            // Check for JSON files
            foreach (File::files($langPath) as $file) {
                if ($file->getExtension() === 'json') {
                    $hasJson = true;
                    break;
                }
            }
            
            // Get PHP files from locale directories
            foreach (File::directories($langPath) as $localeDir) {
                foreach (File::files($localeDir) as $file) {
                    if ($file->getExtension() === 'php') {
                        $fileName = $file->getFilenameWithoutExtension();
                        if (!in_array($fileName, $files)) {
                            $files[] = $fileName;
                        }
                    }
                }
            }
        }

        // Add _json option if JSON files exist
        if ($hasJson) {
            array_unshift($files, '_json');
        }

        // Add default files if none exist
        if (empty($files)) {
            $files = ['_json', 'messages'];
        }

        return $files;
    }

    /**
     * Get nested value using dot notation.
     */
    protected function getNestedValue(array $array, string $key)
    {
        $keys = explode('.', $key);
        $value = $array;

        foreach ($keys as $k) {
            if (!isset($value[$k])) {
                return null;
            }
            $value = $value[$k];
        }

        return $value;
    }

    /**
     * Set nested value using dot notation.
     */
    protected function setNestedValue(array &$array, string $key, $value): void
    {
        $keys = explode('.', $key);
        $current = &$array;

        foreach ($keys as $i => $k) {
            if ($i === count($keys) - 1) {
                $current[$k] = $value;
            } else {
                if (!isset($current[$k]) || !is_array($current[$k])) {
                    $current[$k] = [];
                }
                $current = &$current[$k];
            }
        }
    }

    /**
     * Remove nested value using dot notation.
     */
    protected function removeNestedValue(array &$array, string $key): void
    {
        $keys = explode('.', $key);
        $current = &$array;

        foreach ($keys as $i => $k) {
            if ($i === count($keys) - 1) {
                unset($current[$k]);
            } else {
                if (!isset($current[$k]) || !is_array($current[$k])) {
                    return;
                }
                $current = &$current[$k];
            }
        }
    }

    /**
     * Save translation file.
     */
    protected function saveTranslationFile(string $filePath, array $translations): void
    {
        $content = "<?php\n\nreturn " . $this->arrayToString($translations) . ";\n";
        File::put($filePath, $content);
    }

    /**
     * Convert array to a formatted PHP string.
     */
    protected function arrayToString(array $array, int $indent = 0): string
    {
        $spaces = str_repeat('    ', $indent);
        $innerSpaces = str_repeat('    ', $indent + 1);
        
        if (empty($array)) {
            return '[]';
        }

        $lines = ["["];
        
        foreach ($array as $key => $value) {
            $formattedKey = is_string($key) ? "'" . addslashes($key) . "'" : $key;
            
            if (is_array($value)) {
                $lines[] = "{$innerSpaces}{$formattedKey} => " . $this->arrayToString($value, $indent + 1) . ",";
            } else {
                $formattedValue = "'" . addslashes($value) . "'";
                $lines[] = "{$innerSpaces}{$formattedKey} => {$formattedValue},";
            }
        }
        
        $lines[] = "{$spaces}]";
        
        return implode("\n", $lines);
    }

    /**
     * Import translations from scan.
     */
    public function scan(): JsonResponse
    {
        $scannedTranslations = $this->scanForTranslations();
        $locales = $this->getAvailableLocales();
        
        // Ensure we have at least en and ar
        if (!in_array('en', $locales)) {
            $locales[] = 'en';
        }
        if (!in_array('ar', $locales)) {
            $locales[] = 'ar';
        }
        
        $addedCount = 0;
        
        foreach ($scannedTranslations as $key) {
            // Check if key already exists in any file for each locale
            foreach ($locales as $locale) {
                $keyExists = $this->translationKeyExists($locale, $key);
                
                if (!$keyExists) {
                    // Add to JSON file (main translation file for __() helper)
                    $jsonFilePath = $this->getLangPath() . "/{$locale}.json";
                    
                    $translations = [];
                    if (File::exists($jsonFilePath)) {
                        $translations = json_decode(File::get($jsonFilePath), true) ?? [];
                    }

                    // Only add if key doesn't exist in JSON
                    if (!isset($translations[$key])) {
                        $translations[$key] = $key;
                        File::put($jsonFilePath, json_encode($translations, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                        $addedCount++;
                    }
                }
            }
        }

        return response()->json([
            'success' => true,
            'message' => __('Scanned :scanned translations, added :added new', ['scanned' => count($scannedTranslations), 'added' => $addedCount]),
            'count' => count($scannedTranslations),
            'added' => $addedCount,
        ]);
    }
    
    /**
     * Check if a translation key exists in any file for a locale.
     */
    protected function translationKeyExists(string $locale, string $key): bool
    {
        // Check in JSON file
        $jsonFilePath = $this->getLangPath() . "/{$locale}.json";
        if (File::exists($jsonFilePath)) {
            $translations = json_decode(File::get($jsonFilePath), true) ?? [];
            if (isset($translations[$key])) {
                return true;
            }
        }
        
        // Check in PHP files
        $localeDir = $this->getLangPath() . "/{$locale}";
        if (File::exists($localeDir)) {
            foreach (File::files($localeDir) as $file) {
                if ($file->getExtension() === 'php') {
                    $translations = include $file->getPathname();
                    if (is_array($translations)) {
                        $flatTranslations = $this->flattenArray($translations);
                        if (isset($flatTranslations[$key])) {
                            return true;
                        }
                    }
                }
            }
        }
        
        return false;
    }

    /**
     * Scan project files for translation keys.
     */
    protected function scanForTranslations(): array
    {
        $keys = [];
        $paths = [
            resource_path('views'),
            app_path(),
        ];

        $patterns = [
            '/(?:__|trans|@lang)\s*\(\s*[\'"]([^\'"]+)[\'"]\s*\)/i',
            '/{{\s*__\s*\(\s*[\'"]([^\'"]+)[\'"]\s*\)\s*}}/i',
        ];

        foreach ($paths as $path) {
            if (!File::exists($path)) continue;
            
            $files = File::allFiles($path);
            foreach ($files as $file) {
                $content = File::get($file->getPathname());
                
                foreach ($patterns as $pattern) {
                    preg_match_all($pattern, $content, $matches);
                    if (!empty($matches[1])) {
                        $keys = array_merge($keys, $matches[1]);
                    }
                }
            }
        }

        return array_unique($keys);
    }

    /**
     * Get all locales for dropdown.
     */
    public function getLocales(): JsonResponse
    {
        return response()->json($this->getAvailableLocales());
    }

    /**
     * Get all files for dropdown.
     */
    public function getFiles(): JsonResponse
    {
        return response()->json($this->getAvailableFiles());
    }
}
