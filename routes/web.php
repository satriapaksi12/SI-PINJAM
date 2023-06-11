<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlatController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\GedungController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\JenisAcaraController;
use App\Http\Controllers\ReservasiAlatController;
use App\Http\Controllers\JenisKendaraanController;
use App\Http\Controllers\ReservasiRuangController;
use App\Http\Controllers\ReservasiKendaraanController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

Route::get('/', function () {
    return view('landingpage');
});

Route::get('/dashboard', [HomeController::class, 'index'])->middleware('auth', 'verified');

//login
Route::get('/login',[AuthController::class, 'login'])->name('login');
Route::post('/login',[AuthController::class, 'authenticating']);
//logout
Route::get('/logout',[AuthController::class, 'logout'])->middleware('auth');

//Register
Route::get('/register',[AuthController::class, 'register']);
Route::post('/register',[AuthController::class, 'registerProses']);
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/login');
})->middleware(['auth', 'signed'])->name('verification.verify');

//Profile
Route::get('/profile',[AuthController::class, 'profile'])->middleware('auth');

//kelola unit
Route::get('/unit',[UnitController::class, 'index'])->middleware(['auth','must-superadmin-or-admin']);
Route::get('/unit-add',[UnitController::class, 'create'])->middleware(['auth','must-superadmin-or-admin']);
Route::post('/unit',[UnitController::class, 'store'])->middleware(['auth','must-superadmin-or-admin']);
Route::get('/unit-edit/{id}',[UnitController::class, 'edit'])->middleware(['auth','must-superadmin-or-admin']);
Route::put('/unit/{id}',[UnitController::class, 'update'])->middleware(['auth','must-superadmin-or-admin']);
Route::delete('/unit-destroy/{id}',[UnitController::class, 'destroy'])->middleware(['auth','must-superadmin-or-admin']);
Route::get('/export-unit', [UnitController::class, 'exportUnits'])->middleware(['auth','must-superadmin-or-admin']);
Route::post('/import-unit',[UnitController::class, 'importUnits'])->middleware(['auth','must-superadmin-or-admin']);


//kelola periode
Route::get('/periode',[PeriodeController::class, 'index'])->middleware(['auth','must-superadmin-or-admin']);
Route::get('/periode-add',[PeriodeController::class, 'create'])->middleware(['auth','must-superadmin-or-admin']);
Route::post('/periode',[PeriodeController::class, 'store'])->middleware(['auth','must-superadmin-or-admin']);
Route::get('/periode-edit/{id}',[PeriodeController::class, 'edit'])->middleware(['auth','must-superadmin-or-admin']);
Route::put('/periode/{id}',[PeriodeController::class, 'update'])->middleware(['auth','must-superadmin-or-admin']);
Route::delete('/periode-destroy/{id}',[PeriodeController::class, 'destroy'])->middleware(['auth','must-superadmin-or-admin']);
Route::get('/export-periode', [PeriodeController::class, 'exportPeriodes'])->middleware(['auth','must-superadmin-or-admin']);
Route::post('/import-periode',[PeriodeController::class, 'importPeriodes'])->middleware(['auth','must-superadmin-or-admin']);


//kelola jenis acara
Route::get('/jenis_acara',[JenisAcaraController::class, 'index'])->middleware(['auth','must-superadmin-or-admin']);
Route::get('/jenis_acara-add',[JenisAcaraController::class, 'create'])->middleware(['auth','must-superadmin-or-admin']);
Route::post('/jenis_acara',[JenisAcaraController::class, 'store'])->middleware(['auth','must-superadmin-or-admin']);
Route::get('/jenis_acara-edit/{id}',[JenisAcaraController::class, 'edit'])->middleware(['auth','must-superadmin-or-admin']);
Route::put('/jenis_acara/{id}',[JenisAcaraController::class, 'update'])->middleware(['auth','must-superadmin-or-admin']);
Route::delete('/jenis_acara-destroy/{id}',[JenisAcaraController::class, 'destroy'])->middleware(['auth','must-superadmin-or-admin']);
Route::get('/export-jenis_acara', [JenisAcaraController::class, 'exportJenisAcaras'])->middleware(['auth','must-superadmin-or-admin']);
Route::post('/import-jenis_acara',[JenisAcaraController::class, 'importJenisAcaras'])->middleware(['auth','must-superadmin-or-admin']);


