@extends('template.index')
@section('content')
<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Penyaluran Bantuan</h5>

                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Penyaluran Bantuan</a>
                        </li>
                        @if(Request::segment(2) == 'penyaluran_makanan')
                        <li class="breadcrumb-item"><a href="#!">Penyaluran Makanan</a>
                        </li>
                        @elseif(Request::segment(2) == 'penyaluran_dana')
                        <li class="breadcrumb-item"><a href="#!">Penyaluran Dana</a>
                        </li>
                        @else
                        <li class="breadcrumb-item"><a href="#!">Penyaluran Keseluruhan</a>
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
                                <form action="{{url('admin/delete_penyaluran_bantuan')}}" method="post"
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
                            <div class="row">
                                <div class="col-lg-10">
                                    <h5>Table Penyaluran Bantuan</h5>
                                </div>



                                <div class="col-lg-2 ">

                                    <button type='submit' class="btn btn-block  btn-primary">Print</button>

                                </div>
                            </div>

                        </div>
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Bantuan</th>
                                            <th>Jumlah</th>
                                            <th>Keperluan</th>
                                            <th>Pengiriman</th>
                                            <th>Keterangan</th>
                                            <th>Nama Penerima</th>
                                            <th>Alamat Penerima</th>
                                            <th>Tgl.Dibuat</th>
                                            <th>Aksi</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <?php  $no = 15 * ( (Request::input('page') != '' ? Request::input('page') : 1) - 1) + 1; ?>

                                        @foreach($data as $datas)
                                        <tr>
                                            <th scope="row">{{$no++}}</th>
                                            <td>{{$datas->nama}}</td>
                                            <td>{{$datas->qty}}</td>
                                            <td>{{$datas->keperluan}}</td>
                                            <td>{{$datas->pengiriman}}</td>
                                            <td>{{$datas->keterangan}}</td>
                                            <td>{{$datas->nama_penerima}}</td>
                                            <td>{{$datas->alamat_penerima}}</td>
                                            <td>{{date('d-m-Y', strtotime($datas->created_at))}}</td>
                                            <td>
                                                <!-- <button class="btn  btn-success btn-sm"><i
                                                        class="ti-pencil fa-sm"></i></button> -->
                                                <button onClick="hapus('{{ $datas->id}}')"
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
function hapus(id) {
    $('#hapus').modal('show');
    $('input[name="id"]').val(id);

}
</script>