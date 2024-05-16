
@extends('admin.layouts.app')

@section('navbar')
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Right navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>					
        </ul>
        <div class="navbar-nav pl-2">
            <ol class="breadcrumb p-0 m-0 bg-white">
                <li class="breadcrumb-item"><a href="../product/index">Product</a></li>
                <li class="breadcrumb-item active"><a href="">Create</a></li>
            </ol>
        </div>
        
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link p-0 pr-3" data-toggle="dropdown" href="#">
                    <img src="{{asset('admin-asset/img/avatar5.png')}}" class='img-circle elevation-2' width="40" height="40" alt="">
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-3">
                    <h4 class="h4 mb-0"><strong>{{auth()->guard('admin')->User()->name}}</strong></h4>
                    <div class="mb-3">{{auth()->guard('admin')->User()->email}}</div>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-user-cog mr-2"></i> Settings								
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-lock mr-2"></i> Change Password
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{route('admin.logout')}}" class="dropdown-item text-danger">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout							
                    </a>							
                </div>
            </li>
        </ul>
    </nav>
@endsection

@section('sidebar')
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{route('admin.dashboard')}}" class="brand-link">
            <img src="{{asset('admin-asset/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">LARAVEL SHOP</span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{route('admin.dashboard')}}" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>																
                    </li>
                    <li class="nav-item">
                        <a href="{{route('categories.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>Category</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('subcategories.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>Sub Category</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('brands.index')}}" class="nav-link">
                            <svg class="h-6 nav-icon w-6 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <p>Brands</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('products.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-tag"></i>
                            <p>Products</p>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <!-- <i class="nav-icon fas fa-tag"></i> -->
                            <i class="fas fa-truck nav-icon"></i>
                            <p>Shipping</p>
                        </a>
                    </li>							
                    <li class="nav-item">
                        <a href="orders.html" class="nav-link">
                            <i class="nav-icon fas fa-shopping-bag"></i>
                            <p>Orders</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="discount.html" class="nav-link">
                            <i class="nav-icon  fa fa-percent" aria-hidden="true"></i>
                            <p>Discount</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="users.html" class="nav-link">
                            <i class="nav-icon  fas fa-users"></i>
                            <p>Users</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages.html" class="nav-link">
                            <i class="nav-icon  far fa-file-alt"></i>
                            <p>Pages</p>
                        </a>
                    </li>							
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">					
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Product</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{route('products.index')}}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div id="alert-container"></div>
        <form method="POST" id="productForm" class="productForm">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">								
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="title">Title</label>
                                            <input type="text" name="title" id="title" class="form-control" placeholder="Title" value="{{$products->title}}">
                                            <p class="error"></p>	
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="slug">Slug</label>
                                            <input type="text" readonly name="slug" id="slug" class="form-control" placeholder="Slug" value="{{$products->slug}}">	
                                            <p class="error"></p>                                           
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" cols="30" rows="10" class="summernote" placeholder="Description" >{{$products->description}}</textarea>
                                            <p class="error"></p>
                                        </div>                          
                                    </div>                                            
                                </div>
                            </div>	                                                                      
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Media</h2>	
                                <input type="hidden"  name="id_image" id="id_image" class="form-control" value="">
                                <div id="image" name="image" class="dropzone dz-clickable">
                                    <div class="dz-message needsclick">    
                                        <br>Drop files here or click to upload.<br><br>                                            
                                    </div>
                                </div>
                            </div>	                                                                      
                        </div>
                        <div class="row" id="product-gallery">
                            @foreach($tempImages as $tempImage) 
                                @if(!empty($tempImage->id))                                                             
                                        <div class="col-md-3" id="image-row-{{$tempImage->id}}">
                                            <div class="card">
                                                <input type="hidden" name="image_array[]" value="{{$tempImage->id}}">
                                                <img src="{{asset('/temp/products/'.$tempImage->name)}}" class="card-img-top" width="300" height="200" >
                                                <div class="card-body">
                                                    <a href="javascript:void(0)" onclick="deleteImage({{$tempImage->id}})" class="btn btn-primary">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Pricing</h2>								
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="price">Price</label>
                                            <input type="text" name="price" id="price" class="form-control" placeholder="Price" value="{{$products->price}}">	
                                            <p class="error"></p>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="compare_price">Compare at Price</label>
                                            <input type="text" name="compare_price" id="compare_price" class="form-control" placeholder="Compare Price" value="{{$products->compare_price}}">
                                            <p class="text-muted mt-3">
                                                To show a reduced price, move the product’s original price into Compare at price. Enter a lower value into Price.
                                            </p>	
                                        </div>
                                    </div>                                            
                                </div>
                            </div>	                                                                      
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Inventory</h2>								
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sku">SKU (Stock Keeping Unit)</label>
                                            <input type="text" name="sku" id="sku" class="form-control" placeholder="sku" value="{{$products->sku}}">	
                                            <p class="error"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="barcode">Barcode</label>
                                            <input type="text" name="barcode" id="barcode" class="form-control" placeholder="Barcode" value="{{$products->barcode}}">	
                                            <p class="error"></p>
                                        </div>
                                    </div>   
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <div class="custom-control custom-checkbox">     
                                                <input type="hidden" name="track_qty" value="No">                                          
                                                <input class="custom-control-input" type="checkbox" id="track_qty" name="track_qty" value="Yes" checked>
                                                <label for="track_qty" class="custom-control-label">Track Quantity</label>
                                            </div>                                           
                                        </div>
                                        <div class="mb-3">
                                            <input type="number" min="0" name="qty" id="qty" class="form-control" placeholder="Qty" value="{{$products->qty}}">	
                                            <p class="error"></p>
                                        </div>
                                        
                                    </div>                                         
                                </div>
                            </div>	                                                                      
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-body">	
                                <h2 class="h4 mb-3">Product status</h2>
                                <div class="mb-3">
                                    <select name="status" id="status" class="form-control">
                                        <option value="1" {{$products->status==1 ? 'selected' : ''}}>Active</option>
                                        <option value="0" {{$products->status==0 ? 'selected' : ''}}>Block</option>
                                    </select>
                                </div>
                            </div>
                        </div> 
                        <div class="card">
                            <div class="card-body">	
                                <h2 class="h4  mb-3">Product category</h2>
                                <div class="mb-3">
                                    <label for="category">Category</label>
                                    <select name="category" id="category" class="form-control">
                                        <option value="">Select category</option>
                                        @if($categories->isNotEmpty())
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" {{$products->category_id==$category->id?'selected':''}}>{{$category->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <p class="error"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="category">Sub category</label>
                                    <select name="sub_category" id="sub_category" class="form-control">
                                        <option value="">Select sub-category</option>   
                                        @if($subcategories->isNotEmpty())
                                            @foreach($subcategories as $subcategory)
                                                <option value="{{$subcategory->id}}" {{$products->sub_category_id==$subcategory->id?'selected':''}}>{{$subcategory->name}}</option>
                                            @endforeach     
                                        @endif                              
                                    </select>
                                    <p class="error"></p>
                                </div>
                            </div>
                        </div> 
                        <div class="card mb-3">
                            <div class="card-body">	
                                <h2 class="h4 mb-3">Product brand</h2>
                                <div class="mb-3">
                                    <select name="brand_id" id="brand_id" class="form-control">
                                        <option value="">Select brand</option>
                                        @if($brands->isNotEmpty())
                                            @foreach($brands as $brand)
                                                <option value="{{$brand->id}}" {{$products->brand_id==$brand->id?'selected':''}}>{{$brand->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <p class="error"></p>
                                </div>
                            </div>
                        </div> 
                        <div class="card mb-3">
                            <div class="card-body">	
                                <h2 class="h4 mb-3">Featured product</h2>
                                <div class="mb-3">
                                    <select name="is_featured" id="is_featured" class="form-control">
                                        <option value="No" {{$products->is_featured=='No'}}>No</option>
                                        <option value="Yes" {{$products->is_featured=='Yes'}}>Yes</option>                                                
                                    </select>
                                </div>
                            </div>
                        </div>                                 
                    </div>
                </div>
                
                <div class="pb-5 pt-3">
                    <button class="btn btn-primary" type="submit">Update</button>
                    <a href="" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </div>
        </form>
        
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
@endsection

@section('customJs')
<script>
    $('#productForm').submit(function(event){

        event.preventDefault();// prevents the form from submitting traditionally.
        var element = $(this);//selects the form element.
        $.ajax({
            url:'{{route("products.update",$products->id)}}',
            type:'POST',
            data:element.serializeArray(),// serializes the form data.
            dataType:'json',//jQuery automatically parse the response into a JavaScript object if the server returns JSON
            success:function(response){
            var error = response['error'];     
            if(response['status']==true){
                $(".error").removeClass('invalid-feedback').html(''); 
                $("input[type='text'], select").removeClass('is-invalid');   
                // Create the success alert
                var successAlert = `
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Success</h4>
                        ${response['messege']}
                    </div>
                `;

                // Append the success alert to a container
                // Replace '#alert-container' with the selector of your alert container
                $('#alert-container').append(successAlert);
            }else{    
                $(".error").removeClass('invalid-feedback').html(''); 
                $("input[type='text'], select,input[type='number']").removeClass('is-invalid');       
                $.each(error, function(key, value){                   
                    $(`#${key}`).addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(value);                                   
                });             
            }                
            
            }, error:function(jqXHR, exception){//jqXHR is the object that represents the AJAX request. It provides information about the error, such as the status code and any error messages.
                console.log("Something went wrong");
            }
        });    
    }); 
    

    
    $('#title').change(function(){
        var element=$(this);
        $.ajax({
            url:'{{route("getSlug")}}',
            type:'GET',
            data:{title: element.val()},// serializes the form data.
            dataType:'json',//jQuery automatically parse the response into a JavaScript object if the server returns JSON
            success:function(response){
                if(response['status']==true){
                    $('#slug').val(response['slug']);
                }
            }
        });
    });

    $('#category').change(function(){
        var category_id=$(this).val();
        $.ajax({
            url:'{{route("productSubCategory.index")}}',
            type:'GET',
            data:{category_id:category_id},// serializes the form data.
            dataType:'json',//jQuery automatically parse the response into a JavaScript object if the server returns JSON
            success:function(response){
                $('#sub_category').find('option').not(':first').remove();
                $.each(response['data'], function(key, item){
                    $('#sub_category').append(`<option value='${item.id}'>${item.name}</option>`);
                });
            },
            error:function(jqXHR, exception){//jqXHR is the object that represents the AJAX request. It provides information about the error, such as the status code and any error messages.
                console.log("Something went wrong");
            }
        });
    });


    Dropzone.autoDiscover = false;
    const dropzone = $("#image").dropzone({       
        url: "{{route('temp-images.create')}}", // Route to handle file upload
        maxFilesize: 100, // MB
        paramName: "image", // The name that will be used to transfer the file
        acceptedFiles: "image/jpeg,image/png,image/gif,image/jpg", // Allowed file types
        addRemoveLinks: true,
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')           
        }, success: function(file, response){
            if(response.status) {
                var html = `
                    <div class="col-md-3" id="image-row-${response.Id_image}">
                        <div class="card">
                            <input type="hidden" name="image_array[]" value="${response.Id_image}">
                            <img src="${response.ImagePath}" class="card-img-top" width="300" height="200" >
                            <div class="card-body">
                                <a href="javascript:void(0)" onclick="deleteImage(${response.Id_image})" class="btn btn-primary">Delete</a>
                            </div>
                        </div>
                    </div>`;
                $('#product-gallery').append(html);
            } else {
                console.error(response.message);
            }
        },
        error: function(file, response) {
            console.error(response);
        },
        complete: function(file){
            this.removeFile(file);
        }
    });

    function deleteImage(id){
        $("#image-row-"+id).remove();
    }
</script>
@endsection




  