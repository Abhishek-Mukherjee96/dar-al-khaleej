@extends('frontend.layouts.app')
@section('title', 'Blog')
@section('content')
    <section class="bannerInnerWrap">
        <div class="bannerInner">
            <img src="{{asset('frontend/assets/images/inner-banner.jpg')}}" alt="">
            <div class="desc">
                <div class="container">
                    <div class="text">
                        <h1>Blog details</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-details-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="row ">
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="blogTtl">
                                <h2>{{$blog->title}} </h2>
                            </div>
                            <div class="blog-details-info-auth">
                                <!-- <div class="icon">
                                    <img src="frontend/assets/images/founder-img.jpg" class="img"
                                        alt="">
                                </div> -->
                                <div class="text">
                                    <p>Admin </p>
                                    <span>{{date('F d, Y', strtotime($blog->created_at))}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12 mt-2">
                            <div class="blog-detils-img mb-3">
                                <img src="{{ asset($blog->image) }}"
                                    class="" alt="">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="blogTextInfo">
                                {!! $blog->description !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="blog-sidebar">
                        <div class="sidebar-card">
                            <h3>Recent Blogs</h3>
                            @if(count($recent_blogs) > 0)
                            @foreach ($recent_blogs as $blog)
                            <div class="sidebar-panel">
                                <div class="tham">
                                    <img src="{{ asset($blog->image) }}"
                                        class="img-fluid frst-pstn" alt="" >
                                </div>
                                <div class="desc">
                                    <h6>
                                        <a href="{{route('blog_details', $blog->slug)}}">{{$blog->title}}</a>
                                    </h6>
                                    <ul class="blogStatus-info">
                                        <li><i class="fa-regular fa-user" aria-hidden="true"></i> <span>Admin</span>
                                        </li>
                                        <li><i class="fa-regular fa-clock" aria-hidden="true"></i> <span>{{date('F d, Y', strtotime($blog->created_at))}}</span></li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <p>No blog found</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection