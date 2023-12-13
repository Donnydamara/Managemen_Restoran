<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Kategori;
use App\TipePesanan; 
use App\MenuTerlaris;
use App\MenuPerkategori;
use App\DetailPesanan;
use Illuminate\Support\Facades\DB;

class ManagerDashboardController extends Controller
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
        $tbl_menu = Menu::count();
        $tbl_kategori = Kategori ::count();
        $tbl_detail_pesanan = DetailPesanan::count();
        

        $data = TipePesanan::whereIn('jenis_pesanan', ['Makan di Tempat', 'Bawa Pulang'])
            ->groupBy('jenis_pesanan')
            ->select('jenis_pesanan', DB::raw('count(*) as jumlah'))
            ->get();

        // Format data untuk JavaScript
        $dataArray = $data->map(function ($row) {
            return [$row->jenis_pesanan, (float)$row->jumlah];
        })->toArray();

        $results = MenuTerlaris::select('nama_menu', DB::raw('count(*) as total'))
            ->groupBy('nama_menu')
            ->orderByDesc('total')
            ->take(2) // Ambil dua data terlaris
            ->get();

        $menuLaris = $results->first();
        $secondMenuLaris = $results->last();

        $data = MenuPerkategori::select('id_kategori', DB::raw('count(*) as total'))
        ->groupBy('id_kategori')
        ->get();


        return view('managerdashboard',compact('tbl_menu','tbl_kategori','tbl_detail_pesanan','dataArray','menuLaris', 'secondMenuLaris','data'));
    }
}
