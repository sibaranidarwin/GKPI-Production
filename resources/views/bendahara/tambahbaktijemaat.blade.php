<?php
$navbars = StaticVariable::$navbarBendahara;
?>
@extends('layouts.home2')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Bakti Jemaat')
@section('page_name', 'Bakti Jemaat')

@section('navbar_content')
    <div class="col-4 ms-auto">
        <input type="text" class="form-control" name="" id="">
    </div>
@endsection
@section('content')
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<?php
    $header_title = "Tambah Tata Ibadah";
?>
<div class="row">
            <div class="col-md">
                <div class="header-body text-left mt-2 mb-4">
                    <div class="row justify-content">
                        <div class="row col-lg-12 col-md-4 border-bottom">
                            <div class="col-10">
                            <h2 class="text">Tambah Bakti Bulanan dan Pembagunan Jemaat</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<div class="col-12 p-3 bg-white shadow rounded">
    {{-- TODO: Controller not ready yet --}}
    <form class="" action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="form-group mt-3 col-6">
                <label for="nik"> No Induk Kependudukan</label>
                <select name="nik" id="nik" class="form-select">
                    <option disabled selected>Pilih No Induk Kependudukan</option>
                    @foreach ($niks as $nik)
                        <option value="{{ $nik['nik'] }}">{{ $nik['nik'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="nama">Nama Jemaat</label>
                <input type="text" name="nama" id="nama" placeholder="Masukkan Nama Jemaat" class="form-control">
                @error('nama')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="bakti_bulan">Bakti Bulanan</label>
                <input type="text" name="bakti_bulan" id="bakti_bulan" placeholder="Masukkan Bakti Bulanan" class="form-control">
                @error('bakti_bulan')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="jumlah_bulan">Jumlah Bulanan</label>
                <input type="number" name="jumlah_bulan" id="jumlah_bulan" placeholder="Masukkan Jumlah Pembayaran Bakti Bulanan" class="form-control">
                @error('jumlah_bulan')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>
          
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="bakti_pembangunan">Bakti Pembangunan</label>
                <input type="text" name="bakti_pembangunan" id="bakti_pembangunan" placeholder="Masukkan Bakti Pembangunan" class="form-control">
                @error('bakti_pembangunan')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="jumlah">Jumlah Pembangunan</label>
                <input type="number" name="jumlah" id="jumlah" placeholder="Masukkan Jumlah Pembayaran Bakti Pembangunan" class="form-control">
                @error('jumlah')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="rentang_bayar">Rentang Pembayaran</label>
                <input type="text" name="rentang_bayar" id="rentang_bayar" placeholder="Masukkan Rentang Pembayaran" class="form-control">
                @error('rentang_bayar')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>
            
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="dana_a">Dana A Kas Jemaat</label>
                <input type="number" name="dana_a" id="dana_a" placeholder="Masukkan Dana A kas Jemaat" class="form-control">
                </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="dana_b">Dana B Pembangunan</label>
                <input type="number" name="dana_b" id="dana_b" placeholder="Masukkan Dana B Pembagunan" class="form-control">
                </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="dana_c">Dana C Lintas</label>
                <input type="number" name="dana_c" id="dana_c" placeholder="Masukkan Dana C Lintas" class="form-control">
                </div>
            
            <div class="col-12 col-md-6 mt-5">
                <button type="submit" class="btn btn-success">
                   Simpan
                </button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <a href="{{ route('bendahara.baktikeluarga')  }}" class="btn btn-primary">
                             <span>Kembali</span>
                </a>
            </div>
        </div>
    </form>
</div>
    @include('sweetalert::alert')
@endsection