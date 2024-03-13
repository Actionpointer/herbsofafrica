<header class="whb-header whb-default_header whb-sticky-shadow whb-scroll-stick whb-sticky-real">
    <div class="whb-main-header">

        <div class="whb-row whb-top-bar whb-not-sticky-row whb-with-bg whb-without-border whb-color-dark whb-flex-flex-middle whb-hidden-mobile">
            <div class="container">
                <div class="whb-flex-row whb-top-bar-inner">
                    <div class="whb-column whb-col-left whb-visible-lg">

                        <div class="wd-header-text set-cont-mb-s reset-last-child "><strong
                                style="color: #ffffff; font-size: 15px;">Your source for natural wellness
                                solutions</strong></div>
                    </div>
                    <div class="whb-column whb-col-center whb-visible-lg whb-empty-column"> </div>
                    <div class="whb-column whb-col-right whb-visible-lg">
                        <div
                            class="wd-search-form wd-header-search-form wd-display-form whb-meu2gniltrqi3i4g6ijf">
                            <form role="search" method="get"
                                class="searchform  wd-style-with-bg wd-cat-style-bordered" action="">
                                <input type="text" class="s" placeholder="Search for products"
                                    value="" name="s" aria-label="Search"
                                    title="Search for products" required />
                                <input type="hidden" name="post_type" value="product">
                                <button type="submit" class="searchsubmit">
                                    <span>
                                        Search </span>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="whb-column whb-col-mobile whb-hidden-lg whb-empty-column"> </div>
                </div>
            </div>
        </div>

        <div class="whb-row whb-general-header whb-sticky-row whb-without-bg whb-border-fullwidth whb-color-dark whb-flex-flex-middle">
            <div class="container">
                <div class="whb-flex-row whb-general-header-inner">
                    <div class="whb-column whb-col-left whb-visible-lg">
                        <div class="site-logo">
                            <a href="index.html" class="wd-logo wd-main-logo" rel="home">
                                <img src="{{ asset('wp-content/uploads/2023/08/new-logo.png') }}"
                                    alt="Herbs of Africa®" style="max-width: 250px;" /> </a>
                        </div>
                    </div>
                    <div class="whb-column whb-col-center whb-visible-lg">
                        <div class="wd-header-nav wd-header-main-nav text-center wd-design-1 text-success"
                            role="navigation" aria-label="Main navigation">
                            @if(request()->domain)
                            <h1 class="mb-0 text-success">{{ucwords(session('affiliate')['name'])}} Shop</h1>
                            <span>{{session('affiliate')['phone']}}</span>
                            @else
                            <ul id="menu-main-menu" class="menu wd-nav wd-nav-main wd-style-default wd-gap-l">
                                <li id="menu-item-507"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-35 current_page_item menu-item-507 item-level-0 menu-simple-dropdown wd-event-hover">
                                    <a href="{{ url('/') }}" class="woodmart-nav-link" id="dontgo">
                                        <span class="nav-link-text">Home</span>
                                    </a>
                                </li>
                                <li id="menu-item-510"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-510 item-level-0 menu-simple-dropdown wd-event-hover">
                                    <a href="{{route('about')}}" class="woodmart-nav-link"><span
                                            class="nav-link-text">Who We Are</span></a>
                                </li>
                                <li id="menu-item-508"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-508 item-level-0 menu-simple-dropdown wd-event-hover">
                                    <a href="{{ route('shop') }}" class="woodmart-nav-link"><span
                                            class="nav-link-text">Shop</span></a>
                                </li>
                                <li id="menu-item-511"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-511 item-level-0 menu-simple-dropdown wd-event-hover">
                                    <a href="{{route('faqs')}}" class="woodmart-nav-link"><span
                                            class="nav-link-text">FAQs</span></a>
                                </li>
                                <li id="menu-item-509"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-509 item-level-0 menu-simple-dropdown wd-event-hover">
                                    <a href="articles/index.html" class="woodmart-nav-link"><span
                                            class="nav-link-text">The Journal</span></a>
                                </li>
                            </ul>
                            @endif
                        </div><!--END MAIN-NAV-->
                    </div>
                    <div class="whb-column whb-col-right whb-visible-lg">
                        <div class="wd-header-my-account wd-tools-element wd-event-hover wd-design-1 wd-account-style-icon @guest login-side-opener @endguest whb-2b8mjqhbtvxz16jtxdrd">
                            <a href="{{ route('dashboard') }}" title="My account">

                                <span class="wd-tools-icon"> </span>
                                <span class="wd-tools-text">
                                    Login / Register 
                                </span>

                            </a>
                            @auth
                                <div class="wd-dropdown wd-dropdown-menu wd-dropdown-my-account wd-design-default">
                                    <ul class="wd-sub-menu">
                                        <li
                                            class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--dashboard is-active">
                                            <a href="{{ route('dashboard') }}"><span>Dashboard</span></a>
                                        </li>
                                        <li
                                            class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders">
                                            <a href="{{ route('orders.index') }}"><span>Orders</span></a>
                                        </li>
                                        {{-- <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--downloads">
                                        <a href="https://herbsofafrica.com/my-account/downloads/"><span>Downloads</span></a>
                                    </li> 
                                     <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-address">
                                        <a href="{{route('addresses')}}"><span>Addresses</span></a>
                                    </li> 
                                    <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--oc-custom-fields">
                                        <a href="https://herbsofafrica.com/my-account/oc-custom-fields/"><span>Registration Fields</span></a>
                                    </li>
                                    <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--payment-methods">
                                        <a href="https://herbsofafrica.com/my-account/payment-methods/"><span>Payment methods</span></a>
                                    </li> --}}
                                        <li
                                            class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-account">
                                            <a href="{{ route('profile') }}"><span>Profile</span></a>
                                        </li>

                                        <li
                                            class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--wishlist">
                                            <a href="{{ route('wishlist') }}"><span>Wishlist</span></a>
                                        </li>
                                        <li
                                            class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--customer-logout">
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <span>{{ __('Logout') }}</span>
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            @endauth
                        </div>

                        <div class="wd-header-wishlist wd-tools-element wd-style-icon wd-with-count wd-design-2 whb-i8977fqp1lmve3hyjltf"
                            title="My Wishlist">
                            <a href="{{ route('wishlist') }}">

                                <span class="wd-tools-icon">

                                    <span class="wd-tools-count wish-counter">
                                        @auth
                                            {{auth()->user()->wishlists->count()}}
                                            @else
                                            0
                                        @endauth
                                    </span>
                                </span>

                                <span class="wd-tools-text">
                                    Wishlist 
                                </span>

                            </a>
                        </div>

                        <div class="wd-header-cart wd-tools-element wd-design-5 cart-widget-opener whb-5u866sftq6yga790jxf3">
                            <a href="{{ route('cart') }}" title="Shopping cart">

                                <span class="wd-tools-icon wd-icon-alt">
                                    <span
                                        class="wd-cart-number wd-tools-count">{{ Session::has('carts') ? session('carts')->sum('quantity') : 0 }}
                                        <span>items</span></span>
                                </span>
                                <span class="wd-tools-text">
                                    <span class="wd-cart-subtotal">
                                        <span class="woocs_special_price_code">
                                            <span class="woocommerce-Price-amount amount">
                                                <bdi>
                                                    <span
                                                        class="woocommerce-Price-currencySymbol">{{ session('currency')['symbol'] }}</span>
                                                    <span
                                                        class="cart-sum-total">{{ Session::has('carts') ? session('carts')->sum('amount.' . session('currency')['code']) : 0 }}</span>
                                                </bdi>
                                            </span>
                                        </span>
                                    </span>
                                </span>

                            </a>
                        </div>

                        <div class="wd-header-text set-cont-mb-s reset-last-child ">
                            <select class="currency_switcher">
                                @foreach ($currencies as $currency)
                                    <option value="{{$currency->code}}" @if(session('currency')['code'] == $currency->code)  selected @endif>{{$currency->code}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @if(!request()->domain)
                    <div class="whb-column whb-mobile-left whb-hidden-lg">
                        <div class="wd-tools-element wd-header-mobile-nav wd-style-icon wd-design-1 whb-wn5z894j1g5n0yp3eeuz">
                            <a href="#" rel="nofollow" aria-label="Open mobile menu">

                                <span class="wd-tools-icon"> </span>

                                <span class="wd-tools-text">Menu</span>

                            </a>
                        </div>
                    </div>
                    @endif
                    <div class="whb-column whb-mobile-center whb-hidden-lg">
                        <div class="site-logo">
                            <a href="{{url('/')}}" class="wd-logo wd-main-logo" rel="home">
                                <img src="{{ asset('wp-content/uploads/2023/08/new-logo.png') }}"
                                    alt="Herbs of Africa®" style="max-width: 140px;" /> </a>
                        </div>
                    </div>
                    <div class="whb-column whb-mobile-right whb-hidden-lg">
                        <select class="currency_switcher"  style="width: 80px;">
                            @foreach ($currencies as $currency) 
                                <option value="{{$currency->code}}" @if(session('currency')['code'] == $currency->code)  selected @endif>{{$currency->code}}</option>
                            @endforeach
                        </select>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>