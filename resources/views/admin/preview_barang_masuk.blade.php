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
                                                <label class="col-sm-12  col-form-label">Qty</label>
                                                <div class="col-sm-12 mb-3">
                                                    <input type="number" name="qty" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 ">
                                                <label class="col-sm-12  col-form-label">Harga</label>
                                                <div class="col-sm-12 mb-3">
                                                    <input type="number" name="harga" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 ">
                                                <label class="col-sm-12  col-form-label">Satuan Barang</label>
                                                <div class="col-sm-12 mb-3">
                                                    <input type="text" name="satuan_barang" class="form-control">
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

                    <!-- StartModal -->
                    <div class="modal fade" id="edit_makanan" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Makanan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{url('admin/edit_preview_bantuan')}}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">

                                            <div class="col-sm-12 ">
                                                <label class="col-sm-12  col-form-label">Nama Makanan</label>
                                                <div class="col-sm-12 mb-3">
                                                    <input type="text" name="nama_makanans" class="form-control">
                                                    <input type="text" name="id" hidden class="form-control">
                                                    <input type="text" hidden value="makanan" name="kategoris"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-4 ">
                                                <label class="col-sm-12  col-form-label">Tgl.Masuk</label>
                                                <div class="col-sm-12 mb-3">
                                                    <input type="date" id="appt" name="tgl_masuks">
                                                </div>
                                            </div>
                                            <div class="col-sm-4 ">
                                                <label class="col-sm-12  col-form-label">Exp.Date</label>
                                                <div class="col-sm-12 mb-3">
                                                    <input type="date" id="appt" name="exp_dates">
                                                </div>
                                            </div>

                                            <div class="col-sm-4 ">
                                                <label class="col-sm-12  col-form-label">Qty</label>
                                                <div class="col-sm-12 mb-3">
                                                    <input type="number" name="qtys" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 ">
                                                <label class="col-sm-12  col-form-label">Harga</label>
                                                <div class="col-sm-12 mb-3">
                                                    <input type="number" name="hargas" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 ">
                                                <label class="col-sm-12  col-form-label">Satuan Barang</label>
                                                <div class="col-sm-12 mb-3">
                                                    <input type="text" name="satuan_barangs" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 ">
                                                <label class="col-sm-12  col-form-label">Pengantaran</label>
                                                <div class="col-sm-12 mb-3">
                                                    <select name="pengantarans" class="form-control">
                                                        <option value="Diantar ke Organisasi">Diantar ke tempat</option>
                                                        <option value="Transfer">Transfer</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 ">
                                                <label class="col-sm-12  col-form-label">Keterangan</label>
                                                <div class="col-sm-12 mb-3">
                                                    <Input type="text" name="keterangans" class="form-control"></Input>
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
                    <!-- EndModal -->

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

                                            <div class="col-sm-6">
                                                <label class="col-sm-12  col-form-label">Tgl.Masuk</label>
                                                <div class="col-sm-12 mb-3">
                                                    <input type="date" id="appt" name="tgl_masuk">
                                                    <input type="text" hidden value="dana" name="kategori"
                                                        class="form-control">
                                                </div>
                                            </div>


                                            <div class="col-sm-6 ">
                                                <label class="col-sm-12  col-form-label">Jumlah Dana</label>
                                                <div class="col-sm-12 mb-3">
                                                    <input type="number" name="harga" class="form-control">
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

                    <!-- Edit Dana -->
                    <div class="modal fade" id="edit_dana" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Dana</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{url('admin/edit_preview_bantuan')}}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">

                                            <div class="col-sm-6">
                                                <label class="col-sm-12  col-form-label">Tgl.Masuk</label>
                                                <div class="col-sm-12 mb-3">
                                                    <input type="date" id="appt" name="tgl_masuks">
                                                    <input type="id" hidden id="appt" name="id">
                                                    <input type="text" hidden value="dana" name="kategori"
                                                        class="form-control">
                                                </div>
                                            </div>


                                            <div class="col-sm-6 ">
                                                <label class="col-sm-12  col-form-label">Jumlah Dana</label>
                                                <div class="col-sm-12 mb-3">
                                                    <input type="number" name="hargas" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-sm-6 ">
                                                <label class="col-sm-12  col-form-label">Pengantaran</label>
                                                <div class="col-sm-12 mb-3">
                                                    <select name="pengantarans" class="form-control">
                                                        <option value="Diantar ke Organisasi">Diantar ke tempat</option>
                                                        <option value="Transfer">Transfer</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 ">
                                                <label class="col-sm-12  col-form-label">Keterangan</label>
                                                <div class="col-sm-12 mb-3">
                                                    <Textarea type="text" name="keterangans"
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
                    <!-- End Edit Dana -->

                    <!-- Start Modal Hapus -->

                    <div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{url('admin/delete_preview_bantuan')}}" method="post"
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
                                        <h5>Table Preview Bantuan Masuk</h5>
                                    </div>

                                    <div class="card-header-right">

                                        <button data-toggle="modal" data-target="#tambah_makanan"
                                            class="btn btn-mat waves-effect waves-light btn-success ">Tambah
                                            Makanan</button>
                                        <button data-toggle="modal" data-target="#tambah_dana"
                                            class="btn btn-mat waves-effect waves-light btn-success ">Tambah
                                            Dana</button>


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
                                                    <th>Harga</th>
                                                    <th>Total</th>
                                                    <th>Pengiriman</th>
                                                    <th>Keterangan</th>
                                                    <th>Tgl.Masuk</th>
                                                    <th>Tgl.Exp</th>
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
                                                    <td>{{number_format($datas->qty)}}</td>

                                                    <td>{{$datas->satuan_barang}}</td>
                                                    <td>Rp.{{number_format($datas->harga)}}</td>
                                                    <td>Rp.{{number_format($datas->total)}}</td>
                                                    <td>{{$datas->pengiriman}}</td>
                                                    <td>{{$datas->keterangan}}</td>
                                                    <td>{{date('d-m-Y', strtotime($datas->tgl_masuk))}}</td>
                                                    <td>{{date('d-m-Y', strtotime($datas->exp_date))}}</td>
                                                    <td>
                                                        @if($datas->kategori == 'makanan')<button
                                                            onClick="edit_makanan('{{ $datas->id}}','{{ $datas->nama}}','{{ $datas->kategori}}','{{ $datas->qty}}','{{ $datas->satuan_barang}}','{{ $datas->harga}}','{{ $datas->total}}','{{ $datas->pengiriman}}','{{ $datas->keterangan}}','{{ $datas->tgl_masuk}}','{{ $datas->exp_date}}')"
                                                            class="btn  btn-success btn-sm"><i
                                                                class="ti-pencil fa-sm"></i></button>
                                                        @else
                                                        <button
                                                            onClick="edit_dana('{{ $datas->id}}','{{ $datas->qty}}','{{ $datas->pengiriman}}','{{ $datas->keterangan}}','{{ $datas->tgl_masuk}}')"
                                                            class="btn  btn-success btn-sm"><i
                                                                class="ti-pencil fa-sm"></i></button>
                                                        @endif
                                                        <button class="btn  btn-danger btn-sm"
                                                            onClick="hapus('{{ $datas->id}}')"><i
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
                        <!-- Hover table card end -->

                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <div class="col-lg-8">
                                        <h5>Input Data Donatur</h5>
                                    </div>
                                    <form action="{{url('admin/insert_stok_masuk')}}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row my-3">
                                            <div class="col-sm-12 ">
                                                <label class="col-sm-12  col-form-label">Nama Donatur</label>
                                                <div class="col-sm-12 mb-3">
                                                    <input type="text" name="nama" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-sm-12 ">
                                                <label class="col-sm-12  col-form-label">No.Telp Donatur</label>
                                                <div class="col-sm-12 mb-3">
                                                    <input type="text" name="no_telp" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-sm-12 ">
                                                <label class="col-sm-12  col-form-label">Foto Bukti Terima</label>
                                                <div class="col-sm-12 mb-3">
                                                    <input type="file" id="myfile" name="gambar">
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

function edit_makanan(id, nama, kategori, qty, satuan_barang, harga, total, pengiriman, keterangan, tgl_masuk,
    exp_date) {
    $('#edit_makanan').modal('show');
    $('input[name="id"]').val(id);
    $('input[name="nama_makanans"]').val(nama);
    $('input[name="qtys"]').val(qty);
    $('input[name="satuan_barangs"]').val(satuan_barang);
    $('input[name="hargas"]').val(harga);
    $('input[name="totals"]').val(total);
    $('input[name="pengirimans"]').val(pengiriman);
    $('input[name="keterangans"]').val(keterangan);
    $('input[name="tgl_masuks"]').val(tgl_masuk);
    $('input[name="exp_dates"]').val(exp_date);
}


function edit_dana(id, qty, pengiriman, keterangan, tgl_masuk,
    exp_date) {
    $('#edit_dana').modal('show');
    $('input[name="id"]').val(id);
    $('input[name="hargas"]').val(qty);
    $('input[name="pengirimans"]').val(pengiriman);
    $('input[name="keterangans"]').val(keterangan);
    $('input[name="tgl_masuks"]').val(tgl_masuk);
}
</script>
@endsection