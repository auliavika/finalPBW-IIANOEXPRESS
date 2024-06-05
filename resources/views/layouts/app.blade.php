<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'IIANO EXPRESS') }}</title>

  <link rel="dns-prefetch" href="//fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">

  @vite(['resources/sass/app.scss', 'resources/js/app.js'])

  <style>
    body {
      background: linear-gradient(to right, #9D9D9A, #C4C4C4); /* Gradient background */
      margin: 0; /* Reset default margin */
      padding: 0; /* Reset default padding */
    }

    .navbar { /* Tetap mempertahankan style navbar sebelumnya */
      background-image: linear-gradient(to right, #5A9177, #2F5241);
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      transition: background-color 0.3s ease-in-out;
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 100;
    }

    .navbar .navbar-brand {
      font-weight: bold;
      color: #fff;
     
     
      transition: color 0.3s ease-in-out;
    }

    .navbar .navbar-brand:hover {
      color: #000;
    }

    .navbar-nav .nav-link {
      color: #fff;
      transition: color 0.3s ease-in-out;
      margin-left: 35px; /* Jarak antar tombol */
      padding: 8px 16px;
      border-radius: 4px; /* Membuat tombol sedikit melengkung */
      white-space: nowrap;
    }

    .navbar-nav .nav-link:hover {
      color: #000;
      background-color: rgba(255, 255, 255, 0.2); /* Mengubah warna latar belakang saat dihover */
    }

   .navbar-nav {
    display: flex;
    justify-content: flex-end; /* Mengatur jarak antara elemen di kiri dan kanan */
    width: 100%;
    }

    .navbar-nav.me-auto {
  margin-left: 450px; /* Menggeser elemen ke kanan sejauh mungkin */
  padding-left: 1rem; /* Menambahkan padding di sisi kiri */
}

.navbar-nav.ms-auto{
    margin-left: 25px; /* Menggeser elemen ke kanan sejauh mungkin */
  padding-left: 1rem;
}


    .dropdown-menu {
      background-color: #fff;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      animation: dropdown-show 0.3s ease-in-out;
    }

    @keyframes dropdown-show {
      from {
        opacity: 0;
        transform: translateY(-10px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
            <a class="navbar-brand" href="{{ Auth::check() && Auth::user()->type == 'admin' ? route('admin.home') : route('home') }}">
                <img src="{{ asset('storage/image/logo.png') }}" alt="IIANO EXPRESS" style="height: 30px;">
            </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">
                        @auth
                            @if (Auth::user()->type == 'admin')
                                <!-- Admin Links -->
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.home') }}">Beranda Admin</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.schedules.index') }}">Kelola Jadwal</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.tickets.pending') }}">Konfirmasi Tiket</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.buses.index') }}">Kelola Bus</a>
                                </li>
                            @else
                                <!-- User Links -->
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('home') }}">Beranda</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('tickets.index') }}">Tiket Saya</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('tickets.history') }}">Riwayat Pemesanan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('profile.show') }}">Profil</a>
                                </li>
                            @endif
                        @endauth
                    </ul>

                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link btn btn-outline-light me-2" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link btn btn-light" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown me-8">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>