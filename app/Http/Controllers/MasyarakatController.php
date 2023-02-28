<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MasyarakatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('masyarakat.index', [
            "pengaduans" => Pengaduan::where('user_nik', auth()->user()->nik)->filter(request(['sort']))->paginate(8)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('masyarakat.create', [
            "user" => auth()->user()->nik,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "judul" => "required|max:255",
            "user_nik" => "required|max:16",
            "isi_laporan" => "required",
            "foto" => "required|image|mimes:png,jpg,jpeg|max:2048",
        ], [
            "judul.required" => "Wajib diisi !",
            "judul.max" => "Maksimal 16 karakter",
            "user_nik.required" => "Wajib diisi !",
            "user_nik.max" => "Maksimal 16 karakter",
            "isi_laporan.required" => "Wajib diisi !",
            "foto.required" => "Wajib diisi !",
            "foto.image" => "File harus gambar (jpg, jpeg, png)",
            "foto.max" => "File maksimal berukuran 2048 kilobytes",
        ]);

        if ($request->file('foto')) {
            $validatedData["foto"] = $request->file('foto')->store('pengaduan');
        }

        if (Pengaduan::create($validatedData)) {
            return redirect('/pengaduan')->with('createSuccess', "Buat laporan pengaduan berhasil");
        }

        return redirect('/pengaduan/create')->with('createFailed', "Buat laporan pengaduan gagal");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengaduan $pengaduan)
    {
        return view('masyarakat.show', [
            "pengaduan" => $pengaduan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengaduan $pengaduan)
    {
        if ($pengaduan->foto) {
            Storage::delete($pengaduan->foto);
        }

        Pengaduan::destroy($pengaduan->id);

        return redirect('pengaduan');
    }
}
