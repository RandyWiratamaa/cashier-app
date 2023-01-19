<?php

namespace App\Http\Controllers\Api;

use App\Models\Warehouse;
use Illuminate\Http\Request;
use App\Models\StockMutation;
use App\Http\Controllers\ApiController;

class StockMutationController extends ApiController
{
    public function index()
    {
        $data = StockMutation::with(['warehouse', 'outlet'])->get();
        return $this->showAll($data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'batch_number' => 'required',
            'quantity' => 'required',
            'outlet_id' => 'required',
            'date' => 'required',
            'documentation' => 'required'
        ]);

        $stock_mutation = new StockMutation();
        $warehouse = new Warehouse();
        // return $request->batch_number;
        // return $stock_mutation->checkProductIfNotExist($request->batch_number);

        if($stock_mutation->checkProductIfNotExist($request->batch_number)) {
            return $this->errorResponse(StockMutation::NOT_FOUND, 404);
        } else {
            $data = StockMutation::create([
                'batch_number' => $request->batch_number,
                'quantity' => $request->quantity,
                'outlet_id' => $request->outlet_id,
                'date' => $request->date,
                'documentation' => $request->documentation,
            ]);
            if($data) {
                $warehouse->subtractionStock($request->batch_number, $request->quantity);
                return $this->showOne($data);
            }
        }
    }
}
