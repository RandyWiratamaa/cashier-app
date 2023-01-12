<?php
namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

trait ApiResponser
{
    // Cara 1
    /**
        protected function successResponse($data, $message = null, $code = 200)
        {
            return response()->json([
                'status'=> 'Success',
                'message' => $message,
                'data' => $data
            ], $code);
        }
        protected function errorResponse($message = null, $code)
        {
            return response()->json([
                'status'=>'Error',
                'message' => $message,
                'data' => null
            ], $code);
        }
    */

    // Cara 2
    private function successResponse($data, $code)
    {
        return response()->json($data, $code);
    }

    protected function errorResponse($message, $code)
    {
        return response()->json(['error' => $message, 'code' => $code], $code);
    }

    protected function showAll(Collection $collection, $code = 200)
    {
        return $this->successResponse(['data' => $collection], $code);
    }

    protected function showOne(Model $model, $code = 200)
    {
        return $this->successResponse(['data' => $model], $code);
    }
}
