<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark navbar-light border-bottom" style="background: linear-gradient(to right, #1f69c1, #4d2db5);">

    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('dashboard') }}" class="nav-link" style="font-weight: bold; font-size: 18px; color: #fff;">RESTO</a>
        </li>
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <!-- User Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('image/profil/' . Auth::user()->photo_path) }}" alt="User Image" class="rounded-circle profile-image" style="max-width: 35px; max-height: 35px; ">
                    <span style="color: #fff; margin-bottom: 15px; margin-left:10px;">Hi, {{ Auth::user()->name }}</span>
                </div>

            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <!-- Profile Info -->
                <div class="image d-flex flex-column justify-content-center align-items-center profile-info">
                    <img src="{{ asset('image/profil/' . Auth::user()->photo_path) }}" alt="User Image" class="rounded-circle profile-image">
                    <span class="profile-name">{{ Auth::user()->name }}</span>
                    <span class="profile-email">{{ Auth::user()->email }}</span>

                    <!-- User Role Badge -->
                    <div class="role-badge bg-primary text-white">
                        @if (Auth::user()->role == 0)
                        Admin
                        @elseif(Auth::user()->role == 1)
                        Manager
                        @elseif(Auth::user()->role == 2)
                        Kasir
                        @else
                        Unknown Role
                        @endif
                    </div>

                    <div class="profile-actions">
                        <a href="{{ route('profile.show') }}" class="dropdown-item profile-link">
                            <i class="nav-icon fa fa-user"></i> Profile
                        </a>
                        <a href="javascript:void(0)" class="dropdown-item logout-btn" onclick="$('#logout-form').submit();">
                            <i class="nav-icon fa fa-sign-out" style="color: red;"></i> Logout
                        </a>
                    </div>


                </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<style>
    .dropdown-menu {
        border: none;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
    }

    .profile-info {
        text-align: center;
        padding: 20px;
    }

    .profile-image {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 10px;
    }

    .profile-name {
        font-size: 18px;
        font-weight: bold;
        color: #333;
    }

    .profile-email {
        color: #777;
    }

    .role-badge {
        padding: 8px 12px;
        border-radius: 5px;
        font-size: 14px;
        font-weight: bold;
        margin-top: 10px;
    }

    .profile-actions {
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin-top: 20px;
    }

    .profile-link,
    .logout-btn {
        display: flex;
        align-items: center;
        text-decoration: none;
        color: #333;
    }

    .nav-icon {
        margin-right: 10px;
    }

    .logout-btn {
        color: red;
    }

    .logout-btn:hover {
        background-color: #f8d7da;
    }

    /* Additional CSS Styles for Enhancement */
    .navbar {
        padding: 0.5rem 1rem;
    }

    .navbar-brand {
        font-size: 1.5rem;
    }

    .navbar-nav .nav-link {
        color: #fff;
        font-weight: bold;
        font-size: 16px;
        margin-right: 15px;
    }

    .navbar-nav .nav-item.dropdown:hover .dropdown-menu {
        display: block;
    }

    .dropdown-item {
        color: #333;
    }

    .profile-info {
        font-size: 14px;
    }

    .profile-link,
    .logout-btn {
        display: flex;
        align-items: center;
        color: #333;
        text-decoration: none;
    }

    .profile-link i,
    .logout-btn i {
        margin-right: 8px;
    }

    .logout-btn {
        color: red;
    }

    .logout-btn:hover {
        background-color: #f8d7da;
    }
</style>