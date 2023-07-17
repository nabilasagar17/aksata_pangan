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
                        <h5 class="m-b-10">Preview Input Data Donatur</h5>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Bantuan Masuk</a>
                        </li>

                        <li class="breadcrumb-item"><a href="{{url('admin/preview_barang_masuk')}}">Preview Input
                                Bantuan Masuk</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Preview Input Data Donatur</a>
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



                    <!-- Hover table card start -->
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-header">
                                    <div class="col-lg-8">
                                        <h5>Table Preview Bantuan Masuk</h5>
                                    </div>

                                    <div class="card-header-right">


                                        <!-- <ul class="list-unstyled card-option">
                                    <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                    <li><i class="fa fa-window-maximize full-card"></i></li>
                                    <li><i class="fa fa-minus minimize-card"></i></li>
                                    <li><i class="fa fa-refresh reload-card"></i></li>
                                    <li><i class="fa fa-trash close-card"></i></li>
                                </ul> -->
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
                                                                class="ti-trash fa-sm"></i></button>
                                                    </td>
                                                </tr>

                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <div class="col-lg-8">
                                        <h5>Input Data Donatur</h5>
                                    </div>
                                    <form action="{{url('admin/insert_bantuan')}}" method="post"
                                        multipart="multipart/form-data">
                                        @csrf
                                        <div class="row my-3">
                                            <div class="col-sm-12 ">
                                                <label class="col-sm-12  col-form-label">Nama Donatur</label>
                                                <div class="col-sm-12 mb-3">
                                                    <input type="text" name="nama" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-sm-12 ">
                                                <label class="col-sm-12  col-form-label">Email Donatur</label>
                                                <div class="col-sm-12 mb-3">
                                                    <input type="email" name="email" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 ">
                                                <label class="col-sm-12  col-form-label">No.Telp Donatur</label>
                                                <div class="col-sm-12 mb-3">
                                                    <input type="text" name="no_telp" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 ">
                                                <label class="col-sm-12  col-form-label">Alamat Donatur</label>
                                                <div class="col-sm-12 mb-3">
                                                    <Textarea type="text" name="alamat" class="form-control"></Textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 ">
                                                <label class="col-sm-12  col-form-label">Foto Bukti Terima</label>
                                                <div class="col-sm-12 mb-3">
                                                    <input type="file" id="myfile" name="file_path">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 ">
                                                <label class="col-sm-12  col-form-label">Tanda Tangan Donatur</label>
                                                <div class="col-sm-12 mb-3">
                                                    <div id="sig"></div>
                                                    <br />
                                                    <button id="clear" class="btn btn-danger btn-sm">Clear
                                                        Signature</button>
                                                    <textarea id="signature64" name="signed"
                                                        style="display: none"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 ">
                                                <button type="submit" class="btn btn-primary float-right">Next</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <!-- Hover table card end -->
                    </div>
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


<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
    integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
<script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
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