@extends('layouts.master') 
@section('title','Contact') 
@section('content')
<div class="container">
    <div class="row">
        <div class="z-depth-3 card hoverable col s12 m6 l6 offset-l3 offset-m3" id="contact">

            <h3 class="center-align"> Contact </h3>

            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="/contact">
                    {{ csrf_field() }}

                    <div class="input-field col s12">

                        <i class="material-icons prefix">person</i>

                        <input id="icon_perfix" type="text" class="validate" name="name" required>
                        <label for="icon_perfix" class="col-md-4 control-label">Name</label>

                    </div>

                    <div class="input-field col s12 ">

                        <i class="material-icons prefix">email</i>

                        <input id="icon_prefix" type="email" class="validate" name="email" required>

                        <label for="icon_prefix" class="col s6 control-label">E-Mail Address</label>

                    </div>
                    <div class="input-field col s12 ">

                        <i class="material-icons prefix">phone</i>

                        <input id="icon_prefix" type="tel" class="validate" name="number">

                        <label for="icon_prefix" class="col s6 control-label">Contact Number</label>

                    </div>

                    <div class="input-field col s12">
                        <i class="material-icons prefix">mode_edit</i>
                        <textarea id="icon_prefix2" name="message" class="materialize-textarea"></textarea>
                        <label for="icon_prefix2">Message</label>
                    </div>
                    <div class="center-align">
                        <button type="submit" class="pulse-expand blue btn waves-effect waves-light">
                            <i class="shrink fa fa-sign-in" aria-hidden="true"></i> Submit
                        </button>
                    </div>
                    <br>
                    <br>
            </div>
        </div>
        <style>
            #contact {
                margin-top: 7%;
            }
        </style>

        @endsection