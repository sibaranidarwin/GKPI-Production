<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Keuangan;
use App\LaporanKeuangan;
use App\laporankeuangankeluarga;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class KeuanganJemaatController extends Controller
{
    public function index(){
        $datakeuangan = Keuangan::all()->where('status_keuangan','Aktif');
        return view('jemaat.datakeuangan',compact('datakeuangan'));
    }
    public function index2(){
        $datakeuangan = Keuangan::all()->where('status_keuangan','Non-Aktif');
        return view('jemaat.datakeuangannonaktif',compact('datakeuangan'));
    } 
    
    public function keuangankeluarga(){

        // $user_keluarga = StaticVariable::$user->no_kk;
        // dd($user_keluarga);

        $keuangankeluarga1 = laporankeuangankeluarga::paginate(50)->where('jenis_keuangan','Bakti Bulanan');
        $keuangankeluarga2 = laporankeuangankeluarga::paginate(50)->where('jenis_keuangan','Bakti Pembangunan');
        $keuangankeluarga3 = laporankeuangankeluarga::paginate(50)->where('jenis_keuangan','Ucapan syukur');
        return view('jemaat.laporankeuangankeluarga', 
        ['keuangankeluarga1'=>$keuangankeluarga1,
        'keuangankeluarga2'=>$keuangankeluarga2,
        'keuangankeluarga3'=>$keuangankeluarga3]);
    }

    function formkeuangan(Request $request)
    {
        return view("jemaat.formtambahkeuangan");
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
        return redirect()->route('jemaat.datakeuangan');
    }

    public function ubahkeuangan($id){
        $keuangan = DB::table('keuangan')->where('id', $id)->get();
        return view('jemaat.formubahkeuangan', ['keuangan'=>$keuangan]);
    }

    public function updatekeuangan(Request $request, $id){
        $keuangan = Keuangan::find($id);
        $keuangan->update($request->all());

        return redirect()->route('jemaat.datakeuangan')->with('success', 'Data Keuangan berhasil diperbarui');
    }

    public function ubahstatuskeuangan($id){
        $keuangan = Keuangan::find($id);
        $keuangan->update(['status_keuangan'=>'Non-Aktif']);

        return redirect()->route('jemaat.datakeuangan')->with('success', 'Data Keuangan berhasil diperbarui');
    }

    public function ubahstatuskeuangan2($id){
        $keuangan = Keuangan::find($id);
        $keuangan->update(['status_keuangan'=>'Aktif']);

        return redirect()->route('jemaat.datakeuangannonaktif')->with('success', 'Data Keuangan berhasil diperbarui');
    }
    
    public function laporan(){
        $laporankeuangan = LaporanKeuangan::all()->where('status_laporan','Aktif');
        return view("jemaat.laporankeuangan",compact('laporankeuangan'));
    }

    public function laporan2(){
        $laporankeuangan = LaporanKeuangan::all()->where('status_laporan','Non-Aktif');
        return view("jemaat.laporankeuangannonaktif",compact('laporankeuangan'));
    }

    public function laporankeuangan(Request $request){
        return view("jemaat.formtambahlaporankeuangan");
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
        return redirect()->route("jemaat.laporankeuangan");
    }

    public function ubahlaporankeuangan($id){
        $laporankeuangan = DB::table('laporan_keuangan')->where('id', $id)->get();
        return view('jemaat.formubahlaporankeuangan', ['laporankeuangan'=>$laporankeuangan]);
    }

    public function ubahlaporankeuanganprocess(Request $request, $id){
        $laporankeuangan = LaporanKeuangan::find($id);
        $laporankeuangan->update($request->all());

        return redirect()->route('jemaat.laporankeuangan')->with('success', 'Data Keuangan berhasil diperbarui');
    }

    public function ubahstatuslaporan($id){
        $laporankeuangan = LaporanKeuangan::find($id);
        $laporankeuangan->update(['status_laporan'=>'Non-Aktif']);

        return redirect()->route('jemaat.laporankeuangan')->with('success', 'Data Keuangan berhasil diperbarui');
    }

    public function ubahstatuslaporan2($id){
        $laporankeuangan = LaporanKeuangan::find($id);
        $laporankeuangan->update(['status_laporan'=>'Aktif']);

        return redirect()->route('jemaat.laporankeuangannonaktif')->with('success', 'Data Keuangan berhasil diperbarui');
    }

     public function caridanapemasukan(){
        return view('jemaat.formcaridanapemasukan');
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
            return view('jemaat.danapemasukan',['danapemasukan'=>$danapemasukan,'totalpemasukan'=> $totalpemasukan]);
           
        }else{
            return view('jemaat.formcaridanapemasukan');
        }
    }
    
    public function caridanapengeluaran(){
        return view('jemaat.formcaridanapengeluaran');
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
            return view('jemaat.danapengeluaran',['danapengeluaran'=>$danapengeluaran,'totalpengeluaran'=> $totalpengeluaran]);
           
        }else{
            return view('jemaat.formcaridanapengeluaran');
        }
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

        return view('jemaat.statistikkeuangan',['bulan'=>$bulan,'totalpemasukan'=>$totalpemasukan,'totalpengeluaran'=>$totalpengeluaran]);
       
    }
    
}
