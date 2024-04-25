
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
            <!-- <ol class="breadcrumb p-0 m-0 bg-white">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol> -->
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
                        <a href="brands.html" class="nav-link">
                            <svg class="h-6 nav-icon w-6 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <p>Brands</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="products.html" class="nav-link">
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
                    <h1>Categories</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{route('subcategories.create')}}" class="btn btn-primary">New Sub Category</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        {{-- @include('admin.message') --}}

        <div class="container-fluid">
            <div class="card">
                
                <form action="{{route('subcategories.index')}}" method="GET">
                    <div class="card-header">                       
                        <div class="card-tools">
                            <div class="input-group input-group" style="width: 250px;">
                                
                                <button type="button" onclick="window.location.href='{{route('subcategories.index')}}'">Reset</button>
                                
                                <input type="text" value="{{Request::get('keyword')}}" name="keyword" class="form-control float-right" placeholder="Search">
            
                                <div class="input-group-append">
                                  <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                  </button>
                                </div>
                              </div>
                        </div>
                    </div>
                </form>
                
                <div class="card-body table-responsive p-0">								
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th width="60">ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Category</th>
                                <th width="100">Status</th>
                                <th width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subCategories as $subcategory)
                            <tr>
                                <td>{{$subcategory-> id}}</td>
                                <td>{{$subcategory -> name}}</td>
                                <td>{{$subcategory -> slug}}</td>
                                <td>{{$subcategory -> category_name}}</td>
                                @if ($subcategory -> status == true)
                                    <td>
                                        <svg class="text-success-500 h-6 w-6 text-success" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </td>
                                @else
                                    <td>
                                        <svg class="text-danger h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </td>
                                @endif
                                <td>
                                    <a href="">
                                        <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                        </svg>
                                    </a>
                                    <a href="" class="text-danger w-4 h-4 mr-1">
                                        <svg wire:loading.remove.delay="" wire:target="" class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path	ath fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                          </svg>
                                    </a>
                                </td>
                                @endforeach
                        </tbody>
                    </table>										
                </div>
                
            </div>
        </div>
        
        <div class="card-footer clearfix">
            {{$subCategories->links('pagination::bootstrap-5')}}

            {{-- <ul class="pagination pagination m-0 float-right">
              <li class="page-item"><a class="page-link" href="#">«</a></li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">»</a></li>
            </ul> --}}
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
@endsection

@section('customJs')
{{-- <script>
    $('#categoryForm').submit(function(event){
        event.preventDefault();// prevents the form from submitting traditionally.
        var element = $(this);//selects the form element.
        $.ajax({
            url:'{{route("categories.store")}}',
            type:'POST',
            data:element.serializeArray(),// serializes the form data.
            dataType:'json',//jQuery automatically parse the response into a JavaScript object if the server returns JSON
            success:function(response){
                var error = response['error'];
                
                if(response['status']==true){
                    $('#name').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                    $('#slug').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
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




</script> --}}
@endsection


{{-- <script>
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
</script> --}}

  