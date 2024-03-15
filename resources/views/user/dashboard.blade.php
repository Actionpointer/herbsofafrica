@extends('user.index')
@push('dashboard_styles')
    
@endpush
@section('dashboard_content')
<div class="woocommerce-MyAccount-content">
    <div class="woocommerce-notices-wrapper"></div>
    <p>
        Hello <strong>{{auth()->user()->name}}</strong>
    </p>
    <p>
        From your account dashboard you can view
        your <a
            href="https://herbsofafrica.com/my-account/orders/">recent
            orders</a>, manage your <a
            href="https://herbsofafrica.com/my-account/edit-address/">shipping
            and billing addresses</a>, and <a
            href="https://herbsofafrica.com/my-account/edit-account/">edit
            your password and account details</a>.
    </p>
    <div class="wd-my-account-links">
        <div class="dashboard-link">
            <a href="{{route('dashboard')}}">Dashboard</a>
        </div>
        <div class="orders-link">
            <a href="{{route('orders.index')}}">Orders</a>
        </div>
        {{-- 
        <div class="edit-address-link">
            <a href="https://herbsofafrica.com/my-account/edit-address/">Addresses</a>
        </div>
        
        --}}
        @if(auth()->user()->affiliate)
        <div class="downloads-link">
            <a href="{{route('affiliate.index')}}">Affiliate</a>
        </div>
        @endif
        <div class="edit-account-link">
            <a href="{{ route('profile') }}">Account details</a>
        </div>
        <div class="oc-custom-fields-link">
            <a href="{{route('cart')}}">Cart</a>
        </div>
        <div class="wishlist-link">
            <a href="{{ route('wishlist') }}">Wishlist</a>
        </div>
        <div class="customer-logout-link">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
        
        <p></p>
    </div>
    <p></p>
</div>
@endsection
@push('dashboard_scripts')
    
@endpush