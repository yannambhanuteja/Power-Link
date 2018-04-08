@extends('layouts.admaster') 
@section('title','Prove You are Human') 
@section('content')
<?php
$nav_foo_color = App\Settings::orderBy('created_at','desc')->first()->nav_foo_color;
?>

<nav id = "skipad"
class = "">
  <div class=" @if($nav_foo_color) {{$nav_foo_color}} @else blue darken-4 @endif nav-wrapper">
    <a href = "/" class="brand-logo"> @if($site_name) {{$site_name}}@endif </a> 
    <div class = "right-align">
    <a class = "btn-large btn orange waves"  id = "skip"
     class = "button" >Re Captcha</a> </div >
</div>
    </nav>
      <h5 class="red-text center-align" id="fab-enabled" style="display: none;">AdBlock is enabled. Please Disable adblock and refresh again</h5>
    <div class="holder" id="fab-not-enabled" style="display: none;">
<div class="main">
   <div >
   {!!$ads->top!!}
   <div>

    <div class="row">



    <div class=" col s12 l3 m3">
    {!!$ads->left!!}
    </div>

    <div class=" col s12 l6 m6">
<form method="POST" action="/link/recaptcha">
        <?php $settings = App\Settings::orderBy('updated_at','desc')->first(); ?>
            @if($settings)
            <div class="g-recaptcha" data-sitekey="{{$settings->google_api}}"></div>
            @endif {{csrf_field()}}
<br>
            <button type="submit" class="btn btn-waves green"> continue </button>
            <input type="hidden" name="linkname" value="{{Request::segment(1)}}">
    </form>
    {!!$ads->center!!}
    </div>

    <div class="col s12 l3 m3">
    {!!$ads->right!!}
    </div>


    </div>
    
    <footer>
    {!!$ads->footer!!}
    </footer>

   </div> 
</div>
<style type="text/css">
    #captcha {
        
        display:flex;
        justify-content:center;
 
    }


</style>
<script>
        // Function called if AdBlock is not detected
        function adBlockNotDetected() {
            document.querySelector('#fab-enabled').style.display = 'none';
            document.querySelector('#fab-not-enabled').style.display = 'block';
        }
        // Function called if AdBlock is detected
        function adBlockDetected() {
            document.querySelector('#fab-enabled').style.display = 'block';
            document.querySelector('#fab-not-enabled').style.display = 'none';
        }
        // We look at whether FuckAdBlock already exists.
        if(typeof fuckAdBlock !== 'undefined' || typeof FuckAdBlock !== 'undefined') {
            // If this is the case, it means that something tries to usurp are identity
            // So, considering that it is a detection
            adBlockDetected();
        } else {
            // Otherwise, you import the script FuckAdBlock
            var importFAB = document.createElement('script');
            importFAB.onload = function() {
                // If all goes well, we configure FuckAdBlock
                fuckAdBlock.onDetected(adBlockDetected)
                fuckAdBlock.onNotDetected(adBlockNotDetected);
            };
            importFAB.onerror = function() {
                // If the script does not load (integrity problem, ...)
                // Then a detection is triggered
                adBlockDetected(); 
            };
            importFAB.integrity = 'sha256-4/8cdZfUJoNm8DLRzuKwvhusQbdUqVov+6bVj9ewL7U=';
            importFAB.crossOrigin = 'anonymous';
            importFAB.src = 'https://cdnjs.cloudflare.com/ajax/libs/fuckadblock/3.2.1/fuckadblock.js';
            document.head.appendChild(importFAB);
        }
    </script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
    <script>
        document.querySelectorAll('pre code').forEach(function(element) {
            hljs.highlightBlock(element);
        });
    </script>
@endsection