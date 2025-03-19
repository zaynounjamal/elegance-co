<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/',[HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/redirect',[HomeController::class,'redirect'])->middleware('auth','verified');
Route::get('/view_category', [AdminController::class, 'view_category'])->name('view_category');
Route::post('/add_category', [AdminController::class, 'add_category']);
Route::get('/delete_category/{id}', [AdminController::class, 'delete_category']);
Route::get('/view_product', [AdminController::class, 'view_product']);
Route::post('/add_product', [AdminController::class, 'add_product']);
Route::get('/show_products', [AdminController::class, 'show_product']);
Route::get('/delete_product/{id}', [AdminController::class, 'delete_product']);
Route::get('/edit_product/{id}', [AdminController::class, 'edit_product']);
Route::post('/edit_product_confirm/{id}', [AdminController::class, 'edit_product_confirm']);
Route::get('/product_details/{id}', [HomeController::class, 'product_details']);
Route::post('/add_cart/{id}', [HomeController::class, 'add_cart']);
Route::get('/show_cart', [HomeController::class, 'show_cart']);
Route::delete('/remove_cart/{id}', [HomeController::class, 'remove_cart']);
Route::get('/cash_order', [HomeController::class, 'cash_order']);
Route::get('/stripe/{totalprice}', [HomeController::class, 'stripe']);
Route::post('stripe/{totalprice}', [HomeController::class, 'stripePost'])->name('stripe.post');
Route::get('/order', [HomeController::class, 'order']);
Route::get('/delivered/{id}', [HomeController::class, 'delivered']);
Route::get('/print_pdf/{id}', [AdminController::class, 'print_pdf']);
Route::get('/send_email/{id}', [AdminController::class, 'send_email']);
Route::post('/send_user_email/{id}', [AdminController::class, 'send_user_email']);
Route::get('/search', [AdminController::class, 'search_data']);
Route::get('/show_order', [HomeController::class, 'show_order']);
Route::delete('/cancel_order/{id}', [HomeController::class, 'cancle_order']);
Route::post('/add_comment', [HomeController::class, 'add_comment']);
Route::post('/add_reply', [HomeController::class, 'add_reply']);
Route::get('/product_search', [HomeController::class, 'product_search']);
Route::get('/products', [HomeController::class, 'products']);
Route::get('/product_search_view', [HomeController::class, 'product_search_view']);
Route::get('/blog', [HomeController::class, 'blog']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/testimonial', [HomeController::class, 'testimonial']);
Route::post('/send_message', [HomeController::class, 'send_message']);
Route::get('/view_messages', [AdminController::class, 'messages_view']);
Route::get('/send_email_message/{id}', [AdminController::class, 'send_email_message']);
Route::post('/send_user_email_message/{id}', [AdminController::class,'send_message_reply']);
Route::get('/view_users', [AdminController::class, 'view_users']);
Route::get('/search_users', [AdminController::class, 'search_users']);
Route::get('/delete_user/{id}', [AdminController::class, 'delete_user']);
Route::get('/edit_user/{id}', [AdminController::class, 'edit_user']);
Route::post('/admin_user_update/{id}', [AdminController::class, 'update_user_info']);
Route::get('/add_users', [AdminController::class, 'add_users']);
Route::post('/admin_users_store', [AdminController::class, 'admin_users_store']);



