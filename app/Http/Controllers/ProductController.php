<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function products(Request $request)
    {
        $categories = Category::where('status', 1)->get();

        $products = Product::where('status', 1)
            ->when($request->filled('category'), function ($q) use ($request) {
                $category = Category::where('slug', $request->category)->first();

                if ($category) {
                    $q->where('category_id', $category->id);
                }
            })
            ->latest()
            ->paginate(15);

        return view('frontend.products', compact('categories', 'products'));
    }


    // AJAX filter
    public function products_filter(Request $request)
    {
        $selectedCategories = $request->input('categories', []);
        $search = $request->input('search', '');

        $products = Product::where('status', 1)
            ->when(!empty($selectedCategories), function ($q) use ($selectedCategories) {
                $q->whereIn('category_id', $selectedCategories);
            })
            ->when($search != '', function ($q) use ($search) {
                $q->where('product_name', 'like', "%$search%");
            })
            ->latest()
            ->paginate(15);

        $html = view('frontend.partials.product-list', compact('products'))->render();
        return response()->json(['html' => $html]);
    }

    public function product_details($slug)
    {
        // Main product
        $product = Product::where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        // Related products (same category, random, exclude current)
        $related_products = Product::where('status', 1)
            ->where('category_id', $product->category_id)
            ->where('product_id', '!=', $product->product_id)
            ->inRandomOrder()
            ->limit(3)
            ->get();

        return view('frontend.product-details', compact('product', 'related_products'));
    }
}
