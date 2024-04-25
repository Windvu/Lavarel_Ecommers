<?php

use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\admin\HomeController;
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
        Route::get('/dashboard',[HomeController::class,'index'])->name('admin.dashboard');
        Route::get('/logout',[HomeController::class,'logout'])->name('admin.logout');
        //-----------------category-----------------

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


        //-----------------sub-category-----------------
        //sub-category list
        Route::get('/subcategories/index',[SubCategoryController::class,'index'])->name('subcategories.index');
        //sub-category store
        Route::get('/subcategories/create',[SubCategoryController::class,'create'])->name('subcategories.create');
        Route::post('/subcategories/store',[SubCategoryController::class,'store'])->name('subcategories.store');



    });
    
});



