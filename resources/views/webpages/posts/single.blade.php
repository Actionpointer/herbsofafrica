@extends('layouts.app')
@push('styles')
<link rel='stylesheet' id='wd-page-title-css'
        href="{{ asset('wp-content/themes/woodmart/css/parts/page-title.minc30a.css?ver=7.2.4') }}" type='text/css'
        media='all' />
<link rel='stylesheet' id='wd-blog-single-base-css'
		href="{{ asset('wp-content/themes/woodmart/css/parts/blog-single-base.minc30a.css?ver=7.2.4') }}" type='text/css'
		media='all' />
	<link rel='stylesheet' id='wd-blog-base-css'
		href="{{ asset('wp-content/themes/woodmart/css/parts/blog-base.minc30a.css?ver=7.2.4') }}" type='text/css' media='all' />

    <link rel='stylesheet' id='woodmart-style-css'
    href="{{ asset('wp-content/themes/woodmart/css/parts/base.minc30a.css?ver=7.2.4') }}" type='text/css'
    media='all' />
    <link rel='stylesheet' id='wd-mod-sticky-sidebar-opener-css'
		href="{{ asset('wp-content/themes/woodmart/css/parts/mod-sticky-sidebar-opener.minc30a.css?ver=7.2.4') }}" type='text/css'
		media='all' />
    <link rel='stylesheet' id='el-social-icons-css'
		href="{{ asset('wp-content/themes/woodmart/css/parts/el-social-icons.minc30a.css') }}" type='text/css'
		media='all' />
  

@endpush
@section('main')
<div class="main-page-wrapper">

  <div class="page-title  page-title-default title-size-small title-design-centered color-scheme-light title-blog"
    style="">
    <div class="container">
      <h3 class="entry-title title">Blog</h3>


      <div class="breadcrumbs"><a href="{{url('/')}}" rel="v:url" property="v:title">Home</a> &raquo;
        <span><a rel="v:url" href="{{route('articles')}}">Blog</a></span> &raquo; </div>
      <!-- .breadcrumbs -->
    </div>
  </div>

  <!-- MAIN CONTENT AREA -->
  <div class="container">
    <div class="row content-layout-wrapper align-items-start">



      <div class="site-content col-lg-9 col-12 col-md-9" role="main">



        <article id="post-6" class="post-single-page post-6 post type-post status-publish format-standard has-post-thumbnail hentry category-blog">
          <div class="article-inner">
            @foreach (explode(',',$post->tags) as $tag)
            <div class="meta-post-categories wd-post-cat wd-style-with-bg">
              <a href="{{route('articles')}}?tag={{$tag}}" rel="category tag">{{ucwords($tag)}}</a>
            </div>
            @endforeach
            
            

            <h1 class="wd-entities-title title post-title">{{ucwords($post->title)}}</h1>

            <div class="entry-meta wd-entry-meta">
              <ul class="entry-meta-list">
                <li class="modified-date">
                  <time class="updated" datetime="{{$post->created_at}}">
                    {{$post->created_at->format('d F Y')}} 
                  </time>
                </li>
              </ul>
            </div>
            <header class="entry-header">

              <figure id="carousel-724" class="entry-thumbnail" data-owl-carousel
                data-hide_pagination_control="yes" data-desktop="1" data-tablet="1"
                data-tablet_landscape="1" data-mobile="1">
                <img width="2560" height="1463"
                  src="{{$post->image}}"
                  class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""
                  decoding="async"
                  sizes="(max-width: 2560px) 100vw, 2560px" />
              </figure>

              <div class="post-date wd-post-date wd-style-with-bg">
                <span class="post-date-day">
                  {{$post->created_at->format('d')}} </span>
                <span class="post-date-month">
                  {{$post->created_at->format('M')}} </span>
              </div>

            </header>

            <div class="article-body-container">

              <div class="entry-content wd-entry-content">
                {!! $post->content !!}
              </div>

            </div>
          </div>
        </article>




        <div class="wd-single-footer">
          <div class="single-post-social">

            <div class="wd-social-icons icons-design-colored icons-size-default color-scheme-dark social-share social-form-circle text-center">
              <a rel="noopener noreferrer nofollow"
                href="https://www.facebook.com/sharer/sharer.php?u=https://herbsofafrica.com/harnessing-the-healing-power-of-nature-organic-herbal-supplements-for-optimal-health/"
                target="_blank" class=" wd-social-icon social-facebook"
                aria-label="Facebook social link">
                <span class="wd-icon"></span>
              </a>

              <a rel="noopener noreferrer nofollow"
                href="https://twitter.com/share?url=https://herbsofafrica.com/harnessing-the-healing-power-of-nature-organic-herbal-supplements-for-optimal-health/"
                target="_blank" class=" wd-social-icon social-twitter"
                aria-label="Twitter social link">
                <span class="wd-icon"></span>
              </a>

              <a rel="noopener noreferrer nofollow"
                href="https://pinterest.com/pin/create/button/?url=https://herbsofafrica.com/harnessing-the-healing-power-of-nature-organic-herbal-supplements-for-optimal-health/&amp;media={{asset('wp-content/uploads/2023/08/202312930_m_normal_none-copy-scaled.jpg')}}&amp;description=Harnessing+the+Healing+Power+of+Nature%3A+Organic+Herbal+Supplements+for+Optimal+Health"
                target="_blank" class=" wd-social-icon social-pinterest"
                aria-label="Pinterest social link">
                <span class="wd-icon"></span>
              </a>


              <a rel="noopener noreferrer nofollow"
                href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https://herbsofafrica.com/harnessing-the-healing-power-of-nature-organic-herbal-supplements-for-optimal-health/"
                target="_blank" class=" wd-social-icon social-linkedin"
                aria-label="Linkedin social link">
                <span class="wd-icon"></span>
              </a>













              <a rel="noopener noreferrer nofollow"
                href="https://telegram.me/share/url?url=https://herbsofafrica.com/harnessing-the-healing-power-of-nature-organic-herbal-supplements-for-optimal-health/"
                target="_blank" class=" wd-social-icon social-tg"
                aria-label="Telegram social link">
                <span class="wd-icon"></span>
              </a>


            </div>

          </div>
        </div>

        



        <!-- @include('webpages.posts.comment') -->


      </div>



      <aside class="sidebar-container col-lg-3 col-md-3 col-12 order-last sidebar-right area-sidebar-1 d-none d-md-block">
        <div class="wd-heading">
          <div class="close-side-widget wd-action-btn wd-style-text wd-cross-icon">
            <a href="#" rel="nofollow noopener">Close</a>
          </div>
        </div>
        <div class="widget-area">
          @if($recents->isNotEmpty())
          <div id="block-3" class="wd-widget widget sidebar-widget widget_block">
            <div class="wp-block-group is-layout-flow wp-block-group-is-layout-flow">
              <div class="wp-block-group__inner-container">
                <h2 class="wp-block-heading">Recent Posts</h2>


                <ul class="wp-block-latest-posts__list wp-block-latest-posts">
                    @foreach ($recents as $recent)
                      <li>
                          <a href="{{route('articles.post',$recent)}}" class="wp-block-latest-posts__post-title">{{$recent->title}}</a>
                      </li>
                    @endforeach
                </ul>
              </div>
            </div>
          </div>
          @endif
          <div id="block-6" class="wd-widget widget sidebar-widget widget_block">
            <div class="wp-block-group is-layout-flow wp-block-group-is-layout-flow">
              <div class="wp-block-group__inner-container"></div>
            </div>
          </div>
        </div>
      </aside>

    </div>
  </div> 
</div>
@endsection
@push('scripts')

@endpush
