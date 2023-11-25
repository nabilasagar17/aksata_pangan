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
                @if(Request::segment(2)== 'laporan_user')
                <H1 class="uppercase mr-5">Laporan Daftar User</h1>
                @else
                <H1 class="uppercase mr-5">Laporan Daftar Volunteer</h1>
                @endif
            </div>
            <div class="" style="margin-top: 20px;">
                <table class="table" style="width: 100%!important;">
                    @if(Request::segment(2)== 'laporan_user')
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>No.Telp</th>
                            <th>Role User</th>
                            <th>Status</th>

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
                            <td>{{$datas->telp}}</td>
                            <td>{{$datas->role_user}}</td>
                            <td>@if($datas->is_active == '1')
                                <span class="badge bg-success">Aktif</span>
                                @else
                                <span class="badge bg-warning">Non Aktif</span>
                                @endif
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                    @else
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>No.Telp</th>
                            <th>Batch</th>

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

                        </tr>
                        @endforeach
                    </tbody>
                    @endif
                </table>
                <p>&nbsp;</p>



            </div>
        </div>
    </div>
</body>

</html>