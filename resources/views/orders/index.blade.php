<!-- resources/views/orders/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Orders</h1>
        <a href="{{ route('orders.create') }}" class="btn btn-primary">Create Order</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Invoice Number</th>
                    <th>Customer Name</th>
                    <th>Status</th>
                    <th>User</th>
                    <th>Photos</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->invoice_number }}</td>
                        <td>{{ $order->customer_name }}</td>
                        <td>{{ $order->status->status_name }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>
                            @foreach ($order->photos as $photo)
                                <img src="{{ Storage::url($photo->photo_path) }}" alt="Order Photo" width="100">
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
