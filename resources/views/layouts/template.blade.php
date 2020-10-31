
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

    <style>
        .light-s{
            color:#fff !important;
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
            <img class="pr-3 float-left" src="{{ asset('assets/img/logo-icon.png')}}" srcset="assets/img/logo-icon@2x.png 2x"  alt=""/>
            <div class="float-left">
                <div>DashLab <i class="fa fa-caret-down pl-2"></i></div>
                <span class="page-direction f12 weight300">
                    <span>home</span>
                    <i class="fa fa-angle-right"></i>
                    <span>ui element</span>
                </span>
            </div>
        </a>
        <!--/brand name-->

        <!--brand mega menu-->
        <div id="jq-dropdown-1" class="jq-dropdown">
            <div class="b-mega-menu">
                <div class="card card-shadow">
                    <div class="card-header p-2 pl-3">
                        <div class="navbar-brand mt-2">
                            <img class="pr-3 float-left" src="{{ asset('assets/img/logo-icon.png')}}" srcset="assets/img/logo-icon@2x.png 2x"  alt=""/>
                            <div class="float-left">
                                <div>DashLab</div>
                                <span class="page-direction f12 weight300">
                                    <span>home</span>
                                    <i class="fa fa-angle-right"></i>
                                    <span>ui element</span>
                                </span>
                            </div>
                        </div>

                        <div class="widget-action-link">
                            <ul class="nav nav-tabs wal-nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-home"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="analytics-tab" data-toggle="tab" href="#analytics" role="tab" aria-controls="analytics" aria-selected="false"><i class="fa fa-desktop"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="application-tab" data-toggle="tab" href="#application" role="tab" aria-controls="application" aria-selected="false"><i class="fa fa-magnet"></i></a>
                                </li>
                            </ul>

                        </div>
                    </div>
                    <div class="card-body p-0 ">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row no-gutters">
                                    <div class="col-4 border-right">
                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fa fa-home pr-2"></i> Application</a>
                                            <a class="nav-link" id="v-pills-report-tab" data-toggle="pill" href="#v-pills-report" role="tab" aria-controls="v-pills-report" aria-selected="false"><i class="fa fa-desktop pr-2"></i> Reports</a>
                                            <a class="nav-link" id="v-pills-management-tab" data-toggle="pill" href="#v-pills-management" role="tab" aria-controls="v-pills-management" aria-selected="false"><i class="fa fa-magnet pr-2"></i>Management</a>
                                            <a class="nav-link" id="v-pills-blog-tab" data-toggle="pill" href="#v-pills-blog" role="tab" aria-controls="v-pills-blog" aria-selected="false"><i class="fa fa-comments-o pr-2"></i>Blog</a>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="tab-content" id="v-pills-tabContent">
                                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                <ul class="list-unstyled b-mega-menu-link">
                                                    <li><a href="#">Bootstrap 4 Stable</a></li>
                                                    <li class="active"><a href="javascript:;">DashLab Modern Admin</a></li>
                                                    <li><a href="#">Awesome Widgets Collection</a></li>
                                                    <li><a href="#">Developer Friendly Code</a></li>
                                                    <li><a href="#">SASS and GULP Task</a></li>
                                                    <li><a href="#">Fully Responsive</a></li>
                                                </ul>
                                            </div>
                                            <div class="tab-pane fade" id="v-pills-report" role="tabpanel" aria-labelledby="v-pills-report-tab">
                                                <ul class="list-unstyled b-mega-menu-link">
                                                    <li><a href="#">Daily Reports</a></li>
                                                    <li><a href="javascript:;">Weekly Reports</a></li>
                                                    <li class="active"><a href="#">Monthly Reports</a></li>
                                                    <li><a href="#">Yearly Reports</a></li>
                                                    <li><a href="#">HR Reports</a></li>
                                                    <li><a href="#">Product Reports</a></li>
                                                    <li><a href="#">Order Reports</a></li>
                                                    <li><a href="#">Revenue Reports</a></li>
                                                </ul>
                                            </div>
                                            <div class="tab-pane fade" id="v-pills-management" role="tabpanel" aria-labelledby="v-pills-management-tab">
                                                <ul class="list-unstyled b-mega-menu-link">
                                                    <li><a href="#">HR Management</a></li>
                                                    <li class="active"><a href="javascript:;">Product Management</a></li>
                                                    <li><a href="#">Role Management</a></li>
                                                    <li><a href="#">Sales Management</a></li>
                                                    <li><a href="#">Employee Management</a></li>
                                                </ul>
                                            </div>
                                            <div class="tab-pane fade" id="v-pills-blog" role="tabpanel" aria-labelledby="v-pills-blog-tab">
                                                <ul class="list-unstyled b-mega-menu-link">
                                                    <li class="active"><a href="#">Educational Blog</a></li>
                                                    <li> <a href="javascript:;">Technology Blog</a></li>
                                                    <li><a href="#">Political Blog</a></li>
                                                    <li><a href="#">Woocommerce Blog</a></li>
                                                    <li><a href="#">Entertainment Blog</a></li>
                                                    <li><a href="#">Newspapper Blog</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="analytics" role="tabpanel" aria-labelledby="analytics-tab">
                                <div class="p-5 m-4 text-center">
                                    <i class="fa fa-desktop f50 text-muted mb-4"></i>
                                    <p class="mb-5">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC</p>
                                    <a href="#" class="btn btn-primary">Get Started</a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="application" role="tabpanel" aria-labelledby="application-tab">
                                <div class="p-5 m-4 text-center">
                                    <i class="fa fa-magnet f50 text-muted mb-4"></i>
                                    <p class="mb-5">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33</p>
                                    <a href="#" class="btn btn-purple">Get Started</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--/brand mega menu-->

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

                <li class="nav-item {{ Request::routeIs('barang.*') ? 'active' : '' }}" data-toggle="tooltip" data-placement="right" title="Calendar">
                    <a class="nav-link" href="{{ route('barang.index') }}">
                        <i class="vl_calendar"></i>
                        <span class="nav-link-text">Data Produk</span>
                    </a>
                </li>

                <li class="nav-item {{ Request::routeIs('proyek.*') ? 'active' : '' }}" data-toggle="tooltip" data-placement="right" title="Calendar">
                    <a class="nav-link" href="{{ route('proyek.index') }}">
                        <i class="vl_calendar"></i>
                        <span class="nav-link-text">Data Proyek</span>
                    </a>
                </li>

                <li class="nav-item {{ Request::routeIs('pelanggan.*') ? 'active' : '' }}" data-toggle="tooltip" data-placement="right" title="Calendar">
                    <a class="nav-link" href="{{ route('pelanggan.index') }}">
                        <i class="vl_calendar"></i>
                        <span class="nav-link-text">Data Pelanggan</span>
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
                            <img class="rounded-circle" src="{{ asset('assets/img/avatar/avatar1.jpg')}}" alt=""/>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userNav">
                        <a class="dropdown-item" href="#">My Profile</a>
                        <a class="dropdown-item" href="#">Account Settings</a>
                        <a class="dropdown-item" href="#">Inbox <span class="badge badge-primary">3</span></a>
                        <a class="dropdown-item" href="#">Message <span class="badge badge-success">5</span></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="login.html">Sign Out</a>
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

    <!-- Script Place -->
    @yield('scriptPlace')
</body>
</html>

