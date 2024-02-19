<div class="mobile-nav wd-side-hidden wd-left">
    <div class="wd-search-form">
        <form role="search" method="get" class="searchform  wd-cat-style-bordered" action="">
            <input type="text" class="s" placeholder="Search for products" value=""
                name="s" aria-label="Search" title="Search for products" required />
            <input type="hidden" name="post_type" value="product">
            <button type="submit" class="searchsubmit">
                <span>
                    Search </span>
            </button>
        </form>
    </div>

    <ul id="menu-main-menu-1" class="mobile-pages-menu wd-nav wd-nav-mobile wd-active">
        <li
            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-35 current_page_item menu-item-507 item-level-0">
            <a href="{{url('/')}}" class="woodmart-nav-link"><span class="nav-link-text">Home</span></a>
        </li>
        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-510 item-level-0"><a
                href="{{route('about')}}" class="woodmart-nav-link"><span class="nav-link-text">Who We
                    Are</span></a></li>
        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-508 item-level-0"><a
                href="{{route('shop')}}" class="woodmart-nav-link"><span class="nav-link-text">Shop</span></a>
        </li>
        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-511 item-level-0"><a
                href="{{route('faqs')}}" class="woodmart-nav-link"><span class="nav-link-text">FAQs</span></a>
        </li>
        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-509 item-level-0">
            <a href="{{route('articles')}}" class="woodmart-nav-link">
                <span class="nav-link-text">The Journal</span>
            </a>
        </li>
        <li class="menu-item menu-item-wishlist wd-with-icon"> <a href="{{ route('wishlist') }}"
                class="woodmart-nav-link">
                <span class="nav-link-text">Wishlist</span>
            </a>
        </li>
        <li class="menu-item  login-side-opener menu-item-account wd-with-icon"><a
                href="{{route('login')}}">Login / Register</a></li>
    </ul>
</div>