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
                <h3 class="text-themecolor">Packages</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Packages</li>
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
                        <h4 class="card-title">Packages</h4>
                        {{-- <h6 class="card-subtitle">Add class <code>.table</code></h6> --}}
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Shipment</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($packages as $package)
                                    <tr>
                                        <td data-sort="{{strtotime( $package->created_at )}}">{{$package->created_at->format('d/m/Y')}}</td>
                                        <td>{{$package->rate->name}}</td>
                                        <td>
                                            @if($package->order->delivered_at) Delivered @elseif($package->order->shipped_at) Shipped @elseif($package->order->ready_at) Ready @else New @endif
                                        </td>
                                        
                                        <td>
                                            <button type="button" data-toggle="modal" href="#exampleModal{{$package->id}}" class="btn btn-primary">View Destination</button>
                                        </td>
                                    </tr>
                                    
                                    @empty 
                                    <tr>
                                        <td>
                                            No Packages Yet
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
    @foreach ($packages as $package)
    <div class="modal fade" id="exampleModal{{$package->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Destination</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" class="form-horizontal form-material">
                    @csrf
                    <input type="hidden" name="payment_id" value="{{$package->id}}">
                    <table class="table">
                        <tbody>

                        
                        <tr>
                            <td>Country</td>
                            <td>{{$package->country->name}}</td>
                        </tr>
                        <tr>
                            <td>State</td>
                            <td>{{$package->state->name}}</td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td>{{$package->city}}</td>
                        </tr>
                        <tr>
                            <td>Postal Code</td>
                            <td>{{$package->postcode}}</td>
                        </tr>
                        
                        <tr>
                            <td>Street</td>
                            <td>{{$package->street}}</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="font-weight-bold">CONTACT PERSON</td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>{{$package->name}}</td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>{{$package->phone}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{$package->email}}</td>
                        </tr>
                        
                    </tbody>
                    </table>
                    <div class="text-right">
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
