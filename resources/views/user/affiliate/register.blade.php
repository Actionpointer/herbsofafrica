@extends('layouts.app')
@push('styles')
    <link rel='stylesheet' id='elementor-post-492-css'
        href="{{ asset('wp-content/uploads/elementor/css/post-4921a99.css?ver=1704948825') }}" type='text/css'
        media='all' />
        <link rel='stylesheet' id='wd-select2-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-lib-select2.minc30a.css?ver=7.2.4') }}" type='text/css'
        media='all' />
    <link rel='stylesheet' id='wd-woo-mod-shop-table-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-mod-shop-table.minc30a.css?ver=7.2.4') }}" type='text/css'
        media='all' />
    <link rel='stylesheet' id='wd-woo-mod-grid-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-mod-grid.minc30a.css?ver=7.2.4') }}" type='text/css'
        media='all' />
    <link rel='stylesheet' id='wd-page-checkout-payment-methods-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-page-checkout-el-payment-methods.minc30a.css?ver=7.2.4') }}"
        type='text/css' media='all' />
    <link rel='stylesheet' id='wd-woo-mod-order-details-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-mod-order-details.minc30a.css?ver=7.2.4') }}"
        type='text/css' media='all' />
    <link rel='stylesheet' id='wd-page-my-account-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-page-my-account.minc30a.css?ver=7.2.4') }}" type='text/css'
        media='all' />
    <link rel='stylesheet' id='wd-woo-page-login-register-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-page-login-register.minc30a.css?ver=7.2.4') }}"
        type='text/css' media='all' />
@endpush
@section('main')
    <div class="main-page-wrapper"
        style="background-image: url({{ asset('wp-content/uploads/2023/09/er.png') }});background-position: center center; background-repeat: no-repeat; background-size: cover;">
        <div class="container">
            <div class="row content-layout-wrapper align-items-start">

                <div class="site-content col-lg-12 col-12 col-md-12" role="main">

                    <article id="post-492" class="post-492 page-id-492 page type-page status-publish hentry">

                        <div class="entry-content">
                            <div data-elementor-type="wp-page" data-elementor-id="492" class="elementor elementor-492">
                                <section
                                    class="wd-negative-gap elementor-section elementor-top-section elementor-element elementor-element-8aa35b9 elementor-section-boxed elementor-section-height-default elementor-section-height-default wd-section-disabled"
                                    data-id="8aa35b9" data-element_type="section"
                                    data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                    <div class="elementor-container elementor-column-gap-default">
                                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-891a1ac"
                                            data-id="891a1ac" data-element_type="column"
                                            data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-872e230 elementor-widget elementor-widget-wd_title"
                                                    data-id="872e230" data-element_type="widget" id="registerlink"
                                                    data-widget_type="wd_title.default">
                                                    <div class="elementor-widget-container">
                                                        <div
                                                            class="title-wrapper set-mb-s reset-last-child wd-title-color-primary wd-title-style-default wd-title-size-default text-center">
                                                            <div class="liner-continer">
                                                                <h4 class="woodmart-title-container title wd-fontsize-l">
                                                                    Become a partner
                                                                </h4>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-8514871 elementor-widget elementor-widget-wd_title"
                                                    data-id="8514871" data-element_type="widget" id="registerlink"
                                                    data-widget_type="wd_title.default">
                                                    <div class="elementor-widget-container">
                                                        <div
                                                            class="title-wrapper set-mb-s reset-last-child wd-title-color-default wd-title-style-default wd-title-size-default text-center">
                                                            <div class="liner-continer">
                                                                <h4 class="woodmart-title-container title wd-fontsize-l">
                                                                    To access exciting benefits!</h4>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-ae5fa75 color-scheme-inherit text-left elementor-widget elementor-widget-text-editor"
                                                    data-id="ae5fa75" data-element_type="widget"
                                                    data-widget_type="text-editor.default">
                                                    <div class="elementor-widget-container">

                                                        <div class="woocommerce">
                                                            <div class="woocommerce-notices-wrapper"></div>
                                                            <div class="wd-registration-page">
                                                                <div class="row" id="customer_login">

                                                                    <div class="col-12 col-md-6 col-register">
                                                                        <h2 class="wd-login-title">Register</h2>
                                                                        <form action="{{route('affiliate.register')}}" method="post" id="mainForm" class="pure-form pure-form-stacked">@csrf
                                                                            * Required fields<br><br>
                                                                            <fieldset>
                                                                                <div class="mb-3">
                                                                                    <label for="affiliate_username">Affiliate Username *</label>
                                                                                    <input type="text" id="affiliate_username" name="affiliate_username" value="{{old('affiliate_username')}}" required="">
                                                                                    @error('affiliate_username')
                                                                                    <div style="color: red;">{{$message}}</div>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="affiliate_email">Affiliate Email *</label>
                                                                                    <input type="text" id="affiliate_email" name="affiliate_email" value="{{auth()->user()->email}}" required="">
                                                                                    @error('affiliate_email')
                                                                                    <div style="color: red;">{{$message}}</div>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="affiliate_phone">Affiliate Phone Number *</label>
                                                                                    <input type="text" id="affiliate_phone" name="affiliate_phone" value="{{old('affiliate_phone')}}" required="">
                                                                                    @error('affiliate_phone')
                                                                                    <div style="color: red;">{{$message}}</div>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="affiliate_country">Country *</label>
                                                                                    <select name="affiliate_country" id="affiliate_country" class="country_to_state country_select select2" autocomplete="country" data-placeholder="Select a country / region" data-label="Country/Region">
                                                                                        <option value="">Select a country / region&hellip;</option>
                                                                                        @foreach ($countries as $country)
                                                                                            <option value="{{$country->id}}"> {{$country->name}} ({{$country->iso}})</option>
                                                                                        @endforeach  
                                                                                    </select>
                                                                                    @error('affiliate_country')
                                                                                    <div style="color: red;">{{$message}}</div>
                                                                                    @enderror
                                                                                </div>
                                                                                
                                                                                <div class="mb-3">
                                                                                    <label for="chkAgreeTerms" id="agreeTermsLabel" class="pure-checkbox">
                                                                                        <input type="checkbox" id="chkAgreeTerms" name="chkAgreeTerms" value="1" required="">
                                                                                        <span class="small">I have read and agree to the 
                                                                                        <a target="_blank" href="{{route('terms_and_conditions')}}">Terms and Conditions</a> </span>
                                                                                    </label>
                                                                                    @error('chkAgreeTerms')
                                                                                    <div style="color: red;">{{$message}}</div>
                                                                                    @enderror
                                                                                    
                                                                                </div>
                                                                                <div class="wpam-registration-form text-center">
                                                                                    <input type="submit" name="submit" value="Submit Application" class="wpam-registration-form-submit pure-button pure-button-active">
                                                                                </div>
                                                                            </fieldset>
                                                                        </form>
                                                                    </div>
                                                                </div>
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

            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
    <script>
        jQuery('.select2').select2()
    </script>
@endpush
