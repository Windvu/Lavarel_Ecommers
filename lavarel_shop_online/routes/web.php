<?php

use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\BrandsController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ProductSubCategoryController;
use App\Http\Controllers\admin\TempImagesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group (['prefix' => 'admin'], function () {
    //if login, you can't access login page
    Route::group(['middleware' => 'admin.guest'], function () {
        Route::get('/login', [AdminLoginController::class,'index'])->name('admin.login');
        Route::post('/authenticate', [AdminLoginController::class,'authenticate'])->name('admin.authenticate');
    });

    //if not login, you can't access dashboard
    Route::group(['middleware' => 'admin.auth'], function () {
        //-----------------Home-----------------
        Route::get('/dashboard',[HomeController::class,'index'])->name('admin.dashboard');
        Route::get('/logout',[HomeController::class,'logout'])->name('admin.logout');

        //-----------------Category-----------------
        //category list
        Route::get('/categories/index',[CategoryController::class,'index'])->name('categories.index');
        //category image
        Route::post('/upload-temp-image',[TempImagesController::class,'create'])->name('temp-images.create');
        //category store
        Route::get('/categories/create',[CategoryController::class,'create'])->name('categories.create');
        Route::post('/categories/store',[CategoryController::class,'store'])->name('categories.store');

        Route::get('/getSlug', function (Request $request){
            $slug='';
            if(!empty($request->title)){
                $slug = Str::slug($request->title);

            }

            return response()->json([
                'status'=> true,
                'slug' => $slug
            ]);
        })->name('getSlug');

        //category update
        Route::get('/categories/edit/{idCategory}',[CategoryController::class,'edit'])->name('categories.edit');
        Route::post('/categories/update/{idCategory}',[CategoryController::class,'update'])->name('categories.update');

        //category delete
        Route::get('/categories/delete/{idCategory}',[CategoryController::class,'destroy'])->name('categories.delete');



        //-----------------Sub-category-----------------
        //sub-category list
        Route::get('/subcategories/index',[SubCategoryController::class,'index'])->name('subcategories.index');
        //sub-category store
        Route::get('/subcategories/create',[SubCategoryController::class,'create'])->name('subcategories.create');
        Route::post('/subcategories/store',[SubCategoryController::class,'store'])->name('subcategories.store');
        //sub-category update
        Route::get('/subcategories/edit/{idSub}',[SubCategoryController::class,'edit'])->name('subcategories.edit');
        Route::post('/subcategories/update/{idSub}',[SubCategoryController::class,'update'])->name('subcategories.update');
        //sub-category delete
        Route::get('/subcategories/delete/{idSub}',[SubCategoryController::class,'destroy'])->name('subcategories.delete');

        //-----------------Brands-----------------
        //brands list
        Route::get('/brands/index',[BrandsController::class,'index'])->name('brands.index');
        //brands store
        Route::get('/brands/create',[BrandsController::class,'create'])->name('brands.create');
        Route::post('/brands/store',[BrandsController::class,'store'])->name('brands.store');
        //brands update
        Route::get('/brands/edit/{idBrand}',[BrandsController::class,'edit'])->name('brands.edit');
        Route::post('/brands/update/{idBrand}',[BrandsController::class,'update'])->name('brands.update');
        //brands delete
        Route::get('/brands/delete/{idBrand}',[BrandsController::class,'destroy'])->name('brands.delete');

        //-----------------Products-----------------
        //products store
        Route::get('/products/create',[ProductController::class,'create'])->name('products.create');
        Route::get('/products/sub_category',[ProductSubCategoryController::class,'index'])->name('productSubCategory.index');
        Route::post('/products/store',[ProductController::class,'store'])->name('products.store');
        //products list
        Route::get('/products/index',[ProductController::class,'index'])->name('products.index');
        //products update
        Route::get('/products/edit/{idProduct}',[ProductController::class,'edit'])->name('products.edit');
        Route::post('/products/update/{idProduct}',[ProductController::class,'update'])->name('products.update');
        //product delete
        Route::get('/products/delete/{idProduct}',[ProductController::class,'destroy'])->name('products.delete');

    });
    
});



