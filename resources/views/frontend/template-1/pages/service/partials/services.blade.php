@php
$servicesSection = $servicePage->sections->where('name', 'Services')->first();
$locale = app()->getLocale();
$translation = $servicesSection->translation($locale);
$services = $servicesSection->items;
@endphp

@push('styles')
<style>
.service-inner-area .service-card-col {
	display: flex;
}

.service-inner-area .service-two__item {
	height: 100%;
	width: 100%;
	display: flex;
	flex-direction: column;
}

.service-inner-area .service-two__item .image {
	height: 260px;
	flex-shrink: 0;
}

.service-inner-area .service-two__item .image img {
	width: 100%;
	height: 100%;
	object-fit: cover;
	display: block;
}

.service-inner-area .service-two__content {
	flex: 1;
	display: flex;
	flex-direction: column;
}

.service-inner-area .service-two__excerpt {
	flex: 1;
	margin-top: 10px;
	margin-bottom: 20px;
	overflow: hidden;
	display: -webkit-box;
	-webkit-box-orient: vertical;
	-webkit-line-clamp: 5;
	line-clamp: 5;
	line-height: 1.75;
	max-height: calc(1.75em * 6);
}

.service-inner-area .service-two__excerpt>*:last-child {
	margin-bottom: 0;
}

.service-inner-area .read-more-btn {
	margin-top: auto;
}
</style>
@endpush

<!-- Service area start here -->
<section class="service-inner-area pt-120 pb-120">
	<div class="container">
		<div class="row g-4">
			@foreach ($services as $service)
			@php
			$serviceTranslation = $service->translation($locale);
			@endphp
			<div class="col-lg-6 col-md-6 service-card-col wow bounceInUp" data-wow-delay="200ms"
				data-wow-duration="1000ms">
				<div class="service-two__item">
					<div class="image">
						@php
						$imageUrl = get_media_url($service, 'images', $locale, null,
						true);
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
						@if($serviceTranslation->content)
						<div class="service-two__excerpt">
							{!! $serviceTranslation->content !!}
						</div>
						@endif
						<a class="read-more-btn"
							href="{{ route('frontend.services.show', $service->slug) }}">{{ __('Read More') }}
							@include('frontend.template-1.components.directional-icon')</a>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>
<!-- Service area end here -->