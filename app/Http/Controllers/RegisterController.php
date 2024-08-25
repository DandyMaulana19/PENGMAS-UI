<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index()
    {
        return view('pages.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
        ], [
            'email.unique' => 'Email telah dipakai.',
            'password.min' => 'Password minimal 8 karakter.',
        ]);

        $user = User::create([
            'id' => (string) Str::uuid(),
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $warga = Role::where('name', 'warga')->first();

        UserRole::create([
            'user_id' => $user->id,
            'role_id' => $warga->id,
        ]);

        return redirect('/login')->with('success', 'Pendaftaran berhasil!');
    }
}
