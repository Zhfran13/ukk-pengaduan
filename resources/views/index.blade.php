@php
    use Illuminate\Support\Str;
@endphp
@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="css/home.css">
    {{-- <link rel="stylesheet" href="css/font-responsive.css"> --}}
    <link rel="stylesheet" href="css/partials/navbar.css">
@endsection

<style>
    .btn.readmore,
    .card-text {
        transition: all 1s;
    }

    .transition {
        transition: all 1s;
    }
</style>

@section('navbar')
    @include('partials.navbar')
@endsection

@section('script')
    <script src="src/readMoreJS.min.js"></script>
@endsection

@section('container')
    <div class="welcome-row text-responsive mb-5 overflow-x-hidden">
        <div class="col-12">
            <div class="container">
                @auth
                    <h2>Selamat datang, {{ auth()->user()->name }}</h2>
                @else
                    <h2>Selamat datang</i></h2>
                @endauth
                <p class="fs-6 fs-md-5">Semoga Harimu Menyenangkan :D</i>
                </p>
            </div>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row justify-content-center">
            @if ($pengaduans->count())
                @foreach ($pengaduans as $pengaduan)
                    <div class="col-12 col-md-4">
                        <div class="card mb-4">
                            <img src="{{ asset('img') . '/' . $pengaduan->foto }}" class="card-img-top"
                                alt="foto pengaduan">
                            <div class="card-body">
                                <h5 class="card-title">{{ $pengaduan->judul }}</h5>
                                {{-- <p class="card-text">{{ Str::limit($pengaduan->isi_laporan, 150, ' ...') }}</p> --}}
                                <p class="card-text">{{ $pengaduan->isi_laporan }}</p>
                                <p href="#" class="text-decoration-none readMore btn btn-warning py-1 px-2">Baca lebih
                                    lanjut</p>
                                <p class="card-text">
                                    <small class="text-muted">
                                        {{-- {{ date('d F Y', strtotime($pengaduan->tgl_pengaduan)) }} --}}
                                        {{-- {{ \Carbon\Carbon::parse($user->from_date)->format('d/m/Y') }} --}}
                                        {{ $pengaduan->tgl_pengaduan->format('d F Y') }}
                                    </small>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <h4 class="text-center">Pengaduan masih kosong</h4>
            @endif

            {{-- Pagination --}}
            <div class="text-center d-flex justify-content-center ">
                {{ $pengaduans->links() }}
            </div>
        </div>
    </div>




    {{-- <form action="/logout" method="post">
        @csrf
        <button type="submit">logout</button>
    </form> --}}

    <script src="/js/readMore.js"></script>
@endsection
