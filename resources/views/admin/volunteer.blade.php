@extends('template.index')
@section('content')
<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Daftar Volunteer</h5>

                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Daftar Volunteer</a>
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


                    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Volunteer</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{url('admin/insert_volunteer')}}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-12 ">
                                                <label class="col-sm-12  col-form-label">Nama Lengkap</label>
                                                <div class="col-sm-12 mb-3">
                                                    <input type="text" name="nama" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 ">
                                                <label class="col-sm-12  col-form-label">Alamat </label>
                                                <div class="col-sm-12 mb-3">
                                                    <Textarea type="text" name="alamat" class="form-control"></Textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 ">
                                                <label class="col-sm-12  col-form-label">Email </label>
                                                <div class="col-sm-12 mb-3">
                                                    <input type="email" name="email" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 ">
                                                <label class="col-sm-12  col-form-label">No.Telp </label>
                                                <div class="col-sm-12 mb-3">
                                                    <input type="text" name="no_telp" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 ">
                                                <label class="col-sm-12  col-form-label">Batch </label>
                                                <div class="col-sm-12 mb-3">
                                                    <select name="batch" class="form-control">
                                                        <option value="">Pilih Batch</option>
                                                        <option value="1">I</option>
                                                        <option value="2">II</option>
                                                        <option value="3">III</option>
                                                        <option value="4">IV</option>

                                                    </select>
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

                    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Volunteer</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{url('admin/edit_volunteer')}}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-12 ">
                                                <label class="col-sm-12  col-form-label">Nama Lengkap</label>
                                                <div class="col-sm-12 mb-3">
                                                    <input type="text" name="id" hidden class="form-control">
                                                    <input type="text" name="namas" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 ">
                                                <label class="col-sm-12  col-form-label">Alamat </label>
                                                <div class="col-sm-12 mb-3">
                                                    <Input type="text" name="alamats" class="form-control"></Input>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 ">
                                                <label class="col-sm-12  col-form-label">No.Telp </label>
                                                <div class="col-sm-12 mb-3">
                                                    <input type="text" name="no_telps" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 ">
                                                <label class="col-sm-12  col-form-label">Batch </label>
                                                <div class="col-sm-12 mb-3">
                                                    <select name="batchs" class="form-control">
                                                        <option value="">Pilih Batch</option>
                                                        <option value="1">I</option>
                                                        <option value="2">II</option>
                                                        <option value="3">III</option>
                                                        <option value="4">IV</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 ">
                                                <label class="col-sm-12  col-form-label">Status</label>
                                                <div class="col-sm-12 mb-3">
                                                    <select name="is_actives" class="form-control">

                                                        <option value="1">Aktif</option>
                                                        <option value="0">Tidak Aktif</option>

                                                    </select>
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


                    <!-- Start Modal Hapus -->

                    <div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Volunteer</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{url('admin/delete_volunteer')}}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-12 my-2">
                                                <h6> Hapus data volunteer ini?
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
                                <h5>Table Volunteer</h5>
                            </div>

                            <div class="card-header-right">

                                <button data-toggle="modal" data-target="#tambah"
                                    class="btn btn-mat waves-effect waves-light btn-success ">Tambah</button>

                                <a type="button" href="{{url('admin/laporan_volunteer')}}"
                                    class="btn btn-mat waves-effect waves-light btn-primary">Print</a>

                            </div>
                        </div>
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Alamat</th>
                                            <th>No.Telp</th>
                                            <th>Batch</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  $no = 15 * ( (Request::input('page') != '' ? Request::input('page') : 1) - 1) + 1; ?>

                                        @foreach($data as $datas)
                                        <tr>
                                            <td scope="row">{{$no++}}</td>
                                            <td>{{$datas->nama}}</td>
                                            <td>{{$datas->email}}</td>
                                            <td>{{$datas->alamat}}</td>
                                            <td>{{$datas->no_telp}}</td>
                                            <td>{{$datas->batch}}</td>
                                            <td>@if($datas->is_active == '1')
                                                <span class="badge bg-success">Aktif</span>
                                                @else
                                                <span class="badge bg-danger">Non Aktif</span>
                                                @endif
                                            </td>
                                            <td><button
                                                    onClick="edit('{{ $datas->id}}','{{ $datas->nama}}','{{ $datas->alamat}}','{{ $datas->no_telp}}','{{ $datas->batch}}','{{ $datas->is_active}}')"
                                                    class="btn  btn-success btn-sm"><i
                                                        class="ti-pencil fa-sm"></i></button>
                                                <button class="btn  btn-danger btn-sm"
                                                    onClick="hapus('{{ $datas->id}}')"><i
                                                        class="ti-trash fa-sm"></i></button>
                                            </td>
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
@endsection

<script type="text/javascript">
//Date picker


function hapus(id) {
    $('#hapus').modal('show');
    $('input[name="id"]').val(id);

}

function edit(id, nama, alamat, no_telp, batch, is_active) {
    $('#edit').modal('show');
    $('input[name="id"]').val(id);
    $('input[name="namas"]').val(nama);

    $('input[name="no_telps"]').val(no_telp);
    $('input[name="alamats"]').val(alamat);
    $('input[name="batchs"]').val(batch);
    $('input[name="is_actives"]').val(is_active);
}
</script>