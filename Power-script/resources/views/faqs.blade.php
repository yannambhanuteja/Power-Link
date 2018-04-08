@extends('layouts.master')
@section('title', 'Faqs')
@section('content')
@foreach($faqs as $faq)
<div class="faqs-holder">
 <ul class=" collapsible" data-collapsible="accordion">
 	
    <li>
      <div class="z-depth-4 light-blue darken-4 white-text collapsible-header"><i class="material-icons">question_answer</i>{{$faq->question}}</div>
      <div class="black-text collapsible-body"><span>{{$faq->answer}}</span></div>
    </li>
   
  </ul>
</div>
 @endforeach

<style>
.faqs-holder{

	margin: 2%;
}      

</style>
@endsection