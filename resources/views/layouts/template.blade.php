<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">

    <!--favicon icon-->
    <link rel="icon" type="image/png" href="assets/img/favicon.html">

    <title>@yield('addressTitle')</title>

    <!--web fonts-->
    <link href="http://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <!--bootstrap styles-->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!--icon font-->
    <link href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/dashlab-icon/dashlab-icon.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/simple-line-icons/css/simple-line-icons.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/themify-icons/css/themify-icons.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/weather-icons/css/weather-icons.min.css')}}" rel="stylesheet">

    <!--custom scrollbar-->
    <link href="{{ asset('assets/vendor/m-custom-scrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet">

    <!--jquery dropdown-->
    <link href="{{ asset('assets/vendor/jquery-dropdown-master/jquery.dropdown.css')}}" rel="stylesheet">

    <!--jquery ui-->
    <link href="{{ asset('assets/vendor/jquery-ui/jquery-ui.min.css')}}" rel="stylesheet">

    <!--iCheck-->
    <link href="{{ asset('assets/vendor/icheck/skins/all.css')}}" rel="stylesheet">

    <!--data table-->
    <link href="{{ asset('assets/vendor/data-tables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

    <!--custom styles-->
    <link href="{{ asset('assets/css/main.css')}}" rel="stylesheet">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/select2/css/select2.css')}}">

    <style>
        .light-s{
            color:#fff !important;
        }
    </style>

    <style>
        .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
        }

        .switch input {
        opacity: 0;
        width: 0;
        height: 0;
        }

        .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
        }

        .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
        }

        input:checked + .slider {
        background-color: #2196F3;
        }

        input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
        border-radius: 34px;
        }

        .slider.round:before {
        border-radius: 50%;
        }
    </style>

    @yield('customStyle')

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/vendor/html5shiv.js"></script>
    <script src="assets/vendor/respond.min.js"></script>
    <![endif]-->
</head>

