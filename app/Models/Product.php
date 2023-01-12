<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'barcode', 'name', 'category_id', 'variation_id', 'description', 'image'
    ];

    public function warehouse()
    {
        return $this->hasMany(Warehouse::class, 'product_id', 'id');
    }

    public function category_product()
    {
        return $this->belongsTo(CategoryProduct::class, 'category_id', 'id');
    }

    public function variation_product()
    {
        return $this->belongsTo(VariationProduct::class, 'variation_id', 'id');
    }
}
