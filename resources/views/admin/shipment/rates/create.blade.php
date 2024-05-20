@extends('layouts.admin')
@push('styles')
<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
<style>
    .select2-container .select2-selection--single{
        height: 38px;
        border:none;
        border-bottom: 1px solid #eee;
    }
</style>
@endpush
@section('content')

    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Rates</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Add New Rate</li>
                </ol>
            </div>
            
        </div>

        
        <div class="row mt-5">
            <div class="col-lg-8 col-xlg-6 col-md-12">
                <div class="card">
                    
                    <!-- Tab panes -->
                    <div class="card-body">
                        @if($errors->any())
                        <div class="my-2 pl-3 text-danger">
                            @foreach ($errors->all() as $error)
                                 <p>{{$error}}</p>
                            @endforeach
                        
                        </div>
                        @endif
                        
                        <form class="form-horizontal form-material" action="{{route('admin.shipment.rates.store')}}" method="POST"> @csrf
                            <div class="form-group">
                                <label class="col-md-12 font-medium">Zone Title:</label>
                                <div class="col-md-12">
                                    <input type="text" name="name" placeholder="" class="form-control form-control-line" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Countries</label>
                                <div class="col-md-12">
                                    <select id="countries" class="form-control form-control-line select2 w-100" name="countries[]" multiple required>
                                        @foreach ($countries as $country)
                                            <option value="{{$country->id}}" data-iso="{{$country->iso}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-12"> States</label>
                                <div class="col-md-12">
                                    <select id="states" class="form-control form-control-line select2" name="states[]" multiple>
                                        <option value=""></option>
                                        
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="col-md-12">State Mode</label>
                                        <div class="col-md-12">
                                            <select id="state_mode" class="form-control form-control-line select2" name="states_mode">
                                                <option value="include">Include Selected States</option>
                                                <option value="exclude">Exclude Selected States</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-md-12">Method</label>
                                        <div class="col-md-12">
                                            <select id="method" class="form-control form-control-line select2" name="method">
                                                <option value="flat-rate">Flat Rate</option>
                                                <option value="free-shipping">Free Shipping</option>
                                                <option value="local-pickup">Local Pickup</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4" id="price_type_section">
                                        <label class="col-md-12">Pricing Type</label>
                                        <div class="col-md-12">
                                            <select name="price_type" id="price_type" class="form-control form-control-line select2">
                                                <option value="fixed-amount">Fixed Amount</option>
                                                <option value="order-percentage">Order Percentage</option>    
                                            </select>
                                        </div>
                                    </div> 
                                    <div class="col-md-4" id="percentage_section" style="display: none">
                                        <label class="col-md-12">Percentage</label>
                                        <div class="col-md-12">
                                            <div class="input-group align-items-baseline">
                                                <input type="text" name="percentage" placeholder="" class="form-control form-control-line">
                                                <span class="input-group-text">%</span>
                                                
                                            </div>
                                            
                                        </div>
                                    </div> 
                                    <div class="row col-md-8" id="price_section">
                                        <label class="col-md-12">Price</label> 
                                        @foreach ($currencies as $currency)
                                            <div class="col-md-3">
                                                <div class="input-group align-items-baseline">
                                                    <span class="input-group-text font-18  pr-1">{{$currency->symbol}}</span>
                                                    <input type="number" value="" step="0.1" name="prices[{{$currency->code}}]" id={{$currency->code}}  class="form-control form-control-line prices_value">
                                                </div>
                                                
                                            </div>
                                        @endforeach
                                
                                        <div class="col-12">
                                            @error('prices')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                            
                            <div class="form-group" id="address_section" style="display: none">
                                <label class="col-md-12">Warehouse Address:</label>
                                <div class="col-md-12">
                                    <input type="text" name="warehouse" placeholder="" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" name="action" value="create" class="btn btn-success">Add Rate</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>            
            
        </div>
        
        
    </div>

@endsection
@push('scripts')
<script src="{{asset('plugins/select2/js/select2.min.js')}}"></script> 
<script>
    $('.select2').select2({
        placeholder:"Select ",
        width:'100%'
    });
    $(document).on('select2:select','#countries',function(e){
        let countries = $(this).val()
        $.ajax({
            type:'POST',
            dataType: 'json',
            url: "{{route('getCountryStates')}}",
            data:{
                '_token' : $('meta[name="csrf-token"]').attr('content'),
                'countries': countries
            },
            success:function(data) {
                $('#states').children().remove()
                data.forEach(function(item){
                        let options = '';
                        item.states.forEach(function(value){
                            options += `<option value="${value.id}">${value.name}</option>`
                        })
                    
                        let group = `<optgroup label="${item.country}">
                                        ${options}
                                    </optgroup>`
                        console.log(group)
                    $('#states').append(group)

                })
                $('.select2').select2()
            },
            error: function (data, textStatus, errorThrown) {
            console.log(data);
            },
        });
    })
    $('#method').change(function(){
        let method = $(this).val();
        switch(method){
            case 'flat-rate': 
                    $('#price_type').val('fixed-amount').trigger('change');
                    $('.prices_value').val()
                    $('#price_type_section,#price_section').show();
                    $('#address_section').hide()
                break;
            case 'free-shipping': 
                    $('#price_type').val('fixed-amount').trigger('change');
                    $('.prices_value').val(0)
                    $('#price_type_section,#price_section').show();$('#address_section').hide()
                break;
            case 'local-pickup': $('#price_type').val('fixed-amount').trigger('change');
                                $('.prices_value').val(0);
                                $('#price_type_section,#price_section').hide();$('#address_section').show()
                break;

        }
    })
    $('#price_type').change(function(){
        let type = $(this).val();
        switch(type){
            case 'fixed-amount': $('#price_section').show();$('#percentage_section').hide()
                break;
            case 'order-percentage': $('#price_section').hide();$('#percentage_section').show()
                break;
        }
    })
</script>
@endpush
