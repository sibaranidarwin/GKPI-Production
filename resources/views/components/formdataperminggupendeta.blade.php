<?php
$navbars = StaticVariable::$navbarPendeta;
?>


@section('title', 'Tambah Data Perminggu')
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">

<div class="row">
            <div class="col-md">
                <div class="header-body text-left mt-2 mb-4">
                    <div class="row justify-content">
                        <div class="row col-lg-12 col-md-4 border-bottom">
                            <div class="col">
                            <h2 class="">Tambah Data Jemaat Perminggu</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 p-3 bg-white shadow rounded">

    {{-- TODO: Controller not ready yet --}}
    <form class="mt-3" action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
        <div class="form-group col-12 col-md-6 mt-3">
                <label for="keterangan">Keterangan <strong style=" font-size: 9px;">*klik untuk memilih keterangan</strong></label>
                <select name="keterangan" class="form-select" id="keterangan" required>
                  <option type="drop-down" disabled selected>Pilih Keterangan </option> 
                    <option value="Sekolah Minggu">Sekolah Minggu</option>                            
                    <option value="Minggu Sesi I">Minggu Sesi I</option>
                    <option value="Minggu Sesi II">Minggu Sesi II</option>
                    <option value="Sermon Jemaat">Sermon Jemaat</option>
                    <option value="Ina Kamis">Ina Kamis</option>
                    <option value="Partangiangan Sektor">Partangiangan Sektor</option>
                    <option value="Ina Ester">Ina Ester</option>
                    <option value="PP-Remaja">PP-Remaja</option>
                    <option value="Ama Samuel">Ama Samuel</option>
                    <option value="Gemende Koor Siloam">Gemende Koor Siloam</option>
                     </select>
                     @error('keterangan')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="tanggal_statis">Tgl/Bln/Thn</label>
                {{-- TODO: Make date format 'YYYY-MM-DD' --}}
                <input type="date" name="tanggal_statis" id="tanggal_statis" class="form-control" required>
                @error('tanggal_statis')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="jumlah_hadir">Jumlah(Halak)</label>
                <input type="number" name="jumlah_hadir" id="jumlah_hadir" class="form-control" required>
                @error('jumlah_hadir')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>
            <div class="col-12 col-md-6 mt-4">
                <button type="submit" class="btn btn-success">
                   Simpan
                </button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                            <a href="{{ route('tatausaha.jemaatperminggu') }}" class="btn btn-primary">
                             <span>Kembali</span>
                                 </a>
                            </div>
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