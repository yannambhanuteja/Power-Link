@extends('layouts.master') 
@section('title','Home') 
@section('content')

<br>
<!-- Income -->
<div id="earnings" class="right-align">
    <a class=" btn-large waves-effect waves-light green"><?php echo number_format((float)Auth::user()->earnings, 4, '.', ''); ?>  <i class="material-icons">attach_money</i> </a>

    <a href="/withdraw/{{Auth::user()->id}}" class="btn waves-effect waves-light blue">Withdraw</a>
</div>
<br>
<!-- Link Shrink -->

<div id="form_shrink" class="blue lighten-2 card black-text z-depth-4 hoverable center-align">

    @if(Session::has('links_s'))

<center class="">
<p id="p1">{{url('')}}/{{(Session::get('links_s')) }}</p>


<button class="btn btn-large blue waves-effect waves-light white-text" onclick="copyToClipboard('#p1')"><i class="large material-icons">content_copy</i>Copy</button>

  

</center>
@endif
                <form action="/link" method="POST" class="form-wrapper" >
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
                    <button type="submit" class="pulse-shrink btn white black-text waves-effect waves-light" id="submit"> <i class="fa fa-link" aria-hidden="true"></i> Shrink </button>
                </form>
</div>
<style>
.card {

    padding: 1%;
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
<br>
<!--Referal Link -->
<h4 class="center-align">Share your referal link and earn @if(App\Settings::all()->count()>0){{App\Settings::orderBy('updated_at','desc')->first()->referal_per}} %  @endif  of the persons life time income </h4>
<div class="center-align">
    <!--Copy to clipboard -->
    <div class="copy">
        <h5> Copy the link and share</h5>
        <form class="copy-link">
            <div class="row">
                <div class="input-field col s8">

                    <input type="text" value="{!! url(''); !!}/register/ref/{{Auth::user()->id}}">
                </div>
                <div class="input-field col s4">
                    <button type="button" class="btn waves-effect waves-light"> <i class="material-icons">content_copy</i></button>
                </div>
            </div>
        </form>

    </div>
</div>
<!--All referals stats -->
<div class="center-align" id="ref_table">

    <table class="z-depth-3 card highlight centered">
        <thead class="white-text red">
            <tr>
                <th>Refer ID</th>
                <th>User Name</th>
                <th>Your Earnings</th>
                <th>Registered Time</th>
            </tr>
        </thead>

        <tbody>
            @foreach($refered as $refereds)
            <tr>
                <td>{{$refereds->id}}</td>
                <td>{{$refereds->name}}</td>
                <td>{{($refereds->earnings+$refereds->ref_income)*20/100}} $</td>
                <td>{{$refereds->created_at->diffForHumans()}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

<!--Pagination -->
<div class="center-align">

    {{ $refered->links('vendor.pagination.simple-default') }}

</div>
<script>
    (function() {
        var copyButton = document.querySelector('.copy button');
        var copyInput = document.querySelector('.copy input');
        copyButton.addEventListener('click', function(e) {
            e.preventDefault();
            var text = copyInput.select();
            document.execCommand('copy');
        });

        copyInput.addEventListener('click', function() {
            this.select();
        });
    })();
</script>

<style>
    table {
        padding: 2%;
    }
    
    table,
    td {
        border: 0.5px solid black;
    }
    
    table,
    th {
        border: 1px solid black;
    }
    
    table {
        border: 2px solid black;
    }
</style>
@endsection