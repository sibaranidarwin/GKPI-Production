<?php
$navbars = StaticVariable::$navbartatausaha;
?>
@extends('layouts.home')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Data Ulang Tahun')
@section('page_name', 'Data Ulang Tahun')

@section('content')
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.css"/>

<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<script type="text/javascript">  
            $tanggal_lahir = date('Y-m-d', strtotime('{$jemaat['tanggal_lahir']}'));
$birthDate = new DateTime($tanggal_lahir);
$today = new DateTime("today");
if ($birthDate > $today) {
    exit("0 tahun 0 bulan 0 hari");
}
$y = $today->diff($birthDate)->y;
// dd($y);
$m = $today->diff($birthDate)->m;
$d = $today->diff($birthDate)->d;
return $y . " tahun " . $m . " bulan " . $d . " hari";
        </script>
<div class="col-12 mt-5 p-3">
    <div class="col-12">
        <div class="row">
            @foreach ($datajemaats as $datajemaat)
                <div class="col-12 col-md-4 d-flex mt-md-0 mb-4">
                    <div class="col-12 bg-white shadow-sm p-4 rounded">
                        <div class="col-12 d-flex">
                            <div class="col-7">
                                <span>{{ $datajemaat['name'] }}</span>
                            </div>
                            <div class="col-5 rounded  d-flex justify-content-end">
                                <div class="rounded-circle {{ $datajemaat['color'] }} d-flex align-items-center justify-content-center"
                                    style="width: 60px;height:60px;">
                                    <i class="fa fa-user text-white fs-3"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <span class="fs-3 fw-bold">{{ $datajemaat['jumlah'] }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="col-12 shadow-sm rounded mt-3 bg-white p-3">
        <div class="col-12 mt-3">
            <div class="table-responsive-sm">
                <table class="table table-bordered" id="list">
                <thead>
                    <th style="width: 130px;">Nomor Induk Kependudukan</th>
                    <th style="min-width: 140px;">Nama</th>
                    <th class="col-3">Tanggal Lahir</th>
                    <th class="col-3">Ultah Ke</th>
                    <th class="col-3">Sektor</th>
                    </thead>
                    <tbody>
                        @foreach ($jemaats as $jemaat)
                            <tr>
                                <td>
                                    {{$jemaat['nik']}}
                                </td>
                                <td>
                                    {{ $jemaat->name }}</a>
                                </td>
                                <td>
                                    {{ Carbon\Carbon::parse($jemaat->tanggal_lahir)->format('d F Y') }}
                                </td>
                                <td>
                                <?php 
                                $tanggal_lahir = $jemaat->tanggal_lahir;
                                $lahir    =new DateTime($tanggal_lahir);
                                $today        =new DateTime('today');
                                $usia = $today->diff($lahir);
                                echo $usia->y; echo " Tahun";
                                ?>
                                </td>
                                <td>
                                    {{$jemaat['sektor']->nama}}
                                </td>
                            </tr>
                        @endforeach
                        </td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
        $(document).ready(function() {
            $('#list').DataTable({
                "order": [
                    [1, "desc"]
                ],
                "language": {
                    "lengthMenu": "Tampilkan _MENU_ Data jemaat yang berulang tahun per minggu",
                    "zeroRecords": "Maaf, tidak dapat menemukan apapun",
                    "info": "Menampilkan halaman _PAGE_ dari _PAGES_ halaman",
                    "infoEmpty": "Tidak ada jemaat yang dapat ditampilkan",
                    "infoFiltered": "(dari _MAX_ total jemaat)",
                    "search": "Cari :",
                    "paginate": {
                        "first": "Pertama",
                        "last": "Terakhir",
                        "next": "",
                        "previous": ""
                    },
                }
            });
        });
    </script>
    @endsection
