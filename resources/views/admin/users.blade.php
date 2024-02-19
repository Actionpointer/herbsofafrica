@extends('layouts.admin')
@section('content')
    
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Users</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Users</li>
                </ol>
            </div>
            
        </div>
        
        <div class="row">
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card">
                    <h4 class="card-title text-center pt-3">Add User</h4>
                    <div class="card-body">
                        <form class="form-horizontal form-material" method="POST" action="{{route('admins')}}">@csrf                         
                            <div class="form-group">
                                <label class="col-md-12">Full Name</label>
                                <div class="col-md-12">
                                    <input type="text" id="name" name="name" placeholder="Enter Full Name" class="form-control form-control-line" required>
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Email</label>
                                <div class="col-md-12">
                                    <input type="email" id="email" name="email" placeholder="Enter Email" class="form-control form-control-line" required>
                                    @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Password</label>
                                <div class="col-md-12">
                                    <input type="text" id="password" name="password" placeholder="Enter Password" class="form-control form-control-line" required>
                                    @error('password')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" name="action" value="create" id="btn-save" class="btn btn-success">Add User</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>            
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $user)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a data-toggle="modal" href="#exampleModal{{$user->id}}" class="btn btn-info mr-2">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <form action="{{route('admins')}}" method="post" onsubmit="return confirm('Are you sure you want to delete User?')">@csrf
                                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                                    <button type="submit" name="action" value="delete" class="btn btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal form-material" method="POST" action="{{route('admins')}}">@csrf
                                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                                    <div class="form-group">
                                                        <label class="col-md-12">Full Name</label>
                                                        <div class="col-md-12">
                                                            <input type="text" name="name" value="{{$user->name}}" placeholder="Enter Full Name" class="form-control form-control-line" required>
                                                            
                                                        </div>
                                                    </div>
                        
                                                
                                                    <div class="form-group">
                                                        <label class="col-md-12">Email</label>
                                                        <div class="col-md-12">
                                                            <input type="email" name="email" value="{{$user->email}}" placeholder="Enter Email" class="form-control form-control-line" required>
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <button type="submit" name="action" value="update" id="btn-save" class="btn btn-success">Update User</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No Admin</td>
                                    </tr>
                                    @endforelse
                                    
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
        
@endsection
@push('scripts')
<script>
    
</script>
@endpush
        
