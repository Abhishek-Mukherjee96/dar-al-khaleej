    @extends('frontend.layouts.app')
    @section('title', 'Product Details')
    @section('content')
    <section class="bannerInnerWrap">
        <div class="bannerInner">
            <img src="{{asset('frontend/assets/images/inner-banner.jpg')}}" alt="">
            <div class="desc">
                <div class="container">
                    <div class="text">
                        <h1>Product Details</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="productDetails-sec">
        <div class="cus-container">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12">
                    <div class="proTham">
                        <img src="{{ Storage::url($product->thumbnail) }}" alt="{{ $product->product_name }}">
                    </div>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-12">
                    <div class="proInfo">
                        <h2>{{ $product->product_name }}</h2>

                        <p>{{ $product->description }}</p>

                        <h3>Rental Details</h3>
                        <ul>
                            <li><strong>Rental Type:</strong> {{ $product->rental_type ?? 'Furniture Rental Only' }}</li>
                            <li><strong>Available For:</strong> {{ $product->available_for ?? 'Home • Office • Event' }}</li>
                            <li><strong>Rental Duration:</strong> {{ $product->rental_duration ?? 'Daily • Weekly • Monthly' }}</li>
                            <li><strong>Condition:</strong> {{ $product->condition ?? 'Well-maintained' }}</li>
                        </ul>

                        {{--<h5>
                            {{ $product->price }} AED /
                        <sub>{{ $product->price_type ?? 'month' }}</sub>
                        </h5>--}}
                        @php
                        $message = "Hi, I'm interested in this product:\n\n"
                        . "Product: {$product->product_name}\n"
                        . "Price: {$product->price} AED / month\n"
                        . "Link: " . url()->current();
                        @endphp

                        <div class="btnPanel">
                            <a href="tel:{{ config('app.phone') }}">Enquire Now</a>
                            <a target="_blank"
                                href="https://api.whatsapp.com/send?text={{ rawurlencode($message) }}">
                                WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="productDesc">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Description</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Specification</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Key Features</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="prodescText">
                            <p>The Wood Chair offers a perfect balance of comfort, durability, and timeless design. Crafted with a strong wooden frame and a comfortable cushioned seat, this chair is ideal for dining areas, meeting rooms, event seating, and temporary setups. Its simple yet elegant design blends easily with both modern and traditional interiors.</p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">b</div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">c</div>

                </div>
            </div>
        </div>
    </div>

    @if($related_products->count())
    <div class="moreProSec">
        <div class="cus-container">
            <div class="ttl">
                <h2>Related Products</h2>
            </div>
            <div class="row">
                @foreach($related_products as $related)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="{{ route('product_details', $related->slug) }}">
                        <div class="tabProBox">
                            <div class="imgtham">
                                <img src="{{ Storage::url($related->thumbnail) }}" alt="{{ $related->product_name }}">
                            </div>
                            <div class="text">
                                <p>{{ $related->product_name }}</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
    @endsection