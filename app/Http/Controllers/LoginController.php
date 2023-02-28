<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        return view('login.index');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            "username" => "required|max:255",
            "password" => "required|max:255",
        ], [
            "username.required" => "Wajib diisi !",
            "username.max" => "Maksimal 16 karakter !",
            "password.required" => "Wajib diisi !",
            "password.max" => "Maksimal 16 karakter !",
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Jika login berhasil, maka akan redirect kemudian di intended sebelum masuk ke middleware
            return redirect()->intended('/');
        }

        return redirect('/login')->with('loginFailed', "Username atau Password salah");
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function register()
    {
        return view('register.index');
    }

    public function createUser(Request $request)
    {
        $validatedData = $request->validate([
            "name" => "required|max:255",
            "username" => "required|max:255",
            "password" => "required|max:255",
            "passConfirm" => "required|same:password|max:255",
            "nik" => "required|max:16",
            "telp" => "required|max:255",
            "email" => "required|email:dns",
        ], [
            "name.required" => "Wajib diisi !",
            "name.max" => "Maksimal 255 Karakter !",
            "username.required" => "Wajib diisi !",
            "username.max" => "Maksimal 255 Karakter !",
            "password.required" => "Wajib diisi !",
            "password.max" => "Maksimal 255 Karakter !",
            "passConfirm.required" => "Wajib Diisi",
            "passConfirm.same" => "Password tidak sesuai !",
            "passConfirm.max" => "Maksimal 255 Karakter !",
            "nik.required" => "Wajib Diisi !",
            "nik.max" => "Tidak boleh lebih dari 16 karakter !",
            "telp.required" => "Wajib diisi !",
            "telp.max" => "Maksimal 255 Karakter !",
            "email.required" => "Wajib diisi !",
            "email.email" => "Yang anda masukkan bukan email !",
        ]);

        $validatedData["password"] = Hash::make($validatedData["password"]);

        if (User::create($validatedData)) {
            return redirect('/login')->with("successRegister", "Akun berhasil dibuat");
        } else {
            return redirect('/register')->with("failRegister", "Akun gagal dibuat");
        }
    }
}
