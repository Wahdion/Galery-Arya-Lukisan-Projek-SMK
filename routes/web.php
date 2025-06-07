<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\ContactController;

// Halaman awal
Route::get('/', function () {
    return view('galeri_user');
});

// Admin Galeri (CRUD)
Route::resource('galeris', GaleriController::class);
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/admin/contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::delete('/admin/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');

// Halaman Galeri untuk User
Route::view('/GustiAryaGalery', 'galeri_user')->name('galeri.user');

// Halaman galery dengan data dari controller
Route::get('/galery', [GaleriController::class, 'userGalery'])->name('galery');

// Detaiil galery
Route::get('/galery/{id}', [GaleriController::class, 'show'])->name('galery.detail');

