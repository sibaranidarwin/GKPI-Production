<?php
    $navbars = StaticVariable::$navbarBendahara;
?>
@extends('layouts.home2')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Tambah Pengeluaran Gereja')
@section('page_name', "Tambah Pengeluaran Gereja")
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<?php
    $header_title = "Form Tambah Data ";
?>
<div class="col-12 p-3 bg-white shadow rounded">
    @include('components.headerform')
    {{-- TODO: Controller not ready yet --}}
    <form class="mt-3" action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
        
        <div class="form-group col-12 col-md-6 mt-3">
                <label for="tanggal_pg">Tanggal Pengeluaran</label>
                {{-- TODO: Make date format 'DD-MM-YYYY' --}}
                <input type="date" name="tanggal_pg" id="tanggal_pg" class="form-control">
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="pengeluaran">Jenis Pengeluaran Gereja</label>
                <input type="text" name="pengeluaran" id="pengeluaran" placeholder="Masukkan Jenis Pengeluaran Gereja" class="form-control">
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="jumlah_pg">Jumlah Pengeluaran</label> 
                <input type="number" name="jumlah_pg" id="jumlah_pg" placeholder="Masukkan Jumlah Pengeluaran Gereja" class="form-control">
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="keterangan">Keterangan</label>
                <input type="text" name="keterangan" id="keterangan" placeholder="Masukkan Keterangan" class="form-control">
            </div>
            
        </div>
        <div class="col-12 col-md-6 mt-5">
                <button type="submit" class="btn btn-success">
                    Simpan
                </button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
    </form>
</div>
@endsection