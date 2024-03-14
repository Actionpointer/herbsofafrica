@extends('user.index')
@push('dashboard_styles')
    <link rel="stylesheet" id="wd-woo-mod-shop-table-css"
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-mod-shop-table.minc30a.css?ver=7.2.4') }}" type="text/css"
        media="all">
    <link rel='stylesheet' id='wd-woo-mod-grid-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-mod-grid.minc30a.css?ver=7.2.4') }}" type='text/css'
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
    <link rel='stylesheet' id='wd-widget-collapse-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/opt-widget-collapse.minc30a.css?ver=7.2.4') }}" type='text/css'
        media='all' />

    <link rel="stylesheet" id="wd-page-wishlist-bulk-css"
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-page-wishlist-bulk.min.css?ver=7.2.4') }}" type="text/css"
        media="all">
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
@endpush
@section('dashboard_content')
    <div class="woocommerce-MyAccount-content">
        <div class="woocommerce-notices-wrapper"></div>
        <p>
            Order #<mark class="order-number">{{$order->id}}</mark> was placed on <mark class="order-date">{{$order->created_at->format('d F Y')}}</mark>. and 
            @switch($order->status)
                @case('delivered')
                    <mark class="order-status">has been delivered to you on {{$order->status_time}}</mark>.
                @break
                @case('shipped')
                    <mark class="order-status">has been shipped on {{$order->status_time}} and will soon be delivered</mark>.
                @break
                @case('ready')
                    <mark class="order-status">is about to be shipped.</mark>.
                @break
                @case('processing')
                    <mark class="order-status">is currently being processed</mark>.
                @break
                @case('cancelled')
                    <mark class="order-status">was cancelled on {{$order->status_time}}</mark>.
                @break
                
            @endswitch
        </p>
        <div class="row">
            <div class="col-md-6">
                <section class="woocommerce-order-details">
                    <h2 class="woocommerce-order-details__title">Order details</h2>
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
                                @foreach ($order->items as $item)
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
                                                {{number_format($order->total)}}
                                            </span>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Shipping:</th>
                                    <td>
                                        <span class="woocommerce-Price-amount amount">
                                            <span class="woocommerce-Price-currencySymbol">{{$currency->symbol}}</span>
                                            {{$order->payment->shipment}}
                                        </span>&nbsp;
                                        <small class="shipped_via">via {{$order->shipping->rate->name}}</small>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Discount:</th>
                                    <td>
                                        <span class="woocs_price_code">
                                            <span class="woocommerce-Price-amount amount">-
                                                <span class="woocommerce-Price-currencySymbol">{{$currency->symbol}}</span>
                                                {{number_format($order->payment->coupon_value)}}
                                            </span>
                                        </span>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th scope="row">Total:</th>
                                    <td>
                                        <span class="woocs_price_code" >
                                            <span class="woocommerce-Price-amount amount">
                                                <span class="woocommerce-Price-currencySymbol">{{$currency->symbol}}</span>
                                                {{number_format($order->payment->total)}}
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
                <div class="woocommerce-column woocommerce-column--2 woocommerce-column--shipping-address">
                    <h2 class="woocommerce-column__title"> Shipping address</h2>
                    <address>
                        {{$order->shipping->name}}<br>
                        {{$order->shipping->email}}, <br>
                        {{$order->shipping->phone}} <br>
                        {{$order->shipping->street.', '.$order->shipping->city}}, <br>
                        Post Code: {{$order->shipping->postcode}}, <br>
                        {{$order->shipping->state->name.', '.$order->shipping->country->name}}
                    </address>
                        
                </div>
                @if(!in_array($order->status,['cancelled','shipped','delivered']))
                <form action="{{route('orders.edit')}}" method="post" onsubmit="return confirm('Are you sure you want to cancel this order')">@csrf
                    <input type="hidden" name="order_id" value="{{$order->id}}">
                    <input type="hidden" name="status" value="cancelled">
                    <button type="submit" class="button bg-danger text-white">Cancel this Order</button>
                </form>
                @endif
            </div>
        </div>
        
        
    </div>
@endsection
