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
                <h3 class="text-themecolor">Orders</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Orders</li>
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
                        <h4 class="card-title">Orders</h4>
                        {{-- <h6 class="card-subtitle">Add class <code>.table</code></h6> --}}
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Payment Ref</th>
                                        <th>Payment Status</th>
                                        <th>Dispatch</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($orders as $order)
                                    <tr>
                                        <td data-sort="{{strtotime( $order->created_at )}}">{{$order->created_at->format('d/m/Y')}}</td>
                                        <td>{{$order->reference}}</td>
                                        <td>{{ucwords($order->status)}}</td>
                                        <td>@if($order->dispatched) Completed @elseif($order->status == "success") Ready @else Awaiting Payment @endif</td>
                                        <td>{{$order->currency->symbol}}{{$order->amount}}</td>
                                        <td>
                                            <button type="button" data-toggle="modal" href="#exampleModal{{$order->id}}" class="btn btn-primary">View Details</button>
                                        </td>
                                    </tr>
                                    
                                    @empty 
                                    <tr>
                                        <td>
                                            No Orders Yet
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
    @foreach ($orders as $order)
    <div class="modal fade" id="exampleModal{{$order->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Payment Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{route('orders.dispatch')}}" method="POST" class="form-horizontal form-material">
                    @csrf
                    <input type="hidden" name="payment_id" value="{{$order->id}}">
                    <table class="table">
                        <tbody>

                        
                        <tr>
                            <td>Name</td>
                            <td>{{$order->name}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{$order->email}}</td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>{{$order->phone}}</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="font-weight-bold">COURSES</td>
                        </tr>
                        @foreach ($order->carts as $cart)
                        <tr>
                            <td colspan="2" >{{$cart->course->title}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                    <div class="text-right">
                        @if(!$order->dispatched && $order->status == 'success')
                        <button type="submit" class="btn btn-primary">Dispatch</button>
                        @endif
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
