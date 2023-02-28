@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="/css/btn.css">
    <link rel="stylesheet" href="/css/partials/navbar.css">
@endsection

@section('navbar')
    @include('partials.navbar')
@endsection

@section('container')
    <div class="container">
        <div class="row justify-content-center my-5">
            @if (session()->has('tanggapanFailed'))
                <div class="row justify-content-center">
                    <div class="col-8 col-md-7 col-lg-5 alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('tanggapanFailed') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif

            @if (session()->has('statusDone'))
                <div class="row justify-content-center">
                    <div class="col-8 col-md-7 col-lg-5 alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('statusDone') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif

            <h3 class="text-center">Laporan : {{ $pengaduan->judul }}</h3>

            <form action="/tanggapan/{{ $pengaduan->id }}/proses" method="POST"
                class="col-10 col-md-7 col-lg-6 card py-4 px-4 mt-4" autocomplete="of" enctype="multipart/form-data">
                @csrf
                @method('put')
                <input type="hidden" name="id_pengaduan" value="{{ $pengaduan->id }}">
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input name="judul" type="text" class="form-control @error('judul') is-invalid @enderror"
                        id="judul" placeholder="Sapi masuk rumah" value="{{ $pengaduan->judul }}" readonly>
                    @error('judul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 row">
                    <label for="nik" class="col col-form-label">NIK</label>
                    <div class="col-10">
                        <input name="nik" type="text" class="form-control @error('nik') is-invalid @enderror"
                            id="nik" placeholder="" value="{{ $pengaduan->user_nik }}" readonly>
                    </div>
                    @error('nik')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <textarea name="isi_laporan" class="form-control @error('isi_laporan') is-invalid @enderror"
                        placeholder="Sapi masuk rumah ..." id="isi_laporan" style="height: 100px" readonly></textarea>
                    <label for="isi_laporan" class="form-label ">Isi Laporan</label>
                    @error('isi_laporan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <textarea name="tanggapan" class="form-control @error('tanggapan') is-invalid @enderror"
                        placeholder="Sapi masuk rumah ..." id="tanggapan" style="height: 150px"
                        @if ($pengaduan->status == 'selesai') readonly @endif></textarea>
                    <label for="tanggapan" class="form-label">Tanggapan</label>
                    @error('tanggapan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit"
                    class="btn btn-warning text-white @if ($pengaduan->status == 'selesai') disabled @endif">Tanggapi</button>
            </form>
        </div>
    </div>

    @if ($pengaduan->status == 'selesai')
        <script>
            document.getElementById("tanggapan").value += '<?= $tanggapan ?>';
        </script>
    @endif

    <script>
        document.getElementById("isi_laporan").value += '<?= $pengaduan->isi_laporan ?>';
    </script>
@endsection
