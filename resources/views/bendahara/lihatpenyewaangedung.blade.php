<?php
$navbars = StaticVariable::$navbarBendahara;
?>
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.css"/>

@extends('layouts.home2')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Lihat Sewa Gedung')
@section('page_name', 'Lihat Sewa Gedung')
@section('navbar_content')
    <div class="col-4 ms-auto">
        <input type="text" class="form-control" name="" id="">
    </div>
@endsection
@section('content')
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<div class="col-12 mt-5 p-3">
    <div class="col-12 shadow-sm rounded mt-3 bg-white p-3">
        <div class="col-12 mt-3">
            <div class="table-responsive">
                <table class="table table-bordered" id="list">
                <thead>
                    <th style="width: 130px;">Nama</th>
                    <th style="min-width: 140px;">tanggal</th>
                    <th class="col-3">Nominal</th>
                    <th class="col-3">Dana Untuk Jemaat A</th>
                    <th class="col-3">Dana Untuk Pembangunan B</th>
                    <th class="col-3">Dana Untuk Lintas C</th>
                    <th class="col-3">keterangan</th>
                    <th>Pilihan</th>
                    </thead>
                    <tbody>
                        @foreach ($lihatpenyewaangedung as $sewagedung)
                            <tr>
                                <td>
                                    {{$sewagedung['nama']}}
                                </td>
                                <td>
                                    {{$sewagedung['tanggal']}}
                                </td>
                                </td>
                                <td align="right">   <?php
                             echo "Rp." . number_format($sewagedung ['nominal'], 2, ",", ".");
                            ?>
                         </td>
                                </td>
                                <td align="right">   <?php
                             echo "Rp." . number_format($sewagedung ['dana_untuk_jemaat'], 2, ",", ".");
                            ?>
                         </td>
                                <td align="right">   <?php
                             echo "Rp." . number_format($sewagedung ['dana_untuk_pembangunan'], 2, ",", ".");
                            ?>
                         </td>
                                <td align="right">   <?php
                             echo "Rp." . number_format($sewagedung ['dana_untuk_lintas'], 2, ",", ".");
                            ?>
                         </td>
                                <td>
                                    {{$sewagedung['keterangan']}}
                                </td>
                                <td>
                                    <div class="d-flex gap-3 flex-column flex-md-row">
                                        <a href="" data-toggle="tooltip" data-placement="bottom" title="Edit Data Jemaat" 
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
@endsection
<script>
        $(document).ready(function() {
            $('#list').DataTable({
                "order": [
                    [1, "desc"]
                ],
                "language": {
                    "lengthMenu": "Tampilkan _MENU_ Penyewaan Gedung per halaman",
                    "zeroRecords": "Maaf, tidak dapat menemukan apapun",
                    "info": "Menampilkan halaman _PAGE_ dari _PAGES_ halaman",
                    "infoEmpty": "Tidak ada penyewaan gedung yang dapat ditampilkan",
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
