@extends('user.index')
@push('dashboard_styles')
<link rel='stylesheet' id='elementor-post-492-css' href='https://herbsofafrica.com/wp-content/uploads/elementor/css/post-492.css?ver=1706548779' type='text/css' media='all' />
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
        <form class="woocommerce-EditAccountForm edit-account" action="" method="post">
            <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
                <label for="account_first_name">First name&nbsp;<span class="required">*</span></label><br>
                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_first_name"
                    id="account_first_name" autocomplete="given-name" value="Nevada">
            </p>
            <p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
                <label for="account_last_name">Last name&nbsp;<span class="required">*</span></label><br>
                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name"
                    id="account_last_name" autocomplete="family-name" value="Whitehead">
            </p>
            <div class="clear"></div>
            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label for="account_display_name">Display name&nbsp;<span class="required">*</span></label><br>
                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text"
                    name="account_display_name" id="account_display_name" value="damilola"> <span><em>This will be how your
                        name will be displayed in the account section and in reviews</em></span>
            </p>
            <div class="clear"></div>
            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label for="account_email">Email address&nbsp;<span class="required">*</span></label><br>
                <input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email"
                    id="account_email" autocomplete="email" value="reigningkingforever@gmail.com">
            </p>
            <fieldset>
                <legend>Password change</legend>
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <label for="password_current">Current password (leave blank to leave unchanged)</label><br>
                    <span class="password-input"><input type="password"
                            class="woocommerce-Input woocommerce-Input--password input-text" name="password_current"
                            id="password_current" autocomplete="off"><span class="show-password-input"></span></span>
                </p>
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <label for="password_1">New password (leave blank to leave unchanged)</label><br>
                    <span class="password-input"><input type="password"
                            class="woocommerce-Input woocommerce-Input--password input-text" name="password_1"
                            id="password_1" autocomplete="off"><span class="show-password-input"></span></span>
                </p>
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <label for="password_2">Confirm new password</label><br>
                    <span class="password-input"><input type="password"
                            class="woocommerce-Input woocommerce-Input--password input-text" name="password_2"
                            id="password_2" autocomplete="off"><span class="show-password-input"></span></span>
                </p>
            </fieldset>
            <div class="clear"></div>
            <p>
                <input type="hidden" id="save-account-details-nonce" name="save-account-details-nonce"
                    value="9428654309"><input type="hidden" name="_wp_http_referer" value="/my-account/edit-account/">
                <button type="submit" class="woocommerce-Button button" name="save_account_details"
                    value="Save changes">Save changes</button><br>
                <input type="hidden" name="action" value="save_account_details">
            </p>
            <p></p>
        </form>
    </div>
@endsection
