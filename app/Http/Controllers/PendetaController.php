<?php

namespace App\Http\Controllers;

use App\jadwal_ibadah;
use App\WartaJemaat;
use App\Jemaat;
use App\jemaat_perminggu;
use App\Administrasi;
use App\Renungan;
use App\Keluarga;
use App\PelayanGereja;
use App\KeluargaJemaat;
use App\tata_ibadah;
use App\Sektor;
use App\acara_ibadah;
use App\Kegiatan;
use PDF;

use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;

class PendetaController extends Controller
{
    //
    function index(Request $request)
    {
        return view("Pendeta.index");
    }
    function datakeluarga(Request $request)
    {
        $datakeluarga = [
            [
                "name" => "JUMLAH KELUARGA",
                "jumlah" => Keluarga::count(),
                "color" => "bg-danger",
            ],
            [
                "name" => "JUMLAH JEMAAT",
                "jumlah" => Jemaat::all()->count(),
                "color" => "bg-primary",
            ],
            [
                "name" => "JUMLAH JEMAAT AKTIF",
                "jumlah" => Jemaat::all()->where("status", "Aktif")->count(),
                "color" => "bg-info",
            ],
        ];
        // Change this pagination if you want to increase pagination
        $keluarga = Keluarga::with(['jemaat', 'jemaat.sektor'])->paginate(300);
        return view('Pendeta.datakeluarga', [
            "datakeluargas" => $datakeluarga,
            "keluargas" => $keluarga
        ]);
    }

