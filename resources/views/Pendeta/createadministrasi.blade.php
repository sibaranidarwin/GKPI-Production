<?php
$navbars = StaticVariable::$navbarPendeta;
?>
@extends('layouts.home')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Administrasi Data')
@section('page_name', 'Administrasi Data Jemaat')

@section('navbar_content')
    <div class="col-4 ms-auto">
        <input type="text" class="form-control" name="" id="">
    </div>
@endsection
@section('content')
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">


<?php
    $header_title = "Tambah Tata Ibadah";
?>
<div class="row">
            <div class="col-md">
                <div class="header-body text-left mt-2 mb-4">
                    <div class="row justify-content">
                        <div class="row col-lg-12 col-md-4 border-bottom">
                            <div class="col-10">
                            <h2 class="text">Tambah Administrasi Data</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<div class="col-12 p-3 bg-white shadow rounded">
    {{-- TODO: Controller not ready yet --}}
    <form class="" action="{{ route('pendeta.storeadministrasi') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
             <div class="form-group col-12 col-md-6 mt-3">
                <label for="nik"> No Induk Kependudukan</label>
                <select name="nik" id="nik" class="form-select">
                    <option disabled selected>Pilih No Induk Kependudukan</option>
                    @foreach ($niks as $nik)
                        <option value="{{ $nik['nik'] }}">{{ $nik['nik'] }}</option>
                    @endforeach
                </select>
                @error('nik')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" placeholder="Masukkan Nama" class="form-control">
                @error('nama')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="surat_lahir">Surat Lahir</label>
                <input type="file" class="form-control @error('surat_lahir') is-invalid @enderror" name="surat_lahir" class="form-control" id="surat_lahir" value="{{ old('surat_lahir') }}" >  
                            @error('surat_lahir')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror  
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="surat_baptis">Surat Baptis</label>
                <input type="file" class="form-control @error('surat_baptis') is-invalid @enderror" name="surat_baptis" class="form-control" id="surat_baptis" value="{{ old('surat_baptis') }}" >  
                            @error('surat_baptis')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror  
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="surat_sidi">Surat Sidi</label>
                <input type="file" class="form-control @error('surat_sidi') is-invalid @enderror" name="surat_sidi" class="form-control" id="surat_sidi" value="{{ old('surat_sidi') }}"  >  
                            @error('surat_sidi')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror  
            </div>   
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="surat_nikah">Surat Menikah</label>
                <input type="file" class="form-control @error('surat_nikah') is-invalid @enderror" name="surat_nikah" class="form-control" id="surat_nikah" value="{{ old('surat_nikah') }}"  >  
                            @error('surat_nikah')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror  
            </div>   
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="surat_pindah">Surat Pindah</label>
                <input type="file" class="form-control @error('surat_pindah') is-invalid @enderror" name="surat_pindah" class="form-control" id="surat_pindah" value="{{ old('surat_pindah') }}"  >  
                            @error('surat_pindah')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror  
            </div>   
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="surat_meninggal">Surat Meninggal</label>
                <input type="file" class="form-control @error('surat_meninggal') is-invalid @enderror" name="surat_meninggal" class="form-control" id="surat_meninggal" value="{{ old('surat_meninggal') }}"  >  
                            @error('surat_meninggal')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror  
            </div>        
            
            <div class="col-12 col-md-6 mt-5">
                <button type="submit" class="btn btn-success">
                   Simpan
                </button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <a href="{{ route('pendeta.detailibadah')  }}" class="btn btn-primary">
                             <span>Kembali</span>
</a>
            </div>
        </div>
    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>

<script>
		$(".form-select").select2();
	</script>
    @include('sweetalert::alert')
@endsection