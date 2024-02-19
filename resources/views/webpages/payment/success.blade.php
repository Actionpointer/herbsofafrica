@extends('layouts.web')
@push('styles')
<link rel="stylesheet" type="text/css" href="{{asset('styles/courses.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('styles/courses_responsive.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('styles/responsive.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('styles/main_styles.css')}}">

<link rel="stylesheet" type="text/css" href="{{ asset('styles/courses.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('styles/courses_responsive.css') }}">
@endpush
@section('content')
<div class="home">

  <div class="home_background parallax_background parallax-window" data-parallax="scroll"
      data-image-src="{{ asset('images/courses.jpg') }}" data-speed="0.8"></div>
  <div class="home_container">
      <div class="container">
          <div class="row">
              <div class="col">
                  <div class="home_content text-center" style="padding-top: 85px;">
                      <div class="home_title">Payment Response</div>
                      <div class="breadcrumbs">
                          <ul>
                              <li><a href="index.html">Home</a></li>
                              <li>Response</li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
    <div class="courses pt-3 pb-5 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="section_title text-center">
                        <h2 class="mt-2">
                            @if($status == 'success')
                                <i class="bg-success text-white p-3 rounded">✓</i>
                            @else 
                                <i class="bg-danger text-white p-3 rounded">X</i>
                            @endif
                        </h2>
                    </div>
                    <div class="section_subtitle">{{ucwords($status)}}</div>
                    @if($status == 'success')
                    <p class="text-center">We received your purchase request; we'll be in touch shortly!</p>
                    @else 
                    <p class="text-center">Your payment was not successful. Please try again or contact support!</p>
                    @endif
                </div>
            </div>  
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/courses.js') }}"></script>
@endpush
