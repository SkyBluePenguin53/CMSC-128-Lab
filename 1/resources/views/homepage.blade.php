<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/InterArt Global CSS.css') }}">
    <script src="{{ asset('js/InterArt Gallery JS.js') }}" type="text/javascript"></script>
	<title>InterArt Gallery Homepage</title>
</head>

<body id="MainBody">

	<ul class="NavBar">
	<!-- Header portion -->

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

				<!-- Blade if condition if session has ID -->
				@if(session()->has('loginId'))
					<li><a href="/home/user/account">Welcome, {{$data2->penname}}!</a></li>
					<li><a href="/home/logout">Log out</a></li>
				@else
					<li><a href="/home/login">Login</a></li>
					<li><a href="/home/registration">Register</a></li>
				@endif
				</li>
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

	<div id="B1" class="BodyH">
	<!-- First Body contents for Homepage -->
		<div class="HPic">
			<!-- Creative Artwork Sample -->
			<img src="{{asset('images/Calabash.png')}}" alt="Creative Artwork Sample">
		</div>

		<div>
			<!-- Statement -->
			<h1>ONLINE ART GALLERY<br>FOR ART NETIZENS</h1>
		</div>
	</div>

	<div id="B2" class="BodyH">
	<!-- Second Body contents for Homepage -->
		<div>
			<!-- Statement -->
			<h1>A FREE ART GALLERY<br>OF ANY MEDIUM<br>FOR EVERYONE</h1>
		</div>

		<div class="HPic">
			<!-- Creative Artwork Sample -->
			<img src="{{asset('images/Futurism Laptop.png')}}" alt="Creative Artwork Sample">
		</div>
	</div>

</body>
</html>
