@extends('layouts.app')

@section('content')
    <h2>Customers</h2>
    <a href="{{ route('customers.create') }}" class="btn btn-primary mb-3">Add Customer</a>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Number</th>
                <th>Fiscal Data</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
                <tr>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->number }}</td>
                    <td>{{ $customer->fiscal_data }}</td>
                    <td>{{ $customer->delivery_address }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
