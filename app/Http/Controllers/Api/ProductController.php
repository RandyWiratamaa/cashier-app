<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class ProductController extends ApiController
{
    public function index()
    {
        $data = Product::with('category_product', 'variation_product')->get();
        return $this->showAll($data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'category_id' => 'required',
            'variation_id' => 'required',
        ]);

        $data = Product::create([
            'barcode' => $request->barcode,
            'name' => $request->name,
            'category_id' => $request->category_id,
            'variation_id' => $request->variation_id,
            'description' => $request->description,
            'image' => $request->image,
        ]);
        return $this->showOne($data);
    }

    public function show($id)
    {
        $data = Product::with('category_product', 'variation_product')->firstWhere('id', $id);
        if($data == null) {
            return $this->errorResponse('Data Not Found !', 404);
        } else {

            return $this->showOne($data);
        }
    }

    public function destroy($id)
    {
        $data = Product::findOrFail($id);
        $data->delete();
        return $this->showOne($data);
    }
}
