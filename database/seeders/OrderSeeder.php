<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        Order::create([
            'invoice_number'   => 'INV001',
            'customer_name'    => 'Carlos Mendoza',
            'customer_number'  => 'CM123456',
            'fiscal_data'      => 'RFC123456789',
            'order_date'       => now(),
            'delivery_address' => 'Av. Reforma 100, CDMX',
            'notes'            => 'Entregar antes de las 12 PM',
            'status_id'        => 1, // Ordered
            'user_id'          => 2, // Sales User
        ]);
    }
}
