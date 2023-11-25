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

                    <!-- Start Modal Hapus -->

                    <div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Stok Bantuan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{url('admin/delete_stok_masuk')}}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-12 my-2">
                                                <h6> Sistem secara otomatis akan menghapus yang berhubungan dengan data
                                                    ini,hapus data stok ini?
                                                </h6>
                                                <input type="text" name="id" hidden>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Ya, Hapus</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!-- End modal hapus -->


                    <!-- Hover table card start -->
                    <div class="card">
                        <div class="card-header">
                            <div class="col-lg-8">
                                <h5>Table Bantuan Masuk</h5>
                            </div>
                            <form class="form-inline my-2">
                                <input class="form-control mr-sm-2" value="{{Request::input('search')}}" name="search"
                                    type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success my-sm-0" type="submit">Search</button>
                            </form>
                            <div class="card-header-right">

                                <a type='button' href="{{url('admin/preview_barang_masuk')}}"
                                    class="btn btn-mat waves-effect waves-light btn-primary ">Input Data</a>
                                @if(Request::segment(2) == 'food_bank')
                                <a type='button' href="{{url('admin/preview_barang_keluar')}}"
                                    class="btn btn-mat waves-effect waves-light btn-danger">Penyaluran Makanan</a>
                                @else
                                <button type='button' data-toggle="modal" data-target="#tambah_dana"
                                    class="btn btn-mat waves-effect waves-light btn-danger">Penyaluran Dana</button>
                                @endif

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
                                            <th>Nama Donatur</th>
                                            <th>No.Telp Donatur</th>
                                            <th>Kategori</th>
                                            <th>Qty</th>
                                            <th>Qty Masuk</th>
                                            <th>Jlh.Disebar</th>

                                            <th>Satuan Barang</th>
                                            <th>Harga</th>
                                            <th>Total</th>
                                            <th>Pengiriman</th>

                                            <th>Tgl.Exp</th>
                                            <th>Tgl.Masuk</th>
                                            <th>Aksi</th>
                                        </tr>
                                        @else
                                        <tr>
                                            <th>No</th>



                                            <th>Total Dana</th>

                                            <th>Jlh.Disebar</th>


                                            <th>Aksi</th>
                                        </tr>
                                        @endif
                                    </thead>
                                    <tbody>
                                        <?php  $no = 15 * ( (Request::input('page') != '' ? Request::input('page') : 1) - 1) + 1; ?>

                                        @foreach($data as $datas)
                                        @if(Request::segment(2) == 'food_bank')
                                        <tr>
                                            <td scope="row">{{$no++}}</td>

                                            <td>{{$datas->nama}}</td>
                                            <td>{{$datas->nama_pemberi}}</td>
                                            <td>{{$datas->no_telp_pemberi}}</td>
                                            <td>{{$datas->kategori}}</td>
                                            <td>{{$datas->qty}}</td>
                                            <td>{{$datas->qty_masuk}}</td>
                                            <td>{{$datas->sisa_disebar}}</td>

                                            <td>{{$datas->satuan_barang}}</td>
                                            <td>Rp.{{number_format($datas->harga)}}</td>
                                            <td>Rp.{{number_format($datas->total)}}</td>
                                            <td>{{$datas->pengiriman}}</td>
                                            <td> {{date('d-m-Y', strtotime($datas->exp_date))}}</td>
                                            <td>{{date('d-m-Y', strtotime($datas->tgl_masuk))}}</td>
                                            <td>
                                                <!-- <button class="btn  btn-success btn-sm"><i
                                                        class="ti-pencil fa-sm"></i></button> -->
                                                <button class="btn  btn-danger btn-sm"
                                                    onClick="hapus('{{ $datas->id}}')"><i
                                                        class="ti-trash fa-sm"></i></button>
                                            </td>
                                        </tr>
                                        @else
                                        <tr>
                                            <td scope="row">{{$no++}}</td>

                                            <td>Rp.{{number_format($datas->harga)}}</td>
                                            <td>Rp.{{number_format($datas->sisa_disebar)}}</td>


                                            <td><a href="{{url('admin/bantuan_dana/detail_dana_masuk')}}"
                                                    class="btn  btn-primary btn-sm"><i class="ti-eye fa-sm"></i></a>
                                                <!-- <button class="btn  btn-success btn-sm"><i
                                                        class="ti-pencil fa-sm"></i></button> -->

                                            </td>
                                        </tr>
                                        <div class="modal fade" id="tambah_dana" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Dana</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{url('admin/insert_dana_keluar')}}" method="post"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="row">

                                                                <div class="col-sm-6 ">
                                                                    <label class="col-sm-12  col-form-label">Jumlah
                                                                        Dana</label>
                                                                    <div class="col-sm-12 mb-3">
                                                                        <input type="number" name="qty"
                                                                            max="{{$datas->harga}}"
                                                                            class="form-control">
                                                                        <input hidden type="text" name="id"
                                                                            value="{{$datas->id}}" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6 ">
                                                                    <label
                                                                        class="col-sm-12  col-form-label">Keperluan</label>
                                                                    <div class="col-sm-12 mb-3">
                                                                        <select name="keperluan" class="form-control">
                                                                            <option>Pilih keperluan</option>

                                                                            <option value="Pelaksanaan Program">
                                                                                Pelaksanaan Program
                                                                            </option>
                                                                            <option value="Keperluan Operasional">
                                                                                Keperluan Operasional
                                                                            </option>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 ">
                                                                    <label class="col-sm-12  col-form-label">Nama
                                                                        Penangung Jawab</label>
                                                                    <div class="col-sm-12 mb-3">
                                                                        <input type="text" name="nama"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 ">
                                                                    <label
                                                                        class="col-sm-12  col-form-label">Keterangan</label>
                                                                    <div class="col-sm-12 mb-3">
                                                                        <Textarea type="text" name="keterangan"
                                                                            class="form-control"></Textarea>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                        @endif
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

function hapus(id) {
    $('#hapus').modal('show');
    $('input[name="id"]').val(id);

}
</script>
@endsection