<?php

namespace App\Models;

use App\Models\StockByOutlet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StockByOutlet extends Model
{
    use HasFactory;

    protected $fillable = [
        'batch_number', 'outlet_id', 'stock'
    ];

    public function additionStock($batch_number, $outlet, $quantity)
    {
        $dataIsNotExist = StockByOutlet::where([
            ['batch_number', $batch_number],
            ['outlet_id', $outlet]
            ])->count() == 0;
        if($dataIsNotExist){
            $data = StockByOutlet::create([
                'outlet_id' => $outlet,
                'batch_number' => $batch_number,
                'stock' => $quantity
            ]);
        } else {
            $stock = StockByOutlet::where([
                ['batch_number', $batch_number],
                ['outlet_id', $outlet]
                ])->first();
            $stock->update([
                'stock' => $stock->stock + $quantity
            ]);
        }
    }
}
