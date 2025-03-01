<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\KaryawanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
  return 'ok';
});

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth:sanctum')->group(function () {
  Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
  Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

  Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan');
  
  Route::get('/cuti/{id}/show', [CutiController::class, 'show'])->name('cuti.show');
});
