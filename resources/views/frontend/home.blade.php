@extends('frontend.layouts.app')
@section('title', 'Home')
@section('content')
<section class="banner">
    <div class="owl-carousel" id="banner-slider">
        <div class="item">
            <img src="frontend/assets/images/banner-img.png" alt="">
            <div class="bnDesc">
                <div class="cus-container">
                    <div class="text">
                        <h1>Luxury Furniture Rentals for Homes & Events Across the Gulf</h1>
                        <p>Premium furniture delivered and installed with flexible monthly plans for convenience.</p>
                        <a href="#">Browse Furniture</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <img src="frontend/assets/images/banner-img.png" alt="">
            <div class="bnDesc">
                <div class="cus-container">
                    <div class="text">
                        <h1>Luxury Furniture Rentals for Homes & Events Across the Gulf</h1>
                        <p>Premium furniture delivered and installed with flexible monthly plans for convenience.</p>
                        <a href="#">Browse Furniture</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="furniture-sec">
    <div class="counterSec">
        <div class="cus-container">
            <div class="counterBox">
                <ul id="counter">
                    <li>
                        <h6><span class="count percent" data-count="7">0</span></h6>
                        <p>Year Experience</p>
                    </li>
                    <li>
                        <h6><span class="count percent" data-count="2">0</span></h6>
                        <p>Opened in the country</p>
                    </li>
                    <li>
                        <h6><span class="count percent" data-count="10">0</span>k+</h6>
                        <p>Happy Clints</p>
                    </li>
                    <li>
                        <h6><span class="count percent" data-count="260">0</span>+</h6>
                        <p>Variant Furniture</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="common-slider">
        <div class="common-sliderWrap">
            <div class="row g-0 align-items-center">
                <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12">
                    <div class="fsliderdesc">
                        <h2>Browse Furniture Rentals</h2>
                        <p>Premium furniture rentals for homes, offices, and events — delivered and set up for you.</p>
                        <a href="{{route('products')}}">View All</a>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12">
                    <div class="boxslider">
                        <div class="owl-carousel" id="furnitureSlider">
                            @foreach($products as $product)
                            <div class="item">
                                <div class="furnitureBox">
                                    <div class="imgtham">
                                        <img src="{{ Storage::url($product->thumbnail) }}" alt="">
                                    </div>
                                    <div class="text">
                                        <p>{{$product->product_name}}</p>
                                        <a href="{{ route('product_details', $product->slug) }}"><i class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="allproduct-sec">
    <div class="cus-container">
        <div class="ttl">
            <h2>All Product</h2>
            <p>The products we provide only for you as our service are selected from the best products with number 1 quality in the world</p>
        </div>
        <div class="productTab">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active"
                        data-bs-toggle="tab"
                        data-bs-target="#all">
                        All Furniture
                    </button>
                </li>
                @foreach($categories as $category)
                <li class="nav-item" role="presentation">
                    <button class="nav-link"
                        data-bs-toggle="tab"
                        data-bs-target="#cat-{{ $category->category_id }}">
                        {{ $category->cat_name }}
                    </button>
                </li>
                @endforeach
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="all">
                    <div class="row">
                        @foreach($products as $product)
                        @include('frontend.partials.product-card', ['product' => $product])
                        @endforeach
                    </div>
                </div>
                @foreach($categories as $category)
                <div class="tab-pane fade" id="cat-{{ $category->category_id }}">
                    <div class="row">
                        @foreach($category->products as $product)
                        @include('frontend.partials.product-card', ['product' => $product])
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="rental-service-sec">
    <div class="rental-serviceWrap">
        <div class="cus-container">
            <div class="ttl">
                <h2>How Our Rental Service Works</h2>
                <p>Simple, fast, and hassle-free furniture rental for homes, offices, and events.</p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="rental-serviceBox">
                        <h4>Choose Your Furniture</h4>
                        <h2>01</h2>
                        <p>Browse our collections and pick the items or setups you need. We offer home, office, event, and majlis rentals.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="rental-serviceBox">
                        <h4>Select Your Rental Duration</h4>
                        <h2>02</h2>
                        <p>Choose flexible rental terms — daily, weekly, or monthly depending on your needs. No long-term commitments.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="rental-serviceBox">
                        <h4>Delivery, Setup & Pickup</h4>
                        <h2>03</h2>
                        <p>Our team delivers, installs, and arranges everything for you. When your rental period ends, we collect it at your convenience.</p>
                    </div>
                </div>
            </div>
            <div class="btn-sec text-center">
                <a href="{{ route('contact_us') }}" class="btn">Request A Quote</a>
            </div>
        </div>
    </div>
