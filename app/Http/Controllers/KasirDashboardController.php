<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\Menu;
use App\Pesanan;
use App\DetailPesanan;
use Illuminate\Support\Facades\DB;

class KasirDashboardController extends Controller
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
        $no_pesanan = Pesanan::where('status', 1)->max('no_pesanan');
        
        $totalPesanan = Pesanan::where('status', 1)->count();
        $totalKategori = Kategori::count();
        $totalMenu = Menu::count();

        $MenuData = Menu::all(['image', 'nama_menu', 'deskripsi', 'harga']);

        $TransaksiData = DB::table('tbl_pesanan')
            ->join('tbl_detail_pesanan', 'tbl_pesanan.id_pesanan', '=', 'tbl_detail_pesanan.id_pesanan')
            ->select(
                'tbl_pesanan.no_pesanan',
                'tbl_pesanan.jenis_pesanan',
                'tbl_pesanan.jenis_pembayaran',
                'tbl_pesanan.created_at',
                DB::raw('SUM(tbl_detail_pesanan.subtotal) as total_subtotal')
            )
            ->where('tbl_pesanan.status', 1)
            ->whereDate('tbl_pesanan.created_at', date('Y-m-d'))
            ->groupBy('tbl_pesanan.no_pesanan', 'tbl_pesanan.jenis_pesanan', 'tbl_pesanan.jenis_pembayaran', 'tbl_pesanan.created_at')
            ->get();
        
        return view('kasirdashboard', compact('no_pesanan', 'totalPesanan', 'totalKategori', 'totalMenu', 'MenuData', 'TransaksiData'));
    }
}
