<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\GedungController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\JenisAcaraController;
use App\Http\Controllers\JenisKendaraanController;

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
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

//superadmin


//admin

//staff


//mahasiswa


//kelola unit
Route::get('/unit',[UnitController::class, 'index']);
Route::get('/unit-add',[UnitController::class, 'create']);
Route::post('/unit',[UnitController::class, 'store']);
Route::get('/unit-edit/{id}',[UnitController::class, 'edit']);
Route::put('/unit/{id}',[UnitController::class, 'update']);
Route::delete('/unit-destroy/{id}',[UnitController::class, 'destroy']);

//kelola periode
Route::get('/periode',[PeriodeController::class, 'index']);
Route::get('/periode-add',[PeriodeController::class, 'create']);
Route::post('/periode',[PeriodeController::class, 'store']);
Route::get('/periode-edit/{id}',[PeriodeController::class, 'edit']);
Route::put('/periode/{id}',[PeriodeController::class, 'update']);
Route::delete('/periode-destroy/{id}',[PeriodeController::class, 'destroy']);

//kelola jenis acara
Route::get('/jenis_acara',[JenisAcaraController::class, 'index']);
Route::get('/jenis_acara-add',[JenisAcaraController::class, 'create']);
Route::post('/jenis_acara',[JenisAcaraController::class, 'store']);
Route::get('/jenis_acara-edit/{id}',[JenisAcaraController::class, 'edit']);
Route::put('/jenis_acara/{id}',[JenisAcaraController::class, 'update']);
Route::delete('/jenis_acara-destroy/{id}',[JenisAcaraController::class, 'destroy']);

//kelola jenis kendaraan
Route::get('/jenis_kendaraan',[JenisKendaraanController::class, 'index']);
Route::get('/jenis_kendaraan-add',[JenisKendaraanController::class, 'create']);
Route::post('/jenis_kendaraan',[JenisKendaraanController::class, 'store']);
Route::get('/jenis_kendaraan-edit/{id}',[JenisKendaraanController::class, 'edit']);
Route::put('/jenis_kendaraan/{id}',[JenisKendaraanController::class, 'update']);
Route::delete('/jenis_kendaraan-destroy/{id}',[JenisKendaraanController::class, 'destroy']);


//kelola gedung
Route::get('/gedung',[GedungController::class, 'index']);
Route::get('/gedung-add',[GedungController::class, 'create']);
Route::post('/gedung',[GedungController::class, 'store']);
Route::get('/gedung-edit/{id}',[GedungController::class, 'edit']);
Route::put('/gedung/{id}',[GedungController::class, 'update']);
Route::delete('/gedung-destroy/{id}',[GedungController::class, 'destroy']);

//kelola lokasi kampus
Route::get('/lokasi',[LokasiController::class, 'index']);
Route::get('/lokasi-add',[LokasiController::class, 'create']);
Route::post('/lokasi',[LokasiController::class, 'store']);
Route::get('/lokasi-edit/{id}',[LokasiController::class, 'edit']);
Route::put('/lokasi/{id}',[LokasiController::class, 'update']);
Route::delete('/lokasi-destroy/{id}',[LokasiController::class, 'destroy']);


