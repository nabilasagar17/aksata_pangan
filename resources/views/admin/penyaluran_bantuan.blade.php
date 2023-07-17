@extends('template.index')
@section('content')
<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Penyaluran Bantuan</h5>

                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Penyaluran Bantuan</a>
                        </li>
                        @if(Request::segment(2) == 'penyaluran_makanan')
                        <li class="breadcrumb-item"><a href="#!">Penyaluran Makanan</a>
                        </li>
                        @elseif(Request::segment(2) == 'penyaluran_dana')
                        <li class="breadcrumb-item"><a href="#!">Penyaluran Dana</a>
                        </li>
                        @else
                        <li class="breadcrumb-item"><a href="#!">Penyaluran Keseluruhan</a>
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
<<<<<<< HEAD
                            <div class="row">
                                <div class="col-lg-10">
                                    <h5>Table Penyaluran Bantuan</h5>
                                </div>



                                <div class="col-lg-2 ">

                                    <button type='submit' class="btn btn-block  btn-primary">Print</button>

                                </div>
                            </div>

=======
                            <h5>Hover Table</h5>

                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                    <li><i class="fa fa-window-maximize full-card"></i></li>
                                    <li><i class="fa fa-minus minimize-card"></i></li>
                                    <li><i class="fa fa-refresh reload-card"></i></li>
                                    <li><i class="fa fa-trash close-card"></i></li>
                                </ul>
                            </div>
>>>>>>> 361d3b814366993f6c2d4bc60fa8136a6c7346f4
                        </div>
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Bantuan</th>
<<<<<<< HEAD
                                            <th>Jumlah</th>
                                            <th>Keperluan</th>
                                            <th>Pengiriman</th>
                                            <th>Keterangan</th>
                                            <th>Nama Penerima</th>
                                            <th>Alamat Penerima</th>
                                            <th>Tgl.Dibuat</th>
                                            <th>Aksi</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <?php  $no = 15 * ( (Request::input('page') != '' ? Request::input('page') : 1) - 1) + 1; ?>

                                        @foreach($data as $datas)
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>{{$datas->nama}}</td>
                                            <td>{{$datas->qty}}</td>
                                            <td>{{$datas->keperluan}}</td>
                                            <td>{{$datas->pengiriman}}</td>
                                            <td>{{$datas->keterangan}}</td>
                                            <td>{{$datas->nama_penerima}}</td>
                                            <td>{{$datas->alamat_penerima}}</td>
                                            <td>{{$datas->created_at}}</td>
                                            <td><button class="btn  btn-success btn-sm"><i
                                                        class="ti-pencil fa-sm"></i></button>
                                                <button class="btn  btn-danger btn-sm"><i
                                                        class="ti-trash fa-sm"></i></button>
                                            </td>
                                        </tr>
                                        @endforeach
=======
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