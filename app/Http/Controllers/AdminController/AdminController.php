<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Fetch dashboard statistics
        $totalUsers = User::count();
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $totalRevenue = Order::sum('total_amount'); // Assuming total_amount column exists

        return view('admin.dashboard', compact('totalUsers', 'totalProducts', 'totalOrders', 'totalRevenue'));
    }
}