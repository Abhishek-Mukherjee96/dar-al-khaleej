<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function category_list()
    {
        return view('admin.category.index');
    }

    public function product_list()
    {
        return view('admin.product.index');
    }

    public function contact_list()
    {
        $contacts = ContactUs::paginate(25);
        return view('admin.contact.index', compact('contacts'));
    }

    public function about_edit()
    {
        $about = AboutUs::first();
        return view('admin.about.edit', compact('about'));
    }

    public function about_edit_action(Request $request)
    {
        $about = AboutUs::first() ?? new AboutUs();

        $folder = public_path('assets/about');
        if (!file_exists($folder)) {
            mkdir($folder, 0755, true);
        }

        $uploadImage = function ($file) {
            $name = time() . '_' . Str::random(6) . '.' . $file->getClientOriginalExtension();
            $file->move('assets/about', $name);
            return 'assets/about/' . $name;
        };

        if ($request->hasFile('about_img')) {
            $about->about_img = $uploadImage($request->file('about_img'));
        }

        if ($request->hasFile('mission_img')) {
            $about->mission_img = $uploadImage($request->file('mission_img'));
        }

        if ($request->hasFile('vision_img')) {
            $about->vision_img = $uploadImage($request->file('vision_img'));
        }

        if ($request->hasFile('founder_img')) {
            $about->founder_img = $uploadImage($request->file('founder_img'));
        }

        $about->about_heading   = $request->about_heading;
        $about->about_desc      = $request->about_desc;

        $about->mission_heading = $request->mission_heading;
        $about->mission_desc    = $request->mission_desc;

        $about->vision_heading  = $request->vision_heading;
        $about->vision_desc     = $request->vision_desc;

        $about->founder_heading = $request->founder_heading;
        $about->founder_desc    = $request->founder_desc;

        $about->save();

        return back()->with('success', 'About Us updated successfully');
    }
}
