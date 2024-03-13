@extends('layouts.app')
@push('styles')
    <link rel='stylesheet' id='wp-block-library-css'
        href="{{ asset('wp-includes/css/dist/block-library/style.min1e39.css?ver=6.4.2') }}" type='text/css' media='all' />
    <link rel='stylesheet' id='wd-page-wishlist-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-page-wishlist.minc30a.css?ver=7.2.4') }}" type='text/css'
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
    
    <link rel="stylesheet" id="wd-page-wishlist-bulk-css"
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-page-wishlist-bulk.min.css?ver=7.2.4') }}" type="text/css"
        media="all">
    <link rel='stylesheet' id='wd-product-loop-css'
        href="{{asset('wp-content/themes/woodmart/css/parts/woo-product-loop.minc30a.css?ver=7.2.4')}}" type='text/css'
        media='all' />
    <link rel='stylesheet' id='wd-product-loop-quick-css'
        href="{{asset('wp-content/themes/woodmart/css/parts/woo-product-loop-quick.minc30a.css?ver=7.2.4')}}" type='text/css'
        media='all' />
    <link rel='stylesheet' id='wd-woo-mod-add-btn-replace-css'
        href="{{asset('wp-content/themes/woodmart/css/parts/woo-mod-add-btn-replace.minc30a.css?ver=7.2.4')}}" type='text/css'
        media='all' />
    <link rel='stylesheet' id='wd-woo-mod-product-labels-css'
        href="{{asset('wp-content/themes/woodmart/css/parts/woo-mod-product-labels.minc30a.css?ver=7.2.4')}}" type='text/css'
        media='all' />
    <link rel='stylesheet' id='wd-woo-mod-product-labels-round-css'
        href="{{asset('wp-content/themes/woodmart/css/parts/woo-mod-product-labels-round.minc30a.css?ver=7.2.4')}}" type='text/css'
        media='all' />
        @stack('dashboard_styles')
@endpush
@section('main')
<div class="main-page-wrapper" style="background-image: url({{asset('wp-content/uploads/2023/09/er.png')}});background-position: center center; background-repeat: no-repeat; background-size: cover;">


    <!-- MAIN CONTENT AREA -->
    <div class="container">
        <div class="row content-layout-wrapper align-items-start">

            <div class="site-content col-lg-12 col-12 col-md-12" role="main">

                <article id="post-492" class="post-492 page type-page status-publish hentry">

                    <div class="entry-content">
                        <div data-elementor-type="wp-page" data-elementor-id="492"
                            class="elementor elementor-492">
                            <section class="wd-negative-gap elementor-section elementor-top-section elementor-element elementor-element-8aa35b9 elementor-section-boxed elementor-section-height-default elementor-section-height-default wd-section-disabled"
                                data-id="8aa35b9" data-element_type="section"
                                data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                <div class="elementor-container elementor-column-gap-default">
                                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-891a1ac"
                                        data-id="891a1ac" data-element_type="column"
                                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                        <div class="elementor-widget-wrap elementor-element-populated">
                                            <div class="elementor-element elementor-element-ae5fa75 color-scheme-inherit text-left elementor-widget elementor-widget-text-editor"
                                                data-id="ae5fa75" data-element_type="widget"
                                                data-widget_type="text-editor.default">
                                                <div class="elementor-widget-container">
                                                    <style>
                                                        /*! elementor - v3.19.0 - 29-01-2024 */
                                                        .elementor-widget-text-editor.elementor-drop-cap-view-stacked .elementor-drop-cap {
                                                            background-color: #69727d;
                                                            color: #fff
                                                        }

                                                        .elementor-widget-text-editor.elementor-drop-cap-view-framed .elementor-drop-cap {
                                                            color: #69727d;
                                                            border: 3px solid;
                                                            background-color: transparent
                                                        }

                                                        .elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap {
                                                            margin-top: 8px
                                                        }

                                                        .elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap-letter {
                                                            width: 1em;
                                                            height: 1em
                                                        }

                                                        .elementor-widget-text-editor .elementor-drop-cap {
                                                            float: left;
                                                            text-align: center;
                                                            line-height: 1;
                                                            font-size: 50px
                                                        }

                                                        .elementor-widget-text-editor .elementor-drop-cap-letter {
                                                            display: inline-block
                                                        }
                                                    </style>
                                                    <div class="woocommerce">
                                                        <div class="woocommerce-my-account-wrapper">
                                                            @include('user.navigation')
                                                            <p><!-- .wd-my-account-sidebar --></p>
                                                            @yield('dashboard_content')
                                                            <p><!-- .woocommerce-my-account-wrapper --></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>


                </article><!-- #post -->



            </div><!-- .site-content -->



        </div><!-- .main-page-wrapper -->
    </div> <!-- end row -->
</div>
@endsection
@push('scripts')
    @stack('dashboard_scripts')
@endpush
