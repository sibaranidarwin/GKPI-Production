<?php
    $navbars = StaticVariable::$navbarBendahara;
?>
@extends('layouts.home2')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Edit Keuangan Keluarga')
@section('page_name', "Edit Keuangan Keluarga")
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<?php
    $header_title = "Form Ubah Laporan Keuangan";
?>
<div class="col-12 p-3 bg-white shadow rounded">
    @include('components.headerform')
    {{-- TODO: Controller not ready yet --}}
    <form class="mt-3" action="/bendahara/updatekeuangankeluarga/update/{{$keuangankeluarga->no_kk}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
        <div class="form-group col-12 col-md-6 mt-3">
            <label for="no_kk">Nomor Kartu Keluarga</label>
            <input name="no_kk" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                type = "number" maxlength = "16" class="form-control @error('no_kk') is-invalid @enderror" name="no_kk" id="no_kk" value="{{ $keuangankeluarga['no_kk'] }}" >
        </div>
        <div class="form-group col-12 col-md-6 mt-3">
                <label for="nama_keluarga">Nama Keluarga</label>
                <input type="text" name="nama_keluarga" id="nama_keluarga" class="form-control" value="{{ $keuangankeluarga['nama_keluarga'] }}">
        </div>
        <div class="form-group col-12 col-md-6 mt-3">
                <label for="jenis_keuangan">Jenis Keuangan</label>
                <select name="jenis_keuangan" class="form-select" id="inputJemaat4" >
                    <option value="Bakti Bulanan" {{ $keuangankeluarga->jenis_keuangan == "Bakti Bulanan" ? 'selected' : '' }}>Bakti Bulanan</option>                            
                    <option value="Bakti Pembangunan" {{ $keuangankeluarga->jenis_keuangan == "Bakti Pembangunan" ? 'selected' : '' }}>Bakti Pembangunan</option>
                    <option value="Ucapan syukur" {{ $keuangankeluarga->jenis_keuangan == "Ucapan syukur" ? 'selected' : '' }}>Ucapan syukur</option>
                     </select>
        </div>
        <div class="form-group col-12 col-md-6 mt-3">
            <label for="nominal">Nominal(Rp)</label>
            <input type="number" name="nominal" id="nominal" class="form-control" value="{{ $keuangankeluarga['nominal'] }}">
        </div>    
        <div class="form-group col-12 col-md-6 mt-3">
                <label for="tanggal">Tanggal Setoran</label>
                {{-- TODO: Make date format 'YYYY-MM-DD' --}}
                <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $keuangankeluarga['tanggal'] }}">
        </div>
        <div class="form-group col-12 col-md-6 mt-3">
            <label for="bulan_id">Bulan <strong style=" font-size: 10px;">*Isikan Bulan jika memilih jenis keuangan keuangan Bakti Bulanan dan Bakti pembangunan</strong></label>
            <select name="bulan_id" class="form-select" id="inputJemaat4" >
                    <option value="1" {{ $keuangankeluarga->bulan_id == "" ? 'selected' : '' }}>Pilih Bulan sesuai yang akan dibayarkan dibawah</option>
                    <option value="1" {{ $keuangankeluarga->bulan_id == "1" ? 'selected' : '' }}>Januari</option>                            
                    <option value="2" {{ $keuangankeluarga->bulan_id == "2" ? 'selected' : '' }}>Februari</option>
                    <option value="3" {{ $keuangankeluarga->bulan_id == "3" ? 'selected' : '' }}>Maret</option>
                    <option value="4" {{ $keuangankeluarga->bulan_id == "4" ? 'selected' : '' }}>April</option>
                    <option value="5" {{ $keuangankeluarga->bulan_id == "5" ? 'selected' : '' }}>Mei</option>
                    <option value="6" {{ $keuangankeluarga->bulan_id == "6" ? 'selected' : '' }}>Juni</option>
                    <option value="7" {{ $keuangankeluarga->bulan_id == "7" ? 'selected' : '' }}>Juli</option>
                    <option value="8" {{ $keuangankeluarga->bulan_id == "8" ? 'selected' : '' }}>Agustus</option>
                    <option value="9" {{ $keuangankeluarga->bulan_id == "9" ? 'selected' : '' }}>September</option>
                    <option value="10" {{ $keuangankeluarga->bulan_id == "10" ? 'selected' : '' }}>Oktober</option>
                    <option value="11" {{ $keuangankeluarga->bulan_id == "11" ? 'selected' : '' }}>November</option>
                    <option value="12" {{ $keuangankeluarga->bulan_id == "12" ? 'selected' : '' }}>Desember</option>
                </select>
        </div>
        <div class="form-group col-12 col-md-6 mt-3">
            <label for="tahun">Tahun(Rp) <strong style=" font-size: 10px;">*Isikan Tahun jika memilih jenis keuangan keuangan Bakti Bulanan dan Bakti pembangunan</strong></label>
            <input type="year" name="tahun" id="tahun" class="form-control" value="{{ $keuangankeluarga['tahun'] }}">
        </div>
        </div>
        <div class="col-12 col-md-6 mt-5">
                <button type="submit" class="btn btn-success">
                    Simpan Laporan
                </button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
    </form>

</div>
@endsection