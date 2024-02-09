<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Mahasiswa\mahasiswaController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [AdminController::class, 'index'])->middleware('signedMiddleware')->name('dashboard_login');
Route::post('/login', [AdminController::class, 'submit_login'])->name('submit_login');
Route::post('/logout', [AdminController::class, 'submit_logout'])->name('submit_logout');

Route::prefix('admin')->middleware('signInMiddleware')->group(function(){
    Route::get('/dashboard', [mahasiswaController::class, 'index'])->name('dashboard_mahasiswa');
});
