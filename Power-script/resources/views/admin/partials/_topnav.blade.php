<div class="main-panel">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar bar1"></span>
                    <span class="icon-bar bar2"></span>
                    <span class="icon-bar bar3"></span>
                </button>
                <a class="navbar-brand" href="#">Dashboard</a>
            </div>

            
               
            <div class="collapse navbar-collapse">
                 <ul class="nav navbar-nav navbar-right">
                    <li class="pulse-expand {{ Request::is('/admin/admins') ? " active ":" "}} ">
                    <a href="/admin/admins">
                      <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        <p>All Admins</p>
                    </a>
                </li>
                <ul class="nav navbar-nav navbar-right">
                    <li class="pulse-expand {{ Request::is('/admin/contact') ? " active ":" "}} ">
                    <a href="/admin/contact">
                      <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        <p>Contact</p>
                    </a>
                </li>

<li class="pulse-expand {{ Request::is('/admin/terms') ? " active ":" "}} ">
                    <a href="/admin/terms">
                       <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                        <p>Terms & Conditions</p>
                    </a>
                </li>
                  <li class="pulse-expand {{ Request::is('/admin/faq') ? " active ":" "}} ">
                    <a href="/admin/faq">
                        <i class="fa fa-question-circle" aria-hidden="true"></i>
                        <p>Faq's</p>
                    </a>
                </li>
                    <li class="pulse-expand">
                        <a class="white-text" href="{{ url('/logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off" aria-hidden="true"></i> Logout
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>