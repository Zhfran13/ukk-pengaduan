@extends('layouts.main')

@section('navbar')
    @include('partials.navbar')
@endsection

@section('style')
    <link rel="stylesheet" href="/css/partials/navbar.css">
    <link rel="stylesheet" href="/css/btn.css">
    <link rel="stylesheet" href="/css/masyarakat/index.css">
@endsection

@section('container')
    <div class="container">
        <div class="row justify-content-center my-5">
            <h3 class="text-center">Daftar Pengaduan</h3>

            @if (session()->has('createsSuccess'))
                <div class="row justify-content-center">
                    <div class="col-8 col-md-7 col-lg-5 alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('createsSuccess') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif

            <div class="dropdown d-flex justify-content-end">
                <button class="border-0 bg-primary text-white py-1 px-2 rounded" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fi fi-rr-filter"></i>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/pengaduan?sort=desc">Terbaru</a></li>
                    <li><a class="dropdown-item" href="/pengaduan?sort=asc">Terlama</a></li>
                </ul>
            </div>

            <div class="table-responsive">
                <table class="table mt-4 overflow-x-scroll">
                    <thead class="text-center text-md-start">
                        <th>No</th>
                        <th>Judul</th>
                        <th>Pengaduan</th>
                        <th>Status</th>
                        <th class="col-1">Aksi</th>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($pengaduans as $pengaduan)
                            <tr>
                                <td class="col-1" scope="row">{{ $i }}</td>
                                <td>{{ $pengaduan->judul }}</td>
                                <td>{{ $pengaduan->isi_laporan }}</td>
                                <td>
                                    @if ($pengaduan->status == 0)
                                        {{ 'Belum Diproses' }}
                                    @elseif ($pengaduan->status == 'proses')
                                        {{ 'Sedang Diproses' }}
                                    @elseif ($pengaduan->status == 'selesai')
                                        {{ 'Selesai' }}
                                    @endif
                                </td>
                                <td class="col-1 text-center text-md-start">
                                    {{-- <a class="badge bg-primary border-0" href="#">Perbarui</a> --}}
                                    <a href="/pengaduan/{{ $pengaduan->id }}"
                                        class="badge bg-primary border-0 p-2 m-1">Lihat <i class="bi bi-eye"></i></a>
                                    <form action="/pengaduan/{{ $pengaduan->id }}" method="post"
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
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-lg-4 row">
                <a href="/pengaduan/create" class="btn btn-warning justify-content-center">
                    Buat Pengaduan
                </a>
            </div>
        </div>

        <div class="d-flex justify-content-center mb-5 mt-4">
            {{ $pengaduans->links() }}
        </div>
    </div>
@endsection
