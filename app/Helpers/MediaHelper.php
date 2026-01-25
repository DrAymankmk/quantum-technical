<?php

if (!function_exists('get_media_url')) {
    /**
     * Get media URL for a model with fallback support
     * 
     * @param object $model Model instance that uses HasMedia
     * @param string $collectionName Base collection name (e.g., 'images', 'icons')
     * @param string|null $locale Locale code (e.g., 'en', 'ar'). If null, uses current locale
     * @param string|null $fallbackUrl URL to use if no media is found
     * @param bool $useLanguageFallback Whether to try language-specific collections first
     * @return string|null Media URL or fallback URL
     */
    function get_media_url(
        object $model,
        string $collectionName,
        ?string $locale = null,
        ?string $fallbackUrl = null,
        bool $useLanguageFallback = true
    ): ?string {
        // Check if model uses HasMediaRetrieval trait
        if (method_exists($model, 'getMediaUrl')) {
            return $model->getMediaUrl($collectionName, $locale, $fallbackUrl, $useLanguageFallback);
        }
        
        // Fallback to direct query if trait is not used
        $locale = $locale ?? app()->getLocale();
        $modelClass = get_class($model);
        
        // Try language-specific collection first if enabled
        if ($useLanguageFallback) {
            $languageCollection = "{$collectionName}_{$locale}";
            $media = \Spatie\MediaLibrary\MediaCollections\Models\Media::where('model_type', $modelClass)
                ->where('model_id', $model->id)
                ->where('collection_name', $languageCollection)
                ->first();
            
            if ($media) {
                return $media->getUrl();
            }
        }
        
        // Try base collection
        $media = \Spatie\MediaLibrary\MediaCollections\Models\Media::where('model_type', $modelClass)
            ->where('model_id', $model->id)
            ->where('collection_name', $collectionName)
            ->first();
        
        if ($media) {
            return $media->getUrl();
        }
        
        // Try to find any collection matching the pattern
        if ($useLanguageFallback) {
            $media = \Spatie\MediaLibrary\MediaCollections\Models\Media::where('model_type', $modelClass)
                ->where('model_id', $model->id)
                ->where('collection_name', 'like', "{$collectionName}_%")
                ->first();
            
            if ($media) {
                return $media->getUrl();
            }
        }
        
        return $fallbackUrl;
    }
}

if (!function_exists('get_media')) {
    /**
     * Get media object for a model with fallback support
     * 
     * @param object $model Model instance that uses HasMedia
     * @param string $collectionName Base collection name
     * @param string|null $locale Locale code
     * @param bool $useLanguageFallback Whether to try language-specific collections first
     * @return \Spatie\MediaLibrary\MediaCollections\Models\Media|null
     */
    function get_media(
        object $model,
        string $collectionName,
        ?string $locale = null,
        bool $useLanguageFallback = true
    ): ?\Spatie\MediaLibrary\MediaCollections\Models\Media {
        // Check if model uses HasMediaRetrieval trait
        if (method_exists($model, 'getMediaWithFallback')) {
            return $model->getMediaWithFallback($collectionName, $locale, $useLanguageFallback);
        }
        
        // Fallback to direct query if trait is not used
        $locale = $locale ?? app()->getLocale();
        $modelClass = get_class($model);
        
        // Try language-specific collection first if enabled
        if ($useLanguageFallback) {
            $languageCollection = "{$collectionName}_{$locale}";
            $media = \Spatie\MediaLibrary\MediaCollections\Models\Media::where('model_type', $modelClass)
                ->where('model_id', $model->id)
                ->where('collection_name', $languageCollection)
                ->first();
            
            if ($media) {
                return $media;
            }
        }
        
        // Try base collection
        $media = \Spatie\MediaLibrary\MediaCollections\Models\Media::where('model_type', $modelClass)
            ->where('model_id', $model->id)
            ->where('collection_name', $collectionName)
            ->first();
        
        if ($media) {
            return $media;
        }
        
        // Try to find any collection matching the pattern
        if ($useLanguageFallback) {
            $media = \Spatie\MediaLibrary\MediaCollections\Models\Media::where('model_type', $modelClass)
                ->where('model_id', $model->id)
                ->where('collection_name', 'like', "{$collectionName}_%")
                ->first();
            
            if ($media) {
                return $media;
            }
        }
        
        return null;
    }
}
