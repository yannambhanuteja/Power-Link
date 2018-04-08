@extends('layouts.master') 
@section('title',''.str_replace('www.',Request::url(),'' )) 
@section('content')
<link href="https://fonts.googleapis.com/css?family=Paytone+One" rel="stylesheet"> @include('partials._welcomecss') 
<script>
AOS.init({
  duration: 1200,
})
</script>
<style>
body{
overflow-x:hidden;
}
</style>

<div class="slider">
    <ul class="slides">
        <li>
            <img src="/material.jpg">
            <!-- random image -->

            <div class="caption center-align">
                <link href="https://fonts.googleapis.com/css?family=Raleway:200,100,400" rel="stylesheet" type="text/css" />

                <h2 class="center-align"><a class="white-text"><b> Earn </b></a>
  <span
     class="txt-rotate"
     data-period="2000"
     data-rotate='[  "Money Shorterning Links."]'></span>
</h2>


<h5 >Enter your link below in the input field and start making money today</h5>
                
              


                @if(Session::has('links_s'))

<center class="">
<p id="p1">{{url('')}}/{{(Session::get('links_s')) }}</p>


<button class="btn btn-large blue waves-effect waves-light white-text" onclick="copyToClipboard('#p1')"><i class="large material-icons">content_copy</i>Copy</button>

  

</center>
@endif
                <form action="/link" method="POST" class="form-wrapper" data-aos="fade-down">
                    {{csrf_field()}}
                    <div class="input-field ">
                        <input placeholder="Enter Url" name="url" type="text" id="search" class="validate">
                        <?php 
$google_api = App\Settings::orderBy('created_at','desc')->first()->google_api;
$settingEnable = App\Settings::orderBy('created_at','desc')->first()->captcha;
?> 
                        @if($google_api AND $settingEnable=='yes')
            <div class="g-recaptcha" data-sitekey="{{$google_api}}"></div>
            @endif 
<br>
                     

                    </div>
                    <button type="submit" data-aos="fade-up" class="pulse-shrink btn waves-effect black-text waves-light white-text blue waves" id="submit"> <i class="fa fa-link" aria-hidden="true"></i> Shrink </button>
                </form>
                  <a class="hoverable btn-large btn waves-effect green white-text" href="/register">Sign Up
                    </a><a id="step_btn" class=""><i id="step" class=" white-text medium material-icons">arrow_forward</i></a>
                    <a class="hoverable btn-large btn waves-effect white black-text" href="#">Shorten Link
                    </a><a id="step_btn" class=""><i id="step" class=" white-text medium material-icons">arrow_forward</i></a>
                    <a class="hoverable btn-large btn waves-effect red white-text" href="#">Earn Money
                    </a>
            </div>
        </li>
    </ul>
</div>
<style>
#step {

  padding: 1%;
  vertical-align: middle;
}


.slider .slides li .caption {
    top: 10%;
}

.slider .slides li .caption > h2 {
    font-size: 50px;
    font-weight: 600;
    color: black;
}

.slider .slides li .caption > h5 {
    font-size: 20px;
    font-weight: 600;
    letter-spacing: 1px;
    color: rgba(255, 255, 255, 1) !important;
}

.slider .slides li .caption > form > button {
    height: auto;
    font-weight: 600;
    padding: 10px 50px;
    border-radius: 50px;
    color: rgba(255, 255, 255, 0.5);
    transition: 0.5s all ease-in-out;
}

.slider .slides li .caption > form > button:hover {
    color: rgba(255, 255, 255, 1);
}

.slider,
.slider > .slides {
    height: auto !important;
    min-height: 100vh !important;
}

.slider > .slides > li,
.slider > .slides > li > img {
    height: 100vh;
    background-size: cover;
}

#search{
 width: 50%;
 background-color: rgba(30, 34, 43,0.2);
 color: #fff;
 border: none !important;
 border-radius: 5px;
 box-shadow: none !important;
padding: 10px 20px;
font-size: 15px;
font-weight: 600;
}

#search::-webkit-input-placeholder {
    color: rgba(255, 255, 255,0.5);
}

#search:focus::-webkit-input-placeholder {
 color: rgba(30, 34, 43, 0.5);
}

#search:focus {
    background-color: #fff !important;
    color: #1e222b;
  border-bottom: 1px solid orange;
  -webkit-box-shadow: 0 1px 0 0 orange;
  -moz-box-shadow: 0 1px 0 0 orange;
   box-shadow: 0 1px 0 0 orange;
}
.g-recaptcha {
        display:none;
        justify-content:center;
}
</style>
<script>
    $(document).ready(function() {
        $('.slider').slider({
            indicators: false
        });
    });
