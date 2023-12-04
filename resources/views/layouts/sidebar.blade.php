<!-- Main Sidebar Container -->
<aside class="main-sidebar bg-white elevation-3" style="text-align: left;">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link" style="text-align: center; display: block;">
        <img src="{{ asset('img/Logo1.png') }}" alt="AdminLTE Logo" 
            style="opacity: .8; width: 150px;  margin: -50px ">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        @auth
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('img/user-photo-default.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('profile.show') }}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>
        @endauth

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                {{-- <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                <i class="nav-icon fa fa-dashboard"></i>
                <p>Dashboard</p>
                </a>
                </li> --}}
                @if (Auth::check() && Auth::user()->role == '0')
                {{-- Admin --}}
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="nav-icon fa fa-dashboard"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @endif

                @if (Auth::check() && Auth::user()->role == '1')
                {{-- Manajer --}}
                <li class="nav-item">
                    <a href="{{ route('manager.dashboard') }}" class="nav-link">
                        <i class="nav-icon fa fa-dashboard"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('manager.kategori')}}" class="nav-link">
                        <i class="nav-icon fa fa-book"></i>
                        <p>Kategori Menu</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('manager.menu')}}" class="nav-link">
                        <img src="{{ asset('img/Logo4.png') }}" alt="Daftar Menu" 
                            style="opacity: .7; width: 26px; margin-right: 4px;">
                            <p>Daftar Menu</p>
                    </a>
                </li>
                @endif
                @if (Auth::check() && Auth::user()->role == '2')
                {{-- Kasir --}}
                <li class="nav-item">
                    <a href="{{ route('kasir.dashboard') }}" class="nav-link">
                        <i class="nav-icon fa fa-dashboard"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                        <a href="{{ route('pesanan') }}" class="nav-link">
                            <i class="nav-icon fa fa-dashboard"></i>
                            <p>Pesanan</p>
                        </a>
                </li>
                @endif
                @if (Auth::check() && Auth::user()->role == '0')
                    {{-- Admin & Manajer --}}
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link">
                            <i class="nav-icon 	fa fa-users"></i>
                            <p>Managemen User</p>
                        </a>
                    </li>
                @endif
                @if (Auth::check() && Auth::user()->role == '1')
                    {{-- Admin & Manajer --}}
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon 	fa fa-users"></i>
                            <p>Managemen User</p>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="{{ route('about') }}" class="nav-link">
                        <i class="nav-icon fa fa-about"></i>
                        <p>About</p>
                    </a>
                </li>
                <li class="nav-item">
                    <form id="logout-form" action="{{ route('logout') }}" method="post">
                        @csrf
                    </form>
                    <a href="javascript:void(0)" class="nav-link" onclick="$('#logout-form').submit();">
                        <i class="nav-icon fa fa-sign-out"></i>
                        <p>Logout</p>
                    </a>
                </li>
                {{-- <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fa fa-dashboard"></i>
                        <p>
                            Dashboard
                            <i class="right fa fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Active Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Inactive Page</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-th"></i>
                        <p>
                            Simple Link
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li> --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>