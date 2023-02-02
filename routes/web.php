<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::controller(App\Http\Controllers\Client\LandingPageController::class)->group(function () {
    Route::get('/', 'index')->name('client.landing');
    Route::get('/abouts', 'about')->name('client.abouts');
    Route::get('/products', 'product')->name('client.products');
    Route::get('/contacts', 'contact')->name('client.contacts');
    Route::get('/news', 'news')->name('client.news');
});

Route::controller(App\Http\Controllers\Client\AuthController::class)->group(function () {
    Route::get('/login', 'loginForm')->name('client.login');
    Route::post('/login/account', 'login')->name('client.login.submit');
    Route::get('/register', 'registerForm')->name('client.register');
    Route::post('/register/create/acccount', 'registerStore')->name('client.register.submit');
});

Route::group(['middleware' => ['customer.auth']], function(){
    Route::controller(App\Http\Controllers\Client\LandingPageController::class)->group(function () {
        Route::get('/open-shop', 'index')->name('client.landing.log');
        Route::get('/question', 'question')->name('client.question');
        Route::get('/question/detail/{id}', 'questionShow')->name('client.questionShow');
        Route::post('/comment/store', 'storeComment')->name('client.comment.store');
    });

    Route::controller(App\Http\Controllers\Client\CheckOutController::class)->group(function () {
        Route::get('/detail/{id}', 'showDetail')->name('client.product.detail');
        Route::post('/checkout-store-order/{id}', 'store')->name('client.store.order');
        Route::get('/checkout-order/{id}', 'showPayOrder')->name('client.chekout.order');
        Route::post('/checkout-order-success/{id}', 'checkoutOrderSuccess')->name('client.success.order');
        Route::get('/order-success/{id}', 'OrderSuccess')->name('client.page.success.order');
    });
    
    Route::controller(App\Http\Controllers\Client\ProfileController::class)->group(function () {
        Route::get('/profile/{id}', 'index')->name('client.profile');
        Route::post('/profile/order-pay/{id}', 'storePaymentCustomer')->name('client.profile.payment');
        Route::post('/profile/update-profile/{id}', 'updateProfile')->name('client.profile.update');
        Route::post('/profile/order-confirm/{id}', 'statusConfrmCustomer')->name('client.profile.confirm');
        Route::post('/profile/order-comment/{id}', 'statusCommentCustomer')->name('client.profile.comment');
    });

    Route::get('/logout', [App\Http\Controllers\Client\AuthController::class, 'logout'])->name('client.logout');
});