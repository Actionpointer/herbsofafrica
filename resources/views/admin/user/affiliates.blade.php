@extends('layouts.admin')
@push('styles')
<link rel="stylesheet" href="{{asset('plugins/datatables/datatables.min.css')}}">
@endpush
@section('content')

    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Affiliates</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Affiliates</li>
                </ol>
            </div>
            <div class="col-md-7 align-self-center">

            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- column -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Affiliates</h4>
                        {{-- <h6 class="card-subtitle">Add class <code>.table</code></h6> --}}
                        
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Customers</th>
                                    <th>Commission</th>
                                    
                                    @foreach($currencies as $currency)
                                    <td>{{$currency->name}}</td>
                                    @endforeach
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($affiliates as $affiliate)
                                <tr>
                                    <td>
                                        {{$affiliate->username}} <span class="d-block small">{{$affiliate->user->name}}</span>
                                    </td>
                                    <td>{{$affiliate->customers->count()}}</td>
                                    <td>{{$affiliate->percentage}}%</td>
                                    @foreach($currencies as $currency)
                                    <td>    {{$affiliate->payments->where('currency',$currency->code)->sum('amount')}}</td>
                                    @endforeach
                                    
                                    <td>
                                        <button type="button" data-toggle="modal" href="#exampleModal{{$affiliate->id}}" class="btn btn-primary">View</button>
                                        <button type="button" data-toggle="modal" href="#commission_percentage{{$affiliate->id}}" class="btn btn-dark">Update %</button>
                                    </td>
                                </tr>
                                @empty 
                                <tr>
                                    <td>
                                        No Affiliates Yet
                                    </td>
                                </tr>
                                @endforelse
                                

                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    @foreach ($affiliates as $affiliate)
    <div class="modal fade" id="exampleModal{{$affiliate->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Affiliate Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <td> <strong>Name:</strong> </td>
                            <td>{{$affiliate->name}}</td>
                            <td><strong>Email:</strong> </td>
                            <td>{{$affiliate->email}}</td>
                        </tr>
                        
                        <tr>
                            <td><strong>Phone:</strong></td>
                            <td>{{$affiliate->phone}}</td>
                            <td><strong>Status:</strong></td>
                            <td>@if($affiliate->status) Active @else Suspended @endif
                                <form action="{{route('admin.users.manage')}}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure')">@csrf
                                    <input type="hidden" name="user_id" value="{{$affiliate->id}}">
                                    @if($affiliate->status)
                                    <input type="hidden" name="status" value="0">
                                    <button type="submit" class="btn btn-warning btn-sm">Suspend User</button>
                                    @else 
                                    <input type="hidden" name="status" value="1">
                                    <button type="submit" class="btn btn-primary btn-sm">Activate User</button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                        
                        <tr>
                            <td colspan="4" class="font-weight-bold">Settlements</td>
                        </tr>
                        <tr>
                            <td>Date</td>
                            <td>Amount</td>
                            <td>Status</td>
                            <td>Action</td>
                        </tr>
                        @foreach ($affiliate->settlements as $settlement)
                            <tr>
                                <td>{{$settlement->created_at->format('d M,Y')}}</td>
                                <td> {{$currencies->firstWhere('code',$settlement->currency)->symbol}}{{$settlement->amount}}</td>
                                <td>{{ucwords($settlement->status)}}</td>
                                <td>
                                    
                                    <a href="{{route('admin.orders.read',$settlement->order)}}" class="btn btn-primary">View Payment Details</a>
                                </td>
                            </tr> 
                        @endforeach
                    
                    </tbody>
                </table>

            </div>
           
          </div>
        </div>
    </div>
    @endforeach
    @foreach ($affiliates as $affiliate)
    <div class="modal fade" id="commission_percentage{{$affiliate->id}}" tabindex="-1" aria-labelledby="commission_percentageLabel{{$affiliate->id}}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Affiliate Percentage</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.users.affiliates')}}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure')">@csrf
                    <input type="hidden" name="affiliate_id" value="{{$affiliate->id}}">
                    
                    <div class="d-flex">
                        <input type="number" name="percentage" class="form-control" value="{{$affiliate->percentage}}">
                    
                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                    </div>
                    
                    
                </form>
            </div>
           
          </div>
        </div>
    </div>
    @endforeach
@endsection

@push('scripts')
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables/datatables.min.js')}}"></script>
    <script>
        if ($('.datatable').length > 0) {
            $('.datatable').DataTable({
                "bFilter": true,
            });
        }
    </script>
@endpush
