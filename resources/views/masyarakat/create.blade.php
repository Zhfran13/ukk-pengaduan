@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="/css/partials/navbar.css">
@endsection

@section('navbar')
    @include('partials.navbar')
@endsection

@section('container')
    <div class="container">
        <div class="row justify-content-center my-5">
            <h2 class="text-center">Buat Pengaduan</h2>

            @if (session()->has('createFailed'))
                <div class="row justify-content-center">
                    <div class="col-8 col-md-7 col-lg-5 alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('createFailed') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif

            <form action="/pengaduan" method="POST" class="col-10 col-md-7 col-lg-6 card py-4 px-4 mt-4" autocomplete="of"
                enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="judul" class="form-label ">Judul</label>
                    <input name="judul" type="text" class="form-control @error('judul') is-invalid @enderror"
                        id="judul" placeholder="Sapi masuk rumah" value="{{ old('judul') }}">
                    @error('judul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 row">
                    <label for="nik" class="col col-form-label">NIK</label>
                    <div class="col-10">
                        <input name="user_nik" type="text" class="form-control @error('nik') is-invalid @enderror"
                            id="nik" placeholder="" value="{{ $user }}" readonly>
                    </div>
                    @error('nik')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <textarea name="isi_laporan" class="form-control @error('isi_laporan') is-invalid @enderror"
                        placeholder="Sapi masuk rumah ..." id="isi_laporan" style="height: 100px" value="{{ old('isi_laporan') }}"></textarea>
                    <label for="isi_laporan" class="form-label ">Isi Laporan</label>
                    @error('isi_laporan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">
                        Foto Pengaduan <span class="fs-6 text-muted">(max: 2Mb)</span>
                    </label>
                    <input name="foto" class="form-control @error('foto') is-invalid @enderror" type="file"
                        id="foto">
                    @error('foto')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-warning text-white">Daftar</button>
            </form>
        </div>
    </div>
@endsection
