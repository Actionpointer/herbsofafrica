@extends('layouts.app')
@push('styles')
    <link rel='stylesheet' id='elementor-post-1218-css'
        href="{{asset('wp-content/uploads/elementor/css/post-12189213.css?ver=1704942687')}}" type='text/css' media='all' /> 
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

                <article id="post-1218" class="post-1218 page-id-1218 page type-page status-publish hentry">

                    <div class="entry-content">
                        <div data-elementor-type="wp-page" data-elementor-id="1218" class="elementor elementor-1218">
                            <section
                                class="wd-negative-gap elementor-section elementor-top-section elementor-element elementor-element-f1efb8a elementor-section-boxed elementor-section-height-default elementor-section-height-default wd-section-disabled"
                                data-id="f1efb8a" data-element_type="section"
                                data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                <div class="elementor-container elementor-column-gap-default">
                                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-74aef27"
                                        data-id="74aef27" data-element_type="column"
                                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                        <div class="elementor-widget-wrap elementor-element-populated">
                                            <div class="elementor-element elementor-element-daee2cb elementor-widget elementor-widget-wd_title"
                                                data-id="daee2cb" data-element_type="widget" id="registerlink"
                                                data-widget_type="wd_title.default">
                                                <div class="elementor-widget-container">
                                                    <div
                                                        class="title-wrapper set-mb-s reset-last-child wd-title-color-primary wd-title-style-default wd-title-size-default text-center">
                                                        <div class="liner-continer">
                                                            <h4 class="woodmart-title-container title wd-fontsize-l">
                                                                Login Now</h4>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="elementor-element elementor-element-d4a940f elementor-widget elementor-widget-wd_title"
                                                data-id="d4a940f" data-element_type="widget" id="registerlink" data-widget_type="wd_title.default">
                                                <div class="elementor-widget-container">
                                                    <div class="title-wrapper set-mb-s reset-last-child wd-title-color-default wd-title-style-default wd-title-size-default text-center">
                                                        <div class="liner-continer">
                                                            <h4 class="woodmart-title-container title wd-fontsize-l">
                                                                We’ll pick up right where we left off.
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="elementor-element elementor-element-d7ac39b color-scheme-inherit text-left elementor-widget elementor-widget-text-editor"
                                                data-id="d7ac39b" data-element_type="widget" data-widget_type="text-editor.default">
                                                <div class="elementor-widget-container">
                                                    <div class="woocommerce">
                                                        <div class="woocommerce-notices-wrapper"></div>
                                                        <div class="wd-registration-page">
                                                            <div class="row" id="customer_login">
                                                                <div class="col-12 col-md-6 col-login">
                                                                    <h2 class="wd-login-title">Login</h2>
                                                                    <form action="{{route('login')}}" method="post" class="login woocommerce-form woocommerce-form-login">@csrf
                                                                        
                                                                        <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide form-row-username">
                                                                            <label for="username">Email address&nbsp;<span class="required">*</span></label>
                                                                            @error('email')
                                                                                <span class="error d-block" style="color: red;">{{ $message }}</span>
                                                                            @enderror
                                                                            <br >
                                                                            <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="username" required value="{{old('email')}}" />
                                                                        </p>
                                                                        <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide form-row-password">
                                                                            <label for="password">Password&nbsp;<span class="required">*</span></label>
                                                                            @error('password')
                                                                                <span class="error d-block" style="color: red;">{{ $message }}</span>
                                                                            @enderror
                                                                            <br />
                                                                            <input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" />
                                                                        </p>
                                                                        <p class="form-row">
                                                                            <input type="hidden" id="woocommerce-login-nonce" name="woocommerce-login-nonce" value="60fdba424f" />
                                                                            {{-- <input type="hidden" name="_wp_http_referer" value="/Signin/" />  --}}
                                                                            <button type="submit" class="button woocommerce-button woocommerce-form-login__submit" name="login" value="Log in">Log in</button>
                                                                        </p>
                                                                        <p class="login-form-footer">
                                                                            <a href="{{ route('password.request') }}" class="woocommerce-LostPassword lost_password">Lost your password?</a>
                                                                            
                                                                            <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                                                                                <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" value="forever" title="Remember me" aria-label="Remember me" />
                                                                                <span>Remember me</span>
                                                                            </label>
                                                                        </p>
                                                                        <p class="title wd-login-divider ">
                                                                            <span>Or login with</span>
                                                                        </p>
                                                                        <div class="wd-social-login">
                                                                            <a href="#" class="login-fb-link btn">Facebook</a><br />
                                                                            <a href="#" class="login-goo-link btn">Google</a>
                                                                        </div>
                                                                        </p>
                                                                    </form>
                                                                    </p>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="elementor-element elementor-element-2f1a185 color-scheme-inherit text-left elementor-widget elementor-widget-text-editor"
                                                data-id="2f1a185" data-element_type="widget" id="registerlink"
                                                data-widget_type="text-editor.default">
                                                <div class="elementor-widget-container">
                                                    <p>New to Herbs of Africa?<br />
                                                        <a href="{{route('register')}}" rel="noopener">
                                                            <span style="background: #056D05; padding: 5px 15px; color: white; border-radius: 50px;">
                                                                Register Now</span>
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
