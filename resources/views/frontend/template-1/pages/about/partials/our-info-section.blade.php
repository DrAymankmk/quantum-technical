@php
$ourInfoSection = $aboutPage->sections->where('name', 'Our Info')->first();
$locale = app()->getLocale();
$translation = $ourInfoSection->translation($locale);
@endphp
<section class="case-single-area pb-120">
	<div class="container">
		<div class="case-single__item">
			@foreach ($ourInfoSection->items as $item)
			@php
			$itemTranslation = $item->translation($locale);
			@endphp
			<h3 class="case-single__title mt-40 mb-30">{{ $itemTranslation->title }}</h3>
			{!! $itemTranslation->content !!}
			@endforeach
		</div>
	</div>
</section>