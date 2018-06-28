<!DOCTYPE html>
<html lang="en">
<head>
	<title>Labs - Design Studio</title>
	<meta charset="UTF-8">
	<meta name="description" content="Labs - Design Studio">
	<meta name="keywords" content="lab, onepage, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="{{asset('theme/img/favicon.ico')}}" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,700|Roboto:300,400,700" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{asset('theme/css/bootstrap.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('theme/css/font-awesome.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('theme/css/flaticon.css')}}"/>
	<link rel="stylesheet" href="{{asset('theme/css/magnific-popup.css')}}"/>
	<link rel="stylesheet" href="{{asset('theme/css/owl.carousel.css')}}"/>
	<link rel="stylesheet" href="{{asset('theme/css/style.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/custom-template.css')}}"/>


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader">
			<img src="{{asset('theme/img/logo.png')}}" alt="">
			<h2>Loading.....</h2>
		</div>
	</div>


	<!-- Header section -->
	<header class="header-section">
		<div class="logo">
			<img src="{{asset('theme/img/logo.png')}}" alt=""><!-- Logo -->
		</div>
		<!-- Navigation -->
		<div class="responsive"><i class="fa fa-bars"></i></div>
		<nav>
			<ul class="menu-list">
				<li class="active"><a href="{{route('main')}}">Home</a></li>
				<li><a href="{{route('services')}}">Services</a></li>
				<li><a href="{{route('blog')}}">Blog</a></li>
				<li><a href="{{route('contact')}}">Contact</a></li>
				{{-- <li><a href="elements.html">Elements</a></li> --}}
			</ul>
		</nav>
	</header>
  <!-- Header section end -->
  @yield('content')
  <!-- Footer section -->
	<footer class="footer-section">
		<h2>2017 All rights reserved. Designed by <a href="https://colorlib.com" target="_blank">Colorlib</a></h2>
	</footer>
	<!-- Footer section end -->




	<!--====== Javascripts & Jquery ======-->
	<script src="{{asset('theme/js/jquery-2.1.4.min.js')}}"></script>
	<script src="{{asset('theme/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('theme/js/magnific-popup.min.js')}}"></script>
	<script src="{{asset('theme/js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('theme/js/circle-progress.min.js')}}"></script>
	<script src="{{asset('theme/js/main.js')}}"></script>
	<script src="{{asset('js/app.js')}}" type="text/javascript"></script>

</body>
</html>