//kelola jenis kendaraan
Route::get('/jenis_kendaraan',[JenisKendaraanController::class, 'index'])->middleware(['auth','must-superadmin-or-admin']);
Route::get('/jenis_kendaraan-add',[JenisKendaraanController::class, 'create'])->middleware(['auth','must-superadmin-or-admin']);
Route::post('/jenis_kendaraan',[JenisKendaraanController::class, 'store'])->middleware(['auth','must-superadmin-or-admin']);
Route::get('/jenis_kendaraan-edit/{id}',[JenisKendaraanController::class, 'edit'])->middleware(['auth','must-superadmin-or-admin']);
Route::put('/jenis_kendaraan/{id}',[JenisKendaraanController::class, 'update'])->middleware(['auth','must-superadmin-or-admin']);
Route::delete('/jenis_kendaraan-destroy/{id}',[JenisKendaraanController::class, 'destroy'])->middleware(['auth','must-superadmin-or-admin']);
Route::get('/export-jenis_kendaraan', [JenisKendaraanController::class, 'exportJenisKendaraans'])->middleware(['auth','must-superadmin-or-admin']);
Route::post('/import-jenis_kendaraan',[JenisKendaraanController::class, 'importJenisKendaraans'])->middleware(['auth','must-superadmin-or-admin']);


//kelola gedung
Route::get('/gedung',[GedungController::class, 'index'])->middleware(['auth','must-superadmin-or-admin']);
Route::get('/gedung-add',[GedungController::class, 'create'])->middleware(['auth','must-superadmin-or-admin']);
Route::post('/gedung',[GedungController::class, 'store'])->middleware(['auth','must-superadmin-or-admin']);
Route::get('/gedung-edit/{id}',[GedungController::class, 'edit'])->middleware(['auth','must-superadmin-or-admin']);
Route::put('/gedung/{id}',[GedungController::class, 'update'])->middleware(['auth','must-superadmin-or-admin']);
Route::delete('/gedung-destroy/{id}',[GedungController::class, 'destroy'])->middleware(['auth','must-superadmin-or-admin']);
Route::get('/export-gedung', [GedungController::class, 'exportGedungs'])->middleware(['auth','must-superadmin-or-admin']);
Route::post('/import-gedung',[GedungController::class, 'importGedungs'])->middleware(['auth','must-superadmin-or-admin']);



//kelola lokasi kampus
Route::get('/lokasi',[LokasiController::class, 'index'])->middleware(['auth','must-superadmin-or-admin']);
Route::get('/lokasi-add',[LokasiController::class, 'create'])->middleware(['auth','must-superadmin-or-admin']);
Route::post('/lokasi',[LokasiController::class, 'store'])->middleware(['auth','must-superadmin-or-admin']);
Route::get('/lokasi-edit/{id}',[LokasiController::class, 'edit'])->middleware(['auth','must-superadmin-or-admin']);
Route::put('/lokasi/{id}',[LokasiController::class, 'update'])->middleware(['auth','must-superadmin-or-admin']);
Route::delete('/lokasi-destroy/{id}',[LokasiController::class, 'destroy'])->middleware(['auth','must-superadmin-or-admin']);
Route::get('/export-lokasi', [LokasiController::class, 'exportLokasis'])->middleware(['auth','must-superadmin-or-admin']);
Route::post('/import-lokasi',[LokasiController::class, 'importLokasis'])->middleware(['auth','must-superadmin-or-admin']);



