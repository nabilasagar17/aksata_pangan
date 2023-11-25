@extends('template.index')
@section('content')
<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Laporan Bantuan Masuk</h5>

                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Laporan Bantuan</a>
                        </li>
                        @if(Request::segment(2) == 'laporan_bantuan_masuk')
                        <li class="breadcrumb-item"><a href="#!">Laporan Bantuan Masuk</a>
                        </li>
                        @elseif(Request::segment(2) == 'laporan_bantuan_makanan')
                        <li class="breadcrumb-item"><a href="#!">Laporan Makanan Masuk</a>
                        </li>
                        @else
                        <li class="breadcrumb-item"><a href="#!">Laporan Dana Masuk</a>
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
                                @if(Request::segment(2) == 'laporan_bantuan_dana')
                                <a type='button' href="{{url('admin/laporan_bantuan_dana_report')}}"
                                    class="btn btn-mat waves-effect waves-light btn-primary ">Print</a>
                                @else
                                <a type='button' href="{{url('admin/laporan_bantuan_makanan_report')}}"
                                    class="btn btn-mat waves-effect waves-light btn-primary ">Print</a>
                                @endif
                            </div>
                        </div>
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        @if(Request::segment(2) == 'laporan_bantuan_dana')
                                        <tr>
                                            <th>No</th>
                                            <th>Gambar</th>
                                            <th>Tanda Tangan</th>
                                            <th>Nama Pengirim</th>
                                            <th>Alamat Pengirim</th>

                                            <th>Jlh</th>


                                            <th>Pengiriman</th>

                                            <th>Tgl.Masuk</th>
                                            <!-- <th>Aksi</th> -->
                                        </tr>
                                        @else
                                        <tr>
                                            <th>No</th>
                                            <th>Gambar</th>
                                            <th>Tanda Tangan</th>
                                            <th>Nama Barang</th>
                                            <th>Nama Pengirim</th>
                                            <th>No.Telp Pengirim</th>
                                            <th>Kategori</th>
                                            <th>Qty</th>
                                            <th>Qty Masuk</th>
                                            <th>Sisa Disebar</th>

                                            <th>Satuan Barang</th>
                                            <th>Harga</th>
                                            <th>Pengiriman</th>

                                            <th>Tgl.Exp</th>
                                            <th>Tgl.Masuk</th>
                                            <!-- <th>Aksi</th> -->
                                        </tr>

                                        @endif
                                    </thead>
                                    <tbody>
                                        <?php  $no = 15 * ( (Request::input('page') != '' ? Request::input('page') : 1) - 1) + 1; ?>

                                        @foreach($data as $datas)
                                        @if(Request::segment(2) == 'laporan_bantuan_dana')
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
                                            <td>{{number_format($datas->qty)}}</td>

                                            <td>{{$datas->pengiriman}}</td>

                                            <td>{{date('d-m-Y', strtotime($datas->tgl_masuk))}}</td>
                                            <!-- <td><button class="btn  btn-success btn-sm"><i
                                                        class="ti-pencil fa-sm"></i></button>
                                                <button class="btn  btn-danger btn-sm"><i
                                                        class="ti-trash fa-sm"></i></button>
                                            </td> -->
                                        </tr>

                                        @else
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
                                            <td>{{$datas->nama}}</td>
                                            <td>{{$datas->nama_pemberi}}</td>
                                            <td>{{$datas->no_telp_pemberi}}</td>
                                            <td>{{$datas->kategori}}</td>
                                            <td>{{number_format($datas->qty)}}</td>
                                            <td>{{number_format($datas->qty_masuk)}}</td>
                                            <td>{{$datas->sisa_disebar}}</td>

                                            <td>{{$datas->satuan_barang}}</td>
                                            <td>{{$datas->harga}}</td>
                                            <td>{{$datas->pengiriman}}</td>
                                            <td>{{date('d-m-Y', strtotime($datas->exp_date))}}</td>
                                            <td>{{date('d-m-Y', strtotime($datas->tgl_masuk))}}</td>
                                            <!-- <td><button class="btn  btn-success btn-sm"><i
                                                        class="ti-pencil fa-sm"></i></button>
                                                <button class="btn  btn-danger btn-sm"><i
                                                        class="ti-trash fa-sm"></i></button>
                                            </td> -->
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