<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about_us(){
        $about = AboutUs::first();
        return view('frontend.about',compact('about'));
    }
}
