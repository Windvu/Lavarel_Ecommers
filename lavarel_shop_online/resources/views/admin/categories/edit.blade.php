
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
                <li class="breadcrumb-item"><a href="../index">Category</a></li>
                <li class="breadcrumb-item active"><a href="">Edit</a></li>
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
                    <h1>Update Category</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{route('categories.index')}}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">

            <div id="alert-container"></div>

            <form action="{{ route('categories.update',$category->id)}}" method="POST" id="categoryForm" class="categoryForm">
                
                <div class="card">
                    <div class="card-body">								
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" value="{{$category->name}}"  name="name" id="name" class="form-control" placeholder="Name" autocomplete="on">	
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="slug">Slug</label>
                                    <input type="text" readonly value="{{$category->slug}}" name="slug" id="slug" class="form-control" placeholder="Slug">	
                                    <p></p>
                                </div>
                            </div>	
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="image">Image</label>
                                    <input type="hidden"  name="id_image" id="id_image" class="form-control" value="">
                                    <div id="image" name ="image" class="dropzone dz-clickable">
                                        <div class="dz-message needsclick">
                                            <br>Drop files here or click to upload<br><br>
                                        </div>
                                    </div>                                   
                                </div>
                                <div class="mb-3">
                                    @if(($category->image)!=null)
                                        <td>
                                            <img src="{{asset('/temp/categories/'.$category->image)}}" width="50%" alt="{{$category -> name}}" title="{{$category -> name}}" onclick="showImageFullScreen(this.src)">
                                        </td>
                                    @else
                                        <td>
                                            <img src="{{asset('/temp/no-image-icon-6.png')}}" width="50%" alt="{{$category -> name}}" title="{{$category -> name}}" onclick="showImageFullScreen(this.src)">
                                        </td>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3" >
                                    <label for="status">Status</label>
                                    <select class="form-control" name="status" id="status">                                   
                                        <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>Block</option>
                                    </select>
                                    <p></p>
                                </div>
                            </div>								
                        </div>
                    </div>							
                </div>
                <div class="pb-5 pt-3">
                    <button class="btn btn-primary" type="submit">Update</button>
                    <a href="{{route('categories.edit',$category->id)}}" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </form>           
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
@endsection

@section('customJs')
<script>
    $('#categoryForm').submit(function(event){

        event.preventDefault();// prevents the form from submitting traditionally.
        var element = $(this);//selects the form element.
        $.ajax({
            url:'{{route("categories.update", $category->id)}}',
            type:'POST',
            data:element.serializeArray(),// serializes the form data.
            dataType:'json',//jQuery automatically parse the response into a JavaScript object if the server returns JSON
            success:function(response){
            var error = response['error'];
            
            if(response['status']==true){
                //window.location.href="{{route('categories.index')}}";
                $('#name').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                $('#slug').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");

                // Create the success alert
                var successAlert = `
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Success</h4>
                        ${response['successs']}
                    </div>
                `;

                // Append the success alert to a container
                // Replace '#alert-container' with the selector of your alert container
                $('#alert-container').append(successAlert);
            }else{
                if(error['name']){
                    $('#name').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(error['name']);
                }else{
                    $('#name').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                }

                if(error['slug']){
                    $('#slug').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(error['slug']);;
                }else{
                    $('#slug').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                };
            }                
          
            }, error:function(jqXHR, exception){//jqXHR is the object that represents the AJAX request. It provides information about the error, such as the status code and any error messages.
                console.log("Something went wrong");
            }
        });    
    }); 
    
    
    $('#name').change(function(){
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


    Dropzone.autoDiscover = false;
    const dropzone = $("#image").dropzone({
        init: function(){
            this.on('addedfile', function(file){
                if(this.files.length >1){
                    this.removeFile(this.file[0]);
                }
            });
        },
        url: "{{ route('temp-images.create') }}", // Route to handle file upload
        maxFilesize: 2, // MB
        paramName: "image", // The name that will be used to transfer the file
        acceptedFiles: "image/jpeg,image/png,image/gif", // Allowed file types
        addRemoveLinks: true,
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')           
        }, success: function(file, response){
            $('#id_image').val(response.Id_image);
        }
    });


</script>
@endsection

<script>
    function showImageFullScreen(src) {
        // Create a new image element
        var img = document.createElement('img');
        img.src = src;
        img.style.width = '60%';
        img.style.height = '80%';
    
        // Create a new div element for the modal
        var div = document.createElement('div');
        div.style.display = 'flex';
        div.style.justifyContent = 'center';
        div.style.alignItems = 'center';
        div.style.position = 'fixed';
        div.style.top = '0';
        div.style.left = '0';
        div.style.width = '100%';
        div.style.height = '100%';
        div.style.backgroundColor = 'rgba(0, 0, 0, 0.8)';
        div.style.zIndex = '1000';
        div.onclick = function() {
            document.body.removeChild(div);
        };
    
        // Append the image to the div
        div.appendChild(img);
    
        // Append the div to the body
        document.body.appendChild(div);
    }
    </script>



  