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
        $tbl_kategori = Kategori::count();
        $tbl_detail_pesanan = DetailPesanan::count();


        $data = TipePesanan::whereIn('jenis_pesanan', ['Makan di Tempat', 'Bawa Pulang'])
            ->groupBy('jenis_pesanan')
            ->select('jenis_pesanan', DB::raw('count(*) as jumlah'))
            ->get();

        $dataArray = $data->map(function ($row) {
            return [$row->jenis_pesanan, (float)$row->jumlah];
        })->toArray();

        $results = MenuTerlaris::select('nama_menu', DB::raw('count(*) as total'))
            ->groupBy('nama_menu')
            ->orderByDesc('total')
            ->take(2)
            ->get();

        $menuLaris = $results->first();
        $secondMenuLaris = $results->last();


        $data = MenuPerkategori::select('id_kategori', DB::raw('count(*) as total'))
            ->groupBy('id_kategori')
            ->get();

        // Fetch and calculate profits by date
        $menu = Menu::with('kategori')->get();
        $detail_pesanan = DetailPesanan::all();


        $profitsByDate = [];
        foreach ($detail_pesanan as $detail) {
            $date = $detail->created_at->format('Y-m-d');
            $profitsByDate[$date] = isset($profitsByDate[$date]) ? $profitsByDate[$date] + ($detail->jumlah * $detail->harga) : ($detail->jumlah * $detail->harga);
        }
        $totalProfits = array_sum($profitsByDate);

        return view('managerdashboard', compact('tbl_menu', 'tbl_kategori', 'tbl_detail_pesanan', 'dataArray', 'menuLaris', 'secondMenuLaris', 'data', 'profitsByDate', 'totalProfits'));
        // return view('managerdashboard', compact('tbl_menu', 'tbl_kategori', 'tbl_detail_pesanan', 'dataArray', 'menuLaris', 'secondMenuLaris', 'data', 'profitsByDate'));
    }

    public function filter(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $category = $request->input('category');

        $menu = Menu::with('kategori')->get();
        $detail_pesanan = DetailPesanan::query();

        if ($category && !$start_date && !$end_date) {
            // Filter by category only
            $detail_pesanan->whereHas('menu.kategori', function ($query) use ($category) {
                $query->where('id', $category);
            });
        } elseif (!$category && $start_date && $end_date) {
            // Filter by start and end date only
            $detail_pesanan->whereBetween('created_at', [$start_date, $end_date]);
        } else {
            // Filter by category, start date, and end date
            $detail_pesanan->when($category, function ($query) use ($category) {
                return $query->whereHas('menu.kategori', function ($query) use ($category) {
                    $query->where('id', $category);
                });
            })
                ->when($start_date && $end_date, function ($query) use ($start_date, $end_date) {
                    return $query->whereBetween('created_at', [$start_date, $end_date]);
                });
        }

        $detail_pesanan = $detail_pesanan->get();

        // Calculate profit by date
        $profitsByDate = [];
        foreach ($detail_pesanan as $detail) {
            $date = $detail->created_at->format('Y-m-d');
            $profitsByDate[$date] = isset($profitsByDate[$date]) ? $profitsByDate[$date] + ($detail->jumlah * $detail->harga) : ($detail->jumlah * $detail->harga);
        }

        return view('managerdashboard', [
            'detail_pesanan' => $detail_pesanan,
            'menu' => $menu,
            'profitsByDate' => $profitsByDate,
        ]);
    }
}
