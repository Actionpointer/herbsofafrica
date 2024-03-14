@extends('layouts.app')
@push('styles')
    <link rel='stylesheet' id='elementor-post-35-css'
        href="{{asset('wp-content/uploads/elementor/css/post-359840.css?ver=1704940943')}}" type='text/css' media='all' />
    <link rel='stylesheet' id='wd-select2-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-lib-select2.minc30a.css?ver=7.2.4') }}" type='text/css'
        media='all' />
    <link rel='stylesheet' id='wd-woo-mod-shop-table-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-mod-shop-table.minc30a.css?ver=7.2.4') }}" type='text/css'
        media='all' />
    <link rel='stylesheet' id='wd-page-cart-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-page-cart.minc30a.css?ver=7.2.4') }}" type='text/css'
        media='all' />
    <link rel='stylesheet' id='wd-woo-page-cart-predefined-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-page-cart-predefined.minc30a.css?ver=7.2.4') }}"
        type='text/css' media='all' />
    <link rel='stylesheet' id='wd-woo-mod-quantity-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-mod-quantity.minc30a.css?ver=7.2.4') }}" type='text/css'
        media='all' />
    <link rel='stylesheet' id='wd-woo-opt-fbt-cart-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-opt-fbt-cart.minc30a.css?ver=7.2.4') }}" type='text/css'
        media='all' />

    <link rel='stylesheet' id='wd-page-title-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/page-title.minc30a.css?ver=7.2.4') }}" type='text/css'
        media='all' />
    <link rel='stylesheet' id='wd-woo-mod-checkout-steps-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-mod-checkout-steps.minc30a.css?ver=7.2.4') }}"
        type='text/css' media='all' />
    <link rel='stylesheet' id='wd-woo-page-empty-page-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-page-empty-page.minc30a.css?ver=7.2.4') }}" type='text/css'
        media='all' />
    
  
    <style>
        .amount.loading{
            opacity: 1;
            animation: wd-rotate 450ms infinite linear;
            animation-duration: 450ms;
            animation-timing-function: linear;
            animation-delay: 0s;
            animation-iteration-count: infinite;
            animation-direction: normal;
            animation-fill-mode: none;
            animation-play-state: running;
            animation-name: wd-rotate;
            animation-timeline: auto;
            animation-range-start: normal;
            animation-range-end: normal;
        }
            
    </style>
