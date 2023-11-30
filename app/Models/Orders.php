<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table = "orders";

    protected $fillable = [
        'user_id',
        'waste_type',
        'waste_qty',
        'user_notes',
        'recycle_fee',
        'pickup_fee',
        'subtotal_fee',
        'order_status',
        'order_datetime',
        'pickup_datetime',
        'pickup_latitude',
        'pickup_longitude'
    ];

    public function user() 
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
