  
<div class="product-wrapper">
    <div class="product-element-top wd-quick-shop">
        <a href="product/fabman/index.html"
            class="product-image-link">
            @if($product->featured)
            <div class="product-labels labels-rounded">
                <span class="featured product-label">Hot</span>
            </div>
            @endif
            <img loading="lazy" decoding="async" width="600"
                height="600" alt="" sizes="(max-width: 600px) 100vw, 600px"
                src="{{$product->photos[0]}}"
                class="attachment-large size-large wp-image-1596"
                
            />
        </a>
        <div class="hover-img">
            <a href="{{route('product.show',$product)}}">
                <img loading="lazy"
                    decoding="async"
                    width="800"
                    height="800"
                    src="{{$product->photos[0]}}"
                    class="attachment-large size-large wp-image-777"
                    alt=""
                     />
            </a>
        </div>
        @if(!Route::is('wishlist') && auth()->check())
        <div class="wd-buttons wd-pos-r-t">
            <div class="wd-wishlists-btn wd-action-btn wd-style-icon wd-wishlist-icon">
                <a class="wishlist_anchor @if(auth()->user()->inWishlist($product->id)) added @endif"
                    href="{{route('wishlist')}}"
                    data-key="0fe9f691dc"
                    data-product_id="{{$product->id}}"
                    rel="nofollow"
                    data-added-text="Browse Wishlist">
                    <span>Add to wishlist</span>
                </a>
            </div>
        </div>
        @endif

        <div class="wd-add-btn wd-add-btn-replace">
            <a href="javascript:void(0)"
                class="button product_type_simple add_to_cart_button ajax_add_to_cart add-to-cart-loop"
                data-product_id="{{$product->id}}" data-product_qty="1"
                aria-label="Add to basket: &ldquo;Fabman&rdquo;" aria-describedby=""
                rel="nofollow">
                <span>Add to basket </span>
            </a>
        </div>

    </div>
    <div class="wd-product-cats">
        <a href="{{route('shop.category',$product->category)}}"
            rel="tag">{{$product->category->title}}
        </a>
    </div>
    <h3 class="wd-entities-title">
        <a href="{{route('product.show',$product)}}">{{$product->title}}</a>
    </h3>
    <span style='font-size:13px'>{{$product->introduction}}</span>
    <span class="price">
        <span class="woocs_price_code" data-currency="" data-redraw-id="65ae385ea9bbf" data-product-id="775">
            <span class="woocommerce-Price-amount amount">
                <bdi>
                    <span class="woocommerce-Price-currencySymbol">
                        {{session('currency')['symbol']}}
                    </span>
                    {{number_format($product->prices[session('currency')['code']])}}
                </bdi>
            </span>
        </span>
    </span>
</div>
