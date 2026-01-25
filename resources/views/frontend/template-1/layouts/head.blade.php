<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Quantum Solution - IT Service HTML Template</title>
	<!-- Favicon img -->
	<link rel="shortcut icon" href="{{ asset('frontend/template-1/assets/images/favicon.png') }}">
	<!-- Bootstarp min css -->
	<link rel="stylesheet" href="{{ asset('frontend/template-1/assets/css/bootstrap.min.css') }}">
	<!-- Mean menu css -->
	<link rel="stylesheet" href="{{ asset('frontend/template-1/assets/css/meanmenu.css') }}">
	<!-- All min css -->
	<link rel="stylesheet" href="{{ asset('frontend/template-1/assets/css/all.min.css') }}">
	<!-- Swiper bundle min css -->
	<link rel="stylesheet" href="{{ asset('frontend/template-1/assets/css/swiper-bundle.min.css') }}">
	<!-- Magnigic popup css -->
	<link rel="stylesheet" href="{{ asset('frontend/template-1/assets/css/magnific-popup.css') }}">
	<!-- Animate css -->
	<link rel="stylesheet" href="{{ asset('frontend/template-1/assets/css/animate.css') }}">
	<!-- Nice select css -->
	<link rel="stylesheet" href="{{ asset('frontend/template-1/assets/css/nice-select.css') }}">
	
	@if (App::getLocale() == 'en')
		<!-- Style css -->
		<link rel="stylesheet" href="{{ asset('frontend/template-1/assets/css/style.css') }}">
	@else
		<link rel="stylesheet" href="{{ asset('frontend/template-1/assets/css/rtl_style.css') }}">
	@endif

	@stack('styles')
</head>
