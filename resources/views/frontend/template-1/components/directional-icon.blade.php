@php
    $icon = $icon ?? 'arrow-right-long';
    $style = $style ?? 'fa-regular';
    $class = $class ?? '';
@endphp
<i class="{{ trim(directional_icon_class($icon, $style) . ' ' . $class) }}" aria-hidden="true"></i>
