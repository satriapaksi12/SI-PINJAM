<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlatController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\GedungController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\JenisAcaraController;
use App\Http\Controllers\JenisKendaraanController;
use App\Http\Controllers\ReservasiKendaraanController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});



//login
Route::get('/login',[AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login',[AuthController::class, 'authenticating'])->middleware('guest');
//logout
Route::get('/logout',[AuthController::class, 'logout'])->middleware('auth');

//kelola unit
Route::get('/unit',[UnitController::class, 'index'])->middleware('auth');
Route::get('/unit-add',[UnitController::class, 'create'])->middleware('auth');
Route::post('/unit',[UnitController::class, 'store'])->middleware('auth');
Route::get('/unit-edit/{id}',[UnitController::class, 'edit'])->middleware('auth');
Route::put('/unit/{id}',[UnitController::class, 'update'])->middleware('auth');
Route::delete('/unit-destroy/{id}',[UnitController::class, 'destroy'])->middleware('auth');

//kelola periode
Route::get('/periode',[PeriodeController::class, 'index'])->middleware('auth');
Route::get('/periode-add',[PeriodeController::class, 'create'])->middleware('auth');
Route::post('/periode',[PeriodeController::class, 'store'])->middleware('auth');
Route::get('/periode-edit/{id}',[PeriodeController::class, 'edit'])->middleware('auth');
Route::put('/periode/{id}',[PeriodeController::class, 'update'])->middleware('auth');
Route::delete('/periode-destroy/{id}',[PeriodeController::class, 'destroy'])->middleware('auth');

//kelola jenis acara
Route::get('/jenis_acara',[JenisAcaraController::class, 'index'])->middleware('auth');
Route::get('/jenis_acara-add',[JenisAcaraController::class, 'create'])->middleware('auth');
Route::post('/jenis_acara',[JenisAcaraController::class, 'store'])->middleware('auth');
Route::get('/jenis_acara-edit/{id}',[JenisAcaraController::class, 'edit'])->middleware('auth');
Route::put('/jenis_acara/{id}',[JenisAcaraController::class, 'update'])->middleware('auth');
Route::delete('/jenis_acara-destroy/{id}',[JenisAcaraController::class, 'destroy'])->middleware('auth');

//kelola jenis kendaraan
Route::get('/jenis_kendaraan',[JenisKendaraanController::class, 'index'])->middleware('auth');
Route::get('/jenis_kendaraan-add',[JenisKendaraanController::class, 'create'])->middleware('auth');
Route::post('/jenis_kendaraan',[JenisKendaraanController::class, 'store'])->middleware('auth');
Route::get('/jenis_kendaraan-edit/{id}',[JenisKendaraanController::class, 'edit'])->middleware('auth');
Route::put('/jenis_kendaraan/{id}',[JenisKendaraanController::class, 'update'])->middleware('auth');
Route::delete('/jenis_kendaraan-destroy/{id}',[JenisKendaraanController::class, 'destroy'])->middleware('auth');


//kelola gedung
Route::get('/gedung',[GedungController::class, 'index'])->middleware('auth');
Route::get('/gedung-add',[GedungController::class, 'create'])->middleware('auth');
Route::post('/gedung',[GedungController::class, 'store'])->middleware('auth');
Route::get('/gedung-edit/{id}',[GedungController::class, 'edit'])->middleware('auth');
Route::put('/gedung/{id}',[GedungController::class, 'update'])->middleware('auth');
Route::delete('/gedung-destroy/{id}',[GedungController::class, 'destroy'])->middleware('auth');

//kelola lokasi kampus
Route::get('/lokasi',[LokasiController::class, 'index'])->middleware('auth');
Route::get('/lokasi-add',[LokasiController::class, 'create'])->middleware('auth');
Route::post('/lokasi',[LokasiController::class, 'store'])->middleware('auth');
Route::get('/lokasi-edit/{id}',[LokasiController::class, 'edit'])->middleware('auth');
Route::put('/lokasi/{id}',[LokasiController::class, 'update'])->middleware('auth');
Route::delete('/lokasi-destroy/{id}',[LokasiController::class, 'destroy'])->middleware('auth');

//kelola sesi
Route::get('/sesi',[SesiController::class, 'index'])->middleware('auth');
Route::get('/sesi-add',[SesiController::class, 'create'])->middleware('auth');
Route::post('/sesi',[SesiController::class, 'store'])->middleware('auth');
Route::get('/sesi-edit/{id}',[SesiController::class, 'edit'])->middleware('auth');
Route::put('/sesi/{id}',[SesiController::class, 'update'])->middleware('auth');
Route::delete('/sesi-destroy/{id}',[SesiController::class, 'destroy'])->middleware('auth');

//kelola kendaraan
Route::get('/kendaraan',[KendaraanController::class, 'index'])->middleware('auth');
Route::get('/kendaraan-add',[KendaraanController::class, 'create'])->middleware('auth');
Route::post('/kendaraan',[KendaraanController::class, 'store'])->middleware('auth');
Route::get('/kendaraan-edit/{id}',[KendaraanController::class, 'edit'])->middleware('auth');
Route::put('/kendaraan/{id}',[KendaraanController::class, 'update'])->middleware('auth');
Route::delete('/kendaraan-destroy/{id}',[KendaraanController::class, 'destroy'])->middleware('auth');


//Reservasi  kendaraan
Route::get('/reservasi-kendaraan',[ReservasiKendaraanController::class, 'index'])->middleware('auth');
// Route::get('/kendaraan-add',[KendaraanController::class, 'create']);
// Route::post('/kendaraan',[KendaraanController::class, 'store']);
// Route::get('/kendaraan-edit/{id}',[KendaraanController::class, 'edit']);
// Route::put('/kendaraan/{id}',[KendaraanController::class, 'update']);
// Route::delete('/kendaraan-destroy/{id}',[KendaraanController::class, 'destroy']);


//kelola alat
Route::get('/alat',[AlatController::class, 'index'])->middleware('auth');
Route::get('/alat/{id}',[AlatController::class, 'show'])->middleware('auth');
Route::get('/alat-add',[AlatController::class, 'create'])->middleware('auth');
Route::post('/alat',[AlatController::class, 'store'])->middleware('auth');
Route::get('/alat-edit/{id}',[AlatController::class, 'edit'])->middleware('auth');
Route::put('/alat/{id}',[AlatController::class, 'update'])->middleware('auth');
Route::delete('/alat-destroy/{id}',[AlatController::class, 'destroy'])->middleware('auth');



