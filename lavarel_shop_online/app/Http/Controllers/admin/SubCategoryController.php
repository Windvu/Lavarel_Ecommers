<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    public function index(Request $request){
        $subCategories = DB::table('sub_category as sub')
            ->join('categories as cate', 'cate.id', '=', 'sub.category_id')
            ->select('sub.id', 'sub.name', 'sub.slug', 'cate.name as category_name', 'sub.status')
            ->orderBy('sub.id', 'asc');
            
        if (!empty($request->keyword)) {
            $subCategories->where('sub.name', 'like', '%' . $request->keyword . '%');
        }

        $subCategory = $subCategories->paginate(10);
        return view('admin.subCategories.index', ['subCategories' => $subCategory]);
    }

    public function create(){
        $category=Category::orderBy('name','asc')->get();
        $data['categories']=$category;       
        return view('admin.subCategories.create',$data);
    }

    public function store(Request $request){
        $validator=Validator::make($request->all(),[
            'name'=>'required',
            'slug'=>'required|unique:sub_category',
            'status'=>'required|integer',
            'id_category'=>'required|integer'
        ]);

        if($validator->passes()){
            $subCategory=new SubCategory();
            $subCategory->name=$request->name;
            $subCategory->slug=$request->slug;
            $subCategory->status=$request->status;
            $subCategory->category_id=$request->id_category;
            $subCategory->save();
            return response()->json([
                'status'=>true,
                'messege'=>'Sub Category created successfully'
            ]);
        }else{
            return response()->json([
                'status' => false,
                'error' => $validator->errors()
            ]);
        }
    }

    public function edit($idSub){
        $subCategory=SubCategory::find($idSub);
        $category=Category::orderBy('name','asc')->get();
        $data['categories']=$category;
        return view('admin.subCategories.edit',['subCategory'=>$subCategory],$data);
    }   
     
    public function update(Request $request, $idSub){
        $validator=Validator::make($request->all(),[
            'name'=>'required',
            'slug'=>'required|unique:sub_category,slug,'.$idSub.',id',
            'status'=>'required|integer',
            'id_category'=>'required|integer|min:1'
        ]);

        if($validator->passes()){
            $subCategory=SubCategory::find($idSub);
            $subCategory->name=$request->name;
            $subCategory->slug=$request->slug;
            $subCategory->status=$request->status;
            $subCategory->category_id=$request->id_category;
            $subCategory->save();
            return response()->json([
                'status'=>true,
                'message'=>'Sub Category updated successfully'
            ]);
        }else{
            return response()->json([
                'status' => false,
                'error' => $validator->errors()
            ]);
        } 
    }  

    public function destroy($idSub){
        $subCategory=SubCategory::find($idSub);
        $subCategory->delete();
        return redirect()->route('subcategories.index')->with('success', 'Sub-category deleted successfully') ;
    }   

}
