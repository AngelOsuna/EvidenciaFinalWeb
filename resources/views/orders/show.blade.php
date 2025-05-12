<!-- resources/views/orders/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Order Details</h1>
        <p>Invoice Number: {{ $order->invoice_number }}</p>
        <p>Customer Name: {{ $order->customer_name }}</p>
        <p>Status: {{ $order->status->status_name }}</p>
        <p>Order Date: {{ $order->order_date }}</p>

        <h3>Photos</h3>
        <div class="row">
            @foreach ($order->photos as $photo)
                <div class="col-md-4">
                    <img src="{{ Storage::url($photo->photo_path) }}" alt="Order Photo" class="img-fluid">
                    <p>{{ $photo->photo_type }}</p>
                </div>
            @endforeach
        </div>

        <a href="{{ route('orders.index') }}" class="btn btn-primary mt-3">Back to Orders</a>
    </div>
@endsection
