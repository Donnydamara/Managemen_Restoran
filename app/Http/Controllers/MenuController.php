<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $menu = Menu::with('kategori')->get();
        return view(
            'manager.menu',
            compact('menu')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = \App\Kategori::all();
        return view('manager.createmenu', [
            'kategori' => $kategori
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_kategori' => 'required|integer',
            'nama_menu' => 'required|max:225|string',
            'deskripsi' => 'required|string',
            'harga' => 'required|integer',
            'image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            $uploadedImage = $request->file('image');
            $fileName = 'foto-' . uniqid() . '.' . $uploadedImage->getClientOriginalExtension();

            // Simpan file gambar ke dalam direktori public/img/menu
            $uploadedImage->move(public_path('img/menu'), $fileName);

            // Simpan nama file ke dalam database
            $menu = new Menu();
            $menu->id_kategori = $request->id_kategori;
            $menu->nama_menu = $request->nama_menu;
            $menu->deskripsi = $request->deskripsi;
            $menu->harga = $request->harga;
            $menu->image = $fileName; // Simpan nama file ke dalam kolom 'image'
            $menu->save();

            // Tambahkan kode alert untuk konfirmasi setelah berhasil menyimpan data 
            return redirect(route('manager.menu'))->with('success', 'Data Berhasil Disimpan');
        } else {
            // Jika tidak ada file gambar diunggah
            return redirect()->back()->with('error', 'File gambar tidak ditemukan');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {

        $kategori = \App\Kategori::all();
        return view('manager.editmenu', [
            'menu' => $menu,
            'kategori' => $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_kategori' => 'required|integer',
            'nama_menu' => 'required|max:225|string',
            'deskripsi' => 'required|string',
            'harga' => 'required|integer',
            'image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $menu = Menu::findOrFail($id);

        if ($request->hasFile('image')) {
            // Jika ada file gambar baru diunggah
            $uploadedImage = $request->file('image');
            $fileName = 'foto-' . uniqid() . '.' . $uploadedImage->getClientOriginalExtension();

            // Simpan file gambar baru ke dalam direktori public/img/menu
            $uploadedImage->move(public_path('img/menu'), $fileName);

            // Hapus file gambar lama jika ada
            if ($menu->image && file_exists(public_path('img/menu/' . $menu->image))) {
                unlink(public_path('img/menu/' . $menu->image));
            }

            // Update nama file gambar di database
            $menu->image = $fileName;
        }

        // Update detail lain dari entitas Menu
        $menu->id_kategori = $request->id_kategori;
        $menu->nama_menu = $request->nama_menu;
        $menu->deskripsi = $request->deskripsi;
        $menu->harga = $request->harga;
        $menu->save();

        // Tambahkan kode alert untuk konfirmasi setelah berhasil menyimpan data 
        return redirect(route('manager.menu'))->with('success', 'Data Berhasil Diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        // Hapus file gambar dari penyimpanan lokal
        if ($menu->image) {
            $imagePath = public_path('img/menu/') . $menu->image;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Hapus data menu dari database
        $menu->delete();

        return redirect(route('manager.menu'))->with('success', 'Data Berhasil Dihapus');
    }
}