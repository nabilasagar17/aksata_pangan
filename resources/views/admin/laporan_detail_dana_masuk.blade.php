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

                <H1 class="uppercase mr-5">Laporan Daftar Dana Masuk</h1>

            </div>
            <div class="" style="margin-top: 20px;">
                <table class="table" style="width: 100%!important;">
                    <thead>

                        <tr>
                            <th>No</th>

                            <th>Nama Pengirim</th>
                            <th>No.Telp Pengirim</th>

                            <th>Qty</th>


                            <th>Pengiriman</th>
                            <th>Tgl.Masuk</th>
                            <th>Aksi</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php  $no = 15 * ( (Request::input('page') != '' ? Request::input('page') : 1) - 1) + 1; ?>

                        @foreach($data as $datas)

                        <tr>
                            <td scope="row">{{$no++}}</td>

                            <td>{{$datas->nama_pemberi}}</td>
                            <td>{{$datas->no_telp_pemberi}}</td>
                            <td>Rp.{{number_format($datas->qty)}}</td>

                            <td>{{$datas->pengiriman}}</td>

                            <td>{{date('d-m-Y', strtotime($datas->tgl_masuk))}}</td>
                            <td>
                                <button class="btn  btn-danger btn-sm" onClick="hapus('{{ $datas->id}}')"><i
                                        class="ti-trash fa-sm"></i></button>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
                <p>&nbsp;</p>



            </div>
        </div>
    </div>
</body>

</html>