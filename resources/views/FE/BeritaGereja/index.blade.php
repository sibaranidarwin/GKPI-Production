@extends('FE.template.header')
@section('title', 'Berita Gereja')

@section('content')
<style type="text/css">
  body {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 20px;
  }
 
  #scroll-btn {
    display: none;
    position: fixed;
    bottom: 20px;
    right: 30px;
    z-index: 99;
    font-size: 18px;
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
            <section class="mb-5">
            <div class="container mt-3">
  <div class="row">
    <div class="col-10 col-lg-8">
    <h2 class="text border-bottom ">Berita Terbaru Gereja</h2>
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
      
        </div>
        <div class="col"></div>
    <div class="col-8 col-lg-3">
    <h2 class="text border-bottom">Jadwal Ibadah</h2>
    <br>
    <div class="row justify-content-center">
            @foreach ($jadwal_ibadah as $item)
                <div class="col-lg-12 mb-3">
                    <div class="card animate-up shadow">
                        <div class="card-body text-center" style="background-color: #e2f1fc;">
                            <h4 class="text">{{ $item->name }}</h4>
                            <p>Tanggal : {{ Carbon\Carbon::parse($item->tanggal)->format('d F Y') }}</p>
                            <p>Jam : {{ $item->waktu }}</p>
                            <p>Dilaksanakan: {{ $item->pengulangan }}</p>
                            <p>Pengkhotbah : {{ $item['pengkhotbah'] }}</p>
                            <div class="mt-3 d-flex justify-content-between text-sm text-muted">
                                <i class="fas fa-clock">Diposting {{ $item->created_at->diffForHumans() }}</i>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div> 
       
        </div>
        </div>
        </div>
</div>
        
 <button onclick="topFunction()" id="scroll-btn" title="Top">&uarr;</button>


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

