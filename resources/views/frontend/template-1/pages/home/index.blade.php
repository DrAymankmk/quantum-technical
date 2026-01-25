@extends('frontend.template-1.layouts.app')

@section('content')


@include('frontend.template-1.pages.home.partials.hero-section')

@include('frontend.template-1.pages.home.partials.what-we-offer-section')

@include('frontend.template-1.pages.home.partials.about-section')

<!-- Counter area start here -->
<!-- <section class="counter-area">
			<div class="container">
				<div class="counter__wrp gradient-bg">
					<div class="counter__shape wow slideInRight" data-wow-delay="200ms"
						data-wow-duration="1500ms">
						<img src="assets/images/shape/counnter-bg-shape.png"
							alt="shape">
					</div>
					<div class="counter__item wow bounceInUp" data-wow-delay="00ms"
						data-wow-duration="1000ms">
						<img src="assets/images/icon/counter-icon1.png" alt="icon">
						<div class="content">
							<h3><span class="count">6,561</span>+</h3>
							<p class="text-white">Satisfied Clients</p>
						</div>
					</div>
					<div class="counter__item wow bounceInUp" data-wow-delay="200ms"
						data-wow-duration="1000ms">
						<img src="assets/images/icon/counter-icon2.png" alt="icon">
						<div class="content">
							<h3><span class="count">600</span>+</h3>
							<p class="text-white">Finished Projects</p>
						</div>
					</div>
					<div class="counter__item wow bounceInUp" data-wow-delay="400ms"
						data-wow-duration="1000ms">
						<img src="assets/images/icon/counter-icon3.png" alt="icon">
						<div class="content">
							<h3><span class="count">250</span>+</h3>
							<p class="text-white">Skilled Experts</p>
						</div>
					</div>
					<div class="counter__item wow bounceInUp" data-wow-delay="800ms"
						data-wow-duration="1000ms">
						<img src="assets/images/icon/counter-icon4.png" alt="icon">
						<div class="content">
							<h3><span class="count">590</span>+</h3>
							<p class="text-white">Media Posts</p>
						</div>
					</div>
				</div>
			</div>
		</section> -->
<!-- Counter area end here -->

@include('frontend.template-1.pages.home.partials.case-studies-section')


@include('frontend.template-1.pages.home.partials.technologies-section')

<!-- Brand area start here -->
<!-- <div class="brand-area">
			<div class="container">
				<div class="brand__wrp">
					<div class="brand__shape">
						<img src="assets/images/shape/brand-shape.png" alt="">
					</div>
					<div class="swiper brand__slider">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								<div class="brand__image image">
									<img src="assets/images/brand/brand-image1.png"
										alt="image">
								</div>
							</div>
							<div class="swiper-slide">
								<div class="brand__image image">
									<img src="assets/images/brand/brand-image2.png"
										alt="image">
								</div>
							</div>
							<div class="swiper-slide">
								<div class="brand__image image">
									<img src="assets/images/brand/brand-image3.png"
										alt="image">
								</div>
							</div>
							<div class="swiper-slide">
								<div class="brand__image image">
									<img src="assets/images/brand/brand-image4.png"
										alt="image">
								</div>
							</div>
							<div class="swiper-slide">
								<div class="brand__image image">
									<img src="assets/images/brand/brand-image5.png"
										alt="image">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> -->
<!-- Brand area end here -->

@include('frontend.template-1.pages.home.partials.development-process-section')

@include('frontend.template-1.pages.home.partials.contact-section')

@endsection