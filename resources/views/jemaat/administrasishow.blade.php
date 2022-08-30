<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.css"/>
<?php
$navbars = StaticVariable::$navbarJemaat;
?>
@extends('layouts.home5')
@section('title', 'Administrasi Data')
@section('page_name', 'Administrasi Data jemaat')

@section('content')

<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<div class="row">
            <div class="col-md">
                <div class="header-body text-left mt-3 mb-4">
                    <div class="row justify-content">
                        <div class="row col-lg-12 col-md-4 border-bottom">
                            <div class="col-10">
                            <h2 class="text">Daftar Administrasi Data</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<div class="col-12 p-3">
<div class="col-12 shadow-sm rounded bg-white p-3">
      
            <div class="table-responsive">
                <table class="table table-bordered" id="list">
                    <thead>
                        <tr>
                            <th scope="col">No Nik</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Surat Lahir</th>
                            <th scope="col">Surat Baptis</th>
                            <th scope="col">Surat Sidi</th>
                            <th scope="col">Surat Nikah</th>
                            <th scope="col">Surat Pindah</th>
                            <th scope="col">Surat Meninggal</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($administrasias as $item)
                            <tr>
                                <td>{{ $item['nik'] }}</td>
                                <td>{{ $item['nama'] }}</td>
                                <td>  <a target="_BLANK" href="{{ $item['surat_lahir'] }}" >
                              <button class="btn btn-primary">Unduh File <i class="fa fa-download" aria-hidden="true"></i></button></a></td>
                              <td>  <a target="_BLANK" href="{{ $item['surat_baptis'] }}" >
                              <button class="btn btn-primary">Unduh File <i class="fa fa-download" aria-hidden="true"></i></button></a></td>
                              <td>  <a target="_BLANK" href="{{ $item['surat_sidi'] }}" >
                              <button class="btn btn-primary">Unduh File <i class="fa fa-download" aria-hidden="true"></i></button></a></td>
                              <td>  <a target="_BLANK" href="{{ $item['surat_nikah'] }}" >
                              <button class="btn btn-primary">Unduh File <i class="fa fa-download" aria-hidden="true"></i></button></a></td>
                              <td>  <a target="_BLANK" href="{{ $item['surat_pindah'] }}" >
                              <button class="btn btn-primary">Unduh File <i class="fa fa-download" aria-hidden="true"></i></button></a></td>
                              <td>  <a target="_BLANK" href="{{ $item['surat_meninggal'] }}" >
                              <button class="btn btn-primary">Unduh File <i class="fa fa-download" aria-hidden="true"></i></button></a></td>
                                <td>
                                    <div class="d-flex gap-3 flex-column flex-md-row">
                                    <a href="/pendeta/editdatapelayan/{{ $item['nik'] }}" data-toggle="tooltip" data-placement="bottom" title="Edit Data Pelayan" 
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
</div>
@include('sweetalert::alert')
<script>
        $(document).ready(function() {
            $('#list').DataTable({
                "order": [
                    [1, "desc"]
                ],
                "language": {
                    "lengthMenu": "Tampilkan _MENU_ Data Administrasi Jemaat",
                    "zeroRecords": "Maaf, tidak dapat menemukan apapun",
                    "info": "Menampilkan halaman _PAGE_ dari _PAGES_ halaman",
                    "infoEmpty": "Tidak ada Data yang dapat ditampilkan",
                    "infoFiltered": "(dari _MAX_ total Data)",
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