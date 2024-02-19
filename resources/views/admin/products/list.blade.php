@extends('layouts.admin')
@section('content')

            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Products</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Products</li>
                        </ol>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <a href="{{route('products.create')}}" class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down"> New Product</a>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">

                    <div class="col-lg-12 col-xlg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Status</th>
                                                <th>Prices</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($products as $product)
                                                <tr>
                                                    <td> <a href="{{route('product.show',$product)}}" target="_blank">
                                                        <img class="imgthumbnail" src='{{explode(',',$product->images)[0]}}'></a>
                                                    </td>
                                                    <td>
                                                        <a href="{{route('product.show',$product)}}" target="_blank">{{$product->title}}</a><br>
                                                        <small> {{$product->introduction}}</small>
                                                    </td>
                                                    <td>{{$product->category->title}}</td>
                                                    {{-- <td>{{$product->format}}</td> --}}
                                                    <td>{{$product->published ? 'Published': 'Draft'}}{{$product->featured ? ',Featured': ''}}</td>
                                                    <td>
                                                        @foreach ($product->prices as $key=>$value)
                                                            <small>{{$key}} : {{$value}}</small><br>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="{{route('products.edit',$product)}}" class="btn btn-info mr-2">
                                                                <i class="fa fa-pencil"></i>
                                                            </a>
                                                            <form action="{{route('products.delete')}}" method="post" onsubmit="return confirm('Are you sure you want to delete Product?')">@csrf
                                                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                                                <button type="submit" name="action" value="delete" class="btn btn-danger">
                                                                    <i class="fa fa-trash-o"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4">No product</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                @include('layouts.pagination',['data'=> $products])
                            </div>
                        </div>
                    </div>
                    <!-- Column -->

                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>

@endsection
@push('scripts')
     
@endpush
