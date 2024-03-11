<?php
namespace App\Services;
use App\Models\Category;

class CategoryService
{
    
    public function storeCategory($request)
    {
        $data = [
            'category_name' => $request->category_name,   
            'status'        => 1,   
        ];
        $column = ['*'];
        $whereFilter = ['category_name' => $request->category_name];
        $result = Category::getSingleData($column, $whereFilter);
        if(empty($result)){
            Category::create($data);
            return response()->json([
                'status' => true,
                'message' => 'Category Created Successfully',
            ], 200);
        }else{
            return response()->json([
                'status' => true,
                'message' => 'Category Name already taken',
            ], 201);
        }
    }
}

?>