@extends('user.index')
@push('dashboard_styles')
    <link rel='stylesheet' id='elementor-post-492-css'
        href='{{asset('wp-content/uploads/elementor/css/post-492.css?ver=1706548779' type='text/css'
        media='all' />
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
        <div class="wd-wishlist-content wd-group-enable">
            <link rel="stylesheet" id="wd-page-wishlist-group-css"
                href="{{asset('wp-content/themes/woodmart/css/parts/woo-page-wishlist-group.min.css?ver=7.2.4"
                type="text/css" media="all">
            <div class="wd-wishlist-head wd-border-off">
                <h4 class="title">
                    Your wishlists </h4>
                <a href="#" class="btn wd-wishlist-create-group-btn">
                    Create wishlist </a>
            </div>
            <div class="wd-wishlist-group" data-group-id="32">
                <link rel="stylesheet" id="wd-page-wishlist-bulk-css"
                    href="{{asset('wp-content/themes/woodmart/css/parts/woo-page-wishlist-bulk.min.css?ver=7.2.4"
                    type="text/css" media="all">
                <div class="wd-wishlist-group-head">
                    <div class="wd-wishlist-group-title">
                        <div class="wd-wishlist-group-action wd-event-hover">
                            <ul
                                class="wd-dropdown wd-dropdown-menu wd-dropdown-wishlist-group wd-design-default wd-sub-menu">
                                <li>
                                    <a href="#" class="wd-wishlist-edit-title">
                                        Edit name </a>
                                </li>
                            </ul>
                        </div>
                        <h4 class="title">
                            My wishlist </h4>
                        <div class="wd-wishlist-title-edit">
                            <input type="text" class="wd-wishlist-input-rename" value="My wishlist"
                                data-title="My wishlist">
                            <a href="#" class="btn wd-wishlist-rename-save">
                                Save </a>
                            <div class="wd-wishlist-rename-cancel wd-action-btn wd-style-text wd-cross-icon">
                                <a href="#">
                                    Cancel </a>
                            </div>
                        </div>
                    </div>


                    <link rel="stylesheet" id="wd-social-icons-css"
                        href="{{asset('wp-content/themes/woodmart/css/parts/el-social-icons.min.css?ver=7.2.4"
                        type="text/css" media="all">
                    <div
                        class="wd-social-icons icons-design-default icons-size-small color-scheme-dark social-share social-form-circle wd-layout-inline text-center">

                        <span class="wd-label share-title">Share: </span>

                        <a rel="noopener noreferrer nofollow"
                            href="https://www.facebook.com/sharer/sharer.php?u=https://herbsofafrica.com/wishlist/32/"
                            target="_blank" class=" wd-social-icon social-facebook" aria-label="Facebook social link">
                            <span class="wd-icon"></span>
                        </a>

                        <a rel="noopener noreferrer nofollow"
                            href="https://twitter.com/share?url=https://herbsofafrica.com/wishlist/32/" target="_blank"
                            class=" wd-social-icon social-twitter" aria-label="Twitter social link">
                            <span class="wd-icon"></span>
                        </a>




                        <a rel="noopener noreferrer nofollow"
                            href="https://pinterest.com/pin/create/button/?url=https://herbsofafrica.com/wishlist/32/&amp;media=https://herbsofafrica.com/wp-includes/images/media/default.png&amp;description=Wishlist"
                            target="_blank" class=" wd-social-icon social-pinterest" aria-label="Pinterest social link">
                            <span class="wd-icon"></span>
                        </a>


                        <a rel="noopener noreferrer nofollow"
                            href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https://herbsofafrica.com/wishlist/32/"
                            target="_blank" class=" wd-social-icon social-linkedin" aria-label="Linkedin social link">
                            <span class="wd-icon"></span>
                        </a>













                        <a rel="noopener noreferrer nofollow"
                            href="https://telegram.me/share/url?url=https://herbsofafrica.com/wishlist/32/"
                            target="_blank" class=" wd-social-icon social-tg" aria-label="Telegram social link">
                            <span class="wd-icon"></span>
                        </a>


                    </div>

                </div>
                <div class="wd-wishlist-bulk-action">
                    <div class="wd-wishlist-move-action wd-action-btn wd-style-text">
                        <a href="#">
                            Move </a>
                    </div>
                    <div class="wd-wishlist-remove-action wd-action-btn wd-style-text wd-cross-icon">
                        <a href="#">
                            Remove </a>
                    </div>
                    <div class="wd-wishlist-select-all wd-action-btn wd-style-text">
                        <a href="#">
                            <span class="wd-wishlist-text-select">Select all</span>
                            <span class="wd-wishlist-text-deselect">Deselect all</span>
                        </a>
                    </div>
                </div>
                <div class="wd-products-element">


                    <link rel="stylesheet" id="wd-product-loop-css"
                        href="{{asset('wp-content/themes/woodmart/css/parts/woo-product-loop.min.css?ver=7.2.4"
                        type="text/css" media="all">
                    <link rel="stylesheet" id="wd-product-loop-quick-css"
                        href="{{asset('wp-content/themes/woodmart/css/parts/woo-product-loop-quick.min.css?ver=7.2.4"
                        type="text/css" media="all">
                    <link rel="stylesheet" id="wd-woo-mod-add-btn-replace-css"
                        href="{{asset('wp-content/themes/woodmart/css/parts/woo-mod-add-btn-replace.min.css?ver=7.2.4"
                        type="text/css" media="all">
                    <div class="products elements-grid align-items-start row wd-products-holder  wd-spacing-20 grid-columns-3 pagination-links align-items-start"
                        data-paged="1"
                        data-atts="{&quot;element_title&quot;:&quot;&quot;,&quot;post_type&quot;:&quot;ids&quot;,&quot;layout&quot;:&quot;grid&quot;,&quot;include&quot;:&quot;618,564,775,870,856,1150&quot;,&quot;custom_query&quot;:&quot;&quot;,&quot;taxonomies&quot;:&quot;&quot;,&quot;pagination&quot;:&quot;links&quot;,&quot;items_per_page&quot;:-1,&quot;product_hover&quot;:&quot;inherit&quot;,&quot;spacing&quot;:&quot;20&quot;,&quot;columns&quot;:3,&quot;columns_tablet&quot;:&quot;auto&quot;,&quot;columns_mobile&quot;:&quot;auto&quot;,&quot;sale_countdown&quot;:0,&quot;stretch_product_desktop&quot;:0,&quot;stretch_product_tablet&quot;:0,&quot;stretch_product_mobile&quot;:0,&quot;stock_progress_bar&quot;:0,&quot;highlighted_products&quot;:0,&quot;products_bordered_grid&quot;:&quot;0&quot;,&quot;products_bordered_grid_style&quot;:&quot;outside&quot;,&quot;products_with_background&quot;:&quot;0&quot;,&quot;products_shadow&quot;:&quot;0&quot;,&quot;products_color_scheme&quot;:&quot;default&quot;,&quot;product_quantity&quot;:0,&quot;grid_gallery&quot;:&quot;&quot;,&quot;grid_gallery_control&quot;:&quot;&quot;,&quot;grid_gallery_enable_arrows&quot;:&quot;&quot;,&quot;offset&quot;:&quot;&quot;,&quot;orderby&quot;:&quot;&quot;,&quot;query_type&quot;:&quot;OR&quot;,&quot;order&quot;:&quot;&quot;,&quot;meta_key&quot;:&quot;&quot;,&quot;exclude&quot;:&quot;&quot;,&quot;class&quot;:&quot;&quot;,&quot;ajax_page&quot;:&quot;&quot;,&quot;speed&quot;:&quot;5000&quot;,&quot;slides_per_view&quot;:&quot;4&quot;,&quot;slides_per_view_tablet&quot;:&quot;auto&quot;,&quot;slides_per_view_mobile&quot;:&quot;auto&quot;,&quot;wrap&quot;:&quot;&quot;,&quot;autoplay&quot;:&quot;no&quot;,&quot;center_mode&quot;:&quot;no&quot;,&quot;hide_pagination_control&quot;:&quot;&quot;,&quot;hide_prev_next_buttons&quot;:&quot;&quot;,&quot;scroll_per_page&quot;:&quot;yes&quot;,&quot;img_size&quot;:&quot;woocommerce_thumbnail&quot;,&quot;force_not_ajax&quot;:&quot;no&quot;,&quot;products_masonry&quot;:&quot;disable&quot;,&quot;products_different_sizes&quot;:&quot;disable&quot;,&quot;lazy_loading&quot;:&quot;no&quot;,&quot;scroll_carousel_init&quot;:&quot;no&quot;,&quot;el_class&quot;:&quot;&quot;,&quot;shop_tools&quot;:&quot;no&quot;,&quot;query_post_type&quot;:[&quot;product&quot;,&quot;product_variation&quot;],&quot;hide_out_of_stock&quot;:&quot;no&quot;,&quot;css&quot;:&quot;&quot;,&quot;woodmart_css_id&quot;:&quot;&quot;,&quot;ajax_recently_viewed&quot;:&quot;no&quot;,&quot;is_wishlist&quot;:&quot;yes&quot;}"
                        data-source="shortcode" data-columns="3" data-grid-gallery="">
                        <div class="product-grid-item wd-with-labels product wd-hover-quick  col-lg-4 col-md-4 col-6 first  type-product post-870 status-publish instock product_cat-cancer-care product_tag-cancer product_tag-dna-repair product_tag-tumor has-post-thumbnail featured shipping-taxable purchasable product-type-simple"
                            data-loop="1" data-id="870">

                            <div class="wd-wishlist-product-actions">
                                <div class="wd-wishlist-product-remove wd-action-btn wd-style-text wd-cross-icon">
                                    <a href="#" class="wd-wishlist-remove" data-product-id="870">
                                        Remove </a>
                                </div>
                                <div class="wd-wishlist-product-checkbox">
                                    <input type="checkbox" class="wd-wishlist-checkbox" data-product-id="870">
                                </div>
                            </div>

                            <div class="product-wrapper">
                                <div class="product-element-top wd-quick-shop">
                                    <a href="https://herbsofafrica.com/product/recnac/" class="product-image-link">
                                        <link rel="stylesheet" id="wd-woo-mod-product-labels-css"
                                            href="{{asset('wp-content/themes/woodmart/css/parts/woo-mod-product-labels.min.css?ver=7.2.4"
                                            type="text/css" media="all">
                                        <link rel="stylesheet" id="wd-woo-mod-product-labels-round-css"
                                            href="{{asset('wp-content/themes/woodmart/css/parts/woo-mod-product-labels-round.min.css?ver=7.2.4"
                                            type="text/css" media="all">
                                        <div class="product-labels labels-rounded"><span
                                                class="featured product-label">Hot</span></div><img fetchpriority="high"
                                            decoding="async" width="300" height="300"
                                            src="{{asset('wp-content/uploads/2023/08/ezgif.com-gif-maker-20-300x300.webp')}}"
                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-image-1585"
                                            alt=""
                                            srcset="{{asset('wp-content/uploads/2023/08/ezgif.com-gif-maker-20-300x300.webp')}} 300w, {{asset('wp-content/uploads/2023/08/ezgif.com-gif-maker-20-150x150.webp')}} 150w, {{asset('wp-content/uploads/2023/08/ezgif.com-gif-maker-20-768x768.webp')}} 768w, {{asset('wp-content/uploads/2023/08/ezgif.com-gif-maker-20-600x600.webp')}} 600w, {{asset('wp-content/uploads/2023/08/ezgif.com-gif-maker-20.webp')}} 800w"
                                            sizes="(max-width: 300px) 100vw, 300px">
                                    </a>
                                    <div class="hover-img">
                                        <a href="https://herbsofafrica.com/product/recnac/">
                                            <img decoding="async" width="300" height="300"
                                                src="{{asset('wp-content/uploads/2023/08/RECNAC_1_hoa-300x300.png')}}"
                                                class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-image-872"
                                                alt=""
                                                srcset="{{asset('wp-content/uploads/2023/08/RECNAC_1_hoa-300x300.png')}} 300w, {{asset('wp-content/uploads/2023/08/RECNAC_1_hoa-150x150.png')}} 150w, {{asset('wp-content/uploads/2023/08/RECNAC_1_hoa-768x768.png')}} 768w, {{asset('wp-content/uploads/2023/08/RECNAC_1_hoa-600x600.png')}} 600w, {{asset('wp-content/uploads/2023/08/RECNAC_1_hoa.png')}} 800w"
                                                sizes="(max-width: 300px) 100vw, 300px"> </a>
                                    </div>
                                    <div class="wd-buttons wd-pos-r-t">
                                        <div class="wd-wishlist-btn wd-action-btn wd-style-icon wd-wishlist-icon">
                                            <a class=" added" href="https://herbsofafrica.com/wishlist/"
                                                data-key="d50c51cd30" data-product-id="870" rel="nofollow"
                                                data-added-text="Browse Wishlist">
                                                <span>Browse Wishlist</span>
                                            </a>
                                        </div>
                                    </div>


                                    <div class="wd-add-btn wd-add-btn-replace">

                                        <a href="?add-to-cart=870" data-quantity="1"
                                            class="button product_type_simple add_to_cart_button ajax_add_to_cart add-to-cart-loop"
                                            data-product_id="870" data-product_sku=""
                                            aria-label="Add to basket: “Recnac”" aria-describedby=""
                                            rel="nofollow"><span>Add to basket</span></a>
                                    </div>




                                </div>
                                <div class="wd-product-cats">
                                    <a href="https://herbsofafrica.com/product-category/cancer-care/"
                                        rel="tag">Cancer Care</a>
                                </div>
                                <h3 class="wd-entities-title"><a
                                        href="https://herbsofafrica.com/product/recnac/">Recnac</a></h3>
                                <span style="font-size:13px">Empower Your Journey to Cancer-free Wellness | 60
                                    Capsules</span>
                                <span class="price"><span class="woocs_price_code" data-currency=""
                                        data-redraw-id="65baf67aaf0cb" data-product-id="870"><span
                                            class="woocommerce-Price-amount amount"><bdi><span
                                                    class="woocommerce-Price-currencySymbol">$</span>50</bdi></span></span></span>



                            </div>
                        </div>
                        <div class="product-grid-item product wd-hover-quick  col-lg-4 col-md-4 col-6 type-product post-856 status-publish instock product_cat-cancer-care product_cat-prostate-health has-post-thumbnail shipping-taxable purchasable product-type-simple"
                            data-loop="2" data-id="856">

                            <div class="wd-wishlist-product-actions">
                                <div class="wd-wishlist-product-remove wd-action-btn wd-style-text wd-cross-icon">
                                    <a href="#" class="wd-wishlist-remove" data-product-id="856">
                                        Remove </a>
                                </div>
                                <div class="wd-wishlist-product-checkbox">
                                    <input type="checkbox" class="wd-wishlist-checkbox" data-product-id="856">
                                </div>
                            </div>

                            <div class="product-wrapper">
                                <div class="product-element-top wd-quick-shop">
                                    <a href="https://herbsofafrica.com/product/prostazipin/" class="product-image-link">
                                        <img decoding="async" width="300" height="300"
                                            src="{{asset('wp-content/uploads/2023/08/ezgif.com-gif-maker-21-300x300.webp')}}"
                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-image-1587"
                                            alt=""
                                            srcset="{{asset('wp-content/uploads/2023/08/ezgif.com-gif-maker-21-300x300.webp')}} 300w, {{asset('wp-content/uploads/2023/08/ezgif.com-gif-maker-21-150x150.webp')}} 150w, {{asset('wp-content/uploads/2023/08/ezgif.com-gif-maker-21-768x768.webp')}} 768w, {{asset('wp-content/uploads/2023/08/ezgif.com-gif-maker-21-600x600.webp')}} 600w, {{asset('wp-content/uploads/2023/08/ezgif.com-gif-maker-21.webp')}} 800w"
                                            sizes="(max-width: 300px) 100vw, 300px">
                                    </a>
                                    <div class="hover-img">
                                        <a href="https://herbsofafrica.com/product/prostazipin/">
                                            <img loading="lazy" decoding="async" width="300" height="300"
                                                src="{{asset('wp-content/uploads/2023/08/Prostazipin-vF-Copy-300x300.png')}}"
                                                class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-image-857"
                                                alt=""
                                                srcset="{{asset('wp-content/uploads/2023/08/Prostazipin-vF-Copy-300x300.png')}} 300w, {{asset('wp-content/uploads/2023/08/Prostazipin-vF-Copy-150x150.png')}} 150w, {{asset('wp-content/uploads/2023/08/Prostazipin-vF-Copy-768x768.png')}} 768w, {{asset('wp-content/uploads/2023/08/Prostazipin-vF-Copy-600x600.png')}} 600w, {{asset('wp-content/uploads/2023/08/Prostazipin-vF-Copy.png')}} 800w"
                                                sizes="(max-width: 300px) 100vw, 300px"> </a>
                                    </div>
                                    <div class="wd-buttons wd-pos-r-t">
                                        <div class="wd-wishlist-btn wd-action-btn wd-style-icon wd-wishlist-icon">
                                            <a class=" added" href="https://herbsofafrica.com/wishlist/"
                                                data-key="d50c51cd30" data-product-id="856" rel="nofollow"
                                                data-added-text="Browse Wishlist">
                                                <span>Browse Wishlist</span>
                                            </a>
                                        </div>
                                    </div>


                                    <div class="wd-add-btn wd-add-btn-replace">

                                        <a href="?add-to-cart=856" data-quantity="1"
                                            class="button product_type_simple add_to_cart_button ajax_add_to_cart add-to-cart-loop"
                                            data-product_id="856" data-product_sku=""
                                            aria-label="Add to basket: “Prostazipin”" aria-describedby=""
                                            rel="nofollow"><span>Add to basket</span></a>
                                    </div>




                                </div>
                                <div class="wd-product-cats">
                                    <a href="https://herbsofafrica.com/product-category/cancer-care/"
                                        rel="tag">Cancer Care</a>, <a
                                        href="https://herbsofafrica.com/product-category/prostate-health/"
                                        rel="tag">Prostate Health</a>
                                </div>
                                <h3 class="wd-entities-title"><a
                                        href="https://herbsofafrica.com/product/prostazipin/">Prostazipin</a></h3>
                                <span style="font-size:13px">Prostate cancer prevention and wellness support | 60
                                    Capsules</span>
                                <span class="price"><span class="woocs_price_code" data-currency=""
                                        data-redraw-id="65baf67ab117d" data-product-id="856"><span
                                            class="woocommerce-Price-amount amount"><bdi><span
                                                    class="woocommerce-Price-currencySymbol">$</span>50</bdi></span></span></span>



                            </div>
                        </div>
                        <div class="product-grid-item wd-with-labels product wd-hover-quick  col-lg-4 col-md-4 col-6 last  type-product post-775 status-publish last instock product_cat-sexual-health product_tag-erection product_tag-hardon product_tag-libido product_tag-male product_tag-men product_tag-performance product_tag-sex product_tag-sexual-health has-post-thumbnail featured shipping-taxable purchasable product-type-simple"
                            data-loop="3" data-id="775">

                            <div class="wd-wishlist-product-actions">
                                <div class="wd-wishlist-product-remove wd-action-btn wd-style-text wd-cross-icon">
                                    <a href="#" class="wd-wishlist-remove" data-product-id="775">
                                        Remove </a>
                                </div>
                                <div class="wd-wishlist-product-checkbox">
                                    <input type="checkbox" class="wd-wishlist-checkbox" data-product-id="775">
                                </div>
                            </div>

                            <div class="product-wrapper">
                                <div class="product-element-top wd-quick-shop">
                                    <a href="https://herbsofafrica.com/product/fabman/" class="product-image-link">
                                        <div class="product-labels labels-rounded"><span
                                                class="featured product-label">Hot</span></div><img loading="lazy"
                                            decoding="async" width="300" height="300"
                                            src="{{asset('wp-content/uploads/2023/08/ezgif.com-gif-maker-25-300x300.webp')}}"
                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-image-1596"
                                            alt=""
                                            srcset="{{asset('wp-content/uploads/2023/08/ezgif.com-gif-maker-25-300x300.webp')}} 300w, {{asset('wp-content/uploads/2023/08/ezgif.com-gif-maker-25-150x150.webp')}} 150w, {{asset('wp-content/uploads/2023/08/ezgif.com-gif-maker-25.webp')}} 600w"
                                            sizes="(max-width: 300px) 100vw, 300px">
                                    </a>
                                    <div class="hover-img">
                                        <a href="https://herbsofafrica.com/product/fabman/">
                                            <img loading="lazy" decoding="async" width="300" height="300"
                                                src="{{asset('wp-content/uploads/2023/08/FABMAN_1-300x300.png')}}"
                                                class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-image-777"
                                                alt=""
                                                srcset="{{asset('wp-content/uploads/2023/08/FABMAN_1-300x300.png')}} 300w, {{asset('wp-content/uploads/2023/08/FABMAN_1-150x150.png')}} 150w, {{asset('wp-content/uploads/2023/08/FABMAN_1-768x768.png')}} 768w, {{asset('wp-content/uploads/2023/08/FABMAN_1-600x600.png')}} 600w, {{asset('wp-content/uploads/2023/08/FABMAN_1.png')}} 800w"
                                                sizes="(max-width: 300px) 100vw, 300px"> </a>
                                    </div>
                                    <div class="wd-buttons wd-pos-r-t">
                                        <div class="wd-wishlist-btn wd-action-btn wd-style-icon wd-wishlist-icon">
                                            <a class=" added" href="https://herbsofafrica.com/wishlist/"
                                                data-key="d50c51cd30" data-product-id="775" rel="nofollow"
                                                data-added-text="Browse Wishlist">
                                                <span>Browse Wishlist</span>
                                            </a>
                                        </div>
                                    </div>


                                    <div class="wd-add-btn wd-add-btn-replace">

                                        <a href="?add-to-cart=775" data-quantity="1"
                                            class="button product_type_simple add_to_cart_button ajax_add_to_cart add-to-cart-loop"
                                            data-product_id="775" data-product_sku=""
                                            aria-label="Add to basket: “Fabman”" aria-describedby=""
                                            rel="nofollow"><span>Add to basket</span></a>
                                    </div>




                                </div>
                                <div class="wd-product-cats">
                                    <a href="https://herbsofafrica.com/product-category/sexual-health/"
                                        rel="tag">Sexual Health</a>
                                </div>
                                <h3 class="wd-entities-title"><a
                                        href="https://herbsofafrica.com/product/fabman/">Fabman</a></h3>
                                <span style="font-size:13px">Rediscover and optimize your men's sexual health naturally |
                                    60 Capsules</span>
                                <span class="price"><span class="woocs_price_code" data-currency=""
                                        data-redraw-id="65baf67ab3bd5" data-product-id="775"><span
                                            class="woocommerce-Price-amount amount"><bdi><span
                                                    class="woocommerce-Price-currencySymbol">$</span>50</bdi></span></span></span>



                            </div>
                        </div>
                        <div class="product-grid-item product wd-hover-quick  col-lg-4 col-md-4 col-6 first  type-product post-1150 status-publish first instock product_cat-immune-health product_tag-anti-virus product_tag-covid product_tag-immunity product_tag-infections has-post-thumbnail shipping-taxable purchasable product-type-simple"
                            data-loop="4" data-id="1150">

                            <div class="wd-wishlist-product-actions">
                                <div class="wd-wishlist-product-remove wd-action-btn wd-style-text wd-cross-icon">
                                    <a href="#" class="wd-wishlist-remove" data-product-id="1150">
                                        Remove </a>
                                </div>
                                <div class="wd-wishlist-product-checkbox">
                                    <input type="checkbox" class="wd-wishlist-checkbox" data-product-id="1150">
                                </div>
                            </div>

                            <div class="product-wrapper">
                                <div class="product-element-top wd-quick-shop">
                                    <a href="https://herbsofafrica.com/product/myraco/" class="product-image-link">
                                        <img loading="lazy" decoding="async" width="300" height="300"
                                            src="{{asset('wp-content/uploads/2023/08/Myraco-2023-Aug-VF-300x300.jpg')}}"
                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-image-1742"
                                            alt=""
                                            srcset="{{asset('wp-content/uploads/2023/08/Myraco-2023-Aug-VF-300x300.jpg')}} 300w, {{asset('wp-content/uploads/2023/08/Myraco-2023-Aug-VF-150x150.jpg')}} 150w, {{asset('wp-content/uploads/2023/08/Myraco-2023-Aug-VF-768x768.jpg')}} 768w, {{asset('wp-content/uploads/2023/08/Myraco-2023-Aug-VF-600x600.jpg')}} 600w, {{asset('wp-content/uploads/2023/08/Myraco-2023-Aug-VF.jpg')}} 800w"
                                            sizes="(max-width: 300px) 100vw, 300px">
                                    </a>
                                    <div class="hover-img">
                                        <a href="https://herbsofafrica.com/product/myraco/">
                                            <img loading="lazy" decoding="async" width="300" height="300"
                                                src="{{asset('wp-content/uploads/2023/08/Myraco-2023-Aug-VF-300x300.png')}}"
                                                class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-image-1743"
                                                alt=""
                                                srcset="{{asset('wp-content/uploads/2023/08/Myraco-2023-Aug-VF-300x300.png')}} 300w, {{asset('wp-content/uploads/2023/08/Myraco-2023-Aug-VF-150x150.png')}} 150w, {{asset('wp-content/uploads/2023/08/Myraco-2023-Aug-VF-768x768.png')}} 768w, {{asset('wp-content/uploads/2023/08/Myraco-2023-Aug-VF-600x600.png')}} 600w, {{asset('wp-content/uploads/2023/08/Myraco-2023-Aug-VF.png')}} 800w"
                                                sizes="(max-width: 300px) 100vw, 300px"> </a>
                                    </div>
                                    <div class="wd-buttons wd-pos-r-t">
                                        <div class="wd-wishlist-btn wd-action-btn wd-style-icon wd-wishlist-icon">
                                            <a class=" added" href="https://herbsofafrica.com/wishlist/"
                                                data-key="d50c51cd30" data-product-id="1150" rel="nofollow"
                                                data-added-text="Browse Wishlist">
                                                <span>Browse Wishlist</span>
                                            </a>
                                        </div>
                                    </div>


                                    <div class="wd-add-btn wd-add-btn-replace">

                                        <a href="?add-to-cart=1150" data-quantity="1"
                                            class="button product_type_simple add_to_cart_button ajax_add_to_cart add-to-cart-loop"
                                            data-product_id="1150" data-product_sku=""
                                            aria-label="Add to basket: “Myraco”" aria-describedby=""
                                            rel="nofollow"><span>Add to basket</span></a>
                                    </div>




                                </div>
                                <div class="wd-product-cats">
                                    <a href="https://herbsofafrica.com/product-category/immune-health/"
                                        rel="tag">Immune Health</a>
                                </div>
                                <h3 class="wd-entities-title"><a
                                        href="https://herbsofafrica.com/product/myraco/">Myraco</a></h3>
                                <span style="font-size:13px">Natural immune system booster and powerhouse! | 60
                                    Capsules</span>
                                <span class="price"><span class="woocs_price_code" data-currency=""
                                        data-redraw-id="65baf67ab57e4" data-product-id="1150"><span
                                            class="woocommerce-Price-amount amount"><bdi><span
                                                    class="woocommerce-Price-currencySymbol">$</span>45</bdi></span></span></span>



                            </div>
                        </div>
                        <div class="product-grid-item wd-with-labels product wd-hover-quick  col-lg-4 col-md-4 col-6 type-product post-618 status-publish instock product_cat-cardiovascular-health has-post-thumbnail featured shipping-taxable purchasable product-type-simple"
                            data-loop="5" data-id="618">

                            <div class="wd-wishlist-product-actions">
                                <div class="wd-wishlist-product-remove wd-action-btn wd-style-text wd-cross-icon">
                                    <a href="#" class="wd-wishlist-remove" data-product-id="618">
                                        Remove </a>
                                </div>
                                <div class="wd-wishlist-product-checkbox">
                                    <input type="checkbox" class="wd-wishlist-checkbox" data-product-id="618">
                                </div>
                            </div>

                            <div class="product-wrapper">
                                <div class="product-element-top wd-quick-shop">
                                    <a href="https://herbsofafrica.com/product/cardioright/" class="product-image-link">
                                        <div class="product-labels labels-rounded"><span
                                                class="featured product-label">Hot</span></div><img loading="lazy"
                                            decoding="async" width="300" height="300"
                                            src="{{asset('wp-content/uploads/2023/08/ezgif.com-gif-maker-28-300x300.webp')}}"
                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-image-1600"
                                            alt=""
                                            srcset="{{asset('wp-content/uploads/2023/08/ezgif.com-gif-maker-28-300x300.webp')}} 300w, {{asset('wp-content/uploads/2023/08/ezgif.com-gif-maker-28-150x150.webp')}} 150w, {{asset('wp-content/uploads/2023/08/ezgif.com-gif-maker-28-768x768.webp')}} 768w, {{asset('wp-content/uploads/2023/08/ezgif.com-gif-maker-28-600x600.webp')}} 600w, {{asset('wp-content/uploads/2023/08/ezgif.com-gif-maker-28.webp')}} 800w"
                                            sizes="(max-width: 300px) 100vw, 300px">
                                    </a>
                                    <div class="hover-img">
                                        <a href="https://herbsofafrica.com/product/cardioright/">
                                            <img loading="lazy" decoding="async" width="300" height="300"
                                                src="{{asset('wp-content/uploads/2023/08/Cardioright-Undated_vF-veed-remove-background_orange-300x300.png')}}"
                                                class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-image-636"
                                                alt=""
                                                srcset="{{asset('wp-content/uploads/2023/08/Cardioright-Undated_vF-veed-remove-background_orange-300x300.png')}} 300w, {{asset('wp-content/uploads/2023/08/Cardioright-Undated_vF-veed-remove-background_orange-150x150.png')}} 150w, {{asset('wp-content/uploads/2023/08/Cardioright-Undated_vF-veed-remove-background_orange-768x768.png')}} 768w, {{asset('wp-content/uploads/2023/08/Cardioright-Undated_vF-veed-remove-background_orange-600x600.png')}} 600w, {{asset('wp-content/uploads/2023/08/Cardioright-Undated_vF-veed-remove-background_orange.png')}} 800w"
                                                sizes="(max-width: 300px) 100vw, 300px"> </a>
                                    </div>
                                    <div class="wd-buttons wd-pos-r-t">
                                        <div class="wd-wishlist-btn wd-action-btn wd-style-icon wd-wishlist-icon">
                                            <a class=" added" href="https://herbsofafrica.com/wishlist/"
                                                data-key="d50c51cd30" data-product-id="618" rel="nofollow"
                                                data-added-text="Browse Wishlist">
                                                <span>Browse Wishlist</span>
                                            </a>
                                        </div>
                                    </div>


                                    <div class="wd-add-btn wd-add-btn-replace">

                                        <a href="?add-to-cart=618" data-quantity="1"
                                            class="button product_type_simple add_to_cart_button ajax_add_to_cart add-to-cart-loop"
                                            data-product_id="618" data-product_sku=""
                                            aria-label="Add to basket: “Cardioright”" aria-describedby=""
                                            rel="nofollow"><span>Add to basket</span></a>
                                    </div>




                                </div>
                                <div class="wd-product-cats">
                                    <a href="https://herbsofafrica.com/product-category/cardiovascular-health/"
                                        rel="tag">Cardiovascular Health</a>
                                </div>
                                <h3 class="wd-entities-title"><a
                                        href="https://herbsofafrica.com/product/cardioright/">Cardioright</a></h3>
                                <span style="font-size:13px">Natural organic herbal remedy for high blood pressure and
                                    cardiovascular health | 60 Capsules</span>
                                <span class="price"><span class="woocs_price_code" data-currency=""
                                        data-redraw-id="65baf67ab8622" data-product-id="618"><span
                                            class="woocommerce-Price-amount amount"><bdi><span
                                                    class="woocommerce-Price-currencySymbol">$</span>45</bdi></span></span></span>



                            </div>
                        </div>
                        <div class="product-grid-item wd-with-labels product wd-hover-quick  col-lg-4 col-md-4 col-6 last  type-product post-564 status-publish instock product_cat-weight-management has-post-thumbnail featured shipping-taxable purchasable product-type-simple"
                            data-loop="6" data-id="564">

                            <div class="wd-wishlist-product-actions">
                                <div class="wd-wishlist-product-remove wd-action-btn wd-style-text wd-cross-icon">
                                    <a href="#" class="wd-wishlist-remove" data-product-id="564">
                                        Remove </a>
                                </div>
                                <div class="wd-wishlist-product-checkbox">
                                    <input type="checkbox" class="wd-wishlist-checkbox" data-product-id="564">
                                </div>
                            </div>

                            <div class="product-wrapper">
                                <div class="product-element-top wd-quick-shop">
                                    <a href="https://herbsofafrica.com/product/bellyfat/" class="product-image-link">
                                        <div class="product-labels labels-rounded"><span
                                                class="featured product-label">Hot</span></div><img loading="lazy"
                                            decoding="async" width="300" height="300"
                                            src="{{asset('wp-content/uploads/2023/08/ezgif.com-gif-maker-27-300x300.webp')}}"
                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-image-1599"
                                            alt=""
                                            srcset="{{asset('wp-content/uploads/2023/08/ezgif.com-gif-maker-27-300x300.webp')}} 300w, {{asset('wp-content/uploads/2023/08/ezgif.com-gif-maker-27-150x150.webp')}} 150w, {{asset('wp-content/uploads/2023/08/ezgif.com-gif-maker-27-768x768.webp')}} 768w, {{asset('wp-content/uploads/2023/08/ezgif.com-gif-maker-27-600x600.webp')}} 600w, {{asset('wp-content/uploads/2023/08/ezgif.com-gif-maker-27.webp')}} 800w"
                                            sizes="(max-width: 300px) 100vw, 300px">
                                    </a>
                                    <div class="hover-img">
                                        <a href="https://herbsofafrica.com/product/bellyfat/">
                                            <img loading="lazy" decoding="async" width="300" height="300"
                                                src="{{asset('wp-content/uploads/2023/08/BELLYFLAT_1_hoa-veed-remove-background-300x300.png')}}"
                                                class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-image-589"
                                                alt=""
                                                srcset="{{asset('wp-content/uploads/2023/08/BELLYFLAT_1_hoa-veed-remove-background-300x300.png')}} 300w, {{asset('wp-content/uploads/2023/08/BELLYFLAT_1_hoa-veed-remove-background-150x150.png')}} 150w, {{asset('wp-content/uploads/2023/08/BELLYFLAT_1_hoa-veed-remove-background-768x768.png')}} 768w, {{asset('wp-content/uploads/2023/08/BELLYFLAT_1_hoa-veed-remove-background-600x600.png')}} 600w, {{asset('wp-content/uploads/2023/08/BELLYFLAT_1_hoa-veed-remove-background.png')}} 800w"
                                                sizes="(max-width: 300px) 100vw, 300px"> </a>
                                    </div>
                                    <div class="wd-buttons wd-pos-r-t">
                                        <div class="wd-wishlist-btn wd-action-btn wd-style-icon wd-wishlist-icon">
                                            <a class=" added" href="https://herbsofafrica.com/wishlist/"
                                                data-key="d50c51cd30" data-product-id="564" rel="nofollow"
                                                data-added-text="Browse Wishlist">
                                                <span>Browse Wishlist</span>
                                            </a>
                                        </div>
                                    </div>


                                    <div class="wd-add-btn wd-add-btn-replace">

                                        <a href="?add-to-cart=564" data-quantity="1"
                                            class="button product_type_simple add_to_cart_button ajax_add_to_cart add-to-cart-loop"
                                            data-product_id="564" data-product_sku=""
                                            aria-label="Add to basket: “Bellyfat”" aria-describedby=""
                                            rel="nofollow"><span>Add to basket</span></a>
                                    </div>




                                </div>
                                <div class="wd-product-cats">
                                    <a href="https://herbsofafrica.com/product-category/weight-management/"
                                        rel="tag">Weight Management</a>
                                </div>
                                <h3 class="wd-entities-title"><a
                                        href="https://herbsofafrica.com/product/bellyfat/">Bellyfat</a></h3>
                                <span style="font-size:13px">Optimize metabolism and lose belly and abdominal fat naturally
                                    from within. | 60 Capsules</span>
                                <span class="price"><span class="woocs_price_code" data-currency=""
                                        data-redraw-id="65baf67abb0b3" data-product-id="564"><span
                                            class="woocommerce-Price-amount amount"><bdi><span
                                                    class="woocommerce-Price-currencySymbol">$</span>45</bdi></span></span></span>



                            </div>
                        </div>
                    </div>
                </div>
                <div class="wd-loader-overlay wd-fill"></div>
            </div>
        </div>
    </div>
@endsection
