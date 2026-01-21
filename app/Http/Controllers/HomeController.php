<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Faq;
use App\Models\Product;
use App\Models\WhyChooseUs;
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
        $faqs = Faq::where('status',1)->get();
        return view('frontend.faq', compact('faqs'));
    }
    public function why_choose_us(){
        $why_choose = WhyChooseUs::first();
        return view('frontend.why_choose_us',compact('why_choose'));
    }

    public function blog(){
        $blogs = Blog::where('status', 1)->latest()->get();
        return view('frontend.blog',compact('blogs'));
    }

    public function blog_details($slug)
    {
        $recent_blogs = Blog::where('status', 1)->where('slug', '!=', $slug)->latest()->limit(5)->get();
        $blog = Blog::where('slug', $slug)
                    ->where('status', 1)
                    ->firstOrFail();

        return view('frontend.blog_details', compact('blog','recent_blogs'));
    }
}
