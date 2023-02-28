@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="/css/login/login.css">
    <link rel="stylesheet" href="/css/partials/navbar.css">
    <link rel="stylesheet" href="/css/btn.css">
@endsection

@section('navbar')
    @include('partials.navbar')
@endsection

@section('container')
    <div class="container">
        <div class="row justify-content-center my-5">

            <h2 class="text-center">Perbarui Akun Petugas</h2>
            <form action="/admin/petugas/update/{{ $user->username }}" method="POST"
                class="col-10 col-md-7 col-lg-5 card py-4 px-4 mt-4" autocomplete="of">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="name" class="form-label ">Name</label>
                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                        id="name" placeholder="Budi" value="{{ $user->name }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input name="username" type="text" class="form-control @error('username') is-invalid @enderror"
                        id="username" placeholder="budi123" value="{{ $user->username }}">
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        id="password" placeholder="" value="{{ $user->password }}">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div> --}}
                <div class="mb-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input name="nik" type="text" class="form-control @error('nik') is-invalid @enderror"
                        id="nik" placeholder="740********" value="{{ $user->nik }}" readonly>
                    @error('nik')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="telp" class="form-label">Nomor Telepon</label>
                    <input name="telp" type="text" class="form-control @error('telp') is-invalid @enderror"
                        id="telp" placeholder="08********" value="{{ $user->telp }}">
                    @error('telp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" type="text" class="form-control @error('email') is-invalid @enderror"
                        id="email" placeholder="abc@gmail.com">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="level" class="form-label">Level</label>
                    <select name="level" class="form-select" required>
                        <option selected value="masyarakat" hidden>Pilih level akun</option>
                        <option value="petugas">Petugas</option>
                        <option value="masyarakat">Masyarakat</option>
                    </select>
                    @error('level')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-warning text-white">Perbarui</button>
            </form>
        </div>
    </div>
@endsection
