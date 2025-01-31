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

        Route::controller(App\Http\Controllers\Admin\VendorController::class)->group(function () {
            Route::get('/vendors', 'index')->name('vendors.index');
            Route::get('/vendors/create', 'create')->name('vendors.create');
            Route::post('/vendors/create/store', 'store')->name('vendors.store');
            Route::get('/vendors/edit/{id}', 'edit')->name('vendors.edit');
            Route::put('/vendors/edit/update/{id}', 'update')->name('vendors.update');
            Route::get('/vendors/show/{id}', 'show')->name('vendors.show');
            Route::delete('/vendors/destroy/{id}', 'destroy')->name('vendors.destroy');
        });

    });
});

?>
