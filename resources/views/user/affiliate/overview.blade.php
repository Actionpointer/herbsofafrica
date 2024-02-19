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
                            <td>Site Link: </td>
                            <td> https://herbsofafrica.com/affiliate/reigntech</td>
                        </tr>
                        <tr>
                            <td>Shop Link:</td>
                            <td> https://herbsofafrica.com/shop/affiliate/reigntech</td>
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
        <div class="tab-pane fade" id="setting" role="tabpanel" aria-labelledby="setting-tab">
            Settings
        </div>
      </div>
    <p></p>
</div>
@endsection
@push('dashboard_scripts')
    
@endpush