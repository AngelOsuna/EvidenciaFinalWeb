<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Halcon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Halcon</a>
            <div>
                <a class="nav-link text-light" href="{{ route('customers.index') }}">Customers</a>
                <a class="nav-link text-light" href="{{ route('orders.index') }}">Orders</a>
                <a class="nav-link text-light" href="{{ route('invoices.search') }}">Invoice Lookup</a>
            </div>
        </div>
    </nav>
    
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
