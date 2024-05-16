<?php

namespace App\Http\Controllers\admin;

use App\Models\SubCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class ProductSubCategoryController extends Controller
{
    public function index(Request $request){  
        if(!empty($request->category_id)){
            $subcategories = SubCategory :: where('category_id', $request->category_id)
            ->orderBy('name','asc')
            ->get();

            return response()->json([
                'status'=>true,
                'data'=>$subcategories
            ]);
        }else{
            return response()->json([
                'status'=>false,
                'data'=>[]
            ]);
        }    
        

       
    }
}
