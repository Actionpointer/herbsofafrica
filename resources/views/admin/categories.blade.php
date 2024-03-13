@extends('layouts.admin')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/general.css')}}">   
@endpush
@section('content')

    
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Categories</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Categories</li>
                </ol>
            </div>
            {{-- <div class="col-md-7 align-self-center">
                <a href="https://wrappixel.com/templates/adminwrap/" class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down"> Upgrade to Pro</a>
            </div> --}}
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row">
                <!-- Column -->
                <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card">
                    <h4 class="card-title p-4">Add Category</h4>
                    <!-- Tab panes -->
                    <div class="card-body">
                        <form action="{{route('categories.store')}}" method="POST" class="form-horizontal form-material" enctype="multipart/form-data">@csrf

                            <div class="form-group">
                                <label class="col-md-12">Title</label>
                                <div class="col-md-12">
                                    <input type="text" name="title" placeholder="" class="form-control form-control-line" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Description</label>
                                <div class="col-md-12">
                                    <textarea name="description" placeholder="" class="form-control form-control-line" ></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Images</label>
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <a data-input="thumbnails" data-preview="holders" class="btn btn-secondary lfm">
                                                <i class="fa fa-picture-o"></i> Choose
                                            </a>
                                        </span>
                                        <input id="thumbnails" class="form-control" type="text" name="image">
                                    </div>
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" name="action" value="create"  id="btn" class="btn btn-success">Add Category</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Products</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($categories as $category)
                                        <tr>
                                            <td>
                                                <img class="imgthumbnail" src='{{$category->image}}'>
                                            </td>
                                            <td class="align-middle">{{$category->title}}</td>
                                            <td class="align-middle">{{$category->description}}</td>
                                            <td class="align-middle">{{$category->products->count()}}</td>
                                            <td class="align-middle">
                                                <div class="d-flex">
                                                    <a data-toggle="modal" href="#exampleModal{{$category->id}}" class="btn btn-info mr-2">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <form action="{{route('categories.delete')}}" method="post" onsubmit="return confirm('Are you sure you want to delete Category?')">@csrf
                                                        <input type="hidden" name="category_id" value="{{$category->id}}">
                                                        <button type="submit" name="action" value="delete" class="btn btn-danger">
                                                            <i class="fa fa-trash-o"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="exampleModal{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal form-material" method="POST" action="{{route('categories.update')}}">@csrf
                                                        <input type="hidden" name="category_id" value="{{$category->id}}">
                                                        <div class="form-group">
                                                            <label class="col-md-12">Title</label>
                                                            <div class="col-md-12">
                                                                <input type="text" name="title" value="{{$category->title}}" class="form-control form-control-line" required>
                                                                
                                                            </div>
                                                        </div>
                            
                                                    
                                                        <div class="form-group">
                                                            <label class="col-md-12">Description</label>
                                                            <div class="col-md-12">
                                                                <textarea name="description" placeholder="Enter Description" class="form-control form-control-line">{{$category->description}}</textarea>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-12">Images</label>
                                                            <div class="col-md-12">
                                                                <div class="input-group">
                                                                    <span class="input-group-btn">
                                                                        <a data-input="thumbnail{{$category->id}}" data-preview="holder" class="btn btn-secondary lfm">
                                                                            <i class="fa fa-picture-o"></i> Choose
                                                                        </a>
                                                                    </span>
                                                                    <input id="thumbnail{{$category->id}}" class="form-control" type="text" name="image" value="{{$category->image}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-sm-12">
                                                                <button type="submit" id="btn-save" class="btn btn-success">Update Category</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                    @empty
                                        <tr>
                                            <td colspan="5">
                                                No Category
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

    <script src="{{asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
    <script>

        var route_prefix = window.location.origin+"/admin/filemanager";
        $('.lfm').filemanager('image', {prefix: route_prefix});
    </script>

@endpush
