@php
$caseStudiesSection = $homePage->sections->where('name', 'Case Studies')->first();
$locale = app()->getLocale();
$translation = $caseStudiesSection->translation($locale);
@endphp

@push('styles')
<style>
.case-area .case-studies__slider {
	margin-left: 0 !important;
	margin-right: 0 !important;
	padding-left: 0;
	padding-right: 0;
	width: 100%;
}

.case-area .case-studies__wrapper {
	overflow: hidden;
}

.case-area .case-studies__slider .swiper-slide {
	height: auto;
}

.case-area .case-studies__slider .case__item .image img {
	width: 100%;
	height: 100%;
	object-fit: cover;
}

.case-area .case-studies__slider .swiper-slide-active .case__item .case__btn {
	opacity: 1;
	visibility: visible;
	transform: translate(0);
}
</style>
@endpush

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
				<h2 class="wow fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
					{{ $translation->title ?? '' }}
				</h2>
			</div>
			<!-- <a href="{{ route('frontend.service-solutions.index') }}" class="btn-one wow fadeInUp"
				data-wow-delay="200ms" data-wow-duration="1500ms">{{ __('View All Case Studies') }}
				<i class="fa-regular fa-arrow-right-long"></i></a> -->
		</div>
	</div>

	<div class="container case-studies__wrapper">
		<div class="swiper case-studies__slider">
			<div class="swiper-wrapper">
				@foreach ($caseStudiesSection->items as $item)
				@php
				$itemTranslation = $item->translation($locale);
				@endphp
				<div class="swiper-slide">
					<div class="case__item">
						<div class="image case__image">
							@php
							$imageUrl = get_media_url($item, 'images',
							$locale, null, true);
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
							<span
								class="primary-color sm-font">{{ __('Solution') }}</span>
							<h3><a href="{{ route('frontend.services.show', $item->slug) }}"
									class="text-white primary-hover">{{ $itemTranslation->title ?? '' }}</a>
							</h3>
						</div>
						<a href="{{ route('frontend.services.show', $item->slug) }}"
							class="case__btn">
							@include('frontend.template-1.components.directional-icon', ['icon' => 'arrow-right'])
						</a>
					</div>
				</div>
				@endforeach
			</div>
		</div>

		<div class="mt-60 text-center wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
			<div class="dot case-studies__dot"></div>
		</div>
	</div>
</section>
<!-- Cause area end here -->

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
	if (!document.querySelector('.case-studies__slider') || typeof Swiper === 'undefined') {
		return;
	}

	new Swiper('.case-studies__slider', {
		loop: true,
		spaceBetween: 24,
		speed: 800,
		autoplay: {
			delay: 4000,
			disableOnInteraction: false,
		},
		breakpoints: {
			1440: {
				slidesPerView: 4,
			},
			992: {
				slidesPerView: 3,
			},
			575: {
				slidesPerView: 2,
			},
			320: {
				slidesPerView: 1,
			},
		},
		pagination: {
			el: '.case-studies__dot',
			clickable: true,
		},
	});
});
</script>
@endpush
