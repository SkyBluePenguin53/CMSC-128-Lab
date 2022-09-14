<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/InterArt Global CSS.css') }}">
    <script src="{{ asset('js/InterArt Gallery JS.js') }}" type="text/javascript"></script>
	<title>InterArt Gallery Account</title>
</head>

<body id="MainBody">
	<ul class="NavBar">
	<!-- Header portion -->
		
		<div>
			<ul id="navi1">
				<li><a href="/home" id="TitleButton">InterArt Gallery</a></li>
			</ul>
		</div>
		
		<div>
			<ul id="navi2">
				<li><a href="/home/blogs">Find an Art!</a></li>
				<li><a href="/home/about">About Us</a></li>
				<li><a href="/home/logout">Logout</a></li>
			</ul>
		</div>

		<div>
			<ul id="clock">
				<span id="hours">00</span>
				<span>:</span>
				<span id="minutes">00</span>
				<span>:</span>
				<span id="seconds">00</span>
				<span id="labelTime">-M</span>
			</ul>
		</div>
		
		
	</ul>

	<div id="accnt">
		
		<h1>{{$data2->penname}}</h1>

	</div>
	
	<div class="accBorders">
		<div>
			<h3>Posts</h3>
		</div>
		<div>
			<h3 id="add"><a href="{{route('post.create')}}" >Add Post</a></h3>
		</div>

	</div>
	
	<!-- One row with three column posts with edit and delete button. Can also view the post -->
	

</body>

</html>
