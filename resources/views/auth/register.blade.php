@extends('layouts.app')
@push('styles')
    <link rel='stylesheet' id='elementor-post-492-css'
        href="{{ asset('wp-content/uploads/elementor/css/post-4921a99.css?ver=1704948825') }}" type='text/css'
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

<div class="main-page-wrapper" style="background-image: url({{asset('wp-content/uploads/2023/09/er.png')}});background-position: center center; background-repeat: no-repeat; background-size: cover;">
    <div class="container">
        <div class="row content-layout-wrapper align-items-start">

            <div class="site-content col-lg-12 col-12 col-md-12" role="main">

                <article id="post-492" class="post-492 page-id-492 page type-page status-publish hentry">

                    <div class="entry-content">
                        <div data-elementor-type="wp-page" data-elementor-id="492" class="elementor elementor-492">
                            <section class="wd-negative-gap elementor-section elementor-top-section elementor-element elementor-element-8aa35b9 elementor-section-boxed elementor-section-height-default elementor-section-height-default wd-section-disabled"
                                data-id="8aa35b9" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                <div class="elementor-container elementor-column-gap-default">
                                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-891a1ac"
                                        data-id="891a1ac" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                        <div class="elementor-widget-wrap elementor-element-populated">
                                            <div class="elementor-element elementor-element-872e230 elementor-widget elementor-widget-wd_title"
                                                data-id="872e230" data-element_type="widget" id="registerlink" data-widget_type="wd_title.default">
                                                <div class="elementor-widget-container">
                                                    <div class="title-wrapper set-mb-s reset-last-child wd-title-color-primary wd-title-style-default wd-title-size-default text-center">
                                                        <div class="liner-continer">
                                                            <h4 class="woodmart-title-container title wd-fontsize-l">
                                                                Register Now
                                                            </h4>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="elementor-element elementor-element-8514871 elementor-widget elementor-widget-wd_title"
                                                data-id="8514871" data-element_type="widget" id="registerlink"
                                                data-widget_type="wd_title.default">
                                                <div class="elementor-widget-container">
                                                    <div class="title-wrapper set-mb-s reset-last-child wd-title-color-default wd-title-style-default wd-title-size-default text-center">
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
                                                                    <form method="post" action="{{route('register')}}" class="woocommerce-form woocommerce-form-register register"
                                                                        enctype="multipart/form-data">@csrf
                                                                        <p class="form-row form-row-first validate-required" id="billing_first_name_field" data-priority="10">
                                                                            <label for="billing_first_name" class="">
                                                                                First name&nbsp; <abbr class="required" title="required">*</abbr>
                                                                            </label>
                                                                            <span class="woocommerce-input-wrapper">
                                                                                <input type="text" class="input-text" name="first_name" id="billing_first_name" placeholder="" value="{{old('first_name')}}" autocomplete="given-name" />
                                                                            </span>
                                                                            @error('first_name')
                                                                                <span class="error d-block" style="color: red;">{{ $message }}</span>
                                                                            @enderror
                                                                        </p>
                                                                        <p class="form-row form-row-last validate-required" id="billing_last_name_field" data-priority="20">
                                                                            <label for="billing_last_name" class="">Last name&nbsp;
                                                                                <abbr class="required" title="required">*</abbr>
                                                                            </label>
                                                                            <span class="woocommerce-input-wrapper">
                                                                                <input type="text" class="input-text" name="last_name" id="billing_last_name" placeholder="" value="{{old('last_name')}}" autocomplete="family-name" />
                                                                            </span>
                                                                            @error('last_name')
                                                                                <span class="error d-block" style="color: red;">{{ $message }}</span>
                                                                            @enderror
                                                                        </p>
                                                                        <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                                                                            <label for="reg_email">Email address&nbsp;
                                                                                <span class="required">*</span>
                                                                            </label><br />
                                                                            <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="{{old('email')}}" />
                                                                            @error('email')
                                                                                <span class="error d-block" style="color: red;">{{ $message }}</span>
                                                                            @enderror
                                                                        </p>
                                                                        <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                                                                            <label for="reg_password">Password&nbsp;
                                                                                <span class="required">*</span>
                                                                            </label><br />
                                                                            <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
                                                                            @error('password')
                                                                                <span class="error d-block" style="color: red;">{{ $message }}</span>
                                                                            @enderror
                                                                        </p>
                                                                        <p class="form-row form-row-wide">
                                                                            <label for="reg_password2">Repeat Password
                                                                                <span class="required">*</span>
                                                                            </label><br />
                                                                            <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password_confirmation" id="reg_password2" value="" />
                                                                        </p>
                                                                    
                                                                        
                                                                        <div class="woocommerce-privacy-policy-text">
                                                                            <p>Your personal data will be used to support your experience
                                                                                throughout this website, to manage access to your account, and for other purposes described in our 
                                                                                <a href="../privacy-policy/index.html" class="woocommerce-privacy-policy-link" target="_blank">
                                                                                    privacy policy
                                                                                </a>.
                                                                            </p>
                                                                        </div>
                                                                        <p class="woocommerce-form-row form-row">
                                                                            <input type="hidden" name="referrer_id" value="{{Session::has('affiliate') ? session('affiliate')['id'] : ''}}" />
                                                                            <button type="submit" class="woocommerce-Button button" name="register" value="Register">Register</button>
                                                                        </p>
                                                                        </p>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="elementor-element elementor-element-6428ca9 color-scheme-inherit text-left elementor-widget elementor-widget-text-editor"
                                                data-id="6428ca9" data-element_type="widget" id="registerlink"
                                                data-widget_type="text-editor.default">
                                                <div class="elementor-widget-container">
                                                    <p>Already have an account? <br />
                                                        <a href="{{route('login')}}" rel="noopener">
                                                            <span style="background: #056D05; padding: 4px 15px; color: white; border-radius: 50px;">
                                                                Login Now
                                                            </span>
                                                        </a>
                                                    </p>
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

@endpush
