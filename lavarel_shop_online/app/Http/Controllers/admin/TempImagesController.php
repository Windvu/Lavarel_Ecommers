<?php

namespace App\Http\Controllers\admin;
use App\Models\Images;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TempImagesController extends Controller
{
    public function create(Request $request){
        $image =  $request->image; // Get the uploaded file
        if(!empty($image)){
            $ext = $image->getClientOriginalExtension(); // Corrected method name
            $newName = time().'.'.$ext;
    
            $tempImage = new Images();
            $tempImage->name=$newName;
            $tempImage->save();
    
            $image->move(public_path().'/temp', $newName); // Added a comma to separate the arguments
    
            return response()->json([
                "status"=>true,
                "Id_image"=>$tempImage->id,
                "message"=>"Upload image successfully"
            ]);
        }
    }
}