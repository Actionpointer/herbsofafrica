@extends('layouts.admin')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/general.css')}}">
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
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Testimonial</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Testimonial</li>
                    </ol>
                </div>
              
            </div>
            
            <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                    <div class="card">
                        <h4 class="card-title text-center pt-3">Add Testimonial</h4>
                        <!-- Tab panes -->
                        <div class="card-body">
                            <form method="POST" action="{{route('testimonials.manage')}}" class="form-horizontal form-material">
                                @csrf
                                <div class="form-group">
                                    <label class="col-md-12">Name</label>
                                    <div class="col-md-12">
                                        <input type="text" name="student_name" placeholder="" class="form-control form-control-line">
                                        @error('student_name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12">Select Course</label>
                                    <div class="col-sm-12">
                                        <select id="course" class="form-control form-control-line select2" name="course">
                                            @foreach ($courses as $course)
                                                <option value="{{$course->title}}">{{$course->title}}</option>
                                            @endforeach
                                        </select>
                                        @error('course_id')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">Year</label>
                                    <div class="col-md-12">
                                        <input type="text" id="year" name="year" placeholder="" class="form-control form-control-line">
                                        @error('year')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">review</label>
                                    <div class="col-md-12">
                                        <textarea rows="5" id="review" name="review" class="form-control form-control-line"></textarea>
                                        @error('review')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">Images</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <a data-input="thumbnail" data-preview="holder" class="btn btn-secondary lfm">
                                                    <i class="fa fa-picture-o"></i> Choose
                                                </a>
                                            </span>
                                            <input id="thumbnail" class="form-control" type="text" name="image">
                                        </div>
                                        @error('image')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" name="action" value="create" class="btn btn-success">Add Testimonial</button>
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
                                            <th>Student</th>
                                            <th>Course</th>
                                            <th>Review</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($testimonials as $testimonial)
                                            <tr>
                                                <td>
                                                    <img class="imgthumbnail" src="{{$testimonial->image}}">
                                                </td>
                                                <td class="align-middle">
                                                    {{$testimonial->student_name}}<br>
                                                    <small>{{$testimonial->year}}</small>
                                                </td>
                                                <td class="align-middle">{{$testimonial->course_title}}</td>
                                                <td class="align-middle">{{$testimonial->review}}</td>
                                                <td class="align-middle">
                                                    <div class="d-flex">
                                                        
                                                        <form action="{{route('testimonials.manage')}}" method="post" onsubmit="return confirm('Are you sure you want to delete Testimonial?')">@csrf
                                                            <input type="hidden" name="testimonial_id" value="{{$testimonial->id}}">
                                                            <button type="submit" name="action" value="delete" class="btn btn-danger">
                                                                <i class="fa fa-trash-o"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4">No testimonial</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                        @include('layouts.pagination',['data'=> $testimonials])
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

<script src="{{asset('plugins/select2/js/select2.min.js')}}"></script>
<script src="{{asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
<script>

    var route_prefix = window.location.origin+"/admin/filemanager";
    $('.lfm').filemanager('image', {prefix: route_prefix});
</script>
 <script>
    $('.select2').select2({
        placeholder:"Select Multiple",
    });
</script>

@endpush
