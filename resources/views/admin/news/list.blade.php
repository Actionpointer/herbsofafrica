@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">News</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">News</li>
                </ol>
            </div>
            <div class="col-md-7 align-self-center">
                <a href="{{route('post.create')}}" class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down"> New Article</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <th style="width:120px;">Image</th>
                                    <th style="width:500px;">Title</th>
                                    <th style="width:150px;">Tags</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>

                                    @forelse ($posts as $post)
                                        <tr>
                                            <td class="card-user">
                                                <img src="{{$post->image}}" class="avatar rounded imgthumbnail">
                                            </td>
                                            <td>
                                                <h4 class="mt-0"><a href="{{route('post.single',$post)}}">{{$post->title}}</a>
                                                    {{-- <a href="{{route('admin.post.preview',$post)}}" class="small text-muted"> <small>Preview</small> </a> --}}
                                                </h4>
                                                <h5>{{$post->excerpt}}</h5>
                                            </td>
                                            <td class="w-30">
                                                <span class="d-block">{{$post->tags}}</span>

                                            </td>
                                            <td class="w-30">
                                                <span class="d-block">{{$post->status ? 'Active':'Draft'}}</span>

                                            </td>
                                            
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{route('post.edit',$post)}}" class="btn btn-info mr-2">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <form action="{{route('post.delete')}}" method="post" onsubmit="return confirm('Are you sure you want to delete Post?')">@csrf
                                                        <input type="hidden" name="post_id" value="{{$post->id}}">
                                                        <button type="submit" name="action" value="delete" class="btn btn-danger">
                                                            <i class="fa fa-trash-o"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                                
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">No posts</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                        </div>
                        @include('layouts.pagination',['data'=> $posts])
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('scripts')
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script>
        var route_prefix = "/admin/filemanager";
        $('#lfm').filemanager('image', {
            prefix: route_prefix
        });
    </script>
    <script>
        $('.select2').select2({
            placeholder: "Select Multiple"
        });
    </script>
@endpush
