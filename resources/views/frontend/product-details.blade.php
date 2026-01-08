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
                            <li><strong>Rental Type:</strong> {{ $product->rental_type ?? 'N/A' }}</li>
                            <li><strong>Available For:</strong> {{ $product->available_for ?? 'N/A' }}</li>
                            <li><strong>Rental Duration:</strong> {{ $product->rental_duration ?? 'N/A' }}</li>
                            <li><strong>Condition:</strong> {{ $product->conditions ?? 'N/A' }}</li>
                        </ul>
                        @php
                        $message = "Hi, I'm interested in this product:\n\n"
                        . "Product: {$product->product_name}\n"
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
                    <li class="nav-item">
                        <button class="nav-link active" id="desc-tab" data-bs-toggle="tab" data-bs-target="#description"
                            type="button" role="tab" aria-controls="description" aria-selected="true">
                            Description
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="spec-tab" data-bs-toggle="tab" data-bs-target="#specification"
                            type="button" role="tab" aria-controls="specification" aria-selected="false">
                            Specification
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="feat-tab" data-bs-toggle="tab" data-bs-target="#features"
                            type="button" role="tab" aria-controls="features" aria-selected="false">
                            Key Features
                        </button>
                    </li>
                </ul>

                <div class="tab-content mt-3">
                    <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="desc-tab">
                        {!! $product->description !!}
                    </div>
                    <div class="tab-pane fade" id="specification" role="tabpanel" aria-labelledby="spec-tab">
                        {!! $product->specifications !!}
                    </div>
                    <div class="tab-pane fade" id="features" role="tabpanel" aria-labelledby="feat-tab">
                        {!! $product->key_features !!}
                    </div>
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

    @section('scripts')
    <script>
        tinymce.init({
            selector: '#description, #specification, #features',
            plugins: 'lists link image table code help wordcount',
            toolbar: 'undo redo | bold italic underline | bullist numlist | link image | alignleft aligncenter alignright alignjustify | table | code',
            menubar: false,
            branding: false,
            height: 200
        });
    </script>
    @endsection