@extends('FE.template.header')
@section('title', 'Tentang Gereja')

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
        <div class="row">
            <div class="col-md">
                <div class="header-body text-center mt-0 mb-4">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-md-8 border-bottom">
                            <h2 class="text">Susunan Pengurus Harian / Majelis Jemaat Khusus GKPI Tarutung Kota, WIlayah VI (Silindung-Pahae-Tapsel-Tapteng)
                                Periode 2020-2025</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container col-lg-3">
  <div class="row">
    <div class="col">
        <h4 class="btn btn-success  col-md-4 card-text bg-success ">Pengurus Harian</h4>
    <table class="table table-bordered">
                        <tr>
                            <td scope="col">Pendeta Ressort / Pemimpin Jemaat</td>
                            <td scope="col">Sesuai dengan SK Penempatan Pendeta</td>
                        </tr>
                        <tr>
                            <td scope="col">Sekretaris Jemaat</td>
                            <td scope="col">St. Ramly Simamora S.E</td>
                        </tr>
                            <tr>
                            <td scope="col">Bendahara Jemaat</td>
                            <td scope="col">Oinike Lumbantobing, A.Md</td>
                            </tr>
                </table>
    </div>
    </div>
     <div class="row">
    <div class="col">
    <h4 class="btn btn-success col-md-4 card-text bg-success">Ketua Seksi</h4>
    <table class="table table-bordered">
                        <tr>
                            <td scope="col">Seksi Pelayanan Rohani</td>
                            <td scope="col">St. Anggiat Gultom, S.Pd.K</td>
                        </tr>
                        <tr>
                            <td scope="col">Seksi Pekabaran Injil</td>
                            <td scope="col">St. Maringan Sinambela, M.Th</td>
                        </tr>
                        <tr>
                            <td scope="col">Seksi Diakoni</td>
                            <td scope="col">Roisita Sihombing, S.PD</td>
                        </tr>
                        <tr>
                            <td scope="col">Seksi Musik/Nyanyian/Koor</td>
                            <td scope="col">Hendro Simamora, S.S</td>
                        </tr>
                        <tr>
                            <td scope="col">Seksi Sekolah Minggu</td>
                            <td scope="col">Mariana Hutagalung</td>
                        </tr>
                        <tr>
                            <td scope="col">Seksi Pemuda/i (PP)</td>
                            <td scope="col">Nelly Panggabean</td>
                        </tr>
                </table>
    </div>
</div>
<div class="row">
          <div class="col">
            <h4 class="btn btn-success col-md-8 card-text bg-success">Pengawas Harta Benda</h4>
            <table class="table table-bordered">
                            <tr>
                            <td scope="col">Rudianton Sinaga, S.E,M.Si</td>
                            </tr>
                            <tr>
                            <td scope="col">Tobok Hutabarat, B.E</td>
                            </tr>
                            <tr>
                            <td scope="col">Bintoro Simangunsong, S.E</td>
                            </tr>
                            <tr>
                            <td scope="col">Romulus Pandapotan Simanjuntak, S.E</td>
                            </tr>
                            <tr>
                            <td scope="col">Jepri Simorangkir, S.E</td>
                            </tr>
                </table>
                 </div>
            <div class="col">
            <h4 class="btn btn-success col-md-4 card-text bg-success">Penasehat Jemaat</h4>
            <table class="table table-bordered">
                            <tr>
                            <td scope="col">Edward Lumbanbatu, S.Pd, MM</td>
                            </tr>
                            <tr>
                            <td scope="col">Dr. Arip Surpi Sitompul, M.Th</td>
                            </tr>
                            <tr>
                            <td scope="col">Rumenta Lumbantobing</td>
                            </tr>

                </table>
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

