<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home.index');

Route::get('/DataGereja', 'DataGerejaController@index')->name('DataGereja.index');
Route::get('/DataGerejauang', 'DataGerejaController@keuangan')->name('DataGereja.keuangan');
Route::get('/DataGerejakehadiran', 'DataGerejaController@statistikkehadiranjemaat')->name('DataGereja.statistikkehadiranjemaat');
Route::get('/warta', 'DataGerejaController@warta')->name('DataGereja.warta');
Route::get('/statistik', 'DataGerejaController@statistik')->name('DataGereja.statistik');
Route::get('/statistikkeuangan', 'DataGerejaController@statistikkeuangan')->name('DataGereja.statistikkeuangan');


Route::get('/Renungan', 'RenunganController@index')->name('Renungan.index');
Route::get('/renungan/{id}', 'RenunganController@detail')->name('Renungan.detail');
Route::get('/Tentang', 'TentangController@index')->name('Tentang.index');
Route::get('/Tentangprogram', 'TentangController@program')->name('Tentang.program');
Route::get('/Tentanganggaran', 'TentangController@anggaran')->name('Tentang.anggaran');
        


Route::middleware(['beforeauth'])->group(function () {
    Route::get('/login', 'AuthController@index')->name('auth.index');
    Route::post('/login', 'AuthController@login')->name('auth.login');
});
Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/logout', 'AuthController@logout')->name('auth.logout');
    Route::get('/BeritaGereja', 'BeritaController@index')->name('BeritaGereja.index');
    Route::get('/beritaPerminggutatausaha', 'BeritaController@beritaperminggutatausaha')->name('Berita.beritatatausahaperminggu');
    Route::get('/Berita', 'BeritaController@show')->name('Berita.index');

    Route::get('/beritaGereja/{id}', 'BeritaController@detail')->name('BeritaGereja.detail');
    Route::get('/tambah-berita', 'BeritaController@create')->name('Berita.create');
    Route::post('/tambah-berita', 'BeritaController@store')->name('Berita.store');
    Route::get('/ubah-berita/{id}', 'BeritaController@edit')->name('Berita.edit');
    Route::post('/ubah-berita/{id}', 'BeritaController@update')->name('Berita.update');
    Route::get("jemaat/data/administrasi", 'JemaatController@administrasi')->name('jemaat.administrasishow');     

    Route::get('/Beritapendeta', 'BeritaController@showpendeta')->name('Berita.indexpendeta');
    Route::get('/beritaPerminggupendeta', 'BeritaController@beritaperminggu')->name('Berita.beritapendetaperminggu');
    Route::get('/tambah-beritapendeta', 'BeritaController@creatependeta')->name('Berita.creatependeta');
    Route::post('/tambah-beritapendeta', 'BeritaController@storependeta')->name('Berita.storependeta');
    Route::get('/ubah-beritapendeta/{id}', 'BeritaController@editpendeta')->name('Berita.editpendeta');
    Route::post('/ubah-beritapendeta/{id}', 'BeritaController@update')->name('Berita.update');

    Route::get('/Beritasekre', 'BeritaController@showsekre')->name('Berita.indexsekre');
    Route::get('/beritaPerminggusekre', 'BeritaController@beritaperminggusekre')->name('Berita.beritasekreperminggu');
    Route::get('/tambah-beritasekre', 'BeritaController@createsekre')->name('Berita.createsekre');
    Route::post('/tambah-beritasekre', 'BeritaController@storesekre')->name('Berita.storesekre');
    Route::get('/ubah-beritasekre/{id}', 'BeritaController@editsekre')->name('Berita.editsekre');
    Route::post('/ubah-beritasekre/{id}', 'BeritaController@update')->name('Berita.update');
    
    Route::get('/{nik}/profile', 'AuthController@profile')->name('auth.profile');
    Route::get('/{nik}/passwordtatausaha', 'AuthController@passwordtatausaha')->name('auth.passwordtatausaha');
    Route::get('/{nik}/passwordpendeta', 'AuthController@passwordpendeta')->name('auth.passwordpendeta');
    Route::get('/{nik}/passwordsekretaris', 'AuthController@passwordsekretaris')->name('auth.passwordsekretaris');
    Route::get('/{nik}/passwordpenatua', 'AuthController@passwordpenatua')->name('auth.passwordpenatua');
    Route::get('/{nik}/passwordbendahara', 'AuthController@passwordbendahara')->name('auth.passwordbendahara');
    Route::get('/{nik}/passwordjemaat', 'AuthController@passwordpenatua')->name('auth.passwordjemaat');
    Route::get('/bendahara/{nik}/profile', 'AuthController@profilebenda')->name('auth.profile');
    Route::get('/jemaat/{nik}/profile', 'AuthController@profilejemaat')->name('auth.profile');
    Route::get('/pendeta/{nik}/profile', 'AuthController@profilependeta')->name('auth.profile');
    Route::get('/sekretaris/{nik}/profile', 'AuthController@profilesekretaris')->name('auth.profile');
    Route::get('/penatua/{nik}/profile', 'AuthController@profilepenatua')->name('auth.profile');

    Route::post('/jemaat/passwordtatausaha/{nik}/edit', 'AuthController@editpasswordtatausaha')->name('auth.editpasswordtatausaha');
    Route::post('/jemaat/passwordpendeta/{nik}/edit', 'AuthController@editpasswordpendeta')->name('auth.editpasswordpendeta');
    Route::post('/jemaat/passwordsekretaris/{nik}/edit', 'AuthController@editpasswordsekretaris')->name('auth.editpasswordsekretaris');
    Route::post('/jemaat/passwordpenatua/{nik}/edit', 'AuthController@editpasswordpenatua')->name('auth.editpasswordpenatua');
    Route::post('/jemaat/passwordbendahara/{nik}/edit', 'AuthController@editpasswordbendahara')->name('auth.editpasswordbendahara');
    Route::post('/jemaat/passwordjemaat/{nik}/edit', 'AuthController@editpasswordjemaat')->name('auth.editpasswordjemaat');
    Route::post('/bendahara/profile/{nik}/edit', 'AuthController@editprofile')->name('auth.editprofile');
    Route::post('/jemaat/profile/{nik}/edit', 'AuthController@editprofilebenda')->name('auth.editprofile');
    Route::post('/jemaat/profile/{nik}/edit', 'AuthController@editprofile')->name('auth.editprofile');
    Route::get('/jemaat', 'HomeController@dashboardjemaat')->name('jemaat.index');
    Route::get("/jemaat/data/jemaat/{nik}", "JemaatController@detailjemaat")->name("jemaat.detailjemaat");
    Route::get("/jemaat/data/keluarga/{id}", 'JemaatController@detailkeluarga')->name('jemaat.detailkeluarga');
    Route::get("jemaat/data/keluarga", 'JemaatController@datakeluarga')->name('jemaat.datakeluarga');

        Route::get("jemaat/data/keluarga/add", 'JemaatController@formkeluarga')->name('jemaat.formkeluarga');
        Route::post("jemaat/data/keluarga/add", 'JemaatController@formkeluargaprocess')->name('jemaat.formkeluarga');
        Route::get("jemaat/data/keluarga/{id}", 'JemaatController@detailkeluarga')->name('jemaat.detailkeluarga');
        Route::get("jemaat/editdatakeluarga/{id}", 'JemaatController@editdatakeluarga')->name('jemaat.editdatakeluarga');
        Route::post('jemaat/editdatakeluarga/{id}', 'JemaatController@update')->name('jemaat.update');
        Route::get("jemaat/data/jemaat/add/{idKeluarga}", 'JemaatController@formjemaat')->name('jemaat.formjemaat');
        Route::post("jemaat/data/jemaat/add/{idKeluarga}", 'JemaatController@formjemaatprocess')->name('jemaat.formjemaat');
        Route::get("jemaat/data/jemaat/{nik}", "JemaatController@detailjemaat")->name("jemaat.detailjemaat");
        Route::get("jemaat/data/jemaat", 'JemaatController@datajemaat')->name('jemaat.datajemaat');
        Route::get("jemaat/data/jemaat/edit/{nik}", "JemaatController@editdetailjemaat")->name("jemaat.editdetailjemaat");
        Route::post("jemaat/data/jemaat/edit", "JemaatController@updateJemaat")->name("jemaat.updateJemaat");
        Route::get("jemaat/data/statistik", 'JemaatController@datastatistik')->name('jemaat.datastatistik');
        Route::get("jemaat/data/keuangan", 'KeuanganJemaatController@index')->name('jemaat.datakeuangan');
        Route::get("jemaat/data/keuangan/nonaktif", 'KeuanganJemaatController@index2')->name('jemaat.datakeuangannonaktif');
        Route::get("jemaat/data/keuangan/add", 'KeuanganJemaatController@formkeuangan')->name('jemaat.formtambahkeuangan');
        Route::post("jemaat/data/keuangan/add", 'KeuanganJemaatController@formkeuanganprocess')->name('jemaat.formtambahkeuangan');
        Route::get("jemaat/data/keuangan/edit/{id}", 'KeuanganJemaatController@ubahkeuangan')->name('jemaat.formubahkeuangan');
        Route::post("jemaat/data/keuangan/update/{id}", 'KeuanganJemaatController@updatekeuangan')->name('jemaat.formupdatekeuangan');
        Route::get("jemaat/data/keuangan/edit/status/{id}", 'KeuanganJemaatController@ubahstatuskeuangan')->name('jemaat.formubahstatus');
        Route::get("jemaat/data/keuangan/edit/status/nonaktif/{id}", 'KeuanganJemaatController@ubahstatuskeuangan2')->name('jemaat.formubahstatus2');
        Route::get('jemaat/data/keuangan/statistik', 'KeuanganJemaatController@statistik');
        Route::get("jemaat/data/laporankeuangankeluarga", 'KeuanganJemaatController@keuangankeluarga')->name('jemaat.laporankeuangankeluarga');
        Route::get("jemaat/data/keuangan/cari-pemasukan", 'KeuanganJemaatController@caridanapemasukan')->name('pendeta.formcaridanapemasukan');
        Route::get("jemaat/data/keuangan/cari-pemasukan/", 'KeuanganJemaatController@pemasukan')->name('pendeta.formcaridanapemasukan');
        Route::get("jemaat/data/keuangan/cari-pengeluaran", 'KeuanganJemaatController@caridanapengeluaran')->name('pendeta.formcaridanapengeluaran');
        Route::get("jemaat/data/keuangan/cari-pengeluaran/", 'KeuanganJemaatController@pengeluaran')->name('pendeta.formcaridanapengeluaran');
        Route::get("jemaat/data/laporan-keuangan", 'KeuanganJemaatController@laporan')->name('jemaat.laporankeuangan');
        Route::get("jemaat/data/laporan-keuangan/nonaktif", 'KeuanganJemaatController@laporan2')->name('jemaat.laporankeuangannonaktif');
        Route::get("jemaat/data/laporan-keuangan/edit/status/{id}", 'KeuanganJemaatController@ubahstatuslaporan')->name('jemaat.formubahstatuslaporan');
        Route::get("jemaat/data/laporan-keuangan/edit/status/nonaktif/{id}", 'KeuanganJemaatController@ubahstatuslaporan2')->name('jemaat.formubahstatuslaporan2');
        Route::get("jemaat/data/laporan-keuangan/add", 'KeuanganJemaatController@laporankeuangan')->name('jemaat.formtambahlaporankeuangan');
        Route::post("jemaat/data/laporan-keuangan/add", 'KeuanganJemaatController@laporankeuanganprocess')->name('jemaat.formtambahlaporankeuangan');
        Route::get("jemaat/data/laporan-keuangan/edit/{id}", 'KeuanganJemaatController@ubahlaporankeuangan')->name('penatua.formubahlaporankeuangan');
        Route::post("jemaat/data/laporan-keuangan/update/{id}", 'KeuanganJemaatController@ubahlaporankeuanganprocess')->name('jemaat.formubahlaporankeuangan');
        Route::get("jemaat/data/laporan-keuangan/cari-mingguan", 'KeuanganJemaatController@carilaporanmingguan')->name('jemaat.formcarilaporanmingguan');
        Route::get("jemaat/data/laporan-keuangan/cari-mingguan/", 'KeuanganJemaatController@processcarilaporanmingguan')->name('penatua.formcarilaporanmingguan');
        Route::get("jemaat/data/laporan-keuangan/cari-bulanan", 'KeuanganJemaatController@carilaporanbulanan')->name('jemaat.formcarilaporanbulanan');
        Route::get("jemaat/data/laporan-keuangan/cari-bulanan/", 'KeuanganJemaatController@processcarilaporanbulanan')->name('jemaat.formcarilaporanbulanan');
        Route::get("jemaat/data/laporan-keuangan/cari-tahunan", 'KeuanganJemaatController@carilaporantahunan')->name('jemaat.formcarilaporantahunan');
        Route::get("jemaat/data/laporan-keuangan/cari-tahunan/", 'KeuanganJemaatController@processcarilaporantahunan')->name('jemaat.formcarilaporantahunan');
        Route::get("jemaat/data/laporan-keuangan-mingguan/{tanggal_awal}/{tanggal_akhir}/{id}", 'KeuanganJemaatController@laporanmingguan')->name('jemaat.laporanmingguan');
        Route::get("jemaat/data/laporan-keuangan-bulanan/{tanggal_awal}/{tanggal_akhir}/{id}", 'KeuanganJemaatController@laporanbulanan')->name('jemaat.laporanbulanan');
        Route::get("jemaat/data/laporan-keuangan-tahunan/{tanggal_awal}/{tanggal_akhir}/{id}", 'KeuanganJemaatController@laporantahunan')->name('jemaat.laporantahunan');

    Route::prefix('pendeta')->group(function () {
        Route::get('/', 'HomeController@dashboard')->name('pendeta.index');
        Route::get("/data/keluarga", 'PendetaController@datakeluarga')->name('pendeta.datakeluarga');
        Route::get("/data/keluarga/add", 'PendetaController@formkeluarga')->name('pendeta.formkeluarga');
        Route::post("/data/keluarga/add", 'PendetaController@formkeluargaprocess')->name('pendeta.formkeluarga');
        Route::get("/data/keluarga/{id}", 'PendetaController@detailkeluarga')->name('pendeta.detailkeluarga');
        Route::get("/editdatakeluarga/{id}", 'PendetaController@editdatakeluarga')->name('pendeta.editdatakeluarga');
        Route::post('/editdatakeluarga/{id}', 'PendetaController@update')->name('pendeta.update');
        Route::get("/data/jemaat/add/{idKeluarga}", 'PendetaController@formjemaat')->name('pendeta.formjemaat');
        Route::post("/data/jemaat/add/{idKeluarga}", 'PendetaController@formjemaatprocess')->name('pendeta.formjemaat');
        Route::get("/data/jemaat/{nik}", "PendetaController@detailjemaat")->name("pendeta.detailjemaat");
        Route::get("/data/jemaat", 'PendetaController@datajemaat')->name('pendeta.datajemaat');
        Route::get("/data/ultah", 'PendetaController@dataultah')->name('pendeta.dataultah');
        Route::get("/data/jemaat/edit/{nik}", "PendetaController@editdetailjemaat")->name("pendeta.editdetailjemaat");
        Route::post("/data/jemaat/edit", "PendetaController@updateJemaat")->name("pendeta.updateJemaat");
        Route::get("/data/statistik", 'PendetaController@datastatistik')->name('pendeta.datastatistik');
        Route::get("/statistik-kategorial", 'PendetaController@statistikkategorial')->name('pendeta.statistikkategorial');
        
        Route::get('/jemaatperminggupendeta', 'PendetaController@jemaatperminggupendeta')->name('pendeta.jemaatperminggupendeta');
        Route::get('/jemaatseminggupendeta', 'PendetaController@jemaatseminggupendeta')->name('pendeta.jemaatseminggupendeta');
        Route::get("/data/dataperminggu/add", 'PendetaController@formdataperminggupendeta')->name('pendeta.formdataperminggupendeta');
        Route::post("/data/dataperminggu/add", 'PendetaController@formdatapermingguprosespendeta')->name('pendeta.formdataperminggupendeta');
        Route::get("/editdatajemaatperminggu/{id}", 'PendetaController@editdatajemaatperminggupendeta')->name('pendeta.editdatajemaatperminggupendeta');
        Route::post('/editdatajemaatperminggu/{id}', 'PendetaController@updatedatajemaatperminggupendeta')->name('pendeta.updatedatajemaatperminggupendeta');
        
        Route::get('/pelayangereja', 'PendetaController@pelayan')->name('Pendeta.datapelayan');
        Route::get("/data/pelayan/add", 'PendetaController@formpelayan')->name('pendeta.formdatapelayan');
        Route::post("/data/pelayan/add", 'PendetaController@formpelayanprocess')->name('pendeta.formdatapelayan');
        Route::get('/renungan', 'PendetaController@showrenungan')->name('pendeta.renunganshow');
        Route::get('/tambah-renungan', 'PendetaController@createrenungan')->name('pendeta.createrenungan');
        Route::post("/tambah-renungan", 'PendetaController@storerenungan')->name('pendeta.storerenungan');
        Route::get('/editrenungan/{id}', 'PendetaController@editrenungan')->name('pendeta.editrenungan');
        Route::post('/editrenungan/{id}', 'PendetaController@updaterenungan')->name('pendeta.updaterenungan');
       
        Route::get('/jadwal', 'PendetaController@showjadwal')->name('pendeta.jadwal');
        Route::get('/jadwalminggu', 'PendetaController@jadwalminggu')->name('pendeta.jadwalminggu');
        Route::get('/detail-jadwal/{id}', 'PendetaController@detailjadwal')->name('pendeta.detailjadwal');
        Route::get('/tambah-jadwal', 'PendetaController@createjadwal')->name('pendeta.createjadwal');
        Route::post("/tambah-jadwal", 'PendetaController@storejadwal')->name('pendeta.storejadwal');
        Route::get("/editjadwal/{id}", 'PendetaController@editjadwal')->name('pendeta.editjadwal');
        Route::post('/editjadwal/{id}', 'PendetaController@updatejadwal')->name('pendeta.updatejadwal');
        
        Route::get('/kegiatan', 'PendetaController@showkegiatan')->name('pendeta.kegiatan');
        Route::get('/tambah-kegiatan', 'PendetaController@createkegiatan')->name('pendeta.createkegiatan');
        Route::post("/tambah-kegiatan", 'PendetaController@storekegiatan')->name('pendeta.storekegiatan');
        Route::get("/editkegiatan/{id}", 'PendetaController@editkegiatan')->name('pendeta.editkegiatan');
        Route::post('/editkegiatan/{id}', 'PendetaController@updatekegiatan')->name('pendeta.updatekegiatan');

        Route::get("/detail/ibadah", 'PendetaController@detailtataibadah')->name('pendeta.detailibadah');
        Route::get("/tambah-tata", 'PendetaController@createtata')->name('pendeta.createtata');
        Route::post("/tambah-tata", 'PendetaController@tatastore')->name('pendeta.createtata');
        Route::get('/tataibadah/{id}', 'PendetaController@edittataibadah')->name('pendeta.edittataibadah');
        Route::post('/tataibadah/{id}', 'PendetaController@updatetataibadah')->name('pendeta.updaetataibadah');

        Route::get('/acara', 'PendetaController@ibadah')->name('pendeta.ibadahshow'); 
        Route::get('/detail-ibadah/{id}', 'PendetaController@detailibadah')->name('pendeta.detailibadahshow');
        Route::get('/printdetail-ibadah','PendetaController@printibadah')->name('pendeta.cetakibadah');;
        Route::get('/tambah-acara', 'PendetaController@tambahibadah')->name('pendeta.tambahibadah');
        Route::post("/tambah-acara", 'PendetaController@storeibadah')->name('pendeta.storeibadah');
          Route::get("/data/administrasi", 'PendetaController@administrasi')->name('pendeta.administrasishow');
        Route::get("/data/tambah-administrasi", 'PendetaController@createadministrasi')->name('pendeta.createadministrasi');
        Route::post("/data/tambah-administrasi", 'PendetaController@storeadministrasi')->name('pendeta.storeadministrasi');

        Route::get("/data/keuangan", 'KeuanganController@index')->name('pendeta.datakeuangan');
        Route::get("/data/keuangan/nonaktif", 'KeuanganController@index2')->name('pendeta.datakeuangannonaktif');
        Route::get("/data/keuangan/add", 'KeuanganController@formkeuangan')->name('pendeta.formtambahkeuangan');
        Route::post("/data/keuangan/add", 'KeuanganController@formkeuanganprocess')->name('pendeta.formtambahkeuangan');
        Route::get("/data/keuangan/edit/{id}", 'KeuanganController@ubahkeuangan')->name('pendeta.formubahkeuangan');
        Route::post("/data/keuangan/update/{id}", 'KeuanganController@updatekeuangan')->name('pendeta.formupdatekeuangan');
        Route::get("/data/keuangan/edit/status/{id}", 'KeuanganController@ubahstatuskeuangan')->name('pendeta.formubahstatus');
        Route::get("/data/keuangan/edit/status/nonaktif/{id}", 'KeuanganController@ubahstatuskeuangan2')->name('pendeta.formubahstatus2');
        Route::get("/data/laporan-keuangan", 'KeuanganController@laporan')->name('pendeta.laporankeuangan');
        Route::get("/data/laporan-keuangan/nonaktif", 'KeuanganController@laporan2')->name('pendeta.laporankeuangannonaktif');
        Route::get("/data/laporan-keuangan/edit/status/{id}", 'KeuanganController@ubahstatuslaporan')->name('pendeta.formubahstatuslaporan');
        Route::get("/data/laporan-keuangan/edit/status/nonaktif/{id}", 'KeuanganController@ubahstatuslaporan2')->name('pendeta.formubahstatuslaporan2');
        Route::get("/data/laporan-keuangan/add", 'KeuanganController@laporankeuangan')->name('pendeta.formtambahlaporankeuangan');
        Route::post("/data/laporan-keuangan/add", 'KeuanganController@laporankeuanganprocess')->name('pendeta.formtambahlaporankeuangan');
        Route::get("/data/laporan-keuangan/edit/{id}", 'KeuanganController@ubahlaporankeuangan')->name('pendeta.formubahlaporankeuangan');
        Route::post("/data/laporan-keuangan/update/{id}", 'KeuanganController@ubahlaporankeuanganprocess')->name('pendeta.formubahlaporankeuangan');
        Route::get("/data/laporan-keuangan/cari-mingguan", 'KeuanganController@carilaporanmingguan')->name('pendeta.formcarilaporanmingguan');
        Route::get("/data/laporan-keuangan/cari-mingguan/", 'KeuanganController@processcarilaporanmingguan')->name('pendeta.formcarilaporanmingguan');
        Route::get("/data/laporan-keuangan/cari-bulanan", 'KeuanganController@carilaporanbulanan')->name('pendeta.formcarilaporanbulanan');
        Route::get("/data/laporan-keuangan/cari-bulanan/", 'KeuanganController@processcarilaporanbulanan')->name('pendeta.formcarilaporanbulanan');
        Route::get("/data/laporan-keuangan/cari-tahunan", 'KeuanganController@carilaporantahunan')->name('pendeta.formcarilaporantahunan');
        Route::get("/data/laporan-keuangan/cari-tahunan/", 'KeuanganController@processcarilaporantahunan')->name('pendeta.formcarilaporantahunan');
        Route::get("/data/laporan-keuangan-mingguan/{tanggal_awal}/{tanggal_akhir}/{id}", 'KeuanganController@laporanmingguan')->name('pendeta.laporanmingguan');
        Route::get("/data/laporan-keuangan-bulanan/{tanggal_awal}/{tanggal_akhir}/{id}", 'KeuanganController@laporanbulanan')->name('pendeta.laporanbulanan');
        Route::get("/data/laporan-keuangan-tahunan/{tanggal_awal}/{tanggal_akhir}/{id}", 'KeuanganController@laporantahunan')->name('pendeta.laporantahunan');
        Route::get('/data/keuangan/statistik', 'KeuanganController@statistik');
        Route::get("/data/keuangan/cari-pemasukan", 'KeuanganController@caridanapemasukan')->name('pendeta.formcaridanapemasukan');
        Route::get("/data/keuangan/cari-pemasukan/", 'KeuanganController@pemasukan')->name('pendeta.formcaridanapemasukan');
        Route::get("/data/keuangan/cari-pengeluaran", 'KeuanganController@caridanapengeluaran')->name('pendeta.formcaridanapengeluaran');
        Route::get("/data/keuangan/cari-pengeluaran/", 'KeuanganController@pengeluaran')->name('pendeta.formcaridanapengeluaran');
        Route::get('/data/keuangan/laporan/download-laporan-mingguanm/{tanggal_awal}/{tanggal_akhir}/{id}','KeuanganController@pdfmmingguan');
        Route::get('/data/keuangan/laporan/download-laporan-bulananm/{tanggal_awal}/{tanggal_akhir}/{id}','KeuanganController@pdfmbulanan');
        Route::get('/data/keuangan/laporan/download-laporan-tahunanm/{tanggal_awal}/{tanggal_akhir}/{id}','KeuanganController@pdfmtahunan');
    });
    Route::prefix('tatausaha')->group(function () {
        Route::get('/', 'HomeController@dashboardtatausaha')->name('tatausaha.index');
        Route::get("/data/keluarga", 'TataUsahaController@datakeluarga')->name('tatausaha.datakeluargatatausaha');
        Route::get("/data/keluarga/add", 'TataUsahaController@formkeluarga')->name('tatausaha.formkeluargatatausaha');
        Route::post("/data/keluarga/add", 'TataUsahaController@formkeluargaprocess')->name('tatausaha.formkeluarga');
        Route::get("/data/keluarga/search", 'TataUsahaController@search')->name('tatausaha.datakeluargasearch');
        Route::get("/data/keluarga/{id}", 'TataUsahaController@detailkeluarga')->name('tatausaha.detailkeluarga');
        Route::get("/editdatakeluarga/{id}", 'TataUsahaController@editdatakeluarga')->name('tatausaha.editdatakeluarga');
        Route::post('/editdatakeluarga/{id}', 'TataUsahaController@update')->name('tatausaha.update');
        Route::get("/data/jemaat/add/{idKeluarga}", 'TataUsahaController@formjemaat')->name('tatausaha.formjemaat');
        Route::post("/data/jemaat/add/{idKeluarga}", 'TataUsahaController@formjemaatprocess')->name('tatausaha.formjemaat');
        Route::get("/data/jemaat/{nik}", "TataUsahaController@detailjemaat")->name("tatausaha.detailjemaat");
        Route::get("/data/jemaat", 'TataUsahaController@datajemaat')->name('tatausaha.datajemaattatausaha');
        Route::get("/data/ultahtatausaha", 'TataUsahaController@dataultahtatausaha')->name('tatausaha.dataultahtatausaha');
        Route::get("/data/jemaat/edit/{nik}", "TataUsahaController@editdetailjemaat")->name("tatausaha.editdetailjemaat");
        Route::post("/data/jemaat/edit", "TataUsahaController@updateJemaat")->name("tatausaha.updateJemaat");
        Route::get('/jemaatperminggu', 'TataUsahaController@jemaatperminggu')->name('tatausaha.jemaatperminggu');
        Route::get('/jemaatseminggu', 'TataUsahaController@jemaatseminggu')->name('tatausaha.jemaatseminggu');
        Route::get("/data/statistik", 'TataUsahaController@datastatistik')->name('tatausaha.datastatistik');
        Route::get('/pelayangereja', 'TataUsahaController@pelayan')->name('tatausaha.datapelayantatausaha');
        Route::get("/data/pelayan/add", 'TataUsahaController@formpelayan')->name('tatausaha.formdatapelayantatausaha');
        Route::post("/data/pelayan/add", 'TataUsahaController@formpelayanprocess')->name('tatausaha.formdatapelayanusaha');
        
        Route::get("/data/dataperminggu/add", 'TataUsahaController@formdataperminggu')->name('tatausaha.formdataperminggu');
        Route::post("/data/dataperminggu/add", 'TataUsahaController@formdatapermingguproses')->name('tatausaha.formdataperminggu');
        
        Route::get("/editdatapelayan/{id}", 'TataUsahaController@editdatapelayan')->name('tatausaha.editpelayan');
        Route::post('/editdatapelayan/{id}', 'TataUsahaController@updatedatapelayan')->name('tatausaha.update');
         Route::get("/editdatajemaatperminggu/{id}", 'TataUsahaController@editdatajemaatperminggu')->name('tatausaha.editdatajemaatperminggu');
        Route::post('/editdatajemaatperminggu/{id}', 'TataUsahaController@updatedatajemaatperminggu')->name('tatausaha.updatedatajemaatperminggu');

        Route::get('/jadwal', 'TataUsahaController@showjadwal')->name('tatausaha.jadwal');
        Route::get('/tambah-jadwal', 'TataUsahaController@createjadwal')->name('tatausaha.createjadwal');
        Route::post("/tambah-jadwal", 'TataUsahaController@storejadwal')->name('tatausaha.storejadwal');
        Route::get("/editjadwal/{id}", 'TataUsahaController@editjadwal')->name('tatausaha.editjadwal');
        Route::post('/editjadwal/{id}', 'TataUsahaController@updatejadwal')->name('tatausaha.updatejadwal');
        Route::get('/renungan', 'TataUsahaController@showrenungan')->name('tatausaha.renunganshow');
        Route::get('/tambah-renungan', 'TataUsahaController@createrenungan')->name('tatausaha.createrenungan');
        Route::post("/tambah-renungan", 'TataUsahaController@storerenungan')->name('tatausaha.storerenungan');
        Route::get('/editrenungan/{id}', 'TataUsahaController@editrenungan')->name('tatausaha.editrenungan');
        Route::post('/editrenungan/{id}', 'TataUsahaController@updaterenungan')->name('tatausaha.updaterenungan');
        Route::get("/detail/ibadah", 'TataUsahaController@detailtataibadah')->name('tatausaha.detailibadah');
        Route::get("/tambah-tata", 'TataUsahaController@createtata')->name('tatausaha.createtata');
        Route::post("/tambah-tata", 'TataUsahaController@tatastore')->name('tatausaha.createtata');
        Route::get('/tataibadah/{id}', 'TataUsahaController@edittataibadah')->name('tatausaha.edittataibadah');
        Route::post('/tataibadah/{id}', 'TataUsahaController@updatetataibadah')->name('tatausaha.updaetataibadah');
        
        Route::get("/data/keuangan", 'KeuangantataController@index')->name('tatausaha.datakeuangan');
        Route::get("/data/keuangan/nonaktif", 'KeuangantataController@index2')->name('tatausaha.datakeuangannonaktif');
        Route::get("/data/keuangan/add", 'KeuangantataController@formkeuangan')->name('tatausaha.formtambahkeuangan');
        Route::post("/data/keuangan/add", 'KeuangantataController@formkeuanganprocess')->name('tatausaha.formtambahkeuangan');
        Route::get("/data/keuangan/edit/{id}", 'KeuangantataController@ubahkeuangan')->name('tatausaha.formubahkeuangan');
        Route::post("/data/keuangan/update/{id}", 'KeuangantataController@updatekeuangan')->name('tatausaha.formupdatekeuangan');
        Route::get("/data/keuangan/edit/status/{id}", 'KeuangantataController@ubahstatuskeuangan')->name('tatausaha.formubahstatus');
        Route::get("/data/keuangan/edit/status/nonaktif/{id}", 'KeuangantataController@ubahstatuskeuangan2')->name('tatausaha.formubahstatus2');
        
        Route::get("/data/laporan-keuangan", 'KeuangantataController@laporan')->name('tatausaha.laporankeuangan');
        Route::get("/data/laporan-keuangan/nonaktif", 'KeuangantataController@laporan2')->name('tatausaha.laporankeuangannonaktif');
        Route::get("/data/laporan-keuangan/edit/status/{id}", 'KeuangantataController@ubahstatuslaporan')->name('tatausaha.formubahstatuslaporan');
        Route::get("/data/laporan-keuangan/edit/status/nonaktif/{id}", 'KeuangantataController@ubahstatuslaporan2')->name('tatausaha.formubahstatuslaporan2');
        Route::get("/data/laporan-keuangan/add", 'KeuangantataController@laporankeuangan')->name('tatausaha.formtambahlaporankeuangan');
        Route::post("/data/laporan-keuangan/add", 'KeuangantataController@laporankeuanganprocess')->name('tatausaha.formtambahlaporankeuangan');
        Route::get("/data/laporan-keuangan/edit/{id}", 'KeuangantataController@ubahlaporankeuangan')->name('tatausaha.formubahlaporankeuangan');
        Route::post("/data/laporan-keuangan/update/{id}", 'KeuangantataController@ubahlaporankeuanganprocess')->name('tatausaha.formubahlaporankeuangan');
        Route::get("/data/laporan-keuangan/cari-mingguan", 'KeuangantataController@carilaporanmingguan')->name('tatausaha.formcarilaporanmingguan');
        Route::get("/data/laporan-keuangan/cari-mingguan/", 'KeuangantataController@processcarilaporanmingguan')->name('tatausaha.formcarilaporanmingguan');
        Route::get("/data/laporan-keuangan/cari-bulanan", 'KeuangantataController@carilaporanbulanan')->name('tatausaha.formcarilaporanbulanan');
        Route::get("/data/laporan-keuangan/cari-bulanan/", 'KeuangantataController@processcarilaporanbulanan')->name('tatausaha.formcarilaporanbulanan');
        Route::get("/data/laporan-keuangan/cari-tahunan", 'KeuangantataController@carilaporantahunan')->name('tatausaha.formcarilaporantahunan');
        Route::get("/data/laporan-keuangan/cari-tahunan/", 'KeuangantataController@processcarilaporantahunan')->name('tatausaha.formcarilaporantahunan');
        Route::get("/data/laporan-keuangan-mingguan/{tanggal_awal}/{tanggal_akhir}/{id}", 'KeuangantataController@laporanmingguan')->name('tatausaha.laporanmingguan');
        Route::get("/data/laporan-keuangan-bulanan/{tanggal_awal}/{tanggal_akhir}/{id}", 'KeuangantataController@laporanbulanan')->name('tatausaha.laporanbulanan');
        Route::get("/data/laporan-keuangan-tahunan/{tanggal_awal}/{tanggal_akhir}/{id}", 'KeuangantataController@laporantahunan')->name('tatausaha.laporantahunan');
        Route::get('/data/keuangan/statistik', 'KeuangantataController@statistik');
        Route::get("/data/keuangan/cari-pemasukan", 'KeuangantataController@caridanapemasukan')->name('tatausaha.formcaridanapemasukan');
        Route::get("/data/keuangan/cari-pemasukan/", 'KeuangantataController@pemasukan')->name('tatausaha.formcaridanapemasukan');
        Route::get("/data/keuangan/cari-pengeluaran", 'KeuangantataController@caridanapengeluaran')->name('tatausaha.formcaridanapengeluaran');
        Route::get("/data/keuangan/cari-pengeluaran/", 'KeuangantataController@pengeluaran')->name('tatausaha.formcaridanapengeluaran');
        Route::get('/data/keuangan/laporan/download-laporan-mingguanm/{tanggal_awal}/{tanggal_akhir}/{id}','KeuangantataController@pdfmmingguan');
        Route::get('/data/keuangan/laporan/download-laporan-bulananm/{tanggal_awal}/{tanggal_akhir}/{id}','KeuangantataController@pdfmbulanan');
        Route::get('/data/keuangan/laporan/download-laporan-tahunanm/{tanggal_awal}/{tanggal_akhir}/{id}','KeuangantataController@pdfmtahunan');
    });
    Route::prefix('penatua')->group(function () {
        Route::get('/', 'HomeController@dashboardpenatua')->name('penatua.index');
        Route::get("/data/keluarga", 'PenatuaController@datakeluarga')->name('penatua.datakeluarga');
        Route::get("/data/keluarga/add", 'PenatuaController@formkeluarga')->name('penatua.formkeluarga');
        Route::post("/data/keluarga/add", 'PenatuaController@formkeluargaprocess')->name('penatua.formkeluarga');
        Route::get("/data/keluarga/{id}", 'PenatuaController@detailkeluarga')->name('penatua.detailkeluarga');
        Route::get("/editdatakeluarga/{id}", 'PenatuaController@editdatakeluarga')->name('penatua.editdatakeluarga');
        Route::post('/editdatakeluarga/{id}', 'PenatuaController@update')->name('penatua.update');
        Route::get("/data/jemaat/add/{idKeluarga}", 'PenatuaController@formjemaat')->name('penatua.formjemaat');
        Route::post("/data/jemaat/add/{idKeluarga}", 'PenatuaController@formjemaatprocess')->name('penatua.formjemaat');
        Route::get("/data/jemaat/{nik}", "PenatuaController@detailjemaat")->name("penatua.detailjemaat");
        Route::get("/data/jemaat", 'PenatuaController@datajemaat')->name('penatua.datajemaat');
        Route::get('/pelayangereja', 'PenatuaController@pelayan')->name('penatua.datapelayan');
        Route::get("/data/pelayan/add", 'PenatuaController@formpelayan')->name('penatua.formdatapelayan');
        Route::post("/data/pelayan/add", 'PenatuaController@formpelayanprocess')->name('penatua.formdatapelayan');
        Route::get("/data/statistik", 'PenatuaController@datastatistik')->name('penatua.datastatistik');
        Route::get('/renungan', 'PenatuaController@showrenungan')->name('penatua.renunganshow');
        Route::get('/tambah-renungan', 'PenatuaController@createrenungan')->name('penatua.createrenungan');
        Route::post("/tambah-renungan", 'PenatuaController@storerenungan')->name('penatua.storerenungan');
        Route::get('/editrenungan/{id}', 'PenatuaController@editrenungan')->name('penatua.editrenungan');
        Route::post('/editrenungan/{id}', 'PenatuaController@updaterenungan')->name('penatua.updaterenungan');
        Route::get('/jadwal', 'PenatuaController@showjadwal')->name('penatua.jadwal');
        Route::get("/editjadwal/{id}", 'PenatuaController@editjadwal')->name('penatua.editjadwal');
        Route::post('/editjadwal/{id}', 'PenatuaController@updatejadwal')->name('penatua.updatejadwal');
        Route::get("/data/keuangan", 'KeuanganpenatuaController@index')->name('penatua.datakeuangan');
        Route::get("/data/keuangan/nonaktif", 'KeuanganpenatuaController@index2')->name('penatua.datakeuangannonaktif');
        Route::get("/data/keuangan/add", 'KeuanganpenatuaController@formkeuangan')->name('penatua.formtambahkeuangan');
        Route::post("/data/keuangan/add", 'KeuanganpenatuaController@formkeuanganprocess')->name('penatua.formtambahkeuangan');
        Route::get("/data/keuangan/edit/{id}", 'KeuanganpenatuaController@ubahkeuangan')->name('penatua.formubahkeuangan');
        Route::post("/data/keuangan/update/{id}", 'KeuanganpenatuaController@updatekeuangan')->name('penatua.formupdatekeuangan');
        Route::get("/data/keuangan/edit/status/{id}", 'KeuanganpenatuaController@ubahstatuskeuangan')->name('penatua.formubahstatus');
        Route::get("/data/keuangan/edit/status/nonaktif/{id}", 'KeuanganpenatuaController@ubahstatuskeuangan2')->name('penatua.formubahstatus2');
        Route::get("/data/laporan-keuangan", 'KeuanganpenatuaController@laporan')->name('penatua.laporankeuangan');
        Route::get("/data/laporan-keuangan/nonaktif", 'KeuanganpenatuaController@laporan2')->name('penatua.laporankeuangannonaktif');
        Route::get("/data/laporan-keuangan/edit/status/{id}", 'KeuanganpenatuaController@ubahstatuslaporan')->name('penatua.formubahstatuslaporan');
        Route::get("/data/laporan-keuangan/edit/status/nonaktif/{id}", 'KeuanganpenatuaController@ubahstatuslaporan2')->name('penatua.formubahstatuslaporan2');
        Route::get("/data/laporan-keuangan/add", 'KeuanganpenatuaController@laporankeuangan')->name('penatua.formtambahlaporankeuangan');
        Route::post("/data/laporan-keuangan/add", 'KeuanganpenatuaController@laporankeuanganprocess')->name('penatua.formtambahlaporankeuangan');
        Route::get("/data/laporan-keuangan/edit/{id}", 'KeuanganpenatuaController@ubahlaporankeuangan')->name('penatua.formubahlaporankeuangan');
        Route::post("/data/laporan-keuangan/update/{id}", 'KeuanganpenatuaController@ubahlaporankeuanganprocess')->name('penatua.formubahlaporankeuangan');
        Route::get("/data/laporan-keuangan/cari-mingguan", 'KeuanganpenatuaController@carilaporanmingguan')->name('penatua.formcarilaporanmingguan');
        Route::get("/data/laporan-keuangan/cari-mingguan/", 'KeuanganpenatuaController@processcarilaporanmingguan')->name('penatua.formcarilaporanmingguan');
        Route::get("/data/laporan-keuangan/cari-bulanan", 'KeuanganpenatuaController@carilaporanbulanan')->name('penatua.formcarilaporanbulanan');
        Route::get("/data/laporan-keuangan/cari-bulanan/", 'KeuanganpenatuaController@processcarilaporanbulanan')->name('penatua.formcarilaporanbulanan');
        Route::get("/data/laporan-keuangan/cari-tahunan", 'KeuanganpenatuaController@carilaporantahunan')->name('penatua.formcarilaporantahunan');
        Route::get("/data/laporan-keuangan/cari-tahunan/", 'KeuanganpenatuaController@processcarilaporantahunan')->name('penatua.formcarilaporantahunan');
        Route::get("/data/laporan-keuangan-mingguan/{tanggal_awal}/{tanggal_akhir}/{id}", 'KeuanganpenatuaController@laporanmingguan')->name('penatua.laporanmingguan');
        Route::get("/data/laporan-keuangan-bulanan/{tanggal_awal}/{tanggal_akhir}/{id}", 'KeuanganpenatuaController@laporanbulanan')->name('penatua.laporanbulanan');
        Route::get("/data/laporan-keuangan-tahunan/{tanggal_awal}/{tanggal_akhir}/{id}", 'KeuanganpenatuaController@laporantahunan')->name('penatua.laporantahunan');
        Route::get('/data/keuangan/statistik', 'KeuanganpenatuaController@statistik');
        Route::get("/data/keuangan/cari-pemasukan", 'KeuanganpenatuaController@caridanapemasukan')->name('pendeta.formcaridanapemasukan');
        Route::get("/data/keuangan/cari-pemasukan/", 'KeuanganpenatuaController@pemasukan')->name('pendeta.formcaridanapemasukan');
        Route::get("/data/keuangan/cari-pengeluaran", 'KeuanganpenatuaController@caridanapengeluaran')->name('pendeta.formcaridanapengeluaran');
        Route::get("/data/keuangan/cari-pengeluaran/", 'KeuanganpenatuaController@pengeluaran')->name('pendeta.formcaridanapengeluaran');
        Route::get('/data/keuangan/laporan/download-laporan-mingguanm/{tanggal_awal}/{tanggal_akhir}/{id}','KeuanganpenatuaController@pdfmmingguan');
        Route::get('/data/keuangan/laporan/download-laporan-bulananm/{tanggal_awal}/{tanggal_akhir}/{id}','KeuanganpenatuaController@pdfmbulanan');
        Route::get('/data/keuangan/laporan/download-laporan-tahunanm/{tanggal_awal}/{tanggal_akhir}/{id}','KeuanganpenatuaController@pdfmtahunan');

    });
    Route::prefix('bendahara')->group(function () {
        Route::get('/', 'HomeController@dashboardbendahara')->name('bendahara.index');
        Route::get("/data/keluarga", 'BendaharaController@datakeluarga')->name('bendahara.datakeluarga');
        Route::get("/data/keluarga/add", 'BendaharaController@formkeluarga')->name('bendahara.formkeluarga');
        Route::post("/data/keluarga/add", 'BendaharaController@formkeluargaprocess')->name('bendahara.formkeluarga');
        Route::get("/data/keluarga/{id}", 'BendaharaController@detailkeluarga')->name('bendahara.detailkeluarga');
        Route::get("/editdatakeluarga/{id}", 'BendaharaController@editdatakeluarga')->name('bendahara.editdatakeluarga');
        Route::post('/editdatakeluarga/{id}', 'BendaharaController@update')->name('bendahara.update');
        Route::get("/data/statistik", 'BendaharaController@datastatistik')->name('bendahara.datastatistik');
        Route::get("/data/jemaat/add/{idKeluarga}", 'BendaharaController@formjemaat')->name('bendahara.formjemaat');
        Route::post("/data/jemaat/add/{idKeluarga}", 'BendaharaController@formjemaatprocess')->name('bendahara.formjemaat');
        Route::get("/data/jemaat/edit/{nik}", "BendaharaController@editdetailjemaat")->name("bendahara.editdetailjemaat");
        Route::post("/data/jemaat/edit", "BendaharaController@updateJemaat")->name("bendahara.updateJemaat");
        Route::get("/data/jemaat/{nik}", "BendaharaController@detailjemaat")->name("bendahara.detailjemaat");
        Route::get("/data/jemaat", 'BendaharaController@datajemaat')->name('bendahara.datajemaat');
        Route::get('/pelayangereja', 'BendaharaController@pelayan')->name('bendahara.datapelayan');
        Route::get("/data/pelayan/add", 'BendaharaController@formpelayan')->name('bendahara.formdatapelayan');
        Route::post("/data/pelayan/add", 'BendaharaController@formpelayanprocess')->name('bendahara.formdatapelayan');
        
        Route::get("/data/pemasukan/add", 'KeuanganbendaharaController@formpeleanminggu')->name('bendahara.formtambahpeleanminggu');
        Route::post("/data/pemasukan/add", 'KeuanganbendaharaController@formpeleanmingguproses')->name('bendahara.formtambahpeleanminggu');
        Route::get("/data/kategorial/add", 'KeuanganbendaharaController@formpeleankategorial')->name('bendahara.formtambahpeleankategorial');
        Route::post("/data/kategorial/add", 'KeuanganbendaharaController@formpeleankategorialproses')->name('bendahara.formtambahpeleankategorial');
        Route::get("/data/lain/add", 'KeuanganbendaharaController@formpeleanlain')->name('bendahara.formtambahpeleanlain');
        Route::get("/data/peleanminggu", 'KeuanganbendaharaController@peleanminggu')->name('bendahara.peleanminggu');
        Route::get("/data/peleankategorial", 'KeuanganbendaharaController@peleankategorial')->name('bendahara.peleankategorial');
        Route::get("/data/peleanlain", 'KeuanganbendaharaController@peleanlain')->name('bendahara.peleanlain');
        Route::get("/data/peleanminggu/edit/{id}", 'KeuanganbendaharaController@ubahpeleanminggu')->name('bendahara.formubahpeleanminggu');
        Route::post("/data/peleanminggu/update/{id}", 'KeuanganbendaharaController@updatepeleanminggu')->name('bendahara.formupdatepeleanminggu');
        Route::get("/data/peleankategorial/edit/{id}", 'KeuanganbendaharaController@ubahpeleankategorial')->name('bendahara.formubahpeleankategorial');
        Route::post("/data/peleankategorial/update/{id}", 'KeuanganbendaharaController@updatepeleankategorial')->name('bendahara.formupdatepeleankategorial');
        Route::get("/data/peleanlain/edit/{id}", 'KeuanganbendaharaController@ubahpeleanlain')->name('bendahara.formubahpeleanlain');
        Route::post("/data/peleanlain/update/{id}", 'KeuanganbendaharaController@updatepeleanlain')->name('bendahara.formupdatepeleanlain');
         Route::get("/data/pengeluarangereja/add", 'KeuanganbendaharaController@formpengeluarangereja')->name('bendahara.formtambahpengeluarangereja');
        Route::post("/data/pengeluarangereja/add", 'KeuanganbendaharaController@formpengeluarangerejaproses')->name('bendahara.formtambahpengeluarangereja');
        Route::get("/data/pengeluarangereja", 'KeuanganbendaharaController@pengeluarangereja')->name('bendahara.pengeluarangereja');
        Route::get("/data/pengeluarangereja/edit/{id}", 'KeuanganbendaharaController@ubahpengeluarangereja')->name('bendahara.formubahpengeluarangereja');
        Route::post("/data/pengeluarangereja/update/{id}", 'KeuanganbendaharaController@updatepengeluarangereja')->name('bendahara.formupdatepengeluarangereja');
        
        Route::get("/data/baktikeluarga", 'BendaharaController@baktikeluarga')->name('bendahara.baktikeluarga');
        Route::post("/data/baktikeluarga", 'BendaharaController@tambahbaktikeluarga')->name('bendahara.storebaktikeluarga');
        Route::get("/data/baktijemaat", 'BendaharaController@baktijemaat')->name('bendahara.baktijemaat');
        Route::post("/data/baktijemaat", 'BendaharaController@tambahbaktijemaat')->name('bendahara.storebaktijemaat');


        Route::post("/data/lain/add", 'KeuanganbendaharaController@formpeleanlainproses')->name('bendahara.formtambahpeleanlain');
        
        Route::get("/data/lihatpenyewaangedung", 'KeuanganbendaharaController@lihatpenyewaangedung')->name('bendahara.lihatpenyewaangedung');
        Route::get("/data/lihatucapansyukur", 'KeuanganbendaharaController@lihatucapansyukur')->name('bendahara.lihatucapansyukur');
        Route::get("/data/keuangan", 'KeuanganbendaharaController@index')->name('bendahara.datakeuangan');
        Route::get("/data/sewagedung", 'KeuanganbendaharaController@tambahsewagedung')->name('bendahara.sewagedung');
        Route::post("/data/sewagedung", 'KeuanganbendaharaController@tambahsewagedungprocess')->name('bendahara.sewagedung');
        Route::get("/data/ucapansyukurkeluarga", 'KeuanganbendaharaController@tambahucapansyukurkeluarga')->name('bendahara.ucapansyukurkeluarga');
        Route::post("/data/ucapansyukurkeluarga", 'KeuanganbendaharaController@tambahucapansyukurkeluargaprocess')->name('bendahara.ucapansyukurkeluarga');
        Route::get("/data/laporankeuangankeluarga", 'KeuanganbendaharaController@index3')->name('bendahara.laporankeuangankeluarga');
        Route::get("/data/laporankeuanganPerminggu", 'KeuanganbendaharaController@keuangankeluargaPerminggu')->name('bendahara.laporankeuanganPerminggu');
        Route::get("/data/add/tambahkeuangankeluarga", 'KeuanganbendaharaController@tambahkeuangankeluarga')->name('bendahara.tambahkeuangankeluarga');
        Route::post("/data/add/tambahkeuangankeluarga", 'KeuanganbendaharaController@tambahkeuangankeluargaprocess')->name('bendahara.tambahkeuangankeluarga');
        Route::get("/editkeuangankeluarga/edit/{no_kk}", 'KeuanganbendaharaController@editkeuangankeluarga')->name('bendahara.editkeuangankeluarga');
        Route::post("/updatekeuangankeluarga/update/{no_kk}", 'KeuanganbendaharaController@updatekeuangankeluarga')->name('bendahara.editkeuangankeluarga');
        Route::get("/data/keuangan/nonaktif", 'KeuanganbendaharaController@index2')->name('bendahara.datakeuangannonaktif');
        Route::get("/data/keuangan/add", 'KeuanganbendaharaController@formkeuangan')->name('bendahara.formtambahkeuangan');
        Route::post("/data/keuangan/add", 'KeuanganbendaharaController@formkeuanganprocess')->name('bendahara.formtambahkeuangan');
        Route::get("/data/keuangan/edit/{id}", 'KeuanganbendaharaController@ubahkeuangan')->name('bendahara.formubahkeuangan');
        Route::post("/data/keuangan/update/{id}", 'KeuanganbendaharaController@updatekeuangan')->name('bendahara.formupdatekeuangan');
        Route::get("/data/keuangan/edit/status/{id}", 'KeuanganbendaharaController@ubahstatuskeuangan')->name('bendahara.formubahstatus');
        Route::get("/data/keuangan/edit/status/nonaktif/{id}", 'KeuanganbendaharaController@ubahstatuskeuangan2')->name('bendahara.formubahstatus2');
        Route::get("/data/laporan-keuangan", 'KeuanganbendaharaController@laporan')->name('bendahara.laporankeuangan');
        Route::get("/data/laporan-keuangan/nonaktif", 'KeuanganbendaharaController@laporan2')->name('bendahara.laporankeuangannonaktif');
        Route::get("/data/laporan-keuangan/edit/status/{id}", 'KeuanganbendaharaController@ubahstatuslaporan')->name('bendahara.formubahstatuslaporan');
        Route::get("/data/laporan-keuangan/edit/status/nonaktif/{id}", 'KeuanganbendaharaController@ubahstatuslaporan2')->name('bendahara.formubahstatuslaporan2');
        Route::get("/data/laporan-keuangan/add", 'KeuanganbendaharaController@laporankeuangan')->name('bendahara.formtambahlaporankeuangan');
        Route::post("/data/laporan-keuangan/add", 'KeuanganbendaharaController@laporankeuanganprocess')->name('bendahara.formtambahlaporankeuangan');
        Route::get("/data/laporan-keuangan/edit/{id}", 'KeuanganbendaharaController@ubahlaporankeuangan')->name('bendahara.formubahlaporankeuangan');
        Route::post("/data/laporan-keuangan/update/{id}", 'KeuanganbendaharaController@ubahlaporankeuanganprocess')->name('bendahara.formubahlaporankeuangan');
        Route::get("/data/laporan-keuangan/cari-mingguan", 'KeuanganbendaharaController@carilaporanmingguan')->name('bendahara.formcarilaporanmingguan');
        Route::get("/data/laporan-keuangan/cari-mingguan/", 'KeuanganbendaharaController@processcarilaporanmingguan')->name('bendahara.formcarilaporanmingguan');
        Route::get("/data/laporan-keuangan/cari-bulanan", 'KeuanganbendaharaController@carilaporanbulanan')->name('bendahara.formcarilaporanbulanan');
        Route::get("/data/laporan-keuangan/cari-bulanan/", 'KeuanganbendaharaController@processcarilaporanbulanan')->name('bendahara.formcarilaporanbulanan');
        Route::get("/data/laporan-keuangan/cari-tahunan", 'KeuanganbendaharaController@carilaporantahunan')->name('bendahara.formcarilaporantahunan');
        Route::get("/data/laporan-keuangan/cari-tahunan/", 'KeuanganbendaharaController@processcarilaporantahunan')->name('bendahara.formcarilaporantahunan');
        Route::get("/data/laporan-keuangan-mingguan/{tanggal_awal}/{tanggal_akhir}/{id}", 'KeuanganbendaharaController@laporanmingguan')->name('bendahara.laporanmingguan');
        Route::get("/data/laporan-keuangan-bulanan/{tanggal_awal}/{tanggal_akhir}/{id}", 'KeuanganbendaharaController@laporanbulanan')->name('bendahara.laporanbulanan');
        Route::get("/data/laporan-keuangan-tahunan/{tanggal_awal}/{tanggal_akhir}/{id}", 'KeuanganbendaharaController@laporantahunan')->name('bendahara.laporantahunan');
        Route::get('/data/keuangan/statistik', 'KeuanganbendaharaController@statistik');
        Route::get("/data/keuangan/cari-pemasukan", 'KeuanganbendaharaController@caridanapemasukan')->name('pendeta.formcaridanapemasukan');
        Route::get("/data/keuangan/cari-pemasukan/", 'KeuanganbendaharaController@pemasukan')->name('pendeta.formcaridanapemasukan');
        Route::get("/data/keuangan/cari-pengeluaran", 'KeuanganbendaharaController@caridanapengeluaran')->name('pendeta.formcaridanapengeluaran');
        Route::get("/data/keuangan/cari-pengeluaran/", 'KeuanganbendaharaController@pengeluaran')->name('pendeta.formcaridanapengeluaran');
        Route::get('/data/keuangan/laporan/download-laporan-mingguanm/{tanggal_awal}/{tanggal_akhir}/{id}','KeuanganbendaharaController@pdfmmingguan');
        Route::get('/data/keuangan/laporan/download-laporan-bulananm/{tanggal_awal}/{tanggal_akhir}/{id}','KeuanganbendaharaController@pdfmbulanan');
        Route::get('/data/keuangan/laporan/download-laporan-tahunanm/{tanggal_awal}/{tanggal_akhir}/{id}','KeuanganbendaharaController@pdfmtahunan');
    });
    Route::prefix('sekretaris')->group(function () {
        Route::get('/', 'HomeController@dashboardsekretaris')->name('sekretaris.index');
        Route::get("/data/keluarga", 'SekretarisController@datakeluarga')->name('sekretaris.datakeluarga');
        Route::get("/data/keluarga/add", 'SekretarisController@formkeluarga')->name('sekretaris.formkeluarga');
        Route::post("/data/keluarga/add", 'SekretarisController@formkeluargaprocess')->name('sekretaris.formkeluarga');
        Route::get("/data/keluarga/{id}", 'SekretarisController@detailkeluarga')->name('sekretaris.detailkeluarga');
        Route::get("/editdatakeluarga/{id}", 'SekretarisController@editdatakeluarga')->name('sekretaris.editdatakeluarga');
        Route::post('/editdatakeluarga/{id}', 'SekretarisController@update')->name('sekretaris.update');
        Route::get("/data/jemaat/add/{idKeluarga}", 'SekretarisController@formjemaat')->name('sekretaris.formjemaat');
        Route::post("/data/jemaat/add/{idKeluarga}", 'SekretarisController@formjemaatprocess')->name('sekretaris.formjemaat');
        Route::get("/data/jemaat/{nik}", "SekretarisController@detailjemaat")->name("sekretaris.detailjemaat");
        Route::get("/data/jemaat", 'SekretarisController@datajemaat')->name('sekretaris.datajemaat');
        Route::get("/data/statistik", 'SekretarisController@datastatistik')->name('sekretaris.datastatistik');
        Route::get('/pelayangereja', 'SekretarisController@pelayan')->name('sekretaris.datapelayan');
        Route::get("/data/jemaat/edit/{nik}", "SekretarisController@editdetailjemaat")->name("sekretaris.editdetailjemaat");
        Route::post("/data/jemaat/edit", "SekretarisController@updateJemaat")->name("sekretaris.updateJemaat");
        Route::get("/data/ultahsekretaris", 'SekretarisController@dataultahsekretaris')->name('sekretaris.dataultahsekretaris');
        Route::get("/data/pelayan/add", 'SekretarisController@formpelayan')->name('sekretaris.formdatapelayan');
        Route::post("/data/pelayan/add", 'SekretarisController@formpelayanprocess')->name('sekretaris.formdatapelayan');
        Route::get("/data/keuangan", 'KeuangansekreController@index')->name('sekretaris.datakeuangan');
        Route::get("/data/keuangan/nonaktif", 'KeuangansekreController@index2')->name('sekretaris.datakeuangannonaktif');
        Route::get("/data/keuangan/add", 'KeuangansekreController@formkeuangan')->name('sekretaris.formtambahkeuangan');
        Route::post("/data/keuangan/add", 'KeuangansekreController@formkeuanganprocess')->name('sekretaris.formtambahkeuangan');
        Route::get("/data/keuangan/edit/{id}", 'KeuangansekreController@ubahkeuangan')->name('sekretaris.formubahkeuangan');
        Route::post("/data/keuangan/update/{id}", 'KeuangansekreController@updatekeuangan')->name('sekretaris.formupdatekeuangan');
        Route::get("/data/keuangan/edit/status/{id}", 'KeuangansekreController@ubahstatuskeuangan')->name('sekretaris.formubahstatus');
        Route::get("/data/keuangan/edit/status/nonaktif/{id}", 'KeuangansekreController@ubahstatuskeuangan2')->name('sekretaris.formubahstatus2');
        Route::get("/data/laporan-keuangan", 'KeuangansekreController@laporan')->name('sekretaris.laporankeuangan');
        Route::get("/data/laporan-keuangan/nonaktif", 'KeuangansekreController@laporan2')->name('sekretaris.laporankeuangannonaktif');
        Route::get("/data/laporan-keuangan/edit/status/{id}", 'KeuangansekreController@ubahstatuslaporan')->name('sekretaris.formubahstatuslaporan');
        Route::get("/data/laporan-keuangan/edit/status/nonaktif/{id}", 'KeuangansekreController@ubahstatuslaporan2')->name('sekretaris.formubahstatuslaporan2');
        Route::get("/data/laporan-keuangan/add", 'KeuangansekreController@laporankeuangan')->name('sekretaris.formtambahlaporankeuangan');
        Route::post("/data/laporan-keuangan/add", 'KeuangansekreController@laporankeuanganprocess')->name('sekretaris.formtambahlaporankeuangan');
        Route::get("/data/laporan-keuangan/edit/{id}", 'KeuangansekreController@ubahlaporankeuangan')->name('sekretaris.formubahlaporankeuangan');
        Route::post("/data/laporan-keuangan/update/{id}", 'KeuangansekreController@ubahlaporankeuanganprocess')->name('sekretaris.formubahlaporankeuangan');
        Route::get("/data/laporan-keuangan/cari-mingguan", 'KeuangansekreController@carilaporanmingguan')->name('sekretaris.formcarilaporanmingguan');
        Route::get("/data/laporan-keuangan/cari-mingguan/", 'KeuangansekreController@processcarilaporanmingguan')->name('sekretaris.formcarilaporanmingguan');
        Route::get("/data/laporan-keuangan/cari-bulanan", 'KeuangansekreController@carilaporanbulanan')->name('sekretaris.formcarilaporanbulanan');
        Route::get("/data/laporan-keuangan/cari-bulanan/", 'KeuangansekreController@processcarilaporanbulanan')->name('sekretaris.formcarilaporanbulanan');
        Route::get("/data/laporan-keuangan/cari-tahunan", 'KeuangansekreController@carilaporantahunan')->name('sekretaris.formcarilaporantahunan');
        Route::get("/data/laporan-keuangan/cari-tahunan/", 'KeuangansekreController@processcarilaporantahunan')->name('sekretaris.formcarilaporantahunan');
        Route::get("/data/laporan-keuangan-mingguan/{tanggal_awal}/{tanggal_akhir}/{id}", 'KeuangansekreController@laporanmingguan')->name('sekretaris.laporanmingguan');
        Route::get("/data/laporan-keuangan-bulanan/{tanggal_awal}/{tanggal_akhir}/{id}", 'KeuangansekreController@laporanbulanan')->name('sekretaris.laporanbulanan');
        Route::get("/data/laporan-keuangan-tahunan/{tanggal_awal}/{tanggal_akhir}/{id}", 'KeuangansekreController@laporantahunan')->name('sekretaris.laporantahunan');
        Route::get('/data/keuangan/statistik', 'KeuangansekreController@statistik');
        Route::get("/data/keuangan/cari-pemasukan", 'KeuangansekreController@caridanapemasukan')->name('pendeta.formcaridanapemasukan');
        Route::get("/data/keuangan/cari-pemasukan/", 'KeuangansekreController@pemasukan')->name('pendeta.formcaridanapemasukan');
        Route::get("/data/keuangan/cari-pengeluaran", 'KeuangansekreController@caridanapengeluaran')->name('pendeta.formcaridanapengeluaran');
        Route::get("/data/keuangan/cari-pengeluaran/", 'KeuangansekreController@pengeluaran')->name('pendeta.formcaridanapengeluaran');
        Route::get('/data/keuangan/laporan/download-laporan-mingguanm/{tanggal_awal}/{tanggal_akhir}/{id}','KeuangansekreController@pdfmmingguan');
        Route::get('/data/keuangan/laporan/download-laporan-bulananm/{tanggal_awal}/{tanggal_akhir}/{id}','KeuangansekreController@pdfmbulanan');
        Route::get('/data/keuangan/laporan/download-laporan-tahunanm/{tanggal_awal}/{tanggal_akhir}/{id}','KeuangansekreController@pdfmtahunan');
    });
});
Route::fallback(function () {
    abort(404);
});