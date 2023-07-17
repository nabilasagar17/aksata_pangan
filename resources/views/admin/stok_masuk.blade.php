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
                        <h5 class="m-b-10">Bantuan Masuk</h5>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Bantuan Masuk</a>
                        </li>
                        @if(Request::segment(2) == 'food_bank')
                        <li class="breadcrumb-item"><a href="#!">Food Bank</a>
                        </li>
                        @elseif(Request::segment(2) == 'bantuan_dana')
                        <li class="breadcrumb-item"><a href="#!">Bantuan Dana</a>
                        </li>
                        @else
                        <li class="breadcrumb-item"><a href="#!">Bantuan Masuk</a>
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
                            <div class="col-lg-8">
                                <h5>Table Bantuan Masuk</h5>
                            </div>

                            <div class="card-header-right">

                                <a type='button' href="{{url('admin/preview_barang_masuk')}}"
                                    class="btn btn-mat waves-effect waves-light btn-primary ">Input Data</a>
                                <a type='button' href="{{url('admin/preview_barang_keluar')}}"
                                    class="btn btn-mat waves-effect waves-light btn-danger">Penyaluran Barang</a>

                            </div>
                        </div>
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        @if(Request::segment(2) == 'food_bank')
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
                                        @else
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
                                        @endif
                                    </thead>
                                    <tbody>

                                        @foreach($data as $datas)
                                        @if(Request::segment(2) == 'food_bank')
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
                                        @else
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
                                        @endif
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