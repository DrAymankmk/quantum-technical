@php
$developmentProcessSection = $homePage->sections->where('name', 'Development Process')->first();
$locale = app()->getLocale();
$translation = $developmentProcessSection->translation($locale);
@endphp
<!-- Process area start here -->
<section class="process-area pt-120 pb-120">
	<div class="container">
		<div class="section-header text-center mb-60">
			<h5 class="wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">
				<img class="me-1"
					src="{{ asset('frontend/template-1/assets/images/icon/section-title.png') }}"
					alt="icon">
				{{ $translation->subtitle ?? '' }}
			</h5>
			<h2 class="wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
				{{ $translation->title ?? '' }}
			</h2>
		</div>
		<div class="row g-4">
			@foreach ($developmentProcessSection->items as $item)
			@php
			$itemTranslation = $item->translation($locale);
			@endphp
			<div class="col-lg-4 wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">
				<div class="process__item mb-100">
					@if (in_array($item->order, [1, 2, 4, 5]))
					<div class="process-arry bobble__animation">
						<img src="{{ asset('frontend/template-1/assets/images/process/process-arry.png') }}"
							alt="arry-icon">
					</div>
					@endif
					<div class="process__image">
						@php
						$imageUrl = get_media_url( $item,
						'images', $locale, null, true);
						@endphp
						@if ($imageUrl)
						<img src="{{ $imageUrl }}"
							alt="{{ $itemTranslation->title ?? '' }}">
						@else
						<img src="{{ asset('frontend/template-1/assets/images/process/process-image1.png') }}"
							alt="image">
						@endif
						<span class="process-number">{{ $item->order }}</span>
					</div>
					<div class="process__content">
						<h4 class="mt-25 mb-10">
							{{ $itemTranslation->title ?? '' }}
						</h4>
						{!! $itemTranslation->content ?? '' !!}
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>
<!-- Process area end here -->