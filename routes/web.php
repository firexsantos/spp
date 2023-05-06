<?php

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

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\PetugasController;
use App\Http\Controllers\Admin\MasterData\KelasController;
use App\Http\Controllers\Admin\MasterData\SiswaController;
use App\Http\Controllers\Admin\MasterData\SppController;
use App\Http\Controllers\Admin\PembayaranController;
use App\Models\Admin\Pembayaran;

// Route::get('/', function () {
//     return redirect('/admin');
// });

// Route::get('/admin', function () {
//     return view('dashboard');
// });
Route::group(['middleware' => 'level'], function () {
    Route::get('/', function () {
        return redirect('/admin');
    });
    Route::get('/admin', function () {
        return view('dashboard');
    });

    Route::get('/petugas', function () {
        return view('dashboard');
    });

    Route::group(['prefix' => 'admin'], function () {
        Route::group(['prefix' => 'master-data'], function () {
            Route::resource('spp', SppController::class);
            Route::resource('kelas', KelasController::class)->parameters(['kelas' => 'kelas']);
            Route::resource('siswa', SiswaController::class);
        });
        Route::resource('petugas', PetugasController::class)->parameters(['petugas' => 'petugas']);
        Route::resource('pembayaran', PembayaranController::class);
        Route::get('laporan', [LaporanController::class, 'index']);
        Route::post('laporan', [LaporanController::class, 'generatePDF']);
    });

    Route::group(['prefix' => 'petugas'], function () {
        Route::resource('pembayaran', PembayaranController::class);
        Route::get('laporan', [LaporanController::class, 'index']);
        Route::post('laporan', [LaporanController::class, 'generatePDF']);
    });
});

Route::get('/siswa', function () {
    $nisn = Auth::guard('siswa')->user()->nisn;
    $data = [
        'title' => 'Riwayat Pembayaran',
        'data' => Pembayaran::where('nisn', $nisn)->get()
    ];
    return view('siswa', $data);
})->middleware('siswa');

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::post('/logout', [LoginController::class, 'logout']);

// Route::group(['prefix' => 'admin'], function () {
//     Route::group(['prefix' => 'master-data'], function () {
//         Route::resource('spp', SppController::class);
//         Route::resource('kelas', KelasController::class)->parameters(['kelas' => 'kelas']);
//         Route::resource('siswa', SiswaController::class);
//     });
//     Route::resource('petugas', PetugasController::class)->parameters(['petugas' => 'petugas']);
//     Route::resource('pembayaran', PembayaranController::class);
// });

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

// 404 for undefined routes
Route::any('/{page?}', function () {
    return View::make('pages.error.404');
})->where('page', '.*');
