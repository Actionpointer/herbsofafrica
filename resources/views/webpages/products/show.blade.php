@extends('layouts.app')
@push('styles')
    <link rel="stylesheet" id="elementor-post-918-css"
        href="{{ asset('wp-content/uploads/elementor/css/post-14b185.css?ver=1704940137') }}" type="text/css" media="all">
    <link rel='stylesheet' id='elementor-post-655-css'
        href="{{ asset('wp-content/uploads/elementor/css/post-6557265.css?ver=1704950081') }}" type='text/css'
        media='all' />
    <link rel="stylesheet" id="elementor-post-1078-css"
        href="{{ asset('wp-content/uploads/elementor/css/post-10785a1d.css?ver=1704940138') }}" type="text/css"
        media="all">
    <link rel="stylesheet" id="elementor-post-918-css"
        href="{{ asset('wp-content/uploads/elementor/css/post-918434d.css?ver=1704949569') }}" type="text/css"
        media="all">
    <link rel='stylesheet' id='wd-mod-comments-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/mod-comments.minc30a.css?ver=7.2.4') }}" type='text/css'
        media='all' />
    <link rel='stylesheet' id='wd-woo-mod-quantity-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-mod-quantity.minc30a.css?ver=7.2.4') }}" type='text/css'
        media='all' />
    <link rel='stylesheet' id='wd-woo-single-prod-el-base-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-single-prod-el-base.minc30a.css?ver=7.2.4') }}"
        type='text/css' media='all' />
    <link rel='stylesheet' id='wd-woo-mod-stock-status-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-mod-stock-status.minc30a.css?ver=7.2.4') }}"
        type='text/css' media='all' />
    <link rel='stylesheet' id='wd-woo-mod-shop-attributes-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-mod-shop-attributes.minc30a.css?ver=7.2.4') }}"
        type='text/css' media='all' />
    <link rel='stylesheet' id='wd-page-title-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/page-title.minc30a.css?ver=7.2.4') }}" type='text/css'
        media='all' />
    <link rel='stylesheet' id='wd-woo-single-prod-and-quick-view-predefined-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-single-prod-and-quick-view-predefined.minc30a.css?ver=7.2.4') }}"
        type='text/css' media='all' />
    <link rel='stylesheet' id='wd-woo-single-prod-el-tabs-predefined-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-single-prod-el-tabs-predefined.minc30a.css?ver=7.2.4') }}"
        type='text/css' media='all' />
    <link rel='stylesheet' id='wd-woo-single-prod-el-gallery-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-single-prod-el-gallery.minc30a.css?ver=7.2.4') }}"
        type='text/css' media='all' />
    <link rel='stylesheet' id='wd-photoswipe-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/lib-photoswipe.minc30a.css?ver=7.2.4') }}" type='text/css'
        media='all' />
    <link rel='stylesheet' id='wd-woo-single-prod-el-navigation-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-single-prod-el-navigation.minc30a.css?ver=7.2.4') }}"
        type='text/css' media='all' />

    <link rel='stylesheet' id='wd-tabs-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/el-tabs.minc30a.css?ver=7.2.4') }}" type='text/css'
        media='all' />
    <link rel='stylesheet' id='wd-woo-single-prod-el-tabs-opt-layout-tabs-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-single-prod-el-tabs-opt-layout-tabs.minc30a.css?ver=7.2.4') }}"
        type='text/css' media='all' />
    <link rel='stylesheet' id='wd-accordion-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/el-accordion.minc30a.css?ver=7.2.4') }}" type='text/css'
        media='all' />
    <link rel='stylesheet' id='wd-woo-single-prod-el-reviews-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-single-prod-el-reviews.minc30a.css?ver=7.2.4') }}"
        type='text/css' media='all' />
    <link rel='stylesheet' id='wd-woo-single-prod-el-reviews-style-1-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-single-prod-el-reviews-style-1.minc30a.css?ver=7.2.4') }}"
        type='text/css' media='all' />

        <link rel='stylesheet' id='el-social-icons-css'
		href="{{ asset('wp-content/themes/woodmart/css/parts/el-social-icons.minc30a.css') }}" type='text/css'
		media='all' />
    <style>
        .nav-tabs { border-bottom:none }
        .nav-tabs > li.active > a, .nav-tabs > li > a:hover { border: none; color: var(--nav-color-hover); background: transparent; }
        .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover { border-width: 0; }
        .nav-tabs > li {position: relative;}
        .nav-tabs > li > a { border: none; color: var(--nav-color);font-weight:600;cursor: pointer;}
        .nav-tabs > li > a::after { content: ""; background: var(--wd-primary-color); height: 2px; position: absolute; width: 100%; left: 0px; top: -24px; transition: all 250ms ease 0s; transform: scale(0); }
        .nav-tabs > li.active > a::after, .nav-tabs > li:hover > a::after { transform: scale(1); }
        .tab-pane { padding: 15px 0; }
        .tab-content{padding:20px}
        
        /* .tab-nav > li > a::after { background: #21527d none repeat scroll 0% 0%; color: #fff; }  */
    </style>
  
