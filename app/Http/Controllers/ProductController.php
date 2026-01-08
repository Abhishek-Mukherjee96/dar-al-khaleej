<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductEnquiry;

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

    public function product_enquiry(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
        ]);

        $product = Product::findOrFail($request->product_id);

        ProductEnquiry::create([
            'product_id' => $product->product_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
            'rental_duration' => $request->rental_duration,
            'available_for' => $request->available_for
        ]);

        return redirect()->route('thankyou');
    }
}
