@extends('user.index')
@push('dashboard_styles')
    <link rel="stylesheet" id="wd-woo-mod-shop-table-css" 
    href="{{asset('wp-content/themes/woodmart/css/parts/woo-mod-shop-table.minc30a.css?ver=7.2.4')}}" type="text/css" media="all">
    <link rel='stylesheet' id='wd-woo-mod-grid-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-mod-grid.minc30a.css?ver=7.2.4') }}" type='text/css'
        media='all' />
    <link rel='stylesheet' id='wd-widget-collapse-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/opt-widget-collapse.minc30a.css?ver=7.2.4') }}" type='text/css'
        media='all' />  
@endpush
@section('dashboard_content')
<div class="woocommerce-MyAccount-content">
    <div class="woocommerce-notices-wrapper"></div>
    <table
        class="woocommerce-orders-table woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table">
        <thead>
            <tr>
                <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-number">
                    <span class="nobr">Order</span></th>
                <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-date">
                    <span class="nobr">Date</span></th>
                <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-status">
                    <span class="nobr">Status</span></th>
                <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-total">
                    <span class="nobr">Total</span></th>
                <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-actions">
                    <span class="nobr">Actions</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($orders as $order)
            <tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-cancelled order">
                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number"
                    data-title="Order">
                    <a href="{{route('orders.view',$order)}}"><br> #{{$order->reference}} </a>
                    
                </td>
                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date" data-title="Date">
                    <time datetime="{{$order->created_at}}">{{$order->created_at->format('d F Y')}}</time>
                    
                </td>
                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status"
                    data-title="Status">
                    @if($order->status == 'ready')
                        Ready for @if($order->shipping->rate->method == 'local-pickup') Pickup @else Shipment @endif
                    @else 
                        {{ucwords($order->status)}}
                    @endif
         
                </td>
                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total"
                    data-title="Total">
                    <span class="woocs_price_code">
                        <span class="woocommerce-Price-amount amount">
                            <span class="woocommerce-Price-currencySymbol">{{$currencies->firstWhere('code',$order->currency)->symbol}}</span>{{$order->total}}
                        </span>
                    </span>
                    for {{$order->items->count()}} item
                </td>
                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-actions"
                    data-title="Actions">
                    <a href="{{route('orders.view',$order)}}"
                        class="woocommerce-button button view">View</a>
                </td>
            </tr>
            @empty 
            <tr>
                <td colspan="5" class="text-center">No Orders Yet</td>
            </tr>
            @endforelse
            
        </tbody>
    </table>
</div>

@endsection
