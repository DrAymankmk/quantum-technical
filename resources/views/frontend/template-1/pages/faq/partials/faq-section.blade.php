@php
$faqSection = $faqPage->sections->where('name', 'FAQs')->first();
$locale = app()->getLocale();
$translation = $faqSection->translation($locale);
@endphp

<!-- Faq area start here -->
<section class="faq-area pt-120 pb-120">
	<div class="container">
		<div class="row g-4">
			<div class="col-lg-5 pe-2 pe-lg-5">
				<div class="faq__image image wow fadeInRight" data-wow-delay="200ms"
					data-wow-duration="1500ms">
					<div class="faq__line sway__animation">
						<img src="{{ asset('frontend/template-1/assets/images/shape/faq-line.png') }}"
							alt="image">
					</div>
					@php
					$imageUrl = get_media_url( $faqSection, 'images', $locale, null,
					true);
					@endphp
					@if($imageUrl)
					<img src="{{ $imageUrl }}" alt="{{ $translation->title }}">
					@else
					<img src="{{ asset('frontend/template-1/assets/images/faqs/image-1.jpg') }}"
						alt="image">
					@endif
				</div>
			</div>
			<div class="col-lg-7 mt-60">
				<div class="section-header mb-40">
					<h5 class="wow fadeInUp" data-wow-delay="00ms"
						data-wow-duration="1500ms">
						<img class="me-1"
							src="{{ asset('frontend/template-1/assets/images/icon/section-title.png') }}"
							alt="icon">
						{{ $translation->subtitle }}
					</h5>
					<h2 class="wow fadeInUp" data-wow-delay="200ms"
						data-wow-duration="1500ms">{{ $translation->title }}</h2>
				</div>
				<div class="faq__item">
					<div class="accordion" id="accordionExample">
						@foreach ($faqSection->items as $item)
						@php
						$itemTranslation = $item->translation($locale);
						$headingId = 'heading-'.$loop->index;
						$collapseId = 'collapse-'.$loop->index;
						$isFirst = $loop->first;
						@endphp

						<div class="accordion-item wow fadeInDown shadow border-none"
							data-wow-delay="00ms" data-wow-duration="1500ms">
							<h2 class="accordion-header"
								id="{{ $headingId }}">
								<button class="accordion-button {{ $isFirst ? '' : 'collapsed' }}"
									type="button"
									data-bs-toggle="collapse"
									data-bs-target="#{{ $collapseId }}"
									aria-expanded="{{ $isFirst ? 'true' : 'false' }}"
									aria-controls="{{ $collapseId }}">
									{{ $itemTranslation->title }}
								</button>
							</h2>
							<div id="{{ $collapseId }}"
								class="accordion-collapse collapse {{ $isFirst ? 'show' : '' }}"
								aria-labelledby="{{ $headingId }}"
								data-bs-parent="#accordionExample">
								<div class="accordion-body">
									{!! $itemTranslation->content
									!!}
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Faq area end here -->
