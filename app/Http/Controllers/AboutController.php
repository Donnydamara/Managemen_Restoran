<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $menu = Menu::with('kategori')->get();
        return view(
            'about',
            compact('menu')
        );

        //return view('about');
    }
}
