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
                <H4 class="uppercase ">Aktivitas Operasional</h4>
                <H4 class="uppercase ">Bantuan Umum</h4>
            </div>

            <div class="" style="margin-top: 20px;">
                <table class="table" style="width: 100%!important;">
                    <thead>

                        <tr>
                            <th>Bantuan Umum</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>

                            <th>Bantuan Masuk Individual</th>
                            <th>Rp</th>

                            <th>Rp.{{number_format($bantuan_individual)}}</th>
                        </tr>
                        <tr>

                            <th>Bantuan Perusahaan</th>
                            <th>Rp</th>

                            <th>Rp.{{number_format($bantuan_perusahaan)}}</th>
                        </tr>
                        <tr>
                            <th>Total Bantuan Masuk</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>

                            <th>Individu dan Perusahaan</th>
                            <th>Rp</th>

                            <th>Rp.{{number_format($total_bantuan_masuk)}}</th>
                        </tr>
                        <tr>

                            <th>Donasi Yang Terdistribusi</th>
                            <th></th>

                            <th></th>
                        </tr>
                        <tr>

                            <th>(Bantuan Keluar)</th>
                            <th>Rp</th>

                            <th>Rp.{{number_format($bantuan_keluar)}}</th>
                        </tr>
                        <tr>

                            <th>Pengeluaran</th>
                            <th></th>

                            <th></th>
                        </tr>
                        <tr>

                            <th>Keperluan Operasional</th>
                            <th>Rp</th>

                            <th>Rp.{{number_format($operasional)}}</th>
                        </tr>
                        <tr>

                            <th>Pelaksanaan Program</th>
                            <th>Rp</th>

                            <th>Rp.{{number_format($program)}}</th>
                        </tr>
                        <tr>

                            <th>Total Pengeluaran</th>
                            <th>Rp</th>

                            <th>Rp.{{number_format($total_pengeluaran)}}</th>
                        </tr>
                        <tr>

                            <th>Nett Loss For The Year</th>
                            <th>Rp</th>

                            <th>Rp.{{number_format($nett_loss)}}</th>
                        </tr>
                    </thead>
                    <tbody>


                    </tbody>
                </table>
                <p>&nbsp;</p>



            </div>
        </div>
    </div>
</body>

</html>