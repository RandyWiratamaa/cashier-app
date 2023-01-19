<?php

namespace App\Models;

use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Warehouse extends Model
{
    const UNAVAILABLE_PRODUCT = 0;

    use HasFactory;
    protected $fillable = [
        'batch_number', 'product_id', 'quantity', 'unit_id', 'purchase_price', 'date_of_entry', 'expired_date'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function isUnavailable()
    {
        return $this->quantity == Warehouse::UNAVAILABLE_PRODUCT;
    }

    public function subtractionStock($batch_number, $quantity)
    {
        $stock = Warehouse::where('batch_number', $batch_number)->first();
        $stock->update([
            'quantity' => $stock->quantity - $quantity
        ]);
    }
}
