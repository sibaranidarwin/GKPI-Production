@extends('FE.template.header')

@section('title', 'GKPI Tarutung Kota')

@section('content')
<style type="text/css">
  body {
    font-family: Arial;
    font-size: 20px;
  }
 
  #scroll-btn {
    display: none;
    position: fixed;
    bottom: 20px;
    right: 30px;
    z-index: 99;
    font-size: 20px;
    border: none;
    outline: none;
    background-color: #226a80;
    color: white;
    cursor: pointer;
    padding: 15px 19px;
    border-radius: 5px;
  }
 
  #scroll-btn:hover {
    background-color: #555;
    color: #F2A154;
  }
 
  .sampel {
    min-height: 2000px;
  }
</style>
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet"/>
<link rel="stylesheet" href="{{ asset('/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('/css/footer.css') }}">
<div class="col-12 mt-3 p-3">
    <div class="col-12">
        <div class="row">
        <div class="row">
            <div class="col-md">
                <div class="header-body text-left mt-0 mb-4">
                    <div class="row justify-content">
                        <div class="row col-lg-12 col-md-4">
                            <div class="col-12">
                            <h2 style="text-align: center;" class="tex border-bottom">Data Statistik Jemaat</h2>
                            <br>
                            </div>
                            <div class="col-3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            @foreach ($datakeluargas as $datumkeluarga)
                <div class="col-12 col-md-4 d-flex mt-md-0 mb-4" >
                    <div class="col-12 shadow-sm p-4 rounded" style="background-color: #F9FFFF;">
                        <div class="col-12 d-flex">
                            <div class="col-7">
                                <span>{{ $datumkeluarga['name'] }}</span>
                            </div>
                            <div class="col-5 rounded  d-flex justify-content-end">
                                <div class="rounded-circle {{ $datumkeluarga['color'] }} d-flex align-items-center justify-content-center"
                                    style="width: 60px;height:60px;">
                                    <i class="fa fa-user text-white fs-3"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <span class="fs-3 fw-bold">{{ $datumkeluarga['jumlah'] }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="container-md mt-3">
  <div class="row">
    <div class="col-10 col-lg-8">
    <h2 class="text border-bottom">Tata Ibadah</h2>
    <div class="row justify-content-left">
    <div class="col-12 mt-0 p-3">
    <div class="col-12 shadow-sm rounded bg-white p-3">
        <div class="col-12 mt-0">
            <div class="table-responsive-sm">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                             <th scope="col">Tanggal</th>
                            <th scope="col">Nama Ibadah</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tata_ibadah as $item)
                            <tr>
                                <td>{{ Carbon\Carbon::parse($item->tanggal)->format('d F Y') }}</td>
                                <td>{{ $item['nama'] }}</td>
                                <td>  <a target="_BLANK" href="{{ $item['lampiran'] }}" >
                              <button class="btn btn-primary">Unduh File <i class="fa fa-download" aria-hidden="true"></i></button></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    </div>
    <br>
    <br>
    <h2 class="text border-bottom">Kegiatan Sepekan</h2>
  
    <div class="row justify-content-left">
    <div class="col-12 mt-0 p-3">
    <div class="col-12 shadow-sm rounded bg-white p-3">
        <div class="col-12 mt-0">
            <div class="table-responsive-sm">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Pukul</th>
                            <th scope="col">Nama Kegiatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kegiatan as $item)
                            <tr>
                                <td>{{ Carbon\Carbon::parse($item->tanggal)->format('d F Y') }}</td>
                                <td>{{ $item['pukul'] }}</td>
                                <td>{{ $item['nama'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        </div>
</div>             
        </div>
        <div class="col"></div>
    <div class="col-8 col-lg-3">
    <h2 class="text border-bottom">Renungan Harian</h2>
    <br>
    <div class="row justify-content-center">
            @foreach ($renungan as $item)
                <div class="col-lg-12 mb-3">
                    <div class="card animate-up">
                        <div class="card-body text-center" style="background-color: #e2f1fc;">
                                <h4 class="text">Tanggal : {{ Carbon\Carbon::parse($item->tanggal)->format('d F Y') }}</h4>
                                <h5 class="text"><strong>{{ $item->ayat }}</strong></h5>
                                <p class="text" style="font-size: 15px;">{{ $item->title }}</p>
                                <p  maxlength="10">""{{Str::limit($item->isi, 100) }}"</p>
                               <div class="mt-3 d-flex justify-content-between text-sm text-muted">
                               <a href="/renungan/{{$item->id}}"  class="btn btn-primary p-2 ms-auto">
                               <span>Baca Selengkapnya >></span>
                                   </a>
                                </div>
                                 <div class="mt-3 d-flex justify-content-between text-sm text-muted">
                                    <i class="fas fa-clock">Diposting {{ $item->created_at->diffForHumans() }}</i>
                                </div>
                               
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-3 d-flex justify-content-between text-sm text-muted">
                                <a href="{{ route('Renungan.index') }}"  class="btn btn-white p-2 ms-auto">
                              <span>Lihat Seluruh Renungan >></span>
                                   </a>
                                </div> 
        </div>
        </div>
        </div>
</div>
<div class="container mt-0">
  <div class="row">
    <div class="col-10 col-lg-8">
    <h2 class="text border-bottom">Berita Terbaru Gereja</h2>
    <br>
    <div class="row">
            @foreach ($warta_jemaat as $item)
                <div class="mb-3">
                    <div class="card animate-up shadow">
                        <div class="card-body">
                                <img alt="" class="img-responsive img-fluid rounded" width="100" src="{{ asset('storage/' .$item->lampiran.'') }}">&nbsp;<strong>{{ $item->nama }}</strong>
                                <p maxlength="10">"{{ Str::limit($item->isi, 200) }}"</p>
                                <a href="/beritaGereja/{{$item->id}}"  class="btn btn-primary p-2 ms-auto mt-3">
                                    Baca Selengkapnya >>
                                   </a>
                              <div class="mt-3 d-flex justify-content-between text-sm text-muted">
                                    <i class="fas fa-clock">Diposting {{ $item->created_at->diffForHumans() }}</i>
                                </div>
                                
                        </div>
                    </div>
                </div>
            @endforeach
        </div>   
        <div class="mt-0 d-flex justify-content-between text-sm text-muted">
                                <a href="{{ route('BeritaGereja.index') }}"  class="btn btn-white p-2 ms-auto">
                              <span>Lihat Seluruh Berita >></span>
                                   </a>
                                </div> 
        </div>
        <div class="col"></div>
    <div class="col-8 col-lg-3">
    <h2 class="text border-bottom">Jadwal Ibadah</h2>
    <br>
    <div class="row justify-content-center">
            @foreach ($jadwal_ibadah as $item)
                <div class="col-lg-12 mb-3">
                    <div class="card animate-up">
                        <div class="card-body text-center" style="background-color: #e2f1fc;">
                            <h4 class="text">{{ $item->name }}</h4>
                            <p class="text">Tanggal : {{ Carbon\Carbon::parse($item->tanggal)->format('d F Y') }}</p>
                            <p class="text">Jam : {{ $item->waktu }}</p>
                            <p class="text">Pengkhotbah : {{ $item['pengkhotbah'] }}</p>
                            <div class="mt-3 d-flex justify-content-between text-sm text-muted">
                                <i class="fas fa-clock">Diposting {{ $item->created_at->diffForHumans() }}</i>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div> 
        <div class="mt-0 d-flex justify-content-between text-sm text-muted">
                                <a href="{{ route('BeritaGereja.index') }}"  class="btn btn-white p-2 ms-auto">
                              <span>Lihat Seluruh Jadwal >></span>
                                   </a>
                                </div> 
        </div>
        </div>
        </div>
        <button onclick="topFunction()" id="scroll-btn" title="Top">&uarr;</button>
</div>
 <script>
// ketika pengunjung scroll kebawah 20px dari atas dokumen, maka tampilkan tombol scroll-btn
window.onscroll = function() {scrollFunction()};
 
function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("scroll-btn").style.display = "block";
  } else {
    document.getElementById("scroll-btn").style.display = "none";
  }
}
 
// ketika tombol tersebut di klik, maka lakukan scroll keatas laman
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
 
@endsection