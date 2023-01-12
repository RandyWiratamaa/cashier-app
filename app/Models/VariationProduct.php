<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariationProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'description'
    ];

    public function product()
    {
        return $this->hasMany(Product::class, 'variation_id', 'id');
    }
}
