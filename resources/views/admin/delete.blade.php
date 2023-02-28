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
            <h3 class="text-center">Hapus Akun</h3>
            <form action="/admin/petugas/delete/{{ $user->username }}" method="POST"
                class="col-10 col-md-7 col-lg-5 py-4 px-4 mt-4 row justify-content-center gap-3" autocomplete="of">
                @csrf
                @method('delete')
                <p class="col-12 text-center">Apakah anda yakin ingin menghapus akun {{ $user->name }} ?</p>
                <button type="submit" class="btn btn-warning text-white col-5">Hapus</button>
                <a href="{{ url()->previous() }}" class="btn btn-danger text-white col-5">Batal</a>
            </form>
        </div>
    </div>
@endsection
