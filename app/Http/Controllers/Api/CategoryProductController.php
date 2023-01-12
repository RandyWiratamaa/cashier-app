<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\CategoryProduct;
use App\Http\Controllers\ApiController;

class CategoryProductController extends ApiController
{
    public function index()
    {
        $data = CategoryProduct::all();
        return $this->showAll($data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:4',
        ]);
        $data = CategoryProduct::create([
            'name' =>$request->name,
        ]);
        return $this->showOne($data);
    }

    public function show($id)
    {
        $data = CategoryProduct::firstWhere('id', $id);
        if($data == null) {
            return $this->errorResponse('Data Not Found !', 404);
        } else {

            return $this->showOne($data);
        }
    }

    public function destroy($id)
    {
        $data = CategoryProduct::findOrFail($id);
        $data->delete();

        return $this->showOne($data);
    }
}
