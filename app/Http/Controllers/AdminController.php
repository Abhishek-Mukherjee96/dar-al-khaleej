<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function category_list(){
        return view('admin.category.index');
    }

    public function product_list(){
        return view('admin.product.index');
    }
}
