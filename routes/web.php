<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PetugasController;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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


Route::get('/', [HomeController::class, 'index']);




// Admin
Route::middleware(['is_admin'])->group(function () {
    Route::controller(AdminController::class)->group(function () {
        // Route::get('/admin/petugas', [AdminController::class, 'index']);
        Route::get('/admin/petugas', 'index');

        // Route::get('/admin/petugas/create', [AdminController::class, 'create']);
        Route::get('/admin/petugas/create', 'create');
        Route::post('/admin/petugas/create', [AdminController::class, 'store']);

        Route::get('/admin/petugas/update/{user:username}', [AdminController::class, 'edit']);
        Route::put('/admin/petugas/update/{user:username}', [AdminController::class, 'update']);

        Route::get('/admin/petugas/delete/{user:username}', [AdminController::class, 'delete']);
        Route::delete('/admin/petugas/delete/{user:username}', [AdminController::class, 'destroy']);

        Route::get('/tanggapan/export', [PetugasController::class, 'export']);
    });
});
// Admin End


// Petugas
// Route::resource('/tanggapan', PetugasController::class)->middleware('admin_petugas');
Route::get('/tanggapan', [PetugasController::class, 'index'])->middleware('admin_petugas');
Route::get('/tanggapan/{pengaduan}/show', [PetugasController::class, 'showTanggapan'])->middleware('admin_petugas');

Route::get('/tanggapan/{pengaduan}/proses', [PetugasController::class, 'show'])->middleware('admin_petugas');
Route::put('/tanggapan/{pengaduan}/proses', [PetugasController::class, 'storeTanggapan'])->middleware('admin_petugas');


Route::get('/tanggapan/{pengaduan}', [PetugasController::class, 'updateStatus'])->middleware('admin_petugas');
Route::put('/tanggapan/{pengaduan}', [PetugasController::class, 'updateStatus'])->middleware('admin_petugas');

Route::delete('/tanggapan/{pengaduan}', [PetugasController::class, 'destroy'])->middleware('admin_petugas');
// Petugas End


// User
Route::resource('/pengaduan', MasyarakatController::class)->middleware('is_masyarakat');
// User End


Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/register', [LoginController::class, 'register'])->middleware('guest');
Route::post('/register', [LoginController::class, 'createUser'])->middleware('guest');
