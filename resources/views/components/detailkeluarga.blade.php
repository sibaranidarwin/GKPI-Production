<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<div class="col-12 bg-white shadow-sm p-3">
    <div class="row">
        <div class="col-md-7 col-12">
            <h3 class="fs-3 fw-bold">Detail</h3>
            <div class="table-responsive col-md-11 col-12">
                <table class="mt-4 table">
                    <tr>
                        <td>Nomor Kartu Keluarga</td>
                        <td>{{ $keluarga['no_kk'] }}</td>
                    </tr>
                    <tr>
                        <td>Nama Keluarga</td>
                        <td>{{ $keluarga['nama_keluarga'] }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>{{ $keluarga['alamat'] }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Nikah</td>
                        <td>{{ $keluarga['tanggal_nikah'] }}</td>
                    </tr>
                    <tr>
                        <td>Nomor Handphone</td>
                        <td>{{ $keluarga['no_telepon'] }}</td>
                    </tr>
                    <tr>
                        <td>Status Anggota</td>
                        <td>{{ $keluarga['status'] }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-md-5 col-12">
            <h3 class="fs-3 fw-bold">Lampiran</h3>
            <table class="table">
                @foreach ($lampiran as $l)
                    <tr>
                        <td><a target="_BLANK"
                                href="{{ $l }}">{{ explode('/', $l)[count(explode('/', $l)) - 1] }}</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class="col-12 mt-5">
        <div class="d-flex flex-column flex-md-row">
            <h3 class="fs-3 fw-bold">Anggota Keluarga</h3>
            <a href="/pendeta/data/jemaat/add/{{ $keluarga['no_kk'] }}" class="btn btn-success ms-auto">
                <i class="fa fa-plus"></i>
                <span>Tambah Anggota Keluarga</span>
            </a>
        </div>
        <div class="table-responsive mt-4">
            <table class="table">
                <thead>
                    <th style="width: 130px;">Nomor Induk Kependudukan</th>
                    <th style="min-width: 140px;">Nama</th>
                    <th class="col">Jenis Kelamin</th>
                    <th class="col">Tempat Lahir</th>
                    <th class="col">Tanggal Lahir</th>
                    <th class="col">Posisi</th>
                    <th class="col">Sektor</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @foreach ($jemaats as $jemaat)
                        <tr>
                            <td>{{ $jemaat->nik }}</td>
                            <td>{{ $jemaat->name }}</a></td>
                            <td>{{ $jemaat->jenis_kelamin }}</td>
                            <td>{{ $jemaat->tempat_lahir }}</td>
                            <td>{{ $jemaat->tanggal_lahir }}</td>
                            <td>{{ $jemaat->status }}</td>
                            <td>{{ $jemaat->sektor_name }}</td>
                            <td>
                            <a href="/pendeta/data/jemaat/{{ $jemaat->nik }}" class="btn btn-secondary">
                            <i class="fa fa-eye"></i>    
                            <a href="/pendeta/data/jemaat/edit/{{ $jemaat->nik }}" data-toggle="tooltip" data-placement="bottom" title="Edit Data Jemaat" 
                                            class="btn btn-warning"><i class="fa fa-edit"></i></a>    
                            </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('sweetalert::alert')