@extends('layouts.admin')
@push('styles')
<link rel="stylesheet" href="{{asset('plugins/datatables/datatables.min.css')}}">
@endpush
@section('content')

    
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Reviews</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Reviews</li>
                </ol>
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
                
           
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Author</th>
                                        <th>Created</th>
                                        <th>Body</th>
                                        <th>Rating</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($reviews as $review)
                                        <tr>
                                            
                                            <td class="align-middle">
                                                {{$review->user->name}} <br>
                                                {{$review->user->email}}
                                            </td>
                                            <td class="align-middle">{{$review->created_at->format('d.M.Y h:i A')}}</td>
                                            <td class="align-middle">
                                                <a href="{{route('product.show',$review->product)}}">{{$review->product->title}}</a><br>
                                                {{$review->body}}
                                            </td>
                                            <td class="align-middle">{{$review->rating}}%</td>
                                            <td class="align-middle">
                                                @if($review->status) Approved @else Disapproved @endif
                                                <div class="d-flex">
                                                    @if(!$review->status)
                                                    <form action="{{route('admin.reviews.update')}}" method="post" onsubmit="return confirm('Are you sure you want to approve review?')">@csrf
                                                        <input type="hidden" name="review_id" value="{{$review->id}}">
                                                        <button type="submit" name="status" value="1" class="btn btn-info mr-2" title="Approve">
                                                            <i class="fa fa-check"></i>
                                                        </button>
                                                    </form>
                                                    @else
                                                    <form action="{{route('admin.reviews.update')}}" method="post" onsubmit="return confirm('Are you sure you want to disapprove review?')">@csrf
                                                        <input type="hidden" name="review_id" value="{{$review->id}}">
                                                        <button type="submit" name="status" value="0" class="btn btn-warning mr-2" title="Disapprove">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </form>
                                            
                                                    @endif
                                                    <form action="{{route('admin.reviews.delete')}}" method="post" onsubmit="return confirm('Are you sure you want to delete review?')">@csrf
                                                        <input type="hidden" name="review_id" value="{{$review->id}}">
                                                        <button type="submit" class="btn btn-danger" title="Delete">
                                                            <i class="fa fa-trash-o"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        
                                    @empty
                                        <tr>
                                            <td colspan="5">
                                                No review
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
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

<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables/datatables.min.js')}}"></script>
    <script>
        if ($('.datatable').length > 0) {
            $('.datatable').DataTable({
                "bFilter": true,
            });
        }
    </script>

@endpush
