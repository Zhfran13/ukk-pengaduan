<nav class="navbar navbar-expand-lg d-flex position-fixed ms-5 mt-3 " id="navbar">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="/img/assets/logo.png" height="40px" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            {{-- <span class="navbar-toggler-icon"></span> --}}
            <i class="fi fi-rr-apps"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page"
                        href="/">Beranda</a>
                </li>
                @can('is_admin')
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/petugas') ? 'active' : '' }}" href="/admin/petugas">Akun
                            Petugas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('tanggapan') ? 'active' : '' }}" href="/tanggapan">Tanggapan</a>
                    </li>
                @elsecan('admin_petugas')
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('tanggapan') ? 'active' : '' }}" href="/tanggapan">Tanggapan</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('pengaduan') ? 'active' : '' }}" href="/pengaduan">Pengaduan</a>
                    </li>
                @endcan
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Lainnya
                    </a>
                    <ul class="dropdown-menu">
                        @auth
                            <li>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        @else
                            <li>
                                <form action="/login" method="GET">

                                    <button type="submit" class="dropdown-item">Login</button>
                                </form>
                            </li>
                            <li>
                                <form action="/register" method="GET">

                                    <button type="submit" class="dropdown-item">Register</button>
                                </form>
                            </li>
                        @endauth
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
