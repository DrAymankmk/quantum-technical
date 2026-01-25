@php
$technologiesSection = $homePage->sections->where('name', 'Technologies')->first();
$locale = app()->getLocale();
$translation = $technologiesSection->translation($locale);
@endphp
<!-- Offer area start here -->
<section class="offer-area secondary-bg pt-120 pb-200">
	<div class="offer__shadow wow fadeIn" data-wow-delay="200ms" data-wow-duration="1500ms">
		<img src="{{ asset('frontend/template-1/assets/images/shape/offer-shadow-shape.png') }}"
			alt="shadow">
	</div>
	<div class="offer__shape-left">
		<img class="wow fadeInUpBig" data-wow-delay="400ms" data-wow-duration="1500ms"
			src="{{ asset('frontend/template-1/assets/images/shape/offer-bg-shape-left.png') }}"
			alt="shape">
	</div>
	<div class="offer__shape-right">
		<img class="wow fadeInDownBig" data-wow-delay="400ms" data-wow-duration="1500ms"
			src="{{ asset('frontend/template-1/assets/images/shape/offer-bg-shape-right.png') }}"
			alt="shape">
	</div>
	<div class="container">
		<div class="d-flex gap-4 flex-wrap align-items-center justify-content-between mb-95">
			<div class="section-header">
				<h5 class="wow fadeInLeft" data-wow-delay="00ms" data-wow-duration="1500ms">
					<img class="me-1"
						src="{{ asset('frontend/template-1/assets/images/icon/section-title.png') }}"
						alt="icon">
					{{ $translation->subtitle ?? '' }}
				</h5>
				<h2 class="text-white wow fadeInLeft" data-wow-delay="200ms"
					data-wow-duration="1500ms">{{ $translation->title ?? '' }}</h2>
			</div>
			<a href="{{ route('frontend.services.index') }}" class="btn-one wow fadeInUp" data-wow-delay="200ms"
				data-wow-duration="1500ms">{{ __('Explore More') }}
				<i class="fa-regular fa-arrow-right-long"></i></a>
		</div>
		<div class="row g-4">
			@foreach ($technologiesSection->items as $item)
			@php
			$itemTranslation = $item->translation($locale);
			@endphp
			<div class="col-lg-2 col-md-4 col-sm-6 wow bounceInUp" data-wow-delay="00ms"
				data-wow-duration="1500ms">
				<div class="offer__item">
					<div class="shape-top">
						<img src="{{ asset('frontend/template-1/assets/images/shape/offter-item-shape-top.png') }}"
							alt="shape">
					</div>
					<div class="shape-bottom">
						<img src="{{ asset('frontend/template-1/assets/images/shape/offter-item-shape-bottom.png') }}"
							alt="shape">
					</div>
					<div class="offer__icon">
						@php
						$imageUrl = get_media_url( $item,
						'images', $locale, null, true);
						@endphp
						@if ($imageUrl)
						<img src="{{ $imageUrl }}"
							alt="{{ $itemTranslation->title ?? '' }}">
						@else
						<svg width="36" height="36" viewBox="0 0 36 36" fill="none"
							xmlns="http://www.w3.org/2000/svg">
							<path d="M18 0C10.3961 0 0 5.74724 0 18C0 29.9409 9.99921 36 18 36C31.7268 36 36 23.974 36 18C36 9.18425 29.2535 0 18 0ZM13.826 1.6937C11.948 3.29528 10.389 5.94567 9.38268 9.23386C8.07874 8.46142 6.8811 7.50472 5.81811 6.39213C8.01496 4.08898 10.7929 2.47323 13.826 1.6937ZM5.04567 7.25669C6.23622 8.49685 7.58976 9.55276 9.06378 10.389C8.51102 12.5362 8.18504 14.9173 8.14252 17.4189H1.17638C1.30394 13.6843 2.66457 10.1197 5.04567 7.25669ZM5.04567 28.7433C2.65748 25.8803 1.30394 22.3158 1.17638 18.5811H8.14252C8.18504 21.0898 8.51102 23.4638 9.06378 25.611C7.59685 26.4543 6.24331 27.5032 5.04567 28.7433ZM5.81811 29.615C6.8811 28.5024 8.07874 27.5457 9.38268 26.7732C10.389 30.0543 11.948 32.7118 13.826 34.3134C10.7929 33.5268 8.01496 31.911 5.81811 29.615ZM17.4189 34.7953C14.4 34.4126 11.7992 31.0394 10.3961 26.2063C12.5646 25.1079 14.9598 24.4913 17.4189 24.3992V34.7953ZM17.4189 23.2441C14.8535 23.3291 12.3591 23.9598 10.0984 25.0654C9.62362 23.0811 9.34016 20.8913 9.29764 18.5811H17.4189V23.2441ZM17.4189 17.4189H9.29764C9.34016 15.1087 9.62362 12.9189 10.0984 10.9346C12.3661 12.0402 14.8606 12.6709 17.4189 12.7559V17.4189ZM17.4189 11.6008C14.9528 11.5157 12.5646 10.8921 10.3961 9.7937C11.7992 4.95354 14.4 1.5874 17.4189 1.20472V11.6008ZM30.9543 7.25669C33.3354 10.1197 34.6961 13.6843 34.8236 17.4189H27.8646C27.8221 14.9102 27.4961 12.5362 26.9433 10.389C28.4102 9.54567 29.7638 8.49685 30.9543 7.25669ZM30.1819 6.38504C29.1189 7.49764 27.9213 8.45433 26.6173 9.22677C25.611 5.94567 24.052 3.29528 22.174 1.68661C25.2071 2.47323 27.985 4.08898 30.1819 6.38504ZM18.5811 1.20472C21.6 1.5874 24.2008 4.96063 25.6039 9.7937C23.4354 10.8921 21.0472 11.5087 18.5811 11.6008V1.20472ZM18.5811 12.7559C21.1465 12.6709 23.6409 12.0402 25.9016 10.9346C26.3764 12.9189 26.6598 15.1087 26.7024 17.4189H18.5811V12.7559ZM18.5811 18.5811H26.7024C26.6598 20.8913 26.3764 23.0811 25.9016 25.0654C23.6195 23.9424 21.1233 23.3213 18.5811 23.2441V18.5811ZM18.5811 34.7953V24.3992C21.0472 24.4843 23.4354 25.1079 25.6039 26.2063C24.2008 31.0465 21.6 34.4126 18.5811 34.7953ZM22.174 34.3063C24.052 32.7047 25.611 30.0543 26.6173 26.7661C27.9213 27.5386 29.1189 28.4953 30.1819 29.6079C27.985 31.911 25.2071 33.5268 22.174 34.3063ZM30.9543 28.7433C29.7638 27.5032 28.4102 26.4543 26.9433 25.611C27.4961 23.4638 27.8221 21.0827 27.8646 18.5811H34.8236C34.6961 22.3158 33.3354 25.8803 30.9543 28.7433Z"
								fill="#3C72FC" />
						</svg>
						@endif
					</div>
					<h4 class="text-white mt-20">{{ $itemTranslation->title ?? '' }}</h4>
				</div>
			</div>
			@endforeach

		</div>
	</div>
</section>
<!-- Offer area end here -->