@extends('layouts.admin')
@section('content')

    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Rates</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Settings</li>
                </ol>
            </div>
            
        </div>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Rate</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">General</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="contact-tab" data-toggle="tab" data-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Unknown</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="row mt-5">
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <h4 class="card-title pb-3 pl-5">Add Rate</h4>
                            <!-- Tab panes -->
                            <div class="card-body">
                                <form class="form-horizontal form-material" action="" method="POST"> @csrf
                                    <div class="form-group">
                                        <label class="col-md-12">Rate Name</label>
                                        <div class="col-md-12">
                                            <input type="text" name="name" placeholder="Dollars" class="form-control form-control-line" required>
                                        </div>
                                    </div>
        
                                    <div class="form-group">
                                        <label class="col-md-12">Rate Location</label>
                                        <div class="col-md-12">
                                            <input type="text" name="symbol" placeholder="$" class="form-control form-control-line" required>
                                        </div>
                                    </div>
        
                                    <div class="form-group">
                                        <label class="col-md-12">Rate Code</label>
                                        <div class="col-md-12">
                                            <input type="text" name="code" placeholder="USD" class="form-control form-control-line" required>
                                        </div>
                                    </div>
        
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" name="action" value="create" class="btn btn-success">Add Rate</button>
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
                                                <th>Rate Name</th>
                                                <th>Symbol</th>
                                                <th>Rate Code</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($rates as $rate)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$rate->name}}</td>
                                                <td>{{$rate->symbol}}</td>
                                                <td>{{$rate->code}}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a data-toggle="modal" href="#exampleModal{{$rate->id}}" class="btn btn-info mr-2">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <form action="{{route('settings.Rates')}}" method="post" onsubmit="return confirm('Are you sure you want to delete Rate?')">@csrf
                                                            <input type="hidden" name="Rate_id" value="{{$rate->id}}">
                                                            <button type="submit" name="action" value="delete" class="btn btn-danger">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="exampleModal{{$rate->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel">Edit Rate</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form-horizontal form-material" action="{{route('settings.Rates')}}" method="POST"> @csrf
                                                            <input type="hidden" name="Rate_id" value="{{$rate->id}}">
                                                            <div class="form-group">
                                                                <label class="col-md-12">Rate Name</label>
                                                                <div class="col-md-12">
                                                                    <input type="text" name="name" value="{{$rate->name}}" placeholder="Dollars" class="form-control form-control-line" required>
                                                                </div>
                                                            </div>
                                
                                                            <div class="form-group">
                                                                <label class="col-md-12">Rate Symbol</label>
                                                                <div class="col-md-12">
                                                                    <input type="text" name="symbol" value="{{$rate->symbol}}" placeholder="$" class="form-control form-control-line" required>
                                                                </div>
                                                            </div>
                                
                                                            <div class="form-group">
                                                                <label class="col-md-12">Rate Code</label>
                                                                <div class="col-md-12">
                                                                    <input type="text" name="code" value="{{$rate->code}}" placeholder="USD" class="form-control form-control-line" required>
                                                                </div>
                                                            </div>
                                
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <button type="submit" name="action" value="update" class="btn btn-success">Update Rate</button>
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
                                                <td colspan="5">No Rate</td>
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
                <div class="row">
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <h4 class="card-title text-center mt-5 pb-4">Settings</h4>
                            <!-- Tab panes -->
                            <div class="card-body">
                                <form class="form-horizontal form-material" action="{{route('settings.counters')}}" method="POST"> @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-md-12">Number of Courses</label>
                                                <div class="col-md-12">
                                                    <input type="number" name="courses" value="" placeholder="" class="form-control form-control-line" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Number of Students</label>
                                                <div class="col-md-12">
                                                    <input type="number" name="students" value="" placeholder="" class="form-control form-control-line" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Number of Instructors</label>
                                                <div class="col-md-12">
                                                    <input type="number" name="teachers" value="" placeholder="" class="form-control form-control-line" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Number of Countries</label>
                                                <div class="col-md-12">
                                                    <input type="number" name="countries" value="" placeholder="" class="form-control form-control-line" required>
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
                </div>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                
            </div>
        </div>
        
        
    </div>

@endsection
@push('scripts')    
    
@endpush
