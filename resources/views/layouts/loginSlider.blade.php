<div class="login-form-side wd-side-hidden wd-right">
    <div class="wd-heading">
        <span class="title">Sign in</span>
        <div class="close-side-widget wd-action-btn wd-style-text wd-cross-icon">
            <a href="#" rel="nofollow">Close</a>
        </div>
    </div>

    <div class="woocommerce-notices-wrapper"></div>
    <form method="post" class="login woocommerce-form woocommerce-form-login hidden-form" action="{{route('login')}}" style="display:none;">
        @csrf
        <input type="hidden" name="current_route" value="{{url()->full()}}">
        <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide form-row-username">
            <label for="username">Email address&nbsp;<span class="required">*</span></label>
            <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="username" value="{{old('email')}}" required/>
        </p>
        <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide form-row-password">
            <label for="password">Password&nbsp;<span class="required">*</span></label>
            <input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" required autocomplete="current-password" />
        </p>


        <p class="form-row">
            {{-- <input type="hidden" id="woocommerce-login-nonce" name="woocommerce-login-nonce" value="40dad5bc83" />
                <input type="hidden" name="_wp_http_referer" value="/" /> 
            <input type="hidden" name="redirect" value="index.html" /> --}}
            <button type="submit" class="button woocommerce-button woocommerce-form-login__submit" name="login" value="Log in">Log in</button>
        </p>

        <p class="login-form-footer">
            <a href="my-account/lost-password/index.html" class="woocommerce-LostPassword lost_password">Lost your password?</a>
            <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" value="forever" title="Remember me" aria-label="Remember me" />
                <span>Remember me</span>
            </label>
        </p>

        <p class="title wd-login-divider "><span>Or login with</span></p>
        <div class="wd-social-login">
            <a href="#" class="login-fb-link btn">Facebook</a>
            <a href="#" class="login-goo-link btn">Google</a>
        </div>

    </form>


    <div class="create-account-question">
        <p>No account yet?</p>
        <a href="{{route('register')}}" class="btn btn-style-link btn-color-primary create-account-button">Create an Account</a>
    </div>
</div>