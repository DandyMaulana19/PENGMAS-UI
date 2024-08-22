<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('pages.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            // Regenerasi session
            $request->session()->regenerate();

            // Ambil user yang sedang login
            $user = Auth::user();

            // Ambil role pertama dari user yang login
            $role = $user->roles->first();

            if ($role) {
                // Redirect berdasarkan role
                switch ($role->name) {
                    case 'rt':
                        return redirect()->intended("/rt/pindah-masuk");
                    case 'rw':
                        return redirect()->intended("/rw/pindah-masuk");
                    case 'kelurahan':
                        return redirect()->intended("/kelurahan/pindah-masuk");
                    case 'kecamatan':
                        return redirect()->intended("/kecamatan/pindah-masuk");
                    default:
                        return redirect()->intended("/warga/dashboard/{$user->id}");
                }
            }
        }

        return back()->withErrors([
            'name' => 'username tidak cocok',
            'password' => 'password tidak cocok',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
