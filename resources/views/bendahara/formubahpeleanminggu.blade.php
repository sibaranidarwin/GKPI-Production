<?php
    $navbars = StaticVariable::$navbarBendahara;
?>
@extends('layouts.home2')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Ubah Pelean Minggu')
@section('page_name', "Ubah Pelean Minggu")
@section('content')
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<?php
    $header_title = "Form Ubah Pelean Minggu";
?>
<div class="col-12 p-3 bg-white shadow rounded">
    @include('components.headerform')
    {{-- TODO: Controller not ready yet --}}
    @foreach ($pelean_minggus as $pelean)
    <form class="mt-3" action="/bendahara/data/peleanminggu/update/{{ $pelean->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
        <div class="form-group col-12 col-md-6 mt-3">
                <label for="tanggal-ibadah">Tanggal Ibadah</label>
                {{-- TODO: Make date format 'YYYY-MM-DD' --}}
                <input type="date" name="tanggal_ibadah" id="tanggal_ibadah" class="form-control" value="{{ $pelean->tanggal_ibadah }}">
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="jenis_ibadah">Jenis Ibadah</label>
                <input type="text" name="jenis_ibadah" id="jenis_ibadah" class="form-control" value=" {{ $pelean->jenis_ibadah }}" required>
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="jumlah_org">Jumlah_orang</label>
                <input type="number" name="jumlah_org" id="jumlah_org" class="form-control" value="{{ $pelean->jumlah_org }}" required>
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="jemaat_a">Dana untuk Jemaat_A</label>
                <input type="number" name="jemaat_a" id="jemaat_a" class="form-control" value="{{ $pelean->jemaat_a }}" required>
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="pembangunan_b">Dana untuk Pembangunan B</label>
                <input type="number" name="pembangunan_b" id="pembangunan_b" class="form-control" value="{{ $pelean->pembangunan_b }}" required>
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="lintas_c">Dana untuk Lintas C</label>
                <input type="number" name="lintas_c" id="lintas_c" class="form-control" value="{{ $pelean->lintas_c }}" required>
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