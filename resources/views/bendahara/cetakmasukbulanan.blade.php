
@extends('layouts.home7')

@section('style', asset('css/style/pendeta.css'))

@section('content')
    <link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" /> 
@foreach ($namalaporan as $laporan)
        <h2 style="text-align:center ; margin-bottom: 30px"><b>{{ $laporan -> nama_laporan }}</b></h2>
<div class="col-12 shadow-sm rounded mt-0 bg-white p-0">
    <div class="row">
        <div class="col-2 mt-0">
        </div>
        <div class="col-7 mt-0">   
                <table class="table" style="margin-bottom: 50px" >
                    <thead>
                        <tr>
                            <th scope="col">Kategori Keuangan</th>
                            <th scope="col" style=" ">Volume(Kali)</th>  
                            <th scope="col" style="text-align:right">Jumlah</th> 
                                                
                        </tr>   
                    </thead>
                        
                    <tbody style="border-left: solid 1px;border-right: solid 1px">
                    
                            <tr>
                                <td><b>Pemasukan</b></td>
                            <td></td>
                        <td></td></tr>                 
                            <tr>                              
                                
                                @foreach ($laporanbulanan1 as $laporan1)
                                <td>Persembahan</td>
                                @foreach ($totalkategori1 as $kategori1)
                                <td style=" margin-right: 20px" >{{ $kategori1->total }}</td>                             
                                @endforeach 
                                <td style="text-align:right"><?php 
                                    $angka =$laporan1 -> total;
                                    echo "Rp." . number_format( $angka , 0, ",", ".");?>
                                </td>                             
                                @endforeach
                                
                            </tr>           
                            <tr>                              
                                @foreach ($laporanbulanan2 as $laporan2)
                                <td>Bakti Bulanan dan Pembangunan</td>
                                @foreach ($totalkategori2 as $kategori2)
                                <td style=" ">{{ $kategori2->total }}</td>                             
                                @endforeach  
                                <td style="text-align:right"><?php 
                                    $angka =$laporan2 -> total;
                                    echo "Rp." . number_format( $angka , 0, ",", ".");?>
                                    </td> 
                                @endforeach
                                                            
                            </tr>
                            <tr>                                                           
                                @foreach ($laporanbulanan3 as $laporan3)
                                <td>Administrasi</td>
                                @foreach ($totalkategori3 as $kategori3)
                                <td style=" ">{{ $kategori3->total }}</td>                             
                                @endforeach  
                                <td style="text-align:right"><?php 
                                    $angka =$laporan3 -> total;
                                    echo "Rp." . number_format( $angka , 0, ",", ".");?>
                                    </td>
                                @endforeach
                                                             
                            </tr>
                            <tr>                              
                                @foreach ($laporanbulanan4 as $laporan4)
                                <td>Ucapan Syukur</td>
                                @foreach ($totalkategori4 as $kategori4)
                                <td style=" ">{{ $kategori4->total }}</td>                             
                                @endforeach   
                                <td style="text-align:right"><?php 
                                    $angka =$laporan4 -> total;
                                    echo "Rp." . number_format( $angka , 0, ",", ".");?>
                                    </td>  
                                    @endforeach 
                                                             
                            </tr>
                            <tr>                                                     
                                @foreach ($laporanbulanan5 as $laporan5)
                                <td>Penggalangan Dana</td>
                                @foreach ($totalkategori5 as $kategori5)
                                <td style=" ">{{ $kategori5->total }}</td>                             
                                @endforeach 
                                <td style="text-align:right"><?php 
                                    $angka =$laporan5 -> total;
                                    echo "Rp." . number_format( $angka , 0, ",", ".");?>
                                </td>
                                @endforeach
                                                              
                            </tr>
                     
                            <tr>                                                       
                                @foreach ($laporanbulanan6 as $laporan6)
                                <td>Penggalangan Dana Eksternal</td>
                                @foreach ($totalkategori6 as $kategori6)
                                <td style=" ">{{ $kategori6->total }}</td>                             
                                @endforeach
                                <td style="text-align:right"><?php 
                                    $angka =$laporan6 -> total;
                                    echo "Rp." . number_format( $angka , 0, ",", ".");?>
                                </td> 
                                @endforeach 
                                                            
                            </tr>
                            <tr>                                                       
                                @foreach ($laporanbulanan7 as $laporan7)
                                <td>Penggalangan Dana Eksternal</td>
                                @foreach ($totalkategori7 as $kategori7)
                                <td style=" ">{{ $kategori7->total }}</td>                             
                                @endforeach
                                <td style="text-align:right"><?php 
                                    $angka =$laporan7 -> total;
                                    echo "Rp." . number_format( $angka , 0, ",", ".");?>
                                </td> 
                                @endforeach 
                                                            
                            </tr>
                     
                     <tr  style="border-bottom: solid 1px;">
                     <th></th>
                        <th scope="col" >Total Pemasukan</th>
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
                        <td></td></tr>                 
                            <tr> 
                            <tr>                                                   
                                @foreach ($laporanbulanan8 as $laporan8)
                                <td>Biaya Pelayanan Rutin</td>
                                @foreach ($totalkategori8 as $kategori8)
                                <td style=" ">{{ $kategori8->total }}</td>                             
                                @endforeach  
                                <td style="text-align:right"><?php $angka = $laporan7 -> total;
                                    echo "Rp." . number_format( $angka , 0, ",", ".");?>
                                    </td>
                                    @endforeach  
                                                               
                            </tr>
                    
                            <tr>                              
                                @foreach ($laporanbulanan9 as $laporan9)
                                <td>Operasional Gereja</td>
                                @foreach ($totalkategori9 as $kategori9)
                                <td style=" ">{{ $kategori9->total }}</td>                             
                                @endforeach   
                                <td style="text-align:right"><?php $angka = $laporan9 -> total;
                                    echo "Rp." . number_format( $angka , 0, ",", ".");?>
                                    </td>
                                @endforeach
                                                            
                            </tr>
                    
                            <tr>                              
                                @foreach ($laporanbulanan10 as $laporan10)
                                <td>Tahun Gerejawi dan Ulang Tahun Gereja</td>
                                @foreach ($totalkategori10 as $kategori10)
                                <td style=" ">{{ $kategori10->total }}</td>                             
                                @endforeach 
                                <td style="text-align:right"><?php 
                                    $angka = $laporan10 -> total;
                                    echo "Rp." . number_format( $angka , 0, ",", ".");?>
                                    </td> 
                                @endforeach   
                                                          
                            </tr>
                    
                            <tr>                              
                                @foreach ($laporanbulanan11 as $laporan11)
                                <td>Pembangunan</td>
                                @foreach ($totalkategori11 as $kategori11)
                                <td style=" ">{{ $kategori11->total }}</td>                             
                                @endforeach  
                                <td style="text-align:right"><?php 
                                    $angka = $laporan11 -> total;
                                    echo "Rp." . number_format( $angka , 0, ",", ".");?>
                                    </td>
                                @endforeach    
                                                         
                            </tr>
                    
                            <tr>                              
                                @foreach ($laporanbulanan12 as $laporan12)
                                <td>Penggalangan Dana</td>
                                @foreach ($totalkategori12 as $kategori12)
                                <td style=" ">{{ $kategori12->total }}</td>                             
                                @endforeach
                                <td style="text-align:right"><?php 
                                    $angka = $laporan12 -> total;
                                    echo "Rp." . number_format( $angka , 0, ",", ".");?>
                                </td>
                                @endforeach  
                                                             
                            </tr>
                    
                            <tr>                              
                                @foreach ($laporanbulanan13 as $laporan13)
                                <td>Diakonia</td>
                                @foreach ($totalkategori13 as $kategori13)
                                <td style=" ">{{ $kategori13->total }}</td>                             
                                @endforeach  
                                <td style="text-align:right"><?php 
                                    $angka = $laporan13 -> total;
                                    echo "Rp." . number_format( $angka , 0, ",", ".");?>
                                </td>
                                @endforeach    
                                                         
                            </tr>          
                    
                            <tr>                              
                                @foreach ($laporanbulanan14 as $laporan14)
                                <td>Pendidikan</td>
                                @foreach ($totalkategori14 as $kategori14)
                                <td style=" ">{{ $kategori14->total }}</td>                             
                                @endforeach 
                                <td style="text-align:right"><?php 
                                    $angka = $laporan14 -> total;
                                    echo "Rp." . number_format( $angka , 0, ",", ".");?>
                                </td>
                                @endforeach       
                                                       
                            </tr>
                    
                            <tr>                              
                                @foreach ($laporanbulanan15 as $laporan15)
                                <td>Seksi Nyanyian dan Koor</td>
                                @foreach ($totalkategori15 as $kategori15)
                                <td style=" ">{{ $kategori15->total }}</td>                             
                                @endforeach  
                                <td style="text-align:right"><?php 
                                    $angka = $laporan15 -> total;
                                    echo "Rp." . number_format( $angka , 0, ",", ".");?>
                                </td>
                                @endforeach     
                                                        
                            </tr>
                    
                            <tr>                              
                                @foreach ($laporanbulanan16 as $laporan16)
                                <td>Pembinaan Kategorial</td>
                                @foreach ($totalkategori16 as $kategori16)
                                <td style=" ">{{ $kategori16->total }}</td>                             
                                @endforeach 
                                <td style="text-align:right"><?php 
                                    $angka = $laporan16 -> total;
                                    echo "Rp." . number_format( $angka , 0, ",", ".");?>
                                </td>
                                @endforeach     
                                                        
                            </tr>
                     
                            <tr>                              
                                @foreach ($laporanbulanan17 as $laporan17)
                                <td>Biaya Natal dan Akhir Tahun</td>
                                @foreach ($totalkategori17 as $kategori17)
                                <td style=" ">{{ $kategori17->total }}</td>                             
                                @endforeach  
                                <td style="text-align:right"><?php 
                                    $angka = $laporan17 -> total;
                                    echo "Rp." . number_format( $angka , 0, ",", ".");?>
                                </td>
                                @endforeach     
                                                        
                            </tr>
        
                            <tr>                              
                                @foreach ($laporanbulanan18 as $laporan18)
                                <td>Pihak Lain</td>
                                @foreach ($totalkategori18 as $kategori18)
                                <td style=" ">{{ $kategori18->total }}</td>                             
                                @endforeach  
                                <td style="text-align:right"><?php 
                                    $angka = $laporan18 -> total;
                                    echo "Rp." . number_format( $angka , 0, ",", ".");?>
                                </td>
                                @endforeach     
                                                       
                            </tr>
                    
                            <tr>                              
                                @foreach ($laporanbulanan19 as $laporan19)
                                <td>Hari Besar Gereja</td>
                                @foreach ($totalkategori19 as $kategori19)
                                <td style=" ">{{ $kategori19->total }}</td>                             
                                @endforeach  
                                <td style="text-align:right"><?php 
                                    $angka = $laporan19 -> total;
                                    echo "Rp." . number_format( $angka , 0, ",", ".");?>
                                </td>
                                @endforeach      
                                                       
                            </tr>
                    
                            <tr>                              
                                @foreach ($laporanbulanan20 as $laporan20)
                                <td>Pembangunan Jangka Panjang</td>
                                @foreach ($totalkategori20 as $kategori20)
                                <td style=" ">{{ $kategori20->total }}</td>                             
                                @endforeach 
                                <td style="text-align:right"><?php 
                                    $angka = $laporan20 -> total;
                                    echo "Rp." . number_format( $angka , 0, ",", ".");?>
                                </td>
                                @endforeach       
                                                       
                            </tr>
                   
                    <tr style="border-bottom: solid 1px;">
                        <th></th>
                        <th scope="col">Total Pengeluaran</th>
                        @foreach ($totalpengeluaran as $jumlah)
                        <th scope="col" style="text-align:right"><?php 
                        $angka =$jumlah -> total;
                        echo "Rp." . number_format( $angka , 0, ",", ".");
                        ?> </th>  
                        @endforeach   
                    </tr> 
                   
                    </tr>
                    <tr style="border-bottom: solid 1px">
                    <th></th>
                                <td><b>Saldo Awal</b></td>
                                <td style="text-align:right"><b><?php 
                                $angka =$laporan->saldo_sebelum;
                                echo "Rp." . number_format( $angka , 0, ",", ".");
                                ?></b></td>
                            </tr>             
                <tr style="border-bottom: solid 1px;">
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
                   
                    @endforeach
                    </tbody>
                </table>
                </div>
        </div>
        
        </div>
</div>
    <script type="text/javascript">
        window.print();
    </script>
@endsection