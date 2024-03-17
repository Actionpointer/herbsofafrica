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
                <h3 class="text-themecolor">Settlements</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Settlements</li>
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
                        <h4 class="card-title">Settlements</h4>
                        {{-- <h6 class="card-subtitle">Add class <code>.table</code></h6> --}}
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Settlement #</th>
                                        <th>Beneficiary</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Pay Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($settlements as $settlement)
                                    <tr>
                                        <td data-sort="{{strtotime( $settlement->created_at )}}">{{$settlement->created_at->format('d/m/Y')}}</td>
                                        <td>{{$settlement->id}}</td>
                                        <td>{{$settlement->affiliate->name}}</td>
                                        
                                        <td>{{$settlement->currency}}{{$settlement->amount}}</td>
                                        <td> {{ucwords($settlement->status)}} </td>
                                        <td> 
                                            @if($settlement->paid_at)
                                            {{$settlement->paid_at->format('jS F h:i A')}} 
                                            @elseif($settlement->status == 'pending')
                                            {{$settlement->created_at->addWeek()->startOfWeek()->format('d F h:i A')}} 
                                            @endif
                                            @if($settlement->status == 'pending' || $settlement->status == 'failed')
                                            <form action="{{route('admin.transactions.settlements.pay')}}" method="post" onsubmit="return confirm('Are you sure you want to make this payment?')" >@csrf
                                                <input type="hidden" name="settlement_id" value="{{$settlement->id}}">
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-check"></i>  @if($settlement->status == 'pending') Pay Now @else Retry @endif
                                                </button>
                                            </form>
                                            @endif
                                        </td>
                                        <td>
                                            @if($settlement->status != 'paid')
                                            <form action="{{route('admin.transactions.settlements')}}" method="post" 
                                                @if($settlement->status == 'pending') onsubmit="return confirm('Are you sure you want to Withhold?')"
                                                @else onsubmit="return confirm('Are you sure you want to Release?')" @endif
                                                >@csrf
                                                <input type="hidden" name="settlement_id" value="{{$settlement->id}}">
                                                @if($settlement->status == 'pending')
                                                <input type="hidden" name="status" value="withheld">
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-warning"></i> Withhold
                                                </button>
                                                @else 
                                                <input type="hidden" name="status" value="pending">
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-check"></i> Release
                                                </button>
                                                @endif
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                    
                                    @empty 
                                    <tr>
                                        <td>
                                            No Settlements Yet
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
