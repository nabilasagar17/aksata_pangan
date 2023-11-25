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
                @if(Request::segment(2)== 'laporan_penyaluran_dana_report')
                <H1 class="uppercase mr-5">Laporan Penyaluran Dana </h1>
                @elseif(Request::segment(2)== 'laporan_penyaluran_makanan_report')
                <H1 class="uppercase mr-5">Laporan Penyaluran Bantuan Makanan </h1>
                @else
                <H1 class="uppercase mr-5">Laporan Bantuan Masuk</h1>
                @endif
            </div>
            <div class="" style="margin-top: 20px;">
                <table class="table" style="width: 100%!important;">

                    <thead>
                        @if(Request::segment(2)== 'laporan_penyaluran_dana_report')
                        <tr>
                            <th>No</th>
                            <th>Nama Penangung Jawab</th>


                            <th>Nama Bantuan</th>
                            <th>Jumlah</th>
                            <th>Keperluan</th>
                            <th>Pengiriman</th>
                            <th>Keterangan</th>

                            <th>Tgl.Dibuat</th>

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

                        </tr>
                        @endif
                    </thead>
                    <tbody>
                        <?php  $no = 15 * ( (Request::input('page') != '' ? Request::input('page') : 1) - 1) + 1; ?>

                        @foreach($data as $datas)
                        @if(Request::segment(2)== 'laporan_penyaluran_dana_report')
                        <tr>
                            <th scope="row">{{$no++}}</th>
                            <td>{{$datas->nama_penerima}}</td>

                            <td>{{$datas->nama}}</td>
                            <td>{{$datas->qty}}</td>
                            <td>{{$datas->keperluan}}</td>
                            <td>{{$datas->pengiriman}}</td>
                            <td>{{$datas->keterangan}}</td>


                            <td>{{date('d-m-Y', strtotime($datas->created_at))}}</td>

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

                            <td>@if($datas->path_gambar != "")
                                <div class="d-flex align-items-center">
                                    <img width="150" height="100"
                                        src="{{asset('img/bukti_keluar/'. $datas->path_gambar)}}" alt="" />
                                </div>

                                @endif
                            </td>
                            @if($datas->path_ttd == "")
                            <td>
                            </td>
                            @else
                            <td>
                                <div class="d-flex align-items-center">

                                    <img width="150" height="100" src="{{asset('file_ttd_keluar/'. $datas->path_ttd)}}"
                                        alt="" />
                                </div>
                            </td>
                            @endif
                            <td>{{date('d-m-Y', strtotime($datas->created_at))}}</td>

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