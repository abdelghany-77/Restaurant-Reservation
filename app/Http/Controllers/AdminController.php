<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use App\Models\Order;


class AdminController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalUsers = User::where('role', 'user')->count();
        // $totalOrders = Order::count();

        return view('admin.index', compact('totalProducts', 'totalUsers', 'totalOrders'));
    }
}
