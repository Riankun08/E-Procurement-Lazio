<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\Testimonial;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::count();
        $product = Product::count();
        $vendor = Vendor::count();
        $title = "Dashboard";
        return view('admin.dashboard.index' , compact('title' ,  'user' , 'product' , 'vendor'));
    }
}
