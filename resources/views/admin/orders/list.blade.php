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
                                        <th>Order #</th>
                                        <th>Customer</th>
                                        <th>Status</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($orders as $order)
                                    <tr>
                                        <td data-sort="{{strtotime( $order->created_at )}}">{{$order->created_at->format('d/m/Y')}}</td>
                                        <td>{{$order->reference}}</td>
                                        <td>{{$order->user->name}}</td>
                                        <td>
                                            @if($order->status == 'ready')
                                                Ready for @if($order->shipping->rate->method == 'local-pickup') Pickup @else Shipment @endif
                                            @elseif($order->status == 'processed')
                                                Processing
                                            @else 
                                                {{ucwords($order->status)}}
                                            @endif
                                        </td>
                                        <td>{{$order->currency}}{{$order->total}}</td>
                                        <td>
                                            <a href="{{route('admin.orders.read',$order)}}" class="btn btn-primary">View Details</a>
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
