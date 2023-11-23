<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        // Custom logic to determine the dashboard route based on user's role
        $dashboardRoute = $this->getDashboardRoute($user->role);

        return redirect($dashboardRoute);
    }

    private function getDashboardRoute($role)
    {
        switch ($role) {
            case 0:
                return '/admin/dashboard';
            case 1:
                return '/manager/dashboard';
            case 2:
                return '/kasir/dashboard';
            default:
                return '/dashboard';
        }
    }
}
