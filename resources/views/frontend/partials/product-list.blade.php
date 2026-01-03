<div class="row">
    @forelse($products as $product)
    <div class="col-lg-4 col-md-6 col-sm-12">
        <a href="{{ route('product_details', $product->slug) }}">
            <div class="tabProBox">
                <div class="imgtham">
                    <img src="{{ Storage::url($product->thumbnail) }}" alt="">
                </div>
                <div class="text">
                    <p>{{ $product->product_name }}</p>
                </div>
            </div>
        </a>
    </div>
    @empty
    <div class="col-12 text-center">
        <p class="text-danger">No products found.</p>
    </div>
    @endforelse
</div>
<div class="mt-3">
    {!! $products->links('frontend.pagination.ajax-pagination') !!}
</div>