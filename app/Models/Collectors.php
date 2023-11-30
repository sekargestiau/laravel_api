<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collectors extends Model
{
    use HasFactory;
    protected $table = "collectors";

    protected $fillable = [
        'user_id',
        'drop_latitude',
        'drop_longitude',
        'current_latitude',
        'current_longitude'
    ];

    public function user()
        {
        return $this->belongsTo(User::class, 'user_id');
        }
}
