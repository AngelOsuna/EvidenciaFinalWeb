<!-- resources/views/orders/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Order</h1>
        <form action="{{ route('orders.update', $order->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="invoice_number">Invoice Number</label>
                <input type="text" name="invoice_number" id="invoice_number" class="form-control" value="{{ old('invoice_number', $order->invoice_number) }}">
            </div>

            <!-- Other fields for customer name, etc. -->

            <form action="{{ route('order_photos.store', $order->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="photo">Upload Photo</label>
                    <input type="file" name="photo" id="photo" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="photo_type">Photo Status</label>
                    <select name="photo_type" id="photo_type" class="form-control" required>
                        <option value="loaded">Loaded</option>
                        <option value="delivered">Delivered</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
        </form>
    </div>
@endsection
