<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductEnquiry extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'name',
        'email',
        'phone',
        'message',
        'rental_duration',
        'available_for'
    ];
}
