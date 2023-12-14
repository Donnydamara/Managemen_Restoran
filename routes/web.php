<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\UserKasirController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OmsetRestoranController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\RiwayatTransaksiController;
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
    Route::get('/profile', [UserController::class, 'showProfile'])->name('profile.show');
    Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('profile.edit');
    Route::put('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profile/validate-password', [UserController::class, 'validatePassword'])
        ->name('profile.validate-password');
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
    Route::get('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/users/reset-password/{id}', 'UserController@resetPassword')->name('users.resetPassword');
});

// ============================================== Manager System =====================================================//
Route::prefix('manager')->middleware(['auth', 'manager'])->group(function () {
    Route::get('/dashboard', 'ManagerDashboardController@index')->name('manager.dashboard');
    Route::get('/chart-data', 'ManagerDasboardController@showChart');


    // Show Kategori Menu
    Route::get('/kategori', 'KategoriController@index')->name('manager.kategori');

    // route untuk menampilkan view create kategori
    Route::get('/createkategori', 'KategoriController@create')->name('createKategori');

    // route untuk menyimpan kategori, perhatikan bahwa fungsi route nya adalah post
    Route::post('/createkategori', 'KategoriController@store')->name('storeKategori');

    // route untuk menampilkan view edit kategori
    //Route::get('/{kategori}/editkategori', 'KategoriController@edit')->name('editKategori');
    Route::get('/{kategori}/editkategori', [KategoriController::class, 'edit'])->name('editKategori');

    // route untuk menyimpan perubahan kategori, perhatikan bahwa fungsi routenya adalah post
    //Route::post('/{kategori}/editkategori', 'KategoriController@update')->name('updateKategori');
    Route::put('/{kategori}', [KategoriController::class, 'update'])->name('updateKategori');

    // route untuk menghapus kategori 
    Route::get('/{kategori}/delete', 'KategoriController@destroy')->name('deleteKategori');

    // Show Menu
    Route::get('/menu', 'MenuController@index')->name('manager.menu');

    // route untuk menampilkan view create menu
    Route::get('/createmenu', 'MenuController@create')->name('createMenu');

    // route untuk menyimpan menu, perhatikan bahwa fungsi route nya adalah post
    Route::post('/createmenu', 'MenuController@store')->name('storeMenu');

    // route untuk menampilkan view edit menu
    Route::get('/{menu}/editmenu', 'MenuController@edit')->name('editMenu');

    // route untuk menyimpan perubahan menu, perhatikan bahwa fungsi routenya adalah post
    Route::post('/{menu}/editmenu', 'MenuController@update')->name('updateMenu');

    // route untuk menghapus menu
    Route::get('/menu/{menu}/delete', 'MenuController@destroy')->name('deleteMenu');

    // CRUD USERCONTROLLER==============================================================
    // Rute untuk menampilkan daftar user
    Route::get('/users', [UserKasirController::class, 'index'])->name('userkasir.index');

    // Rute untuk menampilkan form tambah user
    Route::get('/users/create', [UserKasirController::class, 'create'])->name('userkasir.create');

    // Rute untuk menyimpan data user yang baru ditambahkan
    Route::post('/users', [UserKasirController::class, 'store'])->name('userkasir.store');

    // Rute untuk menampilkan detail user
    Route::get('/users/{user}', [UserKasirController::class, 'show'])->name('userkasir.show');

    // Rute untuk menampilkan form edit user
    Route::get('/users/{user}/edit', [UserKasirController::class, 'edit'])->name('userkasir.edit');

    // Rute untuk menyimpan perubahan pada user yang diedit
    Route::put('/users/{user}', [UserKasirController::class, 'update'])->name('userkasir.update');

    // Hapus resource yang ditentukan dari penyimpanan
    Route::get('/users/{user}', [UserKasirController::class, 'destroy'])->name('userkasir.destroy');
    Route::get('/users/reset-password/{id}', 'UserKasirController@resetPassword')->name('userkasir.resetPassword');

    // Show omset restoran
    Route::get('/omsetrestoran', 'OmsetRestoranController@index')->name('manager.omsetrestoran');
    Route::get('/omsetrestoran/filter', [OmsetRestoranController::class, 'filter'])->name('omset.filter');
    Route::post('/omsetrestoran/filtersubmit', [OmsetRestoranController::class, 'filtersubmit'])->name('omset.filtersubmit');
});

// ============================================== Kasir System =====================================================//
Route::prefix('kasir')->middleware(['auth', 'kasir'])->group(function () {
    Route::get('/dashboard', 'KasirDashboardController@index')->name('kasir.dashboard');

    // by syifa
    Route::get('/order', 'PesananController@index')->name('pesanan');
    Route::get('/order/cari/{cari}', [PesananController::class, 'cari'])->name('pesanan.cari');
    Route::post('/order/carisubmit', [PesananController::class, 'carisubmit'])->name('pesanan.carisubmit');
    Route::post('/order', [PesananController::class, 'add'])->name('pesanan.add');
    Route::get('/order/hapus/{id}', [PesananController::class, 'destroy'])->name('pesanan.destroy');
    Route::post('/order/proses', [PesananController::class, 'proses'])->name('detailpesanan.proses');
    Route::get('/order/viewproses/{id_pesanan}', [PesananController::class, 'viewproses'])->name('detailpesanan.viewproses');

    Route::get('/transaksi', [RiwayatTransaksiController::class, 'index'])->name('transaksi.riwayattransaksi');
    Route::get('/transaksi/filter/{filter}', [RiwayatTransaksiController::class, 'filter'])->name('transaksi.filter');
    Route::post('/transaksi/filtersubmit', [RiwayatTransaksiController::class, 'filtersubmit'])->name('transaksi.filtersubmit');
});
