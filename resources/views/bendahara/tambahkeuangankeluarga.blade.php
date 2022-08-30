<?php
    $navbars = StaticVariable::$navbarBendahara;
?>
@extends('layouts.home2')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Tambah Data Keuangan Keluarga')
@section('page_name', "Tambah Data Keuangan Keluarga")
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<?php
    $header_title = "Tambah Keuangan Keluarga";
?>
<div class="col-12 p-3 bg-white shadow rounded">
    @include('components.headerform')
    {{-- TODO: Controller not ready yet --}}
    <form class="mt-3" action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
        <div class="form-group col-12 col-md-6 mt-3">
                <label for="no_kk">Nomor Kartu Keluarga</label>
                <input name="no_kk" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                type = "number" maxlength = "16" class="form-control @error('no_kk') is-invalid @enderror" name="no_kk" placeholder="Masukkan Nomor Kartu Keluarga" value="{{ old('no_kk') }}" >
                @error('no_kk')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
   
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="nama_keluarga">Nama Keluarga</label>
                <input type="text" class="form-control @error('nama_keluarga') is-invalid @enderror" name="nama_keluarga" placeholder="Masukkan Nama Keluarga" value="{{ old('nama_keluarga') }}">
                            @error('nama_keluarga')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="jenis_keuangan">Jenis keuangan</label>
                <select name="jenis_keuangan" id="jenis_keuangan" class="form-select">
                    <option disabled selected>Silahkan pilih Jenis Keuangan</option>
                    <option value="Bakti Bulanan">Bakti Bulanan</option>
                    <option value="Bakti Pembangunan">Bakti Pembangunan</option>
                    <option value="Ucapan syukur">Ucapan syukur</option>
                </select>
            </div>

            <div class="form-group col-12 col-md-6 mt-3">
                <label for="nominal">Nominal(Rp)</label>
                <input type="number" name="nominal" placeholder="Masukkan Jumlah Setoran" id="nominal" class="form-control">
            </div>

            <div class="form-group col-12 col-md-6 mt-3">
                <label for="tanggal">Tanggal Setoran</label>
                {{-- TODO: Make date format 'YYYY-MM-DD' --}}
                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" placeholder="" value="{{ old('tanggal') }}">
                            @error('tanggal')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="bulan_id">Bulan <strong style=" font-size: 10px;">*Isikan Bulan jika memilih jenis keuangan keuangan Bakti Bulanan dan Bakti pembangunan</strong></label>
                <select name="bulan_id" id="bulan_id" class="form-select">
                    <option disabled selected>Pilih bulan sesuai yang akan dibayarkan dibawah</option>
                    @foreach ($bulans as $bulan)
                        <option value="{{ $bulan['id'] }}">{{ $bulan['nama'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="tahun">Tahun <strong style=" font-size: 10px;">*Isikan Tahun jika memilih jenis keuangan keuangan Bakti Bulanan dan Bakti pembangunan</strong></label>
                {{-- TODO: Make date format 'YYYY-MM-DD' --}}
                <input type="year" class="form-control @error('tahun') is-invalid @enderror" name="tahun" placeholder="Masukkan Tahun sesuai yang akan dibayarkan" value="{{ old('tahun') }}">
                            @error('tahun')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>
            <div class="col-12 col-md-6 mt-5">
                <button type="submit" class="btn btn-success">
                    Simpan
                </button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <a href="{{ route('bendahara.laporankeuangankeluarga') }}" class="btn btn-primary">
                             <span>Kembali</span>
                                 </a>
                            </div>
            </div>
        </div>
        
    </form>
</div>
@endsection