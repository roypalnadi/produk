<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfilController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('login');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'show')->name('login.show');
    Route::post('login', 'login')->name('login.perform');
    Route::get('logout', 'logout')->name('logout');
});

// Auth::routes();

Route::middleware('auth')->group(function () {
    Route::controller(ProdukController::class)
        ->prefix('/produk')
        ->name('produk.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/data', 'dataAjax')->name('data');
            Route::get('/add', 'add')->name('add');
            Route::post('/create', 'create')->name('create');
            Route::get('export', 'export')->name('export');
            Route::get('/edit/{model}', 'edit')->name('edit');
            Route::put('/update/{model}', 'update')->name('update');
            Route::delete('/destroy/{model}', 'destroy')->name('destroy');
        });

    Route::controller(ProfilController::class)
        ->prefix('/profil')
        ->name('profil.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
        });
});
