<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UserControllers;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\JenisKegiatanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\StrukturOrganisasiController;
use App\Http\Controllers\TataTertibController;
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

//======= START ROUTES FRONTEND =======//
Route::get('/home', [FrontController::class, 'index']);
Route::get('/about-us', [FrontController::class, 'about']);
Route::get('/program', [FrontController::class, 'program']);
Route::get('/all-program', [FrontController::class, 'allprogram']);
Route::get('/contact', [FrontController::class, 'contact']);
Route::get('/staff', [FrontController::class, 'staff']);
Route::get('/galeri', [FrontController::class, 'galeri']);
Route::get('/blog-berita', [FrontController::class, 'blog']);
Route::get('/blog-berita/{id}', [FrontController::class, 'blog_show']);
Route::get('/blog-berita/kategori/{id}', [FrontController::class, 'showByCategory']);
Route::get('/blog-berita/previousPost/{id}', [FrontController::class, 'blog_show']);
Route::get('/blog-berita/nextPost/{id}', [FrontController::class, 'blog_show']);
Route::get('/blog-berita/tags/{id}', [FrontController::class, 'showTags']);
Route::get('/fasilitas', [FrontController::class, 'fasilitas']);
Route::get('/tata-tertib', [FrontController::class, 'tatatertib']);
Route::get('/informasi-ppdb', [FrontController::class, 'ppdb']);
Route::get('/jadwal-kegiatan', [FrontController::class, 'jadwal']);
Route::get('/dokumen-downloads', [FrontController::class, 'dokumen']);
Route::get('/struktur-keasramaan', [FrontController::class, 'struktur']);
Route::get('/struktur-pengurus', [FrontController::class, 'strukturpengurus']);
Route::get('/footer', [FrontController::class, 'footer']);
Route::get('/faq', [FrontController::class, 'faq']);
Route::post('/komentar/store', [FrontController::class, 'storeComment']);
Route::post('/komentar/reply', [FrontController::class, 'storeReply']);

//======= END ROUTES FRONTEND =======//

//======= START ROUTES BACKEND(ADMIN) =======//
Route::get('/beranda', [BerandaController::class, 'index'])->middleware(['auth', 'auto-logout']);

//======= ROUTE LOGIN ADMIN =======//
Route::get('/login', [UserControllers::class, 'index'])->name('login')->middleware('guest');
Route::post('/loginauth', [UserControllers::class, 'login']);
Route::post('/logout', [UserControllers::class, 'logout']);

