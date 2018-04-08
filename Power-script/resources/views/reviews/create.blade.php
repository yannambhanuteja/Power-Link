@extends('layouts.master') @section('content')

<div class="card z-depth-2 col s12 m12 l12 review-form center-align" id="card-holder">

    <h4 class="center-align">Submit Your Review Here.. </h4>
    <br>
    <form action="{{route('review.store')}}" method="POST" enctype="multipart/form-data">

        {{csrf_field()}}
        <div class="row">
            <div class="input-field col s6">
                <i class="material-icons prefix">account_circle</i>
                <input id="icon_prefix" name="name" type="text" class="validate">
                <label for="icon_prefix">Name</label>
            </div>
            <div class="input-field col s6">
                <i class="material-icons prefix">work</i>
                <input id="icon_telephone" name="occupation" type="tel" class="validate">
                <label for="icon_telephone">occupation</label>
            </div>
            <div class="input-field col s12">
                <i class="material-icons prefix">mode_edit</i>
                <textarea name="review" id="icon_prefix2" class="materialize-textarea"></textarea>
                <label for="icon_prefix2">Review</label>
            </div>

        </div>
        <div class="row">
            <div class="range-field col s6">
                <label>Star Ratings</label>
                <input type="range" name="stars" min="1" max="5" />
            </div>

            <div class="file-field input-field col s6">
                <div class="btn">
                    <span>Photo</span>
                    <input name="image" type="file">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
        </div>

        <div class="center-align">

            <button type="submit" class="btn waves-effect waves-light green"> <i class="material-icons prefix">done</i> Submit </button>
            <br>
            <br>

        </div>
    </form>

    <style>
        .range-field {
            width: 40%;
            margin-left: 6%;
        }
        
        #range {
            width: 200px;
            margin-left: 10%;
        }
        
        .review-form {
            margin: 1%;
        }
        
        #card-holder {
            margin: 10%;
        }
    </style>
    @endsection