<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/InterArt Global CSS.css') }}">
    <script src="{{ asset('js/InterArt Gallery JS.js') }}" type="text/javascript"></script>
	<title>InterArt Gallery About Us</title>
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
				<li><a href="/home">Home</a></li>
				<!-- Blade if condition if session has ID -->
				@if(session()->has('loginId'))
					<li><a href="/home/user/account">Welcome, {{$data2->penname}}!</a></li>
					<li><a href="/home/logout">Log out</a></li>
				@else
					<li><a href="/home/login">Login</a></li>
					<li><a href="/home/registration">Register</a></li>
				@endif
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

    <div class="content">
        <div class="centerVandH">
	        <div id="AboutUs">
	        <!-- About Us portion -->
		        <h1>About Us</h1>
                <p>InterArt Gallery is a free platform for artist netizens to showcase their work in any way they like to express.</p>
		        <p>Our goal is to show the variety of artworks made by the artists.</p>
		        <p>The artists in our gallery should be volunteers to post their works without expecting monetization, and so do the staff.</p>
	        </div>
        </div>
    </div>

</body>
</html>
