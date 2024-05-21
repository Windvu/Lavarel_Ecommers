<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandsController extends Controller
{

    public function index(Request $request){
        $brands = Brands::query();
        if(!empty($request->keyword)){
            $brands->where('name','like','%'.$request->keyword.'%');
        }
        $brands = $brands->paginate(10);

        
        return view('admin.brands.index',['brands'=>$brands]);
    }

    public function create(){
        return view('admin.brands.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:brands',
            'status' => 'required|integer'
        ]);

        if($validator->passes()){
            $brands= new Brands();
            $brands->name=$request->name;
            $brands->slug=$request->slug;
            $brands->status=$request->status;
            $brands->save();

            return response()->json([
                'status'=> true,
                'messege'=>'Add brands successfully'
            ]);
        }else{
            return response()->json([
                'status'=> false,
                'error'=> $validator->errors()
            ]);
        }
    }

    public function edit($idBrand, Request $request){
        $brand=Brands::find($idBrand);
        return view('admin.brands.edit',['brand'=>$brand]);
    }

    public function update($idBrand, Request $request){
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:brands,slug,'.$idBrand.',id',
            'status' => 'required|integer'
        ]);

        if($validator->passes()){
            $brand= Brands::find($idBrand);
            $brand->name=$request->name;
            $brand->slug=$request->slug;
            $brand->status=$request->status;
            $brand->save();

            return response()->json([
                'status'=> true,
                'messege'=>'Update brands successfully'
            ]);
        }else{
            return response()->json([
                'status'=> false,
                'error'=> $validator->errors()
            ]);
        }
    }


    public function destroy($idBrand){
        $brand=Brands::find($idBrand);
        $brand->delete();
        return redirect()->route('brands.index')->with('success', 'Brand deleted successfully');
    }


}
