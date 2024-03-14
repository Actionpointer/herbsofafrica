@extends('layouts.app')
@push('styles')
    <link rel='stylesheet' id='wd-widget-active-filters-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-widget-active-filters.minc30a.css?ver=7.2.4') }}"
        type='text/css' media='all' />
    <link rel='stylesheet' id='wd-woo-shop-opt-shop-ajax-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-shop-opt-shop-ajax.minc30a.css?ver=7.2.4') }}"
        type='text/css' media='all' />
    <link rel='stylesheet' id='wd-woo-shop-predefined-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-shop-predefined.minc30a.css?ver=7.2.4') }}" type='text/css'
        media='all' />
    <link rel='stylesheet' id='wd-woo-shop-el-products-per-page-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-shop-el-products-per-page.minc30a.css?ver=7.2.4') }}"
        type='text/css' media='all' />
    <link rel='stylesheet' id='wd-woo-shop-page-title-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-shop-page-title.minc30a.css?ver=7.2.4') }}" type='text/css'
        media='all' />
    <link rel='stylesheet' id='wd-woo-mod-shop-loop-head-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-mod-shop-loop-head.minc30a.css?ver=7.2.4') }}"
        type='text/css' media='all' />
    <link rel='stylesheet' id='wd-woo-shop-el-order-by-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-shop-el-order-by.minc30a.css?ver=7.2.4') }}"
        type='text/css' media='all' />
    <link rel='stylesheet' id='wd-page-title-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/page-title.minc30a.css?ver=7.2.4') }}" type='text/css'
        media='all' />
    <link rel='stylesheet' id='wd-off-canvas-sidebar-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/opt-off-canvas-sidebar.minc30a.css?ver=7.2.4') }}"
        type='text/css' media='all' />
    <link rel='stylesheet' id='wd-shop-filter-area-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-shop-el-filters-area.minc30a.css?ver=7.2.4') }}"
        type='text/css' media='all' />
    <link rel='stylesheet' id='wd-sticky-loader-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/mod-sticky-loader.minc30a.css?ver=7.2.4') }}" type='text/css'
        media='all' />


    <link rel='stylesheet' id='wd-product-loop-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-product-loop.minc30a.css?ver=7.2.4') }}" type='text/css'
        media='all' />
    <link rel='stylesheet' id='wd-product-loop-quick-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-product-loop-quick.minc30a.css?ver=7.2.4') }}"
        type='text/css' media='all' />
    <link rel='stylesheet' id='wd-woo-mod-add-btn-replace-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-mod-add-btn-replace.minc30a.css?ver=7.2.4') }}"
        type='text/css' media='all' />
    <link rel='stylesheet' id='wd-woo-mod-product-labels-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-mod-product-labels.minc30a.css?ver=7.2.4') }}"
        type='text/css' media='all' />

    <link rel='stylesheet' id='wd-woo-mod-product-labels-round-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-mod-product-labels-round.minc30a.css?ver=7.2.4') }}"
        type='text/css' media='all' />

    <link rel='stylesheet' id='wd-categories-loop-default-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-categories-loop-default-old.minc30a.css?ver=7.2.4') }}"
        type='text/css' media='all' />
    <link rel='stylesheet' id='wd-categories-loop-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-categories-loop-old.minc30a.css?ver=7.2.4') }}"
        type='text/css' media='all' />

    <link rel='stylesheet' id='wd-load-more-button-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/mod-load-more-button.minc30a.css?ver=7.2.4') }}"
        type='text/css' media='all' />
    <link rel='stylesheet' id='wd-widget-collapse-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/opt-widget-collapse.minc30a.css?ver=7.2.4') }}"
        type='text/css' media='all' />
    <link rel='stylesheet' id='wd-footer-base-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/footer-base.minc30a.css?ver=7.2.4') }}" type='text/css'
        media='all' />
