<header class="ppid-header">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a href="{{ route('ppid') }}" class="ppid-brand">
                <img src="{{ asset('frontend/img/logokarantina.png') }}" alt="Logo BKK">
                <span>
                    <b>e-PPID</b>
                    <small>BKK Kelas I Pontianak</small>
                </span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Buka menu">
                <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto">
                    <a href="{{ route('ppid') }}" class="nav-link {{ request()->routeIs('ppid') ? 'active' : '' }}">Beranda</a>
                    <a href="{{ route('ppid.profil') }}" class="nav-link {{ request()->routeIs('ppid.profil*') ? 'active' : '' }}">Profil PPID</a>
                    <a href="{{ route('ppid.regulasi') }}" class="nav-link {{ request()->routeIs('ppid.regulasi*') ? 'active' : '' }}">Regulasi</a>
                    <a href="{{ route('ppid.standar-layanan') }}" class="nav-link {{ request()->routeIs('ppid.standar-layanan*') ? 'active' : '' }}">Standar Layanan</a>
                    <a href="{{ route('ppid.informasi-publik') }}" class="nav-link {{ request()->routeIs('ppid.informasi-publik*') ? 'active' : '' }}">Informasi Publik</a>
                    <a href="{{ route('ppid.laporan') }}" class="nav-link {{ request()->routeIs('ppid.laporan*') ? 'active' : '' }}">Laporan</a>
                    <a href="{{ config('ppid.main_site_url') }}" class="nav-link ppid-ext">Website BKK <i class="bi bi-arrow-up-right"></i></a>
                </div>
            </div>
        </div>
    </nav>
</header>

<section class="ppid-hero">
    <div class="container">
        <span class="ppid-eyebrow">Keterbukaan Informasi Publik</span>
        <h1>@yield('title-navbar')</h1>
    </div>
</section>
