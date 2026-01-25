@php
$technicalSolutionsSection = $serviceSolutionPage->sections->where('name', 'Technical Solutions')->first();
$locale = app()->getLocale();
$translation = $technicalSolutionsSection->translation($locale);
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
						<img src="{{ asset('frontend/template-1/assets/images/it-solution-386.jpg') }}"
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
						<img src="{{ asset('frontend/template-1/assets/images/it-solution-295.jpg') }}"
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
						{{ $translation->subtitle }}
					</h5>
					<h2 class="wow fadeInUp" data-wow-delay="200ms"
						data-wow-duration="1500ms">{{ $translation->title }}
					</h2>
					{!! $translation->description !!}
				</div>
			</div>
		</div>
	</div>
</section>
<!-- About area end here -->