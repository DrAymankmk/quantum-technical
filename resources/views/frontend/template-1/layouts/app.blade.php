<!DOCTYPE html>
<html lang="en">

@include('frontend.template-1.layouts.head')

<body>

	<!-- Preloader area start -->
	<div class="loading">
		<span class="text-capitalize">L</span>
		<span>o</span>
		<span>a</span>
		<span>d</span>
		<span>i</span>
		<span>n</span>
		<span>g</span>
	</div>
	<div id="preloader">
	</div>
	<!-- Preloader area end -->

	<!-- Mouse cursor area start here -->
	<div class="mouse-cursor cursor-outer"></div>
	<div class="mouse-cursor cursor-inner"></div>
	<!-- Mouse cursor area end here -->

	@include('frontend.template-1.layouts.header')

	<main>

		@yield('content')

	</main>

	@include('frontend.template-1.layouts.footer')

	<!-- Back to top area start here -->
	<div class="scroll-up">
		<svg class="scroll-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
			<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
		</svg>
	</div>
	<!-- Back to top area end here -->

	@include('frontend.template-1.layouts.footer-scripts')
</body>

</html>