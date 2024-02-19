<li class="woocommerce-mini-cart-item mini_cart_item">
    <a href="{{$cart['url']}}" class="cart-item-link wd-fill">Show</a>
    <a href="javascript:void(0)"
        class="remove remove_from_cart_button" aria-label="Remove this item"
        data-product_id="{{$cart['product_id']}}"
        data-product_sku="">×
    </a>
    <a href="{{$cart['url']}}" class="cart-item-image">
        <img width="300" height="300"
            src="{{$cart['images'][0]}}"
            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt=""
            decoding="async"
            _srcset="#image2 300w, #image3 150w, #image4 768w, #image5 600w, #image6 800w"
            _sizes="(max-width: 300px) 100vw, 300px"> 
    </a>

    <div class="cart-info">
        <span class="wd-entities-title"> {{$cart['title']}} </span>
        <span class="quantity"> {{$cart['quantity']}} × 
            <span class="woocs_special_price_code">
                <span class="woocommerce-Price-amount amount">
                    <bdi><span class="woocommerce-Price-currencySymbol">{{session('currency')['symbol']}}</span> {{number_format($cart['prices'][session('currency')['code']])}} </bdi>
                </span>
            </span>
        </span>
    </div>

</li>
