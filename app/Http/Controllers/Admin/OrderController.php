<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        // Alle orders ophalen, inclusief de gebruiker die bestelde
        $orders = Order::with('user')->latest()->get();

        return view('admin.orders.index', compact('orders'));
    }
}

