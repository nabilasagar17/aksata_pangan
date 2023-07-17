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
            <div class="page-wrapper">
                <!-- Page-body start -->
                <div class="page-body">

                    <!-- Modal -->
                    <div class="modal fade" id="tambah_makanan" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Makanan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{url('admin/insert_preview_bantuan')}}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <!-- <div class="col-sm-12 ">
                                                <label class="col-sm-12  col-form-label">Nama Donatur</label>
                                                <div class="col-sm-12 mb-3">
                                                    <input type="text" name="nama" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 ">
                                                <label class="col-sm-12  col-form-label">Alamat Donatur</label>
                                                <div class="col-sm-12 mb-3">
                                                    <Textarea type="text" name="alamat" class="form-control"></Textarea>
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
                                            </div> -->
                                            <div class="col-sm-12 ">
                                                <label class="col-sm-12  col-form-label">Nama Makanan</label>
                                                <div class="col-sm-12 mb-3">
                                                    <input type="text" name="nama_makanan" class="form-control">
                                                    <input type="text" hidden value="makanan" name="kategori"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-4 ">
                                                <label class="col-sm-12  col-form-label">Tgl.Masuk</label>
                                                <div class="col-sm-12 mb-3">
                                                    <input type="date" id="appt" name="tgl_masuk">
                                                </div>
                                            </div>
                                            <div class="col-sm-4 ">
                                                <label class="col-sm-12  col-form-label">Exp.Date</label>
                                                <div class="col-sm-12 mb-3">
                                                    <input type="date" id="appt" name="exp_date">
                                                </div>
                                            </div>
                                            <div class="col-sm-4 ">
                                                <label class="col-sm-12  col-form-label">Berat</label>
                                                <div class="col-sm-12 mb-3">
                                                    <input type="number" name="berat" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-4 ">
                                                <label class="col-sm-12  col-form-label">Qty</label>
                                                <div class="col-sm-12 mb-3">
                                                    <input type="number" name="qty" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-4 ">
                                                <label class="col-sm-12  col-form-label">Harga</label>
                                                <div class="col-sm-12 mb-3">
                                                    <input type="number" name="harga" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-4 ">
                                                <label class="col-sm-12  col-form-label">Satuan Barang</label>
                                                <div class="col-sm-12 mb-3">
                                                    <select name="satuan_barang" class="form-control">
                                                        <option value="Ons">Ons</option>
                                                        <option value="Kg">Kg</option>
                                                        <option value="Box">Box</option>
                                                        <option value="Box">Sachet</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 ">
                                                <label class="col-sm-12  col-form-label">Pengantaran</label>
                                                <div class="col-sm-12 mb-3">
                                                    <select name="pengantaran" class="form-control">
                                                        <option value="Diantar ke Organisasi">Diantar ke tempat</option>
                                                        <option value="Transfer">Transfer</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 ">
                                                <label class="col-sm-12  col-form-label">Keterangan</label>
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

                    <div class="modal fade" id="tambah_dana" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Dana</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{url('admin/insert_preview_bantuan')}}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <!-- <div class="col-sm-12 ">
                                                <label class="col-sm-12  col-form-label">Nama Donatur</label>
                                                <div class="col-sm-12 mb-3">
                                                    <input type="text" name="nama" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 ">
                                                <label class="col-sm-12  col-form-label">Alamat Donatur</label>
                                                <div class="col-sm-12 mb-3">
                                                    <Textarea type="text" name="alamat" class="form-control"></Textarea>
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
                                            </div> -->

                                            <div class="col-sm-4 ">
                                                <label class="col-sm-12  col-form-label">Tgl.Masuk</label>
                                                <div class="col-sm-12 mb-3">
                                                    <input type="date" id="appt" name="tgl_masuk">
                                                    <input type="text" hidden value="dana" name="kategori"
                                                        class="form-control">
                                                </div>
                                            </div>


                                            <div class="col-sm-4 ">
                                                <label class="col-sm-12  col-form-label">Jumlah Dana</label>
                                                <div class="col-sm-12 mb-3">
                                                    <input type="number" name="harga" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-4 ">
                                                <label class="col-sm-12  col-form-label">Satuan Barang</label>
                                                <div class="col-sm-12 mb-3">
                                                    <select name="satuan_barang" class="form-control">
                                                        <option value="Ons">Rupiah</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 ">
                                                <label class="col-sm-12  col-form-label">Pengantaran</label>
                                                <div class="col-sm-12 mb-3">
                                                    <select name="pengantaran" class="form-control">
                                                        <option value="Diantar ke Organisasi">Diantar ke tempat</option>
                                                        <option value="Transfer">Transfer</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 ">
                                                <label class="col-sm-12  col-form-label">Keterangan</label>
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


                    <!-- Hover table card start -->
                    <div class="card">
                        <div class="card-header">
                            <div class="col-lg-8">
                                <h5>Table Preview Bantuan Masuk</h5>
                            </div>

                            <div class="card-header-right">

                                <button data-toggle="modal" data-target="#tambah_makanan"
                                    class="btn btn-mat waves-effect waves-light btn-success ">Tambah Makanan</button>
                                <button data-toggle="modal" data-target="#tambah_dana"
                                    class="btn btn-mat waves-effect waves-light btn-success ">Tambah Dana</button>
                                <a type="button" href="{{url('admin/insert_data_donatur')}}"
                                    class="btn btn-mat waves-effect waves-light btn-primary">Next</a>
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