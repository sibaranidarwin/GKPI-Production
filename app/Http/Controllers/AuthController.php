<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Jemaat;
use App\PelayanGereja;
use Illuminate\Contracts\Session\Session;
use StaticVariable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;

class AuthController extends Controller
{
    //
    function index()
    {
        return view('Auth.index');
    }
    function logout(){
        session()->forget("Auth");
        return redirect()->route('home.index');
    }

    function login(Request $request)
    {
        $nik = $request->nik;
        $password = $request->password;
        $jemaat = Jemaat::where("username", $nik)->where("status", "Aktif")->first();
        if ($jemaat) {
            // Will do authentication 
            if (password_verify($password, $jemaat->password)) {
                if ($jemaat->pelayanGereja) {
                    if ($jemaat->pelayanGereja->peran === "Pendeta"){
                        StaticVariable::$user = $jemaat;
                        session()->put('Auth', $jemaat);
                        return redirect()->route('pendeta.index');
                    }
                    if ($jemaat->pelayanGereja->peran === "Tata Usaha"){
                        StaticVariable::$user = $jemaat;
                        session()->put('Auth', $jemaat);
                        return redirect()->route('tatausaha.index');
                    }
                    if ($jemaat->pelayanGereja->peran === "Penatua"){
                        StaticVariable::$user = $jemaat;
                        session()->put('Auth', $jemaat);
                        return redirect()->route('penatua.index');
                    }
                    if ($jemaat->pelayanGereja->peran === "Bendahara Jemaat"){
                        StaticVariable::$user = $jemaat;
                        session()->put('Auth', $jemaat);
                        return redirect()->route('bendahara.index');
                    }
                    if ($jemaat->pelayanGereja->peran === "Sekretaris Jemaat"){
                        StaticVariable::$user = $jemaat;
                        session()->put('Auth', $jemaat);
                        return redirect()->route('sekretaris.index');
                    }
                } else {
                    session()->put('Auth', $jemaat);
                    return redirect()->route('jemaat.index');

                }
            } else {
                return redirect()->back()->withErrors(["message" => "Password salah"])->withInput();
            }
        } else {
            return redirect()->back()->withErrors(["message" => "Username Tidak terdaftar"])->withInput();
        }
    }
    public function profile($nik){
        
        $jemaat = Jemaat::where('nik',$nik)->first();
        //dd($profile);
        
        return view('jemaat.profile', ['jemaat'=>$jemaat]);
    }
    public function profilebenda($nik){
        
        $jemaat = Jemaat::where('nik',$nik)->first();
        //dd($profile);
        
        return view('jemaat.profilebenda', ['jemaat'=>$jemaat]);
    }
    public function editprofile(Request $request, $nik){
        $nik = $request->nik;
        $namafile = 'profile/default.png';
        if ($request->hasFile('profile')){
            $file = $request->file("profile");
            $extension = $file->getClientOriginalExtension();
            $str = rand();
            $result = md5($str);
            $name = time() . "-" . $result . '.' . $extension;
            $request->file('profile')->move('profile/', $name , $request->file('profile')->getClientOriginalName());
            $namafile = $request->file('profile')->getClientOriginalName();
            
        }
        $jemaat = DB::table('jemaat')->where('nik', $nik)->update([
                
            'nik' => $request->nik,
            'name' => $request->name,
            'username' => $request->username,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'status' => $request->status,
            'status_pernikahan' => $request->status_pernikahan,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_baptis' => $request->tanggal_baptis,
            'tanggal_sidih' => $request->tanggal_sidih,
            'sektor_role' => $request->sektor_role,
            'profile' => $namafile
        ]);
        return back()->with('success', 'Profil Sudah Berhasil Diubah');
    }
    public function profilejemaat($nik){
        
        $jemaat = Jemaat::where('nik',$nik)->first();
        //dd($profile);
        
        return view('jemaat.profilejemaat', ['jemaat'=>$jemaat]);
    }
    public function profilependeta($nik){
        
        $jemaat = Jemaat::where('nik',$nik)->first();
        //dd($profile);
        
        return view('jemaat.profilependeta', ['jemaat'=>$jemaat]);
    }
    public function profilesekretaris($nik){
        
        $jemaat = Jemaat::where('nik',$nik)->first();
        //dd($profile);
        
        return view('jemaat.profilesekre', ['jemaat'=>$jemaat]);
    }
    public function profilepenatua($nik){
        
        $jemaat = Jemaat::where('nik',$nik)->first();
        //dd($profile);
        
        return view('jemaat.profilepenatua', ['jemaat'=>$jemaat]);
    }
     public function passwordtatausaha($nik){
        
        $jemaat = Jemaat::where('nik',$nik)->first();
        
        
        return view('jemaat.passwordtatausaha', ['jemaat'=>$jemaat]);
    }
    public function passwordpendeta($nik){
        
        $jemaat = Jemaat::where('nik',$nik)->first();
        
        
        return view('jemaat.passwordpendeta', ['jemaat'=>$jemaat]);
    }

