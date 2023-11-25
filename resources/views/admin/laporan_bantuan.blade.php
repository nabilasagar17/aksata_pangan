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
                        @if(Request::segment(2) == 'laporan_penyaluran_makanan')
                        <li class="breadcrumb-item"><a href="#!">Laporan Penyaluran Makanan</a>
                        </li>
                        @elseif(Request::segment(2) == 'laporan_penyaluran_dana' || Request::segment(2) ==
                        'detail_penyaluran_dana_widget')
                        <li class="breadcrumb-item"><a href="#!">Laporan Penyaluran Dana</a>
                        </li>
                        @else
                        <li class="breadcrumb-item"><a href="#!">Laporan Penyaluran Bantuan</a>
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
                                <form action="{{url('admin/delete_stok_keluar')}}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-12 my-2">
                                                <h6> Hapus data penyaluran ini?
                                                </h6>
                                                <input type="text" name="id" hidden>
                                                <input type="text" name="code" hidden>
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

                    <!-- Hover table card start -->
                    <div class="card">
                        <div class="card-header">
                            <h5>Laporan Bantuan</h5>
                            <form class="form-inline my-2">
                                <label class="  col-form-label mx-2">Tgl.Mulai</label>

                                <input type="date" required id="appt " name="start" value="{{Request::input('start')}}">



                                <label class="  col-form-label mx-2">Tgl.Akhir</label>

                                <input type="date" id="appt" name="end" value="{{Request::input('end')}}" required>

                                <button class="btn btn-outline-success my-sm-0" type="submit">Search</button>

                            </form>
                            <div class="card-header-right">
                                @if(Request::segment(2) == 'laporan_penyaluran_dana' || Request::segment(2) ==
                                'detail_penyaluran_dana_widget')
                                <a type='button' href="{{url('admin/laporan_penyaluran_dana_report')}}"
                                    class="btn btn-mat waves-effect waves-light btn-primary ">Print</a>
                                @else
                                <a type='button' href="{{url('admin/laporan_penyaluran_makanan_report')}}"
                                    class="btn btn-mat waves-effect waves-light btn-primary ">Print</a>
                                @endif



                            </div>
                        </div>
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        @if(Request::segment(2)== 'laporan_penyaluran_dana')
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Penangung Jawab</th>


                                            <th>Nama Bantuan</th>
                                            <th>Jumlah</th>
                                            <th>Keperluan</th>
                                            <th>Pengiriman</th>
                                            <th>Keterangan</th>

                                            <th>Tgl.Dibuat</th>
                                            <th>Aksi</th>
                                        </tr>
                                        @else
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Penerima</th>

                                            <th>Alamat Penerima</th>
                                            <th>Nama Bantuan</th>
                                            <th>Jumlah</th>
                                            <th>Keperluan</th>
                                            <th>Pengiriman</th>
                                            <th>Keterangan</th>

                                            <th>Gambar</th>
                                            <th>Tanda Tangan</th>
                                            <th>Tgl.Dibuat</th>
                                            <th>Aksi</th>
                                        </tr>
                                        @endif

                                    </thead>
                                    <tbody>
                                        <?php  $no = 15 * ( (Request::input('page') != '' ? Request::input('page') : 1) - 1) + 1; ?>

                                        @foreach($data as $datas)
                                        @if(Request::segment(2)== 'laporan_penyaluran_dana')
                                        <tr>
                                            <th scope="row">{{$no++}}</th>
                                            <td>{{$datas->nama_penerima}}</td>

                                            <td>{{$datas->nama}}</td>
                                            <td>Rp.{{number_format($datas->qty)}}</td>
                                            <td>{{$datas->keperluan}}</td>
                                            <td>{{$datas->pengiriman}}</td>
                                            <td>{{$datas->keterangan}}</td>


                                            <td>{{date('d-m-Y', strtotime($datas->created_at))}}</td>
                                            <td> <button onClick="hapus('{{ $datas->id}}')"
                                                    class="btn  btn-danger btn-sm"><i
                                                        class="ti-trash fa-sm"></i></button></td>
                                        </tr>
                                        @else
                                        <tr>
                                            <th scope="row">{{$no++}}</th>
                                            <td>{{$datas->nama_penerima}}</td>
                                            <td>{{$datas->alamat_penerima}}</td>
                                            <td>{{$datas->nama}}</td>
                                            <td>{{$datas->qty}}</td>
                                            <td>{{$datas->keperluan}}</td>
                                            <td>{{$datas->pengiriman}}</td>
                                            <td>{{$datas->keterangan}}</td>
                                            @if($datas->path_gambar != "")
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img width="150" height="100"
                                                        src="{{asset('img/bukti_keluar/'. $datas->path_gambar)}}"
                                                        alt="" />
                                                </div>


                                            </td>@else <td> </td> @endif
                                            @if($datas->path_ttd == "")
                                            <td> </td>
                                            @else
                                            <td>
                                                <div class="d-flex align-items-center">

                                                    <img width="150" height="100"
                                                        src="{{asset('file_ttd_keluar/'. $datas->path_ttd)}}" alt="" />
                                                </div>
                                            </td>@endif
                                            <td>{{date('d-m-Y', strtotime($datas->created_at))}}

                                            </td>

                                            <td>
                                                <!-- <button class="btn  btn-success btn-sm"><i
                                                        class="ti-pencil fa-sm"></i></button> -->
                                                <button onClick="hapus('{{ $datas->id}}')"
                                                    class="btn  btn-danger btn-sm"><i
                                                        class="ti-trash fa-sm"></i></button>
                                            </td>

                                        </tr>
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
@endsection

<script type="text/javascript">
//Date picker


function hapus(id) {
    $('#hapus').modal('show');
    $('input[name="id"]').val(id);

}
</script>