<div class="col-lg-3 col-md-6 col-sm-12">
    <a href="javascript:void(0);">
        <div class="tabProBox">
            <div class="imgtham">
                <img src="{{ Storage::url($product->thumbnail) }}" alt="{{ $product->product_name }}">
            </div>
            <div class="text">
                <p>{{ $product->product_name }}</p>
            </div>
        </div>
    </a>
</div>
