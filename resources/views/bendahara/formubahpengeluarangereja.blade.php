<?php
    $navbars = StaticVariable::$navbarBendahara;
?>
@extends('layouts.home2')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Ubah Pengeluaran Gereja')
@section('page_name', "Ubah Pengeluaran Gereja")
@section('content')
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<?php
    $header_title = "Form Ubah Pengeluaran Gereja";
?>
<div class="col-12 p-3 bg-white shadow rounded">
    @include('components.headerform')
    {{-- TODO: Controller not ready yet --}}
    @foreach ($pengeluaran_gereja as $pengeluaran_gereja)
    <form class="mt-3" action="/bendahara/data/pengeluarangereja/update/{{ $pengeluaran_gereja->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
        <div class="form-group col-12 col-md-6 mt-3">
                <label for="tanggal_pg">Tanggal Pengeluaran</label>
                {{-- TODO: Make date format 'YYYY-MM-DD' --}}
                <input type="date" name="tanggal_pg" id="tanggal_pg" class="form-control" value="{{ $pengeluaran_gereja->tanggal_pg }}">
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="pengeluaran">Jenis Pengeluaran</label>
                <input type="text" name="pengeluaran" id="pengeluaran" class="form-control" value=" {{ $pengeluaran_gereja->pengeluaran }}">
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="jumlah_pg">Jumlah Pengeluaran</label>
                <input type="number" name="jumlah_pg" id="jumlah_pg" class="form-control" value="{{ $pengeluaran_gereja->jumlah_pg }}">
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="keterangan">Keterangan</label>
                <input type="text" name="keterangan" id="keterangan" class="form-control" value="{{ $pengeluaran_gereja->keterangan }}">
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