@extends('template.index')
@section('content')
<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Laporan Penyaluran Bantuan</h5>

                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Laporan Bantuan</a>
                        </li>
                        @if(Request::segment(2) == 'laporan_penyaluran_makanan')
                        <li class="breadcrumb-item"><a href="#!">Laporan Penyaluran Makanan</a>
                        </li>
                        @elseif(Request::segment(2) == 'laporan_penyaluran_dana')
                        <li class="breadcrumb-item"><a href="#!">Laporan Penyaluran Dana</a>
                        </li>
                        @else
                        <li class="breadcrumb-item"><a href="#!">Laporan Penyaluran Bantuan</a>
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

                                <a type='button' href="{{url('admin/print_laporan_keluar')}}"
                                    class="btn btn-mat waves-effect waves-light btn-primary ">Print</a>


                            </div>
                        </div>
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Bantuan</th>
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