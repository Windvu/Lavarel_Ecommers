<?php

namespace App\Http\Controllers\admin;
use App\Models\Brands;
use App\Models\ProductImage;
use App\Models\Images;
use App\Models\Products;
use App\Models\Category;
use App\Models\SubCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Exists;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Products::query();

        if(!empty($request->keyword)){
            $products->where('title','like','%'.$request->keyword.'%');
        }
        
         // Corrected relationship name to 'productImages'
        $products = $products->with('productImages')->paginate(10);
        return view('admin.products.index', ['products' => $products]);
    }

    public function create()
    {
        $data=[];
        $data['categories'] = Category::orderBy('name','asc')->get();
        $data['brands'] = Brands::orderBy('name','asc')->get();
        return view('admin.products.create', $data);
    }

    public function store(Request $request)
    {

        // dd($request->image_array); 
        // exit();
        $validator= Validator::make($request->all(),[
            'title' => 'required',
            'slug' => 'required|unique:products',
            'price' => 'required|numeric',
            'is_featured' => 'required|in:Yes,No',
            'sku' => 'required',
            'brand_id' => 'required|integer',
            'category' => 'required|integer',
            'sub_category' => 'required|integer',
            //'track_qty' => 'required|in:Yes,No',    
        ]);

        if(!empty($request->track_qty) && $request->track_qty == 'Yes'){
            $validator->addRules([
                'qty' => 'required|integer'
            ]);
        }

        if($validator->passes()){
            $product = new Products();
            $product->title = $request->title;
            $product->slug = $request->slug;
            $product->description = $request->description;
            $product->price = $request->price; 
            $product->compare_price = $request->compare_price;
            $product->category_id = $request->category;
            $product->brand_id = $request->brand_id;
            $product->sub_category_id = $request->sub_category;
            $product->is_featured = $request->is_featured;
            $product->sku = $request->sku;
            $product->barcode = $request->barcode;
            $product->track_qty = $request->track_qty;
            $product->qty = $request->qty;
            $product->status = $request->status;
            $product->save();

            //Save product images
            if(!empty($request->image_array)){
                foreach($request->image_array as $temp_image_id){
                    $tempImage = Images::find($temp_image_id);
                    //$extArray = explode('.',$tempImage->name);//separate when find dot
                    //$ext = last($extArray);

                    $productImage = new ProductImage();
                    $productImage->product_id = $product->id;
                    $productImage->image = $tempImage->name;
                    $productImage->save();


                }
            }
            return response()->json([
                'status' => true,
                'messege' => 'Product created successfully'
            ]);
        }else{
            return response()->json([
                'status' => false,
                'error' => $validator->errors()
            ]);
        }
    }

    public function edit($id)
    {
        $data=[];
        $data['products'] = Products::find($id);
        $data['categories'] = Category::orderBy('name','asc')->get();
        $data['subcategories'] = SubCategory::where('category_id',$data['products']->category_id)->orderBy('name','asc')->get();
        $data['brands'] = Brands::orderBy('name','asc')->get();
        $data['productImages'] = ProductImage::where('product_id',$id)->get();
        foreach($data['productImages'] as $productImage){
            $data['tempImages'][] = Images::where('name',$productImage->image)->first();
        }
        return view('admin.products.edit', $data);
    }

    public function update($idProduct, Request $request){
        $validator= Validator::make($request->all(),[
            'title' => 'required',
            'slug' => 'required|unique:products',
            'price' => 'required|numeric',
            'is_featured' => 'required|in:Yes,No',
            'sku' => 'required',
            'brand_id' => 'required|integer',
            'category' => 'required|integer',
            'sub_category' => 'required|integer',
            //'track_qty' => 'required|in:Yes,No',    
        ]);

        if(!empty($request->track_qty) && $request->track_qty == 'Yes'){
            $validator->addRules([
                'qty' => 'required|integer'
            ]);
        }

        if($validator->passes()){
            $product = Products::find($idProduct);
            $product->title = $request->title;
            $product->slug = $request->slug;
            $product->description = $request->description;
            $product->price = $request->price; 
            $product->compare_price = $request->compare_price;
            $product->category_id = $request->category;
            $product->brand_id = $request->brand_id;
            $product->sub_category_id = $request->sub_category;
            $product->is_featured = $request->is_featured;
            $product->sku = $request->sku;
            $product->barcode = $request->barcode;
            $product->track_qty = $request->track_qty;
            $product->qty = $request->qty;
            $product->status = $request->status;
            $product->save();

            //Update product images
            $productImages = ProductImage:: where('product_id',$idProduct)->get();
            foreach($productImages as $productImage){
                $productImage->delete();
            }

            if(!empty($request->image_array)){
                foreach($request->image_array as $temp_image_id){
                    $tempImage = Images::find($temp_image_id);
                    
                    $productImage = new ProductImage();
                    $productImage->product_id = $product->id;
                    $productImage->image = $tempImage->name;
                   
                    $productImage->save();
                }
            }

            return response()->json([
                'status' => true,
                'messege' => 'Product updated successfully'
            ]);
        }else{
            return response()->json([
                'status' => false,
                'error' => $validator->errors()
            ]);
        }

    }

    //Delete product
    public function destroy($idProduct){
        $product = Products::find($idProduct);

    if (!$product) {
        return redirect()->route('products.index')->with('error', 'Product not found');
    }

    // Delete associated images from the database
    $productImages = ProductImage::where('product_id', $idProduct)->get();
    foreach ($productImages as $productImage) {
        // Construct the full path to the image
        $filePathProduct = public_path('temp/products/' . $productImage->image);
        $filePathCategory=public_path('temp/categories/'.$productImage->image);
        // Check if the file exists and delete it
        if (File::exists($filePathProduct)) {
            File::delete($filePathProduct);
        }
        if(File::exists($filePathCategory)){
            File::delete($filePathCategory);
        }

        // Delete the image record from the database
        $productImage->delete();
    }

    // Delete the product from the database
    $product->delete();

    return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
