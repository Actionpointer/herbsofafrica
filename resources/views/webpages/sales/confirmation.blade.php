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
<div class="main-page-wrapper" >
    <div class="page-title  page-title-default title-size-small title-design-centered color-scheme-light" style="">
        <div class="container">
            <ul class="wd-checkout-steps">
                <li class="step-cart step-inactive">
                    <a href="{{route('cart')}}">
                        <span>Shopping cart</span>
                    </a>
                </li>
                <li class="step-checkout step-inactive">
                    <a href="javascript:void(0)">
                        <span>Checkout</span>
                    </a>
                </li>
                <li class="step-complete step-active">
                    <span>@if($payment->status == 'success') Order complete @else Payment {{ucwords($payment->status)}} @endif </span>
                </li>
            </ul>
        </div>
    </div>

    <!-- MAIN CONTENT AREA -->
    <div class="container">
        <div class="row content-layout-wrapper align-items-start">

            <div class="site-content col-lg-12 col-12 col-md-12"  role="main">

                <article id="post-18" class="post-18 page type-page status-publish hentry">

                    <div class="entry-content">
                        <div class="woocommerce text-center">
                            
                            @if ( $payment->status!='success' ) 
                            <h1 class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received text-danger">
                                Payment {{ucwords($payment->status)}}
                            </h1>
                            @else 
                            <h1 class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received">
                                Thank you. Your order has been received
                            </h1>
                            @endif
                            <fieldset>
                                
                                <div class="row mb-3">
            
                                    <div class="col-md-6">
                                        
                                        <section class="woocommerce-order-details">
                                            <h4 class="woocommerce-order-details__title">Order Details</h4>
                                            
                                            <div class="responsive-table">
                                                <table class="woocommerce-table woocommerce-table--order-details shop_table order_details">
                                                    <thead>
                                                        <tr>
                                                            <th class="woocommerce-table__product-name product-name">
                                                                Product</th>
                                                            <th class="woocommerce-table__product-table product-total">
                                                                Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($payment->items as $item)
                                                            <tr class="woocommerce-table__line-item order_item">
                                                                <td class="woocommerce-table__product-name product-name">
                                                                    <a href="{{route('product.show',$item->product)}}">{{$item->title}}</a>
                                                                    <strong class="product-quantity">×{{$item->quantity}}</strong>
                                                                </td>
                                                                <td class="woocommerce-table__product-total product-total">
                                                                    <span class="woocs_price_code">
                                                                        <span class="woocommerce-Price-amount amount">
                                                                            <bdi>
                                                                                <span class="woocommerce-Price-currencySymbol">{{$currency->symbol}}</span>
                                                                                <span class="cart-sum-total">{{number_format($item->quantity * $item->price)}}</span>
                                                                                
                                                                            </bdi>
                                                                        </span>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th scope="row">Subtotal:</th>
                                                            <td>
                                                                <span class="woocs_price_code">
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <span class="woocommerce-Price-currencySymbol">{{$currency->symbol}}</span>
                                                                        {{number_format($payment->order->total)}}
                                                                    </span>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Shipping:</th>
                                                            <td>
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span class="woocommerce-Price-currencySymbol">{{$currency->symbol}}</span>
                                                                    {{$payment->shipment}}
                                                                </span>&nbsp;
                                                                <small class="shipped_via">via {{$payment->shipping->rate->name}}</small>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Discount:</th>
                                                            <td>
                                                                <span class="woocs_price_code">
                                                                    <span class="woocommerce-Price-amount amount">-
                                                                        <span class="woocommerce-Price-currencySymbol">{{$currency->symbol}}</span>
                                                                        {{number_format($payment->coupon_value)}}
                                                                    </span>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        {{-- <tr>
                                                            <th scope="row">Payment method:
                                                            </th>
                                                            <td>Flutterwave</td>
                                                        </tr> --}}
                                                        <tr>
                                                            <th scope="row">Total:</th>
                                                            <td>
                                                                <span class="woocs_price_code" >
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <span class="woocommerce-Price-currencySymbol">{{$currency->symbol}}</span>
                                                                        {{number_format($payment->total)}}
                                                                    </span>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </section>                                       
                                    </div>

                                    <div class="col-md-6">
                                        <section class="woocommerce-customer-details">
                                            @if($payment->status != 'success')
                                                @if($payment->status == 'cancelled')
                                                <p>
                                                    Unfortunately your order cannot be processed because the payment was cancelled. Please attempt your purchase again.
                                                </p>
                                                @else 
                                                <p>
                                                    Unfortunately your order cannot be processed as the originating bank/merchant 
                                                    has declined your transaction. Please attempt your purchase again.
                                                </p>
                                                @endif
                                            
                                                <p>
                                                    <a href="{{route('payment.retry',$payment)}}" class="button mb-1">Retry Payment </a>
                                                    <a href="{{route('dashboard')}}" class="button mb-1">Dashboard</a>
                                                </p>
                                            @else
                                            <div class="">
                                                <h4 class="woocommerce-column__title">
                                                    Shipping address</h4>
                                                <address class="text-justify">
                                                    <p class="font-bold">{{$payment->shipping->name}}</p>
                                                        <p class="text-muted">
                                                            {{$payment->shipping->email}}, <br>
                                                            {{$payment->shipping->phone}} <br>
                                                            {{$payment->shipping->street.', '.$payment->shipping->city}}, <br>
                                                            Post Code: {{$payment->shipping->postcode}}, <br>
                                                            {{$payment->shipping->state->name.', '.$payment->shipping->country->name}}
                                                        </p>
                                                </address>
                                                
                                            </div>
                                            <p>
                                                <a href="{{route('orders.view',$payment->order)}}" class="button mb-1">View Order</a>
                                                <a href="{{route('dashboard')}}" class="button mb-1">Dashboard</a>
                                                <a href="{{route('shop')}}" class="button mb-1">Shop More</a>
                                            </p>
                                            @endif
                                        </section>
                                    </div>
                                </div>
                                
                                
                            </fieldset>
                                      
                            
       
                        </div>
                    </div>
                </article><!-- #post -->

            </div><!-- .site-content -->
        </div><!-- .main-page-wrapper -->
    </div>
</div>
@endsection
@push('scripts')
    
@endpush
