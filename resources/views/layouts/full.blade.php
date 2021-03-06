<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>

<head>
	<title>Smart Shop a Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Home ::
		w3layouts</title>
	<!-- for-mobile-apps -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Smart Shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

	<!-- //for-mobile-apps -->
	<link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
	<!-- pignose css -->
	<link href="{{asset('css/pignose.layerslider.css')}}" rel="stylesheet" type="text/css" media="all" />


	<!-- //pignose css -->
	<link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" media="all" />

	<!-- js -->
	<script type="text/javascript" src="{{asset('js/jquery-2.1.4.min.js')}}"></script>
	<!-- //js -->
	<!-- cart -->
	<script src="{{asset('js/simpleCart.min.js')}}"></script>
	<!-- cart -->
	<!-- for bootstrap working -->
	<script type="text/javascript" src="{{asset('js/bootstrap-3.1.1.min.js')}}"></script>
	<!-- //for bootstrap working -->
	<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link
		href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic'
		rel='stylesheet' type='text/css'>
	<script src="{{asset('js/jquery.easing.min.js')}}"></script>
</head>

<body>

	<!-- banner -->
	@include('partials.banner', [])

	<!-- //banner -->
	<!-- content -->

	@yield('content')

	<!-- //product-nav -->

	@include('partials.coupons', [])

	<!-- footer -->
	@include('partials.footer', [])

	<!-- footer -->
	<script src="{{asset('/assets/pages/checkout.js')}}"></script>
	
</body>

</html>