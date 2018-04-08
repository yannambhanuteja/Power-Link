<!DOCTYPE html>
	<html lang="en" class="no-js">
	<head>

	@include('admin.partials._head')


	</head>

<body>

	@include('admin.partials._session_notify')
	@include('admin.partials._sidenav')
	@include('admin.partials._topnav')
	
		<div class="container-fluid">
                
                @yield('content')

		</div>



		@include('admin.includes.footer')

</body>

		@include('admin.partials._scripts')
</html>