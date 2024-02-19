@extends('layouts.admin')
@push('styles')
<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
    <style>
        .select2-container--default .select2-selection--single{

        }
        .select2-container .select2-selection--single{
            height: 38px;
            border-bottom: 1px solid #eee;
        }
    </style>
<link href="{{asset('vendor/summernote/summernote.css')}}" rel="stylesheet">
@endpush
@section('content')
        <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">News</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="javascript:void(0)">Home</a>
                            </li>
                            <li class="breadcrumb-item active">News</li>
                        </ol>
                    </div>
                    
                </div>
                
                <div class="row">
                     <!-- Column -->
                     <div class="col-12">
                        <div class="card">
                            <h4 class="card-title text-center pt-3">Edit News</h4>
                            <!-- Tab panes -->
                            <div class="card-body">
                                <form method="post" action="{{route('post.update')}}" enctype="multipart/form-data"> @csrf
                                    <input type="hidden" name="post_id" value="{{$post->id}}">
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label class="">Title</label>
                                                    <input type="text" name="title" value="{{$post->title}}" class="form-control">
                                                    @error('title')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="">Excerpt</label>
                                                    <textarea name="excerpt" placeholder="Summary" rows="5" class="form-control" style="height: 100px">{{ $post->excerpt }} </textarea>
                                                    @error('excerpt')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-12">Add/Select Tag</label>
                                                    <div class="col-sm-12">
                                                        <select id="tags" class="form-control form-control-line select2" multiple  name="tags[]">
                                                            @foreach ($tags as $tag)
                                                                <option value="{{$tag}}" @if(Str::contains($post->tags, $tag)) selected @endif>{{ucwords($tag)}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('tags')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="">Contents</label>
                                                    @error('content')
                                                        <span class="text-danger d-block">{{$message}}</span>
                                                    @enderror
                                                    <textarea id="summernote-editor" name="content">{!! $post->content !!}</textarea>
                                                    
                                                </div>
                                                
                                               
                                                    
                                                    <div class="d-flex">
                                                        <label class="pl-3">Status</label>
                                                        
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio1" name="status" value="0" @if(!$post->status) checked @endif class="custom-control-input">
                                                            <label class="custom-control-label" for="customRadio1">Draft</label>
                                                        </div>

                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio2" name="status" value="1" @if($post->status) checked @endif class="custom-control-input">
                                                            <label class="custom-control-label" for="customRadio2">Active</label>
                                                        </div> 
                                                    </div>

                                                    @error('status')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                    
                                                
                                            </div>
                                            <div class="col-md-4">
                                                <h5>Featured Image</h5>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                      <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-secondary">
                                                        <i class="fa fa-picture-o"></i> Choose
                                                      </a>
                                                    </span>
                                                    <input id="thumbnail" class="form-control" type="text" name="image" value="{{$post->image}}">
                                                </div>
                                                <div id="holder" style="margin-top:15px;max-height:300px;"></div>
                                                @error('image')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="mt-3">
                                                    <button class="btn btn-primary btn-block" type="submit">
                                                        Update Post
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>


@endsection
@push('scripts')
<script src="{{asset('plugins/select2/js/select2.min.js')}}"></script>
<script src="{{asset('vendor/summernote/summernote.js')}}"></script>
<script>
    $(document).ready(function(){
      // Define function to open filemanager window
      var lfm = function(options, cb) {
        var route_prefix = (options && options.prefix) ? options.prefix : '/admin/filemanager';
        window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
        window.SetUrl = cb;
      };

      // Define LFM summernote button
      var LFMButton = function(context) {
        var ui = $.summernote.ui;
        var button = ui.button({
          contents: '<i class="note-icon-picture"></i> ',
          tooltip: 'Insert image with filemanager',
          click: function() {

            lfm({type: 'image', prefix: '/admin/filemanager'}, function(lfmItems, path) {
              lfmItems.forEach(function (lfmItem) {
                context.invoke('insertImage', lfmItem.url);
              });
            });

          }
        });
        return button.render();
      };

      // Initialize summernote with LFM button in the popover button group
      // Please note that you can add this button to any other button group you'd like
      $('#summernote-editor').summernote({
        focus: true,
        height: 300,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear','fontsize','italic']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['popovers', ['lfm']],
            ['insert', ['link','video']],
            ['view', ['fullscreen', 'codeview']]
        ],
        buttons: {
          lfm: LFMButton
        }
      })
    });
</script>
<script src="{{asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
<script>
    var route_prefix = "/admin/filemanager";
    $('#lfm').filemanager('image', {prefix: route_prefix});
</script>
<script>
    $('.select2').select2({
        placeholder:"Select Multiple",
        tags: true,
    });
</script>
@endpush