</script>

<div class="referal" data-aos="fade-right" >
    <br>
    <br>
    <h1 class="text-longshadow" >
  Earn @if(App\Settings::all()->count()>0){{App\Settings::orderBy('updated_at','desc')->first()->referal_per}} % @endif Life Time Income Of Referal
    </h1>
    <br>
    <br> @if(!Auth::check())

    <div class="center-align">

        <a class="green darken-2 btn pulse-expand animated shake z-depth-4 hoverable white-text  btn-large btn waves-light waves-effect"> <i class="pulse-expand fa fa-sign-in" aria-hidden="true"></i>&ensp; Login </a> &ensp; &ensp; &ensp;
        <a class="orange button  animated pulse z-depth-4 hoverable white-text  btn-large btn waves-effect waves-light"><i class="pulse-expand fa fa-user-plus" aria-hidden="true"></i > Register </a>
        <br>
        <br>
        <br>
    </div>

    @endif
</div>



<?php
  $links = App\Links::all();
  $users = App\User::all();
  $payments = App\Payments::where('success','1')->count();
  $highest = App\Payments::where('success','1')->orderBy('amount','desc')->first();
?>


<section id="fun-facts" >
    <div class="container">
        <div class="row">
            <h2  data-aos="flip-right">Fun Facts</h2>
            <h6  data-aos="flip-right">Check our total stats and know more about us</h6>
            <div class="facts-holder">
                <div class="col s12 m6 l3" data-aos="zoom-in-up">
                    <i class="zoom-section medium material-icons icon-box z-depth-1 hoverable">sentiment_satisfied</i>
                    <h5>Total Users</h5>
                    <span class="counter" data-count="{{$users->count()}}">0</span>                    
                </div>
                <div class="col s12 m6 l3" data-aos="zoom-in-down">
                    <i class="zoom-section medium material-icons icon-box z-depth-1 hoverable">link</i>
                    <h5>Links Shrinked</h5>
                    <span class="counter" data-count="{{$links->count()}}">0</span>
                </div>
                <div class="col s12 m6 l3"  data-aos="zoom-in-up">
                    <i class="zoom-section medium material-icons icon-box z-depth-1 hoverable">money</i>
                    <h5>Payments Made</h5>
                    <span class="counter" data-count="{{$payments}}">0</span>
                </div>
                <div class="col s12 m6 l3" data-aos="zoom-in-down">
                    <i class="zoom-section medium material-icons icon-box z-depth-1 hoverable">class</i>
                    <h5>Highest Payment</h5>
                    <span class="counter" data-count="{{$highest->amount}}">0</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="user_steps">
    <div class="row ">
        <div class="center-align col s12 m3 l3 transition_ease" data-aos="zoom-in-up">
            <div class="z-depth-4  one_step text-center transition_ease">
                <i class="material-icons">add</i>

                <h4>Join</h4>
                <div class="step_caption transition_ease"  >
                    <p>Signup today and open doors to earn unlimited Income</p>
                    <a class="button_call_to_action btn waves-effect transition_ease" href="/register">Sign Up</a>
                </div>
            </div>
        </div>
        <div class="center-align col s12 m3 l3 transition_ease" data-aos="zoom-in-down">
            <div class="z-depth-4  one_step text-center transition_ease">
                <i class="material-icons">link</i>

                <h4>Shrink Links</h4>
                <div class="step_caption transition_ease">
                    <p>Shrik any link with us and generate a unqiue link.</p>
                    <a class="button_call_to_action btn waves-effect transition_ease" href="/register">Signup</a>
                </div>
            </div>
        </div>
        <div class="center-align col s12 m3 l3 transition_ease" data-aos="zoom-in-up">
            <div class="z-depth-4  one_step text-center transition_ease">
                <i class="material-icons">share</i>

                <h4>Share</h4>
                <div class="step_caption transition_ease">
                    <p>Share Your uniquely generated links on social media and boot your earning.</p>
                    <a class="button_call_to_action btn waves-effect transition_ease" href="/register">Signup</a>
                </div>
            </div>
        </div>
        <div class="center-align col s12 m3 l3 transition_ease" data-aos="zoom-in-down">
            <div class="z-depth-4  one_step text-center transition_ease">
                <i class="material-icons">money</i>

                <h4>Cashout</h4>
                <div class="step_caption transition_ease">
                    <p>Fastest payments will be made within 3-4 business days.</p>
                    <a class="button_call_to_action btn waves-effect transition_ease" href="/register">Signup</a>
                </div>
            </div>
        </div>
    </div>
</section>

@include('includes.reviews') 
@endsection