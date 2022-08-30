<?php
$navbars = StaticVariable::$navbarPendeta;
?>
@extends('layouts.home')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Ibadah Minggu')
@section('page_name', 'Daftar Ibadah Minggu')

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
                            <h2 class="text">Tambah Acara Ibadah</h2>
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
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" placeholder="Masukkan Nama" class="form-control">
                @error('nama')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="nyanyi">Menyanyi I</label>
                <input type="text" placeholder="Masukkan No.Kj" class="form-control @error('nyanyi') is-invalid @enderror" name="nyanyi" class="form-control" id="nyanyi" value="{{ old('nyanyi') }}" >  
                            @error('nyanyi')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror  
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="votum">Votum</label>
                <input type="text" placeholder="Masukkan Votum" class="form-control @error('votum') is-invalid @enderror" name="votum" class="form-control" id="votum" value="{{ old('votum') }}" >  
                            @error('votum')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror  
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="nyanyi_2">Menyanyi II</label>
                <input type="text" placeholder="Masukkan No.Kj" class="form-control @error('nyanyi_2') is-invalid @enderror" name="nyanyi_2" class="form-control" id="nyanyi_2" value="{{ old('nyanyi_2') }}" >  
                            @error('nyanyi_2')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror  
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="epistel">Epistel</label>
                <input type="text" placeholder="Masukkan Epistel" class="form-control @error('epistel') is-invalid @enderror" name="epistel" class="form-control" id="epistel" value="{{ old('epistel') }}" >  
                            @error('epistel')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror  
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="nyanyi_3">Menyanyi III</label>
                <input type="text" placeholder="Masukkan No.Kj" class="form-control @error('nyanyi_3') is-invalid @enderror" name="nyanyi_3" class="form-control" id="nyanyi_3" value="{{ old('nyanyi_3') }}" >  
                            @error('nyanyi_3')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror  
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="dosa">Dosa</label>
                <input type="text" placeholder="Masukkan Pengakuan Dosa/ Janji Pengampunan" class="form-control @error('dosa') is-invalid @enderror" name="dosa" class="form-control" id="dosa" value="{{ old('dosa') }}" >  
                            @error('dosa')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror  
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="nyanyi_4">Menyanyi IV</label>
                <input type="text"  placeholder="Masukkan No.Kj" class="form-control @error('nyanyi_4') is-invalid @enderror" name="nyanyi_4" class="form-control" id="nyanyi_4" value="{{ old('nyanyi_4') }}" >  
                            @error('nyanyi_4')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror  
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="petunjuk">Petunjuk</label>
                <input type="text" placeholder="Masukkan Petunjuk" class="form-control @error('petunjuk') is-invalid @enderror" name="petunjuk" class="form-control" id="petunjuk" value="{{ old('petunjuk') }}"  >  
                            @error('petunjuk')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror  
            </div>      
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="koor">Koor</label>
                <input type="text" placeholder="Masukkan Koor" class="form-control @error('koor') is-invalid @enderror" name="koor" class="form-control" id="koor" value="{{ old('koor') }}"  >  
                            @error('koor')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror  
            </div>   
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="nyanyi_5">Menyanyi V</label>
                <input type="text" placeholder="Masukkan No.Kj" class="form-control @error('nyanyi_5') is-invalid @enderror" name="nyanyi_5" class="form-control" id="nyanyi_5" value="{{ old('nyanyi_5') }}"  >  
                            @error('nyanyi_5')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror  
            </div>   
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="pengakuan">Pengakuan</label>
                <input type="text" placeholder="Masukkan Pengakuan Iman Rasuli" class="form-control @error('pengakuan') is-invalid @enderror" name="pengakuan" class="form-control" id="pengakuan" value="{{ old('pengakuan') }}"  >  
                            @error('pengakuan')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror  
            </div>        
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="warta">Warta</label>
                <input type="text" placeholder="Masukkan Warta" class="form-control @error('warta') is-invalid @enderror" name="warta" class="form-control" id="warta" value="{{ old('warta') }}"  >  
                            @error('warta')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror  
            </div>       
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="khotbah">Khotbah</label>
                <input type="text" placeholder="Masukkan Khotbah" class="form-control @error('khotbah') is-invalid @enderror" name="khotbah" class="form-control" id="khotbah" value="{{ old('khotbah') }}"  >  
                            @error('khotbah')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror  
            </div>   
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="nyanyi_6">Menyanyi VI</label>
                <input type="text" placeholder="Masukkan No.Kj" class="form-control @error('nyanyi_6') is-invalid @enderror" name="nyanyi_6" class="form-control" id="nyanyi_6" value="{{ old('nyanyi_6') }}"  >  
                            @error('nyanyi_6')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror  
            </div>     
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="nats">Nats</label>
                <input type="text" placeholder="Masukkan Nats" class="form-control @error('nats') is-invalid @enderror" name="nats" class="form-control" id="nats" value="{{ old('nats') }}"  >  
                            @error('nats')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror  
            </div>     
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="persembahan">Persembahan</label>
                <input type="text" placeholder="Masukkan isi Persembahan" class="form-control @error('persembahan') is-invalid @enderror" name="persembahan" class="form-control" id="persembahan" value="{{ old('persembahan') }}"  >  
                            @error('persembahan')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror  
            </div>  
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="nyanyi_7">Menyanyi VII</label>
                <input type="text" placeholder="Masukkan No.Kj" class="form-control @error('nyanyi_7') is-invalid @enderror" name="nyanyi_7" class="form-control" id="nyanyi_7" value="{{ old('nyanyi_7') }}"  >  
                            @error('nyanyi_7')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror  
            </div>  
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="penutup">Penutup</label>
                <input type="text" placeholder="Masukkan Isi Penutup" class="form-control @error('penutup') is-invalid @enderror" name="penutup" class="form-control" id="penutup" value="{{ old('penutup') }}"  >  
                            @error('penutup')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror  
            </div>        
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="amin">Amin</label>
                <input type="text" placeholder="Masukkan Amin-Amin-Amin" class="form-control @error('amin') is-invalid @enderror" name="amin" class="form-control" id="amin" value="{{ old('amin') }}"  >  
                            @error('amin')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror  
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
    @include('sweetalert::alert')
@endsection