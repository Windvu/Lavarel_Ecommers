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
        $subCategories = DB::table('sub_categories as sub')
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
            'slug'=>'required|unique:sub_categories',
            'status'=>'required|integer',
            'id_category'=>'required|integer|min:1'
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
                'message'=>'Sub Category created successfully'
            ]);
        }else{
            return response()->json([
                'status' => false,
                'error' => $validator->errors()
            ]);
        }
    }

    public function edit($id){
        
    }   
     
    public function update(Request $request, $id){
        
    }   

    public function destroy($id){
        
    }   

}