    function formkeluarga(Request $request)
    {

        return view("Pendeta.formkeluarga");
    }
    function formkeluargaprocess(Request $request)
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
                    $file->move(public_path() . '/lampiran/keluarga/', $name);
                    array_push($arrName, '/lampiran/keluarga/' . $name);
                }
            }
        }
        $fileName = join("#", $arrName);

        $keluaraga = $request->validate([
            'no_kk'     => ['required', Rule::unique('keluarga')],
            'nama_keluarga'    => ['required'],
            'alamat'    => ['required'],
            'no_telepon'    => ['required'],
            'lampiran'    => ['required'],
            'alamat'    => ['required'],

        ]);

        $keluaraga = new Keluarga();
        $keluaraga->no_kk = $request->no_kk;
        $keluaraga->nama_keluarga = $request->nama_keluarga;
        $keluaraga->alamat = $request->alamat;
        $keluaraga->no_telepon = $request->no_telepon;
        $keluaraga->tanggal_nikah = $request->tanggal_nikah;
        $keluaraga->lampiran = $fileName;
        
        if (!$keluaraga->save()) {
            if (count($arrName) > 1) {
                foreach ($arrName as $path) {
                    unlink(public_path() . $path);
                }
            }
        }
        return redirect()->route('pendeta.datakeluarga')->with('success', 'Data Keluarga Berhasil Disimpan!');
    }

    function detailkeluarga(Request $request, $id)
    {
        $keluarga = Keluarga::with(['jemaat', 'jemaat.sektor'])->where('no_kk', $id)->first();
        // echo ($keluarga);
        $lampiran = explode("#", $keluarga['lampiran']);
        $jemaat = DB::select('Select j.*, jk.status, s.nama as sektor_name FROM jemaat j INNER JOIN jemaat_keluarga jk ON j.nik = jk.nik INNER JOIN sektor s ON s.id =j.sektor_id WHERE jk.no_kk = ?', [$id]);
        return view('Pendeta.detailkeluarga', ["keluarga" => $keluarga, 'lampiran' => $lampiran,  'jemaats' => $jemaat]);
    }
    public function editdatakeluarga($id)
    {
        $keluarga = Keluarga::with(['jemaat', 'jemaat.sektor'])->where('no_kk', $id)->first();
        // echo ($keluarga);
        $lampiran = explode("#", $keluarga['lampiran']);
        $jemaat = DB::select('Select j.*, jk.status, s.nama as sektor_name FROM jemaat j INNER JOIN jemaat_keluarga jk ON j.nik = jk.nik INNER JOIN sektor s ON s.id =j.sektor_id WHERE jk.no_kk = ?', [$id]);
        return view('Pendeta.editdatakeluarga', ["keluarga" => $keluarga, 'lampiran' => $lampiran,  'jemaats' => $jemaat]);
    }
    function update(Request $request) {
        $no_kk = $request->no_kk;
        DB::table('keluarga')->where('no_kk', $no_kk)->update([
            'no_kk' => $request->no_kk,
            'nama_keluarga' => $request->nama_keluarga,
            'no_telepon' => $request->no_telepon,
            'tanggal_nikah' => $request->tanggal_nikah,
            'alamat' => $request->alamat,
            'status' => $request->status
        ]);
        return redirect()->route('pendeta.datakeluarga')->with('success', 'Data Keluarga Berhasil Diubah!');
    }
    function datajemaat(){
        $datajemaat = [
            
            [
                "name" => "JUMLAH JEMAAT",
                "jumlah" => Jemaat::count(),
                "color" => "bg-danger",
            ],
            [
                "name" => "JUMLAH LAKI LAKI",
                "jumlah" => Jemaat::all()->where("jenis_kelamin", "Laki-laki")->count(),
                "color" => "bg-primary",
            ],
            [
                "name" => "JUMLAH PEREMPUAN",
                "jumlah" => Jemaat::all()->where("jenis_kelamin", "Perempuan")->count(),
                "color" => "bg-info",
            ],
        ];
        // Change this pagination if you want to increase pagination
        $jemaat = Jemaat::paginate(100);
        return view('Pendeta.datajemaat', [
            "datajemaats" => $datajemaat,
            "jemaats" => $jemaat
        ]);
    }
    
     function dataultah(){
        $datajemaat = [
            [
                "name" => "JUMLAH JEMAAT",
                "jumlah" => Jemaat::count(),
                "color" => "bg-danger",
            ],
            [
                "name" => "JUMLAH LAKI LAKI",
                "jumlah" => Jemaat::all()->where("jenis_kelamin", "Laki-laki")->count(),
                "color" => "bg-primary",
            ],
            [
                "name" => "JUMLAH PEREMPUAN",
                "jumlah" => Jemaat::all()->where("jenis_kelamin", "Perempuan")->count(),
                "color" => "bg-info",
            ],
        ];

        
        
        // Change this pagination if you want to increase pagination
        $now = CarbonImmutable::now()->locale('id_ID');
        $start_week = $now->startOfWeek(Carbon::MONDAY)->format('m-d');
        $end_week = $now->endOfWeek()->format('m-d');
        $jemaat =  Jemaat::whereRaw("DATE_FORMAT(tanggal_lahir, '%m-%d') BETWEEN '{$start_week}' AND '{$end_week}'")->where("Status", "Aktif")->get();
        
        return view('Pendeta.dataultah', [
            "datajemaats" => $datajemaat,
            "jemaats" => $jemaat
        ]);
    }

    function formjemaat(Request $request, $idKeluarga)
    {
        $sektors = Sektor::get();
        $keluarga = Keluarga::where('no_kk', $idKeluarga)->first();

        return view('Pendeta.formjemaat', ['sektors' => $sektors, 'keluarga' => $keluarga]);
    }

    function formjemaatprocess(Request $request, $idKeluarga)
    {
        $lampiran = [];
        $profile = "profile/default.png";
        if ($request->hasFile('lampiran')) {
            foreach ($request->file('lampiran') as $file) {
                $str = rand();
                $result = md5($str);
                $extension = $file->getClientOriginalExtension();
                $name = time() . "-" . $result . '.' . $extension;
                $file->move(public_path() . '/lampiran/jemaat/', $name);
                array_push($lampiran, '/lampiran/jemaat/' . $name);
            }
        }

        if ($request->hasFile("profile")) {
            $file = $request->file("profile");
            $extension = $file->getClientOriginalExtension();
            $str = rand();
            $result = md5($str);
            $name = time() . "-" . $result . '.' . $extension;

            $file->move(public_path() . '/profile/jemaat/', $name);

            $profile = '/profile/jemaat/' . $name;
        }
        $jemaat = $request->validate([
            'nik'     => ['required', Rule::unique('jemaat')],
            'name'    => ['required'],
            'username'    => ['required'],
            'alamat'    => ['required'],
            'tempat_lahir'    => ['required'],
            'tanggal_lahir'    => ['required','date','before:now'],
            'tanggal_baptis'    => ['required','after:tanggal_lahir'],
            'tanggal_sidih'    => ['required','after:tanggal_baptis'],
            'lampiran'    => ['required']
        ]);

        $jemaat = new Jemaat();
        $jemaat->nik = $request->nik;
        $jemaat->name = $request->name;
        $jemaat->username = $request->username;
        $jemaat->jenis_kelamin = $request->jenis_kelamin;
        echo( $request->jenis_kelamin);
        $jemaat->password = '$2y$10$6CKLlz1uX4TVdHzxgs1VseEzAuW7EncHNo2Pa/bsNWN2UMHCRqDtG';
        $jemaat->alamat = $request->alamat;
        $jemaat->alamat = $request->alamat;
        $jemaat->tempat_lahir = $request->tempat_lahir;
        $jemaat->tanggal_lahir = $request->tanggal_lahir;
        $jemaat->status = $request->status;
        $jemaat->status_pernikahan = $request->status_pernikahan;
        $jemaat->tanggal_baptis = $request->tanggal_baptis;
        $jemaat->tanggal_sidih = $request->tanggal_sidih;
        $jemaat->sektor_role = $request->sektor_role;
        $jemaat->profile = $profile;
        $jemaat->sektor_id = $request->sektor_id;
        $jemaat->lampiran = join("#", $lampiran);


        if (!$jemaat->save()) {
            unlink(public_path() . $profile);
            foreach ($lampiran as $l) {
                unlink(public_path() . $l);
            }
        } else {
            $jemaat_keluarga = new KeluargaJemaat();
            $jemaat_keluarga->nik = $request->nik;
            $jemaat_keluarga->no_kk = $idKeluarga;
            $jemaat_keluarga->status = $request->posisi_di_keluarga;

            if (!$jemaat_keluarga->save()) {
                Jemaat::where("nik", $request->nik)->delete();
                unlink(public_path() . $profile);
                foreach ($lampiran as $l) {
                    unlink(public_path() . $l);
                }
            }

            return redirect('/pendeta/data/keluarga/' . $idKeluarga)->with('success', 'Data Jemaat Berhasil Disimpan!');
        }
    }
    
    function datastatistik(){
        $datastatistik = [
               [
                "name" => "JUMLAH KELUARGA",
                "jumlah" => Keluarga::count(),
                "color" => "bg-danger",
            ],
                [
                    "name"=> "JUMLAH JEMAAT",
                    "jumlah"=> Jemaat::count(),
                    "color"=> "bg-success",
                ],
                 [
                    "name"=> "JUMLAH JEMAAT AKTIF",
                    "jumlah"=> Jemaat::all()->where("status", "Aktif")->count(),
                    "color"=> "bg-primary",
                ],
                  [
                    "name"=> "JUMLAH JEMAAT MENINGGAL",
                    "jumlah"=> Jemaat::all()->where("status", "Meninggal")->count(),
                    "color"=> "bg-yellow",
                ],
                  [
                    "name"=> "JUMLAH JEMAAT LAHIR",
                    "jumlah"=> Jemaat::all()->where("status", "Lahir")->count(),
                    "color"=> "bg-pink",
                ],
                  [
                    "name"=> "JUMLAH JEMAAT PINDAH",
                    "jumlah"=> Jemaat::all()->where("status", "Pindah")->count(),
                    "color"=> "bg-info",
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

        $sektor = \App\Sektor::all();

        //Data Untuk Grafik
        $categories = [];

        foreach($sektor as $si){
            $categories[] = $si->nama;
        }

        // Change this pagination if you want to increase pagination
        $jemaat = Jemaat::all();
        $keluarga = keluarga::all();
        return view('Pendeta.datastatistik', [
            "datajemaats" => $datastatistik,
            "jemaats" => $jemaat,
            "keluargas" => $keluarga,
            "categories" => ['Jumlah Keluarga','Jumlah Jemaat','Jumlah Jemaat Aktif','Jumlah Jemaat Meninggal','Jumlah Jemaat Lahir','Jumlah Jemaat Pindah','Okuli','Letare','Josua','Aek Jordan','Estomihi','Rogate','Sion']
        ]);
    }
    function statistikkategorial(){
        $sektor = \App\Sektor::all();

        //Data Untuk Grafik
        $categories = [];

        foreach($sektor as $si){
            $categories[] = $si->nama;
        }

        // Change this pagination if you want to increase pagination
        $jemaat = Jemaat::paginate(10);
        return view('Pendeta.statistikkategorial', [
            "jemaats" => $jemaat,
            "categories" =>  $categories
        ]);
    }
    function detailjemaat(Request $request, $nik){
        $jemaat = Jemaat::where("nik", $nik)->first();
        $lampiran = explode("#", $jemaat['lampiran']);
        return view('Pendeta.detailjemaat', ['jemaat'=> $jemaat,'lampiran'=> $lampiran]);
    }
    function editdetailjemaat(Request $request, $nik){
        $jemaat = Jemaat::where("nik", $nik)->first();
        $lampiran = explode("#", $jemaat['lampiran']);
        return view('Pendeta.editdatajemaat', ['jemaat'=> $jemaat,'lampiran'=> $lampiran]);
    }
    function updateJemaat(Request $request) {
        $nik = $request->nik;
        DB::table('jemaat')->where('nik', $nik)->update([
            'nik' => $request->nik,
            'name' => $request->name,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'status' => $request->status,
            'status_pernikahan' => $request->status_pernikahan,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tanggal_baptis' => $request->tanggal_baptis,
            'tanggal_sidih' => $request->tanggal_sidih,
            'sektor_role' => $request->sektor_role
        ]);
        

        return back()->with('success', 'Data Jemaat Sudah Berhasil Diubah');
    }
    
    function jemaatperminggupendeta()
    {
        $statistik_jemaat = jemaat_perminggu::latest()->take(100)->get();
        
        return view('Pendeta.jemaatperminggupendeta', [
            "statistik_jemaats" => $statistik_jemaat
        ]);   
    }
    function jemaatseminggupendeta()
    {
        
        $now = CarbonImmutable::now()->locale('id_ID');
        $start_week = $now->startOfWeek(Carbon::MONDAY)->format('m-d');
        $end_week = $now->endOfWeek()->format('m-d');
        $statistik_jemaat =  jemaat_perminggu::whereRaw("DATE_FORMAT(tanggal_statis, '%m-%d') BETWEEN '{$start_week}' AND '{$end_week}'")->get();

        return view('Pendeta.jemaatseminggupendeta', [
            "statistik_jemaats" => $statistik_jemaat
        ]);   
        
    }
    function formdataperminggupendeta(Request $request)
    {

        return view("Pendeta.formdataperminggupendeta");
    }

    function formdatapermingguprosespendeta(Request $request)
    {
        $arrName = [];

        $statistik_jemaats = new jemaat_perminggu();
        
        $statistik_jemaats->tanggal_statis = $request->tanggal_statis;
        $statistik_jemaats->keterangan = $request->keterangan;
        $statistik_jemaats->jumlah_hadir = $request->jumlah_hadir;
        
        if (!$statistik_jemaats->save()) {
            if (count($arrName) > 1) {
                foreach ($arrName as $path) {
                    unlink(public_path() . $path);
                }
            }
        }
        return redirect('pendeta/jemaatperminggupendeta')->with('success', 'Data Pelayan Berhasil Disimpan!');
    }

    public function editdatajemaatperminggupendeta($id)
    {
        
        $statistik_jemaat = jemaat_perminggu::where('id', $id)->first();
            
        
        return view('Pendeta.editdatajemaatperminggupendeta', [
            "statistik_jemaats" => $statistik_jemaat
        ]);   
    }

    function updatedatajemaatperminggupendeta(Request $request) {
        $id = $request->id;
        DB::table('statistik_perminggu')->where('id', $id)->update([
            'tanggal_statis' => $request->tanggal_statis,
            'keterangan' => $request->keterangan,
            'jumlah_hadir' => $request->jumlah_hadir
        ]);
        return redirect('pendeta/jemaatperminggupendeta')->with('success', 'Data Pelayan Sudah Berhasil Diubah');
    }
    
    function pelayan()
    {
        $pelayan = PelayanGereja::with(['jemaat', 'jemaat.sektor'])->paginate(100);
        return view('Pendeta.datapelayan', [
            "pelayanas" => $pelayan
        ]);   
    }
    function formpelayan(Request $request)
    {

        return view("Pendeta.formdatapelayan");
    }
    function formpelayanprocess(Request $request)
    {
        $arrName = [];

        $pelayanas = new PelayanGereja();
        $pelayanas->nik = $request->nik;
        $pelayanas->peran = $request->peran;
        $pelayanas->tanggal_terima_jabatan = $request->tanggal_terima_jabatan;
        $pelayanas->tanggal_akhir_jabatan = $request->tanggal_akhir_jabatan;
        
        if (!$pelayanas->save()) {
            if (count($arrName) > 1) {
                foreach ($arrName as $path) {
                    unlink(public_path() . $path);
                }
            }
        }
        return redirect('/pendeta/pelayangereja')->with('success', 'Data Pelayan Berhasil Disimpan!');
    }
    public function showrenungan()
    {
        $jadwal_ibadah = jadwal_ibadah::latest()->take(10)->get(); 
        $warta_jemaat = WartaJemaat::latest()->take(10)->get(); 
        $renungan = Renungan::latest()->take(10)->get(); 
        

        return view('Pendeta.renunganshow', compact('jadwal_ibadah','warta_jemaat','renungan'));
    }
    public function createrenungan()
    {
            return view('Pendeta.createrenungan');
    }
    public function storerenungan(Request $request)
    {
        $data = $request->validate([
            'tanggal'     => ['required'],
            'title'    => ['required'],
            'isi'    => ['required'],
            'ayat'    => ['required'],

        ]);

        Renungan::create($data);

        return redirect()->route('pendeta.renunganshow')->with('success','Renungan berhasil ditambahkan!');
    }
    public function editrenungan($id)
    {
        $renungan = DB::table('renungan')
        ->where('id', $id)
        ->get();
        return view('Pendeta.editrenungan', ['renungan'=>$renungan]);
    }
    function updaterenungan(Request $request) {
        $id = $request->id;
        DB::table('renungan')->where('id', $id)->update([
            'tanggal' => $request->tanggal,
            'title' => $request->title,
            'isi' => $request->isi,
            'ayat' => $request->ayat,
        ]);
        return redirect()->route('pendeta.renunganshow')->with('success', 'Renungan Sudah Berhasil Diubah');
    }
    public function showjadwal()
    {
        $jadwal_ibadah = jadwal_ibadah::latest()->take(100)->get(); 
        $warta_jemaat = WartaJemaat::latest()->take(10)->get(); 

        return view('Pendeta.jadwal', compact('jadwal_ibadah','warta_jemaat'));
    }
    public function jadwalminggu()
    {
        $now = CarbonImmutable::now()->locale('id_ID');
        $start_week = $now->startOfWeek()->format('m-d');
        $end_week = $now->endOfWeek()->format('m-d');
        $jadwal_ibadah =  jadwal_ibadah::whereRaw("DATE_FORMAT(tanggal, '%m-%d') BETWEEN '{$start_week}' AND '{$end_week}'")->get();
       
        return view('Pendeta.jadwalminggu', compact('jadwal_ibadah'));
    }
    public function createjadwal()
    {
            return view('Pendeta.createjadwal');
    }
    public function storejadwal(Request $request)
    {
        $data = $request->validate([
            'name'     => ['required'],
            'tanggal'    => ['required'],
            'waktu'    => ['required'],
            'pengkhotbah' => ['required'],
            'liturgis' => ['required'],
            'warta' => ['required'],
            'song_lead' => ['required'],
            'organis' => ['required'],
            'pengumpul' => ['required'],
            'protokol' => ['required'],
            'operator' => ['required'],
        ]);

        

        jadwal_ibadah::create($data);

        return redirect()->route('Pendeta.jadwal')->with('success','Jadwal ibadah berhasil ditambahkan!');
    }
    public function detailjadwal(Request $request, $id)
    {
        $jadwal_ibadah = jadwal_ibadah::where("id", $id)->first();
        
        return view('Pendeta.detailjadwal', ["jadwas" => $jadwal_ibadah]); 
    }
    public function editjadwal($id)
    {
        $warta_jemaat = DB::table('jadwal_ibadah')
        ->where('id', $id)
        ->get();
        return view('Pendeta.editjadwal', ['jadwal_ibadah'=>$warta_jemaat]);
    }
    function updatejadwal(Request $request) {
        $id = $request->id;
        DB::table('jadwal_ibadah')->where('id', $id)->update([
            'name' => $request->name,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'pengkhotbah' => $request->pengkhotbah,
            'liturgis' => $request->liturgis,
            'warta' => $request->warta,
            'song_lead' => $request->song_lead,
            'organis' => $request->organis,
            'pengumpul' => $request->pengumpul,
            'protokol' => $request->protokol,
            'operator' => $request->operator
        ]);
        return redirect()->route('pendeta.jadwal')->with('success', 'Jadwal Ibadah Sudah Berhasil Diubah');
    }


    public function showkegiatan()
    {
        $kegiatan = Kegiatan::latest()->take(100)->get(); 
       
        return view('Pendeta.kegiatan', compact('kegiatan'));
    }
    public function createkegiatan()
    {
            return view('Pendeta.createkegiatan');
    }
    public function storekegiatan(Request $request)
    {
        $data = $request->validate([
            'tanggal'    => ['required'],
            'pukul'    => ['required'],
            'nama'     => ['required'],
        ]);        

        Kegiatan::create($data);

        return redirect()->route('pendeta.kegiatan')->with('success','Kegiatan Gereja berhasil ditambahkan!');
    }
    public function editkegiatan($id)
    {
        $warta_jemaat = DB::table('kegiatan')
        ->where('id', $id)
        ->get();
        return view('Pendeta.editkegiatan', ['kegiatan'=>$warta_jemaat]);
    }
    function updatekegiatan(Request $request) {
        $id = $request->id;
        DB::table('kegiatan')->where('id', $id)->update([
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'pukul' => $request->pukul
        ]);
        return redirect()->route('pendeta.kegiatan')->with('success', 'Kegiatan Gereja Sudah Berhasil Diubah');
    }

    function detailtataibadah()
    {
        $jadwal_ibadah = jadwal_ibadah::latest()->take(100)->get(); 
        $tata_ibadah = tata_ibadah::latest()->take(10)->get(); 
        $renungan = Renungan::latest()->take(10)->get();
        return view('Pendeta.detailibadah', compact('jadwal_ibadah','tata_ibadah','renungan'));
    }
    public function createtata()
    {
            return view('Pendeta.createtata');
    }
    function formibadah(Request $request)
    {

        return view("Pendeta.tambahibadah");
    }

    function tatastore(Request $request)
    {

        $arrName = [];
        
        if ($request->hasFile('lampiran')) {
            foreach ($request->file('lampiran') as $file) {
                $str = rand();
                $result = md5($str);
                $extension = $file->getClientOriginalExtension();
                $name = time() . "-" . $result . '.' . $extension;
                $file->move(public_path() . '/lampiran/tataibadah/', $name);
                array_push($arrName, '/lampiran/tataibadah/' . $name);
            }
        }
        $fileName = join("#", $arrName);

        $ibadah = new tata_ibadah();
        $ibadah->nama = $request->nama;
        $ibadah->tanggal = $request->tanggal;
        $ibadah->lampiran = $fileName;

        if (!$ibadah->save()) {
            foreach ($arrName as $l) {
                unlink(public_path() . $l);
            }
        }
        return redirect()->route('pendeta.detailibadah')->with('success', 'Tata Ibadah Sudah Berhasil Ditambahkan');
    }
    public function edittataibadah($id)
    {
        $tata_ibadah = DB::table('tata_ibadah')
        ->where('id', $id)
        ->get();
        return view('Pendeta.edittataibadah', ['tata_ibadah'=>$tata_ibadah]);
    }
    
    function administrasi()
    {
        $administrasi = Administrasi::with(['jemaat', 'jemaat.sektor'])->paginate(100);
        return view('Pendeta.administrasishow', [
            "administrasias" => $administrasi
        ]);   
    }
    function createadministrasi(Request $request)
    {
        $nik = Jemaat::get();
        return view("Pendeta.createadministrasi", ["niks" => $nik]);
    }
    function storeadministrasi(Request $request)
    {
      $surat_lahir ='';
      $surat_baptis ='';
      $surat_sidi ='';
      $surat_nikah ='';
      $surat_pindah ='';
      $surat_meninggal ='';
        
      $request->validate([
        'nik'     => 'required',
        'nama'    => 'required',
        'surat_lahir' =>'required',
        'surat_baptis' =>'required'
         ]);


         if ($request->hasFile('surat_lahir')) {
            $file = $request->file('surat_lahir');
            $str = rand();
            $result = md5($str);
            $extension = $file->getClientOriginalExtension();
            $name = time() . "-" . $result . '.' . $extension;
            $file->move(public_path() . '/Surat/suratlahir/', $name);
            $surat_lahir = '/Surat/suratlahir/'. $name;
            // array_push($surat_lahir, '/Surat/suratlahir/' . $name);
            }

         if ($request->hasFile('surat_baptis')) {
            $file = $request->file('surat_baptis');
            $str = rand();
            $result = md5($str);
            $extension = $file->getClientOriginalExtension();
            $name = time() . "-" . $result . '.' . $extension;
            $file->move(public_path() . '/Surat/baptis/', $name);
            $surat_baptis = '/Surat/baptis/'. $name;
        }


        if ($request->hasFile('surat_sidi')) {
        $file = $request->file('surat_sidi');
        $str = rand();
        $result = md5($str);
        $extension = $file->getClientOriginalExtension();
        $name = time() . "-" . $result . '.' . $extension;
        $file->move(public_path() . '/Surat/suratsidi/', $name);
        $surat_sidi = '/Surat/suratsidi/'. $name;
        // array_push($surat_lahir, '/Surat/suratlahir/' . $name);
        }

        if ($request->hasFile('surat_nikah')) {
            $file = $request->file('surat_nikah');
            $str = rand();
            $result = md5($str);
            $extension = $file->getClientOriginalExtension();
            $name = time() . "-" . $result . '.' . $extension;
            $file->move(public_path() . '/Surat/suratnikah/', $name);
            $surat_nikah = '/Surat/suratnikah/'. $name;
            // array_push($surat_lahir, '/Surat/suratlahir/' . $name);
        }

       if ($request->hasFile('surat_pindah')) {
        $file = $request->file('surat_pindah');
        $str = rand();
        $result = md5($str);
        $extension = $file->getClientOriginalExtension();
        $name = time() . "-" . $result . '.' . $extension;
        $file->move(public_path() . '/Surat/suratpindah/', $name);
        $surat_pindah = '/Surat/suratpindah/'. $name;
        // array_push($surat_lahir, '/Surat/suratlahir/' . $name);
        }

        if ($request->hasFile('surat_meninggal')) {
            $file = $request->file('surat_meninggal');
            $str = rand();
            $result = md5($str);
            $extension = $file->getClientOriginalExtension();
            $name = time() . "-" . $result . '.' . $extension;
            $file->move(public_path() . '/Surat/suratmeninggal/', $name);
            $surat_meninggal = '/Surat/suratmeninggal/'. $name;
            // array_push($surat_lahir, '/Surat/suratlahir/' . $name);
    }

        // if ($request->hasFile('surat_baptis')) {
        //     foreach ($request->file('surat_baptis') as $file) {
        //         $str = rand();
        //         $result = md5($str);
        //         $extension = $file->getClientOriginalExtension();
        //         $name = time() . "-" . $result . '.' . $extension;
        //         $file->move(public_path() . '/Surat/suratbaptis/', $name);
        //         array_push($surat_baptis, '/Surat/suratbaptis/' . $name);
        //     }
        // }

        $administrasi = new Administrasi();
        $administrasi->nik = $request->nik;
        $administrasi->nama = $request->nama;
        $administrasi->surat_lahir =  $surat_lahir;
        $administrasi->surat_baptis = $surat_baptis;
        $administrasi->surat_sidi = $surat_sidi;
        $administrasi->surat_nikah = $surat_nikah;
        $administrasi->surat_pindah = $surat_pindah;
        $administrasi->surat_meninggal = $surat_meninggal;


        if (!$administrasi->save()) {
                unlink(public_path() . $surat_lahir);
                unlink(public_path() . $surat_baptis);
                unlink(public_path() . $surat_sidi);
                unlink(public_path() . $surat_nikah);
                unlink(public_path() . $surat_pindah);
                unlink(public_path() . $surat_meninggal);

            // foreach ($surat_baptis as $d) {
            //     unlink(public_path() . $d);
            // }
          }
       
          return redirect()->route('pendeta.administrasishow')->with('success', 'Administrasi Data Sudah Berhasil Ditambahkan');
    }
    function ibadah()
    {
        $ibadah = acara_ibadah::all();
        
        return view('Pendeta.ibadahshow', ["ibadas" => $ibadah]);
    }
    function tambahibadah()
    {
        $ibadah = acara_ibadah::all();
        
        return view('Pendeta.createibadah', ["ibadas" => $ibadah]);
    }
    public function storeibadah(Request $request)
    {
        $data = $request->validate([
            'nama'     => ['required'],
            'nyanyi'    => ['required'],
            'votum'    => ['required'],
            'nyanyi_2' => ['required'],
            'epistel'    => ['required'],
            'nyanyi_3' => ['required'],
            'dosa'    => ['required'],
            'nyanyi_4'    => ['required'],
            'nyanyi_5'    => ['required'],
            'petunjuk'    => ['required'],
            'koor'    => ['required'],
            'nyanyi_6'    => ['required'],
            'pengakuan'    => ['required'],
            'warta'    => ['required'],
            'khotbah'    => ['required'],
            'nyanyi_7'    => ['required'],
            'nats'    => ['required'],
            'persembahan'    => ['required'],
           
            'penutup'    => ['required'],
            'amin'    => ['required']
        ]);

        

        acara_ibadah::create($data);

        return redirect()->route('pendeta.ibadahshow')->with('success','Jadwal ibadah berhasil ditambahkan!');
    }
    function printibadah(){

        $ibadah = acara_ibadah::all();
        
        return view('pendeta.cetakibadah', ["ibadas" => $ibadah]);
        }
   
    function detailibadah(Request $request, $id)
    {
        $ibadah = acara_ibadah::where("id", $id)->first();
        
        return view('Pendeta.detailibadahshow', ["ibadas" => $ibadah]);
    }
    function updatetataibadah(Request $request) {
        $id = $request->id;
        DB::table('tata_ibadah')->where('id', $id)->update([
            'nama' => $request->nama,
            'tanggal' => $request->tanggal
        ]);
        return redirect()->route('pendeta.detailibadah')->with('success', 'Tata Ibadah Sudah Berhasil Diubah');
    }
}

