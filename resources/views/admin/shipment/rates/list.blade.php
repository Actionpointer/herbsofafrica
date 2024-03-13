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
</style>
@endpush
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
                    <li class="breadcrumb-item active">All Shipping Rates</li>
                </ol>
                
            </div>
            <div class="col-md-4 d-flex align-self-center">
                <a href="{{route('admin.shipment.rates.create')}}" class="btn btn-primary">New Rate</a>
            </div>
            
        </div>

        

        <div class="row">
            <div class="col-md-12">
                <div class="card">                 
                    <div class="card-body">
                        
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Rate Name</th>
                                        <th>Countries</th>
                                        <th>States</th>
                                        <th>Method</th>
                                        <th>Value</th>
                                        <th>Shipments</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($rates as $rate)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$rate->name}}</td>
                                        <td>{{$rate->country_names}}</td>
                                        <td>{{$rate->states_count}}</td>
                                        <td>{{$rate->method}}</td>
                                        <td>
                                            @switch($rate->method)
                                                @case('flat-rate')
                                                        @foreach ($rate->prices as $key=>$value)
                                                            <small>{{$key}} : {{$value}}</small>,
                                                        @endforeach
                                                    @break
                                                @case('free-shipping')
                                                    0
                                                    @break
                                                @case('local-pickup')
                                                    {{$rate->warehouse}}
                                                    @break
                                                @default
                                                    
                                            @endswitch
                                        </td>
                                        <td>{{$rate->shipments->count()}}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{route('admin.shipment.rates.edit',$rate)}}" class="btn btn-info mr-2">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <form action="{{route('admin.shipment.rates.destroy')}}" method="post" onsubmit="return confirm('Are you sure you want to delete Rate?')">@csrf
                                                    <input type="hidden" name="rate_id" value="{{$rate->id}}">
                                                    <button type="submit" name="action" value="delete" class="btn btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    
                                    @empty
                                    <tr>
                                        <td colspan="7">No Rate</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        @include('layouts.pagination',['data'=> $rates])
                    </div>
                </div>
            </div>            
        </div>
        
        
    </div>

@endsection
@push('scripts')

@endpush