//kelola sesi
Route::get('/sesi',[SesiController::class, 'index'])->middleware(['auth','must-superadmin-or-admin']);
Route::get('/sesi-add',[SesiController::class, 'create'])->middleware(['auth','must-superadmin-or-admin']);
Route::post('/sesi',[SesiController::class, 'store'])->middleware(['auth','must-superadmin-or-admin']);
Route::get('/sesi-edit/{id}',[SesiController::class, 'edit'])->middleware(['auth','must-superadmin-or-admin']);
Route::put('/sesi/{id}',[SesiController::class, 'update'])->middleware(['auth','must-superadmin-or-admin']);
Route::delete('/sesi-destroy/{id}',[SesiController::class, 'destroy'])->middleware(['auth','must-superadmin-or-admin']);
Route::get('/export-sesi', [SesiController::class, 'exportSesis'])->middleware(['auth','must-superadmin-or-admin']);
Route::post('/import-sesi',[SesiController::class, 'importSesis'])->middleware(['auth','must-superadmin-or-admin']);


//kelola kendaraan
Route::get('/kendaraan',[KendaraanController::class, 'index'])->middleware(['auth','must-superadmin-or-admin']);
Route::get('/kendaraan-add',[KendaraanController::class, 'create'])->middleware(['auth','must-superadmin-or-admin']);
Route::post('/kendaraan',[KendaraanController::class, 'store'])->middleware(['auth','must-superadmin-or-admin']);
Route::get('/kendaraan-edit/{id}',[KendaraanController::class, 'edit'])->middleware(['auth','must-superadmin-or-admin']);
Route::put('/kendaraan/{id}',[KendaraanController::class, 'update'])->middleware(['auth','must-superadmin-or-admin']);
Route::delete('/kendaraan-destroy/{id}',[KendaraanController::class, 'destroy'])->middleware(['auth','must-superadmin-or-admin']);
Route::get('/export-kendaraan', [KendaraanController::class, 'exportKendaraans'])->middleware(['auth','must-superadmin-or-admin']);
Route::post('/import-kendaraan',[KendaraanController::class, 'importKendaraans'])->middleware(['auth','must-superadmin-or-admin']);



//Reservasi  kendaraan
Route::get('/reservasi-kendaraan',[ReservasiKendaraanController::class, 'index'])->middleware(['auth','forbidden-umum-or-mahasiswa']);
Route::get('/reservasi-kendaraan-add/{id}',[ReservasiKendaraanController::class, 'create'])->middleware(['auth','forbidden-umum-or-mahasiswa']);
Route::post('/reservasi-kendaraan',[ReservasiKendaraanController::class, 'store'])->middleware(['auth','forbidden-umum-or-mahasiswa']);
Route::get('/kelola-reservasi-kendaraan',[ReservasiKendaraanController::class, 'kelolaReservasi'])->middleware(['auth','must-superadmin-or-admin']);
Route::get('/validasi-reservasi-kendaraan/{id}',[ReservasiKendaraanController::class, 'validasi'])->middleware(['auth','must-superadmin-or-admin']);
Route::put('/validasi-reservasi-kendaraan/{id}',[ReservasiKendaraanController::class, 'simpanValidasi'])->middleware(['auth','must-superadmin-or-admin']);
Route::get('/detail-reservasi-kendaraan/{id}',[ReservasiKendaraanController::class, 'detailReservasi'])->middleware(['auth','forbidden-umum-or-mahasiswa']);
Route::get('/detail-reservasi-kendaraan-cetak/{id}',[ReservasiKendaraanController::class, 'cetakReservasi'])->middleware(['auth','forbidden-umum-or-mahasiswa']);
Route::get('/daftar-reservasi-kendaraan',[ReservasiKendaraanController::class, 'daftarReservasi'])->middleware(['auth','forbidden-umum-or-mahasiswa']);
Route::get('/cekJadwal_kendaraan',[ReservasiKendaraanController::class, 'cekJadwal'])->middleware('auth');
Route::get('/export-reservasi_kendaraan', [ReservasiKendaraanController::class, 'exportReservasiKendaraans'])->middleware(['auth','must-superadmin-or-admin']);
Route::post('/import-reservasi_kendaraan',[ReservasiKendaraanController::class, 'importReservasiKendaraans'])->middleware(['auth','must-superadmin-or-admin']);



