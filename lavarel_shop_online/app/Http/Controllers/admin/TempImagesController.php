<?php

namespace App\Http\Controllers\admin;
use App\Models\Images;
use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
class TempImagesController extends Controller
{
    //Upload image for category
    public function create(Request $request){
        $image =  $request->image; // Get the uploaded file
        if(!empty($image)){
            $ext = $image->getClientOriginalExtension(); // Corrected method name
            $newName = time().uniqid().'.'.$ext;  
            $tempImage = new Images();
            $tempImage->name=$newName;
            $tempImage->save();
            
            // Move the image to the categories directory
            if ($image->move(public_path().'/temp/categories', $newName)) {
                // If move successful, copy the image to the products directory
                copy(public_path().'/temp/categories/'.$newName, public_path().'/temp/products/'.$newName);
                
                return response()->json([
                    "status"=>true,
                    "Id_image"=>$tempImage->id,         
                    "ImagePath"=>asset('temp/products/'.$newName),      
                    "message"=>"Upload image category successfully"
                ]);
            } else {
                // If move failed, return an error response
                return response()->json([
                    "status"=>false,
                    "message"=>"Failed to move image to categories directory"
                ], 500); // 500 Internal Server Error
            }
        }
    }

    
}