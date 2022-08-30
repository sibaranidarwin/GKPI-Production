<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.css"/>


<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<div class="row">
            <div class="col-md">
                <div class="header-body text-left mt-3 mb-4">
                    <div class="row justify-content">
                        <div class="row col-lg-12 col-md-4 border-bottom">
                            <div class="col-10">
                            <h2 class="text"> Daftar Akun Pelayan Gereja</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<div class="col-12 p-3">
<div class="col-12 shadow-sm rounded bg-white p-3">
      
            <div class="table-responsive-sm">
                <table class="table table-bordered" id="list">
                    <thead>
                        <tr>
                            <th scope="col">Nomor Induk Kependudukan</th>
                            <th scope="col">Nama Pelayan</th>
                            <th scope="col">Profile</th>
                            <th scope="col">Peran</th>
                            <th scope="col">Tanggal Terima Jabatan</th>
                            <th scope="col">Tanggal Akhir Jabatan</th>
                            <th scope="col">Pilihan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelayanas as $pelayan)
                            <tr>
                                <td>{{ $pelayan['nik'] }}</td>
                                <td>{{ $pelayan['nama'] }}</td>
                                <td class="col-1"><img style="width: 30%;" src="{{ asset(StaticVariable::$user->profile) }}" alt=""></td>
                                <td>{{ $pelayan['peran'] }}</a></td>
                                <td class="col-1">{{ $pelayan['tanggal_terima_jabatan'] }}</td>
                                <td class="col-1">{{ $pelayan['tanggal_akhir_jabatan'] }}</td>
                                <td>
                                    <div class="d-flex gap-3 flex-column flex-md-row">
                                    <a href="/tatausaha/editdatapelayan/{{ $pelayan['nik'] }}" data-toggle="tooltip" data-placement="bottom" title="Edit Data Pelayan" 
                                            class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@include('sweetalert::alert')
<script>
        $(document).ready(function() {
            $('#list').DataTable({
                "order": [
                    [1, "desc"]
                ],
                "language": {
                    "lengthMenu": "Tampilkan _MENU_ Data pelayan per halaman",
                    "zeroRecords": "Maaf, tidak dapat menemukan apapun",
                    "info": "Menampilkan halaman _PAGE_ dari _PAGES_ halaman",
                    "infoEmpty": "Tidak ada pelayan yang dapat ditampilkan",
                    "infoFiltered": "(dari _MAX_ total pelayan)",
                    "search": "Cari :",
                    "paginate": {
                        "first": "Pertama",
                        "last": "Terakhir",
                        "next": "",
                        "previous": ""
                    },
                }
            });
        });
    </script>