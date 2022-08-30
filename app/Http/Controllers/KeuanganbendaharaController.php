<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Keuangan;
use App\LaporanKeuangan;
use App\laporankeuangankeluarga;
use App\PeleanKategorial;
use App\PeleanLain;
use App\PeleanMinggu;
use App\PengeluaranGereja;
use App\bulan;
use App\sewagedung;
use App\ucapansyukurkeluarga;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Carbon\CarbonImmutable;


class KeuanganbendaharaController extends Controller
{
    public function index(){
        $datakeuangan = Keuangan::all()->where('status_keuangan','Aktif');
        return view('bendahara.datakeuangan',compact('datakeuangan'));
    }
    public function index2(){
        $datakeuangan = Keuangan::all()->where('status_keuangan','Non-Aktif');
        return view('bendahara.datakeuangannonaktif',compact('datakeuangan'));
    } 
    public function index3(){
        $keuangankeluarga1 = laporankeuangankeluarga::paginate(50)->where('jenis_keuangan','Bakti Bulanan');
        $keuangankeluarga2 = laporankeuangankeluarga::paginate(50)->where('jenis_keuangan','Bakti Pembangunan');
        $keuangankeluarga3 = laporankeuangankeluarga::paginate(50)->where('jenis_keuangan','Ucapan syukur');
        return view('bendahara.laporankeuangankeluarga', 
        ['keuangankeluarga1'=>$keuangankeluarga1,
        'keuangankeluarga2'=>$keuangankeluarga2,
        'keuangankeluarga3'=>$keuangankeluarga3]);
    }
    
    public function peleanminggu(){
        $pelean_minggus = PeleanMinggu::all();

        return view("bendahara.peleanminggu",["pelean_minggus" => $pelean_minggus]);
    }
    function formpeleanminggu(Request $request)
    {
        return view("bendahara.formtambahpeleanminggu");
    }

    function formpeleanmingguproses(Request $request)
    {

        $arrName = [];
        
        
        $pelean_minggu = new PeleanMinggu();
        $pelean_minggu->tanggal_ibadah = $request->tanggal_ibadah;
        $pelean_minggu->jenis_ibadah = $request->jenis_ibadah;
        $pelean_minggu->jumlah_org = $request->jumlah_org;
        $pelean_minggu->jemaat_a = $request->jemaat_a;
        $pelean_minggu->pembangunan_b = $request->pembangunan_b;
        $pelean_minggu->lintas_c = $request->lintas_c;

        if (!$pelean_minggu->save()) {
            if (count($arrName) > 1) {
                foreach ($arrName as $path) {
                    unlink(public_path() . $path);
                }
            }
        }
        return redirect()->route('bendahara.formtambahpeleanminggu')->with('success', 'Data Pelean Minggu Berhasil Disimpan!');
    }
    public function ubahpeleanminggu($id){
        $pelean_minggus = DB::table('pelean_minggu')->where('id', $id)->get();
        return view('bendahara.formubahpeleanminggu', ['pelean_minggus'=>$pelean_minggus]);
    }

    public function updatepeleanminggu(Request $request, $id){
        $arrName = [];
        $pelean = $request->validate([
            'tanggal_ibadah'     => ['required'],
            'jenis_ibadah'    => ['required'],
            'jumlah_org'    => ['required'],
            'jemaat_a'    => ['required'],
            'pembangunan_b'    => ['required'],
            'lintas_c'    => ['required'],

        ]);
        $pelean = new PeleanMinggu();
        $pelean->tanggal_ibadah = $request->tanggal_ibadah;
        $pelean->jenis_ibadah = $request->jenis_ibadah;
        $pelean->jumlah_org = $request->jumlah_org;
        $pelean->jemaat_a = $request->jemaat_a;
        $pelean->pembangunan_b = $request->pembangunan_b;
        $pelean->lintas_c = $request->lintas_c;


        if (!$pelean->save()) {
            if (count($arrName) > 1) {
                foreach ($arrName as $path) {
                    unlink(public_path() . $path);
                }
            }
        }

        return redirect()->route('bendahara.peleanminggu')->with('success', 'Data Pelean Minggu berhasil diperbarui');
    }

    function formpeleankategorial(Request $request)
    {
        return view("bendahara.formtambahpeleankategorial");
    }

    function formpeleankategorialproses(Request $request)
    {

        $arrName = [];
        
        
        $pelean_kategorial = new PeleanKategorial();
        $pelean_kategorial->tanggal_kate = $request->tanggal_kate;
        $pelean_kategorial->keterangan = $request->keterangan;
        $pelean_kategorial->jumlah_halak = $request->jumlah_halak;
        $pelean_kategorial->jemaat_a = $request->jemaat_a;
        $pelean_kategorial->pembangunan_b = $request->pembangunan_b;
        $pelean_kategorial->lintas_c = $request->lintas_c;

        if (!$pelean_kategorial->save()) {
            if (count($arrName) > 1) {
                foreach ($arrName as $path) {
                    unlink(public_path() . $path);
                }
            }
        }
        return redirect()->route('bendahara.formtambahpeleankategorial')->with('success', 'Data Pelean Kategorial Berhasil Disimpan!');
    }
    public function ubahpeleankategorial($id){
        $pelean_kategorial = DB::table('pelean_kategorial')->where('id', $id)->get();
        return view('bendahara.formubahpeleankategorial', ['pelean_kategorial'=>$pelean_kategorial]);
    }
    

    public function updatepeleankategorial(Request $request, $id){
        $arrName = [];
        $pelean_kategorial = $request->validate([
            'tanggal_kate'     => ['required'],
            'keterangan'    => ['required'],
            'jumlah_halak'    => ['required'],
            'jemaat_a'    => ['required'],
            'pembangunan_b'    => ['required'],
            'lintas_c'    => ['required'],

        ]);
        $pelean_kategorial = new PeleanKategorial();
        $pelean_kategorial->tanggal_kate = $request->tanggal_kate;
        $pelean_kategorial->keterangan = $request->keterangan;
        $pelean_kategorial->jumlah_halak = $request->jumlah_halak;
        $pelean_kategorial->jemaat_a = $request->jemaat_a;
        $pelean_kategorial->pembangunan_b = $request->pembangunan_b;
        $pelean_kategorial->lintas_c = $request->lintas_c;


        if (!$pelean_kategorial->save()) {
            if (count($arrName) > 1) {
                foreach ($arrName as $path) {
                    unlink(public_path() . $path);
                }
            }
        }

        return redirect()->route('bendahara.peleankategorial')->with('success', 'Data berhasil Pelean Kategorial diperbarui');
    }
    public function peleankategorial(){
        $pelean_kategorial = PeleanKategorial::all();

        return view("bendahara.peleankategorial", compact('pelean_kategorial'));
    }