    public function passwordsekretaris($nik){
        
        $jemaat = Jemaat::where('nik',$nik)->first();
        
        
        return view('jemaat.passwordsekretaris', ['jemaat'=>$jemaat]);
    }

    public function passwordpenatua($nik){
        
        $jemaat = Jemaat::where('nik',$nik)->first();
        
        
        return view('jemaat.passwordpenatua', ['jemaat'=>$jemaat]);
    }

    public function passwordbendahara($nik){
        
        $jemaat = Jemaat::where('nik',$nik)->first();
        
        
        return view('jemaat.passwordbendahara', ['jemaat'=>$jemaat]);
    }

    public function passwordjemaat($nik){
        
        $jemaat = Jemaat::where('nik',$nik)->first();
        
        
        return view('jemaat.passwordjemaat', ['jemaat'=>$jemaat]);
    }

    public function editpasswordtatausaha(Request $request, $nik){
        $password1 = $request->current_password;
        
        $jemaat = Jemaat::where("nik", $nik)->first();
        
        if (password_verify($password1, $jemaat->password)) {
            
                //Change Password
                $jemaat = DB::table('jemaat')->where('nik', $nik)->update([
                
                    
                    'password' => Hash::make($request->get('new_password'))
                    
                ]);
                 
                return redirect()->back()->with("success","Kata Sandi Berhasil Di Ubah !");
        
        }
        
        else{
            // The passwords matches
        return redirect()->back()->with("error","Kata Sandi yang dimasukkan tidak sesuai. Coba Lagi.");

        }
    }
    public function editpasswordpendeta(Request $request, $nik){
        $password1 = $request->current_password;
        
        $jemaat = Jemaat::where("nik", $nik)->first();
        
        if (password_verify($password1, $jemaat->password)) {
            
                //Change Password
                $jemaat = DB::table('jemaat')->where('nik', $nik)->update([
                
                    
                    'password' => Hash::make($request->get('new_password'))
                    
                ]);
                 
                return redirect()->back()->with("success","Kata Sandi Berhasil Di Ubah !");
        
        }
        
        else{
            // The passwords matches
        return redirect()->back()->with("error","Kata Sandi yang dimasukkan tidak sesuai. Coba Lagi.");

        }
    }
    public function editpasswordsekretaris(Request $request, $nik){
        $password1 = $request->current_password;
        
        $jemaat = Jemaat::where("nik", $nik)->first();
        
        if (password_verify($password1, $jemaat->password)) {
            
                //Change Password
                $jemaat = DB::table('jemaat')->where('nik', $nik)->update([
                
                    
                    'password' => Hash::make($request->get('new_password'))
                    
                ]);
                 
                return redirect()->back()->with("success","Kata Sandi Berhasil Di Ubah !");
        
        }
        
        else{
            // The passwords matches
        return redirect()->back()->with("error","Kata Sandi yang dimasukkan tidak sesuai. Coba Lagi.");

        }
    }

    public function editpasswordpenatua(Request $request, $nik){
        $password1 = $request->current_password;
        
        $jemaat = Jemaat::where("nik", $nik)->first();
        
        if (password_verify($password1, $jemaat->password)) {
            
                //Change Password
                $jemaat = DB::table('jemaat')->where('nik', $nik)->update([
                
                    
                    'password' => Hash::make($request->get('new_password'))
                    
                ]);
                 
                return redirect()->back()->with("success","Kata Sandi Berhasil Di Ubah !");
        
        }
        
        else{
            // The passwords matches
        return redirect()->back()->with("error","Kata Sandi yang dimasukkan tidak sesuai. Coba Lagi.");

        }
    }

    public function editpasswordbendahara(Request $request, $nik){
        $password1 = $request->current_password;
        
        $jemaat = Jemaat::where("nik", $nik)->first();
        
        if (password_verify($password1, $jemaat->password)) {
            
                //Change Password
                $jemaat = DB::table('jemaat')->where('nik', $nik)->update([
                
                    
                    'password' => Hash::make($request->get('new_password'))
                    
                ]);
                 
                return redirect()->back()->with("success","Kata Sandi Berhasil Di Ubah !");
        
        }
        
        else{
            // The passwords matches
        return redirect()->back()->with("error","Kata Sandi yang dimasukkan tidak sesuai. Coba Lagi.");

        }
    }

    public function editpasswordjemaat(Request $request, $nik){
        $password1 = $request->current_password;
        
        $jemaat = Jemaat::where("nik", $nik)->first();
        
        if (password_verify($password1, $jemaat->password)) {
            
                //Change Password
                $jemaat = DB::table('jemaat')->where('nik', $nik)->update([
                
                    
                    'password' => Hash::make($request->get('new_password'))
                    
                ]);
                 
                return redirect()->back()->with("success","Kata Sandi Berhasil Di Ubah !");
        
        }
        
        else{
            // The passwords matches
        return redirect()->back()->with("error","Kata Sandi yang dimasukkan tidak sesuai. Coba Lagi.");

        }
    }
}
