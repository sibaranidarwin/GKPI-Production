<?php
    $navbars = StaticVariable::$navbarBendahara;
?>
@extends('layouts.home2')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Penyewaan Gedung Aula')
@section('page_name', "Penyewaan Gedung Aula")
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<?php
    $header_title = "Penyewaan Gedung Aula";
?>
<div class="col-12 p-3 bg-white shadow rounded">
    @include('components.headerform')
    {{-- TODO: Controller not ready yet --}}
    <form class="mt-3" action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
        <div class="form-group col-12 col-md-6 mt-3">
            <label for="nama">Nama Penyewa</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Masukkan Nama Keluarga" value="{{ old('nama') }}">
            @error('nama')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
        </div>
        <div class="form-group col-12 col-md-6 mt-3">
                <label for="tanggal">Tanggal Penyewaan</label>
                {{-- TODO: Make date format 'YYYY-MM-DD' --}}
                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" placeholder="" value="{{ old('tanggal') }}">                    @error('tanggal')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
        </div>
        <div class="form-group col-12 col-md-6 mt-3">
            <label for="nominal">Nominal(Rp)</label>
            <input type="number" name="nominal" placeholder="Masukkan Pembayaran Penyewaan Gedung" id="nominal" class="form-control">
        </div>
        <div class="form-group col-12 col-md-6 mt-3">
            <label for="dana untuk jemaat">Dana untuk Jemaat(Rp)</label>
            <input type="number" name="dana untuk jemaat" placeholder="Masukkan Dana Peruntukan ke Jemaat" id="dana untuk jemaat" class="form-control">
        </div>
        <div class="form-group col-12 col-md-6 mt-3">
            <label for="dana untuk pembangunan">Dana untuk Pembangunan(Rp)</label>
            <input type="number" name="dana untuk pembangunan" placeholder="Masukkan Dana Peruntukan ke Pembangunan" id="dana untuk pembangunan	" class="form-control">
        </div>
        <div class="form-group col-12 col-md-6 mt-3">
            <label for="dana untuk lintas">Dana untuk Lintas(Rp)</label>
            <input type="number" name="dana untuk lintas" placeholder="Masukkan Dana Peruntukan ke Lintas" id="dana untuk lintas" class="form-control">
        </div>
        <div class="form-group col-12 col-md-6 mt-3">
                <label for="keterangan">Keterangan</label>
                <textarea name="keterangan" placeholder="Masukkan Keterangan Penyewaan Gedung" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" cols="20" rows="5" class="form-control"></textarea>
                @error('keterangan')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
        </div>
            <div class="col-12 col-md-6 mt-5">
                <button type="submit" class="btn btn-success">
                    Simpan
                </button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <a href="" class="btn btn-primary">
                    <span>Kembali</span>
                 </a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

