<?php
$navbars = StaticVariable::$navbarPendeta;
?>
@extends('layouts.home5')

@section('title', 'Kegiatan Gereja')

@section('page_name', 'Kegiatan Gereja')
@section('content')
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<div class="row">
            <div class="col-md">
                <div class="header-body text-left mt-2 mb-4">
                    <div class="row justify-content">
                        <div class="row col-lg-12 col-md-4 border-bottom">
                            <div class="col-10">
                            <h2 class="text">Ubah Kegiatan gereja</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="row">
    <div class="col">
        <div class="card  shadow h-100">

            <div class="card-body">
            @foreach ($kegiatan as $item)
            <form autocomplete="off" action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                            <label class="form-control-label" for="nama">Nama Kegiatan</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Masukkan Tanggal ..." value="{{ $item->nama }}">
                            @error('nama')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                            <label class="form-control-label" for="tanggal">Tanggal</label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" placeholder="Masukkan Tanggal ..." value="{{ $item->tanggal }}">
                            @error('tanggal')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                            <label class="form-control-label" for="pukul">Pukul</label>
                            <input type="time" class="form-control @error('pukul') is-invalid @enderror" name="pukul" placeholder="Masukkan Tanggal ..." value="{{ $item->pukul }}">
                            @error('pukul')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                    </div>
                    <button  type="submit" class="btn btn-warning btn-block col-12 col-md-2 mt-3" id="simpan">Ubah</button>
                </form>
                @endforeach
            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')
        @endsection