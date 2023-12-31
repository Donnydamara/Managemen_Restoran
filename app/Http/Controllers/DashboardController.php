<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $dashboardRoute = $this->getDashboardRoute($user->role);

        return redirect($dashboardRoute);
    }

    private function getDashboardRoute($role)
    {
        switch ($role) {
            case '0':
                return route('admin.dashboard');
            case '1':
                return route('manager.dashboard');
            case '2':
                return route('kasir.dashboard');
        }
    }
}
