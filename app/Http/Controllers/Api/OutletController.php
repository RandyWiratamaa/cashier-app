<?php

namespace App\Http\Controllers\Api;

use App\Models\Outlet;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class OutletController extends ApiController
{
    public function index()
    {
        $data = Outlet::all();
        return $this->showAll($data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'address_detail' => 'required',
            'postal_code' => 'required|min:4',
            'phone_number' => 'required|min:6',
        ]);

        $data = Outlet::create([
            'name' => $request->name,
            'province_id' => $request->province_id,
            'regency_id' => $request->regency_id,
            'district_id' => $request->district_id,
            'village_id' => $request->village_id,
            'address_detail' => $request->address_detail,
            'postal_code' => $request->postal_code,
            'phone_number' => $request->phone_number,
        ]);

        return $this->showOne($data);
    }
}
