@extends('frontend.template-1.layouts.app')

@section('content')
@php
$locale = app()->getLocale();
$imageUrl = get_media_url( $servicePage, 'images', $locale,
null, true);
@endphp
<!-- Page banner area start here -->
<section class="banner__inner-page bg-image pt-180 pb-180 bg-image"
	data-background="{{ get_media_url($servicePage, 'images', $locale, null, true) ?? asset('frontend/template-1/assets/images/banner/banner-inner-page.jpg') }}">
	<div class="shape2 wow slideInLeft" data-wow-delay="00ms" data-wow-duration="1500ms">
		<img src="{{ asset('frontend/template-1/assets/images/banner/inner-banner-shape2.png') }}"
			alt="shape">
	</div>
	<div class="shape1 wow slideInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
		<img src="{{ asset('frontend/template-1/assets/images/banner/inner-banner-shape1.png') }}"
			alt="shape">
	</div>
	<div class="shape3 wow slideInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
		<img class="sway__animationX"
			src="{{ asset('frontend/template-1/assets/images/banner/inner-banner-shape3.png') }}"
			alt="shape">
	</div>
	<div class="container">
		<h2 class="wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">
			{{ $servicePage->translation($locale)->title }}</h2>
		<div class="breadcrumb-list wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
			<a href="{{ route('frontend.home.index') }}">{{ __('Home') }}</a><span><i
					class="fa-regular fa-angles-right mx-2"></i>{{ $servicePage->translation($locale)->title }}</span>
		</div>
	</div>
</section>
<!-- Page banner area end here -->

