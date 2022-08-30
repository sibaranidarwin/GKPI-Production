<?php

namespace App\Http\Controllers;


use App\jadwal_ibadah;
use App\WartaJemaat;
use App\Jemaat;
use App\Renungan;
use App\Keluarga;
use App\jemaat_perminggu;
use App\PeleanKategorial;
use App\PeleanLain;
use App\PeleanMinggu;
use App\PengeluaranGereja;
use App\Tataibadah;
use App\acara_ibadah;
use App\Keuangan;
use App\sewagedung;
use App\bulan;
use App\ucapansyukurkeluarga;
use App\Bakti_keluarga;
use App\Bakti_jemaat;

use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DataGerejaController extends Controller
{
    public function index()
    {
        $jadwal_ibadah = jadwal_ibadah::latest()->take(3)->get(); 
        $warta_jemaat = WartaJemaat::latest()->take(6)->get();
        $renungan = Renungan::take(3)->get(); 
        $tata_ibadah = Tataibadah::latest()->take(9)->get();
        
        $datakeluarga = [
            [
                "name"=> "JUMLAH KELUARGA",
                "jumlah"=> Keluarga::count(),
                "color"=> "bg-success",
            ],
            [
                "name"=> "JUMLAH JEMAAT",
                "jumlah"=> Jemaat::all()->count(),
                "color"=> "bg-info",
            ],
            [
                "name"=> "JUMLAH LAKI LAKI",
                "jumlah"=> Jemaat::all()->where("jenis_kelamin", "Laki-laki")->count(),
                "color"=> "bg-primary",
            ],
            [
                "name"=> "JUMLAH PEREMPUAN",
                "jumlah"=> Jemaat::all()->where("jenis_kelamin", "Perempuan")->count(),
                "color"=> "bg-pink",
            ],
            [
                "name"=> "JUMLAH JEMAAT AKTIF",
                "jumlah"=> Jemaat::all()->where("status", "Aktif")->count(),
                "color"=> "bg-yellow",
            ],
            [
                "name"=> "JUMLAH JEMAAT TIDAK AKTIF",
                "jumlah"=> Jemaat::all()->where("status", "Pindah", "Meninggal")->count(),
                "color"=> "bg-danger",
            ],
            [
                "name"=> "JUMLAH JEMAAT SEKTOR OKULI",
                "jumlah"=> Jemaat::all()->where("sektor_id", "1")->count(),
                "color"=> "bg-warning",
            ],
            [
                "name"=> "JUMLAH JEMAAT SEKTOR LETARE",
                "jumlah"=> Jemaat::all()->where("sektor_id", "2")->count(),
                "color"=> "bg-warning",
            ],
            [
                "name"=> "JUMLAH JEMAAT SEKTOR JOSUA",
                "jumlah"=> Jemaat::all()->where("sektor_id", "3")->count(),
                "color"=> "bg-warning",
            ],
            [
                "name"=> "JUMLAH JEMAAT SEKTOR AEK JORDAN",
                "jumlah"=> Jemaat::all()->where("sektor_id", "4")->count(),
                "color"=> "bg-warning",
            ],
            [
                "name"=> "JUMLAH JEMAAT SEKTOR ESTOMIHI",
                "jumlah"=> Jemaat::all()->where("sektor_id", "5")->count(),
                "color"=> "bg-warning",
            ],
            [
                "name"=> "JUMLAH JEMAAT SEKTOR ROGATE",
                "jumlah"=> Jemaat::all()->where("sektor_id", "6")->count(),
                "color"=> "bg-warning",
            ],
            [
                "name"=> "JUMLAH JEMAAT SEKTOR SION",
                "jumlah"=> Jemaat::all()->where("sektor_id", "7")->count(),
                "color"=> "bg-warning",
            ],
        ];
        // Change this pagination if you want to increase pagination
        $keluarga = Keluarga::with(['jemaat', 'jemaat.sektor'])->paginate(1);
        return view('FE.DataGereja.index', compact('jadwal_ibadah','warta_jemaat','renungan', 'tata_ibadah'), [
            "datakeluargas"=> $datakeluarga,
            "keluargas" => $keluarga
        ]);
    }
      public function keuangan(){
        $jadwal_ibadah = jadwal_ibadah::latest()->take(3)->get(); 
        $warta_jemaat = WartaJemaat::latest()->take(6)->get();
        $renungan = Renungan::latest()->take(2)->get(); 
        $tata_ibadah = Tataibadah::latest()->take(9)->get();

        $now = CarbonImmutable::now()->locale('id_ID');
        $start_week = $now->startOfWeek()->format('m-d');
        $end_week = $now->endOfWeek()->format('m-d');
       $danapemasukan = Keuangan::where(["jenis_keuangan"=>"Pemasukan", "status_keuangan"=>"Aktif"])->get();
        
        
         $danapengeluaran = Keuangan::where(["jenis_keuangan"=>"Pengeluaran", "status_keuangan"=>"Aktif"])->get();
        
        
         $totalpemasukan = Keuangan::select("jenis_keuangan", DB::raw('SUM(nominal) as total'))
        ->groupBy("jenis_keuangan")
        ->where('jenis_keuangan','Pemasukan')->where('status_keuangan','Aktif')->get();       

        $totalpengeluaran = Keuangan::select("jenis_keuangan", DB::raw('SUM(nominal) as total'))
        ->groupBy("jenis_keuangan")
        ->where('jenis_keuangan','Pengeluaran')->where('status_keuangan','Aktif')->get();
    
        
        return view('FE.DataGereja.keuangan',compact('totalpengeluaran','totalpemasukan','danapemasukan','danapengeluaran','danapengeluaran','jadwal_ibadah','warta_jemaat','renungan', 'tata_ibadah'));
    }
    
    public function warta(){
        $renungan = Renungan::latest()->take(2)->get(); 
        
        $now = CarbonImmutable::now()->locale('id_ID');
        $start_week = $now->startOfWeek()->format('m-d');
        $end_week = $now->endOfWeek()->format('m-d');
        $acara_ibadah =  acara_ibadah::whereRaw("DATE_FORMAT(created_at, '%m-%d') BETWEEN '{$start_week}' AND '{$end_week}'")->get();
        
        $now = CarbonImmutable::now()->locale('id_ID');
        $start_week = $now->startOfWeek()->format('m-d');
        $end_week = $now->endOfWeek()->format('m-d');
        $jadwal_ibadah =  jadwal_ibadah::whereRaw("DATE_FORMAT(tanggal, '%m-%d') BETWEEN '{$start_week}' AND '{$end_week}'")->get();
       
        $now = CarbonImmutable::now()->locale('id_ID');
        $start_week = $now->startOfWeek(Carbon::MONDAY)->format('m-d');
        $end_week = $now->endOfWeek()->format('m-d');
        $jemaat =  Jemaat::whereRaw("DATE_FORMAT(tanggal_lahir, '%m-%d') BETWEEN '{$start_week}' AND '{$end_week}'")->where("Status", "Aktif")->get();
        
        $now = CarbonImmutable::now()->locale('id_ID');
        $start_week = $now->startOfWeek(Carbon::MONDAY)->format('m-d');
        $end_week = $now->endOfWeek()->format('m-d');
        $warta_jemaat =  WartaJemaat::whereRaw("DATE_FORMAT(tanggal, '%m-%d') BETWEEN '{$start_week}' AND '{$end_week}'")->get();
        
        $now = CarbonImmutable::now()->locale('id_ID');
        $start_week = $now->startOfWeek()->format('m-d');
        $end_week = $now->endOfWeek()->format('m-d');
        $bakti_keluarga =  Bakti_keluarga::whereRaw("DATE_FORMAT(created_at, '%m-%d') BETWEEN '{$start_week}' AND '{$end_week}'")->get();
        $bakti_jemaat =  Bakti_jemaat::whereRaw("DATE_FORMAT(created_at, '%m-%d') BETWEEN '{$start_week}' AND '{$end_week}'")->get(); 
        
         $now = CarbonImmutable::now()->locale('id_ID');
        $start_week = $now->startOfWeek(Carbon::MONDAY)->format('m-d');
        $end_week = $now->endOfWeek()->format('m-d');
        $statistik_jemaats =  jemaat_perminggu::whereRaw("DATE_FORMAT(tanggal_statis, '%m-%d') BETWEEN '{$start_week}' AND '{$end_week}'")->get();
        
        $now = CarbonImmutable::now()->locale('id_ID');
        $start_week = $now->startOfWeek(Carbon::MONDAY)->format('m-d');
        $end_week = $now->endOfWeek()->format('m-d');
        $lihatpenyewaangedung =  sewagedung::whereRaw("DATE_FORMAT(tanggal, '%m-%d') BETWEEN '{$start_week}' AND '{$end_week}'")->get();
        
        $now = CarbonImmutable::now()->locale('id_ID');
        $start_week = $now->startOfWeek(Carbon::MONDAY)->format('m-d');
        $end_week = $now->endOfWeek()->format('m-d');
         $lihatucapansyukur =  ucapansyukurkeluarga::whereRaw("DATE_FORMAT(tanggal, '%m-%d') BETWEEN '{$start_week}' AND '{$end_week}'")->get();
        
        $now = CarbonImmutable::now()->locale('id_ID');
        $start_week = $now->startOfWeek(Carbon::MONDAY)->format('m-d');
        $end_week = $now->endOfWeek()->format('m-d');
        $pengeluaran_gereja =  PengeluaranGereja::whereRaw("DATE_FORMAT(tanggal_pg, '%m-%d') BETWEEN '{$start_week}' AND '{$end_week}'")->get();
        
        $now = CarbonImmutable::now()->locale('id_ID');
        $start_week = $now->startOfWeek(Carbon::MONDAY)->format('m-d');
        $end_week = $now->endOfWeek()->format('m-d');
        $pelean_minggu =  PeleanMinggu::whereRaw("DATE_FORMAT(tanggal_ibadah, '%m-%d') BETWEEN '{$start_week}' AND '{$end_week}'")->get();
        
        $now = CarbonImmutable::now()->locale('id_ID');
        $start_week = $now->startOfWeek(Carbon::MONDAY)->format('m-d');
        $end_week = $now->endOfWeek()->format('m-d');
        $pelean_kategorial =  PeleanKategorial::whereRaw("DATE_FORMAT(tanggal_kate, '%m-%d') BETWEEN '{$start_week}' AND '{$end_week}'")->get();
        
        $now = CarbonImmutable::now()->locale('id_ID');
        $start_week = $now->startOfWeek(Carbon::MONDAY)->format('m-d');
        $end_week = $now->endOfWeek()->format('m-d');
        $pelean_lain =  PeleanLain::whereRaw("DATE_FORMAT(tanggal_lain, '%m-%d') BETWEEN '{$start_week}' AND '{$end_week}'")->get();
        
         return view('FE.DataGereja.warta', compact('acara_ibadah', 'jadwal_ibadah','renungan', 'jemaat', 'warta_jemaat','bakti_keluarga','bakti_jemaat','statistik_jemaats','lihatpenyewaangedung','lihatucapansyukur','lihatucapansyukur','pengeluaran_gereja','pelean_minggu','pelean_kategorial','pelean_lain'));
    }
    
    public function statistikkeuangan(){
        $renungan = Renungan::latest()->take(2)->get();
        $now = CarbonImmutable::now()->locale('id_ID');
        $start_week = $now->startOfWeek(Carbon::MONDAY)->format('m-d');
        $end_week = $now->endOfWeek()->format('m-d');
        $warta_jemaat =  WartaJemaat::whereRaw("DATE_FORMAT(tanggal, '%m-%d') BETWEEN '{$start_week}' AND '{$end_week}'")->get();
        
        $now = CarbonImmutable::now()->locale('id_ID');
        $start_week = $now->startOfWeek()->format('m-d');
        $end_week = $now->endOfWeek()->format('m-d');
        $jadwal_ibadah =  jadwal_ibadah::whereRaw("DATE_FORMAT(tanggal, '%m-%d') BETWEEN '{$start_week}' AND '{$end_week}'")->get();
        
        DB::statement("SET SQL_MODE=''");
        $now = Carbon::now();
        $bulan = Keuangan::select(DB::raw('MonthName(tanggal) as bulanp'))
        ->GroupBy(DB::raw('MonthName(tanggal)'))->OrderBy('tanggal', 'ASC')->where('status_keuangan','Aktif')
        ->whereYear('tanggal',$now)->pluck('bulanp');
        
        $totalpemasukan = Keuangan::select("nominal", DB::raw('CAST(SUM(nominal) as int ) as totalp'))
        ->groupBy(DB::raw('MonthName(tanggal)'))->OrderBy('tanggal', 'ASC')->where('jenis_keuangan','Pemasukan')
        ->whereYear('tanggal',$now)->where('status_keuangan','Aktif')->pluck('totalp');

        $totalpengeluaran = Keuangan::select("nominal", DB::raw('CAST(SUM(nominal) as int ) as totalpe'))
        ->groupBy(DB::raw('MonthName(tanggal)'))->OrderBy('tanggal', 'ASC')->where('jenis_keuangan','Pengeluaran')
        ->whereYear('tanggal',$now)->where('status_keuangan','Aktif')->pluck('totalpe');

        return view('FE.DataGereja.statistikkeuangan',['bulan'=>$bulan,'totalpemasukan'=>$totalpemasukan,'totalpengeluaran'=>$totalpengeluaran], compact('renungan','warta_jemaat','jadwal_ibadah'));
       
    }
    
    public function statistik(){
        $renungan = Renungan::latest()->take(2)->get(); 
        
        $now = CarbonImmutable::now()->locale('id_ID');
        $start_week = $now->startOfWeek(Carbon::MONDAY)->format('m-d');
        $end_week = $now->endOfWeek()->format('m-d');
        $warta_jemaat =  WartaJemaat::whereRaw("DATE_FORMAT(tanggal, '%m-%d') BETWEEN '{$start_week}' AND '{$end_week}'")->get();
        
        $now = CarbonImmutable::now()->locale('id_ID');
        $start_week = $now->startOfWeek()->format('m-d');
        $end_week = $now->endOfWeek()->format('m-d');
        $jadwal_ibadah =  jadwal_ibadah::whereRaw("DATE_FORMAT(tanggal, '%m-%d') BETWEEN '{$start_week}' AND '{$end_week}'")->get();
       
       $sektor = \App\Sektor::all();

        //Data Untuk Grafik
        $categories = [];

        foreach($sektor as $si){
            $categories[] = $si->nama;
        }

        $jemaats = Jemaat::paginate(300);
        return view('FE.DataGereja.statistik', compact('categories','jemaats','renungan','warta_jemaat','jadwal_ibadah'));
    }
    public function statistikkehadiranjemaat(){
        $renungan = Renungan::latest()->take(2)->get(); 
        
        $now = CarbonImmutable::now()->locale('id_ID');
        $start_week = $now->startOfWeek(Carbon::MONDAY)->format('m-d');
        $end_week = $now->endOfWeek()->format('m-d');
        $warta_jemaat =  WartaJemaat::whereRaw("DATE_FORMAT(tanggal, '%m-%d') BETWEEN '{$start_week}' AND '{$end_week}'")->get();
        
        $now = CarbonImmutable::now()->locale('id_ID');
        $start_week = $now->startOfWeek()->format('m-d');
        $end_week = $now->endOfWeek()->format('m-d');
        $jadwal_ibadah =  jadwal_ibadah::whereRaw("DATE_FORMAT(tanggal, '%m-%d') BETWEEN '{$start_week}' AND '{$end_week}'")->get();
       
       $bulan = \App\bulan::all();

        //Data Untuk Grafik
        $categories = [];

        foreach($bulan as $bln){
            $categories[] = $bln->nama;
        }

        $bulans = bulan::paginate(300);
        $jemaats = Jemaat::paginate(300);
        return view('FE.DataGereja.statistikkehadiranjemaat', compact('categories','jemaats','bulans','renungan','warta_jemaat','jadwal_ibadah'));
    }

}

