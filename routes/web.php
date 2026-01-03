<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;

// Public routes
Route::get('/', [PortoController::class, 'index'])->name('index');
Route::get('/portfolio/export-pdf', [PortoController::class, 'exportPdf'])->name('portfolio.export-pdf');

// Login routes
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Protected admin routes dengan middleware auth
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/home', [AdminController::class, 'home'])->name('admin.home');
    
    // CRUD Pengguna
    Route::get('/admin/pengguna', [AdminController::class, 'pengguna'])->name('admin.pengguna');
    Route::post('/admin/pengguna', [AdminController::class, 'storePengguna'])->name('admin.pengguna.store');
    Route::put('/admin/pengguna/{id}', [AdminController::class, 'updatePengguna'])->name('admin.pengguna.update');
    Route::delete('/admin/pengguna/{id}', [AdminController::class, 'deletePengguna'])->name('admin.pengguna.delete');
    
    // CRUD Proyek
    Route::get('/admin/proyek', [AdminController::class, 'proyek'])->name('admin.proyek');
    Route::post('/admin/proyek', [AdminController::class, 'storeProyek'])->name('admin.proyek.store');
    Route::put('/admin/proyek/{id}', [AdminController::class, 'updateProyek'])->name('admin.proyek.update');
    Route::delete('/admin/proyek/{id}', [AdminController::class, 'deleteProyek'])->name('admin.proyek.delete');

});





