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
                        <h1>Transforming Empty Spaces into Impactful Experiences.</h1>
                        <p>From exhibitions and trade shows to corporate meetings and VIP lounges, Dar Al Khaleej provides stylish, functional, and reliable furniture rental solutions across the UAE.</p>
                        <a href="{{route('products')}}">Browse Furniture</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <img src="frontend/assets/images/banner-img.png" alt="">
            <div class="bnDesc">
                <div class="cus-container">
                    <div class="text">
                        <h1>Elevate Your Space — Rent Premium Furniture in the UAE With Zero Hassle.</h1>
                        <p>Style, Comfort & Convenience Delivered to Your Doorstep — Browse Our Collection Now!</p>
                        <a href="{{route('products')}}">Browse Furniture</a>
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
                        <h6><span class="count percent" data-count="5">0</span>+</h6>
                        <p>Years of Experience</p>
                    </li>
                    <li>
                        <h6><span class="count percent" data-count="2">0</span></h6>
                        <p>Opened in the country</p>
                    </li>
                    <li>
                        <h6><span class="count percent" data-count="100">0</span>+</h6>
                        <p>Happy Clients</p>
                    </li>
                    <li>
                        <h6><span class="count percent" data-count="100">0</span>+</h6>
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
                        <h2>Browse Our Furnitures</h2>
                        <p> Explore our premium range of event-ready furniture designed to enhance comfort, aesthetics, and functionality.</p>
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
                                        <img src="{{ asset('storage/app/public/'.$product->thumbnail) }}" alt="">
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
                    <p class="sitePara">Dar Al Khaleej Furniture Rentals is a UAE-based event furniture rental company specializing in premium, modern, and functional furniture for exhibitions, corporate events, conferences, and trade shows. We combine quality products, fast logistics, and professional installation to ensure your event space looks impressive and operates seamlessly.</p>
                    <div class="fsliderdesc">
                        <a href="{{route('about_us')}}">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="allproduct-sec">
    <div class="cus-container">
        <div class="ttl">
            <h2>All Products</h2>
            <p> Discover our complete catalog of modern rental furniture for exhibitions, corporate events, and trade shows.</p>
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
                <h2>How Rental Service Works At DAR AL KHALEEJ</h2>
                <p>Our streamlined rental process ensures fast booking, timely delivery, and stress-free event execution.</p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="rental-serviceBox">
                        <h4>Browse & Select</h4>
                        <h2>01</h2>
                        <p>Choose the furniture items you need from our product catalog based on your event requirements.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="rental-serviceBox">
                        <h4>Request a Quote</h4>
                        <h2>02</h2>
                        <p>Share your event details, quantities, and dates — we provide a transparent and competitive quotation.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="rental-serviceBox">
                        <h4>Confirmation & Scheduling</h4>
                        <h2>03</h2>
                        <p>Once approved, we schedule delivery and coordinate logistics according to your event timeline.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 mt-3">
                    <div class="rental-serviceBox">
                        <h4>Delivery & Installation</h4>
                        <h2>04</h2>
                        <p>Our professional team delivers and installs the furniture at your venue.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 mt-3">
                    <div class="rental-serviceBox">
                        <h4>Event Support & Pickup</h4>
                        <h2>05</h2>
                        <p>After your event concludes, we handle dismantling and pickup efficiently.</p>
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
            <p>Reliable service, premium quality, and seamless execution — every single time.</p>
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
                    <p>Dar Al Khaleej delivered premium furniture on time for our exhibition stand — their service was seamless and professional.</p>
                    <h4>Ahmed Al Mansoori</h4>
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
                    <p>The quality of the sofas and meeting tables exceeded our expectations. Highly recommended for corporate events.</p>
                    <h4>Fatima Rashid</h4>
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
                    <p>Excellent coordination, clean furniture, and smooth installation. They made our event setup stress-free.</p>
                    <h4>Khalid Nasser</h4>
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
                        <h2>Our Blogs</h2>
                        <p>Insights, event tips, and industry trends to help you create unforgettable event experiences.</p>
                        <a href="{{route('blog')}}">Explore More</a>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12">
                    <div class="boxslider">
                        <div class="owl-carousel" id="blogSlider">
                            @if(count($blogs) > 0)
                            @foreach ($blogs as $blog)
                            <div class="item">
                                <div class="blogBox">
                                    <div class="imgtham">
                                        <img src="{{asset($blog->image)}}" alt="">
                                    </div>
                                    <div class="text">
                                        <div class="info">
                                            <span>{{date('F d, Y', strtotime($blog->created_at))}}</span>
                                            <p>{{$blog->title}}</p>
                                        </div>
                                        <a href="{{route('blog_details', $blog->slug)}}"><i class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection