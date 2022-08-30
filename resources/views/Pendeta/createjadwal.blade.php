<?php
$navbars = StaticVariable::$navbarPendeta;
?>
@extends('layouts.home5')
@section('title', 'Jadwal Ibadah')
@section('page_name', 'Jadwal Petugas Ibadah')

@section('content')
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />

<div class="row">
            <div class="col-md">
                <div class="header-body text-left mt-2 mb-4">
                    <div class="row justify-content">
                        <div class="row col-lg-12 col-md-4 border-bottom">
                            <div class="col">
                            <h2 class="">Tambah Jadwal Petugas Ibadah</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 p-3 bg-white shadow rounded">

    {{-- TODO: Controller not ready yet --}}
    <form class="mt-3" action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="form-group col-12 col-md-6 mt-3">
            <label class="form-control-label" for="name">Nama Jadwal</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Masukkan Nama" value="{{ old('name') }}">
                            @error('name')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                            <label class="form-control-label" for="tanggal">Tanggal</label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" placeholder="Masukkan Tanggal ..." value="{{ old('tanggal') }}">
                            @error('tanggal')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
            <label class="form-control-label" for="waktu">Pukul</label>
                            <input type="time" class="form-control @error('waktu') is-invalid @enderror" name="waktu" placeholder="Masukkan Tanggal ..." value="{{ old('tanggal') }}">
                            @error('waktu')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
            <label class="form-control-label" for="pengkhotbah">Pengkhotbah</label>
                    <input type="text" class="form-control @error('pengkhotbah') is-invalid @enderror" name="pengkhotbah" placeholder="Masukkan Nama Pengkhotbah" value="{{ old('pengkhotbah') }}">
                            @error('pengkhotbah')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
            <label class="form-control-label" for="liturgis">Liturgis</label>
                    <input type="text" class="form-control @error('liturgis') is-invalid @enderror" name="liturgis" placeholder="Masukkan Nama Liturgis" value="{{ old('liturgis') }}">
                            @error('liturgis')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
            <label class="form-control-label" for="warta">Pewarta</label>
                    <input type="text" class="form-control @error('warta') is-invalid @enderror" name="warta" placeholder="Masukkan Nama Pewarta" value="{{ old('warta') }}">
                            @error('warta')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
            <label class="form-control-label" for="song_lead">Song Leader's</label>
                    <input type="text" class="form-control @error('song_lead') is-invalid @enderror" name="song_lead" placeholder="Masukkan Nama Song Leader's" value="{{ old('song_lead') }}">
                            @error('song_lead')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
            <label class="form-control-label" for="organis">Organis</label>
                    <input type="text" class="form-control @error('organis') is-invalid @enderror" name="organis" placeholder="Masukkan Nama Organis" value="{{ old('organis') }}">
                            @error('organis')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
            <label class="form-control-label" for="pengumpul">Pengumpul Persembahan</label>
                    <input type="text" class="form-control @error('pengumpul') is-invalid @enderror" name="pengumpul" placeholder="Masukkan Nama Pengumpul" value="{{ old('pengumpul') }}">
                            @error('pengumpul')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
            <label class="form-control-label" for="protokol">Petugas Protokol Kesehatan</label>
                    <input type="text" class="form-control @error('protokol') is-invalid @enderror" name="protokol" placeholder="Masukkan Nama Protokol" value="{{ old('protokol') }}">
                            @error('protokol')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
            <label class="form-control-label" for="operator">Operator LCD</label>
                    <input type="text" class="form-control @error('operator') is-invalid @enderror" name="operator" placeholder="Masukkan Nama Operator LCD" value="{{ old('operator') }}">
                            @error('operator')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>
            <div class="col-12 col-md-6 mt-4">
                <button type="submit" class="btn btn-success">
                    Simpan
                </button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <a href="{{ route('pendeta.jadwal') }}" class="btn btn-primary">
                             <span>Kembali</span>
                                 </a>
            </div>
        </div>
    </form>
</div>
@endsection