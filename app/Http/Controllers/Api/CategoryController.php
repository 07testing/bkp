<?php

namespace App\Http\Controllers\Api;

use Validator;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CtegoryRequestValidation;
use App\Services\CategoryService;


class CategoryController extends Controller
{
    public function store(CtegoryRequestValidation $request){
        try{
            $result = app()->make(CategoryService::class)->storeCategory($request);
            return $result;
        }catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
