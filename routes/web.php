<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeeController;
use App\Http\Controllers\PenyewaController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('homee');
});
Route::get('homee', [HomeeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => 'role:admin'], function () {
    Route::resource('dashboard-admin', AdminController::class);
    Route::get('exportPdf{id}', [AdminController::class, 'downloadPDF'])->name('dashboard-admin.exportPdf');
    Route::get('daftarUser', [AdminController::class, 'showUser'])->name('dashboard-admin.daftarUser');
    Route::get('exportUser', [AdminController::class, 'exportUser'])->name('dashboard-admin.exportUser');
    // Route::get('getKost', [AdminController::class, 'getData'])->name('dashboard-admin.getData');


});

Route::group(['middleware' => 'role:penyewa'], function () {
    Route::resource('dashboard-penyewa', PenyewaController::class);
});
