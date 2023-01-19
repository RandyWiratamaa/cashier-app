<?php

namespace App\Models;

use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StockMutation extends Model
{
    const NOT_FOUND = "Data Not Found";

    use HasFactory;

    protected $fillable = [
        'batch_number', 'quantity', 'outlet_id', 'date', 'documentation'
    ];

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'batch_number', 'batch_number');
    }

    public function outlet()
    {
        return $this->belongsTo(Outlet::class, 'outlet_id', 'id');
    }

    public function checkProductIfNotExist($batch_number)
    {
        $count = Warehouse::where('batch_number', $batch_number)->count() == 0;
        if($count) {
            return StockMutation::NOT_FOUND;
        }
    }

    // public function stockIfNotEnough($quantity)
    // {
    //     $stock = Warehouser::all();

    // }
}
