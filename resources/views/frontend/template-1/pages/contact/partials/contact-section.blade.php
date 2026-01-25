@php
$contactInfoSection = $contactPage->sections->where('name', 'Contact Info')->first();
$locale = app()->getLocale();
$contactInfoTranslation = $contactInfoSection->translation($locale);
$getInTouchSection = $contactPage->sections->where('name', 'Get In Touch')->first();
$getInTouchTranslation = $getInTouchSection->translation($locale);

@endphp
<!-- Contact area start here -->
<section class="contact-area pt-120 pb-120">
	<div class="container">
		<div class="row g-4">
			<div class="col-lg-5">
				<div class="contact__left-item primary-bg">
					<h3 class="text-white mb-30">{{ $contactInfoTranslation->title }}</h3>
					<div class="contact-info-description">
						{!! $contactInfoTranslation->description !!}
					</div>
					<ul class="mt-40 mb-40">
						<li>
							<i>
								<svg width="30" height="30"
									viewBox="0 0 30 30"
									fill="none"
									xmlns="http://www.w3.org/2000/svg">
									<path d="M23.7891 1.81641H16.7578C13.3658 1.81641 10.6055 4.5767 10.6055 7.96875C10.6055 11.063 12.9015 13.631 15.8789 14.0585V16.7578C15.8788 16.9317 15.9303 17.1016 16.0268 17.2462C16.1234 17.3907 16.2607 17.5033 16.4214 17.5697C16.7456 17.705 17.1258 17.6325 17.3793 17.3792L20.6374 14.1211H23.7891C27.1811 14.1211 30 11.3608 30 7.96875C30 4.5767 27.1811 1.81641 23.7891 1.81641ZM16.7578 8.84754C16.2723 8.84754 15.8789 8.45402 15.8789 7.96863C15.8789 7.48324 16.2723 7.08973 16.7578 7.08973C17.2432 7.08973 17.6367 7.48324 17.6367 7.96863C17.6367 8.45402 17.2432 8.84754 16.7578 8.84754ZM20.2734 8.84754C19.7879 8.84754 19.3945 8.45402 19.3945 7.96863C19.3945 7.48324 19.7879 7.08973 20.2734 7.08973C20.7588 7.08973 21.1523 7.48324 21.1523 7.96863C21.1523 8.45402 20.7588 8.84754 20.2734 8.84754ZM23.7891 8.84754C23.3036 8.84754 22.9102 8.45402 22.9102 7.96863C22.9102 7.48324 23.3036 7.08973 23.7891 7.08973C24.2745 7.08973 24.668 7.48324 24.668 7.96863C24.668 8.45402 24.2745 8.84754 23.7891 8.84754Z"
										fill="#3C72FC" />
									<path d="M19.7461 28.1836C21.2 28.1836 22.3828 27.0008 22.3828 25.5469V22.0312C22.3828 21.6527 22.1408 21.3171 21.782 21.1978L16.5209 19.44C16.2634 19.3533 15.9819 19.3928 15.7553 19.5421L13.5186 21.033C11.1496 19.9035 8.33871 17.0925 7.20914 14.7236L8.7 12.4868C8.77415 12.3754 8.82189 12.2485 8.83958 12.1158C8.85728 11.9831 8.84447 11.8482 8.80213 11.7212L7.04432 6.46014C6.98611 6.28516 6.87428 6.13295 6.72469 6.02512C6.5751 5.91728 6.39534 5.85929 6.21094 5.85938H2.63672C1.18277 5.85938 0 7.02979 0 8.48373C0 18.61 9.6198 28.1836 19.7461 28.1836Z"
										fill="#3C72FC" />
								</svg>
							</i>
							<div>
								<span class="text-white">Call Us
									7/24</span>
								<h3 class="mt-1"><a class="text-white"
										href="tel:+0580161257">+0580161257</a>
								</h3>
							</div>
						</li>
						<li>
							<i>
								<svg width="30" height="30"
									viewBox="0 0 30 30"
									fill="none"
									xmlns="http://www.w3.org/2000/svg">
									<path d="M12.6503 10.8272C12.8028 10.914 12.9765 10.9569 13.1519 10.9509C13.3316 10.9344 13.5058 10.8798 13.6628 10.7906L24.9222 4.22062C24.6775 3.79416 24.3249 3.43955 23.8999 3.19239C23.4749 2.94523 22.9923 2.81422 22.5006 2.8125H3.75063C3.25879 2.81406 2.77603 2.94499 2.35081 3.19216C1.92559 3.43932 1.57289 3.79402 1.32812 4.22062L12.6503 10.8272Z"
										fill="#3C72FC" />
									<path d="M25.3125 6.15938V12.675C24.4104 12.3503 23.4587 12.1854 22.5 12.1875C20.2633 12.191 18.1192 13.081 16.5376 14.6626C14.956 16.2442 14.066 18.3883 14.0625 20.625C14.0623 20.9384 14.0811 21.2514 14.1188 21.5625H3.75C3.00476 21.5603 2.29069 21.2632 1.76372 20.7363C1.23676 20.2093 0.939726 19.4952 0.9375 18.75V6.15938L11.7094 12.45C12.1434 12.6874 12.6303 12.8118 13.125 12.8118C13.6197 12.8118 14.1066 12.6874 14.5406 12.45L25.3125 6.15938Z"
										fill="#3C72FC" />
									<path d="M22.5 14.0625C20.7595 14.0625 19.0903 14.7539 17.8596 15.9846C16.6289 17.2153 15.9375 18.8845 15.9375 20.625C15.9375 22.3655 16.6289 24.0347 17.8596 25.2654C19.0903 26.4961 20.7595 27.1875 22.5 27.1875C22.7486 27.1875 22.9871 27.0887 23.1629 26.9129C23.3387 26.7371 23.4375 26.4986 23.4375 26.25C23.4375 26.0014 23.3387 25.7629 23.1629 25.5871C22.9871 25.4113 22.7486 25.3125 22.5 25.3125C21.5729 25.3125 20.6666 25.0376 19.8958 24.5225C19.1249 24.0074 18.5241 23.2754 18.1693 22.4188C17.8145 21.5623 17.7217 20.6198 17.9026 19.7105C18.0834 18.8012 18.5299 17.966 19.1854 17.3104C19.841 16.6549 20.6762 16.2084 21.5855 16.0276C22.4948 15.8467 23.4373 15.9395 24.2938 16.2943C25.1504 16.6491 25.8824 17.2499 26.3975 18.0208C26.9126 18.7916 27.1875 19.6979 27.1875 20.625V21.5625C27.1875 21.8111 27.0887 22.0496 26.9129 22.2254C26.7371 22.4012 26.4986 22.5 26.25 22.5C26.0014 22.5 25.7629 22.4012 25.5871 22.2254C25.4113 22.0496 25.3125 21.8111 25.3125 21.5625V20.625C25.3125 20.0687 25.1476 19.525 24.8385 19.0625C24.5295 18.5999 24.0902 18.2395 23.5763 18.0266C23.0624 17.8137 22.4969 17.758 21.9513 17.8665C21.4057 17.9751 20.9046 18.2429 20.5113 18.6363C20.1179 19.0296 19.8501 19.5307 19.7415 20.0763C19.633 20.6219 19.6887 21.1874 19.9016 21.7013C20.1145 22.2152 20.4749 22.6545 20.9375 22.9635C21.4 23.2726 21.9437 23.4375 22.5 23.4375C22.9843 23.4344 23.4594 23.3048 23.8781 23.0616C24.2022 23.578 24.6856 23.9748 25.2552 24.1921C25.8248 24.4094 26.4496 24.4353 27.0353 24.266C27.621 24.0967 28.1356 23.7412 28.5013 23.2535C28.867 22.7657 29.064 22.1721 29.0625 21.5625V20.625C29.0605 18.8851 28.3685 17.2171 27.1382 15.9868C25.9079 14.7565 24.2399 14.0645 22.5 14.0625ZM22.5 21.5625C22.3146 21.5625 22.1333 21.5075 21.9792 21.4045C21.825 21.3015 21.7048 21.1551 21.6339 20.9838C21.5629 20.8125 21.5443 20.624 21.5805 20.4421C21.6167 20.2602 21.706 20.0932 21.8371 19.9621C21.9682 19.831 22.1352 19.7417 22.3171 19.7055C22.499 19.6693 22.6875 19.6879 22.8588 19.7589C23.0301 19.8298 23.1765 19.95 23.2795 20.1042C23.3825 20.2583 23.4375 20.4396 23.4375 20.625C23.4375 20.8736 23.3387 21.1121 23.1629 21.2879C22.9871 21.4637 22.7486 21.5625 22.5 21.5625Z"
										fill="#3C72FC" />
								</svg>
							</i>
							<div>
								<span class="text-white">
									{{ __('Make a Quote') }}</span>
								<h3 class="mt-1"><a class="text-white"
										href="mailto:info@quantum-technical.com">info@quantum-technical.com</a>
								</h3>
							</div>
						</li>

					</ul>
					<h4 class="text-white mb-20">
						Follow Social:
					</h4>
					<div class="social">
						<a href="#0"><i class="fa-brands fa-facebook-f"></i></a>
						<a href="#0"><i class="fa-brands fa-twitter"></i></a>
						<a href="#0"><i class="fa-brands fa-linkedin-in"></i></a>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="contact__right-item">
					<div class="section-header mb-20">
						<h5 class="wow fadeInUp pb-2" data-wow-delay="00ms"
							data-wow-duration="1500ms">
							<img class="me-1"
								src="{{ asset('frontend/template-1/assets/images/icon/section-title.png') }}"
								alt="icon">
							{{ $getInTouchTranslation->subtitle }}
						</h5>
						<h2 class="wow fadeInUp" data-wow-delay="200ms"
							data-wow-duration="1500ms">
							{{ $getInTouchTranslation->title }}
						</h2>
						{!! $getInTouchTranslation->description !!}
					</div>
					<div class="contact__form">
						@if(session('success'))
							<div class="alert alert-success" role="alert">
								{{ session('success') }}
							</div>
						@endif
						@if(session('error'))
							<div class="alert alert-danger" role="alert">
								{{ session('error') }}
							</div>
						@endif
						@if($errors->any())
							<div class="alert alert-danger" role="alert">
								<ul class="mb-0">
									@foreach($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif
						<form id="contact-form" method="POST" action="{{ route('frontend.contact.send') }}">
							@csrf
							<div class="row">
								<div class="col-6">
									<label for="name">{{ __('Your Name') }}
										*</label>
									<input id="name" name="name"
										class="bg-transparent bor"
										type="text"
										placeholder="{{ __('Your Name') }}"
										required>
								</div>
								<div class="col-6">
									<label for="email">{{ __('Your Email') }}
										*</label>
									<input class="bg-transparent bor"
										id="email"
										name="email"
										type="email"
										placeholder="{{ __('Your Email') }}"
										required>
								</div>
							</div>
							<div class="text-area">
								<label for="massage">{{ __('Write Message') }}
									*</label>
								<textarea class="bg-transparent bor"
									id="massage" name="message"
									placeholder="{{ __('Write Message') }}"
									required></textarea>
							</div>
							<div id="form-message"
								style="display: none; padding: 15px; margin-bottom: 20px; border-radius: 5px;">
							</div>
							<div class="btn-two">
								<span class="btn-circle">
								</span>
								<button type="submit" class="btn-one"
									id="submit-btn">{{ __('Send Message') }}
									<i
										class="fa-regular fa-arrow-right-long"></i></button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Contact area end here -->