<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UserController;
// ==================================================Website Route===============================================


Route::get('/', function () {
    return view('website.index');
});
Route::get('/about', function () {
    return view('website.about');
});

Route::get('/blog', [BlogController::class, 'create']);

Route::get('/contact', [ContactController::class, 'create']);
Route::post('/insert_contact', [ContactController::class, 'store']);


Route::get('/feature', [FeatureController::class, 'create']);

Route::get('/product', [ProductController::class, 'create']);

Route::get('/store', [StoreController::class, 'create']);

Route::get('/testimonial', [TestimonialController::class, 'create']);

Route::get('/signup', function () {
    return view('website.signup');
});
Route::get('/login', function () {
    return view('website.login');
});


// ==================================================Admin Route===============================================

Route::get('/index', function () {
    return view('admin.index');
});
Route::get('dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/add_blog', [BlogController::class, 'insert']);
Route::get('/manage_blog', [BlogController::class, 'index']);
Route::post('/insert_blog', [BlogController::class, 'store']);
Route::get('/delete_blog/{id}', [BlogController::class, 'destroy']);


Route::get('/manage_contact', [ContactController::class, 'index']);
Route::get('/delete_contact/{id}', [ContactController::class, 'destroy']);


Route::get('/add_feature', [FeatureController::class, 'insert']);
Route::get('/manage_feature', [FeatureController::class, 'index']);


Route::get('/add_product', [ProductController::class, 'insert']);
Route::get('/manage_product', [ProductController::class, 'index']);


Route::get('/add_store', [StoreController::class, 'insert']);
Route::get('/manage_store', [StoreController::class, 'index']);


Route::get('/add_testimonial', [TestimonialController::class, 'insert']);
Route::get('/manage_testimonial', [TestimonialController::class, 'index']);


Route::get('/manage_users', [UserController::class, 'index']);

Route::get('alogin', function () {
    return view('admin.alogin');
});

Route::get('profile', function () {
    return view('admin.profile');
});
