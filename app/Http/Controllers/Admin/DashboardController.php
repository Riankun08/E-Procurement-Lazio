<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Testimonial;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::count();
        $order = Order::count();
        $product = Product::count();
        $testimonial = Testimonial::count();
        $title = "Dashboard";
        return view('admin.dashboard.index' , compact('title' ,  'user' , 'testimonial' , 'product', 'order'));
    }
}
