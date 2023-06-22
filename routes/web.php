<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DisposisiController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\PengarsipanController;
use App\Http\Controllers\SifatsuratController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\jenissuratController;

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

/*
    --Dashboard Route--
*/
Route::get('/', [DashboardController::class,'home']);
Route::get('/status', [DashboardController::class, 'StatusSurat']);
Route::get('/about', [DashboardController::class,'about']);
Route::get('/panduan', [DashboardController::class,'panduan']);
Route::get('/dashboard', [DashboardController::class,'index'])->middleware('auth');
Route::get('/dashboard/viewakun', [DashboardController::class,'ShowAkun'])->middleware('auth');
Route::get('/dashboard/suratsaya', [DashboardController::class,'suratSaya'])->middleware('auth');
Route::get('/dashboard/suratsaya/{suratkeluar}', [DashboardController::class, 'bukaSuratPDF'])->middleware('auth');
Route::delete('/dashboard/suratsaya{suratkeluar}', [DashboardController::class, 'hapusSurat'])->middleware('auth');

/* 
    --Login Route-- 
*/ 
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

/* 
    --Register Route-- 
*/
Route::post('/register', [RegisterController::class,'store']);
Route::get('/register', [RegisterController::class,'index'])->middleware('guest');

/*
    --Sifat Surat Route-- 
*/
Route::get('/dashboard/sifatsurat',[SifatsuratController::class,'index'])->middleware('admin');
Route::delete('/dashboard/sifatsurat/{s}',[SifatsuratController::class,'destroy'])->middleware('admin');
Route::get('/dashboard/sifatsurat/create',[SifatsuratController::class,'create'])->middleware('admin');
Route::post('/dashboard/sifatsurat/create',[SifatsuratController::class,'store'])->middleware('admin');

/*
    --Jenis Surat Route-- 
*/
Route::get('/dashboard/jenissurat',[jenissuratController::class,'index'])->middleware('admin');
Route::delete('/dashboard/jenissurat/{jenis}',[jenissuratController::class,'destroy'])->middleware('admin');
Route::get('/dashboard/jenissurat/create',[jenissuratController::class,'create'])->middleware('admin');
Route::post('/dashboard/jenissurat/create', [jenissuratController::class,'store']);

/*
    --Pengarsipan Route-- 
*/
Route::get('/dashboard/pengarsipan', [PengarsipanController::class, 'index'])->middleware('admin');
Route::get('/dashboard/pengarsipan/create', [PengarsipanController::class, 'create'])->middleware('admin');
Route::post('/dashboard/pengarsipan/create', [PengarsipanController::class, 'store'])->middleware('admin');
Route::get('/dashboard/pengarsipan/arsipberguna', [PengarsipanController::class, 'arsipBerguna'])->middleware('admin');
Route::get('/dashboard/pengarsipan/arsippenting', [PengarsipanController::class, 'arsipPenting'])->middleware('admin');
Route::get('/dashboard/pengarsipan/arsipvital', [PengarsipanController::class, 'arsipVital'])->middleware('admin');
Route::get('/dashboard/pengarsipan/arsipdinamis', [PengarsipanController::class, 'arsipDinamis'])->middleware('admin');
Route::delete('/dashboard/pengarsipan/{pengarsipan}', [PengarsipanController::class, 'destroy'])->middleware('admin');
Route::get('/dashboard/pengarsipan/download/{id}', [PengarsipanController::class, 'download'])->middleware('admin');
Route::get('/dashboard/pengarsipan/cari-arsip', [PengarsipanController::class, 'index'])->middleware('admin');


/* 
--Kelola Akun Route-- 
*/
Route::get('/dashboard/kelolaakun', [UserController::class, 'index'])->middleware('admin');
Route::get('/dashboard/kelolaakun/nip', [UserController::class, 'indexNip'])->middleware('admin');
Route::get('/dashboard/kelolaakun/{user}/edit', [UserController::class, 'edit'])->middleware('admin');
Route::put('/dashboard/kelolaakun/{user}/edit', [UserController::class, 'update']);
Route::delete('/dashboard/kelolaakun/{user}', [UserController::class, 'destroy']);
Route::post('/dashboard/kelolaakun/nip', [UserController::class, 'createNip']);



/* 
    --Surat Masuk Route--
*/
Route::get('/dashboard/surat', [SuratMasukController::class, 'index'])->middleware('admin');
Route::get('/dashboard/seluruhsurat', [SuratMasukController::class, 'seluruhSurat'])->middleware('admin');
Route::get('/dashboard/surat/{suratkeluar}', [SuratMasukController::class, 'edit'])->middleware('admin');
Route::get('/dashboard/seluruhsurat/{tglawal}/{tglakhir}', [SuratMasukController::class, 'cetakPerBln'])->middleware('admin');
Route::get('/dashboard/seluruhsurat/cetakseluruh', [SuratMasukController::class, 'cetakSeluruhSurat'])->middleware('admin');

// Route::post('/dashboard/seluruhsurat/search', [SuratMasukController::class, 'search2'])->middleware('admin');

/*
    --Disposisi Route--
*/
Route::get('/dashboard/surat{suratkeluar}/disposisi', [DisposisiController::class, 'index'])->middleware('admin');
Route::post('/dashboard/surat{suratkeluar}/disposisi', [DisposisiController::class, 'store'])->middleware('admin');

/*
    --Surat Keluar Route-- 
*/
Route::resource('/dashboard/suratkeluar', SuratKeluarController::class)->middleware('auth');
Route::get('/dashboard/suratkeluarcetak', [SuratKeluarController::class, 'cetakSurat'])->middleware('auth');
Route::get('/dashboard/suratkeluar{suratkeluar}.pdf', [SuratKeluarController::class, 'pdfExport']);
