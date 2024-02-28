<div class="wd-my-account-sidebar">
    <h3
        class="woocommerce-MyAccount-title entry-title">
        My Account </h3>
    <nav class="woocommerce-MyAccount-navigation">
        <ul>
            <li
                class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--dashboard is-active">
                <a href="{{route('dashboard')}}">Dashboard</a>
            </li>
            <li
                class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders">
                <a
                    href="{{route('orders.index')}}">Orders</a>
            </li>
            
            
            <li
                class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-account">
                <a href="{{ route('profile') }}">Account details</a>
            </li>
            
            <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--wishlist">
                <a href="{{ route('wishlist') }}">Wishlist</a>
            </li>
            
            <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--customer-logout">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <span>{{ __('Logout') }}</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
            
        </ul>
    </nav>
</div>