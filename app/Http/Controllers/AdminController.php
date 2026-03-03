<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Blog;
use App\Models\ContactUs;
use App\Models\Faq;
use App\Models\ProductEnquiry;
use App\Models\WhyChooseUs;
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

    public function faq_list()
    {
        $faqs = Faq::latest()->paginate(25);
        return view('admin.faq.index', compact('faqs'));
    }

    public function add_faq()
    {
        return view('admin.faq.add');
    }

    public function add_faq_action(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer'   => 'required|string',
        ]);

        $add_faq = new Faq();
        $add_faq->question = $request->question;
        $add_faq->answer   = $request->answer;
        $add_faq->save();

        return redirect()->route('faq_list')->with('success', 'FAQ added successfully');
    }

    public function edit_faq_action($id)
    {
        $faq = Faq::findOrFail($id);
        return view('admin.faq.edit', compact('faq'));
    }

    public function update_faq_action(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer'   => 'required|string',
        ]);

        $faq = Faq::findOrFail($id);
        $faq->question = $request->question;
        $faq->answer   = $request->answer;
        $faq->status = $request->status;
        $faq->save();

        return redirect()->route('faq_list')->with('success', 'FAQ updated successfully');
    }

    public function delete_faq_action($id)
    {
        Faq::findOrFail($id)->delete();
        return redirect()->route('faq_list')->with('success', 'FAQ deleted successfully');
    }

    public function why_choose_us_edit()
    {
        $why_choose = WhyChooseUs::first();
        return view('admin.why_choose_us.edit', compact('why_choose'));
    }

    public function why_choose_us_edit_action(Request $request)
    {
        $why_choose_us = WhyChooseUs::first() ?? new WhyChooseUs();

        $folder = 'assets/why_choose_us';
        if (!file_exists($folder)) {
            mkdir($folder, 0755, true);
        }

        $uploadImage = function ($file) {
            $name = time() . '_' . Str::random(6) . '.' . $file->getClientOriginalExtension();
            $file->move('assets/why_choose_us', $name);
            return 'assets/why_choose_us/' . $name;
        };

        if ($request->hasFile('img_1')) {
            $why_choose_us->img_1 = $uploadImage($request->file('img_1'));
        }

        if ($request->hasFile('img_2')) {
            $why_choose_us->img_2 = $uploadImage($request->file('img_2'));
        }

        $why_choose_us->title_1   = $request->title_1;
        $why_choose_us->desc_1      = $request->desc_1;

        $why_choose_us->title_2   = $request->title_2;
        $why_choose_us->desc_2      = $request->desc_2;

        $why_choose_us->save();

        return back()->with('success', 'Why choose us updated successfully');
    }

    public function blogs(){
        $blogs = Blog::latest()->paginate(10);
        return view('admin.blog.index', compact('blogs'));
    }

        public function add_blog()
    {
        return view('admin.blog.add');
    }

    public function add_blog_action(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required',
            'image'       => 'required|max:2048',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = rand().'.'.$request->image->extension();
            $request->image->move('assets/blogs', $imageName);
        }

        $blog = new Blog();
        $blog->title       = $request->title;
        $blog->slug        = Str::slug($request->title);
        $blog->description = $request->description;
        $blog->image       = 'assets/blogs/'.$imageName;
        $blog->status      = 1;
        $blog->created_by  = auth()->id();
        $blog->save();

        return redirect()->route('blogs')->with('success', 'Blog created successfully');
    }

    public function edit_blog_action($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blog.edit', compact('blog'));
    }

    public function update_blog_action(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required',
            'image'       => 'nullable|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if (file_exists(public_path($blog->image))) {
                unlink(public_path($blog->image));
            }

            $imageName = rand().'.'.$request->image->extension();
            $request->image->move('assets/blogs', $imageName);
            $blog->image = 'assets/blogs/'.$imageName;
        }

        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->description = $request->description;
        $blog->status = $request->status;
        $blog->save();

        return redirect()->route('blogs')->with('success', 'Blog updated successfully');
    }

    public function delete_blog_action($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('blogs')->with('success', 'Blog deleted successfully');
    }

    public function enquiry_list()
    {
        $enquiries = ProductEnquiry::leftjoin('products', 'product_enquiries.product_id', '=', 'products.product_id')->select('product_enquiries.*', 'products.product_name')->paginate(25);
        return view('admin.product.enquiry', compact('enquiries'));
    }
}
