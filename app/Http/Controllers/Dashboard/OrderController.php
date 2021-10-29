<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('dashboard.orders.index')->with([
           'orders' => Order::latest()->paginate(),
        ]);
    }

    public function show(Order $order)
    {
        return view('dashboard.orders.show')->with([
            'order' => $order,
        ]);
    }
}
