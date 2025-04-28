<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

// 1. Route untuk menampilkan daftar pengguna
Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::get('/users/index', [UserController::class, 'index']);

// 2. Route untuk menampilkan form tambah pengguna
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

// 3. Route untuk menyimpan pengguna baru
Route::post('/users', [UserController::class, 'store'])->name('users.store');

// 4. Route untuk menampilkan form edit pengguna
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');

// 5. Route untuk menyimpan perubahan pengguna
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

// 6. Route untuk menghapus pengguna
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');