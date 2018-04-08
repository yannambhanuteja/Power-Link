@extends('layouts.admin') 
@section('content')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

<div class="form-group">

    <form action="/admin/settings" method="POST" enctype="multipart/form-data">

        {{csrf_field()}}

        <div class="form-group">

            <input type="text" value="" name="site_name" placeholder="Site Name" class="form-control" />

        </div>
        <div class="form-group">

            <input type="text" value="" name="site_description" placeholder="Site Description" class="form-control" />

        </div>
        <div class="input-group">
            <label for="site_logo">Site Logo</label>
            <input type="file" name="site_logo" class="form-control-file" id="site_logo">
        </div>
        <div class="input-group">
            <label for="favicon">Favicon</label>
            <input type="file" name="favicon" class="form-control-file" id="favicon">
        </div>

        <div class="form-group">
            <label for="captch">Enable Captcha for re-visiting users to redirect to Advertisemnt page ?</label>
            <select class="form-control" name="captcha" id="captch">
                <option value="yes">Yes</option>
                <option value="no">No</option>

            </select>
        </div>
        <div class="form-group">
            <label for="email_verification">Enable Email verification for new users ?</label>
            <select class="form-control" name="email_verify" id="email_verification">
                <option value="yes">Yes</option>
                <option value="no">No</option>

            </select>
        </div>

        <div class="form-group">
            <label for="email_verification">Enable Admin Registration ?</label>
            <select class="form-control" name="admin_register" id="email_verification">
                <option value="yes">Yes</option>
                <option value="no">No</option>

            </select>
        </div>

        <label>Google Captcha Api</label>

        <div class="form-group">

            <input type="text" class="form-control" name="google_api" placeholder="Google Captcha Api">

        </div>
        <label>Minimum Payout</label>

        <div class="input-group">
            <span class="input-group-addon">$</span>
            <input type="text" class="form-control" name="min_payout" placeholder="Minimum Payout" aria-label="Amount (to the nearest dollar)">
            <span class="input-group-addon">.00</span>
        </div>

        <label>Referal Percentage</label>

        <div class="input-group">

            <input type="text" class="form-control" name="referal_per" placeholder="Referal Percentage" aria-label="Amount (to the nearest dollar)">
            <span class="input-group-addon">%</span>
        </div>

        <label>Navigation and Footer Backgroud color</label>

<div class="color-picker">


  <div class="color-picker__item">
    <input id="input1" type="radio" class="form-group color-picker__input" name="color_pick" value="red"/>
    <label for="input1" class="color-picker__color  color-picker_red"></label>
  </div>

  <div class="color-picker__item">
    <input id="input2" type="radio" class="color-picker__input" name="color_pick" value="black"/>
    <label for="input2" class="color-picker__color color-picker__color--black"></label>
  </div>
  
  <div class="color-picker__item">
    <input id="input3" type="radio" class="color-picker__input" name="color_pick" value="pink darken-1"/>
    <label for="input3" class="color-picker__color color-picker_pink"></label>
  </div>
    
  <div class="color-picker__item">
    <input id="input4" type="radio" class="color-picker__input" name="color_pick" value="purple darken-1"/>
    <label for="input4" class="color-picker__color color-picker_purple"></label>
  </div>
    
  <div class="color-picker__item">
    <input id="input5" type="radio" class="color-picker__input" name="color_pick" value="indigo darken-1"/>
    <label for="input5" class="color-picker__color color-picker_indigo"></label>
  </div>
    
  <div class="color-picker__item">
    <input id="input6" type="radio" class="color-picker__input" name="color_pick" value="blue darken-1"/>
    <label for="input6" class="color-picker__color color-picker_blue"></label>
  </div>
    
  <div class="color-picker__item">
    <input id="input7" type="radio" class="color-picker__input" name="color_pick" value="orange darken-1"/>
    <label for="input7" class="color-picker__color color-picker_orange"></label>
  </div>
    
  <div class="color-picker__item">
    <input id="input8" type="radio" class="color-picker__input" name="color_pick" value="cyan darken-1"/>
    <label for="input8" class="color-picker__color color-picker_cyan"></label>
  </div>
    
  <div class="color-picker__item">
    <input id="input9" type="radio" class="color-picker__input" name="color_pick" value="teal darken-1"/>
    <label for="input9" class="color-picker__color color-picker_teal"></label>
  </div>
    
  <div class="color-picker__item">
    <input id="input10" type="radio" class="color-picker__input" name="color_pick" value="green darken-1"/>
    <label for="input10" class="color-picker__color color-picker_green"></label>
  </div>
</div>


<br>

        <label>Facebook Connect</label>

        <div class="input-group">

            <input type="text" name="facebook" placeholder="Facebook Connect" class="form-control">

            <span class="input-group-addon"><i class="blue-text fa fa-facebook-official" aria-hidden="true"></i></span>

        </div>
        <label>Twitter Connect</label>

        <div class="input-group">

            <input type="text" name="twitter" placeholder="Twitter Connect" class="form-control">

            <span class="input-group-addon"><i class="blue-text fa fa-twitter" aria-hidden="true"></i></span>

        </div>

        <label>Google Plus Connect</label>

        <div class="input-group">

            <input type="text" name="google" placeholder="Google Plus Connect" class="form-control">

            <span class="input-group-addon"><i class="red-text-darken fa fa-google-plus-official" aria-hidden="true"></i></span>

        </div>
        <label>Youtube Connect</label>

        <div class="input-group">

            <input type="text" name="youtube" placeholder="Youtube Connect" class="form-control">

            <span class="input-group-addon"><i class="red-text fa fa-youtube" aria-hidden="true"></i></span>

        </div>
        <label>Instagram Connect</label>

        <div class="input-group">

            <input type="text" name="instagram" placeholder="Instagram Connect" class="form-control">

            <span class="input-group-addon"><i class="insta fa fa-instagram" aria-hidden="true"></i></span>

        </div>
        <label>Site Meta Keywords</label>

        <textarea class="form-control" name="meta_keywords" placeholder="Site Meta Keywords" rows="6"></textarea>
        <br>
        <label>Add Footer Text</label>

        <textarea class="form-control" name="footer" placeholder="Footer Text" rows="4"></textarea>
        <br>
        <button type="submit" class="btn btn-success">Make Settings</button>

    </form>
</div>


@endsection