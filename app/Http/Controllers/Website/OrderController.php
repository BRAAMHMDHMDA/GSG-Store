<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        return view('website.my-account#orders');
    }

    public function show(Order $order)
    {
        return view('website.shopping-proccess.order-complete')->with([
            'order' => $order,
        ]);
    }
}
