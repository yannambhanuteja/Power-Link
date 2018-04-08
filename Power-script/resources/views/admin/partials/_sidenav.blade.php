<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="success">

        <!--
    Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
    Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
  -->

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="/admin/dashboard" class="simple-text">
                    <?php $site_name = App\Settings::orderBy('created_at')->first()->site_name; ?>
                        @if($site_name) {{$site_name}} @endif
                </a>
            </div>

            <ul class="nav">
                <li class="pulse-expand  {{ Request::is('admin/dashboard') ? " active ":" "}}">
                    <a href="/admin/dashboard">
                        <i class="fa fa-tachometer" aria-hidden="true"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="pulse-expand {{ Request::is('admin/links') ? " active ":" "}} ">
                    <a href="/admin/links">
                        <i class="fa fa-link" aria-hidden="true"></i>
                        <p>Manage Links</p>
                    </a>
                </li>
                <li class="pulse-expand  {{ Request::is('admin/payoutrates/create') ? " active ":" "}}  ">
                    <a href="/admin/payoutrates/create">
                        <i class="fa fa-money" aria-hidden="true"></i>
                        <p>Payout Rates</p>
                    </a>
                </li>

                <li class="pulse-expand  {{ Request::is('admin/payout/request') ? " active ":" "}} ">
                    <a href="/admin/payout/request">
                        <i class="fa fa-usd" aria-hidden="true"></i>
                        <p>Payout Requests</p>
                    </a>
                </li>

                <li class="pulse-expand  {{ Request::is('admin/payout/history') ? " active ":" "}} ">
                    <a href="/admin/payout/history">
                       <i class="fa fa-history" aria-hidden="true"></i>
                        <p>Payments History</p>
                    </a>
                </li>

                <li class="pulse-expand {{ Request::is('admin/ads') ? " active ":" "}} ">
                    <a href="/admin/ads">
                        <i class="fa fa-paperclip" aria-hidden="true"></i>
                        <p>Advertisements</p>
                    </a>
                </li>
                <li class="pulse-expand {{ Request::is('/admin/users/list/show') ? " active ":" "}} ">
                    <a href="/admin/users/list/show">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <p>Users</p>
                    </a>
                </li>

                <li class="pulse-expand {{ Request::is('/admin/reviews') ? " active ":" "}} ">
                    <a href="/admin/reviews">
                        <i class="fa fa-commenting-o" aria-hidden="true"></i>
                        <p>Reviews</p>
                    </a>
                </li>
                
                <li class="pulse-expand  {{ Request::is('admin/settings/create') ? " active ":" "}} ">
                    <a href="/admin/settings/create">
                        <i class="fa fa-cog fa-spin fa-3x fa-fw" aria-hidden="true"></i>
                        <p>Settings</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <style>
        .pulse-expand {
            display: inline-block;
            -webkit-tap-highlight-color: transparent;
            transform: translateZ(0);
        }
        
        .pulse-expand:hover {
            animation-name: pulse-expand;
            animation-duration: 0.3s;
            animation-timing-function: linear;
            animation-iteration-count: infinite;
            animation-direction: alternate;
        }
        
        @keyframes pulse-expand {
            to {
                transform: scale(1.1);
            }
        }
    </style>