    function formpeleanlain(Request $request)
    {
        return view("bendahara.formtambahpeleanlain");
    }

    function formpeleanlainproses(Request $request)
    {

        $arrName = [];
        
        $pelean_lain = new PeleanLain();
        $pelean_lain->tanggal_lain = $request->tanggal_lain;
        $pelean_lain->keterangan_lain = $request->keterangan_lain;
        $pelean_lain->jumlah = $request->jumlah;
        $pelean_lain->dana_jemaata = $request->dana_jemaata;
        $pelean_lain->dana_pembangunanb = $request->dana_pembangunanb;
        $pelean_lain->dana_lintasc = $request->dana_lintasc;

        if (!$pelean_lain->save()) {
            if (count($arrName) > 1) {
                foreach ($arrName as $path) {
                    unlink(public_path() . $path);
                }
            }
        }
        return redirect()->route('bendahara.formtambahpeleanlain')->with('success', 'Data Pelean Lain Berhasil Disimpan!');
    }
    public function ubahpeleanlain($id){
        $pelean_lain = DB::table('pelean_lain')->where('id', $id)->get();
        return view('bendahara.formubahpeleanlain', ['pelean_lain'=>$pelean_lain]);
    }
    public function peleanlain(){
        $pelean_lain = PeleanLain::all();

        return view("bendahara.peleanlain", compact('pelean_lain'));
    }

    public function updatepeleanlain(Request $request, $id){
        $arrName = [];
        $pelean = $request->validate([
            'tanggal_lain'     => ['required'],
            'keterangan_lain'    => ['required'],
            'jumlah'    => ['required'],
            'dana_jemaata'    => ['required'],
            'dana_pembangunanb'    => ['required'],
            'dana_lintasc'    => ['required'],

        ]);
        $pelean_lain = new PeleanLain();
        $pelean_lain->tanggal_lain = $request->tanggal_lain;
        $pelean_lain->keterangan_lain = $request->keterangan_lain;
        $pelean_lain->jumlah = $request->jumlah;
        $pelean_lain->dana_jemaata = $request->dana_jemaata;
        $pelean_lain->dana_pembangunanb = $request->dana_pembangunanb;
        $pelean_lain->dana_lintasc = $request->dana_lintasc;


        if (!$pelean_lain->save()) {
            if (count($arrName) > 1) {
                foreach ($arrName as $path) {
                    unlink(public_path() . $path);
                }
            }
        }

        return redirect()->route('bendahara.peleanlain')->with('success', 'Data Pelean Lain berhasil diperbarui');
    }
    
    public function ubahpengeluarangereja($id){
        $pengeluaran_gereja = DB::table('pengeluaran_gereja')->where('id', $id)->get();
        return view('bendahara.formubahpengeluarangereja', ['pengeluaran_gereja'=>$pengeluaran_gereja]);
    }

    function formpengeluarangereja(Request $request)
    {
        return view("bendahara.formtambahpengeluarangereja");
    }
    function formpengeluarangerejaproses(Request $request)
    {

        $arrName = [];
        
        
        $pengeluaran_gereja = new PengeluaranGereja();
        $pengeluaran_gereja->tanggal_pg = $request->tanggal_pg;
        $pengeluaran_gereja->pengeluaran = $request->pengeluaran;
        $pengeluaran_gereja->jumlah_pg = $request->jumlah_pg;
        $pengeluaran_gereja->keterangan = $request->keterangan;


        if (!$pengeluaran_gereja->save()) {
            if (count($arrName) > 1) {
                foreach ($arrName as $path) {
                    unlink(public_path() . $path);
                }
            }
        }
        return redirect()->route('bendahara.formtambahpengeluarangereja')->with('success', 'Data Pelean Berhasil Disimpan!');
    }
    public function pengeluarangereja(){
        $pengeluaran_gereja = PengeluaranGereja::all();

        return view("bendahara.pengeluarangereja", compact('pengeluaran_gereja'));
    }

    public function updatepengeluarangereja(Request $request, $id){
        $arrName = [];
        $pelean = $request->validate([
            'tanggal_pg'     => ['required'],
            'pengeluaran'    => ['required'],
            'jumlah_pg'    => ['required'],
            'keterangan'    => ['required'],

        ]);
        $pengeluaran_gereja = new PengeluaranGereja();
        $pengeluaran_gereja->tanggal_pg = $request->tanggal_pg;
        $pengeluaran_gereja->pengeluaran = $request->pengeluaran;
        $pengeluaran_gereja->jumlah_pg = $request->jumlah_pg;
        $pengeluaran_gereja->keterangan = $request->keterangan;


        if (!$pengeluaran_gereja->save()) {
            if (count($arrName) > 1) {
                foreach ($arrName as $path) {
                    unlink(public_path() . $path);
                }
            }
        }

        return redirect()->route('bendahara.pengeluarangereja')->with('success', 'Data berhasil diperbarui');
    }
    
    public function keuangankeluargaPerminggu(){
        $now = CarbonImmutable::now()->locale('id_ID');
        $start_week = $now->startOfWeek(Carbon::MONDAY)->format('m-d');
        $end_week = $now->endOfWeek()->format('m-d');
        $keuangankeluarga1 =  laporankeuangankeluarga::whereRaw("DATE_FORMAT(tanggal, '%m-%d') BETWEEN '{$start_week}' AND '{$end_week}'")->where('jenis_keuangan','Bakti Bulanan')->get();
        $keuangankeluarga2 =  laporankeuangankeluarga::whereRaw("DATE_FORMAT(tanggal, '%m-%d') BETWEEN '{$start_week}' AND '{$end_week}'")->where('jenis_keuangan','Bakti Pembangunan')->get();
        $keuangankeluarga3 =  laporankeuangankeluarga::whereRaw("DATE_FORMAT(tanggal, '%m-%d') BETWEEN '{$start_week}' AND '{$end_week}'")->where('jenis_keuangan','Ucapan syukur')->get();

        return view('bendahara.laporankeuanganPerminggu', 
        ['keuangankeluarga1'=>$keuangankeluarga1,
        'keuangankeluarga2'=>$keuangankeluarga2,
        'keuangankeluarga3'=>$keuangankeluarga3]);
    } 

