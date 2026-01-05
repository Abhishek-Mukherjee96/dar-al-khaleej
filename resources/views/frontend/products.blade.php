@extends('frontend.layouts.app')
@section('title', 'Products')
@section('content')
<section class="bannerInnerWrap">
    <div class="bannerInner">
        <img src="frontend/assets/images/inner-banner.jpg" alt="">
        <div class="desc">
            <div class="container">
                <div class="text">
                    <h1>Our Products</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="contact-page-sec">
    <div class="cus-container">
        <div class="row">

            <!-- SIDEBAR -->
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="proSideBar">
                    <div class="proSideBarBox">
                        <h3>Furniture Category</h3>
                        <ul>
                            <!-- ALL FURNITURE -->
                            <li class="custChekBox">
                                <input type="checkbox" class="category-filter" value="" id="all" checked>
                                <label for="all">All Furniture</label>
                            </li>

                            <!-- Categories -->
                            @foreach($categories as $category)
                            <li class="custChekBox">
                                <input type="checkbox"
                                    class="category-filter"
                                    value="{{ $category->category_id }}"
                                    data-slug="{{ $category->slug }}"
                                    id="cat-{{ $category->category_id }}">
                                <label for="cat-{{ $category->category_id }}">{{ $category->cat_name }}</label>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <!-- PRODUCTS -->
            <div class="col-lg-8 col-md-8 col-sm-12">
                <div class="proCatSrc">
                    <div class="srcWrap">
                        <input type="text" id="search-box" placeholder="Search" class="form-control">
                    </div>
                </div>
                <div class="procatListing" id="products-container">
                    @include('frontend.partials.product-list', ['products' => $products])
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script>
    jQuery(document).ready(function($) {
        var currentPage = 1;

        function filterProducts(page = 1) {
            var categories = [];
            $('.category-filter:checked').each(function() {
                if ($(this).val() != '') categories.push($(this).val());
            });

            var search = $('#search-box').val();
            currentPage = page;

            $.ajax({
                url: "{{ route('products_filter') }}?page=" + page,
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    categories: categories,
                    search: search
                },
                success: function(response) {
                    $('#products-container').html(response.html);
                    $('html, body').animate({
                        scrollTop: $('#products-container').offset().top - 100
                    }, 300);
                }
            });
        }

        // Category change
        // Category change
        $('.category-filter').on('change', function() {

            // If "All Furniture" is checked
            if ($(this).attr('id') === 'all') {
                if ($(this).is(':checked')) {
                    $('.category-filter').not(this).prop('checked', false);
                }
            }
            // If any specific category is checked
            else {
                if ($(this).is(':checked')) {
                    $('#all').prop('checked', false);
                }

                // If no category is checked, auto-select "All"
                if ($('.category-filter:not(#all):checked').length === 0) {
                    $('#all').prop('checked', true);
                }
            }

            filterProducts(1);
        });

        // Search debounce
        var typingTimer;
        $('#search-box').on('keyup', function() {
            clearTimeout(typingTimer);
            typingTimer = setTimeout(function() {
                filterProducts(1);
            }, 500);
        });

        // Pagination click
        $(document).on('click', '.pagination a.page-link', function(e) {
            e.preventDefault();
            var page = $(this).data('page');
            filterProducts(page);
        });

        // Auto select category from footer URL
        const urlParams = new URLSearchParams(window.location.search);
        const categorySlug = urlParams.get('category');

        if (categorySlug) {
            $('#all').prop('checked', false);

            $('.category-filter').each(function() {
                if ($(this).data('slug') === categorySlug) {
                    $(this).prop('checked', true);
                }
            });

            filterProducts(1);
        }
    });
</script>
@endsection