//kelola alat
Route::get('/alat',[AlatController::class, 'index'])->middleware(['auth','must-superadmin-or-admin']);
Route::get('/alat/{id}',[AlatController::class, 'show'])->middleware(['auth','must-superadmin-or-admin']);
Route::get('/alat-add',[AlatController::class, 'create'])->middleware(['auth','must-superadmin-or-admin']);
Route::post('/alat',[AlatController::class, 'store'])->middleware(['auth','must-superadmin-or-admin']);
Route::get('/alat-edit/{id}',[AlatController::class, 'edit'])->middleware(['auth','must-superadmin-or-admin']);
Route::put('/alat/{id}',[AlatController::class, 'update'])->middleware(['auth','must-superadmin-or-admin']);
Route::delete('/alat-destroy/{id}',[AlatController::class, 'destroy'])->middleware(['auth','must-superadmin-or-admin']);
Route::get('/export-alat', [AlatController::class, 'exportAlats'])->middleware(['auth','must-superadmin-or-admin']);
Route::post('/import-alat',[AlatController::class, 'importAlats'])->middleware(['auth','must-superadmin-or-admin']);


//Reservasi  alat
Route::get('/reservasi-alat',[ReservasiAlatController::class, 'index'])->middleware(['auth','forbidden-umum']);
Route::get('/reservasi-alat-add/{id}',[ReservasiAlatController::class, 'create'])->middleware(['auth','forbidden-umum']);
Route::post('/reservasi-alat',[ReservasiAlatController::class, 'store'])->middleware(['auth','forbidden-umum']);
Route::get('/kelola-reservasi-alat',[ReservasiAlatController::class, 'kelolaReservasi'])->middleware(['auth','must-superadmin-or-admin']);
Route::get('/validasi-reservasi-alat/{id}',[ReservasiAlatController::class, 'validasi'])->middleware(['auth','must-superadmin-or-admin']);
Route::put('/validasi-reservasi-alat/{id}',[ReservasiAlatController::class, 'simpanValidasi'])->middleware(['auth','must-superadmin-or-admin']);
Route::get('/detail-reservasi-alat/{id}',[ReservasiAlatController::class, 'detailReservasi'])->middleware(['auth','forbidden-umum']);
Route::get('/detail-reservasi-alat-cetak/{id}',[ReservasiAlatController::class, 'cetakReservasi'])->middleware(['auth','forbidden-umum']);
Route::get('/daftar-reservasi-alat',[ReservasiAlatController::class, 'daftarReservasi'])->middleware(['auth','forbidden-umum']);
Route::get('/cekJadwal_alat',[ReservasiAlatController::class, 'cekJadwal'])->middleware('auth');
Route::get('/export-reservasi_alat', [ReservasiAlatController::class, 'exportReservasiAlats'])->middleware(['auth','must-superadmin-or-admin']);
Route::post('/import-reservasi_alat',[ReservasiAlatController::class, 'importReservasiAlats'])->middleware(['auth','must-superadmin-or-admin']);



//kelola role
Route::get('/role',[RoleController::class, 'index'])->middleware(['auth','must-superadmin']);
Route::get('/role-add',[RoleController::class, 'create'])->middleware(['auth','must-superadmin']);
Route::post('/role',[RoleController::class, 'store'])->middleware(['auth','must-superadmin']);
Route::get('/role-edit/{id}',[RoleController::class, 'edit'])->middleware(['auth','must-superadmin']);
Route::put('/role/{id}',[RoleController::class, 'update'])->middleware(['auth','must-superadmin']);
Route::delete('/role-destroy/{id}',[RoleController::class, 'destroy'])->middleware(['auth','must-superadmin']);
Route::get('/export-roles', [RoleController::class, 'exportRoles'])->middleware(['auth','must-superadmin']);
Route::post('/import-roles',[RoleController::class, 'importRoles'])->middleware(['auth','must-superadmin']);


