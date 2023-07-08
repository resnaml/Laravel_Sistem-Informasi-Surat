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
    Interface Web
*/
Route::get('/', [DashboardController::class,'home']);
Route::get('/about', [DashboardController::class,'about']);
Route::get('/panduan', [DashboardController::class,'panduan']);

// Dashboard 
Route::get('/dashboard', [DashboardController::class,'index'])->middleware('auth');
Route::get('/dashboard/viewakun', [DashboardController::class,'ShowAkun'])->middleware('auth');

// Surat Saya
Route::get('/suratsaya', [DashboardController::class,'suratSaya'])->middleware('auth');
Route::get('/suratsaya{suratkeluar:full_number}', [DashboardController::class, 'bukaSuratPDF'])->middleware('auth');
Route::delete('/suratsaya{suratkeluar}', [DashboardController::class, 'hapusSurat'])->middleware('auth');

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
Route::get('/sifatsurat',[SifatsuratController::class,'index'])->middleware('admin');
Route::delete('/sifatsurat/{s}',[SifatsuratController::class,'destroy'])->middleware('admin');
Route::get('/sifatsurat/create',[SifatsuratController::class,'create'])->middleware('admin');
Route::post('/sifatsurat/create',[SifatsuratController::class,'store'])->middleware('admin');

/*
    --Jenis Surat Route-- 
*/
Route::get('/jenissurat',[jenissuratController::class,'index'])->middleware('admin');
Route::delete('/jenissurat/{jenis}',[jenissuratController::class,'destroy'])->middleware('admin');
Route::get('/jenissurat/create',[jenissuratController::class,'create'])->middleware('admin');
Route::post('/jenissurat/create', [jenissuratController::class,'store']);

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
Route::get('/kelolaakun', [UserController::class, 'index'])->middleware('admin');
Route::get('/kelolaakun/nip', [UserController::class, 'indexNip'])->middleware('admin');
Route::get('/kelolaakun/{user}', [UserController::class, 'edit'])->middleware('admin');
Route::put('/kelolaakun/{user}', [UserController::class, 'update']);
Route::delete('/kelolaakun/{user}', [UserController::class, 'destroy']);
Route::post('/kelolaakun/nip', [UserController::class, 'createNip']);
Route::delete('/kelolaakun/nip', [UserController::class, 'destroyNip']);


/* 
    --Surat Masuk Route--
*/
Route::get('/dashboard/surat', [SuratMasukController::class, 'index'])->middleware('admin');
Route::get('/dashboard/seluruhsurat', [SuratMasukController::class, 'seluruhSurat'])->middleware('admin');
Route::get('/dashboard/surat/{suratkeluar}', [SuratMasukController::class, 'edit'])->middleware('admin');
Route::get('/dashboard/seluruhsurat/{tglawal}/{tglakhir}', [SuratMasukController::class, 'cetakPerBln'])->middleware('admin');
Route::get('/dashboard/seluruhsurat/cetakseluruh', [SuratMasukController::class, 'cetakSeluruhSurat'])->middleware('admin');


/*
    --Disposisi Route--
*/
Route::get('/dashboard/surat{suratkeluar}/disposisi', [DisposisiController::class, 'index'])->middleware('admin');
Route::post('/dashboard/surat{suratkeluar}/disposisi', [DisposisiController::class, 'store'])->middleware('admin');

Route::get('/diposisikepala', [DisposisiController::class, 'indexDisposisi'])->middleware('kepala');
Route::get('/diposisikepala/{suratkeluar:full_number}', [DisposisiController::class, 'diposisiCreate'])->middleware('kepala');

Route::get('/diposisikepala/{suratkeluar:full_number}', [DisposisiController::class, 'diposisiStore'])->middleware('kepala');



/*
    --Surat Keluar Route-- 
*/
Route::resource('/dashboard/suratkeluar', SuratKeluarController::class)->middleware('auth');
Route::get('/dashboard/suratkeluarcetak', [SuratKeluarController::class, 'cetakSurat'])->middleware('auth');
Route::get('/dashboard/suratkeluar{suratkeluar}.pdf', [SuratKeluarController::class, 'pdfExport']);
