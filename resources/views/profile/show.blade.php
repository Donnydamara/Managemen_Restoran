<!-- resources/views/layouts/master.blade.php -->

@extends('layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Your Profile</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-9">
                        <!-- Your Profile Content -->
                        <div class="row">
                            <div class="col-md-6">
                                @if ($user->photo_path)
                                    <img src="{{ asset('image/profil/' . $user->photo_path) }}" alt="Profile Photo"
                                        style="max-width: 200px;">
                                @else
                                    No photo available
                                @endif
                            </div>
                            <div class="col-md-6">
                                <p>Name: {{ Auth::user()->name }}</p>
                                <p>Email: {{ Auth::user()->email }}</p>
                                <p>Phone Number: {{ Auth::user()->no_hp }}</p>
                                <p>Date of Birth: {{ Auth::user()->tanggal_lahir }}</p>
                                <p>Place of Birth: {{ Auth::user()->tempat_lahir }}</p>
                                <p>Role:
                                    @if ($user->role == 0)
                                        Admin
                                    @elseif($user->role == 1)
                                        Manager
                                    @elseif($user->role == 2)
                                        Kasir
                                    @else
                                        Undefined Role
                                    @endif
                                </p>
                            </div>
                        </div>
                        <!-- End Your Profile Content -->

                        <!-- Edit Button -->
                        <div class="row mt-3">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
                            </div>
                        </div>
                        <!-- End Edit Button -->
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