//kelola user
Route::get('/user',[UserController::class, 'index'])->middleware(['auth','must-superadmin']);
Route::get('/user/{id}',[UserController::class, 'show'])->middleware(['auth','must-superadmin']);
Route::get('/user-add',[UserController::class, 'create'])->middleware(['auth','must-superadmin']);
Route::post('/user',[UserController::class, 'store'])->middleware(['auth','must-superadmin']);
Route::get('/user-edit/{id}',[UserController::class, 'edit'])->middleware(['auth','must-superadmin']);
Route::put('/user/{id}',[UserController::class, 'update'])->middleware(['auth','must-superadmin']);
Route::delete('/user-destroy/{id}',[UserController::class, 'destroy'])->middleware(['auth','must-superadmin']);
Route::get('/user-deleted',[UserController::class, 'deletedUser'])->middleware(['auth','must-superadmin']);
Route::get('/user/{id}/restore',[UserController::class, 'restore'])->middleware(['auth','must-superadmin']);
Route::get('/export-users', [UserController::class, 'exportUsers'])->middleware(['auth','must-superadmin']);
Route::post('/import-users',[UserController::class, 'importUsers'])->middleware(['auth','must-superadmin']);



//kelola ruangan
Route::get('/ruang',[RuangController::class, 'index'])->middleware(['auth','must-superadmin-or-admin']);
Route::get('/ruang/{id}',[RuangController::class, 'show'])->middleware(['auth','must-superadmin-or-admin']);
Route::get('/ruang-add',[RuangController::class, 'create'])->middleware(['auth','must-superadmin-or-admin']);
Route::post('/ruang',[RuangController::class, 'store'])->middleware(['auth','must-superadmin-or-admin']);
Route::get('/ruang-edit/{id}',[RuangController::class, 'edit'])->middleware(['auth','must-superadmin-or-admin']);
Route::put('/ruang/{id}',[RuangController::class, 'update'])->middleware(['auth','must-superadmin-or-admin']);
Route::delete('/ruang-destroy/{id}',[RuangController::class, 'destroy'])->middleware(['auth','must-superadmin-or-admin']);
Route::get('/export-ruang', [RuangController::class, 'exportRuangs'])->middleware(['auth','must-superadmin-or-admin']);
Route::post('/import-ruang',[RuangController::class, 'importRuangs'])->middleware(['auth','must-superadmin-or-admin']);



//Reservasi  ruangan
Route::get('/reservasi-ruang',[ReservasiRuangController::class, 'index'])->middleware(['auth','forbidden-umum']);
Route::get('/reservasi-ruang-add/{id}',[ReservasiRuangController::class, 'create'])->middleware(['auth','forbidden-umum']);
Route::post('/reservasi-ruang',[ReservasiRuangController::class, 'store'])->middleware(['auth','forbidden-umum']);
Route::get('/kelola-reservasi-ruang',[ReservasiRuangController::class, 'kelolaReservasi'])->middleware(['auth','must-superadmin-or-admin']);
Route::get('/validasi-reservasi-ruang/{id}',[ReservasiRuangController::class, 'validasi'])->middleware(['auth','must-superadmin-or-admin']);
Route::put('/validasi-reservasi-ruang/{id}',[ReservasiRuangController::class, 'simpanValidasi'])->middleware(['auth','must-superadmin-or-admin']);
Route::get('/detail-reservasi-ruang/{id}',[ReservasiRuangController::class, 'detailReservasi'])->middleware(['auth','forbidden-umum']);
Route::get('/detail-reservasi-ruang-cetak/{id}',[ReservasiRuangController::class, 'cetakReservasi'])->middleware(['auth','forbidden-umum']);
Route::get('/daftar-reservasi-ruang',[ReservasiRuangController::class, 'daftarReservasi'])->middleware(['auth','forbidden-umum']);
Route::get('/cekJadwal_ruang',[ReservasiRuangController::class, 'cekJadwal'])->middleware('auth');
Route::get('/export-reservasi_ruangan', [ReservasiRuangController::class, 'exportReservasiRuangans'])->middleware(['auth','must-superadmin-or-admin']);
Route::post('/import-reservasi_ruangan',[ReservasiRuangController::class, 'importReservasiRuangans'])->middleware(['auth','must-superadmin-or-admin']);
