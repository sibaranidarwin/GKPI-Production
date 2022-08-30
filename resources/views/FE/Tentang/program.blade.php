@extends('FE.template.header')
@section('title', 'Tentang Gereja')

@section('content')

<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet"/>
<link rel="stylesheet" href="{{ asset('/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('/css/footer.css') }}">
            <section class="mb-5">
        <div class="row">
            <div class="col-md">
                <div class="header-body text-center mt-0 mb-4">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-md-8 border-bottom">
                            <h2 class="text">Program Kerja GKPI Tarutung Kota</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                            <iframe src="{{ asset('lampiran/RANCANGAN PROGRAM KERJA JEMAAT GKPI JK TARUTUNG KOTA TAHUN 2022.pdf')}}" width="1100" height="600"></iframe>    
                </div>
                    </div>
            </div>
            </div>

    </section>
            
            @endsection

