@extends('frontend.layouts.app')
@section('title', 'Why Choose Us')
@section('content')
<section class="bannerInnerWrap">
    <div class="bannerInner">
        <img src="frontend/assets/images/inner-banner.jpg" alt="">
        <div class="desc">
            <div class="container">
                <div class="text">
                    <h1>Why Choose Us</h1>
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
                    <h3 class="siteTtlsm">{{$why_choose->title_1}}</h3>
                    <p class="siteParasm">{!!$why_choose->desc_1!!}</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="aboutImg">
                    <img src="{{asset($why_choose->img_1)}}" alt="">
                </div>
            </div>
        </div>
        <div class="row g-0 align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="textBox">
                    <h3 class="siteTtlsm">{{$why_choose->title_2}}</h3>
                    <p class="siteParasm">{!!$why_choose->desc_2!!}</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="aboutImg">
                    <img src="{{asset($why_choose->img_2)}}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection