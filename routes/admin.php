<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // authenticated
    Route::middleware('auth')->group(function() {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::controller(App\Http\Controllers\Admin\UserConttroller::class)->group(function () {
            Route::get('/users', 'index')->name('users.index');
            Route::get('/users/create', 'create')->name('users.create');
            Route::post('/users/create/store', 'store')->name('users.store');
            Route::get('/users/edit/{id}', 'edit')->name('users.edit');
            Route::put('/users/edit/update/{id}', 'update')->name('users.update');
            Route::get('/users/show/{id}', 'show')->name('users.show');
            Route::delete('/users/destroy/{id}', 'destroy')->name('users.destroy');
        });

        Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
            Route::get('/products', 'index')->name('products.index');
            Route::get('/products/create', 'create')->name('products.create');
            Route::post('/products/create/store', 'store')->name('products.store');
            Route::get('/products/edit/{id}', 'edit')->name('products.edit');
            Route::put('/products/edit/update/{id}', 'update')->name('products.update');
            Route::get('/products/show/{id}', 'show')->name('products.show');
            Route::delete('/products/destroy/{id}', 'destroy')->name('products.destroy');
        });

        Route::controller(App\Http\Controllers\Admin\TestimonialController::class)->group(function () {
            Route::get('/testimonials', 'index')->name('testimonials.index');
            Route::get('/testimonials/create', 'create')->name('testimonials.create');
            Route::post('/testimonials/create/store', 'store')->name('testimonials.store');
            Route::get('/testimonials/edit/{id}', 'edit')->name('testimonials.edit');
            Route::put('/testimonials/edit/update/{id}', 'update')->name('testimonials.update');
            Route::get('/testimonials/show/{id}', 'show')->name('testimonials.show');
            Route::delete('/testimonials/destroy/{id}', 'destroy')->name('testimonials.destroy');
        });

        Route::controller(App\Http\Controllers\Admin\OrderController::class)->group(function () {
            Route::get('/orders', 'index')->name('orders.index');
            Route::get('/orders/create', 'create')->name('orders.create');
            Route::post('/orders/create/store', 'store')->name('orders.store');
            Route::get('/orders/edit/{id}', 'edit')->name('orders.edit');
            Route::put('/orders/edit/update/{id}', 'update')->name('orders.update');
            Route::get('/orders/show/{id}', 'show')->name('orders.show');
            Route::delete('/orders/destroy/{id}', 'destroy')->name('orders.destroy');
        });

        Route::controller(App\Http\Controllers\Admin\HotSaleController::class)->group(function () {
            Route::get('/hotSales', 'index')->name('hotSales.index');
        });

        Route::controller(App\Http\Controllers\Admin\NewsController::class)->group(function () {
            Route::get('/news', 'index')->name('news.index');
            Route::get('/news/create', 'create')->name('news.create');
            Route::post('/news/create/store', 'store')->name('news.store');
            Route::get('/news/edit/{id}', 'edit')->name('news.edit');
            Route::put('/news/edit/update/{id}', 'update')->name('news.update');
            Route::get('/news/show/{id}', 'show')->name('news.show');
            Route::delete('/news/destroy/{id}', 'destroy')->name('news.destroy');
        });

    });
});

?>
