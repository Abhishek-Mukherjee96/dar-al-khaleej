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
                            <a href="javascript:void(0);"
                                class="btn btn-primary"
                                data-bs-toggle="modal"
                                data-bs-target="#enquiryModal"
                                data-product-id="{{ $product->product_id }}"
                                data-product-name="{{ $product->product_name }}"
                                data-rental-duration="{{ $product->rental_duration }}"
                                data-available-for="{{ $product->available_for }}">
                                Enquire Now
                            </a>
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
    <div class="modal fade" id="enquiryModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form method="POST" action="{{ route('product_enquiry') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="enquiryTitle"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="product_id" id="product_id">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Rental Duration</label>
                                <select name="rental_duration" class="form-control" id="rental_duration" required>
                                    <option value="">Select</option>
                                    <option value="Daily">Daily</option>
                                    <option value="Weekly">Weekly</option>
                                    <option value="Monthly">Monthly</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Available For</label>
                                <select name="available_for" class="form-control" id="available_for" required>
                                    <option value="">Select</option>
                                    <option value="Home">Home</option>
                                    <option value="Office">Office</option>
                                    <option value="Event">Event</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" required>
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" required>
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>Phone</label>
                            <input type="text" class="form-control" name="phone" required>
                            @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>Message</label>
                            <textarea class="form-control" name="message"></textarea>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
    @endif
    @endsection
    @section('scripts')
    <script>
        document.getElementById('enquiryModal').addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;

            document.getElementById('product_id').value =
                button.getAttribute('data-product-id');

            document.getElementById('enquiryTitle').innerText =
                'Enquiry for ' + button.getAttribute('data-product-name');

            document.getElementById('rental_duration').value =
                button.getAttribute('data-rental-duration');

            document.getElementById('available_for').value =
                button.getAttribute('data-available-for');
        });
    </script>
    @endsection