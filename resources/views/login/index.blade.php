@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="css/login/login.css">
    <link rel="stylesheet" href="css/btn.css">
    <link rel="stylesheet" href="css/font-responsive.css">
@endsection

@section('container')
    <svg id="wave" class="wave-svg" style="transform:rotate(180deg); transition: 0.3s" viewBox="0 0 1440 350"
        version="1.1" xmlns="http://www.w3.org/2000/svg">
        <defs>
            <linearGradient id="sw-gradient-0" x1="0" x2="0" y1="1" y2="0">
                <stop stop-color="rgba(243, 106, 62, 1)" offset="0%"></stop>
                <stop stop-color="rgba(255, 179, 11, 1)" offset="100%"></stop>
            </linearGradient>
        </defs>
        <path style="transform:translate(0, 0px); opacity:1" fill="url(#sw-gradient-0)"
            d="M0,175L48,186.7C96,198,192,222,288,233.3C384,245,480,245,576,221.7C672,198,768,152,864,110.8C960,70,1056,35,1152,35C1248,35,1344,70,1440,99.2C1536,128,1632,152,1728,145.8C1824,140,1920,105,2016,105C2112,105,2208,140,2304,145.8C2400,152,2496,128,2592,99.2C2688,70,2784,35,2880,70C2976,105,3072,210,3168,250.8C3264,292,3360,268,3456,221.7C3552,175,3648,105,3744,110.8C3840,117,3936,198,4032,239.2C4128,280,4224,280,4320,250.8C4416,222,4512,163,4608,151.7C4704,140,4800,175,4896,192.5C4992,210,5088,210,5184,210C5280,210,5376,210,5472,186.7C5568,163,5664,117,5760,99.2C5856,82,5952,93,6048,93.3C6144,93,6240,82,6336,105C6432,128,6528,187,6624,221.7C6720,257,6816,268,6864,274.2L6912,280L6912,350L6864,350C6816,350,6720,350,6624,350C6528,350,6432,350,6336,350C6240,350,6144,350,6048,350C5952,350,5856,350,5760,350C5664,350,5568,350,5472,350C5376,350,5280,350,5184,350C5088,350,4992,350,4896,350C4800,350,4704,350,4608,350C4512,350,4416,350,4320,350C4224,350,4128,350,4032,350C3936,350,3840,350,3744,350C3648,350,3552,350,3456,350C3360,350,3264,350,3168,350C3072,350,2976,350,2880,350C2784,350,2688,350,2592,350C2496,350,2400,350,2304,350C2208,350,2112,350,2016,350C1920,350,1824,350,1728,350C1632,350,1536,350,1440,350C1344,350,1248,350,1152,350C1056,350,960,350,864,350C768,350,672,350,576,350C480,350,384,350,288,350C192,350,96,350,48,350L0,350Z">
        </path>
        <defs>
            <linearGradient id="sw-gradient-1" x1="0" x2="0" y1="1" y2="0">
                <stop stop-color="rgba(243, 106, 62, 1)" offset="0%"></stop>
                <stop stop-color="rgba(255, 179, 11, 1)" offset="100%"></stop>
            </linearGradient>
        </defs>
        <path style="transform:translate(0, 50px); opacity:0.9" fill="url(#sw-gradient-1)"
            d="M0,35L48,29.2C96,23,192,12,288,29.2C384,47,480,93,576,116.7C672,140,768,140,864,145.8C960,152,1056,163,1152,175C1248,187,1344,198,1440,221.7C1536,245,1632,280,1728,280C1824,280,1920,245,2016,227.5C2112,210,2208,210,2304,175C2400,140,2496,70,2592,64.2C2688,58,2784,117,2880,116.7C2976,117,3072,58,3168,64.2C3264,70,3360,140,3456,157.5C3552,175,3648,140,3744,134.2C3840,128,3936,152,4032,180.8C4128,210,4224,245,4320,221.7C4416,198,4512,117,4608,105C4704,93,4800,152,4896,163.3C4992,175,5088,140,5184,128.3C5280,117,5376,128,5472,157.5C5568,187,5664,233,5760,250.8C5856,268,5952,257,6048,221.7C6144,187,6240,128,6336,122.5C6432,117,6528,163,6624,169.2C6720,175,6816,140,6864,122.5L6912,105L6912,350L6864,350C6816,350,6720,350,6624,350C6528,350,6432,350,6336,350C6240,350,6144,350,6048,350C5952,350,5856,350,5760,350C5664,350,5568,350,5472,350C5376,350,5280,350,5184,350C5088,350,4992,350,4896,350C4800,350,4704,350,4608,350C4512,350,4416,350,4320,350C4224,350,4128,350,4032,350C3936,350,3840,350,3744,350C3648,350,3552,350,3456,350C3360,350,3264,350,3168,350C3072,350,2976,350,2880,350C2784,350,2688,350,2592,350C2496,350,2400,350,2304,350C2208,350,2112,350,2016,350C1920,350,1824,350,1728,350C1632,350,1536,350,1440,350C1344,350,1248,350,1152,350C1056,350,960,350,864,350C768,350,672,350,576,350C480,350,384,350,288,350C192,350,96,350,48,350L0,350Z">
        </path>
        <defs>
            <linearGradient id="sw-gradient-2" x1="0" x2="0" y1="1" y2="0">
                <stop stop-color="rgba(243, 106, 62, 1)" offset="0%"></stop>
                <stop stop-color="rgba(255, 179, 11, 1)" offset="100%"></stop>
            </linearGradient>
        </defs>
        <path style="transform:translate(0, 100px); opacity:0.8" fill="url(#sw-gradient-2)"
            d="M0,280L48,280C96,280,192,280,288,280C384,280,480,280,576,256.7C672,233,768,187,864,140C960,93,1056,47,1152,40.8C1248,35,1344,70,1440,105C1536,140,1632,175,1728,157.5C1824,140,1920,70,2016,87.5C2112,105,2208,210,2304,262.5C2400,315,2496,315,2592,315C2688,315,2784,315,2880,291.7C2976,268,3072,222,3168,192.5C3264,163,3360,152,3456,175C3552,198,3648,257,3744,233.3C3840,210,3936,105,4032,75.8C4128,47,4224,93,4320,110.8C4416,128,4512,117,4608,145.8C4704,175,4800,245,4896,256.7C4992,268,5088,222,5184,215.8C5280,210,5376,245,5472,227.5C5568,210,5664,140,5760,116.7C5856,93,5952,117,6048,140C6144,163,6240,187,6336,215.8C6432,245,6528,280,6624,268.3C6720,257,6816,198,6864,169.2L6912,140L6912,350L6864,350C6816,350,6720,350,6624,350C6528,350,6432,350,6336,350C6240,350,6144,350,6048,350C5952,350,5856,350,5760,350C5664,350,5568,350,5472,350C5376,350,5280,350,5184,350C5088,350,4992,350,4896,350C4800,350,4704,350,4608,350C4512,350,4416,350,4320,350C4224,350,4128,350,4032,350C3936,350,3840,350,3744,350C3648,350,3552,350,3456,350C3360,350,3264,350,3168,350C3072,350,2976,350,2880,350C2784,350,2688,350,2592,350C2496,350,2400,350,2304,350C2208,350,2112,350,2016,350C1920,350,1824,350,1728,350C1632,350,1536,350,1440,350C1344,350,1248,350,1152,350C1056,350,960,350,864,350C768,350,672,350,576,350C480,350,384,350,288,350C192,350,96,350,48,350L0,350Z">
        </path>
    </svg>

    <div class="row justify-content-center align-content-center form-login" style="height: 85vh; margin: 0;">
        @if (session()->has('successRegister'))
            <div class="row justify-content-center">
                <div class="col-8 col-md-7 col-lg-5 alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('successRegister') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        @if (session()->has('loginFailed'))
            <div class="row justify-content-center">
                <div class="col-8 col-md-7 col-lg-5 alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginFailed') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        <form action="/login" method="POST" class="col-8 col-md-7 col-lg-5 container card py-4 px-4 text-responsive"
            autocomplete="off">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input name="username" type="text" class="form-control @error('username') is-invalid @enderror"
                    id="username">
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input name="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    id="password">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-warning text-white text-responsive">Submit</button>
            <p class="text-center mt-3">Belum punya akun ? <span class="text-primary"><a href="/register">Daftar</a></span>
            </p>
            {{-- <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> --}}
        </form>
    </div>
@endsection
