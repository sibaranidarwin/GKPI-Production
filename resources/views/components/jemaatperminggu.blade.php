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
                            <h2 class="text"> Statistik Jemaat Perminggu</h2>
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
                            <th scope="col">Tgl/Bln/Thn</th>
                            <th scope="col">Jumlah(Halak)</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Pilihan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($statistik_jemaats as $statistik_jemaat)
                        <tr>
                                <td>{{ Carbon\Carbon::parse($statistik_jemaat->tanggal_statis)->format('d F Y') }}</a></td>
                                <td>{{ $statistik_jemaat['jumlah_hadir'] }}</td>
                                <td>{{ $statistik_jemaat['keterangan'] }}</a></td>
                                <td>
                                    <div class="d-flex gap-3 flex-column flex-md-row">
                                    <a href="/tatausaha/editdatajemaatperminggu/{{ $statistik_jemaat['id'] }}" data-toggle="tooltip" data-placement="bottom" title="Edit Data Jemaat Perminggu" 
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