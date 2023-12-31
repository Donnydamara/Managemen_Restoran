<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'no_hp' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'string', 'max:255'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'integer', 'in:0,1,2'], // Menetapkan bahwa role harus salah satu dari 0, 1, atau 2
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'no_hp' => $data['no_hp'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'tempat_lahir' => $data['tempat_lahir'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
        ]);
    }
    protected function registered(Request $request, $user)
    {
        if ($user->role == 0) {
            // Admin
            return redirect('/admin/dashboard');
        } elseif ($user->role == 1) {
            // Manager
            return redirect('/manager/dashboard');
        } elseif ($user->role == 2) {
            // Kasir
            return redirect('/kasir/dashboard');
        } else {
            // Default redirect if role is not recognized
            return redirect('/dashboard');
        }
    }
}
