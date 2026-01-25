@php
$servicesSection = $servicePage->sections->where('name', 'Services')->first();
$locale = app()->getLocale();
$translation = $servicesSection->translation($locale);
$services = $servicesSection->items;
@endphp

<!-- Service area start here -->
<section class="service-inner-area pt-120 pb-120">
	<div class="container">
		<div class="row g-4">
			@foreach ($services as $service)
			@php
			$serviceTranslation = $service->translation($locale);
			@endphp
			<div class="col-lg-4 col-md-6 wow bounceInUp" data-wow-delay="200ms"
				data-wow-duration="1000ms">
				<div class="service-two__item">
					<div class="image">
						@php
						$imageUrl = get_media_url( $service, 'images', $locale,
						null, true);
						@endphp
						@if ($imageUrl)
						<img src="{{ $imageUrl }}"
							alt="{{ $serviceTranslation->title }}">
						@else
						<img src="{{ asset('frontend/template-1/assets/images/services/database.jpg') }}"
							alt="image">
						@endif
					</div>
					<div class="service-two__content">
						<div class="icon">
							<img src="{{ asset('frontend/template-1/assets/images/icon/service-two-icon1.png') }}"
								alt="icon">
						</div>
						<div class="shape"><img
								src="{{ asset('frontend/template-1/assets/images/shape/service-two-item-shape.png') }}"
								alt="shape"></div>
						<h4><a href="{{ route('frontend.services.show', $service->slug) }}"
								class="primary-hover">{{ $serviceTranslation->title }}</a>
						</h4>
						{!! $serviceTranslation->content !!}
						<a class="read-more-btn"
							href="{{ route('frontend.services.show', $service->slug) }}">{{ __('Read More') }}
							<i class="fa-regular fa-arrow-right-long"></i></a>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>
<!-- Service area end here -->