<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Pesanan;
use App\DetailPesanan;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RiwayatTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get today's date
        $today = Carbon::now()->format('Y-m-d');

        // Retrieve data for today
        $pesanan = Pesanan::join('tbl_detail_pesanan', 'tbl_pesanan.id_pesanan', '=', 'tbl_detail_pesanan.id_pesanan')
            ->join('users', 'tbl_pesanan.id_user', '=', 'users.id')
            ->select(
                'tbl_pesanan.no_pesanan',
                'tbl_pesanan.jenis_pesanan',
                'tbl_pesanan.jenis_pembayaran',
                'users.name',
                'tbl_pesanan.created_at',
                DB::raw('SUM(tbl_detail_pesanan.subtotal) as total_subtotal')
            )
            ->where('tbl_pesanan.status', 1)
            ->whereDate('tbl_pesanan.created_at', $today)
            ->groupBy('tbl_pesanan.no_pesanan', 'tbl_pesanan.jenis_pesanan', 'tbl_pesanan.jenis_pembayaran', 'users.name', 'tbl_pesanan.created_at')
            ->get();

        return view('transaksi.riwayattransaksi', [
            'pesanan' => $pesanan,
        ]);
    }

    public function filter(Request $request)
    {
        $pesanan = Pesanan::join('tbl_detail_pesanan', 'tbl_pesanan.id_pesanan', '=', 'tbl_detail_pesanan.id_pesanan')
            ->join('users', 'tbl_pesanan.id_user', '=', 'users.id')
            ->select(
                'tbl_pesanan.no_pesanan',
                'tbl_pesanan.jenis_pesanan',
                'tbl_pesanan.jenis_pembayaran',
                'users.name',
                'tbl_pesanan.created_at',
                DB::raw('SUM(tbl_detail_pesanan.subtotal) as total_subtotal')
            )
            ->where('tbl_pesanan.status', 1)
            ->whereDate('tbl_pesanan.created_at', 'like', "%{$request->filter}%")
            ->groupBy('tbl_pesanan.no_pesanan', 'tbl_pesanan.jenis_pesanan', 'tbl_pesanan.jenis_pembayaran', 'users.name', 'tbl_pesanan.created_at')
            ->get();

        return view('transaksi.riwayattransaksi', [
            'pesanan' => $pesanan,
        ]);
    }

    public function filtersubmit(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'filter' => 'required|date',
        ]);

        // Redirect to the filter method with the filter parameter
        return redirect()->route('transaksi.filter', ['filter' => $request->input('filter')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
