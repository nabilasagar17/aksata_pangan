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
                        <h5 class="m-b-10">Preview Input Bantuan Keluar</h5>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Bantuan Masuk</a>
                        </li>

                        <li class="breadcrumb-item"><a href="#!">Preview Input Bantuan Keluar</a>
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


                <!-- Start Modal Hapus -->

                <div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Preview</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{url('admin/delete_preview_keluar')}}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-12 my-2">
                                            <h6> Hapus data preview ini?
                                            </h6>
                                            <input type="text" name="id" hidden>
                                        </div>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Ya, Hapus</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <!-- End modal hapus -->


                <!-- Hover table card start -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h5>Data Bantuan</h5>
                            </div>
                            <div class="card-block tab-icon">
                                <!-- Row start -->
                                <div class="row">
                                    <div class="col-lg-12 col-xl-12">

                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs md-tabs " role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#home7" role="tab"><i
                                                        class="icofont icofont-home"></i>Makanan</a>
                                                <div class="slide"></div>
                                            </li>


                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content card-block">
                                            <div class="tab-pane active" id="home7" role="tabpanel">
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

                                                            @foreach($makanan as $makanans)

                                                            <tr>
                                                                <td scope="row">{{$no++}}</td>
                                                                <td>{{$makanans->nama}}</td>
                                                                <td>{{$makanans->kategori}}</td>
                                                                <td>{{$makanans->qty}}</td>

                                                                <td>{{$makanans->berat}}</td>
                                                                <td>{{$makanans->satuan_barang}}</td>
                                                                <td>Rp.{{number_format($makanans->harga)}}</td>
                                                                <td>{{$makanans->pengiriman}}</td>
                                                                <td>{{$makanans->exp_date}}</td>
                                                                <td>{{$makanans->tgl_masuk}}</td>
                                                                <td><button class="btn  btn-success btn-sm"
                                                                        data-toggle="modal"
                                                                        data-target="#tambah_makanan"><i
                                                                            class="ti-plus fa-sm"></i></button>
                                                                </td>
                                                            </tr>
                                                            <div class="modal fade" id="tambah_makanan" tabindex="-1"
                                                                role="dialog" aria-labelledby="exampleModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLabel">Tambah Makanan
                                                                            </h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <form
                                                                            action="{{url('admin/insert_preview_bantuan_keluar')}}"
                                                                            method="post" enctype="multipart/form-data">
                                                                            @csrf
                                                                            <div class="modal-body">
                                                                                <div class="row">

                                                                                    <div class="col-sm-6 ">
                                                                                        <label
                                                                                            class="col-sm-12  col-form-label">Jumlah
                                                                                            Makanan</label>
                                                                                        <div class="col-sm-12 mb-3">
                                                                                            <input type="number"
                                                                                                name="qty"
                                                                                                max="{{$makanans->qty}}"
                                                                                                class="form-control">
                                                                                            <input hidden type="text"
                                                                                                name="id"
                                                                                                value="{{$makanans->id}}"
                                                                                                class="form-control">
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">Close</button>
                                                                                <button type="submit"
                                                                                    class="btn btn-primary">Save</button>
                                                                            </div>
                                                                        </form>

                                                                    </div>
                                                                </div>
                                                            </div>


                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                </div>
                                <!-- Row end -->
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-6">
                        @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{session()->get('message') }}
                        </div>
                        @elseif(session()->has('error'))
                        <div class="alert alert-danger">
                            {{session()->get('error') }}
                        </div>
                        @endif
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
                                                <th>Jumlah</th>

                                                <th>Satuan</th>
                                                <th>Total</th>

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
                                                @if($datas->kategori == 'makanan')
                                                <td>{{number_format($datas->qty)}}</td>
                                                @else
                                                <td></td>
                                                @endif
                                                <td>{{$datas->satuan_barang}}</td>

                                                <td>Rp.{{number_format($datas->total)}}</td>

                                                <td>{{date('d-m-Y', strtotime($datas->exp_date))}}</td>
                                                <td>{{date('d-m-Y', strtotime($datas->tgl_masuk))}}</td>
                                                <td><button onClick="hapus('{{ $datas->id}}')"
                                                        class="btn  btn-danger btn-sm"><i
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
function hapus(id) {
    $('#hapus').modal('show');
    $('input[name="id"]').val(id);

}


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