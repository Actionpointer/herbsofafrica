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
                                                                    Link Bank Account
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
                                                                    To receive payment!</h4>
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
                                                                        
                                                                        <form action="{{route('affiliate.bank.account.store')}}" method="post" id="mainForm" class="pure-form pure-form-stacked">@csrf
                                                                            * Required fields<br><br>
                                                                            <fieldset>
                                                                                <div class="mb-3">
                                                                                    <label for="affiliate_username">Affiliate Username&nbsp;*</label>
                                                                                    <input type="text" id="affiliate_username" name="affiliate_username" value="{{auth()->user()->affiliate->username}}" disabled="">
                                                                                </div>
                                                                                
                                                                                <div class="mb-3">
                                                                                    <label for="bank_name">Bank *</label>
                                                                                    <select name="bank_code" id="bank_code" class="country_to_state country_select select2" autocomplete="bank" data-placeholder="Select Bank" data-label="Country/Region">
                                                                                        <option value="">Select Bank</option>
                                                                                        @foreach ($banks as $bank)
                                                                                            <option value="{{$bank->code}}"> {{$bank->name}}</option>
                                                                                        @endforeach  
                                                                                    </select>
                                                                                </div>
                                                                                <input type="hidden" id="bank_name" name="bank_name" value="">
                                                                                <div class="mb-3">
                                                                                    <label for="account_number">Account Number *</label>
                                                                                    <input type="text" id="account_number" name="account_number" value="" required="">
                                                                                </div>
                                                                                
                                                                                <div class="mb-3" id="account_name_field" style="display: none">
                                                                                    <label for="account_name">Account Name *</label>
                                                                                    <input type="text" id="account_name" name="account_name" value="" disabled="">
                                                                                </div>
                                                                                <div class="text-danger text-center" id="incorrect" style="display: none">
                                                                                    <p>Unable to fetch Bank Account Details</p>
                                                                                </div>
                                                                                
                                                                                
                                                                                <div class="wpam-registration-form text-center">
                                                                                    <button type="button" id="verify_account" class="btn btn-success">Verify</button>
                                                                                    <input type="submit" id="submit" name="submit" value="Submit Application" class="wpam-registration-form-submit pure-button pure-button-active" style="display: none">
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
        $('.select2').select2()
        $(document).on('select2:select','#bank_code',function(e){
            let data = e.params.data;
            $('#bank_name').val(data.text)
            //console.log(data.text)
        })

        $('#verify_account').click(function(){
            let bank_code = $('#bank_code').val()
            let account_number = $('#account_number').val()
            $.ajax({
                type:'POST',
                async: false,
                dataType: 'json',
                url: "{{route('verify_account')}}",
                data:{
                    '_token' : $('meta[name="csrf-token"]').attr('content'),
                    'bank_code': bank_code,
                    'account_number': account_number,
                },
                beforeSend: function() {$('#verify_account').text('checking...')},
                success:function(data) {
                    console.log(data)
                    if(data.name){
                        $('#account_name').val(data.name)
                        $('#account_name_field').show()
                        $('#incorrect').hide()
                        $('#verify_account').text('Verify').hide()
                        $('#submit').show()
                        
                    }   
                    else{
                        $('#incorrect').show()
                        $('#verify_account').show()
                        $('#submit').hide()
                    }
                        
                    
                },
                error: function (data, textStatus, errorThrown) {
                    return false
                },
            })
        })

    </script>
@endpush
