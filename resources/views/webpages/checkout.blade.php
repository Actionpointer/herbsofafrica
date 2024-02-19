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

    <link rel='stylesheet' id='wd-woo-mod-grid-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-mod-grid.minc30a.css?ver=7.2.4') }}" type='text/css'
        media='all' />
    <link rel='stylesheet' id='wd-page-checkout-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-page-checkout.minc30a.css?ver=7.2.4') }}" type='text/css'
        media='all' />
    <link rel='stylesheet' id='wd-page-checkout-payment-methods-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-page-checkout-el-payment-methods.minc30a.css?ver=7.2.4') }}"
        type='text/css' media='all' />
    <link rel='stylesheet' id='wd-woo-page-checkout-predefined-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-page-checkout-predefined.minc30a.css?ver=7.2.4') }}"
        type='text/css' media='all' />
    <link rel='stylesheet' id='wd-woo-opt-manage-checkout-prod-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-opt-manage-checkout-prod.minc30a.css?ver=7.2.4') }}"
        type='text/css' media='all' />
    <link rel='stylesheet' id='wd-woo-opt-fbt-cart-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-opt-fbt-cart.minc30a.css?ver=7.2.4') }}" type='text/css'
        media='all' />
    <link rel='stylesheet' id='wd-page-title-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/page-title.minc30a.css?ver=7.2.4') }}" type='text/css'
        media='all' />
    <link rel='stylesheet' id='wd-woo-mod-checkout-steps-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-mod-checkout-steps.minc30a.css?ver=7.2.4') }}"
        type='text/css' media='all' />
    <link rel='stylesheet' id='wd-woo-mod-quantity-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-mod-quantity.minc30a.css?ver=7.2.4') }}" type='text/css'
        media='all' />


