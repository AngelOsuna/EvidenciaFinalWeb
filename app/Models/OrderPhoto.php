<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderPhoto extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'photo_path', 'photo_type'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}

