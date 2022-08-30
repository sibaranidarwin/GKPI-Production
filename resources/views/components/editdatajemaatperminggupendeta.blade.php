<?php
$navbars = StaticVariable::$navbarPendeta;
?>
@extends('layouts.home5')

@section('title', 'Sistem Informasi Berbasis Web GKPI TArutung Kota - Beranda')

@section('content')
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<div class="row">
            <div class="col-md">
                <div class="header-body text-left mt-4 mb-4">
                    <div class="row justify-content">
                        <div class="row col-lg-12 col-md-4 border-bottom">
                            <div class="col-10">
                            <h2 class="text">Ubah Data Jemaat Perminggu</h2>
                            <p class="text">Data pelayan  dapat dengan mudah mengetahui informasi seputar data pelayan gereja.</p>
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
            <form autocomplete="off" action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="tanggal_statis">Tgl/Bln/Thn</label>
                <input type="date" name="tanggal_statis" id="tanggal_statis" class="form-control" value="{{ $statistik_jemaats['tanggal_statis'] }}" required>
                @error('tanggal_statis')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="keterangan">Keterangan</label>
                  <select name="keterangan" class="form-control" id="keterangan" >
                    <option value="Sekolah Minggu" {{ $statistik_jemaats->keterangan == "Sekolah Minggu" ? 'selected' : '' }}>Sekolah Minggu</option>                            
                    <option value="Minggu Sesi I" {{ $statistik_jemaats->keterangan == "Minggu Sesi I" ? 'selected' : '' }}>Minggu Sesi I</option>
                    <option value="Minggu Sesi II" {{ $statistik_jemaats->keterangan == "Minggu Sesi II" ? 'selected' : '' }}>Minggu Sesi II</option>
                    <option value="Sermon Jemaat" {{ $statistik_jemaats->keterangan == "Sermon Jemaat" ? 'selected' : '' }}>Sermon Jemaat</option>
                    <option value="Ina Kamis" {{ $statistik_jemaats->keterangan == "Ina Kamis" ? 'selected' : '' }}>Ina Kamis</option>
                    <option value="Partangiangan Sektor" {{ $statistik_jemaats->keterangan == "Partangiangan Sektor" ? 'selected' : '' }}>Partangiangan Sektor</option>
                    <option value="Ina Ester" {{ $statistik_jemaats->keterangan == "Ina Ester" ? 'selected' : '' }}>Ina Ester</option>
                    <option value="PP-Remaja" {{ $statistik_jemaats->keterangan == "PP-Remaja" ? 'selected' : '' }}>PP-Remaja</option>
                     </select>
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="jumlah_hadir">jumlah_hadir</label>
                <input type="number" name="jumlah_hadir" id="jumlah_hadir" class="form-control" value="{{ $statistik_jemaats['jumlah_hadir'] }}" required>
                  @error('jumlah_hadir')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>
            <div class="col-12 col-md-3 mt-3">
                <button type="submit" class="btn btn-warning" id="simpan">
                   Ubah
                </button>
            </div>
            </form>
        </div>
</div>

            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')
        @endsection