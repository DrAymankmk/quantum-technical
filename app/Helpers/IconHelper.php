<?php

use App\Models\CmsLanguage;

if (! function_exists('is_rtl_locale')) {
    /**
     * Determine if the given locale uses RTL direction.
     */
    function is_rtl_locale(?string $locale = null): bool
    {
        $locale = $locale ?? app()->getLocale();

        static $directions = null;

        if ($directions === null) {
            $directions = CmsLanguage::pluck('direction', 'code')->toArray();
        }

        return ($directions[$locale] ?? ($locale === 'ar' ? 'rtl' : 'ltr')) === 'rtl';
    }
}

if (! function_exists('directional_icon_class')) {
    /**
     * Return Font Awesome classes for a direction-aware arrow/icon.
     */
    function directional_icon_class(string $icon = 'arrow-right-long', string $style = 'fa-regular', ?string $locale = null): string
    {
        $rtlIcons = [
            'arrow-right-long' => 'arrow-left-long',
            'arrow-right' => 'arrow-left',
            'angles-right' => 'angles-left',
            'chevron-right' => 'chevron-left',
            'long-arrow-right' => 'long-arrow-left',
        ];

        if (is_rtl_locale($locale) && isset($rtlIcons[$icon])) {
            $icon = $rtlIcons[$icon];
        }

        return trim("{$style} fa-{$icon}");
    }
}
