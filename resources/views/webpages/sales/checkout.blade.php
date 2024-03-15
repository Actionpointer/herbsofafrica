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
                                action="{{route('payment.store')}}" enctype="multipart/form-data" id="checkout_form">@csrf

                                <div class="col-12 col-md-5 col-lg-6">
                                    <div class="row" id="customer_details">
                                        

                                        <div class="col-12">
                                            
                                            <div class="woocommerce-shipping-fields">
                                                <h3>Shipment Address</h3>
                                                

                                                <div class="shipping_address">
                                                    <div class="woocommerce-shipping-fields__field-wrapper">
                                                        <p class="form-row form-row-first validate-required" id="shipping_first_name_field" data-priority="10">
                                                            <label for="shipping_first_name" class="">
                                                                First name&nbsp;
                                                                <abbr class="required" title="required">*</abbr>
                                                            </label>
                                                            <span class="woocommerce-input-wrapper">
                                                                <input type="text" class="input-text " name="firstname" required id="shipping_first_name"  placeholder="" value="{{old('firstname')}}" autocomplete="given-name" />
                                                            </span>
                                                        </p>
                                                        <p class="form-row form-row-last validate-required" id="shipping_last_name_field" data-priority="20">
                                                            <label for="shipping_last_name" class="">Last name&nbsp;
                                                                <abbr class="required" title="required">*</abbr>
                                                            </label>
                                                            <span class="woocommerce-input-wrapper">
                                                                <input type="text" class="input-text " name="lastname" required id="shipping_last_name" placeholder="" value="{{old('lastname')}}" autocomplete="family-name" />
                                                            </span>
                                                        </p>
                                                        <p class="form-row form-row-wide address-field update_totals_on_change validate-required" id="shipping_country_field" data-priority="40">
                                                            <label for="shipping_country" class="">Country/Regions
                                                                <abbr class="required" title="required">*</abbr>
                                                            </label>
                                                            <span class="woocommerce-input-wrapper">
                                                                <select name="country" id="shipping_country" required class="country_to_state country_select select2"
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
                                                                <input type="text" class="input-text " name="street" id="shipping_address_1" placeholder="House number and street name" value="{{old('street')}}" autocomplete="address-line1" />
                                                            </span>
                                                        </p>
                                                        <p class="form-row form-row-wide address-field validate-required" id="shipping_city_field" data-priority="70">
                                                            <label for="shipping_city" class="">Town / City&nbsp;
                                                                <abbr class="required" title="required">*</abbr>
                                                            </label>
                                                            <span class="woocommerce-input-wrapper">
                                                                <input type="text" class="input-text " name="city" id="shipping_city" placeholder="" value="{{old('city')}}" autocomplete="address-level2" />
                                                            </span>
                                                        </p>
                                                        <p class="form-row form-row-wide address-field validate-required validate-state" id="shipping_state_field" data-priority="80">
                                                            <label for="shipping_state" class="">State&nbsp;
                                                                <abbr class="required" title="required">*</abbr>
                                                            </label>
                                                            <span class="woocommerce-input-wrapper">
                                                                <select  name="state" id="shipping_state" class="state_select select2" autocomplete="address-level1"
                                                                    data-placeholder="Select an option"
                                                                    data-input-classes="" data-label="State">
                                                                    <option value="" >Select an option</option>
                                                                </select>
                                                            </span>
                                                        </p>
                                                        <p class="form-row form-row-wide address-field validate-required validate-postcode"
                                                            id="shipping_postcode_field" data-priority="90">
                                                            <label for="shipping_postcode" class="">Postcode&nbsp;
                                                                <abbr class="required" title="required">*</abbr>
                                                            </label>
                                                            <span class="woocommerce-input-wrapper">
                                                                <input type="text"  class="input-text" name="postcode"  id="shipping_postcode" placeholder="" value="{{old('postcode')}}" autocomplete="postal-code" />
                                                            </span>
                                                        </p>
                                                        <p class="form-row form-row-wide validate-required validate-phone" id="billing_phone_field" data-priority="100">
                                                            <label for="billing_phone" class="">Phone&nbsp;
                                                                <abbr class="required" title="required">*</abbr>
                                                            </label>
                                                            <span class="woocommerce-input-wrapper">
                                                                <input type="tel" class="input-text " name="phone" id="billing_phone" placeholder="" value="{{old('phone')}}" autocomplete="tel" />
                                                            </span>
                                                        </p>
                                                        <p class="form-row form-row-wide validate-required validate-email" id="billing_email_field" data-priority="110">
                                                            <label for="billing_email" class="">Email address&nbsp;
                                                                <abbr class="required" title="required">*</abbr>
                                                            </label>
                                                            <span class="woocommerce-input-wrapper">
                                                                <input type="email" class="input-text " name="email" id="billing_email" placeholder="" value="{{old('email')}}" autocomplete="email username" />
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
                                                            <textarea name="note" class="input-text " id="order_comments" placeholder="Notes about your order, e.g. special notes for delivery." rows="2" cols="5">{{old('note')}}</textarea>
                                                        </span>
                                                    </p>
                                                </div>
                                                <input type="hidden" name="affiliate_id" value="{{Session::has('affiliate') ? session('affiliate')['id']:''}}" />
                                                
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

                                                                            <input type="button" value="-" class="minus qty_minus">
                                                                            <label class="screen-reader-text" for="qtyfor{{$cart['product_id']}}">{{$cart['title']}} quantity</label>
                                                                            <input type="number" id="qtyfor{{$cart['product_id']}}" class="input-text qty text" value="{{$cart['quantity']}}" title="Qty"
                                                                                min="1" max="" data-product_id="{{$cart['product_id']}}"
                                                                                step="1" placeholder="" inputmode="numeric"
                                                                                autocomplete="off">

                                                                            <input type="button" value="+" class="plus qty_plus">
                                                                            <input type="hidden" class="cart_price" id="pricefor{{$cart['product_id']}}" value="{{$cart['prices'][session('currency')['code']]}}">
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
                                                        
                                                        
                                                        
                                                        
                                                        <tr class="coupon-form">
                                                            <td colspan="2">
                                                                <div class="woocommerce-form-coupon-toggle accordion" >
                                                                    <a href="#collapseOne" class="showcoupon collapsed" data-bs-toggle="collapse" >
                                                                        <div class="wc-block-components-notice-banner is-info text-left" role="alert">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                viewBox="0 0 24 24" width="24"
                                                                                height="24" aria-hidden="true"
                                                                                focusable="false">
                                                                                <path d="M12 3.2c-4.8 0-8.8 3.9-8.8 8.8 0 4.8 3.9 8.8 8.8 8.8 4.8 0 8.8-3.9 8.8-8.8 0-4.8-4-8.8-8.8-8.8zm0 16c-4 0-7.2-3.3-7.2-7.2C4.8 8 8 4.8 12 4.8s7.2 3.3 7.2 7.2c0 4-3.2 7.2-7.2 7.2zM11 17h2v-6h-2v6zm0-8h2V7h-2v2z">
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
                                                                        <input type="text" name="coupon" class="input-text" placeholder="Coupon code" id="coupon_code" value="">
                                                                    </p>
                                                                
                                                                    <p class="form-row form-row-last">
                                                                        <button type="button" class="button" name="apply_coupon" id="apply_coupon" value="Apply coupon">Apply coupon</button>
                                                                    </p>
                                                                    <p style="display:none;color: #c3078a" id="coupon_response"></p>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                
                                                            </td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                    <tfoot>

                                                        <tr class="cart-subtotal">
                                                            <th>Subtotal</th>
                                                            <td>
                                                                <span class="woocs_special_price_code">
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <bdi>
                                                                            <input type="hidden" id="current_currency" value="{{session('currency')['code']}}">
                                                                            <span id="current_currency_symbol" class="woocommerce-Price-currencySymbol">{{session('currency')['symbol']}}</span>
                                                                            <span class="cart-sum-total">{{number_format($carts->sum('amount.'.session('currency')['code']))}}</span>
                                                                            <input type="hidden" id="subtotal" value="{{$carts->sum('amount.'.session('currency')['code'])}}">
                                                                        </bdi>
                                                                    </span>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        <tr class="cart-subtotal">
                                                            <th>Discount</th>
                                                            <td>
                                                                <span class="woocs_special_price_code">
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <bdi>
                                                                            <input type="hidden">-
                                                                            <span class="woocommerce-Price-currencySymbol">{{session('currency')['symbol']}}</span>
                                                                            <span class="cart-sum-total discount">0</span>
                                                                            <input type="hidden" id="discount" value="0">
                                                                        </bdi>
                                                                    </span>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        <tr class="woocommerce-shipping-totals shipping">
                                                            <th>Shipping</th>
                                                            <td data-title="Shipping">
                                                                <input type="hidden" id="shipping_fee" name="shipment" value="0">
                                                                 <ul id="shipping_method" class="woocommerce-shipping-methods">

                                                                    
                                                                    <li>Select Location</li>       
                                                                </ul>    
                                                            </td>
                                                        </tr>
                                                        <tr class="order-total">
                                                            <th>Total</th>
                                                            <td>
                                                                <strong>
                                                                    <span class="woocs_special_price_code">
                                                                        <span class="woocommerce-Price-amount amount">
                                                                            <bdi>
                                                                                <span class="woocommerce-Price-currencySymbol">{{session('currency')['symbol']}}</span>
                                                                                <span id="grandtotal" class="cart-sum-total">{{number_format($carts->sum('amount.'.session('currency')['code']))}}</span>
                                                                                <input type="hidden" id="total" name="total" value="{{$carts->sum('amount.'.session('currency')['code'])}}">
                                                                            </bdi>
                                                                        </span>
                                                                    </span>
                                                                </strong>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div><!-- .wd-table-wrapper -->
                                            <div id="payment" class="woocommerce-checkout-payment">
                                                
                                                <div class="form-row place-order">
                                                    <button @auth type="submit" @else type="button" @endauth 
                                                        class="button alt @guest login-side-opener @endguest" id="place_order" data-value="Place order">Place
                                                        order
                                                    </button>

                                                    
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
    
    <script type="text/javascript"
        src="{{ asset('wp-content/plugins/woocommerce/assets/js/frontend/country-select.min2ff6.js?ver=8.5.1') }}"
        id="wc-country-select-js" defer="defer" data-wp-strategy="defer">
    </script>

    <script type="text/javascript"
        src="{{ asset('wp-content/plugins/woocommerce/assets/js/frontend/address-i18n.min2ff6.js?ver=8.5.1') }}"
        id="wc-address-i18n-js" defer="defer" data-wp-strategy="defer">
    </script>

    <script type="text/javascript"
        src="{{ asset('wp-content/plugins/woocommerce/assets/js/frontend/checkout.min2ff6.js?ver=8.5.1') }}"
        id="wc-checkout-js" defer="defer" data-wp-strategy="defer">
    </script>
    
    <script type="text/javascript"
        src="{{ asset('wp-content/plugins/woocommerce-gateway-stripe/assets/js/jquery.mask.min15a9.js?ver=7.9.1') }}"
        id="jquery-mask-js">
    </script>

    <script type="text/javascript"
        src="{{ asset('wp-content/plugins/woocommerce/assets/js/jquery-payment/jquery.payment.min7bb5.js?ver=3.0.0-wc.8.5.1') }}"
        id="jquery-payment-js" data-wp-strategy="defer">
    </script>
    
    
    <script type="text/javascript"
        src="{{ asset('wp-content/themes/woodmart/js/scripts/wc/woocommerceWrappTable.minc30a.js?ver=7.2.4') }}"
        id="wd-woocommerce-wrapp-table-js">
    </script>
    
    <script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
    <script>
        $('.select2').select2()
        
        $(document).on('select2:select','#shipping_country',function(e){
            let country = $(this).val();
            $.ajax({
				type:'POST',
				dataType: 'json',
				url: "{{route('getCountryStates')}}",
                data: {
                    '_token' : $('meta[name="csrf-token"]').attr('content'),
                    countries: country,
                },
				success:function(data) {
                    $('#shipping_state').children().remove()
					data.forEach(function(item){
                        let options = '';
                        item.states.forEach(function(value){
                            options += `<option value="${value.id}">${value.name}</option>`
                        })
                    
                        let group = `<optgroup label="${item.country}">
                                        ${options}
                                    </optgroup>`
                        // console.log(group)
                        $('#shipping_state').append(group)

                    })
                    $('.select2').select2()
				},
				error: function (data, textStatus, errorThrown) {
				console.log(data);
				},
			});
        })

        $(document).on('select2:select','#shipping_state',function(e){
            let state = $(this).val();
            $.ajax({
				type:'POST',
				dataType: 'json',
				url: "{{route('getShipmentRates')}}",
                data: {
                    '_token' : $('meta[name="csrf-token"]').attr('content'),
                    state: state,
                },
				success:function(data) {
                    //console.log(data)
                    $("#shipping_method").children().remove()
                    let currency = $('#current_currency').val()
                    let symbol = $('#current_currency_symbol').text()
                    let list = '';
                    data.forEach(function(item,index){
                        let amount = 0;
                        if(item.method == 'flat-rate'){
                            if(item.price_type == 'fixed-amount'){
                                amount = item.prices[currency]
                            }else{
                                amount = item.percentage * parseInt($('#subtotal').val()) / 100
                            }
                        }
                        list += `<li>
                                    <input type="radio" required name="shipping_rate" data-index="${index}" data-pickup="${item.method == 'local-pickup'? true:false}" id="shipping_method_${index}" value="${item.id}" class="shipping_method">
                                    <label for="shipping_method_0_flat_rate1">${item.name}: 
                                        <span class="woocommerce-Price-amount amount">
                                            <bdi>
                                                <span class="woocommerce-Price-currencySymbol">{{session('currency')['symbol']}}</span>
                                                <span id="shipping_amount_for${index}">${amount}</span>
                                            </bdi>
                                            <span class="warehouse" id="warehouse_for${index}" style="display:none">${item.warehouse}</span>
                                        </span>
                                    </label>
                                </li>`
                                
                    })
                    $('#shipping_method').append(list)
  
				},
				error: function (data, textStatus, errorThrown) {
				console.log(data);
				},
			});
        })

        $(document).on('change','.shipping_method',function(){
            let index = $(this).attr('data-index')
            let address = $('#warehouse_for'+index).text()
            if($(this).attr('data-pickup') == 'true'){
                $('#shipping_method').append(`<li class="warehouse_address">Nearest Pickup Location is: ${address}</li>`) 
            }else{
                $('.warehouse_address').remove()
            }
            let amount = $('#shipping_amount_for'+$(this).attr('data-index')).text()
            $('#shipping_fee').val(amount)
            grandtotal()
        })

        $(document).on('click','#apply_coupon',function(e){
            let coupon = $('#coupon_code').val()
            if(coupon != ''){
                $.ajax({
                    type:'POST',
                    dataType: 'json',
                    url: "{{route('applyCoupon')}}",
                    data: {
                        '_token' : $('meta[name="csrf-token"]').attr('content'),
                        coupon: coupon,
                    },
                    success:function(data) {
                        $('#coupon_response').text(data.description).show()
                        $('.discount').text(data.value.toLocaleString())
                        $('#discount').val(data.value)
                        grandtotal()
                    },
                    error: function (data, textStatus, errorThrown) {
                        console.log(data);
                    },
                });
            }
        })

        function grandtotal(){
            let subtotal = $('#subtotal').val()
            let shipping = $('#shipping_fee').val()
            let discount = $('#discount').val()
            let grandtotal = parseInt(subtotal) + parseInt(shipping) - parseInt(discount);
            $('#total').val(grandtotal)
            $('#grandtotal').text(grandtotal.toLocaleString())
        }   

    </script>
@endpush
