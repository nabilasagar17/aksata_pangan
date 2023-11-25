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
                        <h5 class="m-b-10">Detail Bantuan Dana Masuk</h5>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Bantuan Masuk</a>
                        </li>

                        <li class="breadcrumb-item"><a href="#!">Bantuan Dana</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Detail Bantuan Dana</a>
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
                    <div class="card">
                        <div class="card-header">
                            <div class="col-lg-8">
                                <h5>Table Detail Bantuan Dana Masuk</h5>
                            </div>

                            <div class="card-header-right">
                                <a type='button' href="{{url('admin/print_detail_dana_masuk')}}"
                                    class="btn btn-mat waves-effect waves-light btn-primary ">Print</a>
                            </div>
                        </div>
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>

                                        <tr>
                                            <th>No</th>
                                            <th>Gambar</th>
                                            <th>TTD</th>
                                            <th>Nama Pengirim</th>
                                            <th>No.Telp Pengirim</th>

                                            <th>Qty</th>


                                            <th>Pengiriman</th>
                                            <th>Tgl.Masuk</th>
                                            <!-- <th>Aksi</th> -->
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <?php  $no = 15 * ( (Request::input('page') != '' ? Request::input('page') : 1) - 1) + 1; ?>

                                        @foreach($data as $datas)

                                        <tr>
                                            <td scope="row">{{$no++}}</td>
                                            <td>@if($datas->file_path != "")
                                                <div class="d-flex align-items-center">

                                                    <img width="150" height="100"
                                                        src="{{asset('img/bukti_masuk/'. $datas->file_path)}}" alt="" />


                                                </div>

                                                @endif
                                            </td>
                                            @if($datas->path_ttd_pemberi == "")
                                            <td>


                                            </td>
                                            @else
                                            <td>
                                                <div class="d-flex align-items-center">

                                                    <img width="150" height="100"
                                                        src="{{asset('file_ttd_masuk/'. $datas->path_ttd_pemberi)}}"
                                                        alt="" />


                                                </div>
                                            </td>
                                            @endif
                                            <td>{{$datas->nama_pemberi}}</td>
                                            <td>{{$datas->no_telp_pemberi}}</td>
                                            <td>Rp.{{number_format($datas->qty)}}</td>

                                            <td>{{$datas->pengiriman}}</td>

                                            <td>{{date('d-m-Y', strtotime($datas->tgl_masuk))}}</td>
                                            <!-- <td>
                                                <button class="btn  btn-danger btn-sm"
                                                    onClick="hapus('{{ $datas->id}}')"><i
                                                        class="ti-trash fa-sm"></i></button>
                                            </td> -->
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