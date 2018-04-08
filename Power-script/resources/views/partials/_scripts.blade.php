<!-- CSS Scripts -->
<!-- Resource Scripts -->

<link rel="stylesheet" type="text/css" href="{{ asset('css/normalize.css')}}">
<!-- CSS Normalize -->

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.css">
<!-- CSS Animate -->

<?php 

   $keywords = App\Settings::orderBy('updated_at','Desc')->first()->keywords;
   $description = App\Settings::orderBy('updated_at','Desc')->first()->description;
   $favicon = App\Settings::orderBy('updated_at','Desc')->first()->site_favicon;
   ?>

    @if($favicon)
    <link rel=icon href="favicon/{{$favicon}}">
     @endif 
    @if($keywords)
    <meta name="description" content="{{$keywords}}">
     @endif 
    @if($description)
    <meta name="keywords" content="{{$description}}">
     @endif

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" integrity="sha384-4r9SMzlCiUSd92w9v1wROFY7DlBc5sDYaEBhcCJR7Pm2nuzIIGKVRtYWlf6w+GG4" crossorigin="anonymous">
    <!-- Ionic Icons -->

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css" integrity="sha384-dWITC98AsQMUiKuxGmf8VAqKir2FJad7WQzE/T65xqtXjvbsxCcEbrWHF21KJS8K" crossorigin="anonymous">

    <!-- CSS Stylesheet -->

    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css')}}">

    <!-- JS Scripts -->
    <!-- Jquery -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>

    <!-- JQuery-UI -->

    <script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.js"></script>
    <!-- Materialize JS -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js" integrity="sha384-heTZ+SHLkgoBsQj9hTz8vsRZw5qR50Nryob+++NHAlRWFHlFMFzb60OxB1DJFHzq" crossorigin="anonymous"></script>

    <!-- Modernizer JS -->

    <script src="{{ asset('js/modernizr.js') }}"></script>

    <!-- Resource jQuery -->

    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('select').material_select();
        });
    </script>