<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.js"></script>
@extends('FE.template.header')
@section('title', 'Data Gereja')

@section('content')
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet"/>
<link rel="stylesheet" href="{{ asset('/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('/css/footer.css') }}">

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

        <div class="col-12 mt-1">
        <div class="row">
            <div class="col-md">
                <div class="header-body text-left mt-0 mb-4">
                    <div class="row justify-content">
                        <div class="row col-lg-12 col-md-4">
                            <div class="col-12">
                            <h2 style="text-align: center;" class="tex border-bottom">Data Keuangan Gereja Seluruhnya</h2>
                            <br>
                            </div>
                            <div class="col-3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h3>Dana Pemasukan Gereja</h3>
               <table class="table table-bordered mb-0" id="list">
                    <thead>
                        <tr>
                            <!-- <th scope="col">Pilihan</th> -->
                            <th scope="col">#</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Nominal</th>
                            <!-- <th scope="col">Lampiran</th> -->
                        </tr>
                    </thead>
                    <tbody>
                    @php
                        $no = 1;
                    @endphp
                        @foreach ($danapemasukan as $keuangan)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td class="col-5">{{ $keuangan -> keterangan}}</td>
                                <td>{{ $keuangan -> tanggal}}</td>
                                <td style="text-align: right;">
                                      <?php 
                                    echo "Rp." . number_format( $keuangan -> nominal , 2, ",", ".");
                                    ?></td>
                                <!-- <td>{{ $keuangan -> lampiran}}</td> -->
                            </tr>
                        @endforeach
                              <tr>
                            <td></td>
                            <td></td>
                             <td class="col-1"><b>Total Pemasukan Seluruhnya</b></td>
                              <td style="text-align: right;">
                    @foreach ($totalpemasukan as $jumlah)
                    <?php 
                        $angka =$jumlah -> total;
                        echo "Rp." . number_format( $angka , 2, ",", ".");
                        ?> 
                    @endforeach   
                            </td>
                             </tr>
                    </tbody>
                </table>
                <h3 class="mt-3">Dana Pengeluaran Gereja</h3>
                <table class="table table-bordered mb-0" id="list">
                    <thead>
                        <tr>
                            <!-- <th scope="col">Pilihan</th> -->
                            <th scope="col">#</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Nominal</th>
                            
                            <!-- <th scope="col">Lampiran</th> -->
                        </tr>
                    </thead>
                    <tbody>
                    @php
                        $no = 1;
                    @endphp
                        @foreach ($danapengeluaran as $keuangan)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td class="col-5">{{ $keuangan -> keterangan}}</td>
                                <td >{{ $keuangan -> tanggal}}</td>
                                <td style="text-align: right;">
                                     <?php 
                                    echo "Rp." . number_format( $keuangan -> nominal , 2, ",", ".");
                                    ?></td>
                                <!-- <td>{{ $keuangan -> lampiran}}</td> -->
                            </tr>
                            <tr>
                            <td></td>
                            <td></td>
                             <td class="col-1"><b>Total Pengeluaran Seluruhnya</b></td>
                             <td style="text-align: right;">
                    @foreach ($totalpengeluaran as $jumlah)
                    <?php 
                        $angka =$jumlah -> total;
                        echo "Rp." . number_format( $angka , 2, ",", ".");
                        ?> 
                    @endforeach   
                            </td>
                             </tr>
                        @endforeach
                        </tr>
                            <tr>
                            <td></td>
                            <td></td>
                             <td class="col-1"><b>Total Dana Keseluruhan (Dana Pemasukan - Dana Pengeluaran)</b></td>
                            @foreach( $totalpemasukan as $pemasukan)
                        <td scope="col" style="text-align:right">
                            @foreach ($totalpengeluaran as $pengeluaran)
                        <?php
                         $angka2 = $pemasukan -> total;
                         $angka3 = $pengeluaran -> total;
                        $angka4 = $angka2 - $angka3;
                        echo "Rp." . number_format( $angka4 , 2, ",", ".");
                        ?>
                            @endforeach
                        </td> 
                     @endforeach
                             </tr>
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</div>
@endsection