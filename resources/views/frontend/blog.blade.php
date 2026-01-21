@extends('frontend.layouts.app')
@section('title', 'Blog')
@section('content')
<section class="bannerInnerWrap">
    <div class="bannerInner">
        <img src="frontend/assets/images/inner-banner.jpg" alt="">
        <div class="desc">
            <div class="container">
                <div class="text">
                    <h1>Blog</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blogListing-sec">
    <div class="container">
        <div class="row ">
            @if(count($blogs) > 0)
            @foreach ($blogs as $blog)
            <div class="col-lg-4 col-md-6 col-12 mt-3">
                <div class="blog-box">
                    <div class="tham">
                        <a
                            href="{{route('blog_details', $blog->slug)}}">
                            <img src="{{asset($blog->image)}}" alt="">
                        </a>
                    </div>
                    <div class="herobnr-left becometutor_txt">
                        <h6>
                            <a href="{{route('blog_details', $blog->slug)}}">{{$blog->title}}</a>
                        </h6>
                        <ul class="blogStatus-info">
                            <li><i class="fa-regular fa-user" aria-hidden="true"></i> <span>Admin</span></li>
                            <li><i class="fa-regular fa-clock" aria-hidden="true"></i> <span>{{date('F d, Y', strtotime($blog->created_at))}}</span>
                            </li>
                        </ul>
                        <p>{{ \Str::limit(strip_tags($blog->description), 100) }}</p>
                        <a href="{{route('blog_details', $blog->slug)}}" class="viewBtn">View More</a>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="col-lg-12">
                <p>No blog found</p>
            </div>
            @endif
        </div>
    </div>
</section>
@endsection