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
                        <h3 class="mb-3"><b>Order : #{{$order->id}}</b></h3>
                        <address>
                          <h3> <b class="text-danger">{{$order->user->name}}</b> </h3>
                          <p class="text-muted m-l-5">
                            {{$order->user->email}}
                          </p>
                        </address>
                        <div class="row">
                            <div class="col-md-3"><b>Order Date :</b></div>
                            <div class="col-md-3"><i class="fa fa-calendar"></i> {{$order->created_at->format('jS M Y')}}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"><b>Status :</b></div>
                            <div class="col-md-3">@if($order->delivered_at) Delivered @elseif($order->shipped_at) Shipped @elseif($order->ready_at) Ready @else New @endif</div>
                        </div>
                        
                        <div class="row">
                            @if($order->delivered_at) 
                                <div class="col-md-3"><b> Delivered on :</b> </div> 
                                <div class="col-md-3"> <i class="fa fa-calendar"></i> {{$order->delivered_at->format('jS M Y')}} </div>
                            
                            @elseif($order->shipped_at) 
                                <div class="col-md-3"> <b>Shipped on :</b> </div> 
                                <div class="col-md-3"> <i class="fa fa-calendar"></i> {{$order->shipped_at->format('jS M Y')}} </div>
                            
                            @elseif($order->ready_at) 
                                <div class="col-md-3"><b>Ready on :</b></div> 
                                <div class="col-md-3"><i class="fa fa-calendar"></i> {{$order->ready_at->format('jS M Y')}} </div>
                            
                            @endif
                            
                        </div>
                          
                      </div>
                      <div class="col-md-4 mb-3">
                        <h3 class="mb-3"><u>Delivery</u></h3>
                        <address>
                          
                          <h4 class="font-bold">{{$order->shipment->name}}</h4>
                          <p class="text-muted">
                            {{$order->shipment->email}}, <br>
                            {{$order->shipment->phone}} <br>
                            {{$order->shipment->street.', '.$order->shipment->city}}, <br>
                            Post Code: {{$order->shipment->postcode}}, <br>
                            {{$order->shipment->state->name.', '.$order->shipment->country->name}}
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
