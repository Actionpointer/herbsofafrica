@extends('layouts.admin')
@push('styles')
<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
<style>
    .select2-container--default .select2-selection--single{

    }
    .select2-container .select2-selection--single{
        height: 38px;
        border:none;
        border-bottom: 1px solid #eee;
    }
    /* .custom-control-input{
        z-index: 2000;
        opacity: 1;
    } */
    /* [type="radio"] + label:before, [type="radio"] + label:after {
        z-index: 2000 !important;
    } */
</style>
@endpush
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
                        <form class="form-horizontal form-material" method="POST" action="{{route('admin.users.manage')}}">@csrf                         
                            <div class="form-group">
                                <label class="col-md-12">First Name</label>
                                <div class="col-md-12">
                                    <input type="text" id="first_name" name="first_name" placeholder="" class="form-control form-control-line" required>
                                    @error('first_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Last Name</label>
                                <div class="col-md-12">
                                    <input type="text" id="last_name" name="last_name" placeholder="" class="form-control form-control-line" required>
                                    @error('last_name')
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
                                <label class="col-md-12">Permissions</label>
                                <div class="col-md-12">
                                    <select id="permission" class="form-control form-control-line select2" multiple name="permissions[]">
                                        @foreach ($permissions as $permission)
                                            <option value="{{$permission}}">{{ucwords($permission)}}</option>
                                        @endforeach
                                    </select>
                                    
                                    
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
                                        <th>Permissions</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($staffs as $staff)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$staff->name}}  <i class="fa fa-circle @if($staff->status) text-success @else text-danger @endif"></i> </td>
                                        <td>{{$staff->email}}</td>
                                        <td>{{count($staff->role)}}</td>
                                        <td>
                                            @if($staff->id != auth()->id())
                                            <div class="d-flex">
                                                <a data-toggle="modal" href="#exampleModal{{$staff->id}}" class="btn btn-info mr-2">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <form action="{{route('admin.users.manage')}}" method="post" onsubmit="return confirm('Are you sure you want to delete User?')">@csrf
                                                    <input type="hidden" name="user_id" value="{{$staff->id}}">
                                                    <button type="submit" name="action" value="delete" class="btn btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            @endif
                                        </td>
                                    </tr>
                                    
                                    
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
    @foreach ($staffs as $staff)
    <div class="modal fade" id="exampleModal{{$staff->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <td> <strong>Name:</strong> </td>
                            <td>{{$staff->name}} </td>
                            <td><strong>Email:</strong> </td>
                            <td>{{$staff->email}}</td>
                        </tr>
                        
                        <tr>
                            <td><strong>Phone:</strong></td>
                            <td>{{$staff->phone}}</td>
                            <td><strong>Status:</strong></td>
                            <td>@if($staff->status) Active @else Suspended @endif </td>
                        </tr>
                    </tbody>
                </table>
                <form action="{{route('admin.users.manage')}}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure')">@csrf
                    <input type="hidden" name="user_id" value="{{$staff->id}}">
                    <div class="form-group">
                        <label class="col-md-12">Permissions</label>
                        <div class="col-md-12">
                            <select id="permissions{{$staff->id}}" class="form-control form-control-line select2 w-100" multiple name="permissions[]">
                                @foreach ($permissions as $permission)
                                    <option value="{{$permission}}" @if(in_array($permission,$staff->role)) selected @endif>{{ucwords($permission)}}</option>
                                @endforeach
                            </select>   
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-3 mt-2 ml-3">Change Status</label>
                        <div class="col-md-4">
                            <select name="status" class="form-control">
                                <option value="1" @if($staff->status) selected @endif>Active</option>
                                <option value="0" @if(!$staff->status) selected @endif>Suspended</option>
                            </select>
                        
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary">Update</button>
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
    @endforeach  
@endsection
@push('scripts')
<script src="{{asset('plugins/select2/js/select2.min.js')}}"></script>
<script>
    $('.select2').select2({
        placeholder:"Select ",
        width:'100%'
    });
    
</script>
@endpush
        
