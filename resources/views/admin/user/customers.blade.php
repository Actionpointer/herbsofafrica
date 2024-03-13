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
                <h3 class="text-themecolor">Customers</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Customers</li>
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
                        <h4 class="card-title">Customers</h4>
                        {{-- <h6 class="card-subtitle">Add class <code>.table</code></h6> --}}
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Referred By</th>
                                        <th>Orders</th>
                                        @foreach($currencies as $currency)
                                        <th>{{$currency->name}}</th>
                                        @endforeach
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($customers as $customer)
                                    <tr>
                                        <td>{{$customer->name}}</td>
                                        <td>{{$customer->referrer->username}}</td>
                                        <td>{{$customer->orders->count()}}</td>
                                        @foreach($currencies as $currency)
                                        <td>    {{$customer->orders->where('currency',$currency->code)->sum('total')}}</td>
                                        @endforeach
                                        
                                        <td>
                                            <button type="button" data-toggle="modal" href="#exampleModal{{$customer->id}}" class="btn btn-primary">View</button>
                                        </td>
                                    </tr>
                                    
                                    @empty 
                                    <tr>
                                        <td>
                                            No Customers Yet
                                        </td>
                                    </tr>
                                    @endforelse
                                    

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    @foreach ($customers as $customer)
    <div class="modal fade" id="exampleModal{{$customer->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Payment Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <td> <strong>Name:</strong> </td>
                            <td>{{$customer->name}}</td>
                            <td><strong>Email:</strong> </td>
                            <td>{{$customer->email}}</td>
                        </tr>
                        
                        <tr>
                            <td><strong>Phone:</strong></td>
                            <td>{{$customer->phone}}</td>
                            <td><strong>Status:</strong></td>
                            <td>@if($customer->status) Active @else Suspended @endif
                                <form action="{{route('admin.users.manage')}}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure')">@csrf
                                    <input type="hidden" name="user_id" value="{{$customer->id}}">
                                    @if($customer->status)
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
                            <td colspan="4" class="font-weight-bold">Orders</td>
                        </tr>
                        <tr>
                            <td>Date</td>
                            <td>Items</td>
                            <td>Amount</td>
                            <td>Action</td>
                        </tr>
                        @foreach ($customer->orders as $order)
                            <tr>
                                <td>{{$order->created_at->format('d M,Y')}}</td>
                                <td>{{$order->items->count()}}</td>
                                <td>{{$order->currency}}{{$order->total}}</td>
                                <td>
                                    <a href="{{route('admin.orders.read',$order)}}" class="btn btn-primary">View</a>
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
