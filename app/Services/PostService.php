<?php
namespace App\Services;
use App\Models\Product;

class PostService
{
    
    public function storeProductData($request)
    {
        $data = [
            'pname'       => $request->pname,   
            'category_id' => $request->category_id,   
            'ptype'       => $request->ptype,   
            'quantity'    => $request->quantity,   
            'psize'       => $request->psize,   
        ];
        $column = ['*'];
        $whereFilter = ['pname' => $request->pname];
        $result = Product::getSingleData($column, $whereFilter);
        if(empty($result)){
            Product::create($data);
            return response()->json([
                'status' => true,
                'message' => 'Product Created Successfully',
            ], 200);
        }else{
            return response()->json([
                'status' => true,
                'message' => 'Product Name already taken',
            ], 201);
        }
    }
}

?>