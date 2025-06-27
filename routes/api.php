<?php

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('product')
    ->group(function () {
        Route::get('/test', function () {
            return 'Hello World';
        });

        Route::post('/create', function (Request $request) {

            try {
                $product = Product::create(
                    [
                        'name' => $request->name,
                        'description' => $request->description,
                        'price' => $request->price,
                        'stock' => $request->stock,
                    ]
                );

                return response()->json(
                    [
                        'message' => 'Product created Successfully',
                        'data' => $product,
                    ],
                    201,
                );
            } catch (\Throwable $th) {
                return response()->json(
                    [
                        'message' => 'Some error occure',
                        'error' => $th
                    ],
                    400,
                );
            }
        });

        Route::put('/update', function (Request $request) {
            try {
                return response()->json([
                    'message' => 'Product updated Successfully',
                    'updated_data' => $request->all(),
                ], 200);
            } catch (\Throwable $th) {
                return response()->json(
                    [
                        'message' => 'Some error occure !',
                        'error' => $th
                    ],
                    400,
                );
            }
        });

        Route::delete('/delete/{id}', function ($id) {
            try {
                return response()->json([
                    'message' => 'Product deleted Successfully',
                    'id' => $id,
                ], 200);
            } catch (\Throwable $th) {
                return response()->json(
                    [
                        'message' => 'Some error occure !!',
                        'error' => $th
                    ],
                    400,
                );
            }
        });
    });
