@extends('frontend.layouts.app')
@section('title', 'About Us')
@section('content')
<section class="bannerInnerWrap">
    <div class="bannerInner">
        <img src="frontend/assets/images/inner-banner.jpg" alt="">
        <div class="desc">
            <div class="container">
                <div class="text">
                    <h1>About Us</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="aboutSec">
    <div class="cus-container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="aboutImg">
                    <img src="{{$about->about_img}}" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="textBox">
                    <h2 class="siteTtl">{{$about->about_heading}}</h2>
                    <p class="sitePara">{!!$about->about_desc!!}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="imgTextPanel">
    <div class="cus-container">
        <div class="row g-0 align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="textBox">
                    <h3 class="siteTtlsm">{{$about->mission_heading}}</h3>
                    <p class="siteParasm">{!!$about->mission_desc!!}</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="aboutImg">
                    <img src="{{$about->mission_img}}" alt="">
                </div>
            </div>
        </div>
        <div class="row g-0 align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="textBox">
                    <h3 class="siteTtlsm">{{$about->vision_heading}}</h3>
                    <p class="siteParasm">{!!$about->vision_desc!!}</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="aboutImg">
                    <img src="{{$about->vision_img}}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<div class="videoSection">
    <iframe width="" height="" src="https://www.youtube.com/embed/5Jf_gRi4CRo?si=pW7e7cRQIR0ZXz3h" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
</div>
<section class="aboutSec pb-0">
    <div class="cus-container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="textBox">
                    <h2 class="siteTtl">{{$about->founder_heading}}</h2>
                    <p class="sitePara">{!!$about->founder_desc!!}</p>
                    <h4 class="sigTtl">the Founder</h4>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="aboutImg">
                    <img src="{{$about->founder_img}}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection