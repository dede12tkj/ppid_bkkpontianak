<div id="sidebar">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative text-center">
            <div class="align-items-center">
                <div class="logo">
                    <a href="{{ route('ppid') }}"><img src="{{ asset('frontend/img/logokemenkes.png') }}" alt="Logo"
                            srcset="" /></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class="sidebar-link">
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                {{-- PPID --}}
                <li class="sidebar-item has-sub">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-collection-fill"></i>
                        <span>PPID</span>
                    </a>

                    <ul class="submenu">
                        <li class="submenu-item {{ request()->routeIs('admin-ppid-form.index') ? 'active' : '' }}">
                            <a href="{{ route('admin-ppid-form.index') }}" class="submenu-link">Formulir</a>
                        </li>

                        <li class="submenu-item {{ request()->routeIs('admin-ppid-faq.index') ? 'active' : '' }}">
                            <a href="{{ route('admin-ppid-faq.index') }}" class="submenu-link">Frequently Asked
                                Question</a>
                        </li>

                        <li class="submenu-item {{ request()->routeIs('admin-ppid-profil.index') ? 'active' : '' }}">
                            <a href="{{ route('admin-ppid-profil.index') }}" class="submenu-link">Profil Singkat</a>
                        </li>

                        <li class="submenu-item {{ request()->routeIs('admin-ppid-tugas-fungsi.index') ? 'active' : '' }}">
                            <a href="{{ route('admin-ppid-tugas-fungsi.index') }}" class="submenu-link">Tugas
                                Fungsi</a>
                        </li>

                        <li class="submenu-item {{ request()->routeIs('admin-ppid-struktur-organisasi.index') ? 'active' : '' }}">
                            <a href="{{ route('admin-ppid-struktur-organisasi.index') }}"
                                class="submenu-link">Struktur Organisasi</a>
                        </li>

                        <li class="submenu-item {{ request()->routeIs('admin-ppid-visi-misi.index') ? 'active' : '' }}">
                            <a href="{{ route('admin-ppid-visi-misi.index') }}" class="submenu-link">Visi Misi</a>
                        </li>

                        <li class="submenu-item {{ request()->routeIs('admin-ppid-standar-layanan.index') ? 'active' : '' }}">
                            <a href="{{ route('admin-ppid-standar-layanan.index') }}" class="submenu-link">Standar
                                Layanan</a>
                        </li>

                    </ul>
                </li>

                <li class="sidebar-item has-sub">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-collection-fill"></i>
                        <span>PPID Regulasi</span>
                    </a>

                    <ul class="submenu">
                        <li class="submenu-item {{ request()->routeIs('admin-ppid-regulasi-kip.index') ? 'active' : '' }}">
                            <a href="{{ route('admin-ppid-regulasi-kip.index') }}" class="submenu-link">Regulasi
                                KIP</a>
                        </li>

                        <li class="submenu-item {{ request()->routeIs('admin-ppid-regulasi-kemenkes.index') ? 'active' : '' }}">
                            <a href="{{ route('admin-ppid-regulasi-kemenkes.index') }}" class="submenu-link">Regulasi
                                Kemenkes</a>
                        </li>
                        <li class="submenu-item {{ request()->routeIs('admin-ppid-regulasi-sop-ki.index') ? 'active' : '' }}">
                            <a href="{{ route('admin-ppid-regulasi-sop-ki.index') }}" class="submenu-link">SOP
                                Keterbukaan Informasi</a>
                        </li>

                    </ul>
                </li>




                {{-- PPID Informasi Publik --}}
                <li class="sidebar-item has-sub">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-collection-fill"></i>
                        <span>PPID Informasi Publik</span>
                    </a>

                    <ul class="submenu">
                        <li class="submenu-item {{ request()->routeIs('admin-ppid-laporan.index') ? 'active' : '' }}">
                            <a href="{{ route('admin-ppid-laporan.index') }}" class="submenu-link">Laporan PPID</a>
                        </li>
                        <li class="submenu-item {{ request()->routeIs('informasi-berkala.index') ? 'active' : '' }}">
                            <a href="{{ route('informasi-berkala.index') }}" class="submenu-link">Informasi
                                Berkala</a>
                        </li>
                        <li class="submenu-item {{ request()->routeIs('informasi-setiap-saat.index') ? 'active' : '' }}">
                            <a href="{{ route('informasi-setiap-saat.index') }}" class="submenu-link">Informasi
                                Setiap Saat</a>
                        </li>

                    </ul>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('ppid') }}" target="_blank" class="sidebar-link">
                        <i class="bi bi-box-arrow-up-right"></i>
                        <span>Lihat Website PPID</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </li>

            </ul>

        </div>
    </div>
</div>
