<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;

class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usersCount = User::count();
        $ordersCount = Order::count();
        $profit = Order::where('status', '<>', Order::STATUS_NOT_PAID)->sum('total');
        return view('admin.index', compact('usersCount', 'ordersCount', 'profit'));
    }
}
