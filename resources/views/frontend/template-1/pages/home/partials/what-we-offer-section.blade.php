@php
$whatWeOfferSection = $homePage->sections->where('name', 'What We Offer')->first();
$locale = app()->getLocale();
$translation = $whatWeOfferSection->translation($locale);
@endphp

<!-- Service area start here -->
<section class="service-area pt-120 pb-120">
	<div class="service__shape wow slideInRight">
		<img class="sway_Y__animation"
			src="{{ asset('frontend/template-1/assets/images/shape/service-bg-shape.png') }}"
			alt="shape">
	</div>
	<div class="container">
		<div class="d-flex flex-wrap gap-4 align-items-center justify-content-between mb-60">
			<div class="section-header">
				<h5 class="wow fadeInLeft" data-wow-delay="00ms" data-wow-duration="1500ms">
					<img class="me-1"
						src="{{ asset('frontend/template-1/assets/images/icon/section-title.png') }}"
						alt="icon">
					{{ $translation->subtitle ?? '' }}
				</h5>
				<h2 class="wow fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms"
					style="font-size: 30px;">
					{{ $translation->title ?? '' }}
				</h2>
			</div>
			<a href="{{ route('frontend.services.index') }}" class="btn-one wow fadeInUp"
				data-wow-delay="200ms" data-wow-duration="1500ms">{{ __('View All Services') }}
				@include('frontend.template-1.components.directional-icon')</a>
		</div>
		<div class="row g-4">
			@foreach ($whatWeOfferSection->items as $item)
			@php
			$itemTranslation = $item->translation($locale);
			@endphp
			<div class="col-lg-4 col-md-6 wow bounceInUp" data-wow-delay="00ms"
				data-wow-duration="1000ms">
				<div class="service__item">
					<div class="service-shape">
						<img src="{{ asset('frontend/template-1/assets/images/shape/service-item-shape.png') }}"
							alt="shape">
					</div>

					@include('frontend.template-1.components.cms-item-icon', [
						'item' => $item,
						'locale' => $locale,
						'wrapperClass' => 'service__icon',
					])

					<h4><a href="service-details.html">{{ $itemTranslation->title ?? '' }} </a>
					</h4>
					{!! $itemTranslation->content ?? '' !!}
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>
<!-- Service area end here -->
