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
            Order #<mark class="order-number">2075</mark> was
            placed on <mark class="order-date">19 October
                2023</mark> and is currently <mark class="order-status">Cancelled</mark>.</p>
        <section class="woocommerce-order-details">
            <h2 class="woocommerce-order-details__title">Order
                details</h2>
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
                        <tr class="woocommerce-table__line-item order_item">
                            <td class="woocommerce-table__product-name product-name">
                                <a href="https://herbsofafrica.com/product/dentafloxin/">Dentafloxin</a>
                                <strong class="product-quantity">×&nbsp;1</strong>
                            </td>
                            <td class="woocommerce-table__product-total product-total">
                                <span class="woocs_price_code" data-currency="USD" data-redraw-id="65bacc0a832bb"><span
                                        class="woocommerce-Price-amount amount"><bdi><span
                                                class="woocommerce-Price-currencySymbol">$</span>35</bdi></span></span>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th scope="row">Subtotal:</th>
                            <td><span class="woocs_price_code" data-currency="USD" data-redraw-id="65bacc0a8335b"><span
                                        class="woocommerce-Price-amount amount"><span
                                            class="woocommerce-Price-currencySymbol">$</span>35</span></span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Shipping:</th>
                            <td><span class="woocommerce-Price-amount amount"><span
                                        class="woocommerce-Price-currencySymbol">$</span>12</span>&nbsp;<small
                                    class="shipped_via">via
                                    Regular (3 – 7 days)</small>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Payment method:
                            </th>
                            <td>Flutterwave</td>
                        </tr>
                        <tr>
                            <th scope="row">Total:</th>
                            <td><span class="woocs_price_code" data-currency="USD" data-redraw-id="65bacc0a83c6c"><span
                                        class="woocommerce-Price-amount amount"><span
                                            class="woocommerce-Price-currencySymbol">$</span>47</span></span>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </section>
        <section class="woocommerce-customer-details">
            <section class="woocommerce-columns woocommerce-columns--2 woocommerce-columns--addresses col2-set addresses">
                <div class="woocommerce-column woocommerce-column--1 woocommerce-column--billing-address col-1">
                    <h2 class="woocommerce-column__title">
                        Billing address</h2>
                    <address>
                        Nevada Whitehead<br>21, IREWUNMI BADRU
                        STREET, EBUTE IKORODU<br>Lewes, DE 19701
                        <p></p>
                        <p class="woocommerce-customer-details--phone">
                            +1 (854) 711-4105</p>
                        <p class="woocommerce-customer-details--email">
                            reigningkingforever@gmail.com</p>
                        <p></p>
                    </address>
                    <p></p>
                </div>
                <p><!-- /.col-1 --></p>
                <div class="woocommerce-column woocommerce-column--2 woocommerce-column--shipping-address col-2">
                    <h2 class="woocommerce-column__title">
                        Shipping address</h2>
                    <address>
                        Nevada Whitehead<br>21, IREWUNMI BADRU
                        STREET, EBUTE IKORODU<br>Lewes, DE
                        19701<br>
                    </address>
                    <p></p>
                </div>
                <p><!-- /.col-2 --></p>
            </section>
            <p><!-- /.col2-set --></p>
        </section>
    </div>
@endsection
