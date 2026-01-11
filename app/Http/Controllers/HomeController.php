<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 1)->get();
        $products = Product::where('status', 1)->get();
        return view('frontend.home',compact('categories', 'products'));
    }

    public function faq(){
        return view('frontend.faq');
    }
    public function why_choose_us(){
        return view('frontend.why_choose_us');
    }
}