</div>
<div class="project-sec">
    <div class="cus-container">
        <div class="ttl">
            <h2>Our Projects</h2>
            <p>A showcase of premium furniture rentals delivered and installed for homes, offices, events, and majlis setups across the Gulf.</p>
        </div>
    </div>
    <div class="masonry">
        <div class="brick">
            <img src="frontend/assets/images/project-img1.png" alt="">
            <div class="brickBtn">
                <a href="#">KNOW MORE</a>
            </div>
        </div>
        <div class="brick">
            <img src="frontend/assets/images/project-img2.png" alt="">
            <div class="brickBtn">
                <a href="#">KNOW MORE</a>
            </div>
        </div>
        <div class="brick">
            <img src="frontend/assets/images/project-img3.png" alt="">
            <div class="brickBtn">
                <a href="#">KNOW MORE</a>
            </div>
        </div>
        <div class="brick">
            <img src="frontend/assets/images/project-img4.png" alt="">
            <div class="brickBtn">
                <a href="#">KNOW MORE</a>
            </div>
        </div>
        <div class="brick">
            <img src="frontend/assets/images/project-img5.png" alt="">
            <div class="brickBtn">
                <a href="#">KNOW MORE</a>
            </div>
        </div>
        <div class="brick">
            <img src="frontend/assets/images/project-img6.png" alt="">
            <div class="brickBtn">
                <a href="#">KNOW MORE</a>
            </div>
        </div>
        <div class="brick">
            <img src="frontend/assets/images/project-img7.png" alt="">
            <div class="brickBtn">
                <a href="#">KNOW MORE</a>
            </div>
        </div>
        <div class="brick">
            <img src="frontend/assets/images/project-img8.png" alt="">
            <div class="brickBtn">
                <a href="#">KNOW MORE</a>
            </div>
        </div>
        <div class="brick">
            <img src="frontend/assets/images/project-img9.png" alt="">
            <div class="brickBtn">
                <a href="#">KNOW MORE</a>
            </div>
        </div>
        <div class="brick">
            <img src="frontend/assets/images/project-img10.png" alt="">
            <div class="brickBtn">
                <a href="#">KNOW MORE</a>
            </div>
        </div>
    </div>
</div>
<div class="testimonial-sec">
    <div class="owl-carousel" id="testimonialSlider">
        <div class="item">
            <div class="testimonialBox">
                <div class="test-iconTop">
                    <img src="frontend/assets/images/testi-top-icon.png" alt="">
                </div>
                <div class="testimonialBoxWrap">
                    <ul>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                    </ul>
                    <p>Absolutely outstanding service! The team delivered, installed, and set up every piece with perfection. My entire living room was transformed into a luxurious space within hours. I highly recommend DAR AL KHALEEJ to anyone looking for top-quality premium rental furniture.</p>
                    <h4>Andrés R</h4>
                </div>
                <div class="test-iconBottom">
                    <img src="frontend/assets/images/testi-bottom-icon.png" alt="">
                </div>
            </div>
        </div>
        <div class="item">
            <div class="testimonialBox">
                <div class="test-iconTop">
                    <img src="frontend/assets/images/testi-top-icon.png" alt="">
                </div>
                <div class="testimonialBoxWrap">
                    <ul>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                    </ul>
                    <p>Absolutely outstanding service! The team delivered, installed, and set up every piece with perfection. My entire living room was transformed into a luxurious space within hours. I highly recommend DAR AL KHALEEJ to anyone looking for top-quality premium rental furniture.</p>
                    <h4>Andrés R</h4>
                </div>
                <div class="test-iconBottom">
                    <img src="frontend/assets/images/testi-bottom-icon.png" alt="">
                </div>
            </div>
        </div>
        <div class="item">
            <div class="testimonialBox">
                <div class="test-iconTop">
                    <img src="frontend/assets/images/testi-top-icon.png" alt="">
                </div>
                <div class="testimonialBoxWrap">
                    <ul>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                    </ul>
                    <p>Absolutely outstanding service! The team delivered, installed, and set up every piece with perfection. My entire living room was transformed into a luxurious space within hours. I highly recommend DAR AL KHALEEJ to anyone looking for top-quality premium rental furniture.</p>
                    <h4>Andrés R</h4>
                </div>
                <div class="test-iconBottom">
                    <img src="frontend/assets/images/testi-bottom-icon.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="ourBlog-sec">
    <div class="common-slider">
        <div class="common-sliderWrap">
            <div class="row g-0 align-items-center">
                <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12">
                    <div class="fsliderdesc">
                        <h2>From Our Blog</h2>
                        <p>Insights, tips, and ideas on furniture rentals, interior styling, events, and majlis setups.</p>
                        <a href="#">Explore More</a>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12">
                    <div class="boxslider">
                        <div class="owl-carousel" id="blogSlider">
                            <div class="item">
                                <div class="blogBox">
                                    <div class="imgtham">
                                        <img src="frontend/assets/images/blog-img1.png" alt="">
                                    </div>
                                    <div class="text">
                                        <div class="info">
                                            <span>11 Nov 2025</span>
                                            <p>Reasons to Rent Furniture Instead of Buying in the UAE</p>
                                        </div>
                                        <a href="#"><i class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="blogBox">
                                    <div class="imgtham">
                                        <img src="frontend/assets/images/blog-img2.png" alt="">
                                    </div>
                                    <div class="text">
                                        <div class="info">
                                            <span>11 Nov 2025</span>
                                            <p>How to Style Your Living Room with Premium Rental Furniture</p>
                                        </div>
                                        <a href="#"><i class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="blogBox">
                                    <div class="imgtham">
                                        <img src="frontend/assets/images/blog-img2.png" alt="">
                                    </div>
                                    <div class="text">
                                        <div class="info">
                                            <span>11 Nov 2025</span>
                                            <p>Reasons to Rent Furniture Instead of Buying in the UAE</p>
                                        </div>
                                        <a href="#"><i class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection