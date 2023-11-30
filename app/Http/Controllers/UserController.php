<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showProfile()
    {
        // Mengambil data user yang sedang login
        $user = auth()->user();

        // Menampilkan halaman profil
        return view('profile.show', compact('user'));
    }
    public function editProfile()
    {
        $user = auth()->user();

        return view('profile.edit', compact('user'));
    }


    public function updateProfile(Request $request)
    {
        $id = auth()->user()->id;

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
            'no_hp' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'string', 'max:255'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'integer', 'in:0,1,2'],
            'photo' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $user = User::find($id);

        $fileName = $user->photo_path;

        if ($request->hasFile('photo')) {
            // Hapus gambar lama jika ada
            if ($user->photo_path) {
                unlink(public_path('image/profil/' . $user->photo_path));
            }

            $fileName = 'foto-' . uniqid() . '.' . $request->photo->extension();
            $request->photo->move(public_path('image/profil'), $fileName);
        }

        if ($request->filled('password')) {
            $request->merge(['password' => Hash::make($request->password)]);
        } else {
            $request->request->remove('password');
        }

        $request->merge(['photo_path' => $fileName]);

        $user->update($request->all());

        return redirect()->route('profile.show')->with('success', 'User updated successfully');
    }
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }
    public function create()
    {
        return view('users.create');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'no_hp' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'string', 'max:255'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'integer', 'in:0,1,2'],
            'photo' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // max:2048 is the maximum file size in kilobytes (2MB)
        ]);
        $fileName = ''; // Initialize fileName variable

        if (!empty($request->photo)) {
            $fileName = 'foto-' . uniqid() . '.' . $request->photo->extension();
            $request->photo->move(public_path('image/profil'), $fileName);
        }

        $request['password'] = Hash::make($request['password']);
        $request['photo_path'] = $fileName; // Set the photo_path

        User::create($request->all());

        return redirect()->route('users.index')
            ->with('success', 'User created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
            'no_hp' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'string', 'max:255'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'integer', 'in:0,1,2'],
            'photo' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $user = User::find($id);

        $fileName = $user->photo_path;

        if ($request->hasFile('photo')) {
            // Hapus gambar lama jika ada
            if ($user->photo_path) {
                unlink(public_path('image/profil/' . $user->photo_path));
            }

            $fileName = 'foto-' . uniqid() . '.' . $request->photo->extension();
            $request->photo->move(public_path('image/profil'), $fileName);
        }

        if ($request->has('password')) {
            $request['password'] = Hash::make($request['password']);
        } else {
            unset($request['password']);
        }

        $request['photo_path'] = $fileName;

        $user->update($request->all());

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }
    public function resetPassword($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('users.index')
                ->with('error', 'User not found');
        }

        // Set password default
        $defaultPassword = '12345678';
        $hashedPassword = Hash::make($defaultPassword);

        // Update password user
        $user->update(['password' => $hashedPassword]);

        return redirect()->route('users.index')
            ->with('success', 'Password reset successfully. New password is: ' . $defaultPassword);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if ($user) {
            // Hapus gambar profil jika ada
            if ($user->photo_path) {
                $imagePath = public_path('image/profil/' . $user->photo_path);

                // Pastikan file gambar ada sebelum menghapus
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            // Hapus user dari database
            $user->delete();

            return redirect()->route('users.index')
                ->with('success', 'User deleted successfully');
        }

        return redirect()->route('users.index')
            ->with('error', 'User not found');
    }
}
