<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\VariationProduct;
use App\Http\Controllers\ApiController;

class VariationProductController extends ApiController
{
    public function index()
    {
        $data = VariationProduct::all();
        return $this->showAll($data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);
        $data = VariationProduct::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return $this->showOne($data);
    }

    public function show($id)
    {
        $data = VariationProduct::firstWhere('id', $id);
        if($data == null) {
            return $this->errorResponse('Data Not Found !', 404);
        } else {

            return $this->showOne($data);
        }
    }

    public function destroy($id)
    {
        $data = VariationProduct::findOrFail($id);
        $data->delete();
        return $this->showOne($data);
    }
}
