<?php
    $navbars = StaticVariable::$navbarBendahara;
?>
@extends('layouts.home2')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Tambah Pelean Lain')
@section('page_name', "Tambah Pelean Lain")
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<?php
    $header_title = "Form Tambah Pelean Lainnya ";
?>
<div class="col-12 p-3 bg-white shadow rounded">
    @include('components.headerform')
    {{-- TODO: Controller not ready yet --}}
    <form class="mt-3" action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
        
        <div class="form-group col-12 col-md-6 mt-3">
                <label for="tanggal_lain">Tanggal Ibadah</label>
                {{-- TODO: Make date format 'DD-MM-YYYY' --}}
                <input type="date" name="tanggal_lain" id="tanggal_lain" class="form-control">
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="keterangan_lain">Nama Ibadah</label>
                <input type="text" name="keterangan_lain" id="keterangan_lain" placeholder="Masukkan nama ibadah" class="form-control" required>
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="jumlah">Jumlah Orang(Halak)</label>
                <input type="number" name="jumlah" id="jumlah" placeholder="Masukkan jumlah orang" class="form-control" required>
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="dana_jemaata">Dana untuk Jemaat A(Rp)</label>
                <input type="number" name="dana_jemaata" id="dana_jemaata" placeholder="Masukkan dana untuk Jemaat A" class="form-control" >
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="dana_pembangunanb">Dana untuk Pembangunan B(Rp)</label>
                <input type="number" name="dana_pembangunanb" id="dana_pembangunanb" placeholder="Masukkan dana untuk Pembangunan B" class="form-control" required>
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="dana_lintasc">Dana untuk Lintas C(Rp)</label>
                <input type="number" name="dana_lintasc" id="dana_lintasc" placeholder="Masukkan dana untuk Lintas C" class="form-control" required>
            </div>
            
            
            
            
        </div>
        <div class="col-12 col-md-6 mt-5">
                <button type="submit" class="btn btn-success">
                    Tambahkan Pelean Lain
                </button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
    </form>
</div>
@endsection