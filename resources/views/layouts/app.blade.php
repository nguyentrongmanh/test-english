<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Test english online</title>
	<!-- Scripts -->
	{{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

	<!-- Styles -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
		integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/home.css') }}" rel="stylesheet">
	<link href="{{ url('css/sweetalert.min.css') }}" rel="stylesheet">
	<link href="{{ url('css/quill.css') }}" rel="stylesheet">
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/home.js') }}"></script>
	<script src="{{ url('js/sweetalert.min.js') }}"></script>
</head>

<body>
	<div id="app">
		<main class="py-4">
			@include("layouts.common.header")
			@yield('content')
			@include("layouts.common.footer")
		</main>
	</div>
</body>

</html>