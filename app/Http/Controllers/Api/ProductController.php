<?php

namespace App\Http\Controllers\Api;

use Validator;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequestValidation;
use App\Services\PostService;

class ProductController extends Controller
{
    public function store(ProductRequestValidation $request){
        try{
            $result = app()->make(PostService::class)->storeProductData($request);
            return $result;
        }catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
