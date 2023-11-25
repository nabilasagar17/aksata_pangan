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
    <link rel="icon" href="{{url('img/logo.png')}}" type="image/x-icon">
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
            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
                            <i class="ti-menu"></i>
                        </a>
                        <div class="mobile-search waves-effect waves-light">
                            <div class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                        <input type="text" class="form-control" placeholder="Enter Keyword">
                                        <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="index.html">
                            <img class="img-fluid" src="{{asset('img/logo.png')}}" alt="Theme-Logo" width="100"
                                height="75" />
                        </a>
                        <a class="mobile-options waves-effect waves-light">
                            <i class="ti-more"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a>
                                </div>
                            </li>
                            <!-- <li class="header-search">
                    <div class="main-search morphsearch-search">
                        <div class="input-group">
                            <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                            <input type="text" class="form-control">
                            <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                        </div>
                    </div>
                </li> -->
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>
            </nav>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>

                    </nav>
                    <div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Dashboard</h5>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb-title">
                                            <a type="button" href="{{url('login')}}"
                                                class="btn btn-mat waves-effect waves-light btn-primary">Login</a>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <form action="" method="get">
                                            <div class="row">
                                                <div class="col-lg-auto my-3">

                                                    <select name="tahun" class="form-control">
                                                        <option value="Tahun">Tahun
                                                        </option>
                                                        @for($i = 2022 ;$i <=2030;$i++) @if(Request::input('tahun')==$i
                                                            ) <option value="{{Request::input('tahun')}}" selected>
                                                            {{$i}}
                                                            </option>@else
                                                            <option value="{{$i}}">{{$i}}
                                                            </option>@endif
                                                            @endfor

                                                    </select>
                                                </div>

                                                <div class="col-lg-auto my-3">
                                                    <button type="submit" class="btn  btn-primary">Filter</button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="row">
                                            <!-- task, page, download counter  start -->
                                            <div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                                <h4 class="text-c-purple">
                                                                    {{number_format(@$total_dana[0]->total_dana)}}
                                                                </h4>
                                                                <h6 class="text-muted m-b-0">Rupiah/Tahun
                                                                </h6>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <i class="fa fa-bar-chart f-28"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="{{url('main/detail_dana_masuk_widget')}}">
                                                        <div class="card-footer bg-c-purple">
                                                            <div class="row align-items-center">
                                                                <div class="col-9">
                                                                    <p class="text-white m-b-0">Total Dana Masuk</p>
                                                                </div>
                                                                <div class="col-3 text-right">
                                                                    <i class="fa fa-line-chart text-white f-16"></i>
                                                                </div>
                                                            </div>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-md-6">
                                            <div class="card">
                                                <div class="card-block">
                                                    <div class="row align-items-center">
                                                        <div class="col-8">
                                                            <h4 class="text-c-blue">{{$bantuan_masuk}}</h4>
                                                            <h6 class="text-muted m-b-0">Bantuan/Tahun</h6>
                                                        </div>
                                                        <div class="col-4 text-right">
                                                            <i class="fa fa-hand-o-down f-28"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{url('main/detail_makanan_masuk_widget')}}">
                                                    <div class="card-footer bg-c-blue">
                                                        <div class="row align-items-center">
                                                            <div class="col-9">
                                                                <p class="text-white m-b-0">Bantuan Makanan Masuk</p>
                                                            </div>
                                                            <div class="col-3 text-right">
                                                                <i class="fa fa-line-chart text-white f-16"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-md-6">
                                            <div class="card">
                                                <div class="card-block">
                                                    <div class="row align-items-center">
                                                        <div class="col-8">
                                                            <h4 class="text-c-green">{{$dibagikan}}</h4>
                                                            <h6 class="text-muted m-b-0">Paket/Tahun</h6>
                                                        </div>
                                                        <div class="col-4 text-right">
                                                            <i class="fa fa-file-text-o f-28"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{url('main/detail_penyaluran_makanan_widget')}}">
                                                    <div class="card-footer bg-c-green">
                                                        <div class="row align-items-center">
                                                            <div class="col-9">
                                                                <p class="text-white m-b-0">Total Bantuan Dibagikan</p>
                                                            </div>
                                                            <div class="col-3 text-right">
                                                                <i class="fa fa-line-chart text-white f-16"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6">
                                            <div class="card">
                                                <div class="card-block">
                                                    <div class="row align-items-center">
                                                        <div class="col-8">
                                                            <h4 class="text-c-red">Rp. {{number_format($dana)}}</h4>
                                                            <h6 class="text-muted m-b-0">Rupiah/Tahun</h6>
                                                        </div>
                                                        <div class="col-4 text-right">
                                                            <i class="fa fa-calendar-check-o f-28"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{url('main/detail_penyaluran_dana_widget')}}">
                                                    <div class="card-footer bg-c-red">
                                                        <div class="row align-items-center">
                                                            <div class="col-9">
                                                                <p class="text-white m-b-0">Total Dana Dikeluarkan</p>
                                                            </div>
                                                            <div class="col-3 text-right">
                                                                <i class="fa fa-line-chart text-white f-16"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                        <!-- task, page, download counter  end -->


                                        <!--  project and team member start -->
                                        <div class="col-xl-8 col-md-12">
                                            <div class="card table-card">
                                                <div class="card-header">
                                                    <h5>Penyaluran Bantuan</h5>
                                                    <div class="card-header-right">
                                                        <ul class="list-unstyled card-option">
                                                            <li><i class="fa fa fa-wrench open-card-option"></i>
                                                            </li>
                                                            <li><i class="fa fa-window-maximize full-card"></i></li>
                                                            <li><i class="fa fa-minus minimize-card"></i></li>
                                                            <li><i class="fa fa-refresh reload-card"></i></li>
                                                            <li><i class="fa fa-trash close-card"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="card-block">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Nama Penerima</th>
                                                                    <th>Alamat Penerima</th>
                                                                    <th>Nama Bantuan</th>
                                                                    <th>Jumlah</th>
                                                                    <th>Proses</th>
                                                                    <th>Pengiriman</th>
                                                                    <th>Keterangan</th>

                                                                    <th>Gambar</th>
                                                                    <th>Tanda Tangan</th>
                                                                    <th>Tgl.Dibuat</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php  $no = 5 * ( (Request::input('page') != '' ? Request::input('page') : 1) - 1) + 1; ?>

                                                                @foreach($data as $datas)
                                                                <tr>
                                                                    <th scope="row">{{$no++}}</th>
                                                                    <td>{{$datas->nama_penerima}}</td>
                                                                    <td>{{$datas->alamat_penerima}}</td>

                                                                    <td>{{$datas->nama}}</td>
                                                                    <td>{{$datas->qty}}</td>
                                                                    <td>@if($datas->selesai == '1')
                                                                        <span class="badge bg-success">Dibagikan</span>
                                                                        @else
                                                                        <span class="badge bg-warning">Belum
                                                                            Dibagikan</span>
                                                                        @endif
                                                                    </td>

                                                                    <td>{{$datas->pengiriman}}</td>
                                                                    <td>{{$datas->keterangan}}</td>
                                                                    <td>@if($datas->path_gambar != "")
                                                                        <div class="d-flex align-items-center">
                                                                            <img width="150" height="100"
                                                                                src="{{asset('img/bukti_keluar/'. $datas->path_gambar)}}"
                                                                                alt="" />
                                                                        </div>

                                                                        @endif
                                                                    </td>
                                                                    @if($datas->path_ttd == "")
                                                                    <td>
                                                                    </td>
                                                                    @else
                                                                    <td>
                                                                        <div class="d-flex align-items-center">

                                                                            <img width="150" height="100"
                                                                                src="{{asset('file_ttd_keluar/'. $datas->path_ttd)}}"
                                                                                alt="" />
                                                                        </div>
                                                                    </td>
                                                                    @endif
                                                                    <td>{{date('d-m-Y', strtotime($datas->created_at))}}
                                                                    </td>

                                                                </tr>
                                                                @endforeach

                                                            </tbody>
                                                        </table>

                                                    </div>
                                                    <div
                                                        class="m-datatable__pager m-datatable--paging-loaded clearfix my-2">
                                                        {!! $data->appends(Request::all())->links() !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-12">
                                            <div class="card ">
                                                <div class="card-header">
                                                    <h5>Daftar Volunteer</h5>
                                                    <div class="card-header-right">
                                                        <ul class="list-unstyled card-option">
                                                            <li><i class="fa fa fa-wrench open-card-option"></i>
                                                            </li>
                                                            <li><i class="fa fa-window-maximize full-card"></i></li>
                                                            <li><i class="fa fa-minus minimize-card"></i></li>
                                                            <li><i class="fa fa-refresh reload-card"></i></li>
                                                            <li><i class="fa fa-trash close-card"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="card-block">
                                                    @foreach($volunteer as $volunteers)
                                                    <div class="align-middle m-b-30">
                                                        <img src="{{url('img/users.png')}}" alt="user image"
                                                            class="img-radius img-40 align-top m-r-15">
                                                        <div class="d-inline-block">
                                                            <h6>{{$volunteers->nama}}</h6>
                                                            <p class="text-muted m-b-0">Batch : {{$volunteers->batch}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    @endforeach

                                                </div>
                                            </div>
                                        </div>
                                        <!--  project and team member end -->
                                    </div>
                                </div>
                                <!-- Page-body end -->
                            </div>
                            <div id="styleSelector"> </div>
                        </div>
                    </div>
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