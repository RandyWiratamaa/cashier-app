<?php

namespace App\Http\Controllers\Api;

use App\Models\Warehouse;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class WarehouseController extends ApiController
{
    public function index()
    {
        $data = Warehouse::with('product')->get();
        return $this->showAll($data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'batch_number' => 'required',
            'quantity' => 'required',
            'purchase_price' => 'required',
            'date_of_entry' => 'required',
            'expired_date' => 'required',
        ]);

        $data = Warehouse::create([
            'batch_number' => $request->batch_number,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'unit_id' => $request->unit_id,
            'purchase_price' => $request->purchase_price,
            'date_of_entry' => $request->date_of_entry,
            'expired_date' => $request->expired_date,
        ]);

        return $this->showOne($data);
    }
}
