<!DOCTYPE html>
	<html lang="en" class="no-js">

	<head>

	<title>@yield('title')</title>

	@include('partials._scripts')

	@include('partials._head')

    @include('includes.header')

	</head>

      <div class="center-align" >
	     @if ( count( $errors ) > 0 )
	       @foreach ($errors->all() as $error)
	        <script>

	           Materialize.toast('{{ $error }} ', 3000, 'red rounded') 
	        </script>
	       @endforeach
	     @endif

	</div>

<body>


	<main>

        @yield('content')


	</main>                 


</body>

	@include('includes.footer')


</html>