//======= ROUTE FORGOT PASSWORD =======//
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('password.reset');
Route::post('/forgot-password-send', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

//======= ROUTE RESET PASSWORD =======//
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword'])->name('password.update');

//======= ROUTE DATA ADMIN =======//
Route::resource('/data-admin', AdminController::class)->middleware('auth');
Route::get('/Kelola/data-admin', [AdminController::class, 'index'])->middleware('auth');
Route::get('/data-admin/edit/{id}', [AdminController::class, 'edit'])->middleware('auth');
Route::put('/data-admin/update/{id}', [AdminController::class, 'update'])->middleware('auth');
Route::delete('/data-admin/delete/{id}', [AdminController::class, 'destroy'])->middleware('auth');

//======= ROUTE DATA STAFF =======//
Route::resource('/data-staff', StaffController::class)->middleware('auth');
Route::get('/Kelola/data-staff', [StaffController::class, 'index'])->middleware('auth');
Route::get('/data-staff/edit/{id}', [StaffController::class, 'edit'])->middleware('auth');
Route::put('/data-staff/update/{id}', [StaffController::class, 'update'])->middleware('auth');
Route::delete('/data-staff/delete/{id}', [StaffController::class, 'destroy'])->middleware('auth');

//======= ROUTE DATA GALERI KEGIATAN =======//
Route::resource('/data-galeri-kegiatan', GaleriController::class)->middleware('auth');
Route::get('/Kelola/data-galeri-kegiatan', [GaleriController::class, 'index'])->middleware('auth');
Route::get('/data-galeri-kegiatan/edit/{id}', [GaleriController::class, 'edit'])->middleware('auth');
Route::put('/data-galeri-kegiatan/update/{id}', [GaleriController::class, 'update'])->middleware('auth');
Route::delete('/data-galeri-kegiatan/delete/{id}', [GaleriController::class, 'destroy'])->middleware('auth');

//======= ROUTE DATA NEWS =======//
Route::resource('/data-informasi', NewsController::class)->middleware('auth');
Route::get('/Kelola/data-informasi', [NewsController::class, 'index'])->middleware('auth');
Route::get('/data-informasi/edit/{id}', [NewsController::class, 'edit'])->middleware('auth');
Route::put('/data-informasi/update/{id}', [NewsController::class, 'update'])->middleware('auth');
Route::delete('/data-informasi/delete/{id}', [NewsController::class, 'destroy'])->middleware('auth');

//======= ROUTE DATA KATEGORI =======//
Route::resource('/data-kategori', KategoriController::class)->middleware('auth');
Route::get('/Kelola/data-kategori', [KategoriController::class, 'index'])->middleware('auth');
Route::get('/data-kategori/edit/{id}', [KategoriController::class, 'edit'])->middleware('auth');
Route::put('/data-kategori/update/{id}', [KategoriController::class, 'update'])->middleware('auth');
Route::delete('/data-kategori/delete/{id}', [KategoriController::class, 'destroy'])->middleware('auth');

//======= ROUTE DATA JENIS KEGIATAN =======//
Route::resource('/data-jenis-kegiatan', JenisKegiatanController::class)->middleware('auth');
Route::get('/Kelola/data-jenis-kegiatan', [JenisKegiatanController::class, 'index'])->middleware('auth');
Route::get('/data-jenis-kegiatan/edit/{id}', [JenisKegiatanController::class, 'edit'])->middleware('auth');
Route::put('/data-jenis-kegiatan/update/{id}', [JenisKegiatanController::class, 'update'])->middleware('auth');
Route::delete('/data-jenis-kegiatan/delete/{id}', [JenisKegiatanController::class, 'destroy'])->middleware('auth');

//======= ROUTE DATA FASILITAS =======//
Route::resource('/data-fasilitas', FasilitasController::class)->middleware('auth');
Route::get('/Kelola/data-fasilitas', [FasilitasController::class, 'index'])->middleware('auth');
Route::get('/data-fasilitas/edit/{id}', [FasilitasController::class, 'edit'])->middleware('auth');
Route::put('/data-fasilitas/update/{id}', [FasilitasController::class, 'update'])->middleware('auth');
Route::delete('/data-fasilitas/delete/{id}', [FasilitasController::class, 'destroy'])->middleware('auth');

//======= ROUTE DATA PERATURAN =======//
Route::resource('/data-peraturan', TataTertibController::class)->middleware('auth');
Route::get('/Kelola/data-peraturan', [TataTertibController::class, 'index'])->middleware('auth');
Route::get('/data-peraturan/edit/{id}', [TataTertibController::class, 'edit'])->middleware('auth');
Route::put('/data-peraturan/update/{id}', [TataTertibController::class, 'update'])->middleware('auth');
Route::delete('/data-peraturan/delete/{id}', [TataTertibController::class, 'destroy'])->middleware('auth');

//======= ROUTE DATA STRUKTUR ORGANISASI =======//
Route::resource('/data-struktur', StrukturOrganisasiController::class)->middleware('auth');
Route::get('/Kelola/data-struktur', [StrukturOrganisasiController::class, 'index'])->middleware('auth');
Route::get('/data-struktur/edit/{id}', [StrukturOrganisasiController::class, 'edit'])->middleware('auth');
Route::put('/data-struktur/update/{id}', [StrukturOrganisasiController::class, 'update'])->middleware('auth');
Route::delete('/data-struktur/delete/{id}', [StrukturOrganisasiController::class, 'destroy'])->middleware('auth');

//======= ROUTE DATA DOWNLOAD =======//
Route::resource('/data-download', DownloadController::class)->middleware('auth');
Route::get('/Kelola/data-download', [DownloadController::class, 'index'])->middleware('auth');
Route::get('/data-download/edit/{id}', [DownloadController::class, 'edit'])->middleware('auth');
Route::put('/data-download/update/{id}', [DownloadController::class, 'update'])->middleware('auth');
Route::delete('/data-download/delete/{id}', [DownloadController::class, 'destroy'])->middleware('auth');

//======= END ROUTES BACKEND(ADMIN) ========//