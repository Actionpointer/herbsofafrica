@extends('layouts.admin')
@section('content')
 
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Profile</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div>
            {{-- <div class="col-md-7 align-self-center">
                <a href="https://wrappixel.com/templates/adminwrap/" class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down"> Upgrade to Pro</a>
            </div> --}}
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <center class="m-t-30"> <img src="https://ui-avatars.com/api/?name={{str_replace(' ','+',$user->name)}}" class="img-circle" width="150" />
                            <h4 class="card-title m-t-10">{{$user->name}}</h4>
                            <h6 class="card-subtitle">{{$user->email}}</h6>
                            <div class="text-center">
                                Permissions: <br>
                                @foreach ($user->role as $role)
                                    {{ucwords($role)}}, 
                                @endforeach
                            </div>
                        </center>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <!-- Tab panes -->
                    <div class="card-body">
                        <form method="POST" action="{{route('admin.profile.update')}}" class="form-horizontal form-material">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-12">First Name</label>
                                        <div class="col-md-12">
                                            <input type="text" name="first_name" value="{{$user->first_name}}" class="form-control form-control-line" required>
                                            @error('first_name') <span class="error d-block" style="color: red;">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-12">Last Name</label>
                                        <div class="col-md-12">
                                            <input type="text" name="last_name" value="{{$user->last_name}}" class="form-control form-control-line" required>
                                            @error('last_name') <span class="error d-block" style="color: red;">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Email</label>
                                <div class="col-md-12">
                                    <input type="text" name="email" value="{{$user->email}}" class="form-control form-control-line" required>
                                    @error('email') <span class="error d-block" style="color: red;">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Current Password (leave blank to leave unchanged)</label>
                                <div class="col-md-12">
                                    <input type="text" name="current_password" class="form-control form-control-line">
                                    @error('current_password') <span class="error d-block" style="color: red;">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="example-email" class="col-md-12">New Password (leave blank to leave unchanged)</label>
                                <div class="col-md-12">
                                    <input type="password" name="password" class="form-control form-control-line">
                                    @error('password') <span class="error d-block" style="color: red;">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Repeat Password</label>
                                <div class="col-md-12">
                                    <input type="password" name="password_confirmation" class="form-control form-control-line">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success">Update Profile</button>
                                </div>
                            </div>
                        </form>
                        @if(Session::has('flash_message'))
                            <br>
                            <div class="alert alert-success">
                                {{ Session::get('flash_message') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- Row -->
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
@endsection
