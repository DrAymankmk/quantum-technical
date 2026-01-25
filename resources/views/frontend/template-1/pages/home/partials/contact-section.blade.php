@php
$contactSection = $homePage->sections->where('name', 'Contact Us')->first();
$getInTouchSection = $homePage->sections->where('name', 'Get In Touch')->first();
$locale = app()->getLocale();
$contactTranslation = $contactSection->translation($locale);
$getInTouchTranslation = $getInTouchSection->translation($locale);
@endphp
<!-- Testimonial area start here -->
<section class="testimonial-area bg-image pt-120 pb-120"
	data-background="{{ asset('frontend/template-1/assets/images/bg/testimonial-bg.png') }}">
	<div class="container">
		<div class="row g-4">
			<div class="col-lg-6 wow fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
				<div class="talk-us__item">
					<div class="section-header mb-30">
						<h5 class="text-white">
							<svg width="28" height="12" viewBox="0 0 28 12"
								fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<rect x="0.75" y="0.75" width="18.5"
									height="10.5" rx="5.25"
									stroke="white"
									stroke-width="1.5" />
								<rect x="8" width="20" height="12"
									rx="6" fill="white" />
							</svg>
							{{ $getInTouchTranslation->subtitle ?? '' }}
						</h5>
						<h2 class="text-white">{{ $getInTouchTranslation->title ?? '' }}
						</h2>
					</div>
					<form action="#">
						<div class="row g-3">
							<div class="col-sm-6">
								<label for="name">{{ __('Your Name') }}
									*</label>
								<input type="text" id="name"
									placeholder="{{ __('Your Name') }}">
							</div>
							<div class="col-sm-6">
								<label for="email">{{ __('Your Email') }}
									*</label>
								<input type="email" id="email"
									placeholder="{{ __('Your Email') }}">
							</div>
							<div class="col-sm-6">
								<label for="subject">{{ __('Subject') }}
									*</label>
								<input type="text" id="subject"
										placeholder="{{ __('Subject') }}">
							</div>
							<div class="col-sm-6">
								<label for="number">{{ __('Your Phone') }}
									*</label>
								<input type="text" id="number"
									placeholder="{{ __('Your Phone') }}">
							</div>
							<div class="col-12">
								<label for="massage">{{ __('Message') }}
									*</label>
								<textarea id="massage"
									placeholder="{{ __('Write Message') }}"></textarea>
							</div>
						</div>
						<button class="btn-one">{{ __('Send Message') }}
							<i class="fa-regular fa-arrow-right-long"></i></button>
					</form>
				</div>
			</div>
			<div class="col-lg-6 ps-2 ps-lg-5">
				<div class="section-header mb-40">
					<h5 class="wow fadeInUp" data-wow-delay="00ms"
						data-wow-duration="1500ms">
						<img class="me-1"
							src="{{ asset('frontend/template-1/assets/images/icon/section-title.png') }}"
							alt="icon">
						{{ $contactTranslation->subtitle ?? '' }}
					</h5>
					<h2 class="wow fadeInUp" data-wow-delay="200ms"
						data-wow-duration="1500ms">
						{{ $contactTranslation->title ?? '' }}
					</h2>
					{!! $contactTranslation->description ?? '' !!}
				</div>
				<!-- <div class="swiper testimonial__slider wow fadeInDown"
							data-wow-delay="00ms" data-wow-duration="1500ms">
							<div class="swiper-wrapper">
								<div class="swiper-slide">
									<div
										class="testimonial__item">
										<svg class="coma"
											width="50"
											height="37"
											viewBox="0 0 50 37"
											fill="none"
											xmlns="http://www.w3.org/2000/svg">
											<path d="M0 0V37L18.75 18.5V0H0ZM31.25 0V37L50 18.5V0H31.25Z"
												fill="#3C72FC" />
										</svg>
										<div
											class="d-flex align-items-center gap-3">
											<img src="assets/images/testimonial/testimonial-image1.png"
												alt="image">
											<div
												class="testi-info">
												<h4>Suborna
													Tarchera
												</h4>
												<p>Web Developer
												</p>
												<div
													class="star mt-1">
													<i
														class="fa-sharp fa-solid fa-star"></i>
													<i
														class="fa-sharp fa-solid fa-star"></i>
													<i
														class="fa-sharp fa-solid fa-star"></i>
													<i
														class="fa-sharp fa-solid fa-star"></i>
													<i
														class="fa-sharp fa-solid fa-star disable"></i>
												</div>
											</div>
										</div>
										<p class="mt-30">“
											Consectetur
											adipiscing
											elit.
											Integer
											nunc
											viverra
											laoreet
											est
											the is
											porta
											pretium
											metus
											aliquam
											eget
											maecenas
											porta
											is nunc
											viverra
											Aenean
											pulvinar
											maximus
											leo ”</p>
									</div>
								</div>
								<div class="swiper-slide">
									<div
										class="testimonial__item">
										<svg class="coma"
											width="50"
											height="37"
											viewBox="0 0 50 37"
											fill="none"
											xmlns="http://www.w3.org/2000/svg">
											<path d="M0 0V37L18.75 18.5V0H0ZM31.25 0V37L50 18.5V0H31.25Z"
												fill="#3C72FC" />
										</svg>
										<div
											class="d-flex align-items-center gap-3">
											<img src="assets/images/testimonial/testimonial-image2.png"
												alt="image">
											<div
												class="testi-info">
												<h4>Alex Rony
												</h4>
												<p>Web Designer
												</p>
												<div
													class="star mt-1">
													<i
														class="fa-sharp fa-solid fa-star"></i>
													<i
														class="fa-sharp fa-solid fa-star"></i>
													<i
														class="fa-sharp fa-solid fa-star"></i>
													<i
														class="fa-sharp fa-solid fa-star"></i>
													<i
														class="fa-sharp fa-solid fa-star disable"></i>
												</div>
											</div>
										</div>
										<p class="mt-30">“
											Consectetur
											adipiscing
											elit.
											Integer
											nunc
											viverra
											laoreet
											est
											the is
											porta
											pretium
											metus
											aliquam
											eget
											maecenas
											porta
											is nunc
											viverra
											Aenean
											pulvinar
											maximus
											leo ”</p>
									</div>
								</div>
							</div>
						</div>
						<div class="testimonial__arry-btn mt-40 wow fadeInDown"
							data-wow-delay="200ms" data-wow-duration="1500ms">
							<button class="arry-prev testimonial__arry-prev"><i
									class="fa-light fa-chevron-left"></i></button>
							<button
								class="arry-next testimonial__arry-next active"><i
									class="fa-light fa-chevron-right"></i></button>
						</div> -->
			</div>
		</div>
	</div>
</section>
<!-- Testimonial area end here -->
