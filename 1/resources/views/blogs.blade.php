<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/InterArt Global CSS.css') }}">
    <script src="{{ asset('js/InterArt Gallery JS.js') }}" type="text/javascript"></script>
	<title>InterArt Gallery Blogs</title>
</head>

<body id="MainBody">

	<ul class="NavBar">
	<!-- Navigation bar -->
		<div>
			<ul id="navi1">
				<li><a href="/home" id="TitleButton">InterArt Gallery</a></li>
			</ul>
		</div>
		
		<div>
			<ul id="navi2">
				<!-- Web pages -->
				<li><a href="/home">Home</a></li>
				<li><a href="/home/about">About Us</a></li>
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

	<div id="searchDiv">
		<form action="" >
			<!-- Search Bar -->
			<div id="searchBar">
		  		<input type="search" name="search" placeholder="Search an art...">
			</div>
			<div id="searchBar">
				<input type="submit">
			</div>
		</form>
	</div>

	<div id="FindArt" class="BodyB">
	<!-- First Body contents for Blogs -->
		
		<h1 class="FA1">FIND AN ART BELOW!</h1>
		
        <!--$posts-->
		
	</div>


</body>

</html>
