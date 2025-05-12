<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderPhoto;
use Illuminate\Http\Request;

class OrderPhotosController extends Controller
{
    /**
     * Store a newly uploaded photo for the given order.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $orderId
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $orderId)
    {
        // Validate the uploaded photo and photo type
        $request->validate([
            'photo' => 'required|image|max:10240', // Image max size of 10MB
            'photo_type' => 'required|in:loaded,delivered', // Only 'loaded' or 'delivered'
        ]);

        // Find the order by ID
        $order = Order::findOrFail($orderId);

        // Store the photo in the public directory
        $photoPath = $request->file('photo')->store('order_photos', 'public');

        // Create the new photo record in the database
        OrderPhoto::create([
            'order_id' => $order->id,
            'photo_path' => $photoPath,
            'photo_type' => $request->input('photo_type'),
        ]);

        // Redirect back to the order page with a success message
        return redirect()->route('orders.show', $orderId)->with('success', 'Photo uploaded successfully!');
    }
}