    function formkeuangan(Request $request)
    {
        return view("bendahara.formtambahkeuangan");
    }

    function formkeuanganprocess(Request $request)
    {

        $arrName = [];
        if ($request->hasFile("lampiran")) {

            $allowedfileExtension = ['pdf', 'jpg', 'png', 'docx'];
            $files = $request->file('lampiran');
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();

                if (in_array($extension, $allowedfileExtension)) {
                    $str = rand();
                    $result = md5($str);
                    $name = time() . "-" . $result . '.' . $extension;
                    $file->move(public_path() . '/lampiran/keuangan/', $name);
                    array_push($arrName, '/lampiran/keuangan/' . $name);
                }
            }
        }
        $fileName = join("#", $arrName);
        $nik = $request->nik;

        $keuangan = new Keuangan();
        $keuangan->kategori = $request->kategori;
        $keuangan->keterangan = $request->keterangan;
        $keuangan->jenis_keuangan = $request->jenis_keuangan;
        $keuangan->tanggal = $request->tanggal;
        $keuangan->nominal = $request->nominal;
        $keuangan->lampiran = $fileName;

        if (!$keuangan->save()) {
            if (count($arrName) > 1) {
                foreach ($arrName as $path) {
                    unlink(public_path() . $path);
                }
            }
        }
        return redirect()->route('bendahara.datakeuangan');
    }
    
    function tambahkeuangankeluarga(Request $request)
    {
        $bulans = bulan::get();
        return view("bendahara.tambahkeuangankeluarga", ['bulans' => $bulans]);
    }
    
    function lihatpenyewaangedung(Request $request)
    {
        $lihatpenyewaangedung = sewagedung::paginate(10);
        return view('bendahara.lihatpenyewaangedung', 
        ['lihatpenyewaangedung'=>$lihatpenyewaangedung]);
    }
    
    function tambahsewagedung(Request $request)
    {
        return view("bendahara.sewagedung");
    }

    function tambahsewagedungprocess(Request $request)
    {
        $arrName = [];

        $sewagedung = new sewagedung();
        $sewagedung->nama = $request->nama;
        $sewagedung->tanggal = $request->tanggal;
        $sewagedung->nominal = $request->nominal;
        $sewagedung->dana_untuk_jemaat = $request->dana_untuk_jemaat;
        $sewagedung->dana_untuk_pembangunan = $request->dana_untuk_pembangunan;
        $sewagedung->dana_untuk_lintas = $request->dana_untuk_lintas;
        $sewagedung->keterangan = $request->keterangan;

        if (!$sewagedung->save()) {
            if (count($arrName) > 1) {
                foreach ($arrName as $path) {
                    unlink(public_path() . $path);
                }
            }
        }
        return redirect()->route('bendahara.sewagedung')->with('success', 'Penyewaan Gedung berhasil dilaporkan');
    }
    
    function lihatucapansyukur(Request $request)
    {
        $lihatucapansyukur = ucapansyukurkeluarga::paginate(10);
        return view('bendahara.lihatucapansyukur', 
        ['lihatucapansyukur'=>$lihatucapansyukur]);
    }

    function tambahucapansyukurkeluarga(Request $request)
    {
        return view("bendahara.ucapansyukurkeluarga");
    }

    function tambahucapansyukurkeluargaprocess(Request $request)
    {
        $arrName = [];

        $ucapansyukurkeluarga = new ucapansyukurkeluarga();
        $ucapansyukurkeluarga->tanggal = $request->tanggal;
        $ucapansyukurkeluarga->nominal = $request->nominal;
        $ucapansyukurkeluarga->dana_untuk_jemaat = $request->dana_untuk_jemaat;
        $ucapansyukurkeluarga->dana_untuk_pembangunan = $request->dana_untuk_pembangunan;
        $ucapansyukurkeluarga->dana_untuk_lintas = $request->dana_untuk_lintas;
        $ucapansyukurkeluarga->keterangan = $request->keterangan;

        if (!$ucapansyukurkeluarga->save()) {
            if (count($arrName) > 1) {
                foreach ($arrName as $path) {
                    unlink(public_path() . $path);
                }
            }
        }
        return redirect()->route('bendahara.ucapansyukurkeluarga')->with('success', 'Penyetoran Ucapan Syukur Keluarga berhasil dilaporkan');
    }

    function tambahkeuangankeluargaprocess(Request $request)
    {
        $arrName = [];

        $keuangankeluarga = new laporankeuangankeluarga();
        $keuangankeluarga->no_kk = $request->no_kk;
        $keuangankeluarga->nama_keluarga = $request->nama_keluarga;
        $keuangankeluarga->jenis_keuangan = $request->jenis_keuangan;
        $keuangankeluarga->nominal = $request->nominal;
        $keuangankeluarga->tanggal = $request->tanggal;
        $keuangankeluarga->bulan_id = $request->bulan_id;
        $keuangankeluarga->tahun = $request->tahun;

        if (!$keuangankeluarga->save()) {
            if (count($arrName) > 1) {
                foreach ($arrName as $path) {
                    unlink(public_path() . $path);
                }
            }
        }
        return redirect()->route('bendahara.laporankeuangankeluarga')->with('success', 'Keuangan Keluarga Berhasil Ditambahkan');
    }
    function editkeuangankeluarga(Request $request, $no_kk){
        $keuangankeluarga = laporankeuangankeluarga::where("no_kk", $no_kk)->first();
        return view('bendahara.editkeuangankeluarga', ['keuangankeluarga'=> $keuangankeluarga]);
    }
    function updatekeuangankeluarga(Request $request) {
        $no_kk = $request->no_kk;
        DB::table('keuangan_keluarga')->where('no_kk', $no_kk)->update([
            'no_kk' => $request->no_kk,
            'nama_keluarga' => $request->nama_keluarga,
            'jenis_keuangan' => $request->jenis_keuangan,
            'nominal' => $request->nominal,
            'tanggal' => $request->tanggal,
            'bulan_id' => $request->bulan_id,
            'tahun' => $request->tahun
        ]);
        

        return redirect()->route('bendahara.laporankeuangankeluarga')->with('success', 'Keuangan Keluarga Berhasil Diubah');
    }

    public function ubahkeuangan($id){
        $keuangan = DB::table('keuangan')->where('id', $id)->get();
        return view('bendahara.formubahkeuangan', ['keuangan'=>$keuangan]);
    }

    public function updatekeuangan(Request $request, $id){
        $keuangan = Keuangan::find($id);
        $keuangan->update($request->all());

        return redirect()->route('bendahara.datakeuangan')->with('success', 'Data Keuangan berhasil diperbarui');
    }

    public function ubahstatuskeuangan($id){
        $keuangan = Keuangan::find($id);
        $keuangan->update(['status_keuangan'=>'Non-Aktif']);

        return redirect()->route('bendahara.datakeuangan')->with('success', 'Data Keuangan berhasil diperbarui');
    }

    public function ubahstatuskeuangan2($id){
        $keuangan = Keuangan::find($id);
        $keuangan->update(['status_keuangan'=>'Aktif']);

        return redirect()->route('bendahara.datakeuangannonaktif')->with('success', 'Data Keuangan berhasil diperbarui');
    }
    
    public function laporan(){
        $laporankeuangan = LaporanKeuangan::all()->where('status_laporan','Aktif');
        return view("bendahara.laporankeuangan",compact('laporankeuangan'));
    }

    public function laporan2(){
        $laporankeuangan = LaporanKeuangan::all()->where('status_laporan','Non-Aktif');
        return view("bendahara.laporankeuangannonaktif",compact('laporankeuangan'));
    }

    public function laporankeuangan(Request $request){
        return view("bendahara.formtambahlaporankeuangan");
    }

    public function laporankeuanganprocess(Request $request){
        $arrName = [];
        $id = $request->id;

        $laporankeuangan = new LaporanKeuangan();
        $laporankeuangan->nama_laporan = $request->nama_laporan;
        $laporankeuangan->tanggal_awal = $request->tanggal_awal;
        $laporankeuangan->tanggal_akhir = $request->tanggal_akhir;
        $laporankeuangan->kategori_laporan = $request->kategori_laporan;
        $laporankeuangan->saldo_sebelum = $request->saldo_sebelum;

        if (!$laporankeuangan->save()) {
            if (count($arrName) > 1) {
                foreach ($arrName as $path) {
                    unlink(public_path() . $path);
                }
            }
        }
        return redirect()->route("bendahara.laporankeuangan");
    }

    public function ubahlaporankeuangan($id){
        $laporankeuangan = DB::table('laporan_keuangan')->where('id', $id)->get();
        return view('bendahara.formubahlaporankeuangan', ['laporankeuangan'=>$laporankeuangan]);
    }

    public function ubahlaporankeuanganprocess(Request $request, $id){
        $laporankeuangan = LaporanKeuangan::find($id);
        $laporankeuangan->update($request->all());

        return redirect()->route('bendahara.laporankeuangan')->with('success', 'Data Keuangan berhasil diperbarui');
    }

    public function ubahstatuslaporan($id){
        $laporankeuangan = LaporanKeuangan::find($id);
        $laporankeuangan->update(['status_laporan'=>'Non-Aktif']);

        return redirect()->route('bendahara.laporankeuangan')->with('success', 'Data Keuangan berhasil diperbarui');
    }
    
    public function statistik(){
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

        return view('bendahara.statistikkeuangan',['bulan'=>$bulan,'totalpemasukan'=>$totalpemasukan,'totalpengeluaran'=>$totalpengeluaran]);
       
    }
    
    public function ubahstatuslaporan2($id){
        $laporankeuangan = LaporanKeuangan::find($id);
        $laporankeuangan->update(['status_laporan'=>'Aktif']);

        return redirect()->route('bendahara.laporankeuangannonaktif')->with('success', 'Data Keuangan berhasil diperbarui');
    }

     public function caridanapemasukan(){
        return view('bendahara.formcaridanapemasukan');
    }
    
    public function pemasukan(){
        if(request('tAwal') && request('tAkhir')){
            $tAwal = request('tAwal');
            $tAkhir = request('tAkhir');
            $danapemasukan = Keuangan::where(["jenis_keuangan"=>"pemasukan", "status_keuangan"=>"Aktif"])
            ->whereBetween('tanggal',[$tAwal,$tAkhir])->get();
            $totalpemasukan = Keuangan::select("jenis_keuangan", DB::raw('SUM(nominal) as total'))
            ->groupBy("jenis_keuangan")->where('jenis_keuangan','Pemasukan')->where('status_keuangan','Aktif')
            ->whereBetween('tanggal',[$tAwal,$tAkhir])->get();
            return view('bendahara.danapemasukan',['danapemasukan'=>$danapemasukan,'totalpemasukan'=> $totalpemasukan]);
           
        }else{
            return view('bendahara.formcaridanapemasukan');
        }
    }
    
    public function caridanapengeluaran(){
        return view('bendahara.formcaridanapengeluaran');
    }
    
    public function pengeluaran(){
        if(request('tAwal') && request('tAkhir')){
            $tAwal = request('tAwal');
            $tAkhir = request('tAkhir');
            $danapengeluaran = Keuangan::where(["jenis_keuangan"=>"pengeluaran", "status_keuangan"=>"Aktif"])
            ->whereBetween('tanggal',[$tAwal,$tAkhir])->get();
            $totalpengeluaran = Keuangan::select("jenis_keuangan", DB::raw('SUM(nominal) as total'))
            ->groupBy("jenis_keuangan")->where('jenis_keuangan','Pengeluaran')->where('status_keuangan','Aktif')
            ->whereBetween('tanggal',[$tAwal,$tAkhir])->get();
            return view('bendahara.danapengeluaran',['danapengeluaran'=>$danapengeluaran,'totalpengeluaran'=> $totalpengeluaran]);
           
        }else{
            return view('bendahara.formcaridanapengeluaran');
        }
    }

    public function carilaporanmingguan(){  
        return view('bendahara.formcarilaporanmingguan');
           
    }

    public function processcarilaporanmingguan(){
        if(request('month')){     
            $input = request('month');         
            $date = Carbon::createFromFormat('Y-m', $input);
            $format = $date->format('m');
            $laporankeuangan =LaporanKeuangan::whereYear('tanggal_awal',$input)->whereMonth('tanggal_awal',"=",$format)->OrderBy('tanggal_awal', 'ASC')->where('kategori_laporan','Mingguan')->where('status_laporan','Aktif')->get();
            return view('bendahara.laporankeuanganmingguan',compact('laporankeuangan'));

        }else{
            return view('bendahara.formcarilaporanmingguan');
        }
    }
    
    public function pdfmmingguan($tanggal_awal,$tanggal_akhir, $id){
        LaporanKeuangan::find($id);
        LaporanKeuangan::find($tanggal_awal);
        LaporanKeuangan::find($tanggal_akhir);
       

        $namalaporan = LaporanKeuangan::all()->where('id', $id);
        $laporanpemasukan = Keuangan::whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('jenis_keuangan','Pemasukan')->where('status_keuangan','Aktif')->get();
        $laporanpengeluaran = Keuangan::whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('jenis_keuangan','Pengeluaran')->where('status_keuangan','Aktif')->get();
        $totalpemasukan = Keuangan::select("jenis_keuangan", DB::raw('SUM(nominal) as total'))
            ->groupBy("jenis_keuangan")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])
            ->where('jenis_keuangan','Pemasukan')->where('status_keuangan','Aktif')->get();       
        $totalpengeluaran = Keuangan::select("jenis_keuangan", DB::raw('SUM(nominal) as total'))
            ->groupBy("jenis_keuangan")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])
            ->where('jenis_keuangan','Pengeluaran')->where('status_keuangan','Aktif')->get();
        
        

        return view('bendahara.cetakmasukmingguan', [
            'laporanpemasukan'=>$laporanpemasukan,'laporanpengeluaran'=>$laporanpengeluaran,
            'totalpengeluaran'=>$totalpengeluaran,
            'totalpemasukan' => $totalpemasukan, 'namalaporan'=>$namalaporan
        ]);
    }

    public function carilaporanbulanan(){  
        return view('bendahara.formcarilaporanbulanan');
           
    }

    public function processcarilaporanbulanan(){
        if(request('tahun')){
            $laporankeuangan = DB::select("SELECT * FROM laporan_keuangan WHERE YEAR(tanggal_awal) = " .request("tahun"). " AND kategori_laporan = 'Bulanan' AND status_laporan='Aktif'");
            return view('bendahara.laporankeuanganbulanan',compact('laporankeuangan'));
        }else{
            return view('bendahara.formcarilaporanbulanan');
        }
    }

    public function carilaporantahunan(){  
        return view('bendahara.formcarilaporantahunan');
           
    }

    public function processcarilaporantahunan(){
        if(request('tahun')){
            $laporankeuangan = DB::select("SELECT * FROM laporan_keuangan WHERE YEAR(tanggal_awal) = " .request("tahun"). " AND kategori_laporan = 'Tahunan' AND status_laporan='Aktif'");
            return view('bendahara.laporankeuangantahunan',compact('laporankeuangan'));
        }else{
            return view('bendahara.formcarilaporantahunan');
        }
    }

    public function laporanmingguan($tanggal_awal,$tanggal_akhir, $id){
        LaporanKeuangan::find($id);
        LaporanKeuangan::find($tanggal_awal);
        LaporanKeuangan::find($tanggal_akhir);
       

        $namalaporan = LaporanKeuangan::all()->where('id', $id);
        $laporanpemasukan = Keuangan::whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('jenis_keuangan','Pemasukan')->where('status_keuangan','Aktif')->get();
        $laporanpengeluaran = Keuangan::whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('jenis_keuangan','Pengeluaran')->where('status_keuangan','Aktif')->get();
        $totalpemasukan = Keuangan::select("jenis_keuangan", DB::raw('SUM(nominal) as total'))
            ->groupBy("jenis_keuangan")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])
            ->where('jenis_keuangan','Pemasukan')->where('status_keuangan','Aktif')->get();       
        $totalpengeluaran = Keuangan::select("jenis_keuangan", DB::raw('SUM(nominal) as total'))
            ->groupBy("jenis_keuangan")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])
            ->where('jenis_keuangan','Pengeluaran')->where('status_keuangan','Aktif')->get();
        
        

        return view('bendahara.laporanmingguan', [
            'laporanpemasukan'=>$laporanpemasukan,'laporanpengeluaran'=>$laporanpengeluaran,
            'totalpengeluaran'=>$totalpengeluaran,
            'totalpemasukan' => $totalpemasukan, 'namalaporan'=>$namalaporan
        ]);

    }

    public function laporanbulanan($tanggal_awal,$tanggal_akhir, $id){
        LaporanKeuangan::find($id);
        LaporanKeuangan::find($tanggal_awal);
        LaporanKeuangan::find($tanggal_akhir);

        $namalaporan = LaporanKeuangan::all()->where('id', $id);

        $laporanbulanan1 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Persembahan')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $laporanbulanan2 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Bakti Bulanan dan Pembangunan')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $laporanbulanan3 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Administrasi')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $laporanbulanan4 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Ucapan Syukur')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $laporanbulanan5 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Penggalangan Dana')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $laporanbulanan6 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Penggalangan Dana Eksternal')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $laporanbulanan7 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Sewa Gedung Aula')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $totalpemasukan = Keuangan::select("jenis_keuangan", DB::raw('SUM(nominal) as total'))
            ->groupBy("jenis_keuangan")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('jenis_keuangan','Pemasukan')->where('status_keuangan','Aktif')->get();
        $totalkategori1 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Persembahan')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $totalkategori2 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Bakti Bulanan dan Pembangunan')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $totalkategori3 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Administrasi')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $totalkategori4 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Ucapan Syukur')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $totalkategori5 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Penggalangan Dana')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $totalkategori6 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Penggalangan Dana Eksternal')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $totalkategori7 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Sewa Gedung Aula')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();

        
        $laporanbulanan8 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Biaya Pelayanan Rutin')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporanbulanan9 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Operasional Gereja')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporanbulanan10 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Tahun Gerejawi dan Ulang Tahun Gereja')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporanbulanan11 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Pembangunan')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporanbulanan12 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Penggalangan Dana')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporanbulanan13 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Diakonia')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporanbulanan14 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Pendidikan')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporanbulanan15 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Seksi Nyanyian dan Koor')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporanbulanan16 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Pembinaan Kategorial')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporanbulanan17 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Biaya Natal dan Tahun Baru')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporanbulanan18 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Pihak Lain')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporanbulanan19 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Hari Besar Gereja')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporanbulanan20 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Pembangunan Jangka Panjang')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalpengeluaran = Keuangan::select("jenis_keuangan", DB::raw('SUM(nominal) as total'))
        ->groupBy("jenis_keuangan")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('jenis_keuangan','Pengeluaran')->where('status_keuangan','Aktif')->get();
        $totalkategori8 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Biaya Pelayanan Rutin')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori9 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Operasional Gereja')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori10 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Tahun Gerejawi dan Ulang Tahun Gereja')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori11 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Pembangunan')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori12 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Penggalangan Dana')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori13= Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Diakonia')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori14 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Pendidikan')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori15 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Seksi Nyanyian dan Koor')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori16 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Pembinaan Kategorial')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori17 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Biaya Natal dan Tahun Baru')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori18 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Pihak Lain')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori19 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Hari Besar Gereja')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori20 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Pembangunan Jangka Panjang')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();

        return view('bendahara.laporanbulanan', [
            'laporanbulanan1' => $laporanbulanan1,'laporanbulanan2'=> $laporanbulanan2,
            'laporanbulanan3' => $laporanbulanan3,'laporanbulanan4'=> $laporanbulanan4,
            'laporanbulanan5' => $laporanbulanan5,'laporanbulanan6'=> $laporanbulanan6,
            'laporanbulanan7' => $laporanbulanan7,'laporanbulanan8'=> $laporanbulanan8,
            'laporanbulanan9' => $laporanbulanan9,'laporanbulanan10'=> $laporanbulanan10,
            'laporanbulanan11' => $laporanbulanan11,'laporanbulanan12'=> $laporanbulanan12,
            'laporanbulanan13' => $laporanbulanan13,'laporanbulanan14'=> $laporanbulanan14,
            'laporanbulanan15' => $laporanbulanan15,'laporanbulanan16'=> $laporanbulanan16,
            'laporanbulanan17' => $laporanbulanan17,'laporanbulanan18'=> $laporanbulanan18,
            'laporanbulanan19' => $laporanbulanan19,'laporanbulanan20'=> $laporanbulanan20,
            'totalpengeluaran'=> $totalpengeluaran,
            'totalpemasukan' => $totalpemasukan, 'namalaporan'=>$namalaporan,
            'totalkategori1'=>$totalkategori1,'totalkategori2'=>$totalkategori2,
            'totalkategori3'=>$totalkategori3,'totalkategori4'=>$totalkategori4,
            'totalkategori5'=>$totalkategori5,'totalkategori6'=>$totalkategori6,
            'totalkategori7'=>$totalkategori7,'totalkategori8'=>$totalkategori8,
            'totalkategori9'=>$totalkategori9,'totalkategori10'=>$totalkategori10,
            'totalkategori11'=>$totalkategori11,'totalkategori12'=>$totalkategori12,
            'totalkategori13'=>$totalkategori13,'totalkategori14'=>$totalkategori14,
            'totalkategori15'=>$totalkategori15,'totalkategori16'=>$totalkategori16,
            'totalkategori17'=>$totalkategori17,'totalkategori18'=>$totalkategori18,
            'totalkategori19'=>$totalkategori19,'totalkategori20'=>$totalkategori20
        ]);  
    }
    
     public function pdfmbulanan($tanggal_awal,$tanggal_akhir, $id){
        LaporanKeuangan::find($id);
        LaporanKeuangan::find($tanggal_awal);
        LaporanKeuangan::find($tanggal_akhir);

        $namalaporan = LaporanKeuangan::all()->where('id', $id);

        $laporanbulanan1 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Persembahan')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $laporanbulanan2 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Bakti Bulanan dan Pembangunan')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $laporanbulanan3 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Administrasi')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $laporanbulanan4 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Ucapan Syukur')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $laporanbulanan5 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Penggalangan Dana')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $laporanbulanan6 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Penggalangan Dana Eksternal')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $laporanbulanan7 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Sewa Gedung Aula')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $totalpemasukan = Keuangan::select("jenis_keuangan", DB::raw('SUM(nominal) as total'))
            ->groupBy("jenis_keuangan")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('jenis_keuangan','Pemasukan')->where('status_keuangan','Aktif')->get();
        $totalkategori1 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Persembahan')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $totalkategori2 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Bakti Bulanan dan Pembangunan')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $totalkategori3 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Administrasi')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $totalkategori4 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Ucapan Syukur')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $totalkategori5 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Penggalangan Dana')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $totalkategori6 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Penggalangan Dana Eksternal')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $totalkategori7 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Sewa Gedung Aula')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();

        
        $laporanbulanan8 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Biaya Pelayanan Rutin')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporanbulanan9 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Operasional Gereja')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporanbulanan10 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Tahun Gerejawi dan Ulang Tahun Gereja')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporanbulanan11 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Pembangunan')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporanbulanan12 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Penggalangan Dana')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporanbulanan13 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Diakonia')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporanbulanan14 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Pendidikan')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporanbulanan15 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Seksi Nyanyian dan Koor')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporanbulanan16 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Pembinaan Kategorial')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporanbulanan17 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Biaya Natal dan Tahun Baru')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporanbulanan18 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Pihak Lain')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporanbulanan19 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Hari Besar Gereja')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporanbulanan20 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Pembangunan Jangka Panjang')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalpengeluaran = Keuangan::select("jenis_keuangan", DB::raw('SUM(nominal) as total'))
        ->groupBy("jenis_keuangan")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('jenis_keuangan','Pengeluaran')->where('status_keuangan','Aktif')->get();
        $totalkategori8 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Biaya Pelayanan Rutin')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori9 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Operasional Gereja')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori10 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Tahun Gerejawi dan Ulang Tahun Gereja')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori11 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Pembangunan')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori12 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Penggalangan Dana')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori13= Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Diakonia')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori14 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Pendidikan')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori15 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Seksi Nyanyian dan Koor')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori16 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Pembinaan Kategorial')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori17 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Biaya Natal dan Tahun Baru')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori18 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Pihak Lain')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori19 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Hari Besar Gereja')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori20 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Pembangunan Jangka Panjang')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();

        return view('bendahara.cetakmasukbulanan', [
            'laporanbulanan1' => $laporanbulanan1,'laporanbulanan2'=> $laporanbulanan2,
            'laporanbulanan3' => $laporanbulanan3,'laporanbulanan4'=> $laporanbulanan4,
            'laporanbulanan5' => $laporanbulanan5,'laporanbulanan6'=> $laporanbulanan6,
            'laporanbulanan7' => $laporanbulanan7,'laporanbulanan8'=> $laporanbulanan8,
            'laporanbulanan9' => $laporanbulanan9,'laporanbulanan10'=> $laporanbulanan10,
            'laporanbulanan11' => $laporanbulanan11,'laporanbulanan12'=> $laporanbulanan12,
            'laporanbulanan13' => $laporanbulanan13,'laporanbulanan14'=> $laporanbulanan14,
            'laporanbulanan15' => $laporanbulanan15,'laporanbulanan16'=> $laporanbulanan16,
            'laporanbulanan17' => $laporanbulanan17,'laporanbulanan18'=> $laporanbulanan18,
            'laporanbulanan19' => $laporanbulanan19,'laporanbulanan20'=> $laporanbulanan20,
            'totalpengeluaran'=> $totalpengeluaran,
            'totalpemasukan' => $totalpemasukan, 'namalaporan'=>$namalaporan,
            'totalkategori1'=>$totalkategori1,'totalkategori2'=>$totalkategori2,
            'totalkategori3'=>$totalkategori3,'totalkategori4'=>$totalkategori4,
            'totalkategori5'=>$totalkategori5,'totalkategori6'=>$totalkategori6,
            'totalkategori7'=>$totalkategori7,'totalkategori8'=>$totalkategori8,
            'totalkategori9'=>$totalkategori9,'totalkategori10'=>$totalkategori10,
            'totalkategori11'=>$totalkategori11,'totalkategori12'=>$totalkategori12,
            'totalkategori13'=>$totalkategori13,'totalkategori14'=>$totalkategori14,
            'totalkategori15'=>$totalkategori15,'totalkategori16'=>$totalkategori16,
            'totalkategori17'=>$totalkategori17,'totalkategori18'=>$totalkategori18,
            'totalkategori19'=>$totalkategori19,'totalkategori20'=>$totalkategori20
        ]);  
    }

    public function laporantahunan($tanggal_awal,$tanggal_akhir, $id){
        LaporanKeuangan::find($id);
        LaporanKeuangan::find($tanggal_awal);
        LaporanKeuangan::find($tanggal_akhir);

        $namalaporan = LaporanKeuangan::all()->where('id', $id);

        $laporantahunan1 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Persembahan')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $laporantahunan2 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Bakti Bulanan dan Pembangunan')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $laporantahunan3 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Administrasi')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $laporantahunan4 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Ucapan Syukur')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $laporantahunan5 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Penggalangan Dana')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $laporantahunan6 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Penggalangan Dana Eksternal')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $laporantahunan7 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Sewa Gedung Aula')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $totalpemasukan = Keuangan::select("jenis_keuangan", DB::raw('SUM(nominal) as total'))
            ->groupBy("jenis_keuangan")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('jenis_keuangan','Pemasukan')->where('status_keuangan','Aktif')->get();
            $totalkategori1 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Persembahan')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
            $totalkategori2 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Bakti Bulanan dan Pembangunan')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
            $totalkategori3 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Administrasi')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
            $totalkategori4 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Ucapan Syukur')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
            $totalkategori5 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Penggalangan Dana')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
            $totalkategori6 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Penggalangan Dana Eksternal')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
            $totalkategori7 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Sewa Gedung Aula')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();

        $laporantahunan8 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Biaya Pelayanan Rutin')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporantahunan9 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Operasional Gereja')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporantahunan10 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Tahun Gerejawi dan Ulang Tahun Gereja')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporantahunan11 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Pembangunan')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporantahunan12 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Penggalangan Dana')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporantahunan13 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Diakonia')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporantahunan14 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Pendidikan')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporantahunan15 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Seksi Nyanyian dan Koor')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporantahunan16 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Pembinaan Kategorial')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporantahunan17 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Biaya Natal dan Tahun Baru')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporantahunan18 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Pihak Lain')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporantahunan19 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Hari Besar Gereja')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporantahunan20 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Pembangunan Jangka Panjang')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalpengeluaran = Keuangan::select("jenis_keuangan", DB::raw('SUM(nominal) as total'))
        ->groupBy("jenis_keuangan")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('jenis_keuangan','Pengeluaran')->where('status_keuangan','Aktif')->get();
        $totalkategori8 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Biaya Pelayanan Rutin')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori9 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Operasional Gereja')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori10 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Tahun Gerejawi dan Ulang Tahun Gereja')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori11 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Pembangunan')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori12 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Penggalangan Dana')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori13= Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Diakonia')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori14 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Pendidikan')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori15 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Seksi Nyanyian dan Koor')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori16 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Pembinaan Kategorial')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori17 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Biaya Natal dan Tahun Baru')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori18 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Pihak Lain')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori19 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Hari Besar Gereja')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori20 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Pembangunan Jangka Panjang')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();

        return view('bendahara.laporantahunan', [
            'laporantahunan1' => $laporantahunan1,'laporantahunan2'=> $laporantahunan2,
            'laporantahunan3' => $laporantahunan3,'laporantahunan4'=> $laporantahunan4,
            'laporantahunan5' => $laporantahunan5,'laporantahunan6'=> $laporantahunan6,
            'laporantahunan7' => $laporantahunan7,'laporantahunan8'=> $laporantahunan8,
            'laporantahunan9' => $laporantahunan9,'laporantahunan10'=> $laporantahunan10,
            'laporantahunan11' => $laporantahunan11,'laporantahunan12'=> $laporantahunan12,
            'laporantahunan13' => $laporantahunan13,'laporantahunan14'=> $laporantahunan14,
            'laporantahunan15' => $laporantahunan15,'laporantahunan16'=> $laporantahunan16,
            'laporantahunan17' => $laporantahunan17,'laporantahunan18'=> $laporantahunan18,
            'laporantahunan19' => $laporantahunan19,'laporantahunan20'=> $laporantahunan20,
            'totalpengeluaran'=> $totalpengeluaran,
            'totalpemasukan' => $totalpemasukan, 'namalaporan'=>$namalaporan,
            'totalkategori1'=>$totalkategori1,'totalkategori2'=>$totalkategori2,
            'totalkategori3'=>$totalkategori3,'totalkategori4'=>$totalkategori4,
            'totalkategori5'=>$totalkategori5,'totalkategori6'=>$totalkategori6,
            'totalkategori7'=>$totalkategori7,'totalkategori8'=>$totalkategori8,
            'totalkategori9'=>$totalkategori9,'totalkategori10'=>$totalkategori10,
            'totalkategori11'=>$totalkategori11,'totalkategori12'=>$totalkategori12,
            'totalkategori13'=>$totalkategori13,'totalkategori14'=>$totalkategori14,
            'totalkategori15'=>$totalkategori15,'totalkategori16'=>$totalkategori16,
            'totalkategori17'=>$totalkategori17,'totalkategori18'=>$totalkategori18,
            'totalkategori19'=>$totalkategori19,'totalkategori20'=>$totalkategori20
        ]);  
    }
    
    public function pdfmtahunan($tanggal_awal,$tanggal_akhir, $id){
        LaporanKeuangan::find($id);
        LaporanKeuangan::find($tanggal_awal);
        LaporanKeuangan::find($tanggal_akhir);

        $namalaporan = LaporanKeuangan::all()->where('id', $id);

        $laporantahunan1 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Persembahan')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $laporantahunan2 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Bakti Bulanan dan Pembangunan')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $laporantahunan3 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Administrasi')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $laporantahunan4 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Ucapan Syukur')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $laporantahunan5 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Penggalangan Dana')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $laporantahunan6 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Penggalangan Dana Eksternal')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $laporantahunan7 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Sewa Gedung Aula')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $totalpemasukan = Keuangan::select("jenis_keuangan", DB::raw('SUM(nominal) as total'))
            ->groupBy("jenis_keuangan")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('jenis_keuangan','Pemasukan')->where('status_keuangan','Aktif')->get();
            $totalkategori1 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Persembahan')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
            $totalkategori2 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Bakti Bulanan dan Pembangunan')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
            $totalkategori3 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Administrasi')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
            $totalkategori4 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Ucapan Syukur')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
            $totalkategori5 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Penggalangan Dana')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
            $totalkategori6 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Penggalangan Dana Eksternal')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
            $totalkategori7 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Sewa Gedung Aula')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();

        $laporantahunan8 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Biaya Pelayanan Rutin')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporantahunan9 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Operasional Gereja')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporantahunan10 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Tahun Gerejawi dan Ulang Tahun Gereja')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporantahunan11 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Pembangunan')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporantahunan12 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Penggalangan Dana')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporantahunan13 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Diakonia')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporantahunan14 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Pendidikan')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporantahunan15 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Seksi Nyanyian dan Koor')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporantahunan16 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Pembinaan Kategorial')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporantahunan17 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Biaya Natal dan Tahun Baru')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporantahunan18 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Pihak Lain')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporantahunan19 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Hari Besar Gereja')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporantahunan20 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Pembangunan Jangka Panjang')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalpengeluaran = Keuangan::select("jenis_keuangan", DB::raw('SUM(nominal) as total'))
        ->groupBy("jenis_keuangan")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('jenis_keuangan','Pengeluaran')->where('status_keuangan','Aktif')->get();
        $totalkategori8 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Biaya Pelayanan Rutin')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori9 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Operasional Gereja')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori10 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Tahun Gerejawi dan Ulang Tahun Gereja')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori11 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Pembangunan')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori12 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Penggalangan Dana')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori13= Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Diakonia')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori14 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Pendidikan')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori15 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Seksi Nyanyian dan Koor')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori16 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Pembinaan Kategorial')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori17 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Biaya Natal dan Tahun Baru')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori18 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Pihak Lain')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori19 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Hari Besar Gereja')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori20 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Pembangunan Jangka Panjang')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();

        return view('bendahara.cetakmasuktahunan', [
            'laporantahunan1' => $laporantahunan1,'laporantahunan2'=> $laporantahunan2,
            'laporantahunan3' => $laporantahunan3,'laporantahunan4'=> $laporantahunan4,
            'laporantahunan5' => $laporantahunan5,'laporantahunan6'=> $laporantahunan6,
            'laporantahunan7' => $laporantahunan7,'laporantahunan8'=> $laporantahunan8,
            'laporantahunan9' => $laporantahunan9,'laporantahunan10'=> $laporantahunan10,
            'laporantahunan11' => $laporantahunan11,'laporantahunan12'=> $laporantahunan12,
            'laporantahunan13' => $laporantahunan13,'laporantahunan14'=> $laporantahunan14,
            'laporantahunan15' => $laporantahunan15,'laporantahunan16'=> $laporantahunan16,
            'laporantahunan17' => $laporantahunan17,'laporantahunan18'=> $laporantahunan18,
            'laporantahunan19' => $laporantahunan19,'laporantahunan20'=> $laporantahunan20,
            'totalpengeluaran'=> $totalpengeluaran,
            'totalpemasukan' => $totalpemasukan, 'namalaporan'=>$namalaporan,
            'totalkategori1'=>$totalkategori1,'totalkategori2'=>$totalkategori2,
            'totalkategori3'=>$totalkategori3,'totalkategori4'=>$totalkategori4,
            'totalkategori5'=>$totalkategori5,'totalkategori6'=>$totalkategori6,
            'totalkategori7'=>$totalkategori7,'totalkategori8'=>$totalkategori8,
            'totalkategori9'=>$totalkategori9,'totalkategori10'=>$totalkategori10,
            'totalkategori11'=>$totalkategori11,'totalkategori12'=>$totalkategori12,
            'totalkategori13'=>$totalkategori13,'totalkategori14'=>$totalkategori14,
            'totalkategori15'=>$totalkategori15,'totalkategori16'=>$totalkategori16,
            'totalkategori17'=>$totalkategori17,'totalkategori18'=>$totalkategori18,
            'totalkategori19'=>$totalkategori19,'totalkategori20'=>$totalkategori20
        ]);  
    }
}
