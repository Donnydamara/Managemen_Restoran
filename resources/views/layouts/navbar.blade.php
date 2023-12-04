<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('dashboard')}}" class="nav-link">RESTO</a>
        </li>
    </ul>

    {{-- <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </form> --}}

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" href="#" role="button" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('img/user3.png') }}" alt="AdminLTE Logo" 
                        style="width: 28px;  margin-right: 8px;  ">
                    <span >Hi, {{ Auth::user()->name }}</span>
                </div>
            </a>
            <div class="dropdown-menu" aria-labelledby="userDropdown" class="d-flex">
                <a href="javascript:void(0)" class="nav-link" onclick="$('#logout-form').submit();" style="color: red;">
                    <i class="nav-icon fa fa-sign-out mr-2" style="color: red;"></i>
                    Logout
                </a>
            </div>
        </li>
    </ul>
    
    
    
</nav>
    
    
    
    
<!-- /.navbar -->