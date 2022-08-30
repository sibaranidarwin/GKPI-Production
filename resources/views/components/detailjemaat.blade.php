<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<div class="col-12 bg-white p-3">
    <div class="row">
    <div class="col-md-7 col-12">
            <h3 class="fs-3 fw-bold">Data Lengkap Anggota Jemaat</h3>
            <div class="table col-md-11 col-12">
                <table class="mt-4 table-bordered">
                    <tr>
                        <td>No NIK</td>
                        <td>{{ $jemaat['nik'] }}</td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>{{ $jemaat['name'] }}</td>
                    </tr>
                    <tr>
                        <td>Tempat Lahir</td>
                        <td>{{ $jemaat['tempat_lahir'] }}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>{{ $jemaat['jenis_kelamin'] }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>{{ $jemaat['alamat'] }}</td>
                    </tr>
                    <tr>
                        <td>Status Pernikahan</td>
                        <td>{{ $jemaat['status_pernikahan'] }}</td>
                    </tr>
                     <tr>
                        <td>Tanggal Baptis</td>
                        <td>{{ $jemaat['tanggal_baptis'] }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Sidi</td>
                        <td>{{ $jemaat['tanggal_sidih'] }}</td>
                    </tr>
                    <tr>
                        <td>Sektor</td>
                        <td>{{  $jemaat['sektor']->nama }}</td>
                    </tr>
                      <tr>
                        <td>Status</td>
                        <td>{{ $jemaat['status'] }}</td>
                    </tr>
                    @foreach ($lampiran as $l)
                    <tr>
                        <td>Lampiran</td>
                        <td> <a href="{{ $l }}">{{ explode("/", $l)[count(explode("/", $l)) - 1] }}</a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>