<!-- Service area start here -->
<section class="service-single-area pt-120 pb-120">
	<div class="container">
		<div class="row g-4">
			<div class="col-lg-8 order-2 order-lg-1">
				<div class="service-single__left-item">

					<div class="image mb-50">

						@if ($imageUrl)
						<img src="{{ $imageUrl }}"
							alt="{{ $servicePage->translation($locale)->title }}">
						@else
						<img src="{{ asset('frontend/template-1/assets/images/service/service-single-image1.jpg') }}"
							alt="image">
						<div class="service-single__video-btn">
							<div class="video-btn video-pulse wow fadeIn"
								data-wow-delay="200ms"
								data-wow-duration="1500ms">
								<a class="video-popup"
									href="https://www.youtube.com/watch?v=iVqz_4M5mA0"><i
										class="fa-solid fa-play"></i></a>
							</div>
						</div>
						@endif
					</div>
					<h3 class="title mb-30">
						{{ $servicePage->translation($locale)->title }}</h3>

					{!! $servicePage->translation($locale)->content !!}

				</div>
			</div>
			<div class="col-lg-4 order-1 order-lg-2">
				<div class="service-single__right-item">
					<div class="item sub-bg mb-30">
						<h4 class="mb-20">{{ __('All Services') }}</h4>
						<ul class="category service-category">
							@foreach ($servicePage->section->items as $item)
							@php
							$itemTranslation = $item->translation($locale);
							@endphp
							<li
								class="{{ $item->id === $servicePage->id ? 'active' : '' }}">
								<a
									href="{{ route('frontend.services.show', $item->slug) }}">{{ $itemTranslation->title }}</a>
								<i
									class="fa-regular fa-arrow-right-long primary-color"></i>
							</li>
							@endforeach
						</ul>
					</div>
					<div class="item sub-bg mb-30">
						<h4 class="mb-20">{{ __('Opening Hours') }}</h4>
						<ul class="category">
							<li
								class="secondary-color justify-content-start gap-3">
								<svg width="16" height="16"
									viewBox="0 0 16 16"
									fill="none"
									xmlns="http://www.w3.org/2000/svg">
									<path d="M10.8505 9.41291L8.61967 7.73979V4.3316C8.61967 3.98891 8.34266 3.71191 7.99998 3.71191C7.65729 3.71191 7.38029 3.98891 7.38029 4.3316V8.04966C7.38029 8.24485 7.47201 8.42892 7.62817 8.54541L10.1069 10.4044C10.2138 10.485 10.3441 10.5285 10.478 10.5284C10.667 10.5284 10.8529 10.4435 10.9744 10.2799C11.1802 10.0066 11.1244 9.61804 10.8505 9.41291Z"
										fill="#3C72FC" />
									<path d="M8 0C3.58853 0 0 3.58853 0 8C0 12.4115 3.58853 16 8 16C12.4115 16 16 12.4115 16 8C16 3.58853 12.4115 0 8 0ZM8 14.7607C4.27266 14.7607 1.23934 11.7273 1.23934 8C1.23934 4.27266 4.27266 1.23934 8 1.23934C11.728 1.23934 14.7607 4.27266 14.7607 8C14.7607 11.7273 11.7273 14.7607 8 14.7607Z"
										fill="#3C72FC" />
								</svg>
								Mon - Sat: 10.00 AM - 4.00 PM
							</li>
							<li
								class="secondary-color justify-content-start gap-3">
								<svg width="16" height="16"
									viewBox="0 0 16 16"
									fill="none"
									xmlns="http://www.w3.org/2000/svg">
									<path d="M10.8505 9.41291L8.61967 7.73979V4.3316C8.61967 3.98891 8.34266 3.71191 7.99998 3.71191C7.65729 3.71191 7.38029 3.98891 7.38029 4.3316V8.04966C7.38029 8.24485 7.47201 8.42892 7.62817 8.54541L10.1069 10.4044C10.2138 10.485 10.3441 10.5285 10.478 10.5284C10.667 10.5284 10.8529 10.4435 10.9744 10.2799C11.1802 10.0066 11.1244 9.61804 10.8505 9.41291Z"
										fill="#3C72FC" />
									<path d="M8 0C3.58853 0 0 3.58853 0 8C0 12.4115 3.58853 16 8 16C12.4115 16 16 12.4115 16 8C16 3.58853 12.4115 0 8 0ZM8 14.7607C4.27266 14.7607 1.23934 11.7273 1.23934 8C1.23934 4.27266 4.27266 1.23934 8 1.23934C11.728 1.23934 14.7607 4.27266 14.7607 8C14.7607 11.7273 11.7273 14.7607 8 14.7607Z"
										fill="#3C72FC" />
								</svg>
								Sun: 09.00 AM - 4.00 PM
							</li>
							<li
								class="secondary-color justify-content-start gap-3">
								<svg width="16" height="16"
									viewBox="0 0 16 16"
									fill="none"
									xmlns="http://www.w3.org/2000/svg">
									<path d="M10.8505 9.41291L8.61967 7.73979V4.3316C8.61967 3.98891 8.34266 3.71191 7.99998 3.71191C7.65729 3.71191 7.38029 3.98891 7.38029 4.3316V8.04966C7.38029 8.24485 7.47201 8.42892 7.62817 8.54541L10.1069 10.4044C10.2138 10.485 10.3441 10.5285 10.478 10.5284C10.667 10.5284 10.8529 10.4435 10.9744 10.2799C11.1802 10.0066 11.1244 9.61804 10.8505 9.41291Z"
										fill="#3C72FC" />
									<path d="M8 0C3.58853 0 0 3.58853 0 8C0 12.4115 3.58853 16 8 16C12.4115 16 16 12.4115 16 8C16 3.58853 12.4115 0 8 0ZM8 14.7607C4.27266 14.7607 1.23934 11.7273 1.23934 8C1.23934 4.27266 4.27266 1.23934 8 1.23934C11.728 1.23934 14.7607 4.27266 14.7607 8C14.7607 11.7273 11.7273 14.7607 8 14.7607Z"
										fill="#3C72FC" />
								</svg>
								Friday: Closed
							</li>
							<li
								class="secondary-color justify-content-start gap-3">
								<svg width="16" height="16"
									viewBox="0 0 16 16"
									fill="none"
									xmlns="http://www.w3.org/2000/svg">
									<path d="M10.8505 9.41291L8.61967 7.73979V4.3316C8.61967 3.98891 8.34266 3.71191 7.99998 3.71191C7.65729 3.71191 7.38029 3.98891 7.38029 4.3316V8.04966C7.38029 8.24485 7.47201 8.42892 7.62817 8.54541L10.1069 10.4044C10.2138 10.485 10.3441 10.5285 10.478 10.5284C10.667 10.5284 10.8529 10.4435 10.9744 10.2799C11.1802 10.0066 11.1244 9.61804 10.8505 9.41291Z"
										fill="#3C72FC" />
									<path d="M8 0C3.58853 0 0 3.58853 0 8C0 12.4115 3.58853 16 8 16C12.4115 16 16 12.4115 16 8C16 3.58853 12.4115 0 8 0ZM8 14.7607C4.27266 14.7607 1.23934 11.7273 1.23934 8C1.23934 4.27266 4.27266 1.23934 8 1.23934C11.728 1.23934 14.7607 4.27266 14.7607 8C14.7607 11.7273 11.7273 14.7607 8 14.7607Z"
										fill="#3C72FC" />
								</svg>
								Emergency: 24 hours
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Service area end here -->
@endsection
