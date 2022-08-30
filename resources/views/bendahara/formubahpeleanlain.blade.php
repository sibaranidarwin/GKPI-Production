<?php
    $navbars = StaticVariable::$navbarBendahara;
?>
@extends('layouts.home2')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Ubah Pelean Lain')
@section('page_name', "Ubah Pelean Lain")
@section('content')
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<?php
    $header_title = "Form Ubah Pelean Lain";
?>
<div class="col-12 p-3 bg-white shadow rounded">
    @include('components.headerform')
    {{-- TODO: Controller not ready yet --}}
    @foreach ($pelean_lain as $pelean_lain)
    <form class="mt-3" action="/bendahara/data/peleanlain/update/{{ $pelean_lain->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
        <div class="form-group col-12 col-md-6 mt-3">
                <label for="tanggal_lain">Tanggal Ibadah</label>
                {{-- TODO: Make date format 'YYYY-MM-DD' --}}
                <input type="date" name="tanggal_lain" id="tanggal_lain" class="form-control" value="{{ $pelean_lain->tanggal_lain }}">
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="keterangan_lain">Jenis Ibadah</label>
                <input type="text" name="keterangan_lain" id="keterangan_lain" class="form-control" value=" {{ $pelean_lain->keterangan_lain }}" required>
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="jumlah">Jumlah</label>
                <input type="number" name="jumlah" id="jumlah" class="form-control" value="{{ $pelean_lain->jumlah }}" required>
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="dana_jemaata">Dana untuk Jemaat_A</label>
                <input type="number" name="dana_jemaata" id="dana_jemaata" class="form-control" value="{{ $pelean_lain->dana_jemaata }}" required>
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="dana_pembangunanb">Dana untuk Pembangunan B</label>
                <input type="number" name="dana_pembangunanb" id="dana_pembangunanb" class="form-control" value="{{ $pelean_lain->dana_pembangunanb }}" required>
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="dana_lintasc">Dana untuk Lintas C</label>
                <input type="number" name="dana_lintasc" id="dana_lintasc" class="form-control" value="{{ $pelean_lain->dana_lintasc }}" required>
            </div>
        <div class="col-12 col-md-6 mt-5">
                <button type="submit" class="btn btn-success">
                    Simpan 
                </button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
    </form>
   @endforeach
</div>
@endsection