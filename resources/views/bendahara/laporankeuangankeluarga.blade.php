<?php
$navbars = StaticVariable::$navbarBendahara;
?>

<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.css"/>


@extends('layouts.home2')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Laporan keuangan Keluarga')
@section('page_name', 'Laporan Keuangan Keluarga')
@section('navbar_content')

@endsection
@section('content')
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />

<style type="text/css">
    .my-custom-scrollbar {
position: relative;
height: 500px;
overflow: auto;
}
.table-wrapper-scroll-y {
display: block;
}
</style>  
    <div class="col-12 shadow-sm rounded mt-3 bg-white p-3">
        <div class="col-12 shadow-sm rounded mt-3 bg-white p-3">
        <h3>Laporan Keuangan Bakti Bulanan</h3>
    <div class="col-2 flex">
        </div>
        <div class="col-12 mt-3">
            <div class="table-responsive">
                <table class="table table-bordered" id="list">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                            <th scope="col">No Kartu Keluarga</th>
                            <th scope="col">Nama Keluarga</th>
                            <th scope="col">Jenis Keuangan</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Nominal(Rp)</th>
                            <th scope="col">Bulan</th>
                            <th scope="col">Tahun</th>
                            <th scope="col">Pilihan</th>
                        </tr>
                    </thead>
                    <tbody name="data" id="data">
                    @php
                        $no = 1;
                    @endphp
                        @foreach ($keuangankeluarga1 as $keuangan)
                        <form action=""></form>
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $keuangan -> no_kk}}</td>
                                <td>{{ $keuangan -> nama_keluarga}}</td>
                                <td>{{ $keuangan -> jenis_keuangan}}</td>
                                <td>{{ $keuangan -> tanggal}}</td>
                                <td>{{ $keuangan -> nominal}}</td>  
                                <td>{{$keuangan['bulan']->nama}}</td> 
                                <td>{{ $keuangan -> tahun}}</td> 
                                <td style="">
                                    <div class="d-flex gap-3 flex-column flex-md-row">
                                        <a data-toggle="tooltip" data-placement="bottom" title="Edit Keuangan" href="/bendahara/editkeuangankeluarga/edit/{{ $keuangan->no_kk }}"
                                            class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                    </div>
                                </td>                 
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-12 shadow-sm rounded mt-3 bg-white p-3">
    <h3>Laporan Keuangan Bakti Pembangunan</h3>
    <div class="col-2 flex">
        </div>
        <div class="col-12 mt-3">
            <div class="table-responsive">
            <table class="table table-bordered" id="list">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                            <th scope="col">No Kartu Keluarga</th>
                            <th scope="col">Nama Keluarga</th>
                            <th scope="col">Jenis Keuangan</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Nominal(Rp)</th>
                            <th scope="col">Bulan</th>
                            <th scope="col">Tahun</th>
                            <th scope="col">Pilihan</th>
                        </tr>
                    </thead>
                    <tbody name="data" id="data">
                    @php
                        $no = 1;
                    @endphp
                        @foreach ($keuangankeluarga2 as $keuangan)
                        <form action=""></form>
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $keuangan -> no_kk}}</td>
                                <td>{{ $keuangan -> nama_keluarga}}</td>
                                <td>{{ $keuangan -> jenis_keuangan}}</td>
                                <td>{{ $keuangan -> tanggal}}</td>
                                <td>{{ $keuangan -> nominal}}</td>  
                                <td>{{$keuangan['bulan']->nama}}</td> 
                                <td>{{ $keuangan -> tahun}}</td> 
                                <td style="">
                                    <div class="d-flex gap-3 flex-column flex-md-row">
                                        <a data-toggle="tooltip" data-placement="bottom" title="Edit Keuangan" href="/bendahara/editkeuangankeluarga/edit/{{ $keuangan->no_kk }}"
                                            class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                    </div>
                                </td>                 
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-12 shadow-sm rounded mt-3 bg-white p-3">
    <h3>Laporan Keuangan Ucapan Syukur</h3>
    <div class="col-2 flex">
        </div>
        <div class="col-12 mt-3">
            <div class="table-responsive">
            <table class="table table-bordered" id="list">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                            <th scope="col">No Kartu Keluarga</th>
                            <th scope="col">Nama Keluarga</th>
                            <th scope="col">Jenis Keuangan</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Nominal(Rp)</th>
                            <th scope="col">Pilihan</th>
                        </tr>
                    </thead>
                    <tbody name="data" id="data">
                    @php
                        $no = 1;
                    @endphp
                        @foreach ($keuangankeluarga3 as $keuangan)
                        <form action=""></form>
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $keuangan -> no_kk}}</td>
                                <td>{{ $keuangan -> nama_keluarga}}</td>
                                <td>{{ $keuangan -> jenis_keuangan}}</td>
                                <td>{{ $keuangan -> tanggal}}</td>
                                <td>{{ $keuangan -> nominal}}</td>  
                                <td style="">
                                    <div class="d-flex gap-3 flex-column flex-md-row">
                                        <a data-toggle="tooltip" data-placement="bottom" title="Edit Keuangan" href="/bendahara/editkeuangankeluarga/edit/{{ $keuangan->no_kk }}"
                                            class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                    </div>
                                </td>                 
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')
<script>
        $(document).ready(function() {
            $('#list').DataTable({
                "order": [
                    [1, "desc"]
                ],
                "language": {
                    "lengthMenu": "Tampilkan _MENU_ Data Keluarga per halaman",
                    "zeroRecords": "Maaf, tidak dapat menemukan apapun",
                    "info": "Menampilkan halaman _PAGE_ dari _PAGES_ halaman",
                    "infoEmpty": "Tidak ada Keluarga yang dapat ditampilkan",
                    "infoFiltered": "(dari _MAX_ total keluarga)",
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