@endpush
@section('main')
    <div class="main-page-wrapper">
        <!-- MAIN CONTENT AREA -->
        <div class="container-fluid">
            <div class="row content-layout-wrapper align-items-start">

                <div class="site-content shop-content-area col-12 breadcrumbs-location-summary wd-builder-off"
                    role="main">
                    <div class="container"> </div>


                    <div id="product-655" class="single-product-page single-product-content product-design-default tabs-location-standard tabs-type-tabs meta-location-add_to_cart reviews-location-tabs product-no-bg product type-product post-655 status-publish first instock product_cat-joint-health has-post-thumbnail shipping-taxable purchasable product-type-simple">

                        <div class="container">

                            <div class="woocommerce-notices-wrapper"></div>
                            <div class="row product-image-summary-wrap">
                                <div class="product-image-summary col-lg-12 col-12 col-md-12">
                                    <div class="row product-image-summary-inner">
                                        <div class="col-lg-6 col-12 col-md-6 product-images">
                                            <div class="product-images-inner">
                                                <div class="woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images wd-has-thumb images row thumbs-position-bottom image-action-zoom"
                                                    style="opacity: 0; transition: opacity .25s ease-in-out;">

                                                    <div class="col-12">

                                                        <figure class="woocommerce-product-gallery__wrapper owl-items-lg-1 owl-items-md-1 owl-items-sm-1 owl-items-xs-1 owl-carousel wd-owl"
                                                            data-hide_pagination_control="yes">
                                                            @foreach ($product->photos as $photo)
                                                            <div class="product-image-wrap">
                                                                <figure data-thumb="{{ $photo }}"
                                                                    class="woocommerce-product-gallery__image">
                                                                    <a data-elementor-open-lightbox="no" href="{{$photo}}">
                                                                        <img fetchpriority="high" width="600" height="600"
                                                                            src="{{ $photo }}"
                                                                            class="wp-post-image wp-post-image"
                                                                            alt=""
                                                                            title="ezgif.com-gif-maker (29)"
                                                                            data-caption=""
                                                                            data-src="{{ $photo }}"
                                                                            data-large_image="{{ $photo }}"
                                                                            data-large_image_width="800"
                                                                            data-large_image_height="800" decoding="async"
                                                                            
                                                                            sizes="(max-width: 600px) 100vw, 600px" />
                                                                    </a>
                                                                </figure>
                                                            </div>
                                                            @endforeach
                                                        </figure>

                                                        <div class="product-additional-galleries">
                                                            <div
                                                                class="wd-show-product-gallery-wrap wd-action-btn wd-style-icon-bg-text wd-gallery-btn">
                                                                <a href="#" rel="nofollow" class="woodmart-show-product-gallery">
                                                                    <span>Click to enlarge</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="thumbnails owl-carousel wd-owl owl-items-lg-4 owl-items-md-4 owl-items-sm-4 owl-items-xs-3"
                                                            data-desktop="4" data-tablet="4" data-mobile="3">
                                                            @foreach ($product->photos as $photo)
                                                            <div class="product-image-thumbnail">
                                                                <img loading="lazy" width="150" height="150"
                                                                    src="{{ $photo }}"
                                                                    class="attachment-150x0 size-150x0" alt="" decoding="async" sizes="(max-width: 150px) 100vw, 150px" />
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12 col-md-6 text-left summary entry-summary">
                                            <div class="summary-inner set-mb-l reset-last-child">
                                                <div class="single-breadcrumbs-wrapper">
                                                    <div class="single-breadcrumbs">
                                                        <div class="wd-breadcrumbs">
                                                            <nav class="woocommerce-breadcrumb" aria-label="Breadcrumb">
                                                                <a href="{{url('/')}}" class="breadcrumb-link">
                                                                    Home </a>
                                                                <a href="{{route('shop.category',$product->category)}}"
                                                                    class="breadcrumb-link breadcrumb-link-last">
                                                                    {{$product->category->title}} </a>
                                                                <span class="breadcrumb-last">
                                                                    {{$product->title}} </span>
                                                            </nav>
                                                        </div>

                                                        {{-- <div class="wd-products-nav">
                                                            <div class="wd-event-hover">
                                                                <a class="wd-product-nav-btn wd-btn-prev"
                                                                    href="../cardioright/index.html"
                                                                    aria-label="Previous product"></a>

                                                                <div class="wd-dropdown">
                                                                    <a href="../cardioright/index.html"
                                                                        class="wd-product-nav-thumb">
                                                                        <img loading="lazy" width="300" height="300"
                                                                            src="{{ asset('wp-content/uploads/2023/08/ezgif.com-gif-maker-28-300x300.webp') }}"
                                                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                                            alt="" decoding="async"
                                                                            srcset="{{ asset('wp-content/uploads/2023/08/ezgif.com-gif-maker-28-300x300.webp') }}
                                                                            300w,
                                                                            {{ asset('wp-content/uploads/2023/08/ezgif.com-gif-maker-28-150x150.webp') }}
                                                                            150w,
                                                                            {{ asset('wp-content/uploads/2023/08/ezgif.com-gif-maker-28-768x768.webp') }}
                                                                            768w,
                                                                            {{ asset('wp-content/uploads/2023/08/ezgif.com-gif-maker-28-600x600.webp') }}
                                                                            600w,
                                                                            {{ asset('wp-content/uploads/2023/08/ezgif.com-gif-maker-28.webp') }}
                                                                            800w"
                                                                            sizes="(max-width: 300px) 100vw, 300px" />
                                                                    </a>

                                                                    <div class="wd-product-nav-desc">
                                                                        <a href="../cardioright/index.html"
                                                                            class="wd-entities-title">
                                                                            Cardioright </a>

                                                                        <span class="price">
                                                                            <span class="woocs_price_code"
                                                                                data-currency=""
                                                                                data-redraw-id="65ae39508367b"
                                                                                data-product-id="618"><span
                                                                                    class="woocommerce-Price-amount amount"><span
                                                                                        class="woocommerce-Price-currencySymbol">&#036;</span>45</span></span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <a href="{{route('shop')}}"
                                                                class="wd-product-nav-btn wd-btn-back">
                                                                <span>
                                                                    Back to products </span>
                                                            </a>

                                                            <div class="wd-event-hover">
                                                                <a class="wd-product-nav-btn wd-btn-next"
                                                                    href="../cellevac/index.html"
                                                                    aria-label="Next product"></a>

                                                                <div class="wd-dropdown">
                                                                    <a href="../cellevac/index.html"
                                                                        class="wd-product-nav-thumb">
                                                                        <img loading="lazy" width="300" height="300"
                                                                            src="{{ asset('wp-content/uploads/2023/08/ezgif.com-gif-maker-30-1-300x300.webp') }}"
                                                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                                            alt="" decoding="async"
                                                                            srcset="{{ asset('wp-content/uploads/2023/08/ezgif.com-gif-maker-30-1-300x300.webp') }}"
                                                                            300w,
                                                                            {{ asset('wp-content/uploads/2023/08/ezgif.com-gif-maker-30-1-150x150.webp') }}
                                                                            150w,
                                                                            {{ asset('wp-content/uploads/2023/08/ezgif.com-gif-maker-30-1-768x768.webp') }}
                                                                            768w,
                                                                            {{ asset('wp-content/uploads/2023/08/ezgif.com-gif-maker-30-1-600x600.webp') }}
                                                                            600w,
                                                                            {{ asset('wp-content/uploads/2023/08/ezgif.com-gif-maker-30-1.webp') }}
                                                                            800w
                                                                            sizes="(max-width: 300px) 100vw, 300px" />
                                                                    </a>

                                                                    <div class="wd-product-nav-desc">
                                                                        <a href="../cellevac/index.html"
                                                                            class="wd-entities-title">
                                                                            Cellevac </a>

                                                                        <span class="price">
                                                                            <span class="woocs_price_code"
                                                                                data-currency=""
                                                                                data-redraw-id="65ae395083df1"
                                                                                data-product-id="673"><span
                                                                                    class="woocommerce-Price-amount amount"><span
                                                                                        class="woocommerce-Price-currencySymbol">&#036;</span>45</span></span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}
                                                    </div>
                                                </div>


                                                <h1 class="product_title entry-title wd-entities-title"> {{$product->title}} </h1>
                                                <p class="price">
                                                    <span class="woocs_price_code" data-currency="" data-redraw-id="65ae385ea9bbf" data-product-id="775">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <bdi>
                                                                <span class="woocommerce-Price-currencySymbol">
                                                                    {{session('currency')['symbol']}}
                                                                </span>
                                                                {{number_format($product->prices[session('currency')['code']])}}
                                                            </bdi>
                                                        </span>
                                                    </span>
                                                </p>
                                                <div class="woocommerce-product-details__short-description">
                                                    <p>{{$product->tagline}}</p>
                                                </div>


                                                <div class="cart" id="product_form">


                                                    <div class="quantity">

                                                        <input type="button" value="-" class="minus just_minus" />

                                                        <label class="screen-reader-text" for="quantity_{{$product->id}}">{{$product->title}} quantity</label>

                                                        <input type="number" 
                                                            id="" 
                                                            class="input-text qty text" 
                                                            value="1" 
                                                            title="Qty"
                                                            min="1" 
                                                            max="" 
                                                            name="quantity" 
                                                            step="1"
                                                            placeholder=""
                                                            inputmode="numeric" 
                                                            autocomplete="off" data-product_id="{{$product->id}}">

                                                        <input type="button" value="+" class="plus just_plus" />

                                                    </div>

                                                    {{-- <button type="submit" name="add-to-cart" value="655"
                                                        class="single_add_to_cart_button button alt">Add to basket</button> --}}

                                                        <a href="javascript:void(0)"
                                                            class="button product_type_simple add_to_cart_button ms-2 add-to-cart-loop single_add_to_cart_button"
                                                            data-product_id="{{$product->id}}" data-product_qty="1"
                                                            aria-label="Add to basket: &ldquo;Fabman&rdquo;" aria-describedby=""
                                                            rel="nofollow">
                                                            <span>Add to basket </span>
                                                        </a>

                                                </div>

                                                @if(!Route::is('wishlist') && auth()->check())
                                                <div class="wd-buttons wd-pos-r-t">
                                                    <div class="wd-wishlists-btn wd-action-btn wd-style-text wd-wishlist-icon">
                                                        <a class="wishlist_anchor @if(auth()->user()->inWishlist($product->id)) added @endif"
                                                            href="{{route('wishlist')}}"
                                                            data-key="0fe9f691dc"
                                                            data-product_id="{{$product->id}}"
                                                            rel="nofollow"
                                                            data-added-text="Browse Wishlist">
                                                            <span>Add to wishlist</span>
                                                        </a>
                                                    </div>
                                                </div>
                                                @endif
                                                

                                                <div class="product_meta">


                                                    <span class="posted_in">
                                                        <span class="meta-label">Category:</span> 
                                                            <a href="{{route('shop.category',$product->category)}}" rel="tag">{{$product->category->title}}</a></span>

                                                </div>

                                                <div
                                                    class="wd-social-icons icons-design-default icons-size-small color-scheme-dark social-share social-form-circle product-share wd-layout-inline text-left">

                                                    <span class="wd-label share-title">Share:</span>

                                                    <a rel="noopener noreferrer nofollow"
                                                        href="https://www.facebook.com/sharer/sharer.php?u=https://herbsofafrica.com/product/cartis/"
                                                        target="_blank" class=" wd-social-icon social-facebook"
                                                        aria-label="Facebook social link">
                                                        <span class="wd-icon"></span>
                                                    </a>

                                                    <a rel="noopener noreferrer nofollow"
                                                        href="https://twitter.com/share?url=https://herbsofafrica.com/product/cartis/"
                                                        target="_blank" class=" wd-social-icon social-twitter"
                                                        aria-label="Twitter social link">
                                                        <span class="wd-icon"></span>
                                                    </a>

                                                    <a rel="noopener noreferrer nofollow"
                                                        href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https://herbsofafrica.com/product/cartis/"
                                                        target="_blank" class=" wd-social-icon social-linkedin"
                                                        aria-label="Linkedin social link">
                                                        <span class="wd-icon"></span>
                                                    </a>

                                                    <a rel="noopener noreferrer nofollow"
                                                        href="https://telegram.me/share/url?url=https://herbsofafrica.com/product/cartis/"
                                                        target="_blank" class=" wd-social-icon social-tg"
                                                        aria-label="Telegram social link">
                                                        <span class="wd-icon"></span>
                                                    </a>


                                                </div>

                                            </div>
                                        </div>
                                    </div><!-- .summary -->
                                </div>
                            </div>


                        </div>
                        
                        <div class="d-flex justify-content-center border-top">
                            <ul class="nav nav-tabs pt-4 product_tabs" id="myTab" role="tablist">
                                <li class="active" role="presentation">
                                    <a class="active" id="home-tab" data-bs-toggle="tab" data-bs-target="#homes"  role="tab" aria-controls="home" aria-selected="true">DESCRIPTION</a>
                                </li>
                                <li role="presentation" class="mx-4">
                                    <a class="" id="review-tab" data-bs-toggle="tab" data-bs-target="#reviews"  role="tab" aria-controls="profile" aria-selected="false">REVIEWS</a>
                                </li>
                                <li  role="presentation">
                                    <a class="" id="faq-tab" data-bs-toggle="tab" data-bs-target="#faqs"  role="tab" aria-controls="contact" aria-selected="false">FAQ</a>
                                </li>
                            </ul>
                        </div>

                          
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="homes" role="tabpanel" aria-labelledby="home-tab">
                                <div data-elementor-type="wp-post" data-elementor-id="655" class="elementor elementor-655">
                                    <div class="wd-negative-gap elementor-element elementor-element-0fe49f0 e-flex e-con-boxed wd-section-disabled e-con e-parent"
                                        data-id="0fe49f0" data-element_type="container"
                                        data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                        data-core-v316-plus="true">
                                        <div class="e-con-inner">
                                            <div class="wd-negative-gap elementor-element elementor-element-29df872 wd-section-stretch e-flex e-con-boxed e-con e-child"
                                                data-id="29df872" data-element_type="container"
                                                data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}">
                                                <div class="e-con-inner">
                                                    <div class="elementor-element elementor-element-633b37f e-con-full e-flex wd-section-disabled e-con e-child"
                                                        data-id="633b37f"
                                                        data-element_type="container"
                                                        data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}">
                                                        <div class="elementor-element elementor-element-6a4aa44 elementor-widget elementor-widget-wd_title"
                                                            data-id="6a4aa44"
                                                            data-element_type="widget"
                                                            data-widget_type="wd_title.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="title-wrapper set-mb-s reset-last-child wd-title-color-primary wd-title-style-simple wd-title-size-default text-left">

                                                                    <div class="title-subtitle subtitle-color-primary subtitle-style-default wd-fontsize-xs">
                                                                        Introduction 
                                                                    </div>

                                                                    <div class="liner-continer">
                                                                        <h4 class="woodmart-title-container title wd-fontsize-l">{{$product->section1['title']}}</h4>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="elementor-element elementor-element-57e50ab color-scheme-inherit text-left elementor-widget elementor-widget-text-editor"
                                                            data-id="57e50ab"
                                                            data-element_type="widget"
                                                            data-widget_type="text-editor.default">
                                                            <div class="elementor-widget-container">
                                                                <style>
                                                                    /*! elementor - v3.18.0 - 20-12-2023 */
                                                                    .elementor-widget-text-editor.elementor-drop-cap-view-stacked .elementor-drop-cap {
                                                                        background-color: #69727d;
                                                                        color: #fff
                                                                    }

                                                                    .elementor-widget-text-editor.elementor-drop-cap-view-framed .elementor-drop-cap {
                                                                        color: #69727d;
                                                                        border: 3px solid;
                                                                        background-color: transparent
                                                                    }

                                                                    .elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap {
                                                                        margin-top: 8px
                                                                    }

                                                                    .elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap-letter {
                                                                        width: 1em;
                                                                        height: 1em
                                                                    }

                                                                    .elementor-widget-text-editor .elementor-drop-cap {
                                                                        float: left;
                                                                        text-align: center;
                                                                        line-height: 1;
                                                                        font-size: 50px
                                                                    }

                                                                    .elementor-widget-text-editor .elementor-drop-cap-letter {
                                                                        display: inline-block
                                                                    }
                                                                </style>
                                                                <p>
                                                                    {!! $product->section1['content'] !!}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wd-negative-gap elementor-element elementor-element-a188198 e-flex e-con-boxed wd-section-disabled e-con e-parent"
                                        data-id="a188198" data-element_type="container"
                                        data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                        data-core-v316-plus="true">
                                        <div class="e-con-inner">
                                            <div class="wd-negative-gap elementor-element elementor-element-f1186f8 wd-section-stretch e-flex e-con-boxed e-con e-child"
                                                data-id="f1186f8" data-element_type="container"
                                                data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}">
                                                <div class="e-con-inner">
                                                    <div class="elementor-element elementor-element-9e1e8ff e-con-full e-flex wd-section-disabled e-con e-child"
                                                        data-id="9e1e8ff"
                                                        data-element_type="container"
                                                        data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}">
                                                        <div class="elementor-element elementor-element-1449cef elementor-widget elementor-widget-image"
                                                            data-id="1449cef"
                                                            data-element_type="widget"
                                                            data-widget_type="image.default">
                                                            <div
                                                                class="elementor-widget-container">
                                                                <style>
                                                                    /*! elementor - v3.18.0 - 20-12-2023 */
                                                                    .elementor-widget-image {
                                                                        text-align: center
                                                                    }

                                                                    .elementor-widget-image a {
                                                                        display: inline-block
                                                                    }

                                                                    .elementor-widget-image a img[src$=".svg"] {
                                                                        width: 48px
                                                                    }

                                                                    .elementor-widget-image img {
                                                                        vertical-align: middle;
                                                                        display: inline-block
                                                                    }
                                                                </style> 
                                                                <img loading="lazy"
                                                                    decoding="async"
                                                                    width="800" height="800"
                                                                    src="{{$product->section2['image']}}"
                                                                    class="attachment-large size-large wp-image-661"
                                                                    alt="" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-59dff9a e-con-full e-flex wd-section-disabled e-con e-child"
                                                        data-id="59dff9a"
                                                        data-element_type="container"
                                                        data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}">
                                                        <div class="elementor-element elementor-element-db18292 elementor-widget elementor-widget-wd_title"
                                                            data-id="db18292"
                                                            data-element_type="widget"
                                                            data-widget_type="wd_title.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="title-wrapper set-mb-s reset-last-child wd-title-color-primary wd-title-style-simple wd-title-size-default text-left">


                                                                    <div class="liner-continer">
                                                                        <h4 class="woodmart-title-container title wd-fontsize-l"> {{$product->section2['title']}}</h4>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        {!! $product->section2['content'] !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wd-negative-gap elementor-element elementor-element-81e9f67 e-flex e-con-boxed wd-section-disabled e-con e-parent"
                                        data-id="81e9f67" data-element_type="container"
                                        data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                        data-core-v316-plus="true">
                                        <div class="e-con-inner">
                                            <div class="wd-negative-gap elementor-element elementor-element-dba6e20 wd-section-stretch e-flex e-con-boxed e-con e-child"
                                                data-id="dba6e20" data-element_type="container"
                                                data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}">
                                                <div class="e-con-inner">
                                                    <div class="elementor-element elementor-element-8f150c1 e-con-full e-flex wd-section-disabled e-con e-child"
                                                        data-id="8f150c1"
                                                        data-element_type="container"
                                                        data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}">
                                                        <div class="elementor-element elementor-element-edca2b7 elementor-widget elementor-widget-image"
                                                            data-id="edca2b7"
                                                            data-element_type="widget"
                                                            data-widget_type="image.default">
                                                            <div
                                                                class="elementor-widget-container">
                                                                <img loading="lazy"
                                                                    decoding="async"
                                                                    width="800" height="800"
                                                                    src="{{$product->section3['image']}}"
                                                                    class="attachment-large size-large wp-image-660"
                                                                    alt=""
                                                                />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-a760338 e-con-full e-flex wd-section-disabled e-con e-child"
                                                        data-id="a760338"
                                                        data-element_type="container"
                                                        data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}">
                                                        <div class="elementor-element elementor-element-4ee8500 elementor-widget elementor-widget-wd_title"
                                                            data-id="4ee8500"
                                                            data-element_type="widget"
                                                            data-widget_type="wd_title.default">
                                                            <div
                                                                class="elementor-widget-container">
                                                                <div
                                                                    class="title-wrapper set-mb-s reset-last-child wd-title-color-primary wd-title-style-simple wd-title-size-default text-left">


                                                                    <div class="liner-continer">
                                                                        <h4
                                                                            class="woodmart-title-container title wd-fontsize-l">
                                                                            {{$product->section3['title']}}</h4>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        {!! $product->section3['content'] !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wd-negative-gap elementor-element elementor-element-c67293b e-flex e-con-boxed wd-section-disabled e-con e-parent"
                                        data-id="c67293b" data-element_type="container"
                                        data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                        data-core-v316-plus="true">
                                        <div class="e-con-inner">
                                            <div class="wd-negative-gap elementor-element elementor-element-aa9e993 wd-section-stretch e-flex e-con-boxed e-con e-child"
                                                data-id="aa9e993" data-element_type="container"
                                                data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}">
                                                <div class="e-con-inner">
                                                    <div class="elementor-element elementor-element-4d91142 e-con-full e-flex wd-section-disabled e-con e-child"
                                                        data-id="4d91142"
                                                        data-element_type="container"
                                                        data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}">
                                                        
                                                        {!! $product->section4['content'] !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="review-tab">
                                <div id="reviews" class="woocommerce-Reviews" data-product-id="655">
                                    <div class="container">
                                        <div class="row">

                                            <div id="comments" class="col-md-6">
                                                <div class="wd-reviews-heading">
                                                    <div class="wd-reviews-tools">
                                                        <h2 class="woocommerce-Reviews-title">
                                                            Reviews </h2>

                                                    </div>

                                                </div>

                                                <div class="wd-reviews-content wd-sticky">
                                                    <p class="woocommerce-noreviews">There are no
                                                        reviews yet.</p>
                                                </div>

                                                <div class="wd-loader-overlay wd-fill"></div>
                                            </div>

                                            <div id="review_form_wrapper" class="wd-form-pos-after col-md-6">
                                                @auth
                                                    @if($product->orders->where('user_id',auth()->id())->isEmpty())
                                                        <p>Reviews are only taken from buyers.</p>
                                                    @elseif(auth()->user()->reviews->where('product_id',$product->id)->isNotEmpty())
                                                        <p>You have reviewed product before</p>
                                                    @else
                                                        <div id="review_form">
                                                            <div id="respond" class="comment-respond">
                                                                <span id="reply-title" class="comment-reply-title">Review {{$product->title}}  </span>
                                                                <form action="{{route('review.store')}}" method="post" id="commentform" class="comment-form">
                                                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                                                    <input type="hidden" name="order_item_id" value="{{$product->orders->where('user_id',auth()->id())->id}}">
                                                                    <input type="hidden" name="order_id" value="{{$product->orders->where('user_id',auth()->id())->order_id}}">
                                                                    <div class="d-flex w-100 ps-2">
                                                                        <label for="rating w-50">Your rating&nbsp;
                                                                            <span class="required">*</span>
                                                                        </label>
                                                                        <div class="w-50 ps-3">
                                                                            <select name="rating" id="rating" required >
                                                                                <option value="">Rate&hellip; </option>
                                                                                <option value="5">Perfect</option>
                                                                                <option value="4">Good</option>
                                                                                <option value="3">Average</option>
                                                                                <option value="2">Not that bad</option>
                                                                                <option value="1">Very poor</option>
                                                                            </select>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    <p class="comment-form-comment">
                                                                        <label for="comment">Your review&nbsp;
                                                                            <span class="required">*</span>
                                                                        </label>
                                                                        <textarea class="p-4" id="comment" name="body
                                                                        " cols="45" rows="8" required></textarea>
                                                                    </p>
                                                                    <p class="form-submit">
                                                                        <input name="submit" type="submit" id="submit" class="submit" value="Submit" />
                                                                    </p>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    @endif


                                                @else 
                                                <button type="button"
                                                    class="button alt login-side-opener"> Login to Review {{$product->title}}
                                                </button>
                                                @endauth
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="faqs" role="tabpanel" aria-labelledby="faq-tab">
                                <div data-elementor-type="wp-post" data-elementor-id="918"
                                                            class="elementor elementor-918">
                                                            <section
                                                                class="wd-negative-gap elementor-section elementor-top-section elementor-element elementor-element-ce04372 wd-section-stretch elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                                                data-id="ce04372" data-element_type="section"
                                                                data-settings="{&quot;background_background&quot;:&quot;classic&quot;}"
                                                                data-e-bg-lazyload="">
                                                                <div
                                                                    class="elementor-container elementor-column-gap-default">
                                                                    <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-251052c"
                                                                        data-id="251052c" data-element_type="column">
                                                                        <div
                                                                            class="elementor-widget-wrap elementor-element-populated">
                                                                            <div class="elementor-element elementor-element-c1933a5 elementor-widget elementor-widget-wd_accordion"
                                                                                data-id="c1933a5"
                                                                                data-element_type="widget"
                                                                                data-widget_type="wd_accordion.default">
                                                                                <div class="elementor-widget-container">

                                                                                    <div class="wd-accordion wd-style-shadow"
                                                                                        data-state="all_closed">

                                                                                        <div class="wd-accordion-item">
                                                                                            <div class="wd-accordion-title text-left wd-opener-pos-right"
                                                                                                data-accordion-index="0">
                                                                                                <div
                                                                                                    class="wd-accordion-title-text">
                                                                                                    <span>
                                                                                                        How do I set
                                                                                                        an account
                                                                                                        up? </span>
                                                                                                </div>
                                                                                                <span
                                                                                                    class="wd-accordion-opener wd-opener-style-arrow"></span>
                                                                                            </div>

                                                                                            <div class="wd-accordion-content reset-last-child"
                                                                                                data-accordion-index="0">

                                                                                                <p>Click top Right
                                                                                                    side of the
                                                                                                    header on Icon
                                                                                                    “login/register”
                                                                                                    then click on
                                                                                                    register put
                                                                                                    your personal
                                                                                                    details there
                                                                                                    and Verify your
                                                                                                    email Account.
                                                                                                </p>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="wd-accordion-item">
                                                                                            <div class="wd-accordion-title text-left wd-opener-pos-right"
                                                                                                data-accordion-index="1">
                                                                                                <div
                                                                                                    class="wd-accordion-title-text">
                                                                                                    <span>
                                                                                                        Is Herbs of
                                                                                                        Africa®
                                                                                                        secure?
                                                                                                    </span>
                                                                                                </div>
                                                                                                <span
                                                                                                    class="wd-accordion-opener wd-opener-style-arrow"></span>
                                                                                            </div>

                                                                                            <div class="wd-accordion-content reset-last-child"
                                                                                                data-accordion-index="1">

                                                                                                <p>Yes we are
                                                                                                    offering Secure
                                                                                                    payment through
                                                                                                    PayPal &amp;
                                                                                                    Mater Card
                                                                                                    payment gateway.
                                                                                                </p>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="wd-accordion-item">
                                                                                            <div class="wd-accordion-title text-left wd-opener-pos-right"
                                                                                                data-accordion-index="2">
                                                                                                <div
                                                                                                    class="wd-accordion-title-text">
                                                                                                    <span>
                                                                                                        Do you offer
                                                                                                        free
                                                                                                        returns?
                                                                                                    </span>
                                                                                                </div>
                                                                                                <span
                                                                                                    class="wd-accordion-opener wd-opener-style-arrow"></span>
                                                                                            </div>

                                                                                            <div class="wd-accordion-content reset-last-child"
                                                                                                data-accordion-index="2">

                                                                                                <p>No, we are not
                                                                                                    offering Free
                                                                                                    returns, for
                                                                                                    More information
                                                                                                    you can check
                                                                                                    Return policy
                                                                                                    here</p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="elementor-element elementor-element-ce481a5 elementor-widget elementor-widget-wd_accordion"
                                                                                data-id="ce481a5"
                                                                                data-element_type="widget"
                                                                                data-widget_type="wd_accordion.default">
                                                                                <div class="elementor-widget-container">

                                                                                    <div class="wd-accordion wd-style-shadow"
                                                                                        data-state="all_closed">

                                                                                        <div class="wd-accordion-item">
                                                                                            <div class="wd-accordion-title text-left wd-opener-pos-right"
                                                                                                data-accordion-index="0">
                                                                                                <div
                                                                                                    class="wd-accordion-title-text">
                                                                                                    <span>
                                                                                                        Something is
                                                                                                        missing from
                                                                                                        the order?
                                                                                                    </span>
                                                                                                </div>
                                                                                                <span
                                                                                                    class="wd-accordion-opener wd-opener-style-arrow"></span>
                                                                                            </div>

                                                                                            <div class="wd-accordion-content reset-last-child"
                                                                                                data-accordion-index="0">

                                                                                                <p>While our packers
                                                                                                    are pretty great
                                                                                                    at getting your
                                                                                                    order together,
                                                                                                    very rarely they
                                                                                                    may leave an
                                                                                                    item out from
                                                                                                    the order. If
                                                                                                    this happens,
                                                                                                    please just
                                                                                                    reach out to us
                                                                                                    at
                                                                                                    <strong>contact@herbsofafrica.net</strong>
                                                                                                    and we can get
                                                                                                    this sorted for
                                                                                                    you. If this
                                                                                                    happens, we will
                                                                                                    require a photo
                                                                                                    of what you
                                                                                                    received for
                                                                                                    verification
                                                                                                    purposes
                                                                                                </p>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="wd-accordion-item">
                                                                                            <div class="wd-accordion-title text-left wd-opener-pos-right"
                                                                                                data-accordion-index="1">
                                                                                                <div
                                                                                                    class="wd-accordion-title-text">
                                                                                                    <span>
                                                                                                        How do I
                                                                                                        cancel my
                                                                                                        order?
                                                                                                    </span>
                                                                                                </div>
                                                                                                <span
                                                                                                    class="wd-accordion-opener wd-opener-style-arrow"></span>
                                                                                            </div>

                                                                                            <div class="wd-accordion-content reset-last-child"
                                                                                                data-accordion-index="1">

                                                                                                <p>If after placing
                                                                                                    your order you
                                                                                                    realize you’ve
                                                                                                    made a mistake
                                                                                                    or no longer
                                                                                                    want the order,
                                                                                                    then we can
                                                                                                    process a
                                                                                                    cancellation
                                                                                                    within 24 hours
                                                                                                    of the order
                                                                                                    being placed.
                                                                                                    Please reach out
                                                                                                    to us at
                                                                                                    contact@herbsofafrica.net
                                                                                                    and provided
                                                                                                    it’s within 24
                                                                                                    hours and the
                                                                                                    order hasn’t
                                                                                                    shipped, we
                                                                                                    should be able
                                                                                                    to cancel your
                                                                                                    order and
                                                                                                    process a refund
                                                                                                    for you. Once
                                                                                                    your order has
                                                                                                    been shipped it
                                                                                                    is too late to
                                                                                                    cancel your
                                                                                                    order.</p>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="wd-accordion-item">
                                                                                            <div class="wd-accordion-title text-left wd-opener-pos-right"
                                                                                                data-accordion-index="2">
                                                                                                <div
                                                                                                    class="wd-accordion-title-text">
                                                                                                    <span>
                                                                                                        Contact Us
                                                                                                    </span>
                                                                                                </div>
                                                                                                <span
                                                                                                    class="wd-accordion-opener wd-opener-style-arrow"></span>
                                                                                            </div>

                                                                                            <div class="wd-accordion-content reset-last-child"
                                                                                                data-accordion-index="2">

                                                                                                <p>If we still
                                                                                                    haven’t managed
                                                                                                    to answer your
                                                                                                    question please
                                                                                                    feel free to
                                                                                                    contact us and
                                                                                                    we’ll get back
                                                                                                    to you as soon
                                                                                                    as possible.</p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-d11f39b"
                                                                        data-id="d11f39b" data-element_type="column">
                                                                        <div class="elementor-widget-wrap">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </section>
                                                        </div>
                            </div>
                        </div>
                        
                        <div class="container related-and-upsells"></div>

                    </div><!-- #product-655 -->
                </div>
            </div><!-- .main-page-wrapper -->
        </div> <!-- end row -->
    </div>
@endsection
@push('scripts')
    <script type="text/javascript"
        src="{{ asset('wp-content/plugins/woocommerce/assets/js/frontend/single-product.min2ff6.js?ver=8.5.1') }}"
        id="wc-single-product-js" defer="defer" data-wp-strategy="defer"></script>

    <script type="text/javascript"
        src="{{ asset('wp-content/themes/woodmart/js/scripts/wc/ajaxFilters.minc30a.js?7.2.4') }}"
        id="wd-ajax-filters-js"></script>

    <script type="text/javascript"
        src="{{ asset('wp-content/themes/woodmart/js/scripts/wc/sortByWidget.minc30a.js?7.2.4') }}"
        id="wd-sort-by-widget-js"></script>

    <script type="text/javascript"
        src="{{ asset('wp-content/themes/woodmart/js/scripts/wc/shopPageInit.minc30a.js?7.2.4') }}"
        id="wd-shop-page-init-js"></script>

    <script type="text/javascript"
        src="{{ asset('wp-content/themes/woodmart/js/scripts/global/clickOnScrollButton.minc30a.js?7.2.4') }}"
        id="wd-click-on-scroll-btn-js"></script>

    <script type="text/javascript" id="wd-back-history-js"
        src="{{ asset('wp-content/themes/woodmart/js/scripts/global/backHistory.minc30a.js?ver=7.2.4') }}"></script>



    <script type="text/javascript" id="zoom-js" defer="defer" data-wp-strategy="defer"
        src="{{ asset('wp-content/plugins/woocommerce/assets/js/zoom/jquery.zoom.mine850.js?ver=1.7.21-wc.8.5.1') }}">
    </script>

    <script type="text/javascript" id="wd-init-zoom-js"
        src="{{ asset('wp-content/themes/woodmart/js/scripts/wc/initZoom.minc30a.js?ver=7.2.4') }}"></script>

    <script type="text/javascript" id="wd-owl-library-js"
        src="{{ asset('wp-content/themes/woodmart/js/libs/owl.carousel.minc30a.js?ver=7.2.4') }}"></script>

    <script type="text/javascript"
        src="{{ asset('wp-content/themes/woodmart/js/scripts/wc/productImagesGallery.minc30a.js?ver=7.2.4') }}"
        id="wd-product-images-gallery-js"></script>

    <script type="text/javascript" id="imagesloaded-js"
        src="{{ asset('wp-includes/js/imagesloaded.minbb93.js?ver=5.0.0') }}"></script>

    <script type="text/javascript"
        src="{{ asset('wp-content/themes/woodmart/js/libs/photoswipe-bundle.minc30a.js?ver=7.2.4') }}"
        id="wd-photoswipe-bundle-library-js"></script>

    <script type="text/javascript"
        src="{{ asset('wp-content/themes/woodmart/js/scripts/wc/productImages.minc30a.js?ver=7.2.4') }}"
        id="wd-product-images-js"></script>

    <script type="text/javascript" src="{{ asset('wp-content/themes/woodmart/js/scripts/global/callPhotoSwipe.minc30a.js?ver=7.2.4') }}"
        id="wd-photoswipe-js"></script>

    <script type="text/javascript" src="{{ asset('wp-includes/js/comment-reply.min1e39.js?ver=6.4.2') }}"
        id="comment-reply-js" async="async" data-wp-strategy="async"></script>
    {{-- <script type="text/javascript"
        src="{{ asset('wp-content/themes/woodmart/js/scripts/wc/singleProductTabsAccordion.minc30a.js?ver=7.2.4') }}"
        id="wd-single-product-tabs-accordion-js"></script> --}}

    <script type="text/javascript" src="{{ asset('wp-content/themes/woodmart/js/scripts/elements/accordion.minc30a.js?ver=7.2.4') }}"
        id="wd-accordion-element-js"></script>
    <script>
        $('.product_tabs a').click(function(){
            $('.product_tabs li').removeClass('active')
            $(this).parent().addClass('active')
        });
        $(document).on('ready',function(){
            let url = location.href;
            if(url.indexOf("#reviews") > -1){
                $('#review-tab').tab('show')
                $('.product_tabs li').removeClass('active')
                $('#review-tab').parent().addClass('active')
            }
        })
    </script>
@endpush
