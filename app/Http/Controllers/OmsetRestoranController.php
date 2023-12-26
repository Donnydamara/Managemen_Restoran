<?php

namespace App\Http\Controllers;

use App\DetailPesanan;
use App\Menu;
use App\Kategori;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\OmsetExport;

class OmsetRestoranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::with('kategori')->get();
        $detail_pesanan = DetailPesanan::all();
        $kategori = Kategori::all();

        return view('manager.omsetrestoran', [
            'menu' => $menu,
            'kategori' => $kategori,
            'detail_pesanan' => $detail_pesanan,
        ]);
    }

    public function exportPDF()
    {
        $menu = Menu::with('kategori')->get();
        $detail_pesanan = DetailPesanan::all();

        return view('manager.cetakomsetrestoran', [
            'menu' => $menu,
            'detail_pesanan' => $detail_pesanan,
        ]);
    }

    public function exportExcel()
    {
        return Excel::download(new OmsetExport, 'omset-restoran.xlsx');
    }

    public function filter(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $category = $request->input('category');

        // Validate that at least one of the filters is filled
        if (!$start_date && !$end_date && !$category) {
            return redirect()->back()->with('error', 'Please fill at least one filter.');
        }

        $menu = Menu::with('kategori')->get();
        $kategori = Kategori::all();
        $detail_pesanan = DetailPesanan::query();

        if ((!$category && !$start_date && !$end_date)) {
            // No filter applied, retrieve all data
            $detail_pesanan = DetailPesanan::all();
        } elseif ($category && !$start_date && !$end_date) {
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

        return view('manager.omsetrestoran', [
            'detail_pesanan' => $detail_pesanan,
            'menu' => $menu,
            'kategori' => $kategori,
        ]);
    }

    public function filtersubmit(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $category = $request->input('category');

        return redirect()->route('omset.filter', compact('start_date', 'end_date', 'category'));
    }
}
