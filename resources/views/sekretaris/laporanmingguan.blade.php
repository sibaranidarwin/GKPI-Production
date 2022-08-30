<?php
$navbars = StaticVariable::$navbarSekretaris;
?>
@extends('layouts.home3')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Login')
@section('page_name', 'Laporan Mingguan')
@section('navbar_content')

@endsection
@section('content')
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" /> 
<div class="col-12 shadow-sm rounded mt-0 bg-white p-0">
    @foreach ($namalaporan as $laporan)
        <h2 style="text-align:center; margin-bottom: 30px"><b>{{ $laporan -> nama_laporan }}</b></h2>
    <div class="row">
        <div class="col-2 mt-0">

        </div>
        <div class="col-8 mt-0">   
                <table class="table" style="margin-bottom: 80px" >
                    <thead>
                        <tr>
                            <th scope="col">Kategori Keuangan</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col" style="text-align:right">Jumlah</th>                       
                        </tr>   
                    </thead>
                        
                    <tbody style="border-left: solid 1px;border-right: solid 1px">
                            <tr>
                                <td><b>Pemasukan</b></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr> 
                                @foreach($laporanpemasukan as $masuk)                
                            <tr>
                                <tr>
                                    <td>{{$masuk -> kategori}}</td>
                                    <td>{{$masuk -> keterangan}}</td>
                                    <td><?php
                                $tanggal =$masuk -> tanggal; 
                                $date = DateTime::createFromFormat('Y-m-d', $tanggal);
                                $format = $date->format('d-m-Y');
                                echo $format;?></td>
                                    <td style="text-align:right"><?php 
                                    $angka =$masuk -> nominal;
                                    echo "Rp." . number_format( $angka , 0, ",", ".");?></td>
                                </tr>
                                @endforeach
                                <tr  style="border-bottom: solid 1px;">
                                <th></th>
                                <th></th>
                                    <th scope="col">Total Pemasukan</th>
                                    @foreach ($totalpemasukan as $jumlah)
                                    <th scope="col" style="text-align:right"><?php 
                                    $angka =$jumlah -> total;
                                    echo "Rp." . number_format( $angka , 0, ",", ".");?> 
                                    </th> 
                                    @endforeach 
                                    
                                </tr>
                                <tr>
                                <td><b>Pengeluaran</b></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr> 
                                @foreach($laporanpengeluaran as $keluar)                
                            <tr>
                                <tr>
                                    <td>{{$keluar -> kategori}}</td>
                                    <td>{{$keluar -> keterangan}}</td>
                                    <td><?php
                                $tanggal =$keluar -> tanggal; 
                                $date = DateTime::createFromFormat('Y-m-d', $tanggal);
                                $format = $date->format('d-m-Y');
                                echo $format;?></td>
                                    <td style="text-align:right"><?php 
                                    $angka =$keluar -> nominal;
                                    echo "Rp." . number_format( $angka , 0, ",", ".");?></td>
                                </tr>
                                @endforeach
                                <tr style="border-bottom: solid 1px;">
                                <th></th>
                                <th></th>
                                <th scope="col">Total Pengeluaran</th>
                                @foreach ($totalpengeluaran as $jumlah)
                                <th scope="col" style="text-align:right"><?php 
                                $angka =$jumlah -> total;
                                echo "Rp." . number_format( $angka , 0, ",", ".");
                                ?> </th>  
                                @endforeach   
                            </tr> 
                            <tr style="border-bottom: solid 1px">
                            <td></td>
                            <td></td>
                                <td><b>Saldo Awal</b></td>
                                <td style="text-align:right"><b><?php 
                                $angka =$laporan->saldo_sebelum;
                                echo "Rp." . number_format( $angka , 0, ",", ".");
                                ?></b></td>
                            </tr>             
                <tr style="border-bottom: solid 1px;">
                        <th></th>
                        <th></th>
                        <th scope="col">Saldo Akhir</th>
                    @foreach( $totalpemasukan as $pemasukan)
                        <th scope="col" style="text-align:right">
                            @foreach ($totalpengeluaran as $pengeluaran)
                        <?php
                        $angka1 = $laporan->saldo_sebelum; 
                         $angka2 = $pemasukan -> total;
                         $angka3 = $pengeluaran -> total;
                        $angka4 = $angka1+$angka2 - $angka3;
                        echo "Rp." . number_format( $angka4 , 0, ",", ".");
                        ?>
                            @endforeach
                        </th> 
                     @endforeach

                     
                </tbody>
                <div class="col-2 d-flex">
                    <a href="/sekretaris/data/keuangan/laporan/download-laporan-mingguanm/{{$laporan->tanggal_awal}}/{{$laporan->tanggal_akhir}}/{{$laporan->id}}')"  class="btn btn-success p-2 ms-auto">
                    <i class="fa fa-print" aria-hidden="true"></i>
                        <span>Download</span>
                    </a>
                </div>
                </table>
                </div>
                @endforeach
        </div>
        </div>
</div>
@endsection