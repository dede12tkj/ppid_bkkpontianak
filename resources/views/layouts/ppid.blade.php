<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>@yield('title') | PPID BKK Kelas I Pontianak</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="PPID, informasi publik, BKK Kelas I Pontianak" name="keywords">
    <meta content="Layanan e-PPID Balai Kekarantinaan Kesehatan Kelas I Pontianak" name="description">

    @include('includes.frontend.style')
    <style>
        .visitor-counter {
            position: fixed;
            bottom: 105px;
            right: 20px;
            z-index: 9999;
        }

        .counter-card {
            display: flex;
            align-items: center;
            gap: 10px;
            background: linear-gradient(135deg, #007C85, #0B2B27);
            color: white;
            padding: 12px 15px;
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.25);
            font-size: 12px;
            transition: 0.3s;
        }

        .counter-card:hover {
            transform: scale(1.05);
        }

        .counter-card i {
            font-size: 22px;
        }

        .label {
            font-size: 12px;
            opacity: 0.8;
        }
    </style>
</head>

<body>
    <div class="visitor-counter">
        <div class="counter-card">
            <i class="bi bi-people-fill"></i>
            <div>
                <div class="label">Pengunjung</div>
                <div>Total: {{ $totalVisitors }}</div>
                <div>Hari ini: {{ $todayVisitors }}</div>
            </div>
        </div>
    </div>

    <!-- Topbar Start -->
    @include('includes.frontend.topbar')
    <!-- Topbar End -->

    <!-- Navbar Start -->
    @include('includes.frontend.navbar')
    <!-- Navbar End -->

    <!-- Ikon Media Sosial yang akan terbang dari sebelah kanan -->
    <div class="social-media-icons">
        <a href="{{ config('ppid.social.facebook') }}" target="_blank" class="social-icon facebook btn-lg-square">
            <i class="fab fa-facebook-f"></i>
        </a>
        <a href="{{ config('ppid.social.twitter') }}" target="_blank" class="social-icon twitter btn-lg-square">
            <i class="fab fa-twitter"></i>
        </a>
        <a href="{{ config('ppid.social.instagram') }}" target="_blank" class="social-icon instagram btn-lg-square">
            <i class="fab fa-instagram"></i>
        </a>
        <a href="{{ config('ppid.social.tiktok') }}" target="_blank" class="social-icon tiktok btn-lg-square">
            <i class="fab fa-tiktok"></i>
        </a>
        <a href="{{ config('ppid.social.youtube') }}" target="_blank" class="social-icon youtube btn-lg-square">
            <i class="fab fa-youtube"></i>
        </a>
        <a href="{{ config('ppid.social.whatsapp') }}" target="_blank" class="social-icon whatsapp btn-lg-square">
            <i class="fab fa-whatsapp"></i>
        </a>
    </div>

    @yield('content')

    <!-- Footer Start -->
    @include('includes.frontend.footer')
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i
            class="bi bi-arrow-up"></i></a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @include('includes.frontend.script')
    @include('includes.frontend.script-footer', ['accessibility' => true])
</body>

</html>
