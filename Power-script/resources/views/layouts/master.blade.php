<!DOCTYPE html>
	<html lang="en" class="no-js">

	<head>

	<title>@yield('title')</title>

	@include('partials._scripts')

	@include('partials._head')

	@include('includes.header')

	@include('partials._topnav')
	</head>
	<div class="center-align" >
	@include('partials._session_n')

	</div>

	<body>


	<main>

	@yield('content')


	</main>                 

	</body>
	@include('includes.footer')

	</html>