<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UnitController;
use App\Http\Controllers\Api\OutletController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\WarehouseController;
use App\Http\Controllers\Api\PassportAuthController;
use App\Http\Controllers\Api\StockMutationController;
use App\Http\Controllers\Api\CategoryProductController;
use App\Http\Controllers\Api\VariationProductController;


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('get-user', [PassportController::class, 'userInfo']);
});
Route::get('category-products', [CategoryProductController::class, 'index']);
Route::post('category-product', [CategoryProductController::class, 'store']);
Route::get('category-product/{id}', [CategoryProductController::class, 'show']);
Route::delete('category-product/{id}', [CategoryProductController::class, 'destroy']);

Route::get('variation-products', [VariationProductController::class, 'index']);
Route::post('variation-product', [VariationProductController::class, 'store']);
Route::get('variation-product/{id}', [VariationProductController::class, 'show']);
Route::delete('variation-product/{id}', [VariationProductController::class, 'destroy']);

Route::get('products', [ProductController::class, 'index']);
Route::post('product', [ProductController::class, 'store']);
Route::get('product/{id}', [ProductController::class, 'show']);
Route::delete('product/{id}', [ProductController::class, 'destroy']);

Route::get('units', [UnitController::class, 'index']);
Route::post('unit', [UnitController::class, 'store']);

Route::get('warehouses', [WarehouseController::class, 'index']);
Route::post('warehouse', [WarehouseController::class, 'store']);

Route::get('outlets', [OutletController::class, 'index']);
Route::post('outlet', [OutletController::class, 'store']);

Route::get('stock-mutations', [StockMutationController::class, 'index']);
Route::post('stock-mutation', [StockMutationController::class, 'store']);
