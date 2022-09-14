<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/InterArt Global CSS.css') }}">
    <script src="{{ asset('js/InterArt Gallery JS.js') }}" type="text/javascript"></script>
	<title>InterArt Gallery Register</title>
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
			<h1>Register</h1>
			<!-- Registration Form -->
			<form action="{{route('register-user')}}" method="post">

				<!-- Session registration status -->
				@if(Session::has('success'))
				<div id="accntPosResult">{{Session::get('success')}}</div>
				@endif
				@if(Session::has('fail'))
				<div id="accntNegResult">{{Session::get('fail')}}</div>
				@endif
				@csrf

				<!-- Registration inputs (Pen name and password) -->
				<label id="lrLabel">Penname</label>
				<input type="text" class="lrinputs" name="penname" value="{{old('penname')}}" placeholder="Penname">
				<label id="lrLabel">Password</label>
				<input id="passid" type="password" class="lrinputs" name="password" placeholder="Password">
				
				<!-- Password Notes -->
				<label><small>*The password must consists of at least 8 
	characters containing 1 capital letter, 1 number, and 1 symbol.</label>

				<br>
				<!-- Password reveal operated by linked JavaScript file -->
				<input type="checkbox" onclick="showPassword()"> Reveal Password

				<br>
				<!-- Error portion for penname -->
				<span id="accntError">@error('penname'){{$message}} @enderror</span>
				<br>
				<!-- Error portion for password -->
				<span id="accntError">@error('password'){{$message}} @enderror</span>

				<!-- Submit button -->
				<div id="submits">
					<input type="submit" name="create" value="Create account"/>
				</div>

			</form>
		</div>
	</div>

</body>
</html>
