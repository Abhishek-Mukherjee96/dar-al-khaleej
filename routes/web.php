<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RiskRegisterController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', [AdminAuthController::class, 'dashboard'])->name('dashboard');
    Route::get('logout', [AdminAuthController::class, 'logout'])->name('logout');
    Route::post('change-password', [AdminAuthController::class, 'change_password'])->name('change_password');
    Route::post('update-profile', [AdminAuthController::class, 'update_profile'])->name('update_profile');

    //Business Listing Route
    Route::get('business-list', [BusinessController::class, 'business_list'])->name('business_list');
    Route::get('edit-business/{business_id}', [BusinessController::class, 'edit_business'])->name('edit_business');
    Route::post('edit-business-action/{business_id}', [BusinessController::class, 'edit_business_action'])->name('edit_business_action');
    Route::post('edit-business-address-action/{business_id}', [BusinessController::class, 'edit_business_address_action'])->name('edit_business_address_action');
    Route::post('edit-business-hours-action/{business_id}', [BusinessController::class, 'edit_business_hours_action'])->name('edit_business_hours_action');
    Route::post('edit-user-action/{business_id}', [BusinessController::class, 'edit_user_action'])->name('edit_user_action');
    Route::post('/business/{business}/approve', [BusinessController::class, 'business_approve'])->name('business_approve');
    Route::post('/business/{business}/reject', [BusinessController::class, 'business_reject'])->name('business_reject');
    Route::get('/business-list-filter', [BusinessController::class, 'business_list_filter'])->name('business_list_filter');

    Route::get('category', [AdminController::class, 'category_list'])->name('category_list');
    Route::get('product', [AdminController::class, 'product_list'])->name('product_list');

    Route::get('contacts', [AdminController::class, 'contact_list'])->name('contact_list');
    Route::get('about-edit', [AdminController::class, 'about_edit'])->name('about_edit');
    Route::post('about-edit-action', [AdminController::class, 'about_edit_action'])->name('about_edit_action');

    Route::get('faq-list', [AdminController::class, 'faq_list'])->name('faq_list');
    Route::get('add-faq', [AdminController::class, 'add_faq'])->name('add_faq');
    Route::post('add-faq-action', [AdminController::class, 'add_faq_action'])->name('add_faq_action');
    Route::get('edit-faq-action/{id}', [AdminController::class, 'edit_faq_action'])->name('edit_faq_action');
    Route::post('update-faq-action/{id}', [AdminController::class, 'update_faq_action'])->name('update_faq_action');
    Route::get('update-status-faq-action/{id}', [AdminController::class, 'update_status_faq_action'])->name('update_status_faq_action');
    Route::get('delete-faq-action/{id}', [AdminController::class, 'delete_faq_action'])->name('delete_faq_action');

    Route::get('why-choose-us-edit', [AdminController::class, 'why_choose_us_edit'])->name('why_choose_us_edit');
    Route::post('why-choose-us-edit-action', [AdminController::class, 'why_choose_us_edit_action'])->name('why_choose_us_edit_action');
});

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/about-us', [AboutController::class, 'about_us'])->name('about_us');
Route::get('/contact-us', [ContactController::class, 'contact_us'])->name('contact_us');
Route::get('/gallery', [ProductController::class, 'gallery'])->name('gallery');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/why-choose-us', [HomeController::class, 'why_choose_us'])->name('why_choose_us');
Route::post('/contact-us-action', [ContactController::class, 'contact_form_action'])->name('contact_form_action');
Route::get('/products', [ProductController::class, 'products'])->name('products');
Route::get('/product/{slug}', [ProductController::class, 'product_details'])->name('product_details');
Route::post('/products/filter', [ProductController::class, 'products_filter'])->name('products_filter');
Route::post('/product-enquiry', [ProductController::class, 'product_enquiry'])->name('product_enquiry');
Route::get('/thank-you', function () {
    return view('frontend.thankyou');
})->name('thankyou');


Route::group(['middleware' => 'guest'], function () {
    Route::get('/admin/login', [AdminAuthController::class, 'admin_login'])->name('login');
    Route::post('/admin-login-action', [AdminAuthController::class, 'admin_login_action'])->name('admin.login.action');
});
