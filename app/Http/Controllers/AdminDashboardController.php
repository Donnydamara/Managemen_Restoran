<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\DetailPesanan;
use App\Kategori;
use App\Menu;

class AdminDashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Menghitung jumlah data dari masing-masing tabel
        $totalUser = User::where('role', '<>', 0)->count();
        $totalDetailPesanan = DetailPesanan::count();
        $totalKategori = Kategori::count();
        $totalMenu = Menu::count();

        // Mengambil data pengguna (User) dengan role yang tidak sama dengan 0
        $UserData = User::where('role', '<>', 0)->get(['id', 'name', 'role', 'photo_path', 'no_hp']);

        // Mengambil data Kategori dan Menu
        $KategoriData = Kategori::all(['id', 'kategori']);
        $MenuData = Menu::all(['id_kategori', 'image', 'nama_menu', 'harga']);

        return view('admindashboard', compact('totalUser', 'totalDetailPesanan', 'totalKategori', 'totalMenu', 'UserData', 'KategoriData', 'MenuData'));
    }
}
