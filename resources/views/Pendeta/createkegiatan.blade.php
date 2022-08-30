<?php
$navbars = StaticVariable::$navbarPendeta;
?>
@extends('layouts.home5')
@section('title', 'Kegiatan')

@section('page_name', 'Kegiatan Gereja')
@section('content')
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />

<div class="row">
            <div class="col-md">
                <div class="header-body text-left mt-2 mb-4">
                    <div class="row justify-content">
                        <div class="row col-lg-12 col-md-4 border-bottom">
                            <div class="col">
                            <h2 class="">Tambah Kegiatan Gereja</h2>
                            
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
            <label class="form-control-label" for="nama">Nama Kegiatan</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Masukkan Nama Kegiatan" value="{{ old('nama') }}">
                            @error('nama')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                            <label class="form-control-label" for="tanggal">Tanggal Kegiatan</label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" placeholder="Masukkan Tanggal ..." value="{{ old('tanggal') }}">
                            @error('tanggal')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                    </div>
            <div class="form-group col-12 col-md-6 mt-3">
            <label class="form-control-label" for="pukul">Pukul Kegiatan</label>
                            <input type="time" class="form-control @error('pukul') is-invalid @enderror" name="pukul" placeholder="Masukkan Tanggal ..." value="{{ old('pukul') }}">
                            @error('pukul')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>
            <div class="col-12 col-md-6 mt-4">
                <button type="submit" class="btn btn-success">
                    Simpan
                </button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <a href="{{ route('pendeta.kegiatan') }}" class="btn btn-primary">
                             <span>Kembali</span>
                                 </a>
            </div>
        </div>
    </form>
</div>
@endsection