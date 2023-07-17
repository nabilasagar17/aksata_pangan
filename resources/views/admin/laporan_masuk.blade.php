@extends('template.index')
@section('content')
<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Laporan Bantuan Masuk</h5>

                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Laporan Bantuan</a>
                        </li>
                        @if(Request::segment(2) == 'laporan_bantuan_masuk')
                        <li class="breadcrumb-item"><a href="#!">Laporan Bantuan Masuk</a>
                        </li>
                        @elseif(Request::segment(2) == 'laporan_bantuan_makanan')
                        <li class="breadcrumb-item"><a href="#!">Laporan Makanan Masuk</a>
                        </li>
                        @else
                        <li class="breadcrumb-item"><a href="#!">Laporan Dana Masuk</a>
                        </li>
                        @endif
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


                    <!-- Hover table card start -->
                    <div class="card">
                        <div class="card-header">
                            <h5>Laporan Bantuan</h5>

                            <div class="card-header-right">
<<<<<<< HEAD
                                <a type='button' href="{{url('admin/print_laporan_masuk')}}"
                                    class="btn btn-mat waves-effect waves-light btn-primary ">Print</a>
=======
                                <ul class="list-unstyled card-option">
                                    <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                    <li><i class="fa fa-window-maximize full-card"></i></li>
                                    <li><i class="fa fa-minus minimize-card"></i></li>
                                    <li><i class="fa fa-refresh reload-card"></i></li>
                                    <li><i class="fa fa-trash close-card"></i></li>
                                </ul>
>>>>>>> 361d3b814366993f6c2d4bc60fa8136a6c7346f4
                            </div>
                        </div>
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
<<<<<<< HEAD
                                        @if(Request::segment(2) == 'laporan_bantuan_dana')
                                        <tr>
                                            <th>No</th>

                                            <th>Nama Pengirim</th>
                                            <th>Alamat Pengirim</th>
                                            <th>Kategori</th>
                                            <th>Jlh</th>
                                            <th>Jlh.Belum Disebar</th>
                                            <th>Jlh.Sisa Disebar</th>
                                            <th>Pengiriman</th>

                                            <th>Tgl.Masuk</th>
                                            <th>Aksi</th>
                                        </tr>
                                        @else
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Nama Pengirim</th>
                                            <th>Alamat Pengirim</th>
                                            <th>Kategori</th>
                                            <th>Qty</th>
                                            <th>Sisa Belum Disebar</th>
                                            <th>Sisa Disebar</th>
                                            <th>Berat</th>
                                            <th>Satuan Barang</th>
                                            <th>Harga</th>
                                            <th>Pengiriman</th>

                                            <th>Tgl.Exp</th>
                                            <th>Tgl.Masuk</th>
                                            <th>Aksi</th>
                                        </tr>

                                        @endif
                                    </thead>
                                    <tbody>

                                        @foreach($data as $datas)
                                        @if(Request::segment(2) == 'laporan_bantuan_dana')
                                        <tr>
                                            <td scope="row">{{$no++}}</td>
                                            <td>{{$datas->harga}}</td>
                                            <td>{{$datas->sisa_belum_tersebar}}</td>
                                            <td>{{$datas->sisa_disebar}}</td>
                                            <td>{{$datas->pengiriman}}</td>

                                            <td>{{$datas->tgl_masuk}}</td>
                                            <td><button class="btn waves-effect waves-light btn-primary"><i
                                                        class="icofont icofont-user-alt-3"></i></button>
                                            </td>
                                        </tr>

                                        @else
                                        <tr>
                                            <td scope="row">{{$no++}}</td>
                                            <td>{{$datas->nama}}</td>
                                            <td>{{$datas->kategori}}</td>
                                            <td>{{$datas->qty}}</td>
                                            <td>{{$datas->sisa_belum_tersebar}}</td>
                                            <td>{{$datas->sisa_disebar}}</td>
                                            <td>{{$datas->berat}}</td>
                                            <td>{{$datas->satuan_barang}}</td>
                                            <td>{{$datas->harga}}</td>
                                            <td>{{$datas->pengiriman}}</td>
                                            <td>{{$datas->exp_date}}</td>
                                            <td>{{$datas->tgl_masuk}}</td>
                                            <td><button class="btn waves-effect waves-light btn-primary"><i
                                                        class="icofont icofont-user-alt-3"></i></button>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
=======
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Bantuan</th>
                                            <th>Kategori</th>
                                            <th>Username</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
>>>>>>> 361d3b814366993f6c2d4bc60fa8136a6c7346f4

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Hover table card end -->

                </div>
                <!-- Page-body end -->
            </div>
        </div>
        <!-- Main-body end -->

        <div id="styleSelector">

        </div>
    </div>
</div>
@endsection