<?php
$navbars = StaticVariable::$navbarBendahara;
?>
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.css"/>

@extends('layouts.home2')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Pelean ')
@section('page_name', 'Pelean ')
@section('navbar_content')

@endsection
@section('content')
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.css"/>
<style type="text/css">
    .my-custom-scrollbar {
position: relative;
height: 500px;
overflow: auto;
}
.table-wrapper-scroll-y {
display: block;
}
</style>  
    <div class="col-12 shadow-sm rounded mt-3 bg-white p-3">
        @if($massages = Session::get('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{$massages}}
          </div>
        @endif
       

        <div class="col-12 mt-3">
            <div class="table-responsive-sm table-wrapper-scroll-y my-custom-scrollbar">
            <table class="table table-bordered mb-0" id="list">
                    <thead>
                        <tr>
                            <th scope="col">Tanggal Ibadah</th>
                            <th scope="col">Jenis Ibadah</th>
                            <th scope="col">Jumlah Orang</th>
                            <th scope="col">Dana untuk Jemaat A</th>
                            <th scope="col">Dana untuk Pembangunan B</th>
                            <th scope="col">Dana untuk Lintas C</th>
                            <th scope="col">Pilihan</th>
                            <!-- <th scope="col">Lampiran</th> -->
                        </tr>
                    </thead>
                    <tbody name="data" id="data">
                    @php
                        $no = 1;
                    @endphp
                        @foreach ($pelean_kategorial as $pelean_kategorial)
                        <form action=""></form>
                            <tr>
                            <td>{{ $pelean_kategorial -> tanggal_kate}}</td>
                                <td>{{ $pelean_kategorial -> keterangan}}</td>
                                <td>{{ $pelean_kategorial -> jumlah_halak}}</td>
                                <td align="right">   <?php
                             echo "Rp." . number_format($pelean_kategorial ['jemaat_a'], 2, ",", ".");
                            ?>
                         </td>
                                <td align="right">   <?php
                             echo "Rp." . number_format($pelean_kategorial ['pembangunan_b'], 2, ",", ".");
                            ?>
                         </td>
                                <td align="right">   <?php
                             echo "Rp." . number_format($pelean_kategorial ['lintas_c'], 2, ",", ".");
                            ?>
                         </td>
                                <td>
                                    <div class="d-flex gap-3 flex-column flex-md-row">
                                        <a data-toggle="tooltip" data-placement="bottom" title="Edit " href="/bendahara/data/peleankategorial/edit/{{ $pelean_kategorial->id }}"
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
@endsection
<script>
        $(document).ready(function() {
            $('#list').DataTable({
                "order": [
                    [1, "desc"]
                ],
                "language": {
                    "lengthMenu": "Tampilkan _MENU_ Data Pelean Kategorial per halaman",
                    "zeroRecords": "Maaf, tidak dapat menemukan apapun",
                    "info": "Menampilkan halaman _PAGE_ dari _PAGES_ halaman",
                    "infoEmpty": "Tidak ada keuangan yang dapat ditampilkan",
                    "infoFiltered": "(dari _MAX_ total Keuangan)",
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