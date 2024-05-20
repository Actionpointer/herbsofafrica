@extends('layouts.admin')
@push('styles')
<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
<style>
    .select2-container .select2-selection--single{
        height: 38px;
        border:none;
        border-bottom: 1px solid #eee;
    }
</style>
@endpush
@section('content')

    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Settings</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Settings</li>
                </ol>
            </div>
            
        </div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Currency</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">General</button>
            </li>
            <!-- <li class="nav-item" role="presentation">
              <button class="nav-link" id="contact-tab" data-toggle="tab" data-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Unknown</button>
            </li> -->
          </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="row mt-5">
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <h4 class="card-title p-4">Add Currency</h4>
                            <!-- Tab panes -->
                            <div class="card-body">
                                <form class="form-horizontal form-material" action="{{route('admin.settings.currencies')}}" method="POST"> @csrf
                                    <div class="form-group">
                                        <label class="col-md-12">Currency Name</label>
                                        <div class="col-md-12">
                                            <input type="text" name="name" placeholder="Dollars" class="form-control form-control-line" required>
                                        </div>
                                    </div>
        
                                    <div class="form-group">
                                        <label class="col-md-12">Currency Symbol</label>
                                        <div class="col-md-12">
                                            <input type="text" name="symbol" placeholder="$" class="form-control form-control-line" required>
                                        </div>
                                    </div>
        
                                    <div class="form-group">
                                        <label class="col-md-12">Currency Code</label>
                                        <div class="col-md-12">
                                            <input type="text" name="code" placeholder="USD" class="form-control form-control-line" required>
                                        </div>
                                    </div>
        
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" name="action" value="create" class="btn btn-success">Add Currency</button>
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
                                                <th>Currency Name</th>
                                                <th>Symbol</th>
                                                <th>Currency Code</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($currencies as $currency)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$currency->name}}</td>
                                                <td>{{$currency->symbol}}</td>
                                                <td>{{$currency->code}}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a data-toggle="modal" href="#exampleModal{{$currency->id}}" class="btn btn-info mr-2">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <form action="{{route('admin.settings.currencies')}}" method="post" onsubmit="return confirm('Are you sure you want to delete Currency?')">@csrf
                                                            <input type="hidden" name="currency_id" value="{{$currency->id}}">
                                                            <button type="submit" name="action" value="delete" class="btn btn-danger">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="exampleModal{{$currency->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel">Edit Currency</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form-horizontal form-material" action="{{route('admin.settings.currencies')}}" method="POST"> @csrf
                                                            <input type="hidden" name="currency_id" value="{{$currency->id}}">
                                                            <div class="form-group">
                                                                <label class="col-md-12">Currency Name</label>
                                                                <div class="col-md-12">
                                                                    <input type="text" name="name" value="{{$currency->name}}" placeholder="Dollars" class="form-control form-control-line" required>
                                                                </div>
                                                            </div>
                                
                                                            <div class="form-group">
                                                                <label class="col-md-12">Currency Symbol</label>
                                                                <div class="col-md-12">
                                                                    <input type="text" name="symbol" value="{{$currency->symbol}}" placeholder="$" class="form-control form-control-line" required>
                                                                </div>
                                                            </div>
                                
                                                            <div class="form-group">
                                                                <label class="col-md-12">Currency Code</label>
                                                                <div class="col-md-12">
                                                                    <input type="text" name="code" value="{{$currency->code}}" placeholder="USD" class="form-control form-control-line" required>
                                                                </div>
                                                            </div>
                                
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <button type="submit" name="action" value="update" class="btn btn-success">Update Currency</button>
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
                                                <td colspan="5">No Currency</td>
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
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="card">
                    <h4 class="card-title p-4">Settings</h4>
                    <div class="card-body">
                        <form class="form-horizontal form-material" action="{{route('admin.settings.update')}}" method="POST"> @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-12">Super Admin</label>
                                        <div class="col-md-12">
                                            <select class="form-control form-control-line select2" name="superadmin" required>
                                                @foreach ($staffs as $staff)
                                                    <option value="{{$staff->email}}" @if($settings->firstWhere('name','superadmin')->value == $staff->email) selected @endif>{{$staff->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="col-md-12">Affiliate Percentage</label>
                                        <div class="col-md-12">
                                            <input type="number" name="affiliate_percentage" value="{{$settings->firstWhere('name','affiliate_percentage')->value}}" placeholder="" class="form-control form-control-line" required>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="col-md-12">Affiliate Payout Type</label>
                                        <div class="col-md-12">
                                        <select class="form-control form-control-line select2" name="automatic_payout" required>
                                                <option value="1" @if($settings->firstWhere('name','automatic_payout')->value) selected @endif >Automatic</option>
                                                <option value="0" @if(!$settings->firstWhere('name','automatic_payout')->value) selected @endif>Manual</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                            </div>
                            

                            

                            

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" name="action" value="create" class="btn btn-success">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                
            </div>
        </div>
        
        
    </div>

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
