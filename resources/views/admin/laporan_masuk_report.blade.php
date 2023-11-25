<?php 
use Illuminate\Support\Carbon;
?>
<!DOCTYPE html>
</title>
<style>
.text-center {
    text-align: center;
}

.table {
    margin-left: -15px;
}

.table,
.table th,
.table td {
    border: 1px solid #333;
    border-collapse: collapse;
    padding-left: 5px;
    font-size: 13px;
}
</style>
</head>

<body>
    <div class="">
        <div id="element-to-print" style="font-family: arial;">
            <table width="100%" style="border-bottom: 1px solid #333;">
                <tr>
                    <td width="15%">
                        <div>
                            <img src="{{ asset('img/logo.png') }}" height="80">
                        </div>
                    </td>
                    <td width="100%" valign="middle">
                        <div class="text-center" style="line-height: 25px; margin-left: -150px;">
                            <div style="font-size: 16pt;"><b>AKSATA PANGAN</b></div>

                        </div>
                    </td>
                </tr>
            </table>

            <div class="text-center" style="margin-top: 20px;">
                @if(Request::segment(2)== 'laporan_bantuan_dana_report')
                <H1 class="uppercase mr-5">Laporan Dana Masuk</h1>
                @elseif(Request::segment(2)== 'laporan_bantuan_makanan_report')
                <H1 class="uppercase mr-5">Laporan Bantuan Makanan Masuk</h1>
                @else
                <H1 class="uppercase mr-5">Laporan Bantuan Masuk</h1>
                @endif
            </div>
            <div class="" style="margin-top: 20px;">
                <table class="table" style="width: 100%!important;">

                    <thead>
                        @if(Request::segment(2) == 'laporan_bantuan_dana_report')
                        <tr>
                            <th>No</th>

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
                            <th>TTD</th>
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
                        @if(Request::segment(2) == 'laporan_bantuan_dana_report')
                        <tr>
                            <td scope="row">{{$no++}}</td>
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
                                    <img width="150" height="100" src="{{asset('img/bukti_masuk/'. $datas->file_path)}}"
                                        alt="" />
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
                                        src="{{asset('file_ttd_masuk/'. $datas->path_ttd_pemberi)}}" alt="" />
                                </div>
                            </td>
                            @endif
                            <td>{{$datas->nama_pemberi}}</td>
                            <td>{{$datas->nama}}</td>

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

                        </tr>
                        @endif
                        @endforeach

                    </tbody>

                </table>
                <p>&nbsp;</p>



            </div>
        </div>
    </div>
</body>

</html>