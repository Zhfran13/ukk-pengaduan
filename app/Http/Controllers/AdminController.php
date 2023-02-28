<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            "users" => User::where('level', 'petugas')->orWhere('level', 'masyarakat')->paginate(8),
        ]);
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "name" => "required",
            "username" => "required",
            "password" => "required",
            "nik" => "required|max:16",
            "telp" => "required",
            "email" => "required|email:dns",
            "level" => "required"
        ], [
            "name.required" => "Wajib diisi !",
            "username.required" => "Wajib diisi !",
            "password.required" => "Wajib diisi !",
            "nik.required" => "Wajib diisi !",
            "nik.max" => "Maksimal 16 Karakter",
            "telp.required" => "Wajib diisi !",
            "email.required" => "Wajib diisi !",
            "email.email" => "Yang anda masukkan bukan email !",
        ]);

        $validatedData["password"] = Hash::make($validatedData["password"]);

        // User::create($validatedData);
        if (User::create($validatedData)) {
            return redirect('/admin/petugas')->with('createSuccess', 'Akun Petugas Baru Berhasil Dibuat');
        }

        return redirect('/admin/petugas/create')->with('createFailed', 'Akun Petugas Baru Gagal Dibuat');
    }

    public function edit(User $user)
    {
        return view('admin.update', [
            "user" => $user,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            "name" => "required",
            "username" => "required",
            // "password" => "required",
            "nik" => "required|max:16",
            "telp" => "required",
            "level" => "required",
            "email" => "required|email:dns",
        ], [
            "name.required" => "Wajib diisi !",
            "username.required" => "Wajib diisi !",
            // "password.required" => "Wajib diisi !",
            "nik.required" => "Wajib diisi !",
            "nik.max" => "Tidak boleh lebih dari 16 karakter !",
            "telp.required" => "Wajib diisi !",
            "email.required" => "Wajib diisi !",
            "email.email" => "Yang anda masukkan bukan email !",
        ]);

        // if ($request->password) {
        //     $validatedData["password"] = Hash::make($validatedData["password"]);
        // }

        if (User::where('id', $user->id)->update($validatedData)) {
            return redirect('/admin/petugas')->with('updateSuccess', 'Perbarui data akun berhasil');
        }

        return redirect('/admin/petugas')->with('updateFailed', 'Perbarui data akun gagal');
    }

    public function delete(User $user)
    {
        return view('admin.delete', [
            "user" => $user,
        ]);
    }

    public function destroy(User $user)
    {
        if (User::destroy($user->id)) {
            return redirect('/admin/petugas')->with('deleteSuccess', "Hapus akun berhasil");
        }

        return redirect('/admin/petugas')->with('deleteFailed', "Hapus akun gagal dilakukan");
    }
}
