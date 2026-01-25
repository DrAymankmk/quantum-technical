@php
$topHeaderSection = \App\Models\CmsSection::where('name','Top Header')->first();
$topHeaderLinks = $topHeaderSection ? $topHeaderSection->links()->active()->ordered()->get() : collect();
@endphp
<!-- Top header area start here -->
<div class="header-top d-none d-lg-block">
	<div class="container header__container">
		<div class="header-top-wrp">

			<ul class="info">
				@if($topHeaderLinks->count() > 0)
				@foreach($topHeaderLinks->where('type', 'contact-info-link') as $link)
				<li class="ms-4">

					@if($link->icon)
					<i class="{{ $link->icon }}"></i>
					@endif

					<a href="{{ $link->link }}" class="ms-1">{{ $link->getTranslatedAttribute('name') ?? $link->name }}</a>
				</li>
				@endforeach
				@endif

				
			</ul>
			<ul class="link-info">
@foreach($topHeaderLinks->where('type', 'social-link') as $link)
				<li><a href="{{ $link->link }}"><i class="{{ $link->icon }}"></i></a></li>
				@endforeach
			</ul>
		</div>
	</div>
</div>
<!-- Top header area end here -->

<!-- Header area start here -->
<header class="header-area">
	<div class="container header__container">
		<div class="header__main">
			<a href="{{ route('frontend.home.index') }}" class="logo">
				<img src="{{ asset('frontend/template-1/assets/images/logo-1.png') }}"
					alt="logo">
			</a>
			<div class="main-menu">
				<nav>
					<ul>
						<li class="has-megamenu">
							<a
								href="{{ route('frontend.home.index') }}">{{ __('Home') }}</a>

						</li>
						<li><a href="{{ route('frontend.about.index') }}">{{ __('About') }}</a>
						</li>
						<li>
							<a href="#0">{{ __('Services') }}</a>
							<ul class="sub-menu">
								<li>
									<a
										href="{{ route('frontend.service-solutions.index') }}">IT
										{{ __('Solutions') }}</a>
								</li>
								<li>
									<a
										href="{{ route('frontend.services.index') }}">IT
										{{ __('Services') }}</a>
								</li>

							</ul>
						</li>
						<li><a href="{{ route('frontend.faq.index') }}">{{ __('FAQ') }}</a>
						</li>
						<li><a href="{{ route('frontend.contact.index') }}">{{ __('Contact') }}</a>
						</li>
						<li>
							<a href="#0">
								@if (App::getLocale() == 'ar')
								<img src="{{ asset('backend/assets/images/flags/eg.png') }}"
									alt=""
									style="width: 20px; height: auto; margin-right: 5px;">
								{{ LaravelLocalization::getCurrentLocaleName() }}
								@else
								<img src="{{ asset('backend/assets/images/flags/us.png') }}"
									alt=""
									style="width: 20px; height: auto; margin-right: 5px;">
								{{ LaravelLocalization::getCurrentLocaleName() }}
								@endif
							</a>
							<ul class="sub-menu">
								@foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
								<li>
									<a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
										rel="alternate"
										hreflang="{{ $localeCode }}">
										{{ $properties['native'] }}
									</a>
								</li>
								@endforeach
							</ul>
						</li>
						<li class="ml-20 d-none d-lg-block"><a
								class="search-trigger" href="#0"><svg
									width="17" height="16"
									viewBox="0 0 17 16"
									fill="none"
									xmlns="http://www.w3.org/2000/svg">
									<g
										clip-path="url(#clip0_307_344)">
										<path d="M16.0375 14.9381L12.0784 11.0334C13.0625 9.86621 13.6554 8.36744 13.6554 6.73438C13.6554 3.02103 10.5925 0 6.82774 0C3.0629 0 0 3.02103 0 6.73438C0 10.4475 3.0629 13.4683 6.82774 13.4683C8.4834 13.4683 10.0031 12.8836 11.1865 11.913L15.1456 15.8178C15.2687 15.9393 15.4301 16 15.5915 16C15.7529 16 15.9143 15.9393 16.0375 15.8178C16.2839 15.5748 16.2839 15.181 16.0375 14.9381ZM1.26142 6.73438C1.26142 3.70705 3.75845 1.24414 6.82774 1.24414C9.89695 1.24414 12.3939 3.70705 12.3939 6.73438C12.3939 9.76146 9.89695 12.2241 6.82774 12.2241C3.75845 12.2241 1.26142 9.76146 1.26142 6.73438Z"
											fill="#0F0D1D" />
									</g>
									<defs>
										<clipPath
											id="clip0_307_344">
											<rect width="16.2222"
												height="16"
												fill="white" />
										</clipPath>
									</defs>
								</svg>
							</a></li>
					</ul>
				</nav>
			</div>
			<div class="d-none d-lg-inline-block">
				<a href="{{ route('frontend.contact.index') }}"
					class="btn-one">{{ __('Get A Quote') }} <i
						class="fa-regular fa-arrow-right-long"></i></a>
			</div>
			<div class="bars d-block d-lg-none">
				<i id="openButton" class="fa-solid fa-bars"></i>
			</div>
		</div>
	</div>
</header>
<!-- Header area end here -->

<!-- Sidebar area start here -->
<div id="targetElement" class="sidebar-area sidebar__hide">
	<div class="sidebar__overlay"></div>
	<a href="index.html" class="logo mb-40">
		<img src="{{ asset('frontend/template-1/assets/images/logo-1.png') }}" alt="logo">
	</a>
	<div class="sidebar__search mb-30">
		<input type="text" placeholder="{{ __('Search...') }}">
		<i class="fa-regular fa-magnifying-glass"></i>
	</div>
	<div class="mobile-menu overflow-hidden"></div>
	<ul class="info pt-40">
		<li><i class="fa-solid primary-color fa-location-dot"></i> <a href="#0">example@example.com</a>
		</li>
		<li class="py-2"><i class="fa-solid primary-color fa-phone-volume"></i> <a
				href="tel:+0580161257">+0580161257</a>
		</li>
		<li><i class="fa-solid primary-color fa-paper-plane"></i> <a href="#0">info@example.com</a></li>
	</ul>
	<div class="social-icon mt-20">
		<a href="#0"><i class="fa-brands fa-facebook-f"></i></a>
		<a href="#0"><i class="fa-brands fa-twitter"></i></a>
		<a href="#0"><i class="fa-brands fa-linkedin-in"></i></a>
		<a href="#0"><i class="fa-brands fa-youtube"></i></a>
	</div>
	<button id="closeButton" class="text-white"><i class="fa-solid fa-xmark"></i></button>
</div>
<!-- Sidebar area end here -->

<!-- Fullscreen search area start here -->
<div class="search-wrap">
	<div class="search-inner">
		<i class="fas fa-times search-close" id="search-close"></i>
		<div class="search-cell">
			<form method="get">
				<div class="search-field-holder">
					<input type="search" class="main-search-input"
						placeholder="Search...">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Fullscreen search area end here -->