<body class="fixed-nav">

    <!--navigation : sidebar & header-->
    <nav class="navbar navbar-expand-lg fixed-top navbar-light" id="mainNav">

        <!--brand name-->
        <a class="navbar-brand" href="#" data-jq-dropdown="#jq-dropdown-1">
            <img class="pr-3 float-left" style="width:30%" src="{{ asset('images/logo-only-tiara-gypsum.png')}}" srcset="images/logo-only-tiara-gypsum@2x.png 2x"  alt=""/>
            <div class="float-left">
                <div>Tiara </div>
                <span class="page-direction f12 weight300">
                    <?php
                        $fullUrl = url()->current();

                        $exploded = explode('/',$fullUrl);

                    ?>

                    <span>{{ $exploded['3'] }}</span>
                    <i class="fa fa-angle-right"></i>
                    <span>{{ $exploded['4'] }}</span>

                    @if (count($exploded) > 5)
                        <i class="fa fa-angle-right"></i>
                        <span>{{ $exploded['5'] }}</span>
                    @endif
                </span>
            </div>
        </a>
        <!--/brand name-->

        <!--responsive nav toggle-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!--/responsive nav toggle-->

        <!--responsive rightside toogle-->
        <a href="javascript:;" class="nav-link right_side_toggle responsive-right-side-toggle">
            <i class="icon-options-vertical"> </i>
        </a>
        <!--/responsive rightside toogle-->

        <div class="collapse navbar-collapse" id="navbarResponsive">

            <!--left side nav-->
            <ul class="navbar-nav left-side-nav" id="accordion">

                <li class="nav-item {{ Request::routeIs('barang.*') ? 'active' : '' }}" data-toggle="tooltip" data-placement="right" title="Data Produk">
                    <a class="nav-link" href="{{ route('barang.index') }}">
                        <i class="fa fa-cubes"></i>
                        <span class="nav-link-text">Data Produk</span>
                    </a>
                </li>

                <li class="nav-item {{ Request::routeIs('proyek.*') ? 'active' : '' }}" data-toggle="tooltip" data-placement="right" title="Data Proyek">
                    <a class="nav-link" href="{{ route('proyek.index') }}">
                        <i class="fa fa-building"></i>
                        <span class="nav-link-text">Data Proyek</span>
                    </a>
                </li>

                <li class="nav-item {{ Request::routeIs('pelanggan.*') ? 'active' : '' }}" data-toggle="tooltip" data-placement="right" title="Data Pelanggan">
                    <a class="nav-link" href="{{ route('pelanggan.index') }}">
                        <i class="fa fa-users"></i>
                        <span class="nav-link-text">Data Pelanggan</span>
                    </a>
                </li>

                <li class="nav-item {{ Request::routeIs('admin.*') ? 'active' : '' }}" data-toggle="tooltip" data-placement="right" title="Data Admin">
                    <a class="nav-link" href="{{ route('admin.index') }}">
                        <i class="fa fa-user-plus"></i>
                        <span class="nav-link-text">Data Admin</span>
                    </a>
                </li>

                <li class="nav-item {{ Request::routeIs('subscriber-list.*') ? 'active' : '' }}" data-toggle="tooltip" data-placement="right" title="Data Subscriber">
                    <a class="nav-link" href="{{ route('subscriber-list.index') }}">
                        <i class="fa fa-users"></i>
                        <span class="nav-link-text">Data Subscriber</span>
                    </a>
                </li>

                <li class="nav-item {{ Request::routeIs('promo.*') ? 'active' : '' }}" data-toggle="tooltip" data-placement="right" title="Data Promo">
                    <a class="nav-link" href="{{ route('promo.index') }}">
                        <i class="fa fa-ticket"></i>
                        <span class="nav-link-text">Data Promo</span>
                    </a>
                </li>

                <li class="nav-item {{ Request::routeIs('transaksi.*') ? 'active' : '' }}" data-toggle="tooltip" data-placement="right" title="Data Transaksi">
                    <a class="nav-link" href="{{ route('transaksi.index') }}">
                        <i class="fa fa-money"></i>
                        <span class="nav-link-text">Data Transaksi</span>
                    </a>
                </li>

                <li class="nav-item {{ Request::routeIs('pengaturan-konten.*') ? 'active' : '' }}" data-toggle="tooltip" data-placement="right" title="Pengaturan Konten">
                    <a class="nav-link" href="{{ route('pengaturan-konten.index') }}">
                        <i class="fa fa-globe"></i>
                        <span class="nav-link-text">Pengaturan Konten</span>
                    </a>
                </li>

            </ul>
            <!--/header leftside links-->

            <!--header rightside links-->
            <ul class="navbar-nav header-links ml-auto hide-arrow">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle mr-lg-3" id="alertsDropdown" href="#" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="vl_bell"></i>
                        <span class="d-lg-none">Notification
                            <span class="badge badge-pill badge-warning">5 New</span>
                        </span>
                        <div class="notification-alarm">
                            <span class="wave wave-warning"></span>
                            <span class="dot bg-warning"></span>
                        </div>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right header-right-dropdown-width pb-0" aria-labelledby="alertsDropdown">
                        <h6 class="dropdown-header weight500">Notification</h6>

                        <div class="dropdown-divider mb-0"></div>
                        <a class="dropdown-item border-bottom" href="#">
                            <span class="text-primary">
                            <span class="weight500">
                                <i class="vl_bell weight600 pr-2"></i>Weekly Update</span>
                            </span>
                            <span class="small float-right text-muted">03:14 AM</span>

                            <div class="dropdown-message f12">
                                This week project update report generated. All team members are requested to check the updates
                            </div>
                        </a>

                        <a class="dropdown-item border-bottom" href="#">
                            <span class="text-danger">
                            <span class="weight500">
                                <i class="vl_Download-circle weight600 pr-2"></i>Server Error</span>
                            </span>
                            <span class="small float-right text-muted">10:34 AM</span>

                            <div class="dropdown-message f12">
                                Unexpectedly server response stop. Responsible members are requested to fix it soon
                            </div>
                        </a>

                        <a class="dropdown-item border-bottom" href="#">
                            <span class="text-success">
                            <span class="weight500">
                                <i class="vl_screen weight600 pr-2"></i>Monthly Meeting</span>
                            </span>
                            <span class="small float-right text-muted">12:30 AM</span>

                            <div class="dropdown-message f12">
                                Our monthly meeting will be held on tomorrow sharp 12:30. All members are requested to attend this meeting.
                            </div>
                        </a>

                        <a class="dropdown-item small" href="#">View all notification</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle mr-lg-3" id="userNav" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-thumb">
                            @if (Auth::user()->foto_user)
                            <img class="rounded-circle" src="{{ url('/images/'.Auth::user()->foto_user) }}" alt=""/>
                            @else
                                <img class="rounded-circle" src="{{ asset('assets/img/avatar/avatar1.jpg')}}" alt=""/>
                            @endif
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userNav">
                        <a class="dropdown-item" href="#">My Profile</a>
                        <a class="dropdown-item" href="#">Account Settings</a>
                        <a class="dropdown-item" href="#">Inbox <span class="badge badge-primary">3</span></a>
                        <a class="dropdown-item" href="#">Message <span class="badge badge-success">5</span></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Sign Out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
            <!--/header rightside links-->

        </div>
    </nav>
    <!--/navigation : sidebar & header-->

    <!--main content wrapper-->
    <div class="content-wrapper">

        @yield('contentHere')

        {{-- <!--creative states-->
        <div class="creative-state-area">
            @yield('statisticHere')
        </div>
        <!--/creative states-->

        <div class="container-fluid">
            @yield('contentHere')
        </div> --}}

        <!--footer-->
        <footer class="sticky-footer">
            <div class="container">
                <div class="text-center">
                    <small>Copyright &copy; Ayu Frida 2020</small>
                </div>
            </div>
        </footer>
        <!--/footer-->
    </div>
    <!--/main content wrapper-->

    <!--basic scripts-->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/popper.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

    <script src="{{ asset('assets/vendor/jquery-dropdown-master/jquery.dropdown.js')}}"></script>

    <script src="{{ asset('assets/vendor/m-custom-scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>

    <!--sparkline-->
    <script src="{{ asset('assets/vendor/sparkline/jquery.sparkline.js')}}"></script>
    <!--sparkline initialization-->
    <script src="{{ asset('assets/vendor/js-init/sparkline/init-sparkline.js')}}"></script>

    <!--[if lt IE 9]>
    <script src="assets/vendor/modernizr.js"></script>
    <![endif]-->

    <!--basic scripts initialization-->
    <script src="{{ asset('assets/js/scripts.js')}}"></script>

    <!--datatables-->
    <script src="{{ asset('assets/vendor/data-tables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/data-tables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Select2 -->
    <script src="{{ asset('assets/vendor/select2/js/select2.min.js')}}"></script>

    <!-- Script Place -->
    @yield('scriptPlace')
</body>
</html>

