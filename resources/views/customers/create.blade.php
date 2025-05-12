@extends('layouts.app')

@section('content')
    <h2>Add Customer</h2>
    <form method="POST" action="{{ route('customers.store') }}">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Customer Number</label>
            <input name="number" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Fiscal Data</label>
            <textarea name="fiscal_data" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label>Delivery Address</label>
            <input name="delivery_address" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection
    