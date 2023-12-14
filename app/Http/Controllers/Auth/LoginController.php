<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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

        // Set success message in session
        $this->setFlashMessage($user->role);

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
    private function setFlashMessage($role)
    {
        switch ($role) {
            case 0:
                Session::flash('success', 'Selamat datang, Admin!');
                break;
            case 1:
                Session::flash('success', 'Selamat datang, Manager!');
                break;
            case 2:
                Session::flash('success', 'Selamat datang, Kasir!');
                break;
            default:
                Session::flash('success', 'Selamat datang!');
                break;
        }
    }
}
