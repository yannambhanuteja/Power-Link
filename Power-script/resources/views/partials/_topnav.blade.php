<?php 

$site_logo = App\Settings::orderBy('created_at','desc')->first()->site_logo;

$site_name = App\Settings::orderBy('created_at','desc')->first()->site_name;

$nav_foo_color = App\Settings::orderBy('created_at','desc')->first()->nav_foo_color;

?>
    <style>
        #site_logo {
            height: 60px;
            width: 60px;
            padding: 2px;
        }
        
        #p1 {
background: #fff;
border: 5px 5px 5px 5px;
color: #000;
font-weight: 600;
padding: 1%;
}
.brand-logo {
    font-size: 20px !important;
    font-weight: 600;
}

.nav-wrapper > ul > li > a {
   
    font-weight: 900;
    letter-spacing: 1px;
    padding: 0px 20px;
    color: black;
    transition: 0.5s all ease-in-out;
}

.nav-wrapper > ul > li > a > i {
    font-size: 20px;
    margin-right: 3px;
}

.nav-wrapper > ul > li > a > span {
    font-size: 12px;
    font-weight: 900;
    color: rgba(220, 220, 220, 0.5);
    transition: 0.5s all ease-in-out;
}

.nav-wrapper > ul > li > a:hover > span {
    color: rgba(220, 220, 220, 1);
}
    </style>
    <nav>
        <div class=" @if($nav_foo_color) {{$nav_foo_color}} @else blue darken-4 @endif nav-wrapper">
            @if($site_logo)
              <img class="hide-on-med-and-down responsive-img" id="site_logo" src="/site/{{$site_logo}}">
             @endif
            
             <a href="/" class=" brand-logo">@if($site_name)

              {{$site_name}}

              @endif</a>
            <a href="#" data-activates="mobile-demo" class=" hide-on-large-only button-collapse-mobile"><i class="material-icons">menu</i></a>

            <ul id="nav-mobile" class="right hide-on-medium-and-down">

                @if(Auth::check() && Auth::user()->role == 'admin')
                <li class=" {{ Request::is('/admin/dashboard') ? " active ":" "}}">
                    <a class="white-text"  href="/admin/dashboard"> <i class="fa fa-lock" aria-hidden="true"></i> Admin </a>
                </li>
                @endif

               

                <li class=" {{ Request::is('rates/payout') ? " active ":" "}}"><a  class="white-text" href="/rates/payout"><i class="expand fa fa-usd" aria-hidden="true"></i> Payout Rates</a></li>

                @if (!Auth::guest())

                <li class=" {{ Request::is('home') ? " active ":" "}}">
                    <a  class="white-text" href="/home"> <i class="expand fa fa-home" aria-hidden="true"></i> Home </a>
                </li>

                <li class=" {{ Request::is(route('myPayments',[$id= Auth::user()->id])) ? " active ":" "}}"><a  class="white-text" href="/Mypayments/{{Auth::user()->id}}"><i class=" expand fa fa-money" aria-hidden="true"></i> My Payments</a></li>

                <li class=" {{ Request::is(route('mySettings',[$id= Auth::user()->id])) ? " active ":" "}}"><a  class="white-text" href="/Mysettings/{{Auth::user()->id}}"><i class="expand fa fa-cogs" aria-hidden="true"></i> My Settings</a></li>

                <li class=" {{ Request::is(route('manageLinks',[$id= Auth::user()->id])) ? " active ":" "}}"><a  class="white-text" href="/managelinks/{{Auth::user()->id}}"><i class="expand fa fa-link" aria-hidden="true"></i> Manage Links</a></li>

                <li class="">
                    <a  class="white-text" href="{{ url('/logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="expand fa fa-power-off" aria-hidden="true"></i> Logout
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </a>
                </li>

                @else
                 <li class=" {{ Request::is('paymentproofs') ? " active ":" "}}"><a  class="white-text" href="/paymentproofs"><i class="expand fa fa-paypal" aria-hidden="true"></i> Payment Proofs</a></li>
                <li class=" {{ Request::is('login') ? " active ":" "}}"><a  class="white-text" href="/login"><i class="fa fa-sign-in" aria-hidden="true"></i>  LOGIN</a></li>
                <li class="blue {{ Request::is('register') ? " active ":" "}}"><a class="white-text" href="/register"><i class="white-text fa fa-sign-in" aria-hidden="true"></i>  register</a></li>
 
                @endif

            </ul>

            <ul class=" @if($nav_foo_color) {{$nav_foo_color}} @else blue darken-4 @endif white-text side-nav" id="mobile-demo">
                <div class="center-align">
                    @if($site_logo)
                    <img class=" responsive-img" id="site_logo" src="/site/{{$site_logo}}  "> @endif

                </div>
                @if(Auth::check() && Auth::user()->role == 'admin')
                <li class=" {{ Request::is('/admin/dashboard') ? " active ":" "}}">
                    <a class="white-text" href="/admin/dashboard"> <i class="white-text fa fa-lock" aria-hidden="true"></i> Admin </a>
                </li>

                @endif

                <li class=" {{ Request::is('paymentproofs') ? " active ":" "}}"><a class=" white-text" href="/paymentproofs"><i class="expand white-text fa fa-paypal" aria-hidden="true"></i> Payment Proofs</a></li>

                <li class=" {{ Request::is('rates/payout') ? " active ":" "}}"><a class="white-text" href="/rates/payout"><i class="white-text expand fa fa-usd" aria-hidden="true"></i> Payout Rates</a></li>

                @if (!Auth::guest())

                <li class=" {{ Request::is('home') ? " active ":" "}}">
                    <a class="white-text" href="/home"> <i class="white-text expand fa fa-home" aria-hidden="true"></i> Home </a>
                </li>

                <li class=" {{ Request::is(route('myPayments',[$id= Auth::user()->id])) ? " active ":" "}}"><a class="white-text" href="/Mypayments/{{Auth::user()->id}}"><i class=" expand white-text fa fa-money" aria-hidden="true"></i> My Payments</a></li>

                <li class=" {{ Request::is(route('mySettings',[$id= Auth::user()->id])) ? " active ":" "}}"><a class="white-text" href="/Mysettings/{{Auth::user()->id}}"><i class="expand white-text fa fa-cogs" aria-hidden="true"></i> My Settings</a></li>

                <li class=" {{ Request::is(route('manageLinks',[$id= Auth::user()->id])) ? " active ":" "}}"><a class="white-text" href="/managelinks/{{Auth::user()->id}}"><i class="expand white-text fa fa-link" aria-hidden="true"></i> Manage Links</a></li>

                <li class="">
                    <a class="white-text" href="{{ url('/logout') }}" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                        <i class=" white-text expand fa fa-power-off" aria-hidden="true"></i> Logout
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </a>
                </li>
                @else
                <li class=" {{ Request::is('login') ? " active ":" "}}"><a class="white-text" href="/login"><i class="white-text fa fa-sign-in" aria-hidden="true"></i>  LOGIN</a></li>
                <li class=" {{ Request::is('register') ? " active ":" "}}"><a class="white-text" href="/register"><i class="white-text fa fa-sign-in" aria-hidden="true"></i>  register</a></li>

                @endif
            </ul>
        </div>

    </nav>

    <script>
        $('.button-collapse-mobile').sideNav({
            menuWidth: 300, // Default is 300
            edge: 'left', // Choose the horizontal origin
            closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
            draggable: true // Choose whether you can drag to open on touch screens
        });

    </script>
    <script>
   function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
}
    </script>
    <script>
