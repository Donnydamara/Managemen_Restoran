<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Pesanan;
use App\DetailPesanan;
use Illuminate\Support\Facades\DB;

class RiwayatTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pesanan = DB::table('tbl_pesanan')
        //     ->join('tbl_detail_pesanan', 'tbl_pesanan.id_pesanan', '=', 'tbl_detail_pesanan.id_pesanan')
        //     ->join('users', 'tbl_pesanan.id_user', '=', 'users.id')
        //     ->select(
        //         'tbl_pesanan.no_pesanan',
        //         'tbl_pesanan.jenis_pesanan',
        //         'tbl_pesanan.jenis_pembayaran',
        //         'users.name',
        //         'tbl_pesanan.created_at',
        //         DB::raw('SUM(tbl_detail_pesanan.subtotal) as total_subtotal')
        //     )
        //     ->where('tbl_pesanan.status', 1)
        //     ->groupBy('tbl_pesanan.no_pesanan', 'tbl_pesanan.jenis_pesanan', 'tbl_pesanan.jenis_pembayaran', 'users.name' ,'tbl_pesanan.created_at')
        //     ->get();

        return view('transaksi.riwayattransaksi', [
            'pesanan' => [],
        ]);
    }

    public function filter(Request $request)
    {
        $pesanan = Pesanan::where('created_at', 'like', "%{$request['filter']}%")->get();
        $pesanan = DB::table('tbl_pesanan')
            ->join('tbl_detail_pesanan', 'tbl_pesanan.id_pesanan', '=', 'tbl_detail_pesanan.id_pesanan')
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
            ->where('tbl_pesanan.created_at', 'like', "%{$request['filter']}%")
            ->groupBy('tbl_pesanan.no_pesanan', 'tbl_pesanan.jenis_pesanan', 'tbl_pesanan.jenis_pembayaran', 'users.name', 'tbl_pesanan.created_at')
            ->get();

        return view('transaksi.riwayattransaksi', [
            'pesanan' => $pesanan,
        ]);
    }

    public function filtersubmit(Request $request)
    {
        return redirect(route('transaksi.filter', ['filter' => $request['filter']]));
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
