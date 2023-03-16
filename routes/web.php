<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnitController;

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
Route::get('/unit-edit',[UnitController::class, 'edit']);
Route::put('/unit/{id}',[UnitController::class, 'update']);
Route::delete('/unit-destroy/{id}',[UnitController::class, 'destroy']);
