@php
$aboutSection = $homePage->sections->where('name', 'About')->first();
$locale = app()->getLocale();
$translation = $aboutSection->translation($locale);
$aboutImages = $aboutSection->getMedia('gallery');
$bigImage = $aboutImages->get(0);
$smallImage = $aboutImages->get(1);
@endphp

<!-- About area start here -->
<section class="about-area sub-bg pt-120">
	<div class="about__shape wow slideInLeft" data-wow-delay="400ms" data-wow-duration="1500ms">
		<img src="{{ asset('frontend/template-1/assets/images/shape/about-line.png') }}" alt="shape">
	</div>
	<div class="container">
		<div class="row g-4">
			<div class="col-xl-6 wow fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
				<div class="about__left-item">
					<div class="image big-image">
						<img src="{{ $bigImage ? $bigImage->getUrl() : asset('frontend/template-1/assets/images/about/about-image1.jpg') }}"
							alt="image">
					</div>
					<div class="image sm-image">
						<div class="video__btn-wrp">
							<div class="video-btn video-pulse">
								<a class="video-popup"
									href="https://www.youtube.com/watch?v=iVqz_4M5mA0"><i
										class="fa-solid fa-play"></i></a>
							</div>
						</div>
						<img src="{{ $smallImage ? $smallImage->getUrl() : asset('frontend/template-1/assets/images/about/about-image2.png') }}"
							alt="image">
					</div>
					<div class="circle-shape">
						<img src="{{ asset('frontend/template-1/assets/images/shape/about-circle.png') }}"
							alt="shape">
					</div>
				</div>
			</div>
			<div class="col-xl-6">
				<div class="section-header mb-40">
					<h5 class="wow fadeInUp" data-wow-delay="00ms"
						data-wow-duration="1500ms">
						<img class="me-1"
							src="{{ asset('frontend/template-1/assets/images/icon/section-title.png') }}"
							alt="icon">
						{{ $translation->subtitle ?? '' }}
					</h5>
					<h2 class="wow fadeInUp" data-wow-delay="200ms"
						data-wow-duration="1500ms"> {{ $translation->title ?? '' }}
					</h2>
					{!! $translation->description ?? '' !!}
				</div>
				<div class="row g-4 wow fadeInDown" data-wow-delay="200ms"
					data-wow-duration="1500ms">
					@foreach ($aboutSection->items as $item)
					@php
					$itemTranslation = $item->translation($locale);
					@endphp
					<div class="col-md-6">
						<div class="about__right-item">
							<div class="icon">
								@php
								$imageUrl = get_media_url( $item,
								'images', $locale, null, true);
								@endphp
								@if ($imageUrl)
								<img src="{{ $imageUrl }}"
									alt="{{ $itemTranslation->title ?? '' }}">
								@else
								<img src="{{ asset('frontend/template-1/assets/images/icon/about-icon1.png') }}"
									alt="icon">
								@endif
							</div>
							<div class="content">
								<h4 class="mb-1">
									{{ $itemTranslation->title ?? '' }}
								</h4>
								{!! $itemTranslation->content ?? '' !!}
							</div>
						</div>
					</div>
					@endforeach
				</div>
				<div class="about__info mt-50 wow fadeInDown" data-wow-delay="400ms"
					data-wow-duration="1500ms">
					<a href="{{ route('frontend.about.index') }}" class="btn-one">{{ __('Explore More') }}
						<i class="fa-regular fa-arrow-right-long"></i></a>

				</div>
			</div>
		</div>
	</div>
</section>
<!-- About area end here -->
