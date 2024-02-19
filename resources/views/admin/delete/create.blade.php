@extends('layouts.admin')
@push('styles')
<link href="{{asset('vendor/summernote/summernote.css')}}" rel="stylesheet">
@endpush
@section('content')

    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Training</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Training</li>
                </ol>
            </div>

        </div>

        <div class="row">
                <!-- Column -->
                <div class="col-lg-12 col-xlg-12 col-md-12">
                    <div class="card">
                        <h4 class="card-title text-center pt-3">Add Training</h4>
                        <!-- Tab panes -->
                        <div class="card-body">
                            <form action="{{route('learning.store')}}" method="POST" class="form-horizontal form-material" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        
                                            <label class="">Title</label>
                                            <div class="">
                                                <input type="text" name="title" placeholder="" class="form-control form-control-line">
                                                @error('title')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="">Format of Learning</label>
                                            <div class="">
                                                <input type="text" name="format" class="form-control form-control-line">
                                                @error('format')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="venue" class="">Venue</label>
                                            <div class="">
                                                <input type="text"  class="form-control form-control-line" name="venue" id="venue">
                                            </div>
                                            @error('venue')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="start_date" >Start Date</label>
                                            <div class="">
                                                <input type="date" class="form-control form-control-line" name="start_date" id="start_date">
                                            </div>
                                            @error('start_date')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="end_date" >End Date</label>
                                            <div class="">
                                                <input type="date" class="form-control form-control-line" name="end_date" id="end_date">
                                            </div>
                                            @error('end_date')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>  
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="mode" class="">Mode</label>
                                            <select class="form-control form-control-line" name="mode" id="mode">
                                                <option value="Face to Face">Face to Face</option>
                                                <option value="Online">Online</option>
                                            </select>
                                            @error('mode')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="timing" class="">Time</label>
                                            <div class="">
                                                <input type="text"  class="form-control form-control-line" name="timing" id="timing">
                                            </div>
                                            @error('timing')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div> 
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="discount" >Discount %</label>
                                            <div class="">
                                                <input type="number" class="form-control form-control-line" name="discount" id="discount">
                                            </div>
                                            @error('discount')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="discount_end" >Discount End Date</label>
                                            <div class="">
                                                <input type="date" class="form-control form-control-line" name="discount_end" id="discount_end">
                                            </div>
                                            @error('discount_end')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>      
                                                 
                                    <div class="col-md-12 mb-3">
                                        Prices
                                        <div class="row">
                                            @foreach ($currencies as $currency)
                                                <div class="col-md-2">
                                                    <div class="input-group align-items-baseline">
                                                        <span class="input-group-text">{{$currency->symbol}}</span>
                                                        <input type="number" name="prices[{{$currency->code}}]" id="{{$currency->code}}" class="form-control form-control-line">
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
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="">Images</label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-secondary">
                                                    <i class="fa fa-picture-o"></i> Choose
                                                    </a>
                                                </span>
                                                <input id="thumbnail" class="form-control" type="text" name="images">
                                            </div>
                                            @error('images')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="mb-2">Description</label>
                                            <div class="">
                                                <textarea class="summernote-editor" name="description" class="form-control form-control-line">{!! old('description') !!}</textarea>
                                            </div>
                                            @error('description')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-2">Curriculum</label>
                                            <div class="">
                                                <textarea class="summernote-editor" name="curriculum" placeholder="" class="form-control form-control-line" name="curriculum"></textarea>
                                            </div>
                                            @error('curriculum')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-2">Learning Objectives</label>
                                            <div class="">
                                                <textarea class="summernote-editor" name="objectives" class="form-control form-control-line"></textarea>
                                            </div>
                                            @error('objectives')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="d-flex">
                                    <label class="">Status</label>
                                    
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio1" name="status" value="0" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio1">Draft</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio2" name="status" value="1" checked class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio2">Published</label>
                                    </div>
                                    
                                    
                                </div>
                                @error('status')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                <div class="form-group mt-3">
                                    <div class="">
                                        <button type="submit" class="btn btn-success">Save Training</button>
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
    $('#lfm').filemanager('image', {prefix: route_prefix});
</script>
  
@endpush
