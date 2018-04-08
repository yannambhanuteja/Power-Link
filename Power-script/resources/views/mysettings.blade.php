@extends('layouts.master') 
@section('title','Settings') 
@section('content')
<form action="/Mysettings/{{$users->id}}" method="POST" class=" form-wrapper">
    {{csrf_field()}}

    <div class="input-field ">
        <label>User Name</label>
        <input name="name" type="text" value="{{$users->name}}">
    </div>
    <div class="input-field ">
        <label>Paypal Email</label>
        <input name="paypal_email" type="email" value="{{$users->paypal_email}}">
    </div>
    <br>

    <h5> Change Password </h5>

    <div class="input-field ">
        <label>Old Password</label>
        <input name="password" type="password">
    </div>
    <div class="input-field ">
        <label>New Password</label>
        <input name="newpassword" type="password">
    </div>
    <br>
    <input type="submit" class="btn blue waves-effect waves-light" value="Make Changes" id="submit">
</form>
<style>
    .form-wrapper {
        margin: 5%;
    }
</style>
@endsection