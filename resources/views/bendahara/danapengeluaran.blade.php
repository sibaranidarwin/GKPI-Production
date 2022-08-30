<?php
$navbars = StaticVariable::$navbarBendahara;
?>
@extends('layouts.home2')
@section('style', asset('css/style/pendeta.css'))
@section('title', 'Dana Pengeluaran')
@section('page_name', 'Dana Pengeluaran')
@section('navbar_content')
@section('content')
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.css"/>

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

        <div class="col-12 mt-1">
        <div class="table-responsive-sm table-wrapper-scroll-y my-custom-scrollbar">
        <table class="table table-bordered mb-0" id="list">
                    <thead>
                        <tr>
                            <!-- <th scope="col">Pilihan</th> -->
                            <th scope="col">No</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col" style="text-align:right">Nominal</th>
                            <!-- <th scope="col">Lampiran</th> -->
                        </tr>
                    </thead>
                    <tbody>
                    @php
                        $no = 1;
                    @endphp
                        @foreach ($danapengeluaran as $keuangan)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $keuangan -> kategori}}</td>
                                <td>{{ $keuangan -> keterangan}}</td>
                                <td><?php
                                $tanggal =$keuangan-> tanggal; 
                                $date = DateTime::createFromFormat('Y-m-d', $tanggal);
                                $format = $date->format('d-m-Y');
                                echo $format;?></td>
                                <td style="text-align:right"><?php 
                                    $angka =$keuangan -> nominal;
                                    echo number_format( $angka , 0, ",", ".");?> </td>
                                <!-- <td>{{ $keuangan -> lampiran}}</td> -->
                            </tr>
                        @endforeach
                    </tbody>
                    <thead>
                        <td></td>
                        <td></td>
                        <td></td>
                        <th scope="col">Total Pengeluaran</th>
                        <th style="text-align:right">
                            @foreach($totalpengeluaran as $keluar)
                            <?php 
                                    $angka =$keluar -> total;
                                    echo number_format( $angka , 0, ",", ".");?>
                            @endforeach
                        </th>
                    </thead>
 
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
                    "lengthMenu": "Tampilkan _MENU_ Data Keuangan per halaman",
                    "zeroRecords": "Maaf, tidak dapat menemukan apapun",
                    "info": "Menampilkan halaman _PAGE_ dari _PAGES_ halaman",
                    "infoEmpty": "Tidak ada keuangan yang dapat ditampilkan",
                    "infoFiltered": "(dari _MAX_ total Keuangan)",
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