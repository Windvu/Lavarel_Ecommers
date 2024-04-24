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
        $categoriesQuery = Category::query(); // Start a new query builder instance
        if (!empty($request->keyword)) {
            $categoriesQuery->where('name', 'like', '%' . $request->keyword . '%');
        }

        $categories = $categoriesQuery->paginate(10);
        return view('admin.categories.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:categories',
            'status' => 'required|integer'
            
        ]);

        $image = Images::find($request->id_image);
        

        // Create the category
        if ($validator->passes()) {

            $category = new Category();
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->status = $request->status;;
            $category->save();

            //Save Image here
            if (!empty($request->id_image)) {
                
                $category->image = $image->name;
                $category->save();

                
            } 

            return response()->json([
                'status' => true,                              
                'successs' => 'Input information successfully'
            ]);

            if (!empty($request->id_image)) {
                $response['id_image'] = $request->id_image;
            }

        } else {
            return response()->json([
                'status' => false,
                'error' => $validator->errors()
            ]);
        }
    }


    public function edit($idCategory, Request $request)
    {
        $category = Category::find($idCategory);
        return view('admin.categories.edit', compact('category'));
    }

    public function update($idCategory, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,' . $idCategory . ',id',
            'status' => 'required|integer',
                  
        ]);

        
        // Create the category
        if ($validator->passes()) {
            $category = Category::find($idCategory);
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->status = $request->status;;
            $category->save();

            //Save Image here
            if (!empty($request->id_image)) {   
                //echo $request->id_image;   
                $image = Images::find($request->id_image); 
                $category->image = $image->name;
                $category->save();     
            }

            return response()->json([
                'status' => true,                              
                'successs' => 'Udpate information successfully'
            ]);


        } else {
            return response()->json([
                'status' => false,
                'error' => $validator->errors()
            ]);
        }
    }
    public function destroy($idCategory, Request $request)
    {
        $category = Category::find($idCategory);
        $category->delete();
        return redirect()->route('categories.index');

    }
}
