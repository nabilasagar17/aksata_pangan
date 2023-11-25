@extends('template.index')
@section('content')
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
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                        </li>
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
                    <div class="row">
                        <!-- task, page, download counter  start -->
                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-block">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <h4 class="text-c-purple">{{number_format(@$total_dana[0]->total_dana)}}
                                            </h4>
                                            <h6 class="text-muted m-b-0">Rupiah/Tahun
                                            </h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <i class="fa fa-bar-chart f-28"></i>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{url('admin/detail_dana_masuk_widget')}}">
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
                            <a href="{{url('admin/detail_makanan_masuk_widget')}}">
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
                            <a href="{{url('admin/detail_penyaluran_makanan_widget')}}">
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
                            <a href="{{url('admin/detail_penyaluran_dana_widget')}}">
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
                                                    <span class="badge bg-warning">Belum Dibagikan</span>
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
                                                <td>{{date('d-m-Y', strtotime($datas->created_at))}}</td>
                                                <td>
                                                    <!-- <button class="btn  btn-success btn-sm"><i
                                                        class="ti-pencil fa-sm"></i></button> -->
                                                    <button class="btn  btn-danger btn-sm"><i
                                                            class="ti-trash fa-sm"></i></button>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>

                                </div>
                                <div class="m-datatable__pager m-datatable--paging-loaded clearfix my-2">
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
                                    <img src="assets/images/avatar-2.jpg" alt="user image"
                                        class="img-radius img-40 align-top m-r-15">
                                    <div class="d-inline-block">
                                        <h6>{{$volunteers->nama}}</h6>
                                        <p class="text-muted m-b-0">Batch : {{$volunteers->batch}}</p>
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

@endsection