@php
$servicesSection = $serviceSolutionPage->sections->where('name', 'Services')->first();
$locale = app()->getLocale();
$translation = $servicesSection->translation($locale);
@endphp
<!-- Service area start here -->
<section class="service-area pt-120 pb-120">
	<div class="service__shape wow slideInRight">
		<img class="sway_Y__animation"
			src="{{ asset('frontend/template-1/assets/images/shape/service-bg-shape.png') }}"
			alt="shape">
	</div>
	<div class="container">
		<div class="section-header mb-40">
			<!-- <h5 class="wow fadeInLeft" data-wow-delay="00ms"
				data-wow-duration="1500ms">
				<img class="me-1"
					src="assets/images/icon/section-title.png"
					alt="icon">
				What We OFFER
			</h5> -->
			<h2 class="wow fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms"
				style="font-size: 30px;">{{ $translation->title }}
			</h2>
		</div>
		<div class="row g-4">
			@foreach ($servicesSection->items as $item)
			@php
			$itemTranslation = $item->translation($locale);
			@endphp
			<div class="col-lg-4 col-md-6 wow bounceInUp" data-wow-delay="200ms"
				data-wow-duration="1000ms">
				<div class="service__item ">
					<div class="service-shape">
						<img src="{{ asset('frontend/template-1/assets/images/shape/service-item-shape.png') }}"
							alt="shape">
					</div>
					<h4><a>{{ $itemTranslation->title }}</a></h4>
					<div class="service-content">
						{!! $itemTranslation->content !!}
					</div>
				</div>
			</div>
			@endforeach


		</div>
	</div>
</section>
<!-- Service area end here -->
