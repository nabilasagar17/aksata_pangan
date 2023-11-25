@extends('template.index')
@section('content')
<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Laporan Penyaluran Bantuan</h5>

                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Laporan Bantuan</a>
                        </li>

                        <li class="breadcrumb-item"><a href="#!">Laporan List Bantuan</a>
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

                    @if(Request::segment(3) == '')
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Laporan Bantuan</h5>
                                    <form class="form-inline my-2">
                                        <label class="  col-form-label mx-2">Tgl.Mulai</label>

                                        <input type="date" id="appt " required name="start"
                                            value="{{Request::input('start')}}">



                                        <label class="  col-form-label mx-2">Tgl.Akhir</label>

                                        <input type="date" id="appt" name="end" required
                                            value="{{Request::input('end')}}">

                                        <button class="btn btn-outline-success my-sm-0" type="submit">Search</button>

                                    </form>
                                    <div class="card-header-right">

                                        <a type='button'
                                            href="{{url('admin/list_bantuan_report').'?'.(Request::input('start')).'&'.(Request::input('end'))}}"
                                            class="btn btn-mat waves-effect waves-light btn-primary ">Print</a>


                                    </div>
                                </div>
                                <div class="card-block table-border-style">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>

                                                    <th>Nama Penerima</th>
                                                    <th>Alamat</th>
                                                    <th>Keperluan</th>
                                                    <th>Proses</th>
                                                    <th>Tgl.Dibuat</th>
                                                    <th>Tgl.Dibagikan</th>
                                                    <th>Dibagikan Oleh</th>
                                                    <th>Gambar</th>
                                                    <th>TTD</th>
                                                    <th>Aksi</th>
                                                </tr>

                                            </thead>
                                            <tbody>
                                                <?php  $no = 15 * ( (Request::input('page') != '' ? Request::input('page') : 1) - 1) + 1; ?>

                                                @foreach($data as $datas)
                                                <tr>
                                                    <th scope="row">{{$no++}}</th>

                                                    <td>{{$datas->nama_penerima}}</td>
                                                    <td>{{$datas->alamat_penerima}}</td>
                                                    <td>{{$datas->keperluan}}</td>
                                                    <td>@if($datas->selesai == '1')
                                                        <span class="badge bg-success">Dibagikan</span>
                                                        @else
                                                        <span class="badge bg-warning">Belum Dibagikan</span>
                                                        @endif
                                                    </td>

                                                    <td>{{$datas->created_at}}</td>
                                                    <td>{{$datas->updated_at}}</td>
                                                    <td>{{$datas->nama_volunteer}}</td>
                                                    <td>@if($datas->path_gambar != "")
                                                        <div class="d-flex align-items-center">

                                                            <img width="150" height="100"
                                                                src="{{asset('img/bukti_keluar/'. $datas->path_gambar)}}"
                                                                alt="" />


                                                        </div>

                                                        @endif
                                                    </td>
                                                    @if($datas->path_ttd == "")
                                                    <td>


                                                    </td>
                                                    @else
                                                    <td>
                                                        <div class="d-flex align-items-center">

                                                            <img width="150" height="100"
                                                                src="{{asset('file_ttd_keluar/'. $datas->path_ttd)}}"
                                                                alt="" />


                                                        </div>
                                                    </td>
                                                    @endif
                                                    <td><a href="{{url('admin/list_bantuan/detail_list_bantuan').'/'. ($datas->code_history)}}"
                                                            class="btn  btn-primary btn-sm"><i
                                                                class="ti-eye fa-sm"></i></a>
                                                        @if(Auth::user()->role_user == 'volunteer')
                                                        <a href="{{url('admin/list_bantuan').'/'. ($datas->code_history)}}"
                                                            class="btn  btn-success btn-sm"><i
                                                                class="ti-pencil fa-sm"></i></a>
                                                        @endif
                                                        <!-- <button class="btn  btn-danger btn-sm"><i
                                                        class="ti-trash fa-sm"></i></button> -->
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
                        </div>
                        <!-- Hover table card end -->


                    </div>
                    @else

                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Laporan Bantuan</h5>
                                    <form class="form-inline my-2">
                                        <label class="  col-form-label mx-2">Tgl.Mulai</label>

                                        <input type="date" id="appt " name="start" required
                                            value="{{Request::input('start')}}">



                                        <label class="  col-form-label mx-2">Tgl.Akhir</label>

                                        <input type="date" id="appt" name="end" required
                                            value="{{Request::input('end')}}">

                                        <button class="btn btn-outline-success my-sm-0" type="submit">Search</button>

                                    </form>
                                    <div class="card-header-right">

                                        <a type='button'
                                            href="{{url('admin/print_laporan_keluar').'?'.(Request::input('start')).'&'.(Request::input('end'))}}"
                                            class="btn btn-mat waves-effect waves-light btn-primary ">Print</a>


                                    </div>
                                </div>
                                <div class="card-block table-border-style">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Penerima</th>
                                                    <th>Alamat</th>
                                                    <th>Keperluan</th>
                                                    <th>Proses</th>
                                                    <th>Tgl.Dibuat</th>
                                                    <th>Aksi</th>
                                                </tr>

                                            </thead>
                                            <tbody>
                                                <?php  $no = 15 * ( (Request::input('page') != '' ? Request::input('page') : 1) - 1) + 1; ?>

                                                @foreach($data as $datas)
                                                <tr>
                                                    <th scope="row">{{$no++}}</th>
                                                    <td>{{$datas->nama_penerima}}</td>
                                                    <td>{{$datas->alamat_penerima}}</td>
                                                    <td>{{$datas->keperluan}}</td>
                                                    <td>@if($datas->selesai == '1')
                                                        <span class="badge bg-success">Dibagikan</span>
                                                        @else
                                                        <span class="badge bg-warning">Belum Dibagikan</span>
                                                        @endif
                                                    </td>

                                                    <td>{{date('d-m-Y', strtotime($datas->created_at))}}</td>
                                                    <td><a href="{{url('admin/list_bantuan/detail_list_bantuan').'/'. ($datas->code_history)}}"
                                                            class="btn  btn-primary btn-sm"><i
                                                                class="ti-eye fa-sm"></i></a>
                                                        <a href="{{url('admin/list_bantuan').'/'. ($datas->code_history)}}"
                                                            class="btn  btn-success btn-sm"><i
                                                                class="ti-pencil fa-sm"></i></a>
                                                        <!-- <button class="btn  btn-danger btn-sm"><i
                                                        class="ti-trash fa-sm"></i></button> -->
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
                        </div>
                        <!-- Hover table card end -->

                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <div class="col-lg-8">
                                        <h5>Input Bukti Terima</h5>
                                    </div>
                                    <form action="{{url('admin/update_list_bantuan')}}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row my-3">


                                            <div class="col-sm-12 ">
                                                <label class="col-sm-12  col-form-label">Foto Bukti Terima</label>
                                                <div class="col-sm-12 mb-3">
                                                    <input type="file" id="myfile" name="gambar">
                                                    <input type="text" hidden value="{{Request::segment(3)}}"
                                                        name="history">
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
                    @endif
                </div>
                <!-- Page-body end -->
            </div>
        </div>
        <!-- Main-body end -->


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