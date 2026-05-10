@php
$footerSection = \App\Models\CmsSection::where('name', 'Footer')->first();
$footerContentItem = $footerSection
    ? \App\Models\CmsItem::where('cms_section_id', $footerSection->id)
        ->where('slug', 'footer-content')
        ->where('is_active', true)
        ->orderBy('order')
        ->first()
    : null;
$footerContent = $footerContentItem
    ? ($footerContentItem->getTranslatedAttribute('content') ?? $footerContentItem->content ?? '')
    : '';
$quickLinks = $footerSection
    ? $footerSection->links()->where('type', 'quick-link')->active()->ordered()->get()
    : collect();
$socialLinks = $footerSection
    ? $footerSection->links()->where('type', 'social-link')->get()
    : collect();
@endphp

<!-- Footer area start here -->
<footer class="footer-area secondary-bg">
	<div class="footer__shape-regular-left wow slideInLeft" data-wow-delay="00ms" data-wow-duration="1500ms">
		<img src="{{ asset('frontend/template-1/assets/images/shape/footer-regular-left.png') }}"
			alt="shape">
	</div>
	<div class="footer__shape-solid-left wow slideInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
		<img class="sway_Y__animation"
			src="{{ asset('frontend/template-1/assets/images/shape/footer-solid-left.png') }}"
			alt="shape">
	</div>
	<div class="footer__shape-solid-right wow slideInRight" data-wow-delay="00ms" data-wow-duration="1500ms">
		<img class="sway_Y__animation"
			src="{{ asset('frontend/template-1/assets/images/shape/footer-regular-right.png') }}"
			alt="shape">
	</div>
	<div class="footer__shape-regular-right wow slideInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
		<img src="{{ asset('frontend/template-1/assets/images/shape/footer-solid-right.png') }}"
			alt="shape">
	</div>
	<div class="footer__shadow-shape">
		<img src="{{ asset('frontend/template-1/assets/images/shape/footer-shadow-shape.png') }}"
			alt="shodow">
	</div>
	<div class="container">
		<div class="footer__wrp pt-100 pb-100">
			<div class="footer__item item-big wow fadeInUp" data-wow-delay="00ms"
				data-wow-duration="1500ms">
				<a href="index.html" class="logo mb-30">
					<img src="{{ asset('frontend/template-1/assets/images/logo-1.png') }}"
						alt="image">
				</a>
				<p> {{ $footerContent }}
				</p>
				<div class="social-icon">
					@foreach($socialLinks as $link)
					@php $linkName = $link->getTranslatedAttribute('name') ?? $link->name; @endphp
					<a href="{{ $link->link }}" target="{{ $link->target ?? '_blank' }}"
						title="{{ $linkName }}" aria-label="{{ $linkName }}">
						<i class="{{ $link->icon }}"></i>
					</a>
					@endforeach
				</div>
			</div>
			<!-- <div class="footer__item item-sm wow fadeInUp" data-wow-delay="200ms"
					data-wow-duration="1500ms">
					<h3 class="footer-title">IT Solution</h3>
					<ul>
						<li><a href="service-details.html"><i
									class="fa-regular fa-angles-right me-1"></i>
								IT
								Management</a></li>
						<li><a href="service-details.html"><i
									class="fa-regular fa-angles-right me-1"></i>
								SEO
								Optimization</a>
						</li>
						<li><a href="service-details.html"><i
									class="fa-regular fa-angles-right me-1"></i>
								Web
								Development</a>
						</li>
						<li><a href="service-details.html"><i
									class="fa-regular fa-angles-right me-1"></i>
								Cyber
								Security</a></li>
						<li><a href="service-details.html"><i
									class="fa-regular fa-angles-right me-1"></i>
								Data
								Security</a></li>
					</ul>
				</div> -->
			<div class="footer__item item-sm wow fadeInUp" data-wow-delay="400ms"
				data-wow-duration="1500ms">
				<h3 class="footer-title">{{ __('Quick Links') }}</h3>
				<ul>
					@foreach($quickLinks as $link)
					<li><a href="{{ $link->link }}" target="{{ $link->target }}"><i
								class="{{ $link->icon }} me-1"></i>
							{{ $link->getTranslatedAttribute('name') ?? $link->name }}</a>
					</li>
					@endforeach
				</ul>
			</div>
			<div class="footer__item item-big wow fadeInUp" data-wow-delay="600ms"
				data-wow-duration="1500ms">
				<h3 class="footer-title">{{ __('footer_Contact_Us_Title') }}</h3>
				<p class="mb-20"> {{ __('footer_Address') }} </p>
				<ul class="footer-contact">
					<li>
						<i class="fa-regular fa-clock"></i>
						<div class="info">
							<h5>
								{{ __('footer_Opening_Hours_Title') }}
								</h 5>
								<p> {{ __('footer_Opening_Hours') }}
								</p>
						</div>
					</li>
					<li>
						<i class="fa-duotone fa-phone"></i>
						<div class="info">
							<h5>
								{{ __('footer_Phone_Call_Title') }}
							</h5>
							<p> {{ __('footer_Phone_Call') }} </p>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="footer__copyright">
		<div class="container">
			<div
				class="d-flex gap-1 flex-wrap align-items-center justify-content-md-between justify-content-center">
				<p class="wow fadeInDown" data-wow-delay="00ms" data-wow-duration="1500ms">
					&copy; All Copyright 2024
					by <a href="#0">Quantum Solutions</a></p>
				<ul class="d-flex align-items-center gap-4 wow fadeInDown"
					data-wow-delay="200ms" data-wow-duration="1500ms">
					<li><a href="#0">Terms & Condition</a></li>
					<li><a href="#0">Privacy Policy</a></li>
				</ul>
			</div>
		</div>
	</div>
</footer>
<!-- Footer area end here -->
