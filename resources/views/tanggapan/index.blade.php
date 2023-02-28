@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="/css/btn.css">
    <link rel="stylesheet" href="/css/partials/navbar.css">
    <link rel="stylesheet" href="/css/petugas/index.css">
@endsection

@section('navbar')
    @include('partials.navbar')
@endsection

@section('container')
    <div class="container justify-content-center my-5">
        <h3 class="text-center">Tanggapi Laporan</h3>

        @if (session()->has('status-0'))
            <div class="row justify-content-center">
                <div class="col-8 col-md-7 col-lg-5 alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('status-0') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        @if (session()->has('updateStatus'))
            <div class="row justify-content-center">
                <div class="col-8 col-md-7 col-lg-5 alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('updateStatus') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        @if (session()->has('tanggapanSuccess'))
            <div class="row justify-content-center">
                <div class="col-8 col-md-7 col-lg-5 alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('tanggapanSuccess') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        <form action="/tanggapan" method="get" class="row justify-content-center mt-3">
            <div class="col-12 col-md-3 mb-3">
                <select name="status" class="form-select col-3">
                    <option selected hidden value="">Status</option>
                    <option value="0">Belum diproses</option>
                    <option value="proses">Sedang diproses</option>
                    <option value="selesai">Selesai</option>
                </select>
            </div>
            <div class="col-12 col-md-8 ">
                <div class="input-group">
                    <input name="search" type="text" class="form-control" placeholder="Cari ..."
                        value="{{ request('search') }}">
                    <button type="submit" href="#" class="input-group-text bg-light" id="basic-addon1"><i
                            class="bi bi-search"></i></button>
                </div>
            </div>
        </form>

        <div class="row mt-3">
            <div class="col-10">
                <p>
                    @if (request('search'))
                        Pencarian : {{ request('search') }},
                    @endif
                    @if (request('status'))
                        Status : {{ request('status') }}
                    @endif
                </p>
            </div>
        </div>

        <div class="table-responsive mb-3">
            <table class="table mt-4 overflow-x-scroll">
                <thead class="text-center">
                    <th class="col-1">No</th>
                    <th>Nama</th>
                    <th>Pengaduan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </thead>
                <tbody class="text-center">
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($pengaduans as $pengaduan)
                        <tr>
                            <td class="col-1" scope="row">{{ $i }}</td>
                            <td>{{ $pengaduan->user->name }}</td>
                            <td>{{ $pengaduan->judul }}</td>
                            <td>
                                @if ($pengaduan->status == 0)
                                    {{ 'Belum Diproses' }}
                                @elseif ($pengaduan->status == 'proses')
                                    {{ 'Sedang Diproses' }}
                                @elseif ($pengaduan->status == 'selesai')
                                    {{ 'Selesai' }}
                                @endif
                            </td>
                            <td class="col-2">
                                @if ($pengaduan->status == '0')
                                    <form action="/tanggapan/{{ $pengaduan->id }}" method="post">
                                        <input type="hidden" name="status" value="proses">
                                        @csrf
                                        @method('put')
                                        <button class="badge bg-primary border-0 p-2 m-1">Proses <i
                                                class="bi bi-check2"></i></button>
                                    </form>
                                @elseif ($pengaduan->status == 'proses')
                                    <form action="/tanggapan/{{ $pengaduan->id }}/proses" method="get">
                                        {{-- @csrf --}}
                                        <button class="badge bg-primary border-0 p-2 m-1">Tanggapi <i
                                                class="bi bi-card-checklist"></i></button>
                                    </form>
                                @elseif ($pengaduan->status == 'selesai')
                                    <form action="/tanggapan/{{ $pengaduan->id }}/show" method="get">
                                        {{-- @csrf --}}
                                        <button class="badge bg-primary border-0 p-2 m-1">Lihat <i
                                                class="bi bi-eye"></i></button>
                                    </form>
                                @endif
                                <form action="/tanggapan/{{ $pengaduan->id }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('delete')
                                    <button class="badge bg-danger border-0 p-2 m-1"
                                        onclick="return confirm('Apakah anda yakin ingin menghapus pengaduan ini ?')">Hapus
                                        <i class="bi bi-trash3"></i></button>
                                </form>
                            </td>
                        </tr>
                        @php
                            $i++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="row justify-content-center my-3">
            <a href="/tanggapan/export"
                class="col-10 col-md-5 btn btn-warning @can('is_petugas') disabled d-block @endcan @can('is_admin') d-block @endcan">Buat
                Laporan <i class="bi bi-filetype-xlsx"></i></a>
        </div>

        <div class="d-flex justify-content-center mb-5 mt-4">
            {{ $pengaduans->links() }}
        </div>
    </div>
@endsection
