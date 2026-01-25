@php
$whoWeAreSection = $aboutPage->sections->where('name', 'Who We Are')->first();
$locale = app()->getLocale();
$translation = $whoWeAreSection->translation($locale);
@endphp
<!-- About area start here -->
<section class="about-two-area pt-120">
	<div class="about-two__shape">
		<img src="{{ asset('frontend/template-1/assets/images/shape/about-two-shape.png') }}" alt="shape">
	</div>
	<div class="container">
		<div class="row g-4">
			<div class="col-xl-6 wow fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
				<div class="about-two__left-item">
					<div class="dots">
						<img class="sway_Y__animation"
							src="{{ asset('frontend/template-1/assets/images/shape/about-two-dot.png') }}"
							alt="shape">
					</div>
					<div class="shape-halper">
						<img class="sway__animation"
							src="{{ asset('frontend/template-1/assets/images/shape/about-circle-helper.png') }}"
							alt="shape">
					</div>
					<div class="image big-image">
						<img src="{{ asset('frontend/template-1/assets/images/about/about-1.jpg') }}"
							alt="image">
					</div>
					<div class="image sm-image">
						<img src="{{ asset('frontend/template-1/assets/images/about/about-2.jpg') }}"
							alt="image">
					</div>
					<div class="circle-shape">
						<img class="animation__rotate"
							src="{{ asset('frontend/template-1/assets/images/shape/about-two-circle.png') }}"
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
						{{ $translation->subtitle }}
					</h5>
					<h2 class="wow fadeInUp" data-wow-delay="200ms"
						data-wow-duration="1500ms">{{ $translation->title }}
					</h2>
					{!! $translation->description !!}
				</div>
				<div class="about-two__right-item wow fadeInDown" data-wow-delay="200ms"
					data-wow-duration="1500ms">
					<div class="row g-3">
						@foreach ($whoWeAreSection->items as $item)
						@php
						$itemTranslation = $item->translation($locale);
						@endphp
						<div class="col-md-6">
							<ul class="mb-0">
								<li><i class="fa-solid fa-check"></i>{{ $itemTranslation->title }}
								</li>
							</ul>
						</div>
						@endforeach
					</div>
				</div>
				<!-- <div class="about__info mt-50 wow fadeInDown" data-wow-delay="400ms" data-wow-duration="1500ms">
                            <a href="#0" class="btn-one">Explore More <i class="fa-regular fa-arrow-right-long"></i></a>
                            <img src="assets/images/about/singature.png" alt="singature">
                        </div> -->
			</div>
		</div>
	</div>
</section>
<!-- About area end here -->