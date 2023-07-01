<!DOCTYPE html>
<html lang="en">

<head>
    <title>Aksata Pangan</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Mega Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords"
        content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="codedthemes" />
    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <!-- waves.css -->
    <link rel="stylesheet" href="{{asset('template/assets/pages/waves/css/waves.min.css')}}" type="text/css"
        media="all">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{asset('template/assets/css/bootstrap/css/bootstrap.min.css')}}">
    <!-- waves.css -->
    <link rel="stylesheet" href="{{asset('template/assets/pages/waves/css/waves.min.css')}}" type="text/css"
        media="all">
    <!-- themify icon -->
    <link rel="stylesheet" type="text/css" href="{{asset('template/assets/icon/themify-icons/themify-icons.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css"
        href="{{asset('template/assets/icon/font-awesome/css/font-awesome.min.css')}}">
    <!-- scrollbar.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('template/assets/css/jquery.mCustomScrollbar.css')}}">
    <!-- am chart export.css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css"
        media="all" />
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('template/assets/css/style.css')}}">
    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="preloader-wrapper">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            @include('template.header')

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="">
                                <div class="main-menu-header">
                                    <img class="img-80 img-radius" src="{{asset('img/user.png')}}"
                                        alt="User-Profile-Image">
                                    <div class="user-details">
                                        <span id="more-details">Hai, {{Auth::user()->nama}}!<i
                                                class="fa fa-caret-down"></i></span>
                                    </div>
                                </div>

                                <div class="main-menu-content">
                                    <ul>
                                        <li class="more-details">

                                            <a href="auth-normal-sign-in.html"><i
                                                    class="ti-layout-sidebar-left"></i>Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="pcoded-navigation-label" data-i18n="nav.category.forms">Menu</div>
                            <ul class="pcoded-item pcoded-left-item">
                                @if(Request::segment(2)== 'dashboard')
                                <li class="active">
                                    @else
                                <li class="">
                                    @endif
                                    <a href="{{url('admin/dashboard')}}" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="bi bi-house"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Dashboard</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                @if(Request::segment(2)== 'food_bank' || Request::segment(2)== 'bantuan_dana' )
                                <li class="pcoded-hasmenu active pcoded-trigger">
                                    @else
                                <li class="pcoded-hasmenu">
                                    @endif
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="bi bi-box-arrow-in-down fs-5"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Bantuan
                                            Masuk</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        @if(Request::segment(2)== 'food_bank')
                                        <li class="active">
                                            @else
                                        <li class="">
                                            @endif
                                            <a href="{{url('admin/food_bank')}}" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Food
                                                    Bank</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        @if(Request::segment(2)== 'bantuan_dana')
                                        <li class="active">
                                            @else
                                        <li class="">
                                            @endif
                                            <a href="{{url('admin/bantuan_dana')}}" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext"
                                                    data-i18n="nav.basic-components.breadcrumbs">Bantuan Dana</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <!-- <li class=" ">
                                            <a href="{{url('admin/input_bantuan')}}" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext"
                                                    data-i18n="nav.basic-components.breadcrumbs">Input Bantuan</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li> -->
                                    </ul>
                                </li>
                                @if(Request::segment(2)== 'penyaluran_makanan' ||Request::segment(2)== 'penyaluran_dana'
                                )
                                <li class="pcoded-hasmenu active pcoded-trigger">
                                    @else
                                <li class="pcoded-hasmenu">
                                    @endif
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="bi bi-box-arrow-up-right"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Penyaluran
                                            Bantuan</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        @if(Request::segment(2)== 'penyaluran_makanan')
                                        <li class="active">
                                            @else
                                        <li class="">
                                            @endif
                                            <a href="{{url('admin/penyaluran_makanan')}}"
                                                class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext"
                                                    data-i18n="nav.basic-components.alert">Penyaluran Makanan</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        @if(Request::segment(2)== 'penyaluran_dana')
                                        <li class="active">
                                            @else
                                        <li class="">
                                            @endif
                                            <a href="{{url('admin/penyaluran_dana')}}" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext"
                                                    data-i18n="nav.basic-components.breadcrumbs">Penyaluran Dana</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                                @if(Request::segment(2)== 'laporan_bantuan_masuk' ||Request::segment(2)==
                                'laporan_bantuan_makanan' ||Request::segment(2)== 'laporan_bantuan_dana' ||
                                Request::segment(2)==
                                'laporan_penyaluran_dana' || Request::segment(2)== 'laporan_penyaluran_makanan' ||
                                Request::segment(2)== 'laporan_penyaluran_dana' || Request::segment(2)==
                                'laporan_penyaluran_bantuan' )
                                <li class="pcoded-hasmenu active pcoded-trigger">
                                    @else
                                <li class="pcoded-hasmenu">
                                    @endif
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="bi bi-file-text"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Laporan</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        @if(Request::segment(2)== 'laporan_bantuan_masuk')
                                        <li class="active">
                                            @else
                                        <li class="">
                                            @endif
                                            <a href="{{url('admin/laporan_bantuan_masuk')}}"
                                                class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext"
                                                    data-i18n="nav.basic-components.alert">Laporan Bantuan Masuk</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        @if(Request::segment(2)== 'laporan_penyaluran_bantuan')
                                        <li class="active">
                                            @else
                                        <li class="">
                                            @endif
                                            <a href="{{url('admin/laporan_penyaluran_bantuan')}}"
                                                class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext"
                                                    data-i18n="nav.basic-components.breadcrumbs">Laporan Penyaluran
                                                    Bantuan</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        @if(Request::segment(2)== 'laporan_penyaluran_makanan')
                                        <li class="active">
                                            @else
                                        <li class="">
                                            @endif
                                            <a href="{{url('admin/laporan_penyaluran_makanan')}}"
                                                class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext"
                                                    data-i18n="nav.basic-components.breadcrumbs">Laporan Penyaluran
                                                    Makanan</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        @if(Request::segment(2)== 'laporan_penyaluran_dana')
                                        <li class="active">
                                            @else
                                        <li class="">
                                            @endif
                                            <a href="{{url('admin/laporan_penyaluran_dana')}}"
                                                class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext"
                                                    data-i18n="nav.basic-components.breadcrumbs">Laporan Penyaluran
                                                    Dana</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                @if(Request::segment(2)== 'user_list' || Request::segment(2)==
                                'volunteer' )
                                <li class="pcoded-hasmenu active pcoded-trigger">
                                    @else
                                <li class="pcoded-hasmenu">
                                    @endif
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="bi bi-people"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.basic-components.main">User
                                            Management</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        @if(Request::segment(2)== 'user_list')
                                        <li class="active">
                                            @else
                                        <li class="">
                                            @endif
                                            <a href="{{url('admin/user_list')}}" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">User
                                                    List</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        @if(Request::segment(2)== 'volunteer')
                                        <li class="active">
                                            @else
                                        <li class="">
                                            @endif
                                            <a href="{{url('admin/volunteer')}}" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext"
                                                    data-i18n="nav.basic-components.breadcrumbs">Volunteer</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <!-- <li class=" ">
                                            <a href="{{url('admin/bantuan_dana')}}" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext"
                                                    data-i18n="nav.basic-components.breadcrumbs">Pemberi</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="{{url('admin/bantuan_dana')}}" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext"
                                                    data-i18n="nav.basic-components.breadcrumbs">Penerima</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li> -->
                                    </ul>
                                </li>

                            </ul>

                        </div>
                    </nav>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 10]>
    <div class="ie-warning">
        <h1>Warning!!</h1>
        <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
        <div class="iew-container">
            <ul class="iew-download">
                <li>
                    <a href="http://www.google.com/chrome/">
                        <img src="assets/images/browser/chrome.png" alt="Chrome">
                        <div>Chrome</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.mozilla.org/en-US/firefox/new/">
                        <img src="assets/images/browser/firefox.png" alt="Firefox">
                        <div>Firefox</div>
                    </a>
                </li>
                <li>
                    <a href="http://www.opera.com">
                        <img src="assets/images/browser/opera.png" alt="Opera">
                        <div>Opera</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.apple.com/safari/">
                        <img src="assets/images/browser/safari.png" alt="Safari">
                        <div>Safari</div>
                    </a>
                </li>
                <li>
                    <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                        <img src="assets/images/browser/ie.png" alt="">
                        <div>IE (9 & above)</div>
                    </a>
                </li>
            </ul>
        </div>
        <p>Sorry for the inconvenience!</p>
    </div>
    <![endif]-->
    <!-- Warning Section Ends -->

    <!-- Required Jquery -->
    <script type="text/javascript" src="{{asset('template/assets/js/jquery/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/assets/js/jquery-ui/jquery-ui.min.js')}} "></script>
    <script type="text/javascript" src="{{asset('template/assets/js/popper.js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/assets/js/bootstrap/js/bootstrap.min.js')}} "></script>
    <script type="text/javascript" src="{{asset('template/assets/pages/widget/excanvas.js')}} "></script>
    <!-- waves js -->
    <script src="{{asset('template/assets/pages/waves/js/waves.min.js')}}"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{asset('template/assets/js/jquery-slimscroll/jquery.slimscroll.js')}} ">
    </script>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{asset('template/assets/js/modernizr/modernizr.js')}} "></script>
    <!-- slimscroll js -->
    <script type="text/javascript" src="{{asset('template/assets/js/SmoothScroll.js')}}"></script>
    <script src="{{asset('template/assets/js/jquery.mCustomScrollbar.concat.min.js')}} "></script>
    <!-- Chart js -->
    <script type="text/javascript" src="{{asset('template/assets/js/chart.js/Chart.js')}}"></script>
    <!-- amchart js -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="{{asset('template/assets/pages/widget/amchart/gauge.js')}}"></script>
    <script src="{{asset('template/assets/pages/widget/amchart/serial.js')}}"></script>
    <script src="{{asset('template/assets/pages/widget/amchart/light.js')}}"></script>
    <script src="{{asset('template/assets/pages/widget/amchart/pie.min.js')}}"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js')}}"></script>
    <!-- menu js -->
    <script src="{{asset('template/assets/js/pcoded.min.js')}}"></script>
    <script src="{{asset('template/assets/js/vertical-layout.min.js')}} "></script>
    <!-- custom js -->
    <script type="text/javascript" src="{{asset('template/assets/pages/dashboard/custom-dashboard.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/assets/js/script.js')}} "></script>
</body>

</html>