@endpush
@section('main')
    <div class="main-page-wrapper">
        @if(request()->domain)
        <div class="page-title whb-hidden-lg page-title-default title-size-small title-design-centered color-scheme-light title-shop" style="">
            <div class="container text-center">
                <h1 class="entry-title title mb-0"> {{ucwords(session('affiliate')['name'])}} Shop </h1>
                <h3>{{session('affiliate')['phone']}}</h3>
            </div>
        </div>
        @else
        <div class="page-title  page-title-default title-size-small title-design-centered color-scheme-light title-shop"
            style="">
            <div class="container">
                @if (Route::is('shop.category'))
                    <div class="wd-back-btn wd-action-btn wd-style-icon">
                        <a href="{{ url()->previous() }}" rel="nofollow noopener" aria-label="Go back"></a>
                    </div>
                @endif
                <h1 class="entry-title title">
                    @if (Route::is('shop.category'))
                        {{ $shopCategory->title }}
                    @else
                        Shop
                    @endif
                </h1>
            </div>
        </div>
        @endif
        <!-- MAIN CONTENT AREA -->
        <div class="container">
            <div class="row content-layout-wrapper align-items-start">


                <aside
                    class="sidebar-container col-lg-3 col-md-3 col-12 order-last order-md-first sidebar-left area-sidebar-shop">
                    <div class="wd-heading">
                        <div class="close-side-widget wd-action-btn wd-style-text wd-cross-icon">
                            <a href="#" rel="nofollow noopener">Close</a>
                        </div>
                    </div>
                    <div class="widget-area">
                        <div id="woocommerce_product_categories-2"
                            class="wd-widget widget sidebar-widget woocommerce widget_product_categories">
                            <h5 class="widget-title">Product Categories</h5>
                            <ul class="product-categories">
                                @foreach ($categories as $category)
                                    <li class="cat-item cat-item-39 @if (isset($shopCategory) && $shopCategory->id == $category->id) current-cat @endif">
                                        <a href="{{ route('shop.category', $category) }}">{{ $category->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div><!-- .widget-area -->
                </aside><!-- .sidebar-container -->

                <div class="site-content shop-content-area col-lg-9 col-12 col-md-9 description-area-before content-with-products wd-builder-off"
                    role="main">
                    <div class="woocommerce-notices-wrapper"></div>


                    <div class="shop-loop-head">
                        <div class="wd-shop-tools">
                            @if(!request()->domain)
                            <div class="wd-breadcrumbs">
                                <nav class="woocommerce-breadcrumb" aria-label="Breadcrumb">
                                    <a href="{{ url('/') }}" class="breadcrumb-link breadcrumb-link-last"> Home </a>
                                    <span class="breadcrumb-last"> Shop </span>
                                </nav>
                            </div>
                            @endif

                            <p class="woocommerce-result-count"> Showing 1&ndash;12 of 20 results</p>
                        </div>
                        <div class="wd-shop-tools">
                            <div class="wd-show-sidebar-btn wd-action-btn wd-style-text wd-burger-icon">
                                <a href="#" rel="nofollow">Show sidebar</a>
                            </div>

                            <div class="wd-products-per-page">
                                <span class="per-page-title"> Show </span>

                                <a rel="nofollow noopener" href="index1c07.html?per_page=12"
                                    class="per-page-variation current-variation">
                                    <span> 12 </span>
                                </a>
                                <span class="per-page-border"></span>
                                <a rel="nofollow noopener" href="indexbd2b.html?per_page=24" class="per-page-variation">
                                    <span> 24 </span>
                                </a>
                                <span class="per-page-border"></span>
                            </div>
                            <form class="woocommerce-ordering wd-style-underline wd-ordering-mb-icon" method="get">
                                <select name="orderby" class="orderby" aria-label="Shop order">
                                    <option value="popularity">Popularity</option>
                                    <option value="rating">Average rating</option>
                                    <option value="date">Latest</option>
                                    <option value="price">Price (low to high)</option>
                                    <option value="price-desc" selected='selected'>Price (high to low)</option>
                                </select>
                                <input type="hidden" name="paged" value="1" />
                            </form>
                        </div>
                    </div>


                    <div class="wd-sticky-loader"><span class="wd-loader"></span></div>



                    <div class="products elements-grid wd-products-holder  wd-spacing-20 grid-columns-4 pagination-infinit align-items-start row"
                        data-source="main_loop" data-min_price="" data-max_price="" data-columns="4">

                        @forelse ($products as $product)
                            <div class="product-grid-item wd-with-labels product wd-hover-quick  col-lg-3 col-md-3 col-6 first  type-product post-{{ $product->id }} status-publish instock product_cat-{{ $product->category->slug }} has-post-thumbnail shipping-taxable purchasable product-type-simple"
                                data-loop="{{ $loop->iteration }}" data-id="{{ $product->id }}">
                                @include('webpages.products.grid', ['product' => $product])
                            </div>
                        @empty
                        @endforelse
                    </div>
                    {{-- <div class="wd-loop-footer products-footer">
                        <a href="page/2/index.html" rel="nofollow noopener"
                            class="btn wd-load-more wd-products-load-more load-on-scroll"><span
                                class="load-more-label">Load more products</span>
                        </a>
                        <div class="btn wd-load-more wd-load-more-loader"><span
                                class="load-more-loading">Loading...</span></div>
                    </div> --}}



                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    {{-- <script type="text/javascript" src="{{asset('wp-content/themes/woodmart/js/libs/pjax.minc30a.js?ver=7.2.4')}}"
        id="wd-pjax-library-js"></script> --}}
    <script type="text/javascript"
        src="{{ asset('wp-content/themes/woodmart/js/scripts/wc/ajaxFilters.minc30a.js?ver=7.2.4') }}"
        id="wd-ajax-filters-js"></script>
    <script type="text/javascript"
        src="{{ asset('wp-content/themes/woodmart/js/scripts/wc/sortByWidget.minc30a.js?ver=7.2.4') }}"
        id="wd-sort-by-widget-js"></script>
    <script type="text/javascript"
        src="{{ asset('wp-content/themes/woodmart/js/scripts/wc/shopPageInit.minc30a.js?ver=7.2.4') }}"
        id="wd-shop-page-init-js"></script>
    <script type="text/javascript" id="wd-click-on-scroll-btn-js"
        src="{{ asset('wp-content/themes/woodmart/js/scripts/global/clickOnScrollButton.minc30a.js?ver=7.2.4') }}">
    </script>

    <script type="text/javascript" id="wd-back-history-js"
        src="{{ asset('wp-content/themes/woodmart/js/scripts/global/backHistory.minc30a.js?ver=7.2.4') }}"></script>

    <script type="text/javascript"
        src="{{ asset('wp-content/themes/woodmart/js/scripts/wc/categoriesDropdowns.minc30a.js?ver=7.2.4') }}"
        id="wd-categories-dropdown-js"></script>
    <script type="text/javascript"
        src="{{ asset('wp-content/themes/woodmart/js/scripts/global/hiddenSidebar.minc30a.js?ver=7.2.4') }}"
        id="wd-hidden-sidebar-js"></script>
    <script type="text/javascript"
        src="{{ asset('wp-content/themes/woodmart/js/scripts/wc/filtersArea.minc30a.js?ver=7.2.4') }}"
        id="wd-filters-area-js"></script>
    <script type="text/javascript"
        src="{{ asset('wp-content/themes/woodmart/js/scripts/wc/shopLoader.minc30a.js?ver=7.2.4') }}"
        id="wd-shop-loader-js"></script>
    {{-- <script type="text/javascript"
		src="{{asset('wp-content/themes/woodmart/js/scripts/wc/productsLoadMore.minc30a.js?ver=7.2.4')}}"
		id="wd-products-load-more-js"></script> --}}
    <script type="text/javascript" src="{{ asset('wp-content/themes/woodmart/js/libs/waypoints.minc30a.js?ver=7.2.4') }}"
        id="wd-waypoints-library-js"></script>
    <script type="text/javascript"
        src="{{ asset('wp-content/themes/woodmart/js/scripts/global/widgetCollapse.minc30a.js?ver=7.2.4') }}"
        id="wd-widget-collapse-js"></script>
    <script type="text/javascript"
        src="{{ asset('wp-content/themes/woodmart/js/scripts/wc/stickySidebarBtn.minc30a.js?ver=7.2.4') }}"
        id="wd-sticky-sidebar-btn-js"></script>
@endpush
