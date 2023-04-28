<?php

use App\Http\Controllers\LoginController;
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
    return view('index');
});
Route::get('/sudahTransfer', function () {
    return view('sudah_transfer');
});


// rute middleware guest->bisa diakses ketika belum login
Route::middleware('guest')->group(function () {

    // login
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'auth']);
});

// rute middleware auth->bisa diakses ketika sudah login
Route::middleware('auth')->group(function () {
    // untuk admin
    Route::get('/admin', function () {
        return view('admin.dashboard', ['title' => 'Admin | Dashboard']);
    });

    // logout
    Route::post('/logout', [LoginController::class, 'logout']);
});
