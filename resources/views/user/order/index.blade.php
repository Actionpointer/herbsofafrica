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
                <th
                    class="woocommerce-orders-table__header woocommerce-orders-table__header-order-number">
                    <span class="nobr">Order</span></th>
                <th
                    class="woocommerce-orders-table__header woocommerce-orders-table__header-order-date">
                    <span class="nobr">Date</span></th>
                <th
                    class="woocommerce-orders-table__header woocommerce-orders-table__header-order-status">
                    <span class="nobr">Status</span></th>
                <th
                    class="woocommerce-orders-table__header woocommerce-orders-table__header-order-total">
                    <span class="nobr">Total</span></th>
                <th
                    class="woocommerce-orders-table__header woocommerce-orders-table__header-order-actions">
                    <span class="nobr">Actions</span>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr
                class="woocommerce-orders-table__row woocommerce-orders-table__row--status-cancelled order">
                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number"
                    data-title="Order">
                    <a
                        href="{{route('orders.view')}}"><br>
                        #2075 </a>
                    <p></p>
                </td>
                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date"
                    data-title="Date">
                    <time
                        datetime="2023-10-19T13:01:28+00:00">19
                        October 2023</time>
                    <p></p>
                </td>
                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status"
                    data-title="Status">
                    Cancelled
                </td>
                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total"
                    data-title="Total">
                    <span class="woocs_price_code"
                        data-currency="USD"
                        data-redraw-id="65bac78094ed6"><span
                            class="woocommerce-Price-amount amount"><span
                                class="woocommerce-Price-currencySymbol">$</span>47</span></span>
                    for 1 item
                </td>
                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-actions"
                    data-title="Actions">
                    <a href="{{route('orders.view')}}"
                        class="woocommerce-button button view">View</a>
                </td>
            </tr>
            <tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-processing order">
                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number"
                    data-title="Order">
                    <a
                        href="https://herbsofafrica.com/my-account/view-order/1754/"><br>
                        #1754 </a>
                    <p></p>
                </td>
                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date"
                    data-title="Date">
                    <time
                        datetime="2023-10-06T00:38:51+00:00">6
                        October 2023</time>
                    <p></p>
                </td>
                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status"
                    data-title="Status">
                    Processing
                </td>
                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total"
                    data-title="Total">
                    <span class="woocs_price_code"
                        data-currency="USD"
                        data-redraw-id="65bac78096184"><span
                            class="woocommerce-Price-amount amount"><span
                                class="woocommerce-Price-currencySymbol">$</span>4</span></span>
                    for 2 items
                </td>
                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-actions"
                    data-title="Actions">
                    <a href="https://herbsofafrica.com/my-account/view-order/1754/"
                        class="woocommerce-button button view">View</a>
                </td>
            </tr>
            <tr
                class="woocommerce-orders-table__row woocommerce-orders-table__row--status-cancelled order">
                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number"
                    data-title="Order">
                    <a
                        href="https://herbsofafrica.com/my-account/view-order/1753/"><br>
                        #1753 </a>
                    <p></p>
                </td>
                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date"
                    data-title="Date">
                    <time
                        datetime="2023-10-06T00:35:48+00:00">6
                        October 2023</time>
                    <p></p>
                </td>
                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status"
                    data-title="Status">
                    Cancelled
                </td>
                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total"
                    data-title="Total">
                    <span class="woocs_price_code"
                        data-currency="USD"
                        data-redraw-id="65bac780973b2"><span
                            class="woocommerce-Price-amount amount"><span
                                class="woocommerce-Price-currencySymbol">$</span>3</span></span>
                    for 1 item
                </td>
                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-actions"
                    data-title="Actions">
                    <a href="https://herbsofafrica.com/my-account/view-order/1753/"
                        class="woocommerce-button button view">View</a>
                </td>
            </tr>
            <tr
                class="woocommerce-orders-table__row woocommerce-orders-table__row--status-processing order">
                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number"
                    data-title="Order">
                    <a
                        href="https://herbsofafrica.com/my-account/view-order/1752/"><br>
                        #1752 </a>
                    <p></p>
                </td>
                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date"
                    data-title="Date">
                    <time
                        datetime="2023-10-06T00:28:23+00:00">6
                        October 2023</time>
                    <p></p>
                </td>
                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status"
                    data-title="Status">
                    Processing
                </td>
                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total"
                    data-title="Total">
                    <span class="woocs_price_code"
                        data-currency="USD"
                        data-redraw-id="65bac78098300"><span
                            class="woocommerce-Price-amount amount"><span
                                class="woocommerce-Price-currencySymbol">$</span>4</span></span>
                    for 2 items
                </td>
                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-actions"
                    data-title="Actions">
                    <a href="https://herbsofafrica.com/my-account/view-order/1752/"
                        class="woocommerce-button button view">View</a>
                </td>
            </tr>
            <tr
                class="woocommerce-orders-table__row woocommerce-orders-table__row--status-processing order">
                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number"
                    data-title="Order">
                    <a
                        href="https://herbsofafrica.com/my-account/view-order/1747/"><br>
                        #1747 </a>
                    <p></p>
                </td>
                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date"
                    data-title="Date">
                    <time
                        datetime="2023-10-06T00:20:11+00:00">6
                        October 2023</time>
                    <p></p>
                </td>
                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status"
                    data-title="Status">
                    Processing
                </td>
                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total"
                    data-title="Total">
                    <span class="woocs_price_code"
                        data-currency="USD"
                        data-redraw-id="65bac78099015"><span
                            class="woocommerce-Price-amount amount"><span
                                class="woocommerce-Price-currencySymbol">$</span>62</span></span>
                    for 1 item
                </td>
                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-actions"
                    data-title="Actions">
                    <a href="https://herbsofafrica.com/my-account/view-order/1747/"
                        class="woocommerce-button button view">View</a>
                </td>
            </tr>
            <tr
                class="woocommerce-orders-table__row woocommerce-orders-table__row--status-cancelled order">
                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number"
                    data-title="Order">
                    <a
                        href="https://herbsofafrica.com/my-account/view-order/1732/"><br>
                        #1732 </a>
                    <p></p>
                </td>
                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date"
                    data-title="Date">
                    <time
                        datetime="2023-10-01T20:48:52+00:00">1
                        October 2023</time>
                    <p></p>
                </td>
                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status"
                    data-title="Status">
                    Cancelled
                </td>
                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total"
                    data-title="Total">
                    <span class="woocs_price_code"
                        data-currency="USD"
                        data-redraw-id="65bac78099cc2"><span
                            class="woocommerce-Price-amount amount"><span
                                class="woocommerce-Price-currencySymbol">$</span>62</span></span>
                    for 1 item
                </td>
                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-actions"
                    data-title="Actions">
                    <a href="https://herbsofafrica.com/my-account/view-order/1732/"
                        class="woocommerce-button button view">View</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
