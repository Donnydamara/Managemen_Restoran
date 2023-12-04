<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Kategori;

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
        $tbl_kategori = Kategori ::count();
        return view('managerdashboard',compact('tbl_menu','tbl_kategori'));
    }
}
