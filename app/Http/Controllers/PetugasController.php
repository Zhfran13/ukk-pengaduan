<?php

namespace App\Http\Controllers;

use App\Exports\PengaduansExport;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tanggapan.index', [
            "pengaduans" => Pengaduan::filter(request(['search', 'status']))->paginate(8),
        ]);
    }

    public function showTanggapan(Pengaduan $pengaduan, Tanggapan $tanggapan)
    {
        if ($pengaduan->status == 'selesai') {
            return view('tanggapan.show', [
                "pengaduan" => $pengaduan,
                "tanggapan" => $pengaduan->tanggapan->tanggapan
            ]);
        } elseif ($pengaduan->status == 'proses') {
            return redirect("/tanggapan/$pengaduan->id/proses");
        }

        return redirect('/tanggapan')->with('status-0', 'Pengaduan ini belum bisa ditanggapi');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeTanggapan(Request $request)
    {
        $validatedData = $request->validate([
            "id_pengaduan" => "required",
            "tanggapan" => "required",
        ], [
            "tanggapan.required" => "Wajib di isi !"
        ]);

        $validatedData["id_petugas"] = auth()->user()->id;

        if (Tanggapan::create($validatedData)) {
            $statusDone = [
                "status" => "selesai"
            ];

            Pengaduan::where('id', $request->id_pengaduan)->update($statusDone);

            return redirect('/tanggapan')->with('tanggapanSuccess', 'Pengaduan berhasil ditanggapi');
        }

        return redirect("/tanggapan/$request->id_pengaduan/proses")->with('tanggapanFailed', 'Pengaduan gagal ditanggapi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengaduan $pengaduan, Tanggapan $tanggapan)
    {
        if ($pengaduan->status == 'proses') {
            return view('tanggapan.show', [
                "pengaduan" => $pengaduan,
            ]);
        } elseif ($pengaduan->status == 'selesai') {
            return redirect("/tanggapan/$pengaduan->id/show");
        }

        return redirect('/tanggapan')->with('status-0', 'Pengaduan ini belum bisa ditanggapi');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function edit(Tanggapan $tanggapan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tanggapan $tanggapan)
    {
    }

    public function updateStatus(Request $request, Pengaduan $pengaduan)
    {
        $validatedStatus = $request->validate([
            "status" => "required",
        ]);

        if ($pengaduan->status == '0') {
            Pengaduan::where('id', $pengaduan->id)->update($validatedStatus);

            return redirect('/tanggapan')->with('updateStatus', 'Pengaduan sudah bisa ditanggapi');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengaduan $pengaduan)
    {
        if ($pengaduan->foto) {
            Storage::delete($pengaduan->foto);
        }

        Pengaduan::destroy($pengaduan->id);

        return redirect('/tanggapan');
    }

    public function export()
    {
        return Excel::download(new PengaduansExport, 'pengaduan.xlsx');
        // return Excel::download(new PengaduansExport, 'pengaduan.html', \Maatwebsite\Excel\Excel::HTML);
        // return Excel::download(new PengaduansExport, 'pengaduan.pdf', \Maatwebsite\Excel\Excel::TCPDF);
    }
}
