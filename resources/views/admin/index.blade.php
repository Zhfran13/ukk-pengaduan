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
            <h3 class="text-center">Daftar Akun Petugas & Masyarakat</h3>

            @if (session()->has('createSuccess'))
                <div class="row justify-content-center">
                    <div class="col-8 col-md-7 col-lg-5 alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('createSuccess') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif

            @if (session()->has('deleteSuccess'))
                <div class="row justify-content-center">
                    <div class="col-8 col-md-7 col-lg-5 alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('deleteSuccess') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            @if (session()->has('deleteFailed'))
                <div class="row justify-content-center">
                    <div class="col-8 col-md-7 col-lg-5 alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('deleteFailed') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif

            @if (session()->has('updateSuccess'))
                <div class="row justify-content-center">
                    <div class="col-8 col-md-7 col-lg-5 alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('updateSuccess') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            @if (session()->has('updateFailed'))
                <div class="row justify-content-center">
                    <div class="col-8 col-md-7 col-lg-5 alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('updateFailed') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table mt-4 overflow-x-scroll">
                    <thead class="text-center text-md-start">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($users as $user)
                            <tr>
                                <td scope="row">{{ $i }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->level }}</td>
                                <td class="col-3 text-center text-md-start">
                                    <a class="badge bg-primary border-0 p-2 m-1"
                                        href="/admin/petugas/update/{{ $user->username }}">Perbarui</a>
                                    <a class="badge bg-danger border-0 p-2 m-1"
                                        href="/admin/petugas/delete/{{ $user->username }}">Hapus <i
                                            class="bi bi-trash3"></i></a>
                                </td>
                                @php
                                    $i++;
                                @endphp
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-lg-4 row">
                <a href="/admin/petugas/create" class="btn btn-warning justify-content-center">
                    Buat Akun Petugas
                </a>
            </div>
        </div>

        <div class="d-flex justify-content-center mb-5 mt-4">
            {{ $users->links() }}
        </div>
    </div>
@endsection