@endpush
@section('main')
<div class="main-page-wrapper">
    <div class="page-title  page-title-default title-size-small title-design-centered color-scheme-light" style="">
        <div class="container">
            <ul class="wd-checkout-steps">
                <li class="step-cart step-active">
                    <a href="javascript:void(0)">
                        <span>Shopping cart</span>
                    </a>
                </li>
                <li class="step-checkout step-inactive">
                    <a @if($carts && $carts->isNotEmpty()) href="{{route('checkout')}}" @else href="javascript:void(0)" @endif>
                        <span>Checkout</span>
                    </a>
                </li>
                <li class="step-complete step-inactive">
                    <span>Order complete</span>
                </li>
                
            </ul>
        </div>
    </div>

    <!-- MAIN CONTENT AREA -->
    <div class="container">
        <div class="row content-layout-wrapper align-items-start">

            <div class="site-content col-lg-12 col-12 col-md-12 wd-builder-off" role="main">

                <article id="post-490" class="post-490 page type-page status-publish hentry">
                    <div class="entry-content">
                        <div class="woocommerce">
                            <div class="woocommerce cart-content-wrapper row">

                                <div class="woocommerce-notices-wrapper">
                                    {{-- <div class="wc-block-components-notice-banner is-success" role="alert">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                            height="24" aria-hidden="true" focusable="false">
                                            <path d="M16.7 7.1l-6.3 8.5-3.3-2.5-.9 1.2 4.5 3.4L17.9 8z"></path>
                                        </svg>
                                        <div class="wc-block-components-notice-banner__content">
                                            Basket updated. </div>
                                    </div> --}}
                                </div>
                                
                                <div class="show_empty_cart col-12" @if($carts && $carts->isNotEmpty()) style="display: none;" @endif>
                                    <p class="cart-empty wd-empty-page">
                                        Your basket is currently empty. 
                                    </p>
                                    <div class="wd-empty-page-text">
                                        Before proceed to checkout you must add some products to your shopping cart.<br>
                                        You will find a lot of interesting products on our "Shop" page. 
                                    </div>
                                    <p class="return-to-shop">
                                        <a class="button wc-backward" href="{{route('shop')}}"> Return to shop </a>
                                    </p>
                                </div>  
                                @if($carts  && $carts->isNotEmpty()) 
                                <div class="woocommerce-cart-form cart-data-form col-12 col-lg-7 col-xl-8">
                                    <div class="cart-table-section">
                                        <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents"
                                            cellspacing="0">
                                            <thead>
                                                <tr>
                                                    
                                                    <th class="product-thumbnail">
                                                        <span class="screen-reader-text">Thumbnail image</span>
                                                    </th>
                                                    <th class="product-name">Product</th>
                                                    <th class="product-price">Price</th>
                                                    <th class="product-quantity">Quantity</th>
                                                    <th class="product-subtotal">Subtotal</th>
                                                    <th class="product-remove">
                                                        <span class="screen-reader-text">Remove item</span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($carts as $cart)
                                                <tr class="woocommerce-cart-form__cart-item cart_item mini_cart_item">
                                                    
                                                    <td class="product-thumbnail">
                                                        <a href="{{$cart['url']}}">
                                                            <img width="300" height="300"
                                                                src="{{$cart['images'][0]}}"
                                                                class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt=""
                                                                decoding="async"
                                                                _srcset="#image2 300w, #image3 150w, #image4 768w, #image5 600w, #image6 800w"
                                                                _sizes="(max-width: 300px) 100vw, 300px"> 
                                                        </a>
                                                    </td>

                                                    <td class="product-name" data-title="Product">
                                                        <a href="{{$cart['url']}}">{{$cart['title']}}</a>
                                                    </td>


                                                    <td class="product-price" data-title="Price">
                                                        <span class="woocs_special_price_code">
                                                            <span class="woocommerce-Price-amount amount">
                                                                <bdi>
                                                                    <span class="woocommerce-Price-currencySymbol">{{session('currency')['symbol']}}</span>
                                                                    <span>{{number_format($cart['prices'][session('currency')['code']])}}</span>
                                                                </bdi>
                                                            </span>
                                                        </span>
                                                    </td>

                                                    <td class="product-quantity" data-title="Quantity">
                                                        <div class="quantity">

                                                            <input type="button" value="-" class="minus qty_minus">
                                                            <label class="screen-reader-text" for="qtyfor{{$cart['product_id']}}">{{$cart['title']}} quantity</label>
                                                            <input type="number" id="qtyfor{{$cart['product_id']}}" class="input-text qty text" value="{{$cart['quantity']}}" title="Qty"
                                                                min="1" max="" data-product_id="{{$cart['product_id']}}"
                                                                step="1" placeholder="" inputmode="numeric"
                                                                autocomplete="off">

                                                            <input type="button" value="+" class="plus qty_plus">
                                                            <input type="hidden" class="cart_price" id="pricefor{{$cart['product_id']}}" value="{{$cart['prices'][session('currency')['code']]}}">
                                                        </div>
                                                    </td>

                                                    <td class="product-subtotal" data-title="Subtotal">
                                                        <span class="woocs_special_price_code">
                                                            <span class="woocommerce-Price-amount amount loading">
                                                                <bdi>
                                                                    <span class="woocommerce-Price-currencySymbol">{{session('currency')['symbol']}}</span>
                                                                    <span id="cart_amount_for{{$cart['product_id']}}">{{number_format($cart['amount'][session('currency')['code']])}}</span>
                                                                    {{-- <input type="hidden" class="cart_amount" id="amountfor{{$cart['product_id']}}" value="{{$cart['amount'][session('currency')['code']]}}"> --}}
                                                                </bdi>

                                                            </span>
                                                        </span>
                                                    </td>
                                                    <td class="product-remove">
                                                        <a href="javascript:void(0)" class="remove remove_from_cart_button" aria-label="Remove this item"
                                                            data-product_id="{{$cart['product_id']}}" data-product_sku="">×</a>
                                                    </td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>

                                        <div class="row cart-actions">
                                            <div class="col-12 order-last order-md-first col-md">

                                                <div class="coupon">
                                                    {{-- <label for="coupon_code" class="screen-reader-text"> Coupon: </label>
                                                    <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Coupon code"> --}}
                                                    <a href="{{route('shop')}}" class="button" name="apply_coupon" value="Apply coupon">
                                                        Continue Shopping
                                                    </a>
                                                </div>

                                            </div>
                                            {{-- <div class="col-12 order-first order-md-last col-md-auto">
                                                <button type="submit" class="button " name="update_cart"
                                                    value="Update basket" disabled="">
                                                    Update basket </button>

                                                <input type="hidden" id="woocommerce-cart-nonce" name="woocommerce-cart-nonce" value="fcee1e7fc9">
                                                <input type="hidden" name="_wp_http_referer" value="/cart/">
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>

                                <div class="cart-totals-section col-12 col-lg-5 col-xl-4 cart-collaterals">
                                    <div class="cart_totals">

                                        <div class="cart-totals-inner set-mb-m reset-last-child">
                                            <h2>Basket totals</h2>

                                            <table cellspacing="0" class="shop_table shop_table_responsive">

                                                <tbody>
                                                    <tr class="cart-subtotal">
                                                        <th>Subtotal</th>
                                                        <td data-title="Subtotal">
                                                            <span class="woocs_special_price_code">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <bdi>
                                                                        <span class="woocommerce-Price-currencySymbol">{{session('currency')['symbol']}}</span>
                                                                        <span class="cart-sum-total">{{$carts->sum('amount.'.session('currency')['code'])}}</span>
                                                                    </bdi>
                                                                </span>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr class="order-total">
                                                        <th>Total</th>
                                                        <td data-title="Total">
                                                            <strong>
                                                                <span class="woocs_special_price_code">
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <bdi>
                                                                            <span class="woocommerce-Price-currencySymbol">{{session('currency')['symbol']}}</span>
                                                                            <span class="cart-sum-total">{{$carts->sum('amount.'.session('currency')['code'])}}</span>
                                                                        </bdi>
                                                                    </span>
                                                                </span>
                                                            </strong>
                                                        </td>
                                                    </tr>


                                                </tbody>
                                            </table>

                                            <div class="wc-proceed-to-checkout">

                                                <a href="{{route('checkout')}}"
                                                    class="checkout-button button alt wc-forward">
                                                    Proceed to checkout</a>
                                            </div>

                                        </div><!--.cart-totals-inner-->
                                    </div>
                                </div>
                                @endif
                            </div>




                            <div class="cart-collaterals">


                            </div>

                        </div>
                    </div>

                </article><!-- #post -->



            </div><!-- .site-content -->



        </div><!-- .main-page-wrapper -->
    </div> 
</div> 
    <!-- end row -->
@endsection

@push('scripts')
    
    <script type="text/javascript" id="wc-country-select-js-extra">
        /* <![CDATA[ */
        var wc_country_select_params = {
            "countries": "{\"US\":{\"AL\":\"Alabama\",\"AK\":\"Alaska\",\"AZ\":\"Arizona\",\"AR\":\"Arkansas\",\"CA\":\"California\",\"CO\":\"Colorado\",\"CT\":\"Connecticut\",\"DE\":\"Delaware\",\"DC\":\"District Of Columbia\",\"FL\":\"Florida\",\"GA\":\"Georgia\",\"HI\":\"Hawaii\",\"ID\":\"Idaho\",\"IL\":\"Illinois\",\"IN\":\"Indiana\",\"IA\":\"Iowa\",\"KS\":\"Kansas\",\"KY\":\"Kentucky\",\"LA\":\"Louisiana\",\"ME\":\"Maine\",\"MD\":\"Maryland\",\"MA\":\"Massachusetts\",\"MI\":\"Michigan\",\"MN\":\"Minnesota\",\"MS\":\"Mississippi\",\"MO\":\"Missouri\",\"MT\":\"Montana\",\"NE\":\"Nebraska\",\"NV\":\"Nevada\",\"NH\":\"New Hampshire\",\"NJ\":\"New Jersey\",\"NM\":\"New Mexico\",\"NY\":\"New York\",\"NC\":\"North Carolina\",\"ND\":\"North Dakota\",\"OH\":\"Ohio\",\"OK\":\"Oklahoma\",\"OR\":\"Oregon\",\"PA\":\"Pennsylvania\",\"RI\":\"Rhode Island\",\"SC\":\"South Carolina\",\"SD\":\"South Dakota\",\"TN\":\"Tennessee\",\"TX\":\"Texas\",\"UT\":\"Utah\",\"VT\":\"Vermont\",\"VA\":\"Virginia\",\"WA\":\"Washington\",\"WV\":\"West Virginia\",\"WI\":\"Wisconsin\",\"WY\":\"Wyoming\",\"AA\":\"Armed Forces (AA)\",\"AE\":\"Armed Forces (AE)\",\"AP\":\"Armed Forces (AP)\"}}",
            "i18n_select_state_text": "Select an option\u2026",
            "i18n_no_matches": "No matches found",
            "i18n_ajax_error": "Loading failed",
            "i18n_input_too_short_1": "Please enter 1 or more characters",
            "i18n_input_too_short_n": "Please enter %qty% or more characters",
            "i18n_input_too_long_1": "Please delete 1 character",
            "i18n_input_too_long_n": "Please delete %qty% characters",
            "i18n_selection_too_long_1": "You can only select 1 item",
            "i18n_selection_too_long_n": "You can only select %qty% items",
            "i18n_load_more": "Loading more results\u2026",
            "i18n_searching": "Searching\u2026"
        };
        /* ]]> */
    </script>
    <script type="text/javascript"
        src="{{ asset('wp-content/plugins/woocommerce/assets/js/frontend/country-select.min2ff6.js?ver=8.5.1') }}"
        id="wc-country-select-js" defer="defer" data-wp-strategy="defer"></script>
    <script type="text/javascript" id="wc-address-i18n-js-extra">
        /* <![CDATA[ */
        var wc_address_i18n_params = {
            "locale": "{\"US\":{\"postcode\":{\"label\":\"Postcode\"},\"state\":{\"label\":\"State\"}},\"GB\":{\"postcode\":{\"label\":\"Postcode\"},\"state\":{\"label\":\"County\",\"required\":false}},\"default\":{\"first_name\":{\"label\":\"First name\",\"required\":true,\"class\":[\"form-row-first\"],\"autocomplete\":\"given-name\",\"priority\":10},\"last_name\":{\"label\":\"Last name\",\"required\":true,\"class\":[\"form-row-last\"],\"autocomplete\":\"family-name\",\"priority\":20},\"country\":{\"type\":\"country\",\"label\":\"Country\\\/Region\",\"required\":true,\"class\":[\"form-row-wide\",\"address-field\",\"update_totals_on_change\"],\"autocomplete\":\"country\",\"priority\":40},\"address_1\":{\"label\":\"Street address\",\"placeholder\":\"House number and street name\",\"required\":true,\"class\":[\"form-row-wide\",\"address-field\"],\"autocomplete\":\"address-line1\",\"priority\":50},\"city\":{\"label\":\"Town \\\/ City\",\"required\":true,\"class\":[\"form-row-wide\",\"address-field\"],\"autocomplete\":\"address-level2\",\"priority\":70},\"state\":{\"type\":\"state\",\"label\":\"State \\\/ County\",\"required\":true,\"class\":[\"form-row-wide\",\"address-field\"],\"validate\":[\"state\"],\"autocomplete\":\"address-level1\",\"priority\":80},\"postcode\":{\"label\":\"Postcode \\\/ ZIP\",\"required\":true,\"class\":[\"form-row-wide\",\"address-field\"],\"validate\":[\"postcode\"],\"autocomplete\":\"postal-code\",\"priority\":90},\"0\":\"first_name\",\"1\":\"last_name\",\"2\":\"company\",\"3\":\"address_1\",\"4\":\"address_2\",\"5\":\"country\",\"6\":\"city\",\"7\":\"state\",\"8\":\"postcode\",\"9\":\"phone\"}}",
            "locale_fields": "{\"address_1\":\"#billing_address_1_field, #shipping_address_1_field\",\"address_2\":\"#billing_address_2_field, #shipping_address_2_field\",\"state\":\"#billing_state_field, #shipping_state_field, #calc_shipping_state_field\",\"postcode\":\"#billing_postcode_field, #shipping_postcode_field, #calc_shipping_postcode_field\",\"city\":\"#billing_city_field, #shipping_city_field, #calc_shipping_city_field\"}",
            "i18n_required_text": "required",
            "i18n_optional_text": "optional"
        };
        /* ]]> */
    </script>
    <script type="text/javascript"
        src="{{ asset('wp-content/plugins/woocommerce/assets/js/frontend/address-i18n.min2ff6.js?ver=8.5.1') }}"
        id="wc-address-i18n-js" defer="defer" data-wp-strategy="defer"></script>

    
    <script type="text/javascript"
        src="{{ asset('wp-content/plugins/woocommerce/assets/js/frontend/tokenization-form.min2ff6.js?ver=8.5.1') }}"
        id="woocommerce-tokenization-form-js"></script>
    <script type="text/javascript"
        src="{{ asset('wp-content/plugins/woocommerce-gateway-stripe/assets/js/jquery.mask.min15a9.js?ver=7.9.1') }}"
        id="jquery-mask-js"></script>
    <script type="text/javascript"
        src="{{ asset('wp-content/themes/woodmart/js/scripts/wc/woocommerceWrappTable.minc30a.js?ver=7.2.4') }}"
        id="wd-woocommerce-wrapp-table-js"></script>
@endpush
