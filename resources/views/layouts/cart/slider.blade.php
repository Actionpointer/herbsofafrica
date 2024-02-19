<div class="cart-widget-side wd-side-hidden wd-right @if(!Route::is('cart') && !Route::is('checkout') ) showonpage @endif">
    <div class="wd-heading">
        <span class="title">Shopping cart</span>
        <div class="close-side-widget wd-action-btn wd-style-text wd-cross-icon">
            <a href="javascript:void(0)" rel="nofollow">Close</a>
        </div>
    </div>
    <div class="widget woocommerce widget_shopping_cart">
        <div class="widget_shopping_cart_content">
            <div class="shopping-cart-widget-body wd-scroll">
                <div class="wd-scroll-content">
                    <div class="wd-empty-mini-cart" style="display: none">
                        <p class="woocommerce-mini-cart__empty-message empty title">
                            No products in the basket.
                        </p>
                        <a class="btn btn-size-small btn-color-primary wc-backward" 
                            href="https://herbsofafrica.com/shop/"> Return To Shop 
                        </a>
                    </div>
                    <ul class="cart_list product_list_widget woocommerce-mini-cart">
                        @if(Session::has('carts'))
                            @foreach(session('carts') as $cart)
                                @include('layouts.cart.list',['cart'=> $cart])
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>

            <div class="shopping-cart-widget-footer">
                <p class="woocommerce-mini-cart__total total">
                    <strong>Subtotal:</strong> 
                    <span class="woocs_special_price_code">
                        <span class="woocommerce-Price-amount amount">
                            <bdi>
                                <span class="woocommerce-Price-currencySymbol">{{session('currency')['symbol']}}</span>
                                <span class="cart-sum-total">{{Session::has('carts') ? session('carts')->sum('amount.'.session('currency')['code']) : 0}}</span>
                            </bdi>
                        </span>
                    </span>
                </p>
                <p class="woocommerce-mini-cart__buttons buttons">
                    <a href="{{route('cart')}}" class="button btn-cart wc-forward">View basket</a>
                    <a href="{{route('checkout')}}" class="button checkout wc-forward">Checkout</a>
                </p>
            </div>
        </div>
    </div>
</div>
