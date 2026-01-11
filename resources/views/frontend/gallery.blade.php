@extends('frontend.layouts.app')
@section('title', 'Gallery')
@section('content')
<section class="bannerInnerWrap">
    <div class="bannerInner">
        <img src="frontend/assets/images/inner-banner.jpg" alt="">
        <div class="desc">
            <div class="container">
                <div class="text">
                    <h1>Gallery</h1>
                </div>
            </div>
        </div>
    </div>
</section>

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
@endsection