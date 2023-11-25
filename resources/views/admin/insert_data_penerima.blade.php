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
                        <h5 class="m-b-10">Preview Input Data Penerima</h5>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Bantuan Keluar</a>
                        </li>

                        <li class="breadcrumb-item"><a href="{{url('admin/preview_barang_Keluar')}}">Preview Input
                                Bantuan Keluar</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Preview Input Data Penerima</a>
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
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-header">
                                    <div class="col-lg-8">
                                        <h5>Table Preview Bantuan Keluar</h5>
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


                                                    <th>Satuan Barang</th>
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
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <div class="col-lg-8">
                                        <h5>Input Detail</h5>
                                    </div>
                                    <form action="{{url('admin/insert_bantuan_keluar')}}" method="post"
                                        multipart="multipart/form-data">
                                        @csrf
                                        <div class="row my-3">
                                            <!-- <div class="col-sm-12 ">
                                                <label class="col-sm-12  col-form-label">Nama Penerima</label>
                                                <div class="col-sm-12 mb-3">
                                                    <input type="text" name="nama" class="form-control">
                                                </div>
                                            </div> -->

                                            <div class="col-sm-12 ">
                                                <label class="col-sm-12  col-form-label">Keperluan</label>
                                                <div class="col-sm-12 mb-3">
                                                    <select name="keperluan" class="form-control">
                                                        <option>Pilih keperluan</option>
                                                        <option value="Pembagian Pangan">Pembagian Pangan
                                                        </option>


                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 ">
                                                <label class="col-sm-12  col-form-label">Nama Penerima</label>
                                                <div class="col-sm-12 mb-3">
                                                    <input type="text" name="nama" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 ">
                                                <label class="col-sm-12  col-form-label">No.Telp Penerima</label>
                                                <div class="col-sm-12 mb-3">
                                                    <input type="text" name="no_telp" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 ">
                                                <label class="col-sm-12  col-form-label">Alamat Penerima</label>
                                                <div class="col-sm-12 mb-3">
                                                    <Textarea type="text" name="alamat" class="form-control"></Textarea>
                                                </div>
                                            </div>
                                            <!-- <div class="col-sm-12 ">
                                                <label class="col-sm-12  col-form-label">Foto Bukti Terima</label>
                                                <div class="col-sm-12 mb-3">
                                                    <input type="file" id="myfile" name="file_path">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 ">
                                                <label class="col-sm-12  col-form-label">Tanda Tangan Penerima</label>
                                                <div class="col-sm-12 mb-3">
                                                    <div id="sig"></div>
                                                    <br />
                                                    <button id="clear" class="btn btn-danger btn-sm">Clear
                                                        Signature</button>
                                                    <textarea id="signature64" name="signed"
                                                        style="display: none"></textarea>
                                                </div>
                                            </div>  -->
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

function hapus(id) {
    $('#hapus').modal('show');
    $('input[name="id"]').val(id);

}
</script>
@endsection