<!-- resources/views/orders/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Order</h1>
        <form action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Other form fields here -->
            
            <div class="form-group">
                <label for="order_photos">Upload Photos</label>
                <input type="file" name="order_photos[]" id="order_photos" class="form-control" multiple>
            </div>

            <button type="submit" class="btn btn-success mt-3">Create Order</button>
        </form>
    </div>
@endsection
