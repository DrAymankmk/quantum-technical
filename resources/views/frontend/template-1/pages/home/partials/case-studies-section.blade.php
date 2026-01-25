@php
$caseStudiesSection = $homePage->sections->where('name', 'Case Studies')->first();
$locale = app()->getLocale();
$translation = $caseStudiesSection->translation($locale);
@endphp
<!-- Cause area start here -->
<section class="case-area pt-120 pb-120">
	<div class="container">
		<div class="d-flex flex-wrap gap-4 align-items-center justify-content-between mb-60">
			<div class="section-header">
				<h5 class="wow fadeInLeft" data-wow-delay="00ms" data-wow-duration="1500ms">
					<img class="me-1"
						src="{{ asset('frontend/template-1/assets/images/icon/section-title.png') }}"
						alt="icon">
					{{ $translation->subtitle ?? '' }}
				</h5>
				<h2 class="wow fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">We
					{{ $translation->title ?? '' }}
				</h2>
			</div>
			<a href="{{ route('frontend.service-solutions.index') }}" class="btn-one wow fadeInUp"
				data-wow-delay="200ms" data-wow-duration="1500ms">{{ __('View All Case Studies') }}
				<i class="fa-regular fa-arrow-right-long"></i></a>
		</div>
	</div>
	<div class="swiper case__slider">
		<div class="swiper-wrapper">
			@foreach ($caseStudiesSection->items as $item)
			@php
			$itemTranslation = $item->translation($locale);
			@endphp
			<div class="swiper-slide">
				<div class="case__item">
					<div class="image case__image">
						@php
						$imageUrl = get_media_url( $item,
						'images', $locale, null, true);
						@endphp
						@if ($imageUrl)
						<img src="{{ $imageUrl }}"
							alt="{{ $itemTranslation->title ?? '' }}">

						@else
						<img src="{{ asset('frontend/template-1/assets/images/case/software-development.jpg') }}"
							alt="image">
						@endif
					</div>
					<div class="case__content">
						<span class="primary-color sm-font">{{ __('Solution') }}</span>
						<h3><a href="{{ route('frontend.services.show', $item->slug) }}"
								class="text-white primary-hover">{{ $itemTranslation->title ?? '' }}</a>
						</h3>
					</div>
					<a href="{{ route('frontend.services.show', $item->slug) }}" class="case__btn">
						<i class="fa-regular fa-arrow-right"></i>
					</a>
				</div>
			</div>
			@endforeach
		</div>
		<div class="mt-60 text-center wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
			<div class="dot case__dot"></div>
		</div>
</section>
<!-- Cause area end here -->