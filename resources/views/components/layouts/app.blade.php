<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title> {{ $title ?? config('app.name') }}</title>
    <!-- CSS files -->
    <link href="{{ asset('css/tabler.min.css?1684106062') }}" rel="stylesheet" />
    <link href="{{ asset('css/tabler-flags.min.css?1684106062') }}" rel="stylesheet" />
    <link href="{{ asset('css/tabler-payments.min.css?1684106062') }}" rel="stylesheet" />
    <link href="{{ asset('css/tabler-vendors.min.css?1684106062') }}" rel="stylesheet" />
    <link href="{{ asset('css/demo.min.css?1684106062') }}" rel="stylesheet" />


    <style>
        @import url('css/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }

        .loading-container {
    position: fixed;
    top: 50%; /* Menempatkan container di tengah vertikal */
    left: 50%; /* Menempatkan container di tengah horizontal */
    transform: translate(-50%, -50%); /* Menyesuaikan posisi container agar berada di tengah */
    display: flex; /* Menggunakan flexbox untuk menyusun elemen secara berdampingan */
    align-items: center; /* Mengatur vertikal alignment ke center */
}

.loading-text {
    margin-right: 10px; /* Memberikan jarak antara teks dan spinner */
}

.loading-spinner {
    border: 4px solid rgba(0, 0, 0, 0.1);
    border-left-color: #011902;
    border-radius: 50%;
    width: 27px;
    height: 27px;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Media query untuk perangkat seluler dengan lebar maksimum 768px */
@media (max-width: 768px) {
    .loading-spinner {
        width: 20px; /* Ubah ukuran indikator loading untuk layar seluler */
        height: 20px; /* Ubah ukuran indikator loading untuk layar seluler */
    }
}

    </style>
</head>

<body>
    <script src="{{ asset('/js/demo-theme.min.js?1684106062') }}"></script>
    <div class="page">
        <!-- Sidebar -->
        <aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="dark">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu"
                    aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark">
                    <a href=".">
                        <img src="{{ asset('static/logo.svg') }}" width="110" height="32" alt="Tabler"
                            class="navbar-brand-image">
                    </a>
                </h1>
                <div class="collapse navbar-collapse" id="sidebar-menu">
                    <ul class="navbar-nav pt-lg-3">
                        <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                            <a class="nav-link" href="/">
                                <span
                                    class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                        <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Home
                                </span>
                            </a>
                        </li>
                        <li
                            class="nav-item dropdown {{ request()->is('klasifikasi') ? 'active' : '' }} {{ request()->is('arsip') ? 'active' : '' }}">
                            <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                                data-bs-auto-close="false" role="button" aria-expanded="false">
                                <span
                                    class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-archive">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                                        <path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-10" />
                                        <path d="M10 12l4 0" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Arsip
                                </span>
                            </a>
                            <div class="dropdown-menu show">
                                <div class="dropdown-menu-columns">
                                    <div class="dropdown-menu-column">
                                        <a class="dropdown-item {{ request()->is('klasifikasi') ? 'active' : '' }}"
                                            href="./klasifikasi">
                                            Kategori
                                        </a>
                                        <a class="dropdown-item {{ request()->is('jenis') ? 'active' : '' }}"
                                            href="./jenis">
                                            Jenis
                                        </a>
                                        <a class="dropdown-item {{ request()->is('arsip') ? 'active' : '' }}"
                                            href="./arsip">
                                            Arsip
                                        </a>

                                        <a class="dropdown-item {{ request()->is('integrated.npd-dinas') ? 'active' : '' }}"
                                            href="/integrated/npd-dinas">
                                            Arsip NPD Dinas
                                        </a>

                                        <a class="dropdown-item {{ request()->is('integrated.npd-dprd') ? 'active' : '' }}"
                                            href="/integrated/npd-dprd">
                                            Arsip NPD Dprd
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item {{ request()->is('pengaturan') ? 'active' : '' }}">
                            <a class="nav-link" href="./pengaturan">
                                <span
                                    class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-settings">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                                        <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Pengaturan
                                </span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->is('pengguna') ? 'active' : '' }}">
                            <a class="nav-link" href="./pengguna">
                                <span
                                    class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-users">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                        <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    User / Pengguna
                                </span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->is('bantuan') ? 'active' : '' }}">
                            <a class="nav-link" href="./bantuan">
                                <span
                                    class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-help-square-rounded">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z" />
                                        <path d="M12 16v.01" />
                                        <path d="M12 13a2 2 0 0 0 .914 -3.782a1.98 1.98 0 0 0 -2.414 .483" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Bantuan / Dukungan
                                </span>
                            </a>
                        </li>

                        <li class="nav-item {{ request()->is('log') ? 'active' : '' }}">
                            <a class="nav-link" href="./log" wire:navigate>
                                <span
                                    class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M9 11l3 3l8 -8" />
                                        <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Log
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>
        {{-- page --}}

        {{ $slot }}

        <!-- Libs JS -->
        <script src="{{ asset('libs/apexcharts/dist/apexcharts.min.js?1684106062') }}" defer></script>
        <script src="{{ asset('libs/jsvectormap/dist/js/jsvectormap.min.js?1684106062') }}" defer></script>
        <script src="{{ asset('libs/jsvectormap/dist/maps/world.js?1684106062') }}" defer></script>
        <script src="{{ asset('libs/jsvectormap/dist/maps/world-merc.js?1684106062') }}" defer></script>
        <!-- Tabler Core -->
        <script src="{{ asset('js/tabler.min.js?1684106062') }}" defer></script>
        <script src="{{ asset('js/demo.min.js?1684106062') }}" defer></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <x-livewire-alert::scripts />
        <script>
              $('#KelasModal').on('show.bs.modal', function(event) {
                    $('#kategori').val('');
               });

              $('#JenisModal').on('show.bs.modal', function(event) {
                    $('#jenis').val('');
               });
        </script>
</body>

</html>
