@extends('layouts.admin') @section('content')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

<div class="form-group">

    {!! Form::model($reviews,['route'=>['reviews.update',$reviews->id],'method'=>'PUT','files'=>'true']) !!} {{csrf_field()}}

    <div class="form-group">
        <label>User Name</label>
        <input type="text" value="{{$reviews->users_name}}" name="name" placeholder="users name" class="form-control" />

    </div>
    <div class="form-group">
        <label>Review</label>
        <input type="text" value="{{$reviews->review}}" name="review" placeholder="review" class="form-control" />

    </div>
    <div class="form-group">
        <label>occupation</label>
        <input type="text" value="{{$reviews->occupation}}" name="occupation" placeholder="user occupation" class="form-control" />

    </div>
    <div class="form-group">
        <label>Give star rating (1 to 5)</label>
        <input type="text" value="{{$reviews->stars}}" name="stars" placeholder="star rating" class="form-control" />

    </div>
    <div class="input-group">
        <label for="image">User Image</label>
        <input type="file" name="image" class="form-control-file" id="image">
    </div>

    <button type="submit" class="btn btn-success">Update Review</button>

    {!!Form::close()!!}
</div>

<style>
    .blue-text {
        color: #0099ff;
    }
    
    .red-text {
        color: #ff3b00;
    }
    
    .red-text-darken {
        color: #d11919;
    }
    
    .insta {
        color: #d11919;
    }
</style>
@endsection