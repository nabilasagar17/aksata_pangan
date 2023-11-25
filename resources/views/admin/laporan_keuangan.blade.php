@extends('template.index')
@section('content')
<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Laporan Keuangan</h5>

                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Laporan Keuangan</a>
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
                    <div class="card">
                        <div class="card-header">
                            <h5>Laporan Bantuan</h5>

                            <div class="card-header-right">

                                <a type='button' href="{{url('admin/laporan_dana_report')}}"
                                    class="btn btn-mat waves-effect waves-light btn-primary ">Print</a>

                            </div>
                        </div>
                        <div class="card-block ">
                            <div class="table-responsive">
                                <table class="table" ">
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
                            </div>
                        </div>
                    </div>
                    <!-- Hover table card end -->

                </div>
                <!-- Page-body end -->
            </div>
        </div>
        <!-- Main-body end -->

        <div id=" styleSelector">

                            </div>
                        </div>
                    </div>
                    @endsection