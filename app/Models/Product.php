<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'product_name', 'description', 'price', 'stock', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
