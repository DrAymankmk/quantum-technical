@php
    use Illuminate\Support\Str;

    $locale = $locale ?? app()->getLocale();
    $translation = $item->translation($locale);
    $iconValue = trim($translation->icon ?? '');
    $iconImageUrl = get_media_url($item, 'icons', $locale, null, true);
    $mainImageUrl = get_media_url($item, 'images', $locale, null, true);
    $defaultIcon = $defaultIcon ?? asset('frontend/template-1/assets/images/icon/service-icon1.png');
    $alt = $translation->title ?? __('Icon');

    $iconType = 'default';
    $iconSource = $defaultIcon;

    if ($iconValue !== '') {
        if (Str::startsWith($iconValue, '<svg')) {
            $iconType = 'svg';
            $iconSource = $iconValue;
        } elseif (filter_var($iconValue, FILTER_VALIDATE_URL) || Str::startsWith($iconValue, ['/', 'storage/'])) {
            $iconType = 'url';
            $iconSource = Str::startsWith($iconValue, ['http://', 'https://'])
                ? $iconValue
                : asset(ltrim($iconValue, '/'));
        } else {
            $iconType = 'font';
            $iconSource = $iconValue;
        }
    } elseif ($iconImageUrl) {
        $iconType = 'media';
        $iconSource = $iconImageUrl;
    } elseif ($mainImageUrl) {
        $iconType = 'media';
        $iconSource = $mainImageUrl;
    }

    $needsMdi = $iconType === 'font' && Str::contains($iconSource, 'mdi');
@endphp

@if($needsMdi)
    @once
        @push('styles')
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css">
        @endpush
    @endonce
@endif

@once
    @push('styles')
        <style>
            .cms-item-icon {
                display: inline-flex;
                align-items: center;
                justify-content: center;
            }

            .cms-item-icon__font {
                font-size: 36px;
                line-height: 1;
                color: var(--primary-color, #3C72FC);
            }

            .cms-item-icon__image {
                max-width: 40px;
                max-height: 40px;
                width: auto;
                height: auto;
                object-fit: contain;
            }

            .cms-item-icon__svg svg {
                width: 40px;
                height: 40px;
                display: block;
            }
        </style>
    @endpush
@endonce

<div @class([$wrapperClass ?? null, 'cms-item-icon'])>
    @switch($iconType)
        @case('font')
            <i class="{{ $iconSource }} cms-item-icon__font" aria-hidden="true"></i>
            @break

        @case('svg')
            <span class="cms-item-icon__svg">{!! $iconSource !!}</span>
            @break

        @case('url')
        @case('media')
        @case('default')
            <img src="{{ $iconSource }}"
                 alt="{{ $alt }}"
                 class="cms-item-icon__image">
            @break
    @endswitch
</div>
