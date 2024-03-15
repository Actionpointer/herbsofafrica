@extends('layouts.admin')
@push('styles')

@endpush
@section('content')

    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Orders</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Details</li>
                </ol>
            </div>
            <div class="col-md-7 align-self-center">

            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- column -->
            <div class="col-md-12">
                <div class="card card-body printableArea">
                  <div class="row justify-content-between">
                    
                      <div class="col-md-6 mb-3">
                        <h3 class="mb-3"><b>Order : #{{$order->reference}}</b></h3>
                        <address>
                          <h3> <b class="text-danger">{{$order->user->name}}</b> </h3>
                          <p class="text-muted m-l-5">
                            {{$order->user->email}}
                          </p>
                        </address>
                        <div class="row">
                            <div class="col-md-4"><b>Order Date :</b></div>
                            <div class="col-md-4"><i class="fa fa-calendar"></i> {{$order->created_at->format('jS M Y')}}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"><b>Status :</b></div>
                            <div class="col-md-4">
                              @if($order->status == 'ready')
                                  Ready for @if($order->shipping->rate->method == 'local-pickup') Pickup @else Shipment @endif
                              @elseif($order->status == 'processed')
                                  Processing
                              @else 
                                  {{ucwords($order->status)}}
                              @endif
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4"><b> {{ucwords($order->status)}} Since :</b> </div> 
                            <div class="col-md-4"> <i class="fa fa-calendar"></i> {{$order->status_time}} </div> 
                        </div>
                        @if($order->note)
                        <div class="row">
                          <div class="col-md-4"><b> Special Note:</b> </div> 
                          <div class="col-md-7"> <i class="fa fa-info-circle"></i> {{$order->note}} </div> 
                        </div>
                        @endif
                          
                          
                      </div>
                      <div class="col-md-4 mb-3">
                        <h3 class="mb-3"><u>@if($order->shipping->rate->method == 'local-pickup') Pickup @else Delivery @endif Address</u></h3>
                        <address>
                          
                          <h4 class="font-bold">{{$order->shipping->name}}</h4>
                          <p class="text-muted">
                            {{$order->shipping->email}}, <br>
                            {{$order->shipping->phone}} <br>
                            @if($order->shipping->rate->method == 'local-pickup')
                              {{$order->shipping->rate->warehouse}}
                            @else
                            {{$order->shipping->street.', '.$order->shipping->city}}, <br>
                            Post Code: {{$order->shipping->postcode}}, <br>
                            {{$order->shipping->state->name.', '.$order->shipping->country->name}}
                            @endif
                          </p>
                          
                        </address>
                      </div>
                    
                      <div class="col-md-12">
                        <div class="table-responsive m-t-40" style="clear: both">
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th class="text-center">#</th>
                                <th>Description</th>
                                <th class="text-right">Quantity</th>
                                <th class="text-right">Unit Cost</th>
                                <th class="text-right">Total</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($order->items as $item)
                                  
                              
                              <tr>
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td>{{$item->title}}</td>
                                <td class="text-right">{{$item->quantity}}</td>
                                <td class="text-right">{{$currency->symbol}} {{$item->price}}</td>
                                <td class="text-right">{{$currency->symbol}} {{$item->price * $item->quantity}}</td>
                              </tr>
                              @endforeach  
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="pull-right m-t-30 text-right">
                          <p>Subtotal: {{$currency->symbol}} {{$order->total}}</p>
                          <p>Discount: @if($order->payment->coupon_value) ({{$order->payment->coupon->percentage}}%) : -{{$currency->symbol}} {{$order->payment->coupon_value}}  @else : -{{$currency->symbol}} 0 @endif  </p>
                          <p>Shipment: @if($order->payment->shipment) : {{$currency->symbol}} {{$order->payment->shipment}}  @else : {{$currency->symbol}} 0 @endif  </p>
                          <hr>
                          <h3><b>Total :</b> {{$currency->symbol}} {{$order->payment->total}}</h3>
                        </div>
                        <div class="clearfix"></div>
                        @if(!($order->delivered_at || $order->cancelled_at))
                        <hr>
                        <div class="d-flex justify-content-end">
                          <form action="{{route('admin.orders.edit')}}" method="post" class="d-flex">@csrf
                              <input type="hidden" name="order_id" value="{{$order->id}}">
                              <select name="status" id="" class="form-control mx-2" required>
                                  <option value="" selected disabled>Select</option>
                                  @if(!$order->ready_at) <option value="ready">Ready</option> @endif
                                  @if(!$order->shipped_at) <option value="shipped">Shipped</option> @endif
                                  @if(!$order->delivered_at) <option value="delivered">Delivered</option> @endif 
                              </select>
                              <button class="btn btn-dark" type="submit"> Change Status </button>
                          </form>
                        </div>
                        @endif
                      </div>
                  </div>
                </div>
              </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    
@endsection

@push('scripts')

@endpush
