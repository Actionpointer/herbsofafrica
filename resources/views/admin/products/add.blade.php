@extends('layouts.admin')
@push('styles')
<link href="{{asset('vendor/summernote/summernote.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
<style>
    .select2-container--default .select2-selection--single{

    }
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
                <h3 class="text-themecolor">Products</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Products</li>
                </ol>
            </div>

        </div>

        <div class="row">
                <!-- Column -->
                <div class="col-lg-12 col-xlg-12 col-md-12">
                    <div class="card">
                        <h4 class="card-title  p-3">Add Product</h4>
                        <!-- Tab panes -->
                        <div class="card-body">
                            <form action="{{route('admin.products.store')}}" method="POST" class="form-horizontal form-material" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="">Title</label>
                                            <div class="">
                                                <input type="text" name="title" placeholder="" class="form-control form-control-line" value="{{old('title')}}">
                                                @error('title')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="">Tag Line</label>
                                            <div class="">
                                                <textarea name="tagline" class="form-control form-control-line">{{old('introduction')}}</textarea>
                                                @error('tagline')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="">Select Category</label>
                                            <div class="">
                                                <select id="category" class="form-control form-control-line select2" name="category_id">
                                                    @foreach ($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label class="">Stock</label>
                                            <div class="">
                                                <input type="number" value="{{old('stock')}}" name="stock" placeholder="" class="form-control form-control-line">
                                                @error('stock')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="">Download Link <span class="small text-muted">(optional)</span></label>
                                            <div class="">
                                                <input type="text" name="download_link" placeholder="" class="form-control form-control-line" value="{{old('download_link')}}">
                                                @error('download_link')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        
                                        
                                        <div class="form-group">
                                            <label class="">Tags <span class="small text-muted">(optional)</span></label>
                                            <div class="">
                                                <select data-tags="true" id="tags" class="form-control form-control-line select2" multiple name="tags[]">
                                                    <option value=""></option>
                                                    @foreach ($tags as $tag)
                                                        <option value="{{$tag}}">{{$tag}}</option>
                                                    @endforeach
                                                </select>
                                                <small>Hint: You can add new tags by typing the tag and press enter</small>
                                                @error('tags')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="mt-2 mb-2">
                                            <h5 class="">Prices</h5>
                                            <div class="form-group row">
                                                @foreach ($currencies as $currency)
                                                    <div class="col-md-2">
                                                        <div class="input-group align-items-baseline">
                                                            <span class="input-group-text">{{$currency->symbol}}</span>
                                                            <input type="number" step="0.1" name="prices[{{$currency->code}}]" id={{$currency->code}}  class="form-control form-control-line">
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
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="">Image</label>
                                            <div class="">
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <a data-input="thumbnail1" data-preview="holder" class="btn btn-secondary lfm">
                                                        <i class="fa fa-picture-o"></i> Choose
                                                        </a>
                                                    </span>
                                                    <input id="thumbnail1" class="form-control" type="text" name="images" value="{{old('images')}}">
                                                </div>
                                                @error('images')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-5">
                                        <div id="faq_section">
                                            <label class="mb-3">Frequently Asked Questions</label>
                                            <div class="row faqs mb-2">
                                                <div class="col-md-4">
                                                    <input placeholder="Question" class="form-control" type="text" name="question[]" >
                                                </div>
                                                <div class="col-md-6">
                                                    <input placeholder="Answer" class="form-control" type="text" name="answer[]" > 
                                                </div>
                                                <div class="col-md-2">
                                                    <button type="button" class="btn btn-primary add_faq"><i class="fa fa-plus"></i></button>
                                                    <button type="button" class="btn btn-danger remove_faq"><i class="fa fa-trash"></i></button>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="row mb-5">
                                            <div class="col-md-12">
                                                <h4 class="my-2">Section 1</h4>
                                                <div class="form-group">
                                                    <label class="">Title</label>
                                                    <div class="">
                                                        <input type="text" name="section1[title]" placeholder="" class="form-control form-control-line" value="{{old('section1[title]')}}">
                                                    </div>
                                                </div>
                                                <div class="form-group mb-0">
                                                    <label class="">Content</label>                                         
                                                    <div class="">
                                                        <textarea class="summernote-editor" name="section1[content]" class="form-control form-control-line">{!! old('section1[content]') !!}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <h4 class="my-2">Section 2</h4>
                                        <div class="row mb-5">
                                            <div class="col-md-6">
                                                <div class="form-group mb-0">
                                                    <label class="">Content</label>                                         
                                                    <div class="">
                                                        <textarea class="summernote-editor" name="section2[content]" class="form-control form-control-line">{!! old('section2[content]') !!}</textarea>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="">Title</label>
                                                    <div class="">
                                                        <input type="text" name="section2[title]" placeholder="" class="form-control form-control-line" value="{{old('section2[title]')}}">
                                                        
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="">Image</label>
                                                    <div class="">
                                                        <div class="input-group">
                                                            <span class="input-group-btn">
                                                                <a data-input="thumbnail2" data-preview="holder" class="btn btn-secondary lfm">
                                                                <i class="fa fa-picture-o"></i> Choose
                                                                </a>
                                                            </span>
                                                            <input id="thumbnail2" class="form-control" type="text" name="section2[image]" value="{{old('section2[image]')}}">
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                        <h4 class="mb-2">Section 3</h4>
                                        <div class="row mb-5">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="">Title</label>

                                                    <div class="">
                                                        <input type="text" name="section3[title]" placeholder="" class="form-control form-control-line" value="{{old('section3[title]')}}">
                                                        
                                                    </div>

                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="">Image</label>
                                                    <div class="">
                                                        <div class="input-group">
                                                            <span class="input-group-btn">
                                                                <a data-input="thumbnail3" data-preview="holder" class="btn btn-secondary lfm">
                                                                <i class="fa fa-picture-o"></i> Choose
                                                                </a>
                                                            </span>
                                                            <input id="thumbnail3" class="form-control" type="text" name="section3[image]" value="{{old('section3[image]')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-0">
                                                    <label class="">Section3 Content</label>                                         
                                                    <div class="">
                                                        <textarea class="summernote-editor" name="section3[content]" class="form-control form-control-line">{!! old('section3[content]') !!}</textarea>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-5">
                                            <div class="col-md-12">
                                                <h4 class="my-2">Section 4</h4>
                                                
                                                <div class="form-group mb-0">
                                                                                            
                                                    <div class="">
                                                        <textarea class="summernote-editor" name="section4[content]" class="form-control form-control-line">{!! old('section4[content]') !!}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-md-1">Status</label>   
                                    <div class="col-md-2">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio1" name="published" value="0" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio1">Draft</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio2" name="published" value="1" checked class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio2">Published</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        @error('published')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    
                                </div>
                                
                                <div class="row">
                                    <label class="col-md-1">Featured</label> 
                                    <div class="col-md-2">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="FeaturedRadio1" name="featured" value="0" class="custom-control-input">
                                            <label class="custom-control-label" for="FeaturedRadio1">Yes</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="FeaturedRadio2" name="featured" value="1" checked class="custom-control-input">
                                            <label class="custom-control-label" for="FeaturedRadio2">No</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        @error('featured')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group mt-3">
                                    <div class="">
                                        <button type="submit" class="btn btn-success">Save Product</button>
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
      $('.summernote-editor').summernote({
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
    $('.lfm').filemanager('image', {prefix: route_prefix});
    $('.select2').select2({
        placeholder:"Select ",
    });

    var faqs;
    $(document).ready(function(){
        faqs = $('.faqs').last().prop("outerHTML");
    })
    $(document).on('click','.add_faq',function(){
        $('#faq_section').append(faqs);
    })
    $(document).on('click','.remove_faq',function(){
        if($('.faqs').length > 1){
            $(this).closest('.faqs').remove();
        }
        
    })
</script>

  
@endpush