var TxtRotate = function(el, toRotate, period) {
  this.toRotate = toRotate;
  this.el = el;
  this.loopNum = 0;
  this.period = parseInt(period, 10) || 2000;
  this.txt = '';
  this.tick();
  this.isDeleting = false;
};

TxtRotate.prototype.tick = function() {
  var i = this.loopNum % this.toRotate.length;
  var fullTxt = this.toRotate[i];

  if (this.isDeleting) {
    this.txt = fullTxt.substring(0, this.txt.length - 1);
  } else {
    this.txt = fullTxt.substring(0, this.txt.length + 1);
  }

  this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

  var that = this;
  var delta = 300 - Math.random() * 100;

  if (this.isDeleting) { delta /= 2; }

  if (!this.isDeleting && this.txt === fullTxt) {
    delta = this.period;
    this.isDeleting = true;
  } else if (this.isDeleting && this.txt === '') {
    this.isDeleting = false;
    this.loopNum++;
    delta = 500;
  }

  setTimeout(function() {
    that.tick();
  }, delta);
};

window.onload = function() {
  var elements = document.getElementsByClassName('txt-rotate');
  for (var i=0; i<elements.length; i++) {
    var toRotate = elements[i].getAttribute('data-rotate');
    var period = elements[i].getAttribute('data-period');
    if (toRotate) {
      new TxtRotate(elements[i], JSON.parse(toRotate), period);
    }
  }
  // INJECT CSS
  var css = document.createElement("style");
  css.type = "text/css";
  css.innerHTML = ".txt-rotate > .wrap { border-right: 0.08em solid #666 }";
  document.body.appendChild(css);
};
    </script>

    <script>
$(document).ready(function() {
   $( "#search" ).click(function() {
   $(".g-recaptcha").css('display','flex');
});
});
</script>
