<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginCon;
use App\Http\Controllers\DashboardCon;
use App\Http\Controllers\RegisterCon;
use App\Http\Controllers\UserCon;
use App\Http\Controllers\SoalCon;
use App\Http\Controllers\NilaiCon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [LoginCon::class, 'login'])->name('login');
Route::post('actionlogin', [LoginCon::class, 'actionlogin'])->name('actionlogin');
Route::get('dashboard', [DashboardCon::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('actionlogout', [LoginCon::class, 'actionlogout'])->name('actionlogout')->middleware('auth');
Route::get('register', [RegisterCon::class, 'register'])->name('register');
Route::post('register/action', [RegisterCon::class, 'actionregister'])->name('actionregister');
Route::get('user', [UserCon::class, 'index'])->name('user')->middleware('auth');
Route::get('/user/delete/{id}', [UserCon::class, 'delete'])->name('deleteUser')->middleware('auth');
Route::get('soal', [SoalCon::class, 'index'])->name('soal')->middleware('auth');
Route::get('/soal/delete/{id}', [SoalCon::class, 'delete'])->name('deleteSoal')->middleware('auth');
Route::post('/soal/storeinput', [SoalCon::class, 'storeinput'])->name('storeInputSoal')->middleware('auth');
Route::get('/soal/update/{id}', [SoalCon::class, 'update'])->name('updateSoal')->middleware('auth');
Route::post('/soal/storeupdate', [SoalCon::class, 'storeupdate'])->name('storeUpdateSoal')->middleware('auth');
Route::get('nilai', [NilaiCon::class, 'index'])->name('nilai')->middleware('auth');
Route::post('/nilai/storeupdate', [NilaiCon::class, 'storeupdate'])->name('storeUpdateNilai')->middleware('auth');
Route::post('/nilai/storeinput', [NilaiCon::class, 'storeinput'])->name('storeInputSoal')->middleware('auth');