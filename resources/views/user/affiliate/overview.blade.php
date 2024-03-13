@extends('user.index')
@push('dashboard_styles')
    
@endpush
@section('dashboard_content')
<div class="woocommerce-MyAccount-content">
    <div class="woocommerce-notices-wrapper"></div>
    
    <p>
        From your affiliate dashboard you can view
        your manage your account details
    </p>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Overview</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Sales</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Payouts</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="coupon-tab" data-bs-toggle="tab" data-bs-target="#coupon" type="button" role="tab" aria-controls="coupon" aria-selected="false">Coupon</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="setting-tab" data-bs-toggle="tab" data-bs-target="#setting" type="button" role="tab" aria-controls="setting" aria-selected="false">Setting</button>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="wrap">

                <table class="pure-table">
                    <thead>
                        <tr>
                            <th colspan="2">Account Summary</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Balance</td>
                            <td><span>$0.00</span></td>
                        </tr>
                        
                        <tr>
                            <td>Commission Rate</td>
                            <td>25.00% of each completed sale, pre-tax</td>
                        </tr>
                        
                        
                    </tbody>
                </table>
        
                <table class="pure-table">
                    <thead>
                        <tr>
                            <th colspan="2">Links</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Affiliate Link: </td>
                            <td> 
                                
                                <a class="text-muted" href="{{route('affiliate.shop',$affiliate->username)}}" target="_blank">
                                    {{route('affiliate.shop',$affiliate->username)}}
                                </a>
                            </td>
                        </tr>         
                    </tbody>
                </table>
                
                <table class="pure-table">
                    <thead>
                        <tr>
                            <th colspan="4">Analysis</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td>Today</td>
                            <td>This week</td>
                            <td>This Month</td>
                        </tr>
                        <tr>
                            <td>Sales</td>
                            <td>25.00</td>
                            <td>25.00</td>
                            <td>25.00</td>
                        </tr>
                        <tr>
                            <td>Revenue</td>
                            <td><span>$0.00</span></td>
                            <td><span>$0.00</span></td>
                            <td><span>$0.00</span></td>
                        </tr>
                        <tr>
                            <td>Withdrawal</td>
                            <td>25.00</td>
                            <td>25.00</td>
                            <td>25.00</td>
                        </tr>
                        <tr>
                            <td>Traffic</td>
                            <td>2</td>
                            <td>25</td>
                            <td>25</td>
                        </tr>
                    </tbody>
                </table>
        
            </div>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="table-responsive">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Amount</th>
                            <th>Revenue</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                        <tr>
                            <td data-sort="{{strtotime( $order->created_at )}}">{{$order->created_at->format('d/m/Y')}}</td>
                            <td>{{$order->reference}}</td>
                            <td>{{ucwords($order->status)}}</td>
                            <td>@if($order->dispatched) Completed @elseif($order->status == "success") Ready @else Awaiting Payment @endif</td>
                            <td>{{$order->currency->symbol}}{{$order->amount}}</td>
                            <td>
                                <button type="button" data-toggle="modal" href="#exampleModal{{$order->id}}" class="btn btn-primary">View Details</button>
                            </td>
                        </tr>
                        
                        @empty 
                        <tr>
                            <td colspan="5">
                                No Orders Yet
                            </td>
                        </tr>
                        @endforelse
                        

                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            Payments
        </div>
        <div class="tab-pane fade" id="coupon" role="tabpanel" aria-labelledby="setting-tab">
            <div class="table-responsive mt-3">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Value</th>
                            <th>Use</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($affiliate->coupons as $coupon)
                        <tr>
                            <td>{{$coupon->code}}</td>
                            <td>{{$coupon->percentage}}% </td>
                            <td>{{$coupon->payments->count()}} times</td>
                            <td>
                                @if($coupon->status) 
                                    Active 
                                    <form action="{{route('affiliate.coupon')}}" method="post" class="d-inline" onsubmit="return confirm('Are you sure?')">@csrf
                                        <input type="hidden" name="coupon_id" value="{{$coupon->id}}">
                                        <input type="hidden" name="action" value="status">
                                        <input type="hidden" name="status" value="0">
                                        <input type="submit" value="Deactivate" class="rounded" style="background: #c5770a !important">
                                    </form>
                                    
                                
                                @else 
                                    Inactive 
                                    <form action="{{route('affiliate.coupon')}}" method="post" class="d-inline" onsubmit="return confirm('Are you sure?')">@csrf
                                        <input type="hidden" name="coupon_id" value="{{$coupon->id}}">
                                        <input type="hidden" name="action" value="status">
                                        <input type="hidden" name="status" value="1">
                                        <input type="submit" value="Activate" class="rounded">
                                    </form>
                                @endif
                            </td>
                            <td>
                                <form action="{{route('affiliate.coupon')}}" method="post" class="d-inline" onsubmit="return confirm('Are you sure?')">@csrf
                                    <input type="hidden" name="coupon_id" value="{{$coupon->id}}">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="submit" value="Delete" class="rounded" style="background: #963737 !important">
                                </form>
                                
                            </td>
                        </tr>
                        
                        @empty 
                        <tr>
                            <td colspan="5">
                                No Coupon 
                            </td>
                        </tr>
                        @endforelse
                        

                    </tbody>
                </table>
            </div>
            <form class="woocommerce-EditAccountForm edit-account" action="{{route('affiliate.coupon')}}" method="post">@csrf
                
                <input type="hidden" name="action" value="create">
                <fieldset>
                    <legend class="px-0">Create Coupons</legend>
                    <label for="instruction" class="mb-5">The coupon code will be auto-generated after you save  </label>
                    <div class="row mb-3">

                        <div class="col-md-6">
                            <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first mb-0">
                                <label for="percentage">Percentage<span class="required">*</span></label>
                                <input type="number" class="woocommerce-Input text-start px-3 " name="percentage" max="{{$affiliate->percentage}}" required
                                    id="percentage">
                            </p>
                            <small class="">Percentage will be taken out of your commission</small>
                            
                        </div>
                        <div class="col-md-6">
                            <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first mb-0">
                                <label for="minimum">Minimum Spend </label>
                                <input type="number" class="woocommerce-Input text-start px-3 " name="minimum"
                                    id="minimum" autocomplete="given-name">
                            </p>
                            <small class="">Threshold to avail coupon (optional)</small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first mb-0">
                                <label for="start_at">Start Date</label>
                                <input type="date" class="woocommerce-Input woocommerce-Input--text input-text" name="start_at"
                                    id="start_at" value="{{now()}}">
                            </p>
                            <small class="">If left empty, today will be used</small>
                        </div>
                        <div class="col-md-6">
                            <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first mb-0">
                                <label for="end_at">End Date<span class="required">*</span></label>
                                <input type="date" class="woocommerce-Input woocommerce-Input--text input-text" name="end_at"
                                    id="end_at" autocomplete="given-name">
                            </p>
                            <small class="">If left empty, coupon will run indefinitely</small>
                            
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="">Limitation</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="limit_per_user" id="limit_per_user_1" value="1" checked>
                                <label class="form-check-label" for="limit_per_user_1">
                                  Allow single use by a customer
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="limit_per_user" value="0" id="limit_per_user0">
                                <label class="form-check-label" for="limit_per_user0">
                                  Allow multiple use by a customer
                                </label>
                              </div>
                        </div>
                        <div class="col-md-6">
                            <label for="">Status</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="1" id="status1" checked>
                                <label class="form-check-label" for="status1">
                                  Active
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="0" id="status0">
                                <label class="form-check-label" for="status0">
                                  Draft
                                </label>
                              </div>
                        </div>
                    </div>
                    <button type="submit" class="woocommerce-Button button" name="save_account_details" value="Save changes">Save changes</button>
                    

                    
                </fieldset>
                
                
                <div class="clear"></div>
                
                <p></p>
            </form>
        </div>
        <div class="tab-pane fade" id="setting" role="tabpanel" aria-labelledby="setting-tab">
            Settings
        </div>
      </div>
    <p></p>
</div>
@endsection
@push('dashboard_scripts')
    
@endpush