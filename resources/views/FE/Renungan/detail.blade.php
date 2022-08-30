@extends('FE.template.header')
@section('title', 'Renungan Harian')
    
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
            <div class="container mt-4">
  <div class="row">
    <div class="col-12">
    <h2 class="text border-bottom text-center">Detail Renungan Harian</h2>
    <br>
    <div class="row">
            @foreach ($renungan as $item)
                <div class="mb-3">
                    <div class="card animate-up shadow">
                        <div class="row">
                            <div class="ml-3 text-left">
                            <p>Tanggal : {{ Carbon\Carbon::parse($item->tanggal)->format('d F Y') }}</p>
                            </div>
                        <div class="card-body text-center">
                                <h3>{{ $item->title }}</h3>
                                <p>{{ $item->ayat }}</p>
                                <p>"{{ $item->isi }}"</p>
                        </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>   
      
        </div>
        <div class="col"></div>
   
        </div>
        </div>
</div>
    </section>
     
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

