<?php
    $header_title = "Edit Data Keluarga";
?>
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />

<div class="col-12 p-3 bg-white shadow rounded">
    @include('components.headerform')
    {{-- TODO: Controller not ready yet --}}
    <form class="mt-3" action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="no_kk">Nomor Kartu Keluarga</label>
                <input type="text" name="no_kk" id="no_kk" class="form-control" value="{{ $keluarga['no_kk'] }}">
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="nama_keluarga">Nama Keluarga</label>
                <input type="text" name="nama_keluarga" id="nama_keluarga" class="form-control" value="{{ $keluarga['nama_keluarga'] }}">
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="no_telepon">Nomor Handphone</label>
                <input type="text" name="no_telepon" id="no_telepon" class="form-control" value="{{$keluarga['no_telepon']}}">
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="tanggal_nikah">Tanggal Nikah</label>
                {{-- TODO: Make date format 'YYYY-MM-DD' --}}
                <input type="date" name="tanggal_nikah" id="tanggal_nikah" class="form-control" value="{{$keluarga['tanggal_nikah']}}">
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="status">Status Anggota</label>
                  <select name="status" class="form-select" id="inputJemaat4" >
                    <option value="Aktif" {{ $keluarga->status == "Aktif" ? 'selected' : '' }}>Aktif</option>                            
                    <option value="Meninggal" {{ $keluarga->status == "Meninggal" ? 'selected' : '' }}>Meninggal</option>
                    <option value="Pindah" {{ $keluarga->status == "Pindah" ? 'selected' : '' }}>Pindah</option>
                     </select>
            </div>
            {{-- TODO: Remember this must can upload multiple file and save to db with format (fileone, filetwo, filethree) include the paht  --}}
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="lampiran">Lampiran <strong style=" font-size: 10px;">*upload kembali bukti AktaNikah.pdf max = 5MB</strong></label>
                <input type="file" name="lampiran[]" class="form-control" id="lampiran" multiple required>    
            </div>    
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" cols="20" rows="5" class="form-control">{{ $keluarga['alamat'] }}</textarea>
            </div>   
            <div class="col-12 col-md-3 mt-5">
                <button type="submit" class="btn btn-warning" id="simpan">
                   Ubah
                </button>
            </div>
        </div>
        
    </form>
</div>
@include('sweetalert::alert')