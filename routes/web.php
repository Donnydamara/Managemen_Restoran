<?php

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
    return redirect(route('login'));
});
Route::get('/starter', function () {
    return view('starter');
});

Auth::routes(['verify' => false, 'reset' => false]);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});
// routes/web.php
// ==============================================          sistem login      =====================================================//
// ==============================================          sistem admin      =====================================================//
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', 'AdminDashboardController@index')->name('admin.dashboard');
});
// ==============================================          sistem manager      =====================================================//
Route::prefix('manager')->group(function () {
    Route::get('/dashboard', 'ManagerDashboardController@index')->name('manager.dashboard');
});
// ==============================================          sistem lasir      =====================================================//
Route::prefix('kasir')->group(function () {
    Route::get('/dashboard', 'KasirDashboardController@index')->name('kasir.dashboard');
});
