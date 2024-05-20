@extends('user.index')
@push('dashboard_styles')
<link rel='stylesheet' id='elementor-post-492-css' href="{{asset('wp-content/uploads/elementor/css/post-492.css?ver=1706548779')}}" type='text/css' media='all' />
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
    <link rel='stylesheet' id='wd-select2-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/woo-lib-select2.minc30a.css?ver=7.2.4') }}" type='text/css'
        media='all' />
    
@endpush
@section('dashboard_content')
    <div class="woocommerce-MyAccount-content">
        <div class="woocommerce-notices-wrapper"></div>
        <form class="woocommerce-EditAccountForm edit-account" action="{{route('address.store')}}" method="post">@csrf
            <h3>Add New Address</h3>
            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label for="street">Street<span class="required">*</span></label>
                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="street"
                    id="street" autocomplete="street">
                    @error('street') <span class="error d-block" style="color: red;">{{ $message }}</span> @enderror
            </p>
            <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
                <label for="country">Country<span class="required">*</span></label>
                <select name="country_id" id="country" class="country_to_state country_select select2" autocomplete="country" data-placeholder="Select a country / region" data-label="Country/Region">
                    <option >Select a country / region&hellip;</option>
                    @foreach ($countries as $country)
                        <option value="{{$country->id}}"> {{$country->name}} ({{$country->iso}})</option>
                    @endforeach  
                </select>
                
                @error('country_id') <span class="error d-block" style="color: red;">{{ $message }}</span> @enderror
            </p>
            <p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
                <label for="state">State<span class="required">*</span></label>
                <select name="state_id" id="state" class="country_to_state country_select select2" autocomplete="country" data-placeholder="Select a state" data-label="State">
                    <option >Select a state</option>
                    
                </select>
                    @error('state_id') <span class="error d-block" style="color: red;">{{ $message }}</span> @enderror
            </p>
            <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
                <label for="city">City<span class="required">*</span></label>
                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="city"
                    id="city" autocomplete="city">
                    @error('city') <span class="error d-block" style="color: red;">{{ $message }}</span> @enderror
            </p>
            <p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
                <label for="postcode">Postal Code<span class="required">*</span></label>
                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="postcode"
                    id="postcode" autocomplete="postalcode">
                    @error('postcode') <span class="error d-block" style="color: red;">{{ $message }}</span> @enderror
            </p>
            <div class="clear"></div>

            <fieldset>
                <legend class="mb-4">Receiver's Details</legend>
                <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
                    <label for="firstname">First name&nbsp;<span class="required">*</span></label>
                    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="firstname"
                        id="firstname" autocomplete="given-name">
                        @error('firstname') <span class="error d-block" style="color: red;">{{ $message }}</span> @enderror
                </p>
                <p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
                    <label for="lastname">Last name&nbsp;<span class="required">*</span></label>
                    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="lastname"
                        id="lastname" autocomplete="family-name">
                        @error('lastname') <span class="error d-block" style="color: red;">{{ $message }}</span> @enderror
                </p>
                <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
                <label for="email">Email<span class="required">*</span></label>
                <input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="email"
                    id="email" autocomplete="email">
                    @error('email') <span class="error d-block" style="color: red;">{{ $message }}</span> @enderror
            </p>
            <p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
                <label for="phone">Phone number<span class="required">*</span></label>
                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="phone"
                    id="phone" autocomplete="phone">
                    @error('phone') <span class="error d-block" style="color: red;">{{ $message }}</span> @enderror
            </p>
            
            
            </fieldset>
            <div class="clear"></div>
            <p>
                <button type="submit" class="woocommerce-Button button" name="default" value="0" >Save changes</button>
                
                <button type="submit" class="woocommerce-Button button" name="default" value="1" >Save As Default Address</button>
                
            </p>
            
            <p></p>
        </form>
    </div>
@endsection
@push('scripts')
<script src="{{asset('plugins/select2/js/select2.min.js')}}"></script> 
<script>
    $('.select2').select2({
        placeholder:"Select ",
        width:'100%'
    });
    $(document).on('select2:select','#country',function(e){
            let country = $(this).val();
            $.ajax({
				type:'POST',
				dataType: 'json',
				url: "{{route('getCountryStates')}}",
                data: {
                    '_token' : $('meta[name="csrf-token"]').attr('content'),
                    countries: country,
                },
				success:function(data) {
                    $('#state').children().remove()
                    $('#state').append(`<option></option>`)
                    let options = '';
					data.forEach(function(item){
                        item.states.forEach(function(value){
                            options += `<option value="${value.id}">${value.name}</option>`
                        })
                    })
                    $('#state').append(options)
                    $('.select2').select2()
				},
				error: function (data, textStatus, errorThrown) {
				console.log(data);
				},
			});
        })
</script>
@endpush
