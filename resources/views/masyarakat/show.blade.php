@extends('layouts.main')

@section('navbar')
    @include('partials.navbar')
@endsection

@section('style')
    <link rel="stylesheet" href="/css/partials/navbar.css">
    <link rel="stylesheet" href="/css/btn.css">
    <link rel="stylesheet" href="/css/masyarakat/show.css">
@endsection

@section('container')
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-11">
                <div class="title-section mb-3">
                    <h4>{{ $pengaduan->judul }}</h4>
                    <p class="text-mute m-0">Dibuat : {{ $pengaduan->tgl_pengaduan->format('d F Y') }}</p>
                    <p class="text-mute m-0">Status : @if ($pengaduan->status == '0')
                            Belum Diproses
                        @elseif($pengaduan->status == 'proses')
                            Sedang diproses
                        @elseif($pengaduan->status == 'selesai')
                            Selesai pada
                            {{ $pengaduan->updated_at->format('d F Y') }}
                        @endif
                    </p>
                </div>
                <div class="body-section row mb-3">
                    <img class="mb-3" src="{{ asset('img/' . $pengaduan->foto) }}" style="max-height: 20em;"
                        alt="foto pengaduan">

                    <p>{{ $pengaduan->isi_laporan }}</p>
                </div>
                <div class="body-section row mb-3">
                    <h5>Tanggapan</h5>
                    @if ($pengaduan->tanggapan)
                        <p>{{ $pengaduan->tanggapan->tanggapan }}</p>
                    @else
                        <p class="text-muted">Belum ditanggapi</p>
                    @endif
                </div>
            </div>

            <div class="row justify-content-center">
                <a href="{{ url()->previous() }}" class="col-11 col-md-4 btn btn-warning">Kembali</a>
            </div>
        </div>
    </div>
@endsection
