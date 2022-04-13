<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;

class productCategoryController extends Controller
{
    public function all(request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit');
        $name = $request->input('name'); 
        $show_product = $request->input('show_product');

        if($id)
        {
            $category = ProductCategory::with(['products'])->find($id);
       
            if($category)
            {
                return ResponseFormatter::success($category,'data category berhasil di ambil');
                
            } else{
                return ResponseFormatter::error(null,'data category tidak ada', 484);
                
            }
        } 

        $category = ProductCategory::query();

        if($name){
            $category->where('name','like','%' .$name . '%');
        }

        if($show_product){
            $category->with('products');
        }

        return ResponseFormatter::success($category->paginate($limit),'data category berhasil di ambil');
    }
}
