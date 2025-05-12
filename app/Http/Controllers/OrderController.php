<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\OrderStatus;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Show all orders
    public function index()
    {
        $orders = Order::with('user', 'status')->get(); // Eager load the user and status relationships
        return view('orders.index', compact('orders'));
    }

    // Show the form to create a new order
    public function create()
    {
        $users = User::all();
        $statuses = OrderStatus::all();
        return view('orders.create', compact('users', 'statuses'));
    }

    // Store a newly created order in the database
    public function store(Request $request)
    {
        $request->validate([
            'invoice_number' => 'required|unique:orders',
            'customer_name' => 'required',
            'customer_number' => 'required|unique:orders',
            'fiscal_data' => 'required',
            'order_date' => 'required|date',
            'delivery_address' => 'required',
            'status_id' => 'required|exists:order_statuses,id',
            'user_id' => 'required|exists:users,id',
            'order_photos' => 'nullable|array',
            'order_photos.*' => 'image|max:2048', // Validate each uploaded photo
        ]);

        // Create the order
        $order = Order::create($request->except('order_photos'));

        // Handle photo uploads if any
        if ($request->has('order_photos')) {
            foreach ($request->file('order_photos') as $photo) {
                $path = $photo->store('order_photos', 'public');
                $order->photos()->create([
                    'photo_path' => $path,
                    'photo_type' => 'loaded', // Default type for new photos
                ]);
            }
        }

        return redirect()->route('orders.index')->with('success', 'Order created successfully!');
    }



    // Show the form to edit an order
    public function edit(Order $order)
    {
        $users = User::all();
        $statuses = OrderStatus::all();
        return view('orders.edit', compact('order', 'users', 'statuses'));
    }

    // Update an existing order
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'invoice_number' => 'required|unique:orders,invoice_number,' . $order->id, // Allow the current invoice number
            'customer_name' => 'required',
            'customer_number' => 'required|unique:orders,customer_number,' . $order->id,
            'fiscal_data' => 'required',
            'order_date' => 'required|date',
            'delivery_address' => 'required',
            'status_id' => 'required|exists:order_statuses,id',
            'user_id' => 'required|exists:users,id',
            'order_photos' => 'nullable|array',
            'order_photos.*' => 'image|max:2048', // Validate each uploaded photo
        ]);

        // Update the order
        $order->update($request->except('order_photos'));

        // Handle photo uploads if any
        if ($request->has('order_photos')) {
            foreach ($request->file('order_photos') as $photo) {
                $path = $photo->store('order_photos', 'public');
                $order->photos()->create([
                    'photo_path' => $path,
                    'photo_type' => 'loaded', // Default type for new photos
                ]);
            }
        }

        return redirect()->route('orders.index')->with('success', 'Order updated successfully!');
    }





    // Delete an order
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully!');
    }
}
