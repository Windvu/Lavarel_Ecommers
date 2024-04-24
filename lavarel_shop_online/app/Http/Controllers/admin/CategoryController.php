<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Images;
use Illuminate\Support\Facades\Validator;
class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categoriesQuery=Category::query(); // Start a new query builder instance
        if(!empty($request->keyword)){
            $categoriesQuery->where('name','like','%'.$request->keyword.'%');
        }

        $categories=$categoriesQuery->paginate(10);
        return view('admin.categories.index',['categories'=>$categories]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {

        $validator= Validator::make($request->all(),[
            'name' => 'required',
            'slug' => 'required|unique:categories', 
            'status'=>'required|integer',
            'id_image'=>'required'
        ]);

        $image = new Images();
        $image->name = $request;

        // Create the category
        if($validator->passes()){
            
            $category = new Category();
            $category -> name = $request -> name;
            $category -> slug = $request -> slug;
            $category -> status =$request -> status;;
            $category -> save();

            //Save Image here
            if(!empty($request->id_image)){
                $image = Images::find($request->id_image);
                $category->image = $image->name;
                $category->save();
            }





            return response()->json([
                'status'=>true,
                'id_message'=>$category->image,
                'successs'=>'Input information successfully'
            ]);

            
    
        }else{
            return response()->json([
                'status'=>false,
                'error'=>$validator->errors()
            ]);
        }
    
    }
    

    public function edit()
    {
        
    }

    public function update(Request $request)
    {
        
    }

    public function destroy()
    {
        
    }
}
