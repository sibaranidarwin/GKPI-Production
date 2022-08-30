<!--

=========================================================
* Argon Dashboard - v1.1.2
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2020 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('') }}">

    <!-- SEO Management-->
    <meta name="author" content="">

    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">



    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <!-- Icons -->
    <link href="{{ asset('/js/plugins/nucleo/css/nucleo.css') }}" rel="stylesheet">
    <link href="{{ asset('/js/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

    <!-- CSS Files -->
    <link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet">
    
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/footer.css') }}">
    
    @yield('styles')
</head>

<body>
    <section>
        <input type="checkbox" id="check">
        <Header>
          <div class="gam mt-3">
                 <img src="{{ asset('img/icon.png') }}">
                  <a style="font-size: 24px; color: #1f52c0;" href="{{ route('home.index') }}"><strong>Tarutung Kota</strong></a>
            </div>
            <div class="navigation">
                <a class="navbar-brand" href="{{ route('home.index') }}">
                    <span class="nav-link-inner--text text6">Beranda</span>
                </a>
                @if (Session::get('Auth', null) !== null)
                    <a class="navbar-brand" href="{{ route('BeritaGereja.index') }}">
                        <span class="nav-link-inner--text text6">Berita Gereja</span>
                    </a>
                @endif
                       <a class="navbar-brand" data-bs-toggle="dropdown">
                        <span class="nav-link-inner--text text6">Data Gereja <i class="fa fa-caret-down" aria-hidden="true"></i></span>
                    </a>
                    <div class="dropdown-menu">
                         <a class="dropdown-item" href="{{ route('DataGereja.warta') }}">
                            <i aria-hidden="true"></i>
                            Warta Jemaat Gereja
                        </a>
                         <div class="dropdown-divider"></div>
                         <a class="dropdown-item" href="{{ route('DataGereja.statistik') }}">
                            <i aria-hidden="true"></i>
                            Statistik Jemaat Gereja
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('DataGereja.keuangan') }}">
                            <i aria-hidden="true"></i>
                           Data Keuangan Gereja 
                        </a>
                        <div class="dropdown-divider"></div>
                         <a class="dropdown-item" href="{{ route('DataGereja.statistikkeuangan') }}">
                            <i aria-hidden="true"></i>
                            Statistik Keuangan Gereja
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('DataGereja.statistikkehadiranjemaat') }}">
                            <i aria-hidden="true"></i>
                           Statistik Kehadiran Jemaat 
                        </a>
                        <div class="dropdown-divider"></div>
                    </div>

                <a class="navbar-brand" href="{{ route('Renungan.index') }}">
                    <span class="nav-link-inner--text text6">Renungan Harian</span>
                </a>
                  <a class="navbar-brand" data-bs-toggle="dropdown">
                        <span class="nav-link-inner--text text6">Tentang Gereja <i class="fa fa-caret-down" aria-hidden="true"></i></span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('Tentang.index') }}">
                            <i aria-hidden="true"></i>
                            Struktur Organisasi
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('Tentang.program') }}">
                            <i aria-hidden="true"></i>
                            Rancangan Program Kerja
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('Tentang.anggaran') }}">
                            <i aria-hidden="true"></i>
                            Rancangan Anggaran Biaya
                        </a>
                    </div>
                <a class="navbar-brand" href="{{ route('auth.login') }}">
                    @if (Session::get('Auth', null) !== null)
                    <img src="{{ Session::get('Auth', null)['profile'] }}" alt=""
                    style="width: 40px; height: 40px;" class="rounded-circle">
                    <span>{{Session::get('Auth', null)['name']}}</span>
                    <a style="color: red;" class="navbar-brand" href="{{ route('auth.logout') }}">
                    <i class="fa fa-power-off"  style="font-size:24px"></i>
                    @else
                        <span class="nav-link-inner--text text6">Masuk</span>
                        <i class=" text"></i>
                    @endif
                </a>
            </div>
            
            <label for="check">
                <i class="fas fa-bars menu-btn"></i>
                <i class="fas fa-times close-btn"></i>
            </label>
        </Header>

  <div class="row">
  <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="{{ asset('img/Slider2.png') }}" class="d-block w-100" alt="...">
      <div class="center col-md-4 carousel-caption d-none d-md-block card-text bg-light">
        <h1 class ="text-center">Selamat Datang Di GKPI Tarutung Kota!</h1>
        <p class ="text-center">Salam sejahtera dalam kasih Kristus Yesus. <br>
