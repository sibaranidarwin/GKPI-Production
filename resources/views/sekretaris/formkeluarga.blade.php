<?php
    $navbars = StaticVariable::$navbarSekretaris;
?>
@extends('layouts.home3')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Data Keluarga')
@section('page_name', "Data Keluarga")
@section('content')
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<?php
    $header_title = "Tambah Data Keluarga";
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
            <label for="no_telepon">Nomor HandPhone</label>
                <input name="no_telepon" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                type = "number" maxlength = "13" class="form-control @error('no_telepon') is-invalid @enderror" name="no_telepon" placeholder="Masukkan Nomor HandPhone" value="{{ old('no_telepon') }}">
                            @error('no_telepon')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="tanggal_nikah">Tanggal Pernikahan</label>
                {{-- TODO: Make date format 'YYYY-MM-DD' --}}
                <input type="date" class="form-control @error('tanggal_nikah') is-invalid @enderror" name="tanggal_nikah" placeholder="" value="{{ old('tanggal_nikah') }}">
                            @error('tanggal_nikah')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                    <option disabled selected>Silahkan pilih status</option>
                    <option value="Aktif">Aktif</option>
                    <option value="Pindah">Pindah</option>
                    <option value="Disabled">Disabled</option>
                    @error('status')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </select>
            </div>
            {{-- TODO: Remember this must can upload multiple file and save to db with format (fileone, filetwo, filethree) include the paht  --}}
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="lampiran">Lampiran <strong style=" font-size: 10px;">*upload bukti akta nikah .pdf max = 5MB</strong></label>
                <input type="file"  class="form-control @error('lampiran') is-invalid @enderror" name="lampiran[]" class="form-control" id="lampiran" value="{{ old('lampiran') }}" multiple >  
                            @error('lampiran')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror  
            </div>    
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" placeholder="Masukkan Nama Alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" cols="20" rows="5" class="form-control"></textarea>
                @error('alamat')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>   
            <div class="col-12 col-md-6 mt-5">
                <button type="submit" class="btn btn-success">
                    Simpan
                </button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <a href="{{ route('sekretaris.datakeluarga') }}" class="btn btn-primary">
                             <span>Kembali</span>
                                 </a>
                            </div>
            </div>
        </div>
        
    </form>
</div>
@endsection