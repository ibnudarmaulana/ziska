<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\DataMustahiqController;
use App\Http\Controllers\DataMuzakiController;
use App\Http\Controllers\DataUpzController;
use App\Http\Controllers\DistribusiZakatController;
use App\Http\Controllers\PemasukanZakatController;
use App\Http\Controllers\UserController;
use App\Models\DataUpz;
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

Route::get('/', [UserController::class, 'masuk'])->name('login');
Route::post('login', [UserController::class, 'prosesMasuk'])->name('login');

Route::middleware('auth')->group(function () {
    Route::post('keluar', [UserController::class, 'keluar']);
    Route::get('tentang', function () {
        $title = 'Tentang';
        return view('tentang',compact('title'));
    });
    Route::middleware('role:admin')->group(function () {
        Route::prefix('admin')->group(function () {
            Route::get('dashboard', [Controller::class, 'admin']);
            Route::resource('kelola-upz', DataUpzController::class);
            Route::resource('kelola-pengguna', UserController::class);
            Route::resource('kelola-muzaki', DataMuzakiController::class);
            Route::resource('kelola-mustahiq', DataMustahiqController::class);
            Route::resource('kelola-pemasukan', PemasukanZakatController::class);
            Route::resource('kelola-distribusi', DistribusiZakatController::class);
        });
    });

    Route::middleware('role:upz')->group(function () {
        Route::prefix('upz')->group(function () {
            Route::get('dashboard', [Controller::class, 'upz']);
            Route::resource('kelola-muzaki', DataMuzakiController::class);
            Route::resource('kelola-mustahiq', DataMustahiqController::class);
            Route::resource('kelola-pemasukan', PemasukanZakatController::class);
            Route::resource('kelola-distribusi', DistribusiZakatController::class);
            Route::resource('data-upz', DataUpzController::class);
        });
    });
});
