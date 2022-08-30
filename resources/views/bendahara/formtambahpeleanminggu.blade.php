<?php
    $navbars = StaticVariable::$navbarBendahara;
?>
@extends('layouts.home2')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Tambah Pelean Minggu')
@section('page_name', "Tambah Pelean Minggu")
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<?php
    $header_title = "Form Tambah Pelean Minggu ";
?>
<div class="col-12 p-3 bg-white shadow rounded">
    @include('components.headerform')
    {{-- TODO: Controller not ready yet --}}
    <form class="mt-3" action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
        
        <div class="form-group col-12 col-md-6 mt-3">
                <label for="tanggal_ibadah">Tanggal Ibadah</label>
                {{-- TODO: Make date format 'DD-MM-YYYY' --}}
                <input type="date" name="tanggal_ibadah" id="tanggal_ibadah" class="form-control">
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="jenis_ibadah">Jenis Ibadah</label>
                <input type="text" name="jenis_ibadah" id="jenis_ibadah" placeholder="Masukkan nama ibadah" class="form-control" required>
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="jumlah_org">Jumlah Orang(Halak)</label>
                <input type="number" name="jumlah_org" id="jumlah_org" placeholder="Masukkan jumlah orang" class="form-control" required>
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="jemaat_a">Dana untuk Jemaat A(Rp)</label>
                <input type="number" name="jemaat_a" id="jemaat_a" placeholder="Masukkan dana untuk Jemaat A" class="form-control" required>
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="pembangunan_b">Dana untuk Pembangunan B(Rp)</label>
                <input type="number" name="pembangunan_b" id="pembangunan_b" placeholder="Masukkan dana untuk Pembangunan B" class="form-control" required>
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="lintas_c">Dana untuk Lintas C(Rp)</label>
                <input type="number" name="lintas_c" id="lintas_c" placeholder="Masukkan dana untuk Lintas C" class="form-control" required>
            </div>
            
            
            
            
        </div>
        <div class="col-12 col-md-6 mt-5">
                <button type="submit" class="btn btn-success">
                    Tambahkan Pelean Minggu
                </button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
    </form>
</div>
@endsection