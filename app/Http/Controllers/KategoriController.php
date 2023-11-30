<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::all();
        return view('manager.kategori', [
            'kategori' => $kategori,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manager.createkategori');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = validator($request->all(), [
            'kategori' => 'required|string|max:255',
        ])->validate();
        $kategori = new Kategori($validatedData);
        $kategori->save();
        return redirect(route('manager.kategori'))->with('success', 'Data Berhasil Di Simpan');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        return view('manager.editkategori', [
            'kategori' => $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        $validatedData = validator($request->all(), [
            'kategori' => 'required|string|max:255',
        ])->validate();

        $kategori->kategori = $validatedData['kategori'];
        $kategori->save();
        // Tambahkan kode alert untuk konfirmasi setelah berhasil mengupdate data  
        return redirect(route('manager.kategori'))->with('success', 'Data Berhasil Di update');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect(route('manager.kategori'))->with('success', 'Data Berhasil Di hapus');;
    }
}