@endpush
@section('main')
<div class="main-page-wrapper">
    <div class="page-title  page-title-default title-size-small title-design-centered color-scheme-light" style="">
        <div class="container">
            <ul class="wd-checkout-steps">
                <li class="step-cart step-inactive">
                    <a href="{{route('cart')}}">
                        <span>Shopping cart</span>
                    </a>
                </li>
                <li class="step-checkout step-active">
                    <a href="javascript:void(0)">
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

                <article id="post-18" class="post-18 page type-page status-publish hentry">

                    <div class="entry-content">
                        <div class="woocommerce">
                            <div class="woocommerce-notices-wrapper"></div>
                            <div class="woocommerce-notices-wrapper"></div>
                            <form name="checkout" method="post" class="checkout woocommerce-checkout row"
                                action="https://herbsofafrica.com/checkout/" enctype="multipart/form-data">

                                <div class="col-12 col-md-5 col-lg-6">
                                    <div class="row" id="customer_details">
                                        {{-- <div class="col-12">
                                            <div class="woocommerce-billing-fields">

                                                <h3>Billing Details</h3>
                                                <div class="woocommerce-billing-fields__field-wrapper">
                                                    <p class="form-row form-row-first validate-required" id="billing_first_name_field" data-priority="10">
                                                        <label for="billing_first_name" class="">First name&nbsp;
                                                            <abbr class="required" title="required">*</abbr>
                                                        </label>
                                                        <span class="woocommerce-input-wrapper">
                                                            <input type="text" class="input-text " name="billing_first_name" id="billing_first_name" placeholder="" value="" autocomplete="given-name" />
                                                        </span>
                                                    </p>
                                                    <p class="form-row form-row-last validate-required" id="billing_last_name_field" data-priority="20">
                                                        <label for="billing_last_name" class="">Last name&nbsp;
                                                            <abbr class="required" title="required">*</abbr>
                                                        </label>
                                                        <span class="woocommerce-input-wrapper">
                                                            <input type="text" class="input-text" name="billing_last_name" id="billing_last_name" placeholder="" value="" autocomplete="family-name" /></span></p>
                                                    <p class="form-row form-row-wide address-field update_totals_on_change validate-required" id="billing_country_field" data-priority="40">
                                                        <label for="billing_country" class="">Country/Region&nbsp;
                                                            <abbr class="required" title="required">*</abbr>
                                                        </label>
                                                        <span class="woocommerce-input-wrapper">
                                                            <select name="billing_country" id="billing_country" class="country_to_state country_select select2"
                                                                autocomplete="country"
                                                                data-placeholder="Select a country / region&hellip;"
                                                                data-label="Country/Region">

                                                                <option value="GB">United Kingdom (UK)</option>
                                                                <option value="US" selected='selected'>United
                                                                    States (US)</option>
                                                            </select>
                                                        </span>
                                                    </p>
                                                    <p class="form-row form-row-wide address-field validate-required" id="billing_address_1_field" data-priority="50">
                                                        <label for="billing_address_1" class="">Street address&nbsp;
                                                            <abbr class="required" title="required">*</abbr>
                                                        </label>
                                                        <span class="woocommerce-input-wrapper">
                                                            <input type="text" class="input-text " name="billing_address_1" id="billing_address_1" placeholder="House number and street name" value="" autocomplete="address-line1" />
                                                        </span>
                                                    </p>
                                                    <p class="form-row form-row-wide address-field validate-required" id="billing_city_field" data-priority="70">
                                                        <label for="billing_city" class="">Town / City&nbsp;
                                                            <abbr class="required" title="required">*</abbr>
                                                        </label>
                                                        <span class="woocommerce-input-wrapper">
                                                            <input type="text" class="input-text " name="billing_city" id="billing_city" placeholder="" value="" autocomplete="address-level2" />
                                                        </span>
                                                    </p>
                                                    <p class="form-row form-row-wide address-field validate-required validate-state" id="billing_state_field" data-priority="80">
                                                        <label for="billing_state" class="">State&nbsp;
                                                            <abbr class="required" title="required">*</abbr>
                                                        </label>
                                                        <span class="woocommerce-input-wrapper">
                                                            <select name="billing_state" id="billing_state" class="state_select" autocomplete="address-level1" data-placeholder="Select an option&hellip;" data-input-classes="" data-label="State">
                                                                <option value="">Select an option&hellip; </option>
                                                                <option value="AL" selected='selected'>Alabama </option>
                                                                <option value="AK">Alaska</option>
                                                                <option value="AZ">Arizona</option>
                                                                <option value="AR">Arkansas</option>
                                                                <option value="CA">California</option>
                                                                <option value="CO">Colorado</option>
                                                                <option value="CT">Connecticut</option>
                                                                <option value="DE">Delaware</option>
                                                                <option value="DC">District Of Columbia</option>
                                                                <option value="FL">Florida</option>
                                                                <option value="GA">Georgia</option>
                                                                <option value="HI">Hawaii</option>
                                                                <option value="ID">Idaho</option>
                                                                <option value="IL">Illinois</option>
                                                                <option value="IN">Indiana</option>
                                                                <option value="IA">Iowa</option>
                                                                <option value="KS">Kansas</option>
                                                                <option value="KY">Kentucky</option>
                                                                <option value="LA">Louisiana</option>
                                                                <option value="ME">Maine</option>
                                                                <option value="MD">Maryland</option>
                                                                <option value="MA">Massachusetts</option>
                                                                <option value="MI">Michigan</option>
                                                                <option value="MN">Minnesota</option>
                                                                <option value="MS">Mississippi</option>
                                                                <option value="MO">Missouri</option>
                                                                <option value="MT">Montana</option>
                                                                <option value="NE">Nebraska</option>
                                                                <option value="NV">Nevada</option>
                                                                <option value="NH">New Hampshire</option>
                                                                <option value="NJ">New Jersey</option>
                                                                <option value="NM">New Mexico</option>
                                                                <option value="NY">New York</option>
                                                                <option value="NC">North Carolina</option>
                                                                <option value="ND">North Dakota</option>
                                                                <option value="OH">Ohio</option>
                                                                <option value="OK">Oklahoma</option>
                                                                <option value="OR">Oregon</option>
                                                                <option value="PA">Pennsylvania</option>
                                                                <option value="RI">Rhode Island</option>
                                                                <option value="SC">South Carolina</option>
                                                                <option value="SD">South Dakota</option>
                                                                <option value="TN">Tennessee</option>
                                                                <option value="TX">Texas</option>
                                                                <option value="UT">Utah</option>
                                                                <option value="VT">Vermont</option>
                                                                <option value="VA">Virginia</option>
                                                                <option value="WA">Washington</option>
                                                                <option value="WV">West Virginia</option>
                                                                <option value="WI">Wisconsin</option>
                                                                <option value="WY">Wyoming</option>
                                                                <option value="AA">Armed Forces (AA)</option>
                                                                <option value="AE">Armed Forces (AE)</option>
                                                                <option value="AP">Armed Forces (AP)</option>
                                                            </select>
                                                        </span>
                                                    </p>
                                                    <p class="form-row form-row-wide address-field validate-required validate-postcode" id="billing_postcode_field" data-priority="90">
                                                        <label for="billing_postcode" class="">Postcode&nbsp;
                                                            <abbr class="required" title="required">*</abbr>
                                                        </label>
                                                        <span class="woocommerce-input-wrapper">
                                                            <input type="text" class="input-text " name="billing_postcode" id="billing_postcode" placeholder="" value="" autocomplete="postal-code" />
                                                        </span>
                                                    </p>
                                                   
                                                </div>

                                            </div>

                                        </div> --}}

                                        <div class="col-12">
                                            
                                            <div class="woocommerce-shipping-fields">
                                                <h3>Shipment Address</h3>
                                                {{-- <h3 id="ship-to-different-address">
                                                    <label
                                                        class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
                                                        <input id="ship-to-different-address-checkbox"
                                                            class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox"
                                                            type="checkbox" name="ship_to_different_address"
                                                            value="1" /> <span>Deliver to a different
                                                            address?</span>
                                                    </label>
                                                </h3> --}}

                                                <div class="shipping_address">
                                                    <div class="woocommerce-shipping-fields__field-wrapper">
                                                        <p class="form-row form-row-first validate-required" id="shipping_first_name_field" data-priority="10">
                                                            <label for="shipping_first_name" class="">
                                                                First name&nbsp;
                                                                <abbr class="required" title="required">*</abbr>
                                                            </label>
                                                            <span class="woocommerce-input-wrapper">
                                                                <input type="text" class="input-text " name="shipping_first_name" id="shipping_first_name" placeholder="" value="" autocomplete="given-name" />
                                                            </span>
                                                        </p>
                                                        <p class="form-row form-row-last validate-required" id="shipping_last_name_field" data-priority="20">
                                                            <label for="shipping_last_name" class="">Last name&nbsp;
                                                                <abbr class="required" title="required">*</abbr>
                                                            </label>
                                                            <span class="woocommerce-input-wrapper">
                                                                <input type="text" class="input-text " name="shipping_last_name" id="shipping_last_name" placeholder="" value="" autocomplete="family-name" />
                                                            </span>
                                                        </p>
                                                        <p class="form-row form-row-wide address-field update_totals_on_change validate-required" id="shipping_country_field" data-priority="40">
                                                            <label for="shipping_country" class="">Country/Regions
                                                                <abbr class="required" title="required">*</abbr>
                                                            </label>
                                                            <span class="woocommerce-input-wrapper">
                                                                <select name="shipping_country" id="shipping_country" class="country_to_state country_select select2"
                                                                    autocomplete="country" data-placeholder="Select a country / region&hellip;"
                                                                    data-label="Country/Region">
                                                                    <option value="">Select a country / region&hellip;</option>
                                                                    @foreach ($countries as $country)
                                                                        <option value="{{$country->id}}" data-iso="{{$country->iso}}"> {{$country->name}} ({{$country->iso}})</option>
                                                                    @endforeach  
                                                                </select>
                                                            </span>
                                                        </p>
                                                        <p class="form-row form-row-wide address-field validate-required" id="shipping_address_1_field" data-priority="50">
                                                            <label for="shipping_address_1" class="">Street address&nbsp;
                                                                <abbr class="required" title="required">*</abbr>
                                                            </label>
                                                            <span class="woocommerce-input-wrapper">
                                                                <input type="text" class="input-text " name="shipping_address_1" id="shipping_address_1" placeholder="House number and street name" value="" autocomplete="address-line1" />
                                                            </span>
                                                        </p>
                                                        <p class="form-row form-row-wide address-field validate-required" id="shipping_city_field" data-priority="70">
                                                            <label for="shipping_city" class="">Town / City&nbsp;
                                                                <abbr class="required" title="required">*</abbr>
                                                            </label>
                                                            <span class="woocommerce-input-wrapper">
                                                                <input type="text" class="input-text " name="shipping_city" id="shipping_city" placeholder="" value="" autocomplete="address-level2" />
                                                            </span>
                                                        </p>
                                                        <p class="form-row form-row-wide address-field validate-required validate-state" id="shipping_state_field" data-priority="80">
                                                            <label for="shipping_state" class="">State&nbsp;
                                                                <abbr class="required" title="required">*</abbr>
                                                            </label>
                                                            <span class="woocommerce-input-wrapper">
                                                                <select  name="shipping_state" id="shipping_state" class="state_select select2" autocomplete="address-level1"
                                                                    data-placeholder="Select an option"
                                                                    data-input-classes="" data-label="State">
                                                                    <option value="">Select an option</option>
                                                                </select>
                                                            </span>
                                                        </p>
                                                        <p class="form-row form-row-wide address-field validate-required validate-postcode"
                                                            id="shipping_postcode_field" data-priority="90">
                                                            <label for="shipping_postcode" class="">Postcode&nbsp;
                                                                <abbr class="required" title="required">*</abbr>
                                                            </label>
                                                            <span class="woocommerce-input-wrapper">
                                                                <input type="text"  class="input-text " name="shipping_postcode" id="shipping_postcode" placeholder="" value="" autocomplete="postal-code" />
                                                            </span>
                                                        </p>
                                                        <p class="form-row form-row-wide validate-required validate-phone" id="billing_phone_field" data-priority="100">
                                                            <label for="billing_phone" class="">Phone&nbsp;
                                                                <abbr class="required" title="required">*</abbr>
                                                            </label>
                                                            <span class="woocommerce-input-wrapper">
                                                                <input type="tel" class="input-text " name="billing_phone" id="billing_phone" placeholder="" value="" autocomplete="tel" />
                                                            </span>
                                                        </p>
                                                        <p class="form-row form-row-wide validate-required validate-email" id="billing_email_field" data-priority="110">
                                                            <label for="billing_email" class="">Email address&nbsp;
                                                                <abbr class="required" title="required">*</abbr>
                                                            </label>
                                                            <span class="woocommerce-input-wrapper">
                                                                <input type="email" class="input-text " name="billing_email" id="billing_email" placeholder="" value="" autocomplete="email username" />
                                                            </span>
                                                        </p>
                                                    </div>


                                                </div>

                                            </div>
                                            <div class="woocommerce-additional-fields">
                                                <div class="woocommerce-additional-fields__field-wrapper">
                                                    <p class="form-row notes" id="order_comments_field" data-priority="">
                                                        <label for="order_comments" class="">Order notes&nbsp;
                                                            <span class="optional">(optional)</span>
                                                        </label>
                                                        <span class="woocommerce-input-wrapper">
                                                            <textarea name="order_comments" class="input-text " id="order_comments" placeholder="Notes about your order, e.g. special notes for delivery." rows="2" cols="5"></textarea>
                                                        </span>
                                                    </p>
                                                </div>
                                                <input type="hidden" name="wc_order_attribution_type" value="" />
                                                <input type="hidden" name="wc_order_attribution_url" value="" />
                                                <input type="hidden" name="wc_order_attribution_utm_campaign" value="" />
                                                <input type="hidden" name="wc_order_attribution_utm_source" value="" />
                                                <input type="hidden" name="wc_order_attribution_utm_medium" value="" />
                                                <input type="hidden" name="wc_order_attribution_utm_content" value="" />
                                                <input type="hidden" name="wc_order_attribution_utm_id" value="" />
                                                <input type="hidden" name="wc_order_attribution_utm_term" value="" />
                                                <input type="hidden" name="wc_order_attribution_session_entry" value="" />
                                                <input type="hidden" name="wc_order_attribution_session_start_time" value="" />
                                                <input type="hidden" name="wc_order_attribution_session_pages" value="" />
                                                <input type="hidden" name="wc_order_attribution_session_count" value="" />
                                                <input type="hidden" name="wc_order_attribution_user_agent" value="" />
                                            </div>
                                        </div>
                                    </div>



                                </div>

                                <div class="col-12 col-md-7 col-lg-6">
                                    <div class="checkout-order-review">

                                        <h3 id="order_review_heading">Your order</h3>
                                        <div id="order_review" class="woocommerce-checkout-review-order">
                                            <div class="wd-table-wrapper wd-manage-on">
                                                <table class="shop_table woocommerce-checkout-review-order-table">
                                                    <thead>
                                                        <tr>
                                                            <th class="product-name">Product</th>
                                                            <th class="product-total">Subtotal</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($carts as $cart)
                                                        <tr class="cart_item">
                                                            <td class="wd-checkout-prod">


                                                                <div class="wd-checkout-prod-cont">
                                                                    <div class="wd-checkout-prod-title">
                                                                        <span class="cart-product-label">{{$cart['title']}}</span>

                                                                        <div class="quantity">

                                                                            <input type="button" value="-"
                                                                                class="minus" />

                                                                            <label class="screen-reader-text"
                                                                                for="qtyfor{{$cart['product_id']}}">{{$cart['title']}}
                                                                                quantity</label>
                                                                            <input type="number"
                                                                                id="qtyfor{{$cart['product_id']}}"
                                                                                class="input-text qty text" value="{{$cart['quantity']}}"
                                                                                title="Qty" min="1"
                                                                                data-product_id="{{$cart['product_id']}}"
                                                                                name="cart[c0f168ce8900fa56e57789e2a2f2c9d0][qty]"
                                                                                step="1" placeholder=""
                                                                                inputmode="numeric" autocomplete="off">

                                                                            <input type="button" value="+"
                                                                                class="plus" />

                                                                        </div>

                                                                    </div>

                                                                    <div class="wd-checkout-prod-total product-total">
                                                                        <span class="woocs_special_price_code">
                                                                            <span class="woocommerce-Price-amount amount loading">
                                                                                <bdi>
                                                                                    <span class="woocommerce-Price-currencySymbol">{{session('currency')['symbol']}}</span>
                                                                                    <span id="cart_amount_for{{$cart['product_id']}}">{{number_format($cart['amount'][session('currency')['code']])}}</span>
                                                                                    {{-- <input type="hidden" class="cart_amount" id="amountfor{{$cart['product_id']}}" value="{{$cart['amount'][session('currency')['code']]}}"> --}}
                                                                                </bdi>
                
                                                                            </span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        {{-- <tr class="cart_item">
                                                            <td class="wd-checkout-prod">


                                                                <div class="wd-checkout-prod-cont">
                                                                    <div class="wd-checkout-prod-title">
                                                                        <span class="cart-product-label">Recnac</span>

                                                                        <div class="quantity">

                                                                            <input type="button" value="-"
                                                                                class="minus" />

                                                                            <label class="screen-reader-text"
                                                                                for="quantity_65ae392671963">Recnac
                                                                                quantity</label>
                                                                            <input type="number"
                                                                                id="quantity_65ae392671963"
                                                                                class="input-text qty text" value="2"
                                                                                title="Qty" min="0"
                                                                                max=""
                                                                                name="cart[22fb0cee7e1f3bde58293de743871417][qty]"
                                                                                step="1" placeholder=""
                                                                                inputmode="numeric" autocomplete="off">

                                                                            <input type="button" value="+"
                                                                                class="plus" />

                                                                        </div>

                                                                    </div>

                                                                    <div class="wd-checkout-prod-total product-total">
                                                                        <span class="woocs_special_price_code"><span
                                                                                class="woocommerce-Price-amount amount"><bdi><span
                                                                                        class="woocommerce-Price-currencySymbol">&#36;</span>100</bdi></span></span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr class="cart_item">
                                                            <td class="wd-checkout-prod">


                                                                <div class="wd-checkout-prod-cont">
                                                                    <div class="wd-checkout-prod-title">
                                                                        <span class="cart-product-label">Bellyfat</span>

                                                                        <div class="quantity">

                                                                            <input type="button" value="-"
                                                                                class="minus" />

                                                                            <label class="screen-reader-text"
                                                                                for="quantity_65ae392672254">Bellyfat
                                                                                quantity</label>
                                                                            <input type="number"
                                                                                id="quantity_65ae392672254"
                                                                                class="input-text qty text" value="1"
                                                                                title="Qty" min="0"
                                                                                max=""
                                                                                name="cart[1728efbda81692282ba642aafd57be3a][qty]"
                                                                                step="1" placeholder=""
                                                                                inputmode="numeric" autocomplete="off">

                                                                            <input type="button" value="+"
                                                                                class="plus" />

                                                                        </div>

                                                                    </div>

                                                                    <div class="wd-checkout-prod-total product-total">
                                                                        <span class="woocs_special_price_code"><span
                                                                                class="woocommerce-Price-amount amount"><bdi><span
                                                                                        class="woocommerce-Price-currencySymbol">&#36;</span>45</bdi></span></span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr class="cart_item">
                                                            <td class="wd-checkout-prod">


                                                                <div class="wd-checkout-prod-cont">
                                                                    <div class="wd-checkout-prod-title">
                                                                        <span class="cart-product-label">Cardioright</span>

                                                                        <div class="quantity">

                                                                            <input type="button" value="-"
                                                                                class="minus" />

                                                                            <label class="screen-reader-text"
                                                                                for="quantity_65ae392672bd7">Cardioright
                                                                                quantity</label>
                                                                            <input type="number"
                                                                                id="quantity_65ae392672bd7"
                                                                                class="input-text qty text" value="1"
                                                                                title="Qty" min="0"
                                                                                max=""
                                                                                name="cart[eb6fdc36b281b7d5eabf33396c2683a2][qty]"
                                                                                step="1" placeholder=""
                                                                                inputmode="numeric" autocomplete="off">

                                                                            <input type="button" value="+"
                                                                                class="plus" />

                                                                        </div>

                                                                    </div>

                                                                    <div class="wd-checkout-prod-total product-total">
                                                                        <span class="woocs_special_price_code"><span
                                                                                class="woocommerce-Price-amount amount"><bdi><span
                                                                                        class="woocommerce-Price-currencySymbol">&#36;</span>45</bdi></span></span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                         --}}
                                                        
                                                        
                                                        <input type="hidden" id="_wpnonce" name="_wpnonce" value="4a0cbc77bc" />
                                                        <input type="hidden" name="_wp_http_referer" value="/checkout/" />
                                                        <tr class="coupon-form">
                                                            <td colspan="2">
                                                                <div class="woocommerce-form-coupon-toggle accordion" >
                                                                    <a href="#collapseOne" class="showcoupon collapsed" data-bs-toggle="collapse" >
                                                                        <div class="wc-block-components-notice-banner is-info text-left" role="alert">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                viewBox="0 0 24 24" width="24"
                                                                                height="24" aria-hidden="true"
                                                                                focusable="false">
                                                                                <path
                                                                                    d="M12 3.2c-4.8 0-8.8 3.9-8.8 8.8 0 4.8 3.9 8.8 8.8 8.8 4.8 0 8.8-3.9 8.8-8.8 0-4.8-4-8.8-8.8-8.8zm0 16c-4 0-7.2-3.3-7.2-7.2C4.8 8 8 4.8 12 4.8s7.2 3.3 7.2 7.2c0 4-3.2 7.2-7.2 7.2zM11 17h2v-6h-2v6zm0-8h2V7h-2v2z">
                                                                                </path>
                                                                            </svg>
                                                                            <div class="wc-block-components-notice-banner__content">
                                                                                <span > Have a coupon? Click here to enter your code</span> 
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    
                                                                </div>
                                                                <div id="collapseOne" class="accordion-collapse collapse checkout_coupon">

                                                                    <p>If you have a coupon code, please apply it below.</p>
                                                                
                                                                    <p class="form-row form-row-first">
                                                                        <label for="coupon_code" class="screen-reader-text">Coupon:</label>
                                                                        <input type="text" name="coupon_code" class="input-text" placeholder="Coupon code" id="coupon_code" value="">
                                                                    </p>
                                                                
                                                                    <p class="form-row form-row-last">
                                                                        <button type="submit" class="button" name="apply_coupon" value="Apply coupon">Apply coupon</button>
                                                                    </p>
                                                                    
                                                                    <div class="clear"></div>
                                                                </div>
                                                                
                                                            </td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                    <tfoot>

                                                        <tr class="cart-subtotal">
                                                            <th>Subtotal</th>
                                                            <td><span class="woocs_special_price_code"><span
                                                                        class="woocommerce-Price-amount amount"><bdi><span
                                                                                class="woocommerce-Price-currencySymbol">&#36;</span>695</bdi></span></span>
                                                            </td>
                                                        </tr>
                                                        <tr class="woocommerce-shipping-totals shipping">
                                                            <th>Shipping</th>
                                                            <td data-title="Shipping">
                                                                            <ul id="shipping_method" class="woocommerce-shipping-methods">
                                                                                            <li>
                                                                                <input type="radio" name="shipping_method[0]" data-index="0" id="shipping_method_0_flat_rate1" value="flat_rate:1" class="shipping_method" checked="checked"><label for="shipping_method_0_flat_rate1">Regular (3 – 7 days): <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>12</bdi></span></label>					</li>
                                                                                            <li>
                                                                                <input type="radio" name="shipping_method[0]" data-index="0" id="shipping_method_0_flat_rate2" value="flat_rate:2" class="shipping_method"><label for="shipping_method_0_flat_rate2">Express (1 – 3 days): <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>10</bdi></span></label>					</li>
                                                                                    </ul>
                                                                                
                                                                
                                                                    </td>
                                                        </tr>





                                                        <tr class="order-total">
                                                            <th>Total</th>
                                                            <td><strong><span class="woocs_special_price_code"><span
                                                                            class="woocommerce-Price-amount amount"><bdi><span
                                                                                    class="woocommerce-Price-currencySymbol">&#36;</span>695</bdi></span></span></strong>
                                                            </td>
                                                        </tr>


                                                    </tfoot>
                                                </table>
                                            </div><!-- .wd-table-wrapper -->
                                            <div id="payment" class="woocommerce-checkout-payment">
                                                <ul class="wc_payment_methods payment_methods methods">
                                                    <li class="wc_payment_method payment_method_stripe">
                                                        <input id="payment_method_stripe" type="radio"
                                                            class="input-radio" name="payment_method" value="stripe"
                                                            checked='checked' data-order_button_text="" />

                                                        <label for="payment_method_stripe">
                                                            Credit Card (Stripe) </label>
                                                        <div class="payment_box payment_method_stripe">
                                                            <div id="stripe-payment-data" data-email=""
                                                                data-full-name=" " data-currency="usd">
                                                                <p>Pay with your credit card via Stripe.</p>
                                                                <ul class="woocommerce-SavedPaymentMethods wc-saved-payment-methods"
                                                                    data-count="0">
                                                                    <li class="woocommerce-SavedPaymentMethods-new">
                                                                        <input id="wc-stripe-payment-token-new"
                                                                            type="radio" name="wc-stripe-payment-token"
                                                                            value="new" style="width:auto;"
                                                                            class="woocommerce-SavedPaymentMethods-tokenInput" />
                                                                        <label for="wc-stripe-payment-token-new">Use
                                                                            a new payment method</label>
                                                                    </li>
                                                                </ul>
                                                                <fieldset id="wc-stripe-cc-form"
                                                                    class="wc-credit-card-form wc-payment-form"
                                                                    style="background:transparent;">

                                                                    <div class="form-row form-row-wide">
                                                                        <label for="stripe-card-element">Card
                                                                            Number <span class="required">*</span></label>
                                                                        <div class="stripe-card-group">
                                                                            <div id="stripe-card-element"
                                                                                class="wc-stripe-elements-field">
                                                                                <!-- a Stripe Element will be inserted here. -->
                                                                            </div>

                                                                            <i class="stripe-credit-card-brand stripe-card-brand"
                                                                                alt="Credit Card"></i>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-row form-row-first">
                                                                        <label for="stripe-exp-element">Expiry Date <span class="required">*</span></label>

                                                                        <div id="stripe-exp-element"
                                                                            class="wc-stripe-elements-field">
                                                                            <!-- a Stripe Element will be inserted here. -->
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-row form-row-last">
                                                                        <label for="stripe-cvc-element">Card
                                                                            Code (CVC) <span
                                                                                class="required">*</span></label>
                                                                        <div id="stripe-cvc-element"
                                                                            class="wc-stripe-elements-field">
                                                                            <!-- a Stripe Element will be inserted here. -->
                                                                        </div>
                                                                    </div>
                                                                    <div class="clear"></div>

                                                                    <!-- Used to display form errors -->
                                                                    <div class="stripe-source-errors" role="alert">
                                                                    </div>
                                                                    <div class="clear"></div>
                                                                </fieldset>
                                                                <fieldset>
                                                                    <p
                                                                        class="form-row woocommerce-SavedPaymentMethods-saveNew">
                                                                        <input id="wc-stripe-new-payment-method"
                                                                            name="wc-stripe-new-payment-method"
                                                                            type="checkbox" value="true"
                                                                            style="width:auto;" />
                                                                        <label for="wc-stripe-new-payment-method"
                                                                            style="display:inline;">
                                                                            Save payment information to my
                                                                            account for future purchases.
                                                                        </label>
                                                                    </p>
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div class="form-row place-order">
                                                    <noscript>
                                                        Since your browser does not support JavaScript, or it is
                                                        disabled, please ensure you click the <em>Update
                                                            Totals</em> button before placing your order. You
                                                        may be charged more than the amount stated above if you
                                                        fail to do so. <br /><button type="submit" class="button alt"
                                                            name="woocommerce_checkout_update_totals"
                                                            value="Update totals">Update totals</button>
                                                    </noscript>

                                                    <div class="woocommerce-terms-and-conditions-wrapper">
                                                        <div class="woocommerce-privacy-policy-text">
                                                            <p>Your personal data will be used to process your
                                                                order, support your experience throughout this
                                                                website, and for other purposes described in our
                                                                <a href="../privacy-policy/index.html"
                                                                    class="woocommerce-privacy-policy-link"
                                                                    target="_blank">privacy policy</a>.
                                                            </p>
                                                        </div>
                                                        <div class="woocommerce-terms-and-conditions"
                                                            style="display: none; max-height: 200px; overflow: auto;">
                                                            <p>Please carefully review this terms of service
                                                                agreement (referred to as the
                                                                &#8220;agreement&#8221;). When you make a
                                                                purchase of the product(s) we offer for sale on
                                                                the site, or at any physical retail location
                                                                (&#8220;products&#8221;), or when you access or
                                                                utilize this website, www.herbsofafrica.net, or
                                                                any other websites affiliated with Redsav
                                                                Limited (&#8220;herbs of africa,&#8221;
                                                                &#8220;us,&#8221; &#8220;we,&#8221; or
                                                                &#8220;our&#8221;), its affiliates, or agents
                                                                linked to this agreement (collectively referred
                                                                to as the &#8220;site&#8221;), through any
                                                                means, including engaging with the services and
                                                                resources available or enabled through the site
                                                                (each a &#8220;service,&#8221; and collectively,
                                                                the &#8220;services&#8221;) provided by us,
                                                                registering, or even browsing the site, you
                                                                affirm that (1) you have perused, comprehend,
                                                                and consent to abide by this agreement, (2) you
                                                                are legally eligible to enter into a binding
                                                                contract with the company, and (3) you possess
                                                                the necessary authority to engage in this
                                                                agreement. If you disagree with any aspect of
                                                                this agreement, your access to or use of this
                                                                site and the services is not permitted.</p>
                                                            <p>Certain Services you engage with may involve
                                                                additional terms (&#8220;Supplemental
                                                                Terms&#8221;). These Supplemental Terms will
                                                                either be outlined within this Agreement or
                                                                presented to you for acceptance when you enroll
                                                                in the respective supplemental Service. The
                                                                provisions of this Agreement also apply to the
                                                                Supplemental Terms. In the event of any
                                                                inconsistency between this Agreement and the
                                                                Supplemental Terms, the Supplemental Terms will
                                                                take precedence for the specific Service.</p>
                                                            <p>IT IS YOUR RESPONSIBILITY TO PERIODICALLY REVIEW
                                                                AND ASSESS THIS AGREEMENT. WE RETAIN THE RIGHT
                                                                TO MODIFY THIS AGREEMENT AT OUR DISCRETION,
                                                                WITHOUT ANY PRIOR NOTICE TO YOU. IF YOU DO NOT
                                                                AGREE WITH THIS AGREEMENT, PLEASE REFRAIN FROM
                                                                UTILIZING THIS SITE OR THE SERVICES.</p>
                                                            <p>Kindly be aware that this Agreement is subject to
                                                                potential changes by us at any time, based on
                                                                our sole discretion. Upon making alterations, we
                                                                will provide an updated version of the Agreement
                                                                on the Site. The &#8220;Last Updated&#8221; date
                                                                at the top of the Agreement will also be revised
                                                                accordingly. For users registered to access the
                                                                Services, in the event of significant changes,
                                                                we will send an email notification to the last
                                                                email address you provided as part of the
                                                                Agreement. Modifications to the Agreement will
                                                                be immediately applicable to new users of the
                                                                Site or Services, and will take effect thirty
                                                                (30) days after the posting of such changes on
                                                                the Site for existing users. We may request your
                                                                explicit consent to the revised Agreement before
                                                                you can continue using the Site or the Services.
                                                                Should you disagree with any proposed change(s)
                                                                following notice, you are required to
                                                                discontinue using the Site and/or the Services.
                                                                Otherwise, your ongoing use of the Site and/or
                                                                Services signifies your acceptance of these
                                                                changes. We recommend regularly visiting the
                                                                Site to review the current version of the
                                                                Agreement.</p>
                                                            <h3>USER ACCOUNT REGISTRATION</h3>
                                                            <p>To establish an account and/or complete purchases
                                                                on the Site, you will need to provide specific
                                                                information, including your name and/or a chosen
                                                                username, email address, and password. For
                                                                details on how we collect, utilize, and disclose
                                                                personal information, please consult our Privacy
                                                                Policy. Whenever you log into the Site, your
                                                                access and usage will be considered authorized
                                                                in accordance with this Agreement. We are not
                                                                obligated to scrutinize the authorization or
                                                                source of any such Site access or usage.</p>
                                                            <p>For certain features of the Services, you may
                                                                need to link your account to a third-party
                                                                account (“SNS” or &#8220;Third-Party
                                                                Account&#8221;). This linking permits us to
                                                                access your Third-Party Account in accordance
                                                                with the relevant terms and conditions governing
                                                                its use. By authorizing us to access your
                                                                Third-Party Account, you affirm that you possess
                                                                the right to grant us such access without
                                                                violating any terms and conditions associated
                                                                with the Third-Party Account. This access does
                                                                not entail any fees or usage constraints imposed
                                                                by third-party service providers. Through this
                                                                access, we may retrieve, make accessible, and
                                                                store any content, such as photographs, data,
                                                                text, graphics, messages, and other materials
                                                                stored in your Third-Party Account (&#8220;SNS
                                                                Content&#8221;) to be available on the Site
                                                                through your account. You may also share Content
                                                                obtained through the Services with your
                                                                Third-Party Account. The connection between your
                                                                account and your Third-Party Accounts can be
                                                                disabled at any time through the
                                                                &#8220;Settings&#8221; section of the Site.
                                                                Please note that your interaction with
                                                                third-party service providers linked to your
                                                                Third-Party Accounts is governed solely by your
                                                                agreement(s) with them, and we hold no
                                                                responsibility for personally identifiable
                                                                information shared with them in violation of
                                                                your privacy settings.</p>
                                                            <p>YOU ARE RESPONSIBLE FOR ALL USAGE AND ACCESS TO
                                                                THIS SITE USING YOUR PASSWORD AND
                                                                IDENTIFICATION, WHETHER AUTHORIZED OR NOT. THIS
                                                                INCLUDES ALL COMMUNICATIONS, TRANSMISSIONS, AND
                                                                OBLIGATIONS (INCLUDING FINANCIAL) ARISING FROM
                                                                SUCH USAGE OR ACCESS.</p>
                                                            <p>Securing the confidentiality and security of your
                                                                password and identification is your sole
                                                                responsibility. Promptly inform us of any
                                                                unauthorized use or potential breach of this
                                                                Site&#8217;s security involving your password or
                                                                identification.</p>
                                                            <p>Upon your initial order, we will request shipping
                                                                and payment information. You acknowledge that we
                                                                may update your payment details using
                                                                information supplied by your bank or credit card
                                                                issuer, or other available information to us.
                                                            </p>
                                                            <h3>WEBSITE USAGE TERMS</h3>
                                                            <p>We hereby provide you with a limited license to
                                                                access and utilize the Site for your personal
                                                                use. You are also permitted to copy, distribute,
                                                                and transmit the content of this Site, as long
                                                                as such actions are automatically carried out
                                                                through your browser software in connection with
                                                                your personal use of the Site.</p>
                                                            <p>However, it is important to note the following
                                                                restrictions and guidelines: (a) You are
                                                                prohibited from licensing, selling, renting,
                                                                leasing, transferring, assigning, reproducing,
                                                                distributing, hosting, or engaging in any other
                                                                form of commercial exploitation of the Site or
                                                                Services. (b) Framing or employing framing
                                                                techniques to enclose any of our trademarks,
                                                                logos, or other intellectual property (including
                                                                images, text, page layout, or form) is strictly
                                                                forbidden. (c) Usage of metatags or other
                                                                &#8220;hidden text&#8221; that involves our name
                                                                or trademarks is not permitted. (d)
                                                                Modification, translation, adaptation, merging,
                                                                creation of derivative works, disassembly,
                                                                decompilation, reverse compiling, or reverse
                                                                engineering of any part of the Site is
                                                                prohibited, except to the extent that such
                                                                restrictions are expressly prohibited by
                                                                applicable law. (e) The use of manual or
                                                                automated software, devices, or other processes
                                                                (including, but not limited to, spiders, robots,
                                                                scrapers, crawlers, avatars, data mining tools,
                                                                or similar) to &#8220;scrape&#8221; or download
                                                                data from web pages within the Site is
                                                                prohibited. This excludes operators of public
                                                                search engines, who are granted revocable
                                                                permission to utilize spiders for the sole
                                                                purpose of creating publicly available
                                                                searchable indices of materials, but not for
                                                                caching or archiving such materials. (f) Except
                                                                as explicitly stated in this Agreement, no part
                                                                of the Site or Services may be copied,
                                                                reproduced, distributed, republished,
                                                                downloaded, displayed, posted, or transmitted in
                                                                any form or by any means. (g) You are not
                                                                authorized to remove or obliterate any copyright
                                                                notices or other proprietary markings found on
                                                                or within the Site.</p>
                                                            <p>Please be advised that any upcoming release,
                                                                update, or addition to the Site shall be subject
                                                                to this Agreement. Our suppliers, service
                                                                providers, and we reserve all rights that are
                                                                not specifically granted in this Agreement. Any
                                                                unauthorized use of the Site or Services will
                                                                result in the termination of the licenses
                                                                granted by us under this Agreement.</p>
                                                            <h3>PRODUCT PURCHASES</h3>
                                                            <p>All purchases of products, whether made through
                                                                the Site or any physical retail location, are
                                                                intended for personal, non-commercial use only.
                                                                By making a purchase, you agree not to resell
                                                                any products. Unauthorized sale or linking of
                                                                our products on or to any third-party e-commerce
                                                                site, marketplace, or mobile application without
                                                                our explicit written consent is strictly
                                                                prohibited.</p>
                                                            <p>Certain products available on our Site may be
                                                                exclusively offered online and may have limited
                                                                quantities. Descriptions, images, references,
                                                                features, content, specifications, prices, and
                                                                availability of products are subject to change
                                                                without notice. Current prices can be found on
                                                                the Site. While we make reasonable efforts to
                                                                accurately display product attributes, including
                                                                colors, the actual color you see depends on your
                                                                computer system, and we cannot guarantee precise
                                                                color representation. The presence of products
                                                                on the Site at a given time does not imply or
                                                                guarantee their availability at all times.</p>
                                                            <p>It is your responsibility to ensure compliance
                                                                with all applicable local, state, federal, and
                                                                international laws, including age restrictions,
                                                                related to the possession, use, and sale of any
                                                                item purchased from the Site. By placing an
                                                                order, you confirm that the products will be
                                                                used lawfully.</p>
                                                            <p>We reserve the right, with or without notice, to
                                                                limit the quantity of available products,
                                                                discontinue any product, impose conditions on
                                                                promotions, and refuse service to any user.
                                                                Product descriptions and pricing may change at
                                                                our discretion, and any offers made on the Site
                                                                are void where prohibited.</p>
                                                            <p>When you submit an order to Herbs of Africa, each
                                                                part of it constitutes an offer to purchase. If
                                                                you do not receive a confirmation message from
                                                                Herbs of Africa, please contact our Customer
                                                                Service before re-entering your order. Herbs of
                                                                Africa&#8217;s confirmation of order receipt
                                                                does not signify acceptance. An order is deemed
                                                                accepted only upon the shipment of the ordered
                                                                product(s).</p>
                                                            <p>While we strive to accept all valid orders, Herbs
                                                                of Africa retains the right to decline an order
                                                                for various reasons, such as pricing errors,
                                                                insufficient or incorrect
                                                                billing/payment/shipping information, suspected
                                                                fraudulent activity, or product unavailability
                                                                due to discontinuance. We may also reject orders
                                                                linked to previous payment disputes.</p>
                                                            <p>In cases where a product is discontinued or
                                                                becomes unavailable, Herbs of Africa reserves
                                                                the right to cancel your order and provide a
                                                                refund for the amount paid.</p>
                                                            <p>To safeguard Herbs of Africa&#8217;s intellectual
                                                                property rights, reselling products for personal
                                                                or business profit is strictly prohibited. Herbs
                                                                of Africa reserves the right to refuse any order
                                                                that appears to involve reselling activities.
                                                            </p>
                                                            <h3>SUBSCRIPTION PROCESS, RENEWAL, AND CANCELLATION
                                                            </h3>
                                                            <p>We currently deliver to addresses within the
                                                                United States, Nigeria and the United Kingdom.
                                                                Upon purchasing a subscription to our Products
                                                                via our Site or in our physical stores, we will
                                                                dispatch a supply of the designated Products to
                                                                you for the specified subscription duration. To
                                                                cater to your convenience, we may provide
                                                                various subscription terms and options,
                                                                including the ability to delay or expedite your
                                                                subsequent shipment.</p>
                                                            <p>Your subscription will automatically renew, and
                                                                corresponding charges will apply at the start of
                                                                each new subscription period, unless you opt to
                                                                cancel. It&#8217;s important to note that all
                                                                fees for the Products are non-refundable. If you
                                                                decide to cancel your subscription, we will send
                                                                you any remaining Products from your
                                                                subscription, but we will not issue refunds for
                                                                shipments not received by the cancellation date.
                                                                Your subscription incurs no additional fee apart
                                                                from the cost of the product itself, as well as
                                                                shipping and handling charges. Following your
                                                                initial subscription period and any subsequent
                                                                terms, your subscription will automatically
                                                                extend from the day following the end of the
                                                                current period (referred to as a &#8220;Renewal
                                                                Commencement Date&#8221;). This renewal will
                                                                proceed for another subscription period at our
                                                                prevailing price for that specific subscription.
                                                                Unless you cancel your subscription prior to the
                                                                Renewal Commencement Date by accessing the
                                                                &#8220;Edit Subscription&#8221; section within
                                                                the &#8220;Account&#8221; page, this automatic
                                                                renewal feature will apply to your account.</p>
                                                            <p>If you prefer not to have your subscription renew
                                                                automatically or if you wish to terminate your
                                                                subscription, simply log in and navigate to the
                                                                &#8220;Account&#8221; page. By subscribing, you
                                                                authorize us to charge your chosen payment
                                                                method both at the current point and the start
                                                                of each subsequent subscription period. We will
                                                                send you an email reminder before each
                                                                subscription period&#8217;s payment. If you
                                                                decide to cancel your subscription, your
                                                                subscription will conclude automatically, and no
                                                                further charges will be incurred for the ensuing
                                                                subscription period. You understand that we
                                                                retain the right to terminate or suspend your
                                                                subscription at any time and for any reason, as
                                                                determined in our sole discretion.</p>
                                                            <p>For consumers in the United Kingdom, the prices
                                                                associated with the Products or Services under
                                                                this Agreement include any applicable Sales Tax
                                                                or as specifically indicated. In all other
                                                                instances, the payments detailed in this section
                                                                of the Agreement exclude Sales Tax, which may be
                                                                applicable to the Products or Services provided
                                                                herein. If we ascertain a legal obligation to
                                                                collect Sales Tax in connection with this
                                                                Agreement, we will do so in addition to the
                                                                stipulated payments. Should any Products,
                                                                Services, or corresponding payments be subject
                                                                to Sales Tax in a jurisdiction, and you have not
                                                                remitted the required Sales Tax to us, you will
                                                                be liable for payment of such Sales Tax, along
                                                                with any related penalties or interest, to the
                                                                relevant tax authority. Furthermore, you agree
                                                                to indemnify us for any liability or expenses
                                                                arising from such Sales Taxes. Upon our request,
                                                                you will furnish official receipts from the
                                                                relevant taxing authority as evidence of paid
                                                                taxes. In this context, &#8220;Sales Tax&#8221;
                                                                refers to any sales or use tax, VAT, or similar
                                                                tax on sales proceeds, where the taxing
                                                                jurisdiction does not impose a sales or use tax
                                                                otherwise.</p>
                                                            <h3>BILLING AND PAYMENTS</h3>
                                                            <p>In order to place an order through our Services,
                                                                you are required to furnish valid payment
                                                                information. By providing this payment
                                                                information, you explicitly authorize Herbs of
                                                                Africa to promptly bill your Account for all
                                                                applicable fees and charges as outlined in this
                                                                Agreement. Such authorization implies that no
                                                                further notice or consent is necessary. It is
                                                                your responsibility to promptly inform Herbs of
                                                                Africa of any alterations to your billing
                                                                address, debit card, credit card, or other
                                                                pertinent payment account details. Our accepted
                                                                debit and credit cards include Visa, MasterCard,
                                                                American Express, and Discover, which are valid
                                                                in all countries to which we currently ship
                                                                products. Additionally, in the United States, we
                                                                facilitate payments through PayPal. We also
                                                                honor Herbs of Africa gift cards (&#8220;Gift
                                                                Cards&#8221;) in all countries where our
                                                                products are shipped. Your usage or acquisition
                                                                of Herbs of Africa gift cards is subject to the
                                                                Herbs of Africa Gift Card Terms and Conditions,
                                                                as outlined below (the &#8220;Gift Card
                                                                Terms&#8221;). If you do not agree with the Gift
                                                                Card Terms and Conditions, you are precluded
                                                                from using or purchasing Gift Cards.</p>
                                                            <p>At times, we may, at our sole discretion, offer
                                                                discounts and promotional codes (&#8220;Promo
                                                                Codes&#8221;) that can be redeemed for credit in
                                                                your account or other benefits. Promo Codes are
                                                                subject to individual terms that we establish
                                                                and may only be utilized once per person. Valid
                                                                Promo Codes are those received through official
                                                                Herbs of Africa communications channels. You
                                                                acknowledge that Promo Codes must be used for
                                                                their intended audience and purpose in a legal
                                                                manner. They may not be duplicated, sold, or
                                                                transferred in any way, unless expressly
                                                                sanctioned by us. We retain the right to disable
                                                                Promo Codes at our discretion, and they are not
                                                                redeemable for cash. Additionally, Promo Codes
                                                                may have expiration dates prior to your use.</p>
                                                            <p>If applicable, local taxes may be applied to your
                                                                charges. Should your chosen payment method be
                                                                declined, we will make efforts to process the
                                                                transaction until it is approved. If we
                                                                encounter difficulties in completing the
                                                                transaction, we may directly contact you to
                                                                update your account details.</p>
                                                            <p>Our payment services, including credit card
                                                                transaction processing and merchant settlement,
                                                                are managed by a third-party service provider.
                                                                By accepting this Agreement, you consent to
                                                                Redsav Limited and its third-party service
                                                                provider sharing the necessary information and
                                                                payment instructions to facilitate payment
                                                                transactions as per this Agreement. This
                                                                includes personal, financial, credit card, and
                                                                transaction information. During the initial
                                                                registration of your credit card, a pending
                                                                charge may be visible as part of the account
                                                                verification process. This charge is not an
                                                                actual transaction and is utilized solely to
                                                                confirm account authenticity. Typically, this
                                                                pending charge will automatically clear. If any
                                                                issues arise, please contact support@Herbsof
                                                                Africa.net. We are not liable for any fees or
                                                                charges imposed by your bank or credit card
                                                                issuer.</p>
                                                            <p>Upon delivery of items to the carrier, the risk
                                                                of loss and title for purchased items transfers
                                                                to you. However, if the carrier fails to deliver
                                                                your purchased items within thirty (30) days of
                                                                the specified delivery date, you reserve the
                                                                right to cancel the order and request a
                                                                refund.<br />Your satisfaction is paramount to
                                                                us. Should you not be fully satisfied with your
                                                                initial Product purchase, you have the option to
                                                                request a refund or exchange within 14 days from
                                                                the date of purchase. If you are a consumer in
                                                                Nigeria or the United Kingdom, you possess the
                                                                right to cancel any subscription purchase
                                                                without providing a reason within 14 days of the
                                                                initial purchase, and request a refund of the
                                                                corresponding subscription fee.</p>
                                                            <p>To initiate a refund request, kindly contact us
                                                                at: support@Herbsof Africa.net. Refunds will be
                                                                administered at our discretion and credited to
                                                                the same payment method used for the original
                                                                purchase.</p>
                                                            <h3>GIFT CARDS</h3>
                                                            <p>The utilization of Herbs of Africa Gift Cards is
                                                                governed by the terms and conditions outlined in
                                                                the Gift Card Terms. By purchasing, accepting,
                                                                or using a Gift Card, you expressly agree to
                                                                abide by these Gift Card Terms. If you do not
                                                                concur with these terms, kindly refrain from
                                                                acquiring, accepting, or using a Gift Card.
                                                                These Gift Card Terms are an integral component
                                                                of this Agreement and are considered as
                                                                &#8220;Supplemental Terms,&#8221; as defined
                                                                herein.</p>
                                                            <p>Herbs of Africa Gift Cards are issued and sold by
                                                                Redsav Limited. These cards are available for
                                                                purchase online at www.herbsofafrica.net with
                                                                values ranging up to five hundred USD ($500),
                                                                NGN (500,000), or GBP (£500). To procure a Gift
                                                                Card, you will be required to specify the
                                                                amount, recipient details, including the
                                                                recipient&#8217;s email address, and select the
                                                                date on which the Gift Card will be sent via
                                                                email to the designated recipient (which may
                                                                include yourself). While the recipient may
                                                                reside outside the countries we currently ship
                                                                to, please note that the shipping of Herbs of
                                                                Africa products is currently limited to the
                                                                United States, Nigeria, and the United Kingdom.
                                                            </p>
                                                            <p>During the Gift Card purchase process, you are
                                                                required to provide your billing information at
                                                                the check-out stage. It&#8217;s essential to
                                                                understand that Gift Card purchases are
                                                                non-refundable and considered final.</p>
                                                            <p>When you use your Gift Card for purchases, the
                                                                corresponding amount will be deducted from your
                                                                Gift Card Balance. The remaining balance of your
                                                                Gift Card can be conveniently tracked and viewed
                                                                in your Herbs of Africa.com account balance
                                                                (&#8220;Account Balance&#8221;). These Gift Card
                                                                funds can be effortlessly applied to future
                                                                purchases, negating the need to enter additional
                                                                payment information. However, if a purchase
                                                                surpasses your Gift Card Balance, the
                                                                outstanding amount must be covered using any
                                                                accepted payment method on our Site.<br />Gift
                                                                Cards maintain their value and do not expire due
                                                                to inactivity or diminish in worth over time.
                                                                They are exclusively intended for the
                                                                acquisition of eligible goods offered by Herbs
                                                                of Africa and are not valid for purchasing
                                                                additional Gift Cards. Any credits issued for
                                                                loyalty, rewards, goodwill, promotions, or
                                                                similar purposes (&#8220;Promotional
                                                                Credit&#8221;) are distinct from Gift Cards and
                                                                cannot be used to purchase Gift Cards.
                                                                Furthermore, Gift Cards cannot be reloaded,
                                                                resold, used for unauthorized promotional
                                                                endeavors, redeemed for an amount greater than
                                                                their face value, exchanged for cash (except
                                                                where legally required), or returned for cash
                                                                refunds (except where legally mandated).
                                                                It&#8217;s important to note that the transfer
                                                                of your Account Balance to another Herbs of
                                                                Africa.com account is not
                                                                permissible.<br />It&#8217;s crucial to
                                                                safeguard your Gift Card Balance against theft
                                                                or unauthorized use. Once sold, the title to and
                                                                risk of loss for Gift Cards pass to the
                                                                purchaser. In the event of suspected
                                                                unauthorized use or theft of your Gift Card
                                                                Balance, please contact Herbs of Africa at
                                                                support@HerbsofAfrica.net promptly. Herbs of
                                                                Africa retains the right to reject Gift Cards
                                                                that are suspected of being obtained
                                                                fraudulently.</p>
                                                            <p>By using a Gift Card, you pledge not to employ it
                                                                in any manner that could be construed as
                                                                misleading, deceptive, unfair, or harmful to
                                                                Herbs of Africa or its clientele. In line with
                                                                applicable laws, we maintain the right, without
                                                                prior notice, to void Gift Cards without issuing
                                                                a refund, suspend or terminate customer accounts
                                                                or service access, cancel or restrict orders,
                                                                and charge alternative payment methods if there
                                                                is a reasonable suspicion that a Gift Card has
                                                                been acquired, used, or applied to a Herbs of
                                                                Africa.com account (or your Account Balance
                                                                applied to a purchase) in a fraudulent,
                                                                unlawful, or otherwise non-compliant manner as
                                                                per this Agreement.</p>
                                                            <p>Please be aware that, to the maximum extent
                                                                permitted by law, Herbs of Africa offers no
                                                                warranties, either explicit or implicit,
                                                                pertaining to Gift Cards or your Account
                                                                Balance. This includes, without limitation, any
                                                                warranties of merchantability or fitness for a
                                                                specific purpose.<br />These Gift Card Terms are
                                                                subject to the laws of the State of Texas,
                                                                U.S.A., and shall be fully governed thereby,
                                                                irrespective of choice of law provisions. Any
                                                                disputes related to Gift Cards will be handled
                                                                in accordance with the provisions laid out in
                                                                the &#8220;Arbitration Agreement&#8221; section
                                                                of this Agreement.</p>
                                                            <p>We retain the right to modify these Gift Card
                                                                Terms at our sole discretion without prior
                                                                notice. All Gift Card Terms remain applicable to
                                                                the extent permitted by law. Should any of these
                                                                terms and conditions be deemed invalid, void, or
                                                                unenforceable for any reason, such unenforceable
                                                                portion will be considered separable and will
                                                                not affect the validity and enforceability of
                                                                the remaining terms and conditions.
                                                                Additionally, Herbs of Africa may issue
                                                                Promotional Credit, which is distinct from Gift
                                                                Cards and subject to its own terms, including
                                                                potential expiration dates and other conditions
                                                                as indicated on the Promotional Credit or in
                                                                related promotional materials.</p>
                                                            <h3>PRODUCT REVIEWS</h3>
                                                            <p>Within the scope of the Services, registered
                                                                users have the ability to share their insights,
                                                                evaluations, and comments about Products
                                                                obtained through the Site (collectively referred
                                                                to as &#8220;Reviews&#8221;). You assume full
                                                                responsibility for the content, viewpoints,
                                                                statements, suggestions, or observations
                                                                expressed within these Reviews. It&#8217;s
                                                                important to note that the Reviews published on
                                                                our Services are not endorsed or representative
                                                                of Herbs of Africa&#8217;s perspectives. Any
                                                                perspectives, declarations, advice, ratings, or
                                                                data provided in Reviews are exclusively
                                                                attributed to their respective authors, who bear
                                                                sole responsibility and accountability for their
                                                                content. Consequently, the responsibility and
                                                                liability for any Reviews you submit lies
                                                                exclusively with you, not with Herbs of Africa.
                                                            </p>
                                                            <p>By submitting a Review, you hereby grant Herbs of
                                                                Africa an irrevocable, non-exclusive,
                                                                royalty-free, transferable, perpetual, and fully
                                                                sub-licensable right to: (a) host, employ,
                                                                modify, adapt, reproduce, distribute, translate,
                                                                display, and publish your provided content
                                                                worldwide through any existing or future media,
                                                                (b) make your Review available to others and
                                                                allow them to do the same, (c) enhance, promote,
                                                                and refine the Services, as well as share your
                                                                Review through other media and platforms for
                                                                promotional, broadcasting, syndication,
                                                                distribution, or publication purposes, all in
                                                                accordance with our Privacy Policy and this
                                                                Agreement, and (d) utilize the name and/or
                                                                trademark you submit in connection with your
                                                                Review. It is understood that Herbs of Africa
                                                                may choose to provide attribution to your Review
                                                                at its discretion. Furthermore, you grant Herbs
                                                                of Africa the right to take legal action against
                                                                any entity or individual violating your rights
                                                                or Herbs of Africa&#8217;s rights regarding your
                                                                Review as specified in this Agreement. You
                                                                acknowledge and agree that your Review is
                                                                non-confidential and non-proprietary. By posting
                                                                a Review, you assert, guarantee, and confirm
                                                                that you possess ownership or the necessary
                                                                licenses, rights (including copyrights and other
                                                                proprietary rights), consents, and permissions
                                                                for the authorized publication and use of your
                                                                Review, as well as Herbs of Africa&#8217;s
                                                                publication and use as outlined
                                                                herein.<br />Herbs of Africa retains the
                                                                prerogative to decline or remove any materials
                                                                presented or uploaded within a Review. While
                                                                Herbs of Africa holds no obligation to edit or
                                                                alter any information contained in Reviews or
                                                                arbitrate disputes between contributors, you
                                                                acknowledge that Herbs of Africa bears no
                                                                responsibility for Review content. Herbs of
                                                                Africa is not liable for any claims of financial
                                                                loss stemming from such ratings and reviews.
                                                                Given our expectation for users to maintain the
                                                                integrity of ratings and reviews on the
                                                                Services, you agree: (i) to base your submitted
                                                                rating or review solely on your personal
                                                                experience with the reviewed product; (ii) to
                                                                abstain from submitting ratings or reviews in
                                                                exchange for compensation or benefits from any
                                                                individual or entity; and (iii) to ensure that
                                                                your review aligns with the terms of this
                                                                Agreement.</p>
                                                            <p>Herbs of Africa reserves the right to exclude any
                                                                Review, as determined by our sole discretion, if
                                                                it has the potential to undermine the integrity
                                                                of ratings and reviews. Furthermore, Herbs of
                                                                Africa may delete Reviews if they are found to
                                                                be: a. False, unlawful, deceptive, libelous,
                                                                defamatory, obscene, indecent, offensive,
                                                                suggestive, harassing, or threatening (or if
                                                                they advocate harassment of others); b.
                                                                Flagrantly offensive to the online community,
                                                                such as content promoting racism, hatred,
                                                                bigotry, or physical harm towards individuals or
                                                                groups; c. Encouraging, promoting, or
                                                                instructing illegal activities, criminal
                                                                actions, or any form of conduct violating local,
                                                                national, or international laws; d. Offering
                                                                instructions or information regarding illegal
                                                                actions, such as the creation or acquisition of
                                                                illegal weapons, violation of privacy, or the
                                                                creation of computer viruses; e. Infringing upon
                                                                the patent, trademark, trade secret, copyright,
                                                                or other intellectual property rights of any
                                                                entity; f. Consisting of mass mailings, spam,
                                                                chain letters, or pyramid schemes; g. Falsely
                                                                impersonating a person or entity, or
                                                                misrepresenting your affiliation with any person
                                                                or entity, including Herbs of Africa; h.
                                                                Releasing private information of any third
                                                                party, such as addresses, phone numbers, email
                                                                addresses, social security numbers, or credit
                                                                card numbers; i. Intending to disseminate
                                                                viruses, corrupted data, or other harmful,
                                                                disruptive, or destructive files; j. Irrelevant
                                                                to the subject matter of Reviews or the products
                                                                discussed in the Review; or k. In any other way
                                                                considered objectionable, that restricts or
                                                                inhibits others from using or enjoying the
                                                                Services, or that may expose Herbs of Africa or
                                                                its users to harm or liability of any kind.</p>
                                                            <h3>SMS MARKETING AND SUPPORT PROGRAM</h3>
                                                            <p>By selecting to receive marketing and support
                                                                text messages from us through our Website, you
                                                                are consenting to receive recurring text alerts
                                                                pertaining to your order. These may include, but
                                                                are not limited to, reminders for abandoned
                                                                checkouts, text-based marketing offers, and
                                                                transactional notifications. This also
                                                                encompasses requests for reviews from us.
                                                                It&#8217;s important to note that you may
                                                                receive these notifications even if your mobile
                                                                number is registered on any state or federal
                                                                do-not-call list. The frequency of messages may
                                                                vary. This service is entirely optional and is
                                                                not a prerequisite for making a purchase.</p>
                                                            <p>If you wish to discontinue receiving text
                                                                marketing messages and notifications, simply
                                                                respond with STOP to any text message you
                                                                receive from us. It is understood and agreed
                                                                upon that alternative methods of opting out,
                                                                using different phrasing or requests, will not
                                                                be deemed as valid means of opting out. While
                                                                the service itself is provided free of charge,
                                                                you are responsible for any charges or fees
                                                                associated with text messaging that may be
                                                                imposed by your wireless service provider.
                                                                Please be aware that message and data rates may
                                                                apply. If your mobile carrier does not support
                                                                SMS or MMS messages, you may not be able to
                                                                receive text messages from us. If you have
                                                                inquiries, send HELP to the number from which
                                                                you received the messages. You may also contact
                                                                us at support@HerbsofAfrica.net for further
                                                                assistance.<br />We retain the right to alter
                                                                any telephone number or short code utilized for
                                                                the operation of this service at any time. You
                                                                will be duly informed in such instances. It is
                                                                important to acknowledge that any messages sent
                                                                to a telephone number or short code that has
                                                                been changed, including STOP or HELP requests,
                                                                may not be received. We shall not be held
                                                                responsible for fulfilling requests conveyed in
                                                                such messages.</p>
                                                            <p>To the extent permissible under applicable law,
                                                                you agree that we shall not be held liable for
                                                                any instances of failed, delayed, or misdirected
                                                                delivery of information sent through the
                                                                service, any inaccuracies in said information,
                                                                and/or any actions you may take or abstain from
                                                                taking based on the information received through
                                                                the service.</p>
                                                            <p>To better comprehend how we gather and utilize
                                                                your personal information, please refer to our
                                                                Privacy Policy.</p>
                                                            <h3>DISCLAIMERS</h3>
                                                            <p>We cannot guarantee, promise, or assure that you
                                                                or any other user of the Site will achieve any
                                                                specific or tangible outcome or objective by
                                                                utilizing the Site, or any product or service
                                                                offered on or through the Site.</p>
                                                            <p>Unless otherwise explicitly stated, the Site and
                                                                the products made available on it are presented
                                                                on an &#8220;as is&#8221; and &#8220;as
                                                                available&#8221; basis, without any kind of
                                                                warranties, unless expressly indicated
                                                                otherwise. To the maximum extent permitted by
                                                                applicable law, we renounce all warranties and
                                                                assurances, whether express or implied,
                                                                including, but not limited to, implied
                                                                warranties of merchantability, fitness for a
                                                                specific purpose, and non-infringement.</p>
                                                            <p>We do not warrant or guarantee that the functions
                                                                within the Site will be continuous or
                                                                error-free, that any defects will be rectified,
                                                                or that the Site or the server making it
                                                                available is free from viruses or other harmful
                                                                components. Moreover, we do not provide any
                                                                warranties or representations regarding the
                                                                correctness, accuracy, sufficiency, utility,
                                                                timeliness, reliability, or any other aspect of
                                                                the materials presented on the Site. Depending
                                                                on your jurisdiction, some laws may not permit
                                                                restrictions or exclusions of warranties, hence
                                                                the above restrictions might not be applicable
                                                                to you.</p>
                                                            <p>Any advice or information, whether oral or
                                                                written, received from us or through the Site or
                                                                Services, including in connection with the
                                                                products, will not establish any warranty unless
                                                                explicitly outlined in this agreement.</p>
                                                            <h3>NOTICE REGARDING PROFESSIONAL GUIDANCE</h3>
                                                            <p>This site does not dispense medical or other
                                                                licensed professional counsel. Nothing stated or
                                                                published on this site or made available through
                                                                any services should be construed as, or taken to
                                                                be, medical practice. Within the context of this
                                                                agreement, medical practice encompasses, but is
                                                                not limited to, providing healthcare treatment,
                                                                instructions, diagnoses, prognostications, or
                                                                advice. All materials on the site are intended
                                                                for educational and informational uses only, and
                                                                should not be interpreted as any form of
                                                                guidance. The site is not designed to substitute
                                                                for professional medical advice, diagnosis, or
                                                                treatment. Prior to relying on or deciding to
                                                                act upon any content or information provided
                                                                through the site, always consult your physician
                                                                or other qualified healthcare provider with
                                                                inquiries about a medical condition. Never
                                                                disregard professional medical or health-related
                                                                counsel, or postpone seeking it, due to
                                                                information you have acquired via this site.</p>
                                                            <h3>LIMITATION OF LIABILITY</h3>
                                                            <p>You acknowledge and agree that we shall not be
                                                                held liable for any indirect, incidental,
                                                                special, exemplary, or consequential damages
                                                                arising from or connected to the site or
                                                                services. This includes, but is not limited to,
                                                                damages resulting from loss of data, profits, or
                                                                use, even if we have been advised of the
                                                                possibility of such damages. Additionally, we
                                                                shall not be responsible for damages arising
                                                                from personal injury, bodily harm, or emotional
                                                                distress in connection with this agreement, or
                                                                arising from communications, interactions, or
                                                                meetings with other users of the company&#8217;s
                                                                offerings. This limitation of liability applies
                                                                to all claims, including those arising from: (1)
                                                                the use or inability to use the site or
                                                                services; (2) the cost of obtaining substitute
                                                                goods or services due to goods, data,
                                                                information, or services purchased or obtained
                                                                through the site; (3) unauthorized access or
                                                                alteration of your data or transmissions; (4)
                                                                statements or actions of third parties on the
                                                                site; or (5) any other matter related to the
                                                                site, regardless of whether the claim is based
                                                                on warranty, copyright, contract, tort
                                                                (including negligence), product liability, or
                                                                any other legal theory. Under no circumstances
                                                                will our liability to you exceed the amount
                                                                received by us as a result of your use of the
                                                                site during the subscription period in which you
                                                                first assert a claim. If you have not paid any
                                                                amounts to the company during the subscription
                                                                period in which you first assert a claim, our
                                                                liability shall be limited to fifty us dollars
                                                                ($50), which shall be our sole and exclusive
                                                                liability to you.</p>
                                                            <h3>COPYRIGHT</h3>
                                                            <p>The technology that powers the Site and all
                                                                materials found on the Site, including text,
                                                                graphics, images, audio clips, digital
                                                                downloads, data compilations, and code, are
                                                                subject to copyright protection as a collective
                                                                work under the United States and other
                                                                applicable copyright laws. These materials are
                                                                the exclusive property of Redsav Limited. and
                                                                are safeguarded by copyright and other
                                                                intellectual property and proprietary rights.
                                                                This collective work also encompasses materials
                                                                licensed to Redsav Limited. © 2023. All rights
                                                                reserved.</p>
                                                            <h3>TRADEMARKS</h3>
                                                            <p>All trademarks, service marks and trade names of
                                                                Redsav Limited on the Site, including the Herbs
                                                                of Africa mark, are trademarks or registered
                                                                trademarks of Redsav Limited or their respective
                                                                owners.</p>
                                                            <h3>INDEMNIFICATION</h3>
                                                            <p>To the maximum extent allowed by applicable law,
                                                                you hereby agree to indemnify, defend, and hold
                                                                Redsav Limited., its officers, directors,
                                                                employees, agents, licensors, and suppliers
                                                                harmless from any and all losses, liabilities,
                                                                expenses, damages, and costs, including
                                                                reasonable attorney&#8217;s fees, arising from
                                                                any breach of this Agreement or any actions
                                                                connected to your use of the Site (including
                                                                negligent or wrongful behavior) or by any other
                                                                individual accessing the Site using your
                                                                Internet account. This indemnification also
                                                                encompasses your capability or inability to use
                                                                the Site and Services, as well as any products
                                                                procured through the Site.</p>
                                                            <p>PRIVACY AND INTERNATIONAL USERS</p>
                                                            <p>Your registration details and specific other
                                                                information concerning you are subject to the
                                                                stipulations outlined in our Privacy
                                                                Policy.<br />The Services are operated and
                                                                provided by Herbs of Africa from its facilities
                                                                situated in the Nigeria or the United States.
                                                                Herbs of Africa does not assert that the
                                                                Services are suitable or accessible for
                                                                utilization in other regions. Individuals who
                                                                choose to access or use the Services from
                                                                alternate countries do so voluntarily and are
                                                                accountable for adherence to local laws.</p>
                                                            <p>The subsequent provision pertains solely to
                                                                individuals who are consumers in the United
                                                                Kingdom: A third party who is not a party to
                                                                this Agreement does not possess any entitlement
                                                                under the Contracts (Rights of Third Parties)
                                                                Act 1999 to enforce any provision contained
                                                                within this Agreement. However, this provision
                                                                does not undermine any rights or remedies
                                                                available to such a third party, which are
                                                                separate from those offered by the
                                                                aforementioned Act.</p>
                                                            <p>THIRD-PARTY LINKS AND SITES</p>
                                                            <p>This Site might contain links to other websites
                                                                managed by third parties. We lack control over
                                                                these linked websites, each of which maintains
                                                                distinct privacy and data collection practices
                                                                that are independent of Redsav Limited&#8217;s.
                                                                We assume no responsibility for, and do not
                                                                endorse or assume any liability for the
                                                                availability, content, products, services, or
                                                                utilization of any third-party site, any website
                                                                accessed through a third-party site, or any
                                                                modifications or updates to such sites. These
                                                                linked sites are provided solely for your
                                                                convenience, and you access them at your own
                                                                risk. You acknowledge your assumption of all
                                                                risks associated with accessing and utilizing
                                                                content from a third-party site, and you agree
                                                                that we hold no responsibility for any loss or
                                                                damage you may experience from interactions with
                                                                such a third-party site. If you have any
                                                                concerns regarding these links or the content on
                                                                any such third-party site, you should reach out
                                                                to the administrator of the respective
                                                                third-party site.</p>
                                                            <h3>FEEDBACK</h3>
                                                            <p>By submitting any ideas, suggestions, documents,
                                                                and/or proposals to us through its suggestion,
                                                                feedback, wiki, forum, or similar pages
                                                                (&#8220;Feedback&#8221;), you acknowledge that
                                                                you assume all associated risks, and we bear no
                                                                obligations (including confidentiality
                                                                obligations) regarding such Feedback. You affirm
                                                                and guarantee that you possess all necessary
                                                                rights to provide the Feedback. Hereby, you
                                                                grant us a fully paid, royalty-free, perpetual,
                                                                irrevocable, worldwide, non-exclusive, and fully
                                                                sublicensable right and license to utilize,
                                                                reproduce, execute, display, distribute, adapt,
                                                                modify, reformat, generate derivative works
                                                                from, and otherwise exploit, either commercially
                                                                or non-commercially, in any manner, all
                                                                Feedback. Furthermore, this license extends to
                                                                sublicensing the aforementioned rights in
                                                                connection with the operation and maintenance of
                                                                the Site and Services.</p>
                                                            <h3>MISCELLANEOUS</h3>
                                                            <p>Interactions between you and Herbs of Africa may
                                                                occur through electronic means, whether via
                                                                visiting the Services, sending e-mails,
                                                                receiving notices on the Services, or
                                                                communicating through e-mail. For contractual
                                                                purposes, you (a) consent to receive electronic
                                                                communications from Herbs of Africa, and (b)
                                                                acknowledge that all terms, conditions,
                                                                agreements, notices, disclosures, and other
                                                                communications provided by Herbs of Africa
                                                                electronically fulfill any legal requirements
                                                                that such communications would satisfy if they
                                                                were in writing. This provision does not impact
                                                                your statutory rights.</p>
                                                            <p>Your use of the Site is governed by the laws of
                                                                the state of Texas, U.S.A., without
                                                                consideration of choice of law provisions.</p>
                                                            <p>If local law dictates that consumer contracts
                                                                must be interpreted under local law and enforced
                                                                in the jurisdiction&#8217;s courts, this section
                                                                may not apply (but only to the extent of
                                                                conflict with local law). This Agreement, along
                                                                with your rights and obligations, cannot be
                                                                assigned, subcontracted, delegated, or
                                                                transferred by you without our prior written
                                                                consent; any attempted action in violation of
                                                                this requirement will be null and void. Herbs of
                                                                Africa holds the right to assign any part or all
                                                                of the Agreement without restrictions.</p>
                                                            <p>We are not responsible for any delay or failure
                                                                to perform due to causes beyond our reasonable
                                                                control, such as acts of nature, war, terrorism,
                                                                riots, embargoes, actions by civil or military
                                                                authorities, fires, floods, accidents, strikes,
                                                                shortages, or transportation or shipping delays.
                                                                One-time waiver or non-enforcement of any
                                                                provision of this Agreement does not equate to
                                                                waiving any other provision or the same
                                                                provision on subsequent occasions. If any part
                                                                of this Agreement is deemed invalid or
                                                                unenforceable, it will be interpreted to reflect
                                                                the original intent of the parties as closely as
                                                                possible, while the remaining portions will
                                                                remain valid and effective.</p>
                                                            <p>This Agreement constitutes the entire and
                                                                exclusive agreement between the parties,
                                                                superseding all prior communications,
                                                                representations, or agreements, whether oral or
                                                                written, on the subject matter. No statements or
                                                                representations made by Herbs of Africa
                                                                affiliates outside of this Agreement are binding
                                                                on Herbs of Africa or its affiliates.</p>
                                                        </div>
                                                        <p class="form-row validate-required">
                                                            <label
                                                                class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
                                                                <input type="checkbox"
                                                                    class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox"
                                                                    name="terms" id="terms" />
                                                                <span
                                                                    class="woocommerce-terms-and-conditions-checkbox-text">I
                                                                    have read and agree to the website <a
                                                                        href="../terms-of-use/index.html"
                                                                        class="woocommerce-terms-and-conditions-link"
                                                                        target="_blank">terms and
                                                                        conditions</a></span>&nbsp;<abbr class="required" title="required">*</abbr>
                                                            </label>
                                                            <input type="hidden" name="terms-field" value="1" />
                                                        </p>
                                                    </div>


                                                    <button type="submit" class="button alt"
                                                        name="woocommerce_checkout_place_order" id="place_order"
                                                        value="Place order" data-value="Place order">Place
                                                        order</button>

                                                    <input type="hidden" id="woocommerce-process-checkout-nonce"
                                                        name="woocommerce-process-checkout-nonce"
                                                        value="d02b7d230c" /><input type="hidden"
                                                        name="_wp_http_referer" value="/checkout/" />
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>


                </article><!-- #post -->



            </div><!-- .site-content -->



        </div><!-- .main-page-wrapper -->
    </div>
</div>
@endsection
@push('scripts')
    {{-- <script type="text/javascript"
        src="{{ asset('wp-content/plugins/woocommerce/assets/js/selectWoo/selectWoo.full.min909a.js?ver=1.0.9-wc.8.5.1') }}"
        id="selectWoo-js" defer="defer" data-wp-strategy="defer"></script> --}}
    <script type="text/javascript"
        src="{{ asset('wp-content/plugins/woocommerce/assets/js/frontend/country-select.min2ff6.js?ver=8.5.1') }}"
        id="wc-country-select-js" defer="defer" data-wp-strategy="defer"></script>
    
    <script type="text/javascript"
        src="{{ asset('wp-content/plugins/woocommerce/assets/js/frontend/address-i18n.min2ff6.js?ver=8.5.1') }}"
        id="wc-address-i18n-js" defer="defer" data-wp-strategy="defer"></script>
    <script type="text/javascript"
        src="{{ asset('wp-content/plugins/woocommerce/assets/js/frontend/checkout.min2ff6.js?ver=8.5.1') }}"
        id="wc-checkout-js" defer="defer" data-wp-strategy="defer"></script>
    
    <script type="text/javascript"
        src="{{ asset('wp-content/plugins/woocommerce-gateway-stripe/assets/js/jquery.mask.min15a9.js?ver=7.9.1') }}"
        id="jquery-mask-js"></script>
    <script type="text/javascript"
        src="{{ asset('wp-content/plugins/woocommerce/assets/js/jquery-payment/jquery.payment.min7bb5.js?ver=3.0.0-wc.8.5.1') }}"
        id="jquery-payment-js" data-wp-strategy="defer"></script>
    
    
    <script type="text/javascript"
        src="{{ asset('wp-content/themes/woodmart/js/scripts/wc/woocommerceWrappTable.minc30a.js?ver=7.2.4') }}"
        id="wd-woocommerce-wrapp-table-js"></script>
    <script type="text/javascript"
        src="{{ asset('wp-content/themes/woodmart/js/scripts/wc/checkoutQuantity.minc30a.js?ver=7.2.4') }}"
        id="wd-checkout-quantity-js"></script>
    <script type="text/javascript"
        src="{{ asset('wp-content/themes/woodmart/js/scripts/wc/woocommerceQuantity.minc30a.js?ver=7.2.4') }}"
        id="wd-woocommerce-quantity-js"></script>
    <script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
    <script>
        $('.select2').select2()
        $(document).on('select2:select','#shipping_country',function(e){
            let data = e.params.data;
            $.ajax({
				type:'GET',
				dataType: 'json',
				url: window.location.origin+"/getCountryStates/"+data.element.dataset.iso,
				success:function(data) {
                    $('#shipping_state').children().remove()
					data.forEach(function(item){
                        let option = `<option value="${item.id}">${item.name}</option>`
                        $('#shipping_state').append(option)

                    })
                    $('.select2').select2()
				},
				error: function (data, textStatus, errorThrown) {
				console.log(data);
				},
			});
        })
    </script>
@endpush
