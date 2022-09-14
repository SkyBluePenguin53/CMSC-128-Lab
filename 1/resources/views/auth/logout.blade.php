<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/InterArt Global CSS.css') }}">
    <script src="{{ asset('js/InterArt Gallery JS.js') }}" type="text/javascript"></script>
	<title>InterArt Gallery Logout</title>
</head>

<body id="MainBody">

	<ul class="NavBar">
	<!-- Navigation bar -->

		<div>
			<ul id="navi1">
				<!-- Clickable Home Title -->
				<li><a href="/home" id="TitleButton">InterArt Gallery</a></li>
			</ul>
		</div>
		<div>
			<ul id="navi2">
				<!-- Web pages -->
				<li><a href="/home/blogs">Find an Art!</a></li>
				<li><a href="/home/about">About Us</a></li>
				<li><a href="/home/login">Login</a></li>
				<li><a href="/home/registration">Register</a></li>
			</ul>
		</div>
		<div>
			<ul id="clock">
				<!-- Digital clock operated by linked JavaScript file -->
				<span id="hours">00</span>
				<span>:</span>
				<span id="minutes">00</span>
				<span>:</span>
				<span id="seconds">00</span>
				<span id="labelTime">-M</span>
			</ul>
		</div>
		
		
	</ul>

	<div class="lr-content">
		<div class="centerVandH">
			<!--session()->has('loginId')-->
			@if($status == 'manual')
				<h1>You are now logged out.</h1>
			@else
				<h1>Your session has expired due to inactivity.</h1>
			@endif
		</div>
	</div>

</body>
</html>
