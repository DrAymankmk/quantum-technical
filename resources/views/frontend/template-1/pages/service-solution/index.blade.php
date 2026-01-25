@extends('frontend.template-1.layouts.app')

@push('styles')
<style>
/* Text color for hover or when item has .active class */
.service__item:hover .service-content,
.service__item.active .service-content,
.service__item:hover .service-content p,
.service__item.active .service-content p,
.service__item:hover h4 a,
.service__item.active h4 a {
	color: #fff;
}
</style>
@endpush

@section('content')
<!-- Page banner area start here -->
<section class="banner__inner-page bg-image pt-180 pb-180 bg-image"
	data-background="{{ asset('frontend/template-1/assets/images/it-solution-cover.jpg') }}">
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
		<h2 class="wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">{{ __('IT Solutions') }}</h2>
		<div class="breadcrumb-list wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
			<a href="{{ route('frontend.home.index') }}">{{ __('Home') }}</a><span><i class="fa-regular fa-angles-right mx-2"></i>{{ __('IT Solutions') }}</span>
		</div>
	</div>
</section>
<!-- Page banner area end here -->

@include('frontend.template-1.pages.service-solution.partials.technical-solutions')

@include('frontend.template-1.pages.service-solution.partials.services')
@endsection