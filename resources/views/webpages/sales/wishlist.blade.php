@extends('layouts.app')
@push('styles')
    <link rel='stylesheet' id='wp-block-library-css'
        href="{{ asset('wp-includes/css/dist/block-library/style.min1e39.css?ver=6.4.2') }}" type='text/css' media='all' />
    <link rel='stylesheet' id='wd-page-wishlist-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-page-wishlist.minc30a.css?ver=7.2.4') }}" type='text/css'
        media='all' />
    <link rel='stylesheet' id='wd-page-my-account-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-page-my-account.minc30a.css?ver=7.2.4') }}" type='text/css'
        media='all' />
    <link rel='stylesheet'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-widget-product-list.minc30a.css?ver=7.2.4') }}"
        type='text/css' media='all' />
    <link rel='stylesheet' id='wd-page-title-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/page-title.minc30a.css?ver=7.2.4') }}" type='text/css'
        media='all' />
    <link rel='stylesheet' id='wd-woo-page-empty-page-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-page-empty-page.minc30a.css?ver=7.2.4') }}" type='text/css'
        media='all' />
    
    <link rel="stylesheet" id="wd-page-wishlist-bulk-css"
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-page-wishlist-bulk.min.css?ver=7.2.4') }}" type="text/css"
        media="all">
    <link rel='stylesheet' id='wd-product-loop-css'
        href='wp-content/themes/woodmart/css/parts/woo-product-loop.minc30a.css?ver=7.2.4' type='text/css'
        media='all' />
    <link rel='stylesheet' id='wd-product-loop-quick-css'
        href='wp-content/themes/woodmart/css/parts/woo-product-loop-quick.minc30a.css?ver=7.2.4' type='text/css'
        media='all' />
    <link rel='stylesheet' id='wd-woo-mod-add-btn-replace-css'
        href='wp-content/themes/woodmart/css/parts/woo-mod-add-btn-replace.minc30a.css?ver=7.2.4' type='text/css'
        media='all' />
    <link rel='stylesheet' id='wd-woo-mod-product-labels-css'
        href='wp-content/themes/woodmart/css/parts/woo-mod-product-labels.minc30a.css?ver=7.2.4' type='text/css'
        media='all' />
    <link rel='stylesheet' id='wd-woo-mod-product-labels-round-css'
        href='wp-content/themes/woodmart/css/parts/woo-mod-product-labels-round.minc30a.css?ver=7.2.4' type='text/css'
        media='all' />
@endpush
@section('main')
<div class="main-page-wrapper">
    <div class="page-title  page-title-default title-size-small title-design-centered color-scheme-light" style="">
        <div class="container">
            <h1 class="entry-title title">
                Wishlist </h1>


            <div class="breadcrumbs"><a href="{{url('/')}}" rel="v:url" property="v:title">Home</a> &raquo;
                <span class="current">Wishlist</span>
            </div><!-- .breadcrumbs -->
        </div>
    </div>

    <!-- MAIN CONTENT AREA -->
    <div class="container">
        <div class="row content-layout-wrapper align-items-start">

            <div class="site-content col-lg-12 col-12 col-md-12" role="main">

                <article id="post-944" class="post-944 page type-page status-publish hentry">

                    <div class="entry-content">
                        <div class="">
                            <div class="wd-wishlist-content">
                                <div id="full_wishlist" @if($wishlists->isEmpty()) style="display:none" @else style="display:block" @endif>
                                    <div class="wd-wishlist-head">
                                        <h4 class="title"> Your products wishlist </h4>

                                    </div>
                                    <div id="bulkaction" class="wd-wishlist-bulk-actions bg-secondary text-dark bg-opacity-50 mb-3" style="display:none">
                                        <div class="wd-wishlist-remove-action wd-action-btn wd-style-text wd-cross-icon p-3 ">
                                            <a href="javascript:void(0)" id="removeall"> Remove All Selected</a>
                                        </div>
                                        <div class="wd-wishlist-select-all wd-action-btn wd-style-text p-3">
                                            <a href="javascript:void(0)" id="selectall" data-state="Deselect">
                                                <span class="wd-wishlist-text-select"><span id="state">Select</span> all</span>
                                                
                                            </a>
                                        </div>
                                    </div>
                                    <div class="wd-products-element">
                                        <div class="products elements-grid align-items-start row wd-products-holder  wd-spacing-20 grid-columns-4 pagination-links align-items-start" data-paged="1">
                                            @foreach ($wishlists as $wishlist)
                                            <div class="product-grid-item product wd-hover-quick col-lg-3 col-md-3 col-6 first  type-product post-856 status-publish instock product_cat-cancer-care product_cat-prostate-health has-post-thumbnail shipping-taxable purchasable product-type-simple"
                                                data-product_id="{{$wishlist->product_id}}">

                                                <div class="wd-wishlist-product-actions">
                                                    <div class="wd-wishlist-product-remove wd-action-btn wd-style-text wd-cross-icon">
                                                        <a href="javascript:void(0)" class="wd-wishlist-remove" data-product_id="{{$wishlist->product_id}}"> Remove </a>
                                                    </div>
                                                    <div class="wd-wishlist-product-checkbox">
                                                        <input type="checkbox" class="wd-wishlist-checkbox" data-product_id="{{$wishlist->product_id}}">
                                                    </div>
                                                </div>
                                                @include('webpages.products.grid',['product'=> $wishlist->product])
                                            </div>
                                            @endforeach
                                            
                                        </div>
                                    </div>
                                </div>

                                <div id="empty_wishlist" @if($wishlists->isNotEmpty()) style="display:none" @else style="display:block" @endif>
                                    <p class="wd-empty-wishlist wd-empty-page">
                                        This wishlist is empty. </p>

                                    <div class="wd-empty-page-text">
                                        You don't have any products in the wishlist yet. <br> You will find a lot of
                                        interesting products on our "Shop" page. </div>


                                    <p class="return-to-shop">
                                        <a class="button" href="{{route('shop')}}">
                                            Return to shop </a>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>


                </article><!-- #post -->



            </div><!-- .site-content -->



        </div><!-- .main-page-wrapper -->
    </div>
</div>
@endsection
