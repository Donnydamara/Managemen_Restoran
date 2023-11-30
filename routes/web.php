<?php

use App\Http\Controllers\UserController;

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
    Route::get('/about', 'AboutController@index')->name('about');
});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', 'AdminDashboardController@index')->name('admin.dashboard');

    // CRUD USERCONTROLLER==============================================================
    // Rute untuk menampilkan daftar user
    Route::get('/users', [UserController::class, 'index'])->name('users.index');

    // Rute untuk menampilkan form tambah user
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

    // Rute untuk menyimpan data user yang baru ditambahkan
    Route::post('/users', [UserController::class, 'store'])->name('users.store');

    // Rute untuk menampilkan detail user
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');

    // Rute untuk menampilkan form edit user
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');

    // Rute untuk menyimpan perubahan pada user yang diedit
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');

    // Hapus resource yang ditentukan dari penyimpanan
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/users/reset-password/{id}', 'UserController@resetPassword')->name('users.resetPassword');
});

// ============================================== Manager System =====================================================//
Route::prefix('manager')->middleware(['auth', 'manager'])->group(function () {
    Route::get('/dashboard', 'ManagerDashboardController@index')->name('manager.dashboard');
});

// ============================================== Kasir System =====================================================//
Route::prefix('kasir')->middleware(['auth', 'kasir'])->group(function () {
    Route::get('/dashboard', 'KasirDashboardController@index')->name('kasir.dashboard');
});
