@extends('user.index')
@push('dashboard_styles')
    
@endpush
@section('dashboard_content')
<div class="woocommerce-MyAccount-content">
    <div class="woocommerce-notices-wrapper"></div>
    <div class="row">
        @forelse ($user->addresses as $address)
        <div class="col-md-4" style="padding: 20px;text-align: center; color: var(--color-gray-700); border-radius: var(--wd-brd-radius); box-shadow: 0 0 4px rgba(0, 0, 0, 0.18);">
        @if($address->default)
        <div class="product-labels labels-rounded">
            <span class="featured product-label p-2" style="min-height: 25px;">Main</span>
        </div>    
        @endif
        <h4 class="mb-0">{{$address->name}} <i class="fa fa-star-o"></i></h3>
            <h5 class="mb-0">{{$address->street.' '.$address->city}} {{$address->state->name}} {{$address->country->name}}</h3>
            <span class="small">{{$address->phone}}</span><br>
            <span class="small">{{$address->email}}</span>
            <div class="">
                <a href="{{route('address.edit',$address)}}" class="btn">Edit</a>
                <form action="{{route('address.delete')}}" method="post" class="d-inline">@csrf
                    <button type="submit" class=" btn">Delete</button>
                </form>
                
            </div>
            
        </div>
    
        @empty
        <div class="col-md-4" style="padding: 20px;text-align: center; color: var(--color-gray-700); border-radius: var(--wd-brd-radius); box-shadow: 0 0 4px rgba(0, 0, 0, 0.18);">
            <h4 class="mb-0">No Address</h3>
            <h5 class="mb-0"></h3>
            <p class="small mt-3">Store new address to make your checkout experience easier</span><br>
            
            <div class="flex">
                <a href="{{route('address.create')}}">Create New Address</a>
                
            </div>
            
        </div> 
        @endforelse
        <p></p>
    </div>
    
</div>
@endsection
@push('dashboard_scripts')
    
@endpush