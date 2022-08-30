<?php
$navbars = StaticVariable::$navbarPendeta;
?>
@extends('layouts.home5')

@section('title', 'Sistem Informasi Berbasis Web GKPI TArutung Kota - Beranda')

@section('page_name', 'Jadwal Ibadah')
@section('content')
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<div class="row">
            <div class="col-md">
                <div class="header-body text-left mt-2 mb-4">
                    <div class="row justify-content">
                        <div class="row col-lg-12 col-md-4 border-bottom">
                            <div class="col-10">
                            <h2 class="text">Ubah Jadwal Ibadah</h2>
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
            @foreach ($jadwal_ibadah as $jadwal)
            <form autocomplete="off" action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                            <label class="form-control-label" for="name">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Masukkan Tanggal ..." value="{{ $jadwal->name }}">
                            @error('name')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                            <label class="form-control-label" for="tanggal">Tanggal</label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" placeholder="Masukkan Tanggal ..." value="{{ $jadwal->tanggal }}">
                            @error('tanggal')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                            <label class="form-control-label" for="waktu">Jam</label>
                            <input type="time" class="form-control @error('waktu') is-invalid @enderror" name="waktu" placeholder="Masukkan Tanggal ..." value="{{ $jadwal->waktu }}">
                            @error('waktu')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                            <label class="form-control-label" for="pengkhotbah">Pengkhotbah</label>
                            <input type="text" class="form-control @error('pengkhotbah') is-invalid @enderror" name="pengkhotbah" placeholder="" value="{{ $jadwal->pengkhotbah }}">
                            @error('pengkhotbah')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                            <label class="form-control-label" for="liturgis">Liturgis</label>
                            <input type="text" class="form-control @error('liturgis') is-invalid @enderror" name="liturgis" placeholder="" value="{{ $jadwal->liturgis }}">
                            @error('liturgis')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                            <label class="form-control-label" for="warta">Warta</label>
                            <input type="text" class="form-control @error('warta') is-invalid @enderror" name="warta" placeholder="" value="{{ $jadwal->warta }}">
                            @error('warta')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                            <label class="form-control-label" for="song_lead">Song Leader's</label>
                            <input type="text" class="form-control @error('song_lead') is-invalid @enderror" name="song_lead" placeholder="" value="{{ $jadwal->song_lead }}">
                            @error('song_lead')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                            <label class="form-control-label" for="organis">Organis</label>
                            <input type="text" class="form-control @error('organis') is-invalid @enderror" name="organis" placeholder="" value="{{ $jadwal->organis }}">
                            @error('organis')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                            <label class="form-control-label" for="pengumpul">Pengumpul</label>
                            <input type="text" class="form-control @error('pengumpul') is-invalid @enderror" name="pengumpul" placeholder="" value="{{ $jadwal->pengumpul }}">
                            @error('pengumpul')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                            <label class="form-control-label" for="protokol">Protokol</label>
                            <input type="text" class="form-control @error('protokol') is-invalid @enderror" name="protokol" placeholder="" value="{{ $jadwal->protokol }}">
                            @error('protokol')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                            <label class="form-control-label" for="operator">Operator</label>
                            <input type="text" class="form-control @error('operator') is-invalid @enderror" name="operator" placeholder="" value="{{ $jadwal->operator }}">
                            @error('operator')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
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