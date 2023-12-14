<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts; // Gunakan model yang benar
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function showChart()
    {
        // Mengambil data dari database menggunakan Eloquent atau Query Builder
        $data = Charts::whereIn('jenis_pesanan', ['Makan di Tempat', 'Bawa Pulang'])
            ->groupBy('jenis_pesanan')
            ->select('jenis_pesanan', DB::raw('count(*) as jumlah'))
            ->get();

        // Format data untuk JavaScript
        $dataArray = $data->map(function ($row) {
            return [$row->jenis_pesanan, (float)$row->jumlah];
        })->toArray();

        return view('chart', compact('dataArray'));
    }
}
