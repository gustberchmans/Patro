<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Auth::user()->orders;
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'size' => 'required',
            'color' => 'required',
            'custom_name' => 'nullable|string|max:30',
            'quantity' => 'required|integer|min:1',
        ]);

        $price = 35 * $request->quantity; // vaste prijs per pull (voorbeeld)

        Order::create([
            'user_id' => Auth::id(),
            'product' => 'Pull',
            'size' => $request->size,
            'color' => $request->color,
            'custom_name' => $request->custom_name,
            'quantity' => $request->quantity,
            'price' => $price,
        ]);

        return redirect()->route('orders.index')->with('success', 'Bestelling geplaatst!');
    }
}
