<!-- Main Sidebar Container -->
<aside class="main-sidebar bg-white elevation-3" style="text-align: left;">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link" style="text-align: center; display: block;">
        <img src="{{ asset('img/Logo1.png') }}" alt="AdminLTE Logo" class="img-fluid"
            style="opacity: .8; max-width: 150px; margin: -50px ">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        @auth
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('image/profil/' . Auth::user()->photo_path) }}" alt="User Image"
                        class="rounded-circle profile-image";>
                </div>
                <div class="info">
                    <a href="{{ route('profile.show') }}" class="d-block">{{ Auth::user()->name }}</a>
                </div>
            </div>
        @endauth

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @if (Auth::check() && Auth::user()->role == '0')
                    <!-- Admin -->
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link">
                            <img class="nav-icon" src="{{ asset('img/dashboard.png') }}" alt="Logo">
                            <p>Dashboard</p>
                        </a>
                    </li>
                @endif

                @if (Auth::check() && Auth::user()->role == '1')
                    <!-- Manajer -->
                    <li class="nav-item">
                        <a href="{{ route('manager.dashboard') }}" class="nav-link">
                            <img class="nav-icon" src="{{ asset('img/dashboard.png') }}" alt="Logo">
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('manager.kategori') }}" class="nav-link">
                            <img class="nav-icon" src="{{ asset('img/cookbook.png') }}" alt="Logo">
                            <p>Kategori Menu</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('manager.menu') }}" class="nav-link">
                            <img class="nav-icon" src="{{ asset('img/menu (1).png') }}" alt="Logo">
                            <p>Daftar Menu</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('manager.omsetrestoran') }}" class="nav-link">
                            <img class="nav-icon" src="{{ asset('img/index.png') }}" alt="Logo">
                            <p>Omset Restoran</p>
                        </a>
                    </li>
                @endif

                @if (Auth::check() && Auth::user()->role == '2')
                    <!-- Kasir -->
                    <li class="nav-item">
                        <a href="{{ route('kasir.dashboard') }}" class="nav-link">
                            <img class="nav-icon" src="{{ asset('img/dashboard.png') }}" alt="Logo">
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pesanan') }}" class="nav-link">
                            <img class="nav-icon" src="{{ asset('img/menu (2).png') }}" alt="Logo">
                            <p>Pesanan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('transaksi.riwayattransaksi') }}" class="nav-link">
                            <img class="nav-icon" src="{{ asset('img/history.png') }}" alt="Logo">
                            <p>Riwayat Transaksi</p>
                        </a>
                    </li>
                @endif

                @if (Auth::check() && Auth::user()->role == '0')
                    <!-- Admin & Manajer -->
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link">
                            <img class="nav-icon" src="{{ asset('img/profile.png') }}" alt="Logo">
                            <p>Managemen User</p>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <hr class="solid" style="border-top: 1px solid #b1a9a9;">
                </li>
                @if (Auth::check() && Auth::user()->role == '1')
                    <!-- Admin & Manajer -->
                    <li class="nav-item">
                        <a href="{{ route('userkasir.index') }}" class="nav-link">
                            <img class="nav-icon" src="{{ asset('img/profile.png') }}" alt="Logo">
                            <p>Managemen User</p>
                        </a>
                    </li>
                @endif

                <li class="nav-item">
                    <a href="{{ route('about') }}" class="nav-link">
                        <img class="nav-icon" src="{{ asset('img/about.png') }}" alt="Logo">
                        <p>About</p>
                    </a>
                </li>
                <li class="nav-item">
                    <hr class="solid" style="border-top: 1px solid #b1a9a9;">
                </li>
                <li class="nav-item">
                    <form id="logout-form" action="{{ route('logout') }}" method="post">
                        @csrf
                    </form>
                    <a href="javascript:void(0)" class="nav-link" onclick="$('#logout-form').submit();">
                        <img class="nav-icon" src="{{ asset('img/logout.png') }}" alt="Logo">
                        <p>Logout</p>
                    </a>
                </li>

            </ul>

        </nav>

        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

    <style>
        .user-panel {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .user-panel .image img {

            width: 40px;
            height: 40px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #fff;
            margin-left: -10px;
        }

        .user-panel .info a {
            color: #007bff;
            font-weight: bold;
            text-decoration: none;
            font-size: 16px;
        }

        .user-panel .info a:hover {
            text-decoration: underline;
        }

        /* Desktop styles */
        .brand-link img {
            opacity: .8;
            width: 150px;
            margin: -50px;
        }

        /* Tablet styles */
        @media (max-width: 768px) {
            .brand-link img {
                width: 120px;
                margin: -40px;
            }
        }

        /* Mobile styles */
        @media (max-width: 480px) {
            .brand-link img {
                width: 100px;
                margin: -30px;
            }
        }

        /* Custom styling for nav items */
        .nav-item {
            transition: background-color 0.3s;

        }

        .nav-item:hover {
            background-color: #b0bbc7;
        }

        .nav-link {
            color: #333;
        }

        .nav-icon {
            width: 20px;
            height: auto;
            margin-right: 10px;
        }

        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            background-color: #b0bbc7;
            color: #fff;
        }

        .nav-pills .nav-link {
            border-radius: 5px;
        }

        .nav-pills .nav-link:hover {
            background-color: #b0bbc7;
        }
    </style>
</aside>
