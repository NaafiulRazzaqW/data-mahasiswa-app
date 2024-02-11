<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\City\CityController;
use App\Http\Controllers\ExportStudentExcel;
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

Route::prefix('admin')->middleware('signInMiddleware')->group(function () {
    Route::get('/dashboard', [mahasiswaController::class, 'index'])->name('dashboard_mahasiswa');
    Route::prefix('student')->group(function () {
        Route::get('/', [mahasiswaController::class, 'GetDataMahasiswa'])->name('GetDataMahasiswa');
        Route::get('/addData', [mahasiswaController::class, 'AddData'])->name('addDataMahasiswa');
        Route::post('/submitAddData', [mahasiswaController::class, 'submitAddData'])->name('submitAddDataMahasiswa');
        Route::get("/{id}/editData", [mahasiswaController::class, 'editData'])->name('editDataMahasiswa');
        Route::post("/{id}/submitedit", [mahasiswaController::class, 'submitEditData'])->name('submitEditDataMahasiswa');
        Route::post("/{id}/delete", [mahasiswaController::class, 'delete'])->name('deleteMahasiswa');
        Route::get('/export', [ExportStudentExcel::class, 'export'])->name('export_excel');
    });
    Route::prefix('city')->group(function () {
        Route::get('/', [CityController::class, 'index'])->name('GetDataCity');
        Route::get('/adddata', [CityController::class, 'addData'])->name('addDataCity');
        Route::post('/submitadddata', [CityController::class, 'submitAddData'])->name('submitAddDataCity');
        Route::get('/{id}/editData', [CityController::class, 'editData'])->name('editDataCity');
        Route::post('/{id}/submitEditData', [CityController::class, 'submitEditData'])->name('submitEditDataCity');
        Route::post('/{id}/deleteData', [CityController::class, 'delete'])->name('deleteCity');
    });
});
