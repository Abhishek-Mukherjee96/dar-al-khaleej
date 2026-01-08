<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'product_id';

    protected $fillable = [
        'category_id',
        'product_name',
        'slug',
        'description',
        'specifications',
        'key_features',
        'thumbnail',
        'rental_type',
        'available_for',
        'rental_duration',
        'conditions',
        'status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function images()
    {
        return $this->hasMany(Gallery::class, 'product_id', 'product_id');
    }
}