Selamat datang di situs resmi 
GKPI Tarutung Kota </p>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="{{ asset('img/Slider3.png') }}" class="d-block w-100" alt="...">
      @foreach ($renungan as $item)
      <div class="center col-md-4 carousel-caption d-none d-md-block card-text bg-light">
      <h2 class="text-center">Renungan Harian</h2>
                                <p class="text-center">Tanggal : {{ Carbon\Carbon::parse($item->tanggal)->format('d F Y') }}</p>
                                <p class="text-center">{{ $item->ayat }}</p>
                                <a href="/renungan/{{$item->id}}"  class="btn btn-light p-2 ms-auto">
                               <span>Baca Renungan Harian >></span>
                                   </a>

      </div>
      @endforeach
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="{{ asset('img/Slider4.png') }}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
      @foreach ($warta_jemaat as $item)
      <div class="center col-md-4 carousel-caption d-none d-md-block card-text bg-light">
      <h2 class="text-center">Berita Gereja</h2>
      <p class="text-center" style="font-size: 15px;">{{ $item->nama }}</p>
                                <p class="text-center">{{ Carbon\Carbon::parse($item->tanggal)->format('d F Y') }}</p>
                                <a href="/beritaGereja/{{$item->id}}"  class="btn btn-light p-2 ms-auto">
                               <span>Baca Selengkapnya >></span>
                                   </a>

      </div>
      @endforeach
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{ asset('img/Slider5.png') }}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
            @foreach ($jadwal_ibadah as $item)
            <div class="center col-md-4 carousel-caption d-none d-md-block card-text bg-light">
            <h2 class="text-center">Jadwal Ibadah</h2>
                            <p class="text-center">{{ $item->name }}</p>
                            <p class="text-center">Tanggal : {{ Carbon\Carbon::parse($item->tanggal)->format('d F Y') }}</p>
                            <p class="text-center">Jam : {{ $item->waktu }}</p>
                </div>
            @endforeach
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
        <div class="col"></div>
        </div>
</div>
    </section>
    <div class="container mt-4 pb-5">
        @yield('content')
    </div>
  <footer class="footer mt-5">
  	 <div class="container">
  	 	<div class="row">
  	 		<div class="footer-col col-md-5">
  	 			<h4>GKPI Tarutung Kota</h4>
  	 			<ul>
  	 				<li>  <a target="_BLANK" href="https://goo.gl/maps/fh9i7x2ZFGjhLb5Z7"><i class="fas fa-map-marker-alt" style="font-size:35px;"></i> Jl. Raja Saul Lumbantobing, Hutatoruan VI, 
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tarutung, Kabupaten Tapanuli Utara, Sumatera &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Utara.</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col col-md-4">
  	 			<h4>Hubungi Kami</h4>
  	 			<ul>
  	 			 	<li><a target="_BLANK" href="">Pdt. Dirgos Lumban Tobing, M.Th</a></li>
  	 				<li><a target="_BLANK" href="https://web.whatsapp.com/"><i class="fab fa-whatsapp"></i>&nbsp; 081212562775</a></li>
  	 				<li><a href="#"><i class="fas fa-phone"></i>&nbsp; 081212562775</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col col-md-3">
  	 			<h4>Ikuti Kami</h4>
  	 			<div class="social-links">
  	 				<a target="_BLANK" href="https://web.facebook.com/groups/766557370968044"><i class="fab fa-facebook-f"></i></a>
  	 				<a target="_BLANK" href="https://www.instagram.com/gkpijktarutungkota_/"><i class="fab fa-instagram"></i></a>
  	 				<a target="_BLANK" href="https://www.youtube.com/channel/UCK3M7_9cM-n6Y2oSBVcgJEQ/featured"><i class="fab fa-youtube"></i></a>
  	 			</div>
  	 		</div>
  	 	</div>
  	 </div>
  </footer>

    </div>
</body>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/jquery.fancybox.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
</html>
