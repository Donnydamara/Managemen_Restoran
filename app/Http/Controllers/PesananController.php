<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Pesanan;
use App\DetailPesanan;
use App\Menu;
use App\Kategori;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no_pesanan = '';
        $menu = Menu::all();
        $user_id = Auth::user()->id;
        $detail_pesanan = [];
        $id_pesanan = '';
        $pesanan = Pesanan::where('id_user', $user_id)->where('status', 0)->get();
        
        if (!$pesanan->isEmpty()) {
            $no_pesanan = $pesanan[0]['no_pesanan'];
            $id_pesanan = $pesanan[0]['id_pesanan'];
            $detail_pesanan = DetailPesanan::where('id_pesanan', $id_pesanan)->get();
        } 
    
        return view('pesanan.pesanan', [
            'menu' => $menu,
            'detail_pesanan' => $detail_pesanan,
            'no_pesanan' => $no_pesanan,
            'id_pesanan' => $id_pesanan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $id_user = Auth::user()->id;
        $latestOrder = Pesanan::orderBy('created_at','DESC')->first();
        if ($latestOrder) {
            $no_pesanan = '#'.str_pad($latestOrder->id_pesanan + 1, 5, "0", STR_PAD_LEFT);
        } else {
            $no_pesanan = "#00001";
        }
        
        $cek_pesanan = Pesanan::where('id_user', $id_user)->where('status', 0)->get();
        if ($cek_pesanan->isEmpty()){
            $pesanan = new Pesanan();
            $pesanan->id_user = $id_user;
            $pesanan->no_pesanan = $no_pesanan;
            $pesanan->save();

            $id_pesanan = $pesanan->id;
        } else {
            $id_pesanan = $cek_pesanan[0]['id_pesanan'];
        }

        $id_menu = $request['id_menu'];
        $nama_menu = $request['nama_menu'];
        $harga = $request['harga'];
        $jumlah = $request['qty'];
        $subtotal = $harga * $jumlah;

        $detail_pesanan = new DetailPesanan();
        $detail_pesanan->id_pesanan = $id_pesanan;
        $detail_pesanan->id_menu = $id_menu;
        $detail_pesanan->nama_menu = $nama_menu;
        $detail_pesanan->jumlah = $jumlah;
        $detail_pesanan->harga = $harga;
        $detail_pesanan->subtotal = $subtotal;
        $detail_pesanan->save();

        return redirect(route('pesanan'))->with('success', 'Menu berhasil ditambahkan');; 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cari(Request $request)
    {
        $menu = Menu::where('nama_menu','like', "%{$request['cari']}%")->get();
        // $kategori = Kategori::where('kategori','like', "%{$request['cari']}%")->get();
        $detail_pesanan = [];
        $no_pesanan = '';
        $id_pesanan = '';
        $user_id = Auth::user()->id;
        $pesanan = Pesanan::where('id_user', $user_id)->where('status', 0)->get();

        if (!$pesanan->isEmpty()) {
            $no_pesanan = $pesanan[0]['no_pesanan'];
            $id_pesanan = $pesanan[0]['id_pesanan'];
            $detail_pesanan = DetailPesanan::where('id_pesanan', $id_pesanan)->get();
        } 

        return view('pesanan.pesanan', [
            'menu' => $menu,
            'detail_pesanan' => $detail_pesanan,
            'no_pesanan' => $no_pesanan,
            'id_pesanan' => $id_pesanan
        ]);
        
    }

    public function carisubmit(Request $request)
    {
        return redirect(route('pesanan.cari', ['id' => $request['cari']]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detailPesanan = DetailPesanan::where('id_detail_pesanan', $id);

        $detailPesanan->delete();

        return redirect(route('pesanan'))->with('success', 'Menu berhasil di Hapus!');
    }

    public function proses(Request $request) {

        $id_pesanan = $request->input('id_pesanan');
        $jenis_pesanan = $request->input('jenis_pesanan');
        $jenis_pembayaran = $request->input('jenis_pembayaran');
        
        $input['jenis_pesanan'] = $jenis_pesanan;
        $input['jenis_pembayaran'] = $jenis_pembayaran;
        $input['status'] = 1;
        $pesanan = Pesanan::where('id_pesanan', $id_pesanan);

        $pesanan->update($input);

        return redirect(route('detailpesanan.viewproses', ['id_pesanan' => $id_pesanan]))->with('success', 'Pesanan berhasil!');;
    }

    public function viewproses($id_pesanan) {

        $detailPesanan = DetailPesanan::join('tbl_pesanan', 'tbl_pesanan.id_pesanan', '=', 'tbl_detail_pesanan.id_pesanan')
        ->where('tbl_pesanan.id_pesanan', $id_pesanan)
        ->get();

        $no_pesanan = $detailPesanan[0]['no_pesanan'];
        $jenis_pesanan = $detailPesanan[0]['jenis_pesanan'];
        $jenis_pembayaran = $detailPesanan[0]['jenis_pembayaran'];

        return view('pesanan.detailpesanan', [
            'detail_pesanan' => $detailPesanan,
            'no_pesanan' => $no_pesanan,
            'jenis_pesanan' => $jenis_pesanan,
            'jenis_pembayaran' => $jenis_pembayaran,
        ]);
        
    }

}
// by syifa