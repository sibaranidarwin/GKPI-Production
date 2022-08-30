@extends('FE.template.header')
@section('title', 'Data Gereja')

@section('content')
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet"/>
<link rel="stylesheet" href="{{ asset('/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('/css/footer.css') }}">

<div class="col-12 bg-white p-3">       
    <div class="row">
    <div class="col-md-12 col-12">
            <h6 class="fs-5 fw-bold">I. Acara Kebaktian (Partonding Ni Parmingguon)</h6>
            <div class="table-responsive col-md-12 col-12">
                <table id="table-datatables" class="mt-4 table-center">
                @foreach ($acara_ibadah as $ibadas)
                <thead>
                    <tr>                                  
                    <th class="col-1">No</th>
                    <th class="col-4">Tertib Acara : {{ $ibadas['nama'] }}</th>
                    <th class="col-3">No.KJ/BE/PKJ/Ayat</th>  
                    </tr>                  
                </thead>
                <tbody>
                @php
                        $no = 1;
                    @endphp
                    <tr>
                    <td>{{ $no++ }}</td>
                        <td>Nyanyian *)</td>
                        <td>{{ $ibadas['nyanyi'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                        <td>VOTUM INTROITUS</td>
                        <td>{{ $ibadas['votum'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                        <td>Nyanyian</td>
                        <td>{{ $ibadas['nyanyi_2'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                        <td>EPISTEL :</td>
                        <td>{{ $ibadas['epistel'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                        <td>Nyanyian *)</td>
                        <td>{{ $ibadas['nyanyi_3'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                        <td>Pengakuan Dosa / Janji Pengampunan </td>
                        <td>{{ $ibadas['dosa'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                        <td>Nyanyian</td>
                        <td>{{ $ibadas['nyanyi_4'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                        <td>PETUNJUK HIDUP BARU </td>
                        <td>{{ $ibadas['petunjuk'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                        <td>KOOR </td>
                        <td>{{ $ibadas['koor'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                        <td>Nyanyian* </td>
                        <td>{{ $ibadas['nyanyi_5'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                        <td>Pengakuan Iman Rasuli</td>
                        <td>{{ $ibadas['pengakuan'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                        <td>Warta Jemaat/Doa Syafaat </td>
                        <td>{{ $ibadas['warta'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                        <td>Nyanyian</td>
                        <td>{{ $ibadas['nyanyi_6'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                        <td>KHOTBAH</td>
                        <td>{{ $ibadas['khotbah'] }}</td>
                    </tr>
                  
                    <tr>
                    <td>{{ $no++ }}</td>
                        <td>Nyanyian</td>
                        <td>{{ $ibadas['nyanyi_7'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                        <td>Nats Pesembahan</td>
                        <td>{{ $ibadas['nats'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                        <td>Persembahan - Doa Persembahan</td>
                        <td>{{ $ibadas['persembahan'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                        <td>Nyanyian Persembahan</td>
                        <td>{{ $ibadas['nyanyi_8'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                        <td>Doa Penutup/Doxologi/Berkat</td>
                        <td>{{ $ibadas['penutup'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                        <td>Amin</td>
                        <td>{{ $ibadas['amin'] }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                
                <h3 class="fs-5 fw-bold mt-3">Petugas Minggu(Namarhobas) </h3>
                <table id="table-datatables" class="mt-4 table-center">
                @foreach ($jadwal_ibadah as $jadwas)
                <thead class="mt-3">
                    <tr>                                            
                    <th class="col-1">No</th>
                    <th class="col-2">Pelayan</th>
                    <th class="col-3">{{ $jadwas['name'] }}</th>  
                    </tr>                  
                </thead>
                <tbody>
                     @php
                        $no = 1;
                    @endphp
                    <tr>
                    <td>{{ $no++ }}</td>
                    <td>Parjamita</td>
                        <td>{{ $jadwas['pengkhotbah'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                    <td>Paragenda</td>
                        <td>{{ $jadwas['liturgis'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                    <td>Tinting/Tangiang</td>
                        <td>{{ $jadwas['warta'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                    <td>Song Leader's</td>
                        <td>{{ $jadwas['song_lead'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                    <td>Organis</td>
                        <td>{{ $jadwas['organis'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                    <td>Papungu Pelean</td>
                        <td>{{ $jadwas['pengumpul'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                    <td>Petugas Protokol Kesehatan</td>
                        <td>{{ $jadwas['protokol'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                    <td>Operator LCD</td>
                        <td>{{ $jadwas['operator'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
                <h5 class="fs-5 fw-bold mt-3">A. Tinting Parmingguon/Kategorial</h5>
                <table class="table table-bordered" id="list">
                    <thead>
                        <tr>
                            <th scope="col">Tgl/Bln/Thn</th>
                            <th scope="col">Jumlah(Halak)</th>
                            <th scope="col">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($statistik_jemaats as $statistik_jemaat)
                        <tr>
                                <td>{{ Carbon\Carbon::parse($statistik_jemaat->tanggal_statis)->format('d F Y') }}</a></td>
                                <td>{{ $statistik_jemaat['jumlah_hadir'] }}</td>
                                <td>{{ $statistik_jemaat['keterangan'] }}</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <h5 class="fs-5 fw-bold mt-3">Daftar Ruas Na Marulang Tahun Di Minggu Ini</h5>
                <table id="table-datatables" class="table table-bordered">
                <thead>
                    <th style="min-width: 140px;">Nama</th>
                    <th class="col-3">Tanggal Lahir</th>
                    <th class="col-3">Ultah Ke</th>
                    <th class="col-3">Sektor</th>
                    </thead>
                    <tbody>
                        @foreach ($jemaat as $jemaat)
                            <tr>
                                <td>
                                    {{ $jemaat->name }}</a>
                                </td>
                                <td>
                                    {{ Carbon\Carbon::parse($jemaat->tanggal_lahir)->format('d F Y') }}
                                </td>
                                <td>
                                <?php 
                                $tanggal_lahir = $jemaat->tanggal_lahir;
                                $lahir    =new DateTime($tanggal_lahir);
                                $today        =new DateTime('today');
                                $usia = $today->diff($lahir);
                                echo $usia->y; echo " Tahun";
                                ?>
                                </td>
                                <td>
                                    {{$jemaat['sektor']->nama}}
                                </td>
                            </tr>
                        @endforeach
                        </td>
                    </tbody>
                </table>
                <h5 class="fs-5 fw-bold mt-3">Warta Jemaat/ Tinting Na Marragam</h5>
                <table class="table table-bordered" id="list">
                    <thead>
                        <tr>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Isi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($warta_jemaat as $item)
                            <tr>
                                <td>{{ Carbon\Carbon::parse($item->tanggal)->format('d F Y') }}</td>
                                <td>{{ $item['nama'] }}</td>
                                <td>{{ $item['isi'] }}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <h5 class="fs-5 fw-bold mt-3">Parhepengon Ni Huria</h5>
                <p class="fs-9 fw-bold mt-3" ><b>1.1 Pemasukan</b></p>
                
                <table id="table-display" class="table table-bordered mb-0">        
                    <thead>
                        <tr>
                            <th colspan="10">1.1.A. Pelean Minggu</th>
                        </tr>
                        <tr>
                            <th scope="col">Tanggal Ibadah</th>
                            <th scope="col">Nama Ibadah</th>
                            <th scope="col">Jumlah Orang(Halak)</th>
                            <th scope="col">Dana Peruntukan ke Kas Jemaat(A)</th>
                            <th scope="col">Dana Peruntukan ke Kas Pembangunan(B)</th>
                             <th scope="col">Dana Peruntukan ke Kas Lintas(C)</th>
                            <!-- <th scope="col">Lampiran</th> -->
                        </tr>
                    </thead>
                    <tbody>        
                     @foreach ($pelean_minggu as $pelean)
                     <tr>
                        <td>{{ $pelean ['tanggal_ibadah']}}</td>
                        <td>{{ $pelean ['jenis_ibadah']}}</td>
                        <td>{{ $pelean ['jumlah_org']}}</td>
                        <td align="right">   <?php
                             echo "Rp." . number_format($pelean ['jemaat_a'], 2, ",", ".");
                            ?>
                         </td>
                        <td align="right"> <?php
                             echo "Rp." . number_format($pelean ['pembangunan_b'], 2, ",", ".");
                            ?>
                        </td>
                        <td align="right"><?php
                             echo "Rp." . number_format($pelean ['lintas_c'], 2, ",", ".");
                            ?>
                            </td>
                        </tr>
                     @endforeach
                    </tbody> 
                    </table>
                    
                    
                <table id="table-display" class="table table-bordered mb-0">        
                    <thead>
                        <tr>
                            <th colspan="10">1.1.B. Pelean Kategorial</th>
                        </tr>
                        <tr>
                            <th scope="col">Tanggal Ibadah</th>
                            <th scope="col">Nama Ibadah</th>
                            <th scope="col">Jumlah Orang(Halak)</th>
                            <th scope="col">Dana Peruntukan ke Kas Jemaat(A)</th>
                            <th scope="col">Dana Peruntukan ke Kas Pembangunan(B)</th>
                             <th scope="col">Dana Peruntukan ke Kas Lintas(C)</th>
                            <!-- <th scope="col">Lampiran</th> -->
                        </tr>
                    </thead>
                    <tbody>        
                     @foreach ($pelean_kategorial as $pelean)
                     <tr>
                        <td>{{ $pelean ['tanggal_kate']}}</td>
                        <td>{{ $pelean ['keterangan']}}</td>
                        <td>{{ $pelean ['jumlah_halak']}}</td>
                        <td align="right">   <?php
                             echo "Rp." . number_format($pelean ['jemaat_a'], 2, ",", ".");
                            ?>
                         </td>
                        <td align="right"> <?php
                             echo "Rp." . number_format($pelean ['pembangunan_b'], 2, ",", ".");
                            ?>
                        </td>
                        <td align="right"><?php
                             echo "Rp." . number_format($pelean ['lintas_c'], 2, ",", ".");
                            ?>
                            </td>
                        </tr>
                     @endforeach
                    </tbody> 
                    </table>
                
                
                <table id="table-display" class="table table-bordered mb-0">        
                    <thead>
                        <tr>
                            <th colspan="10">1.1.C. Pelean Lainnya</th>
                        </tr>
                        <tr>
                            <th scope="col">Tanggal Ibadah</th>
                            <th scope="col">Nama Ibadah</th>
                            <th scope="col">Jumlah Orang(Halak)</th>
                            <th scope="col">Dana Peruntukan ke Kas Jemaat(A)</th>
                            <th scope="col">Dana Peruntukan ke Kas Pembangunan(B)</th>
                             <th scope="col">Dana Peruntukan ke Kas Lintas(C)</th>
                            <!-- <th scope="col">Lampiran</th> -->
                        </tr>
                    </thead>
                    <tbody>        
                     @foreach ($pelean_lain as $pelean)
                     <tr>
                        <td>{{ $pelean ['tanggal_lain']}}</td>
                        <td>{{ $pelean ['keterangan_lain']}}</td>
                        <td>{{ $pelean ['jumlah']}}</td>
                        <td align="right">   <?php
                             echo "Rp." . number_format($pelean ['dana_jemaata'], 2, ",", ".");
                            ?>
                         </td>
                        <td align="right"> <?php
                             echo "Rp." . number_format($pelean ['dana_pembangunanb'], 2, ",", ".");
                            ?>
                        </td>
                        <td align="right"><?php
                             echo "Rp." . number_format($pelean ['dana_lintasc'], 2, ",", ".");
                            ?>
                            </td>
                            </tr>
                     @endforeach
                    </tbody> 
                    </table>
                
                
                
                
                <table id="table-display" class="table table-bordered mb-0">        
                    <thead>
                        <tr>
                            <th colspan="10">1.1.D. Bakti Bulanan dan Bakti Pembangunan Keluarga</th>
                        </tr>
                        <tr>
                            <th scope="col">Nama Keluarga</th>
                            <th scope="col">Bakti Bulan</th>
                            <th scope="col">Jumlah Bakti Bulanan</th>
                            <th scope="col">Bakti Pembangunan</th>
                            <th scope="col">Jumlah Bakti Pembagunan</th>
                             <th scope="col">Rentang Pembayaran</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Dana A</th>
                            <th scope="col">Dana B</th>
                            <th scope="col">Dana C</th>
                            <!-- <th scope="col">Lampiran</th> -->
                        </tr>
                    </thead>
                    <tbody>        
                     @foreach ($bakti_keluarga as $item)
                     <tr>
                        <td>{{ $item ['nama_keluarga']}}</td>
                        <td>{{ $item ['bakti_bulan']}}</td>
                        <td align="right">
                            <?php
                             echo "Rp." . number_format($item ['jumlah_bulan'], 2, ",", ".");
                            ?>
                           </td>
                        <td>{{ $item ['bakti_pembangunan']}}</td>
                        <td align="right">
                             <?php
                             echo "Rp." . number_format($item ['jumlah_pembangunan'], 2, ",", ".");
                            ?>
                            </td>
                        <td>{{ $item ['rentang_bayar']}}</td>
                        <td align="right">
                            <?php
                             echo "Rp." . number_format($item ['jumlah'], 2, ",", ".");
                            ?></td>
                        <td align="right">
                            <?php
                             echo "Rp." . number_format($item ['dana_a'], 2, ",", ".");
                            ?></td>
                        <td align="right">
                            <?php
                             echo "Rp." . number_format($item ['dana_b'], 2, ",", ".");
                            ?></td>
                        <td align="right">
                            <?php
                             echo "Rp." . number_format($item ['dana_c'], 2, ",", ".");
                            ?></td>
                        </tr>
                     @endforeach
                    </tbody> 
                     <thead>
                        <tr>
                            <tr>
                                <th colspan="10">1.1.E. Bakti Bulanan dan Bakti Pembangunan Jemaat</th>
                            </tr>
                            <th scope="col">Nama Jemaat</th>
                            <th scope="col">Bakti Bulan</th>
                            <th scope="col">Jumlah Bakti Bulanan</th>
                            <th scope="col">Bakti Pembangunan</th>
                            <th scope="col">Jumlah Bakti Pembagunan</th>
                             <th scope="col">Rentang Pembayaran</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Dana A</th>
                            <th scope="col">Dana B</th>
                            <th scope="col">Dana C</th>
                            <!-- <th scope="col">Lampiran</th> -->
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($bakti_jemaat as $item)
                     <tr>
                         <td>{{ $item ['nama']}}</td>
                        <td>{{ $item ['bakti_bulan']}}</td>
                        <td align="right"> <?php
                             echo "Rp." . number_format($item ['jumlah_bulan'], 2, ",", ".");
                            ?>
                         </td>
                        <td>
                            {{ $item ['bakti_pembangunan']}}</td>
                        <td align="right">
                             <?php
                             echo "Rp." . number_format($item ['jumlah_pembangunan'], 2, ",", ".");
                            ?></td>
                        <td>{{ $item ['rentang_bayar']}}</td>
                        <td align="right">
                            <?php
                             echo "Rp." . number_format($item ['jumlah'], 2, ",", ".");
                            ?></td>
                       <td align="right">
                            <?php
                             echo "Rp." . number_format($item ['dana_a'], 2, ",", ".");
                            ?></td>
                        <td align="right">
                            <?php
                             echo "Rp." . number_format($item ['dana_b'], 2, ",", ".");
                            ?></td>
                        <td align="right">
                            <?php
                             echo "Rp." . number_format($item ['dana_c'], 2, ",", ".");
                            ?></td>
                        </tr>
                     @endforeach
                    </tbody>
                    <table id="table-display" class="table table-bordered mb-0"> 
                    <thead>
                        <tr>
                            <th colspan="10">1.1.E. SEWA GEDUNG SM/AULA ATAS PEMAKAIAN</th>
                        </tr>
                        <tr>
                            <th colspan="2">Nama Jemaat</th>
                            <th colspan="2">Tanggal</th>
                            <th colspan="2">Keterangan</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Dana A</th>
                            <th scope="col">Dana B</th>
                            <th scope="col">Dana C</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lihatpenyewaangedung as $sewagedung)
                            <tr>
                                <td colspan="2">
                                    {{$sewagedung['nama']}}
                                </td>
                                <td colspan="2">
                                    {{$sewagedung['tanggal']}}
                                </td>
                                <td colspan="2">
                                    {{$sewagedung['keterangan']}}
                                </td>
                                
                                <td align="right"> <?php
                             echo "Rp." . number_format($sewagedung ['nominal'], 2, ",", ".");
                            ?>
                        </td>
                                <td align="right">   <?php
                             echo "Rp." . number_format($sewagedung ['dana_untuk_jemaat'], 2, ",", ".");
                            ?>
                         </td>
                        <td align="right"> <?php
                             echo "Rp." . number_format($sewagedung ['dana_untuk_pembangunan'], 2, ",", ".");
                            ?>
                        </td >
                        <td align="right"><?php
                             echo "Rp." . number_format($sewagedung ['dana_untuk_lintas'], 2, ",", ".");
                            ?>
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                     </table>
                     <table id="table-display" class="table table-bordered mb-0"> 
                    <thead>
                        <tr>
                            <th colspan="10">1.1.F. UCAPAN SYUKUR</th>
                        </tr>
                        <tr>
                            <th colspan="2">tanggal</th>
                            <th colspan="4">keterangan</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Dana A</th>
                            <th scope="col">Dana B</th>
                            <th scope="col">Dana C</th>
                        </tr>    
                    </thead>
                    <tbody>
                        @foreach ($lihatucapansyukur as $ucapansyukur)
                            <tr>
                                <td colspan="2">
                                    {{$ucapansyukur['tanggal']}}
                                </td>
                                <td colspan="4">
                                    {{$ucapansyukur['keterangan']}}
                                </td>
                                <td align="right"> <?php
                             echo "Rp." . number_format($sewagedung ['nominal'], 2, ",", ".");
                            ?>
                        </td>
                                <td align="right">   <?php
                             echo "Rp." . number_format($sewagedung ['dana_untuk_jemaat'], 2, ",", ".");
                            ?>
                         </td>
                        <td align="right"> <?php
                             echo "Rp." . number_format($sewagedung ['dana_untuk_pembangunan'], 2, ",", ".");
                            ?>
                        </td>
                        <td align="right"><?php
                             echo "Rp." . number_format($sewagedung ['dana_untuk_lintas'], 2, ",", ".");
                            ?>
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <p class="fs-9 fw-bold mt-3"><b>1.2 Pengeluaran</b></p>
                  <table class="table table-bordered mb-0" id="list">
                    <thead>
                        <tr>
                            <th scope="col">Tanggal Pengeluaran Gereja</th>
                            <th scope="col">Jenis Pengeluaran</th>
                            <th scope="col">Jumlah Pengeluaran</th>
                            <th scope="col">Keterangan</th>
                            
                        </tr>
                    </thead>
                    <tbody name="data" id="data">
                    @php
                        $no = 1;
                    @endphp
                        @foreach ($pengeluaran_gereja as $pengeluaran_gereja)
                        <form action=""></form>
                            <tr>
                            <td>{{ $pengeluaran_gereja -> tanggal_pg}}</td>
                                <td>{{ $pengeluaran_gereja -> pengeluaran}}</td>
                                <td align="right"><?php
                             echo "Rp." . number_format($pengeluaran_gereja ->jumlah_pg, 2, ",", ".");
                            ?>
                            </td>
                                <td>{{ $pengeluaran_gereja -> keterangan}}</td>
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
<script type="text/javascript"> 
    $(document).ready(function () {
        $('#table-datatables').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        });
    });
</script>
@endsection
