<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'check_in_date',
        'check_out_date',
        'adults',
        'children',
        'status',
        'location',
        'price',
    ];

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
