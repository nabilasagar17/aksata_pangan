<?php

use Illuminate\Support\Carbon;

?>
@extends('template.index')
@section('content')
<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Preview Input Bantuan Masuk</h5>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Bantuan Masuk</a>
                        </li>

                        <li class="breadcrumb-item"><a href="#!">Preview Input Bantuan Masuk</a>
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
            <div class="page-body">



                <!-- Hover table card start -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="col-lg-8">
                                    <h5>Table Data Bantuan</h5>
                                </div>

                                <div class="card-header-right">


                                </div>
                            </div>
                            <div class="card-block table-border-style">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>

                                            <tr>
                                                <th>No</th>
                                                <th>Nama Barang</th>
                                                <th>Kategori</th>
                                                <th>Qty</th>

                                                <th>Berat</th>
                                                <th>Satuan Barang</th>
                                                <th>Harga</th>
                                                <th>Pengiriman</th>
                                                <th>Tgl.Exp</th>
                                                <th>Tgl.Masuk</th>
                                                <th>Aksi</th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                            <?php  $no = 15 * ( (Request::input('page') != '' ? Request::input('page') : 1) - 1) + 1; ?>

                                            @foreach($data as $datas)

                                            <tr>
                                                <td scope="row">{{$no++}}</td>
                                                <td>{{$datas->nama}}</td>
                                                <td>{{$datas->kategori}}</td>
                                                <td>{{$datas->qty}}</td>

                                                <td>{{$datas->berat}}</td>
                                                <td>{{$datas->satuan_barang}}</td>
                                                <td>{{$datas->harga}}</td>
                                                <td>{{$datas->pengiriman}}</td>
                                                <td>{{$datas->exp_date}}</td>
                                                <td>{{$datas->tgl_masuk}}</td>
                                                <td><button class="btn  btn-danger btn-sm"><i
                                                            class="ti-plus fa-sm"></i></button>
                                                </td>
                                            </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-10">
                                        <h5>Table Penyaluran Bantuan</h5>
                                    </div>



                                    <div class="col-lg-2 ">

                                        <a type='button' href="{{url('admin/insert_data_penerima')}}"
                                            class="btn btn-block  btn-primary">Next</a>

                                    </div>
                                </div>

                            </div>
                            <div class="card-block table-border-style">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>

                                            <tr>
                                                <th>No</th>
                                                <th>Nama Barang</th>
                                                <th>Kategori</th>
                                                <th>Qty</th>

                                                <th>Berat</th>
                                                <th>Satuan Barang</th>
                                                <th>Harga</th>
                                                <th>Pengiriman</th>
                                                <th>Tgl.Exp</th>
                                                <th>Tgl.Masuk</th>
                                                <th>Aksi</th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                            <?php  $no = 15 * ( (Request::input('page') != '' ? Request::input('page') : 1) - 1) + 1; ?>

                                            @foreach($data as $datas)

                                            <tr>
                                                <td scope="row">{{$no++}}</td>
                                                <td>{{$datas->nama}}</td>
                                                <td>{{$datas->kategori}}</td>
                                                <td>{{$datas->qty}}</td>

                                                <td>{{$datas->berat}}</td>
                                                <td>{{$datas->satuan_barang}}</td>
                                                <td>{{$datas->harga}}</td>
                                                <td>{{$datas->pengiriman}}</td>
                                                <td>{{$datas->exp_date}}</td>
                                                <td>{{$datas->tgl_masuk}}</td>
                                                <td><button class="btn  btn-succes btn-sm"><i
                                                            class="ti-trash fa-sm"></i></button>
                                                    <button class="btn  btn-danger btn-sm"><i
                                                            class="ti-minus fa-sm"></i></button>
                                                </td>
                                            </tr>

                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <!-- Hover table card end -->
            </div>
        </div>
    </div>
    <!-- Main-body end -->

    <div id="styleSelector">

    </div>
</div>
</div>

<style>
.kbw-signature {
    width: 100%;
    height: 200px;
}

#sig canvas {
    width: 100% !important;
    height: auto;
}
</style>

<script type="text/javascript">
var sig = $('#sig').signature({
    syncField: '#signature64',
    syncFormat: 'PNG'
});
$('#clear').click(function(e) {
    e.preventDefault();
    sig.signature('clear');
    $("#signature64").val('');
});
</script>
@endsection