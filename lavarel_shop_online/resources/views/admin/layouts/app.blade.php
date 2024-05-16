<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Laravel Shop :: Administrative Panel</title>
		<!-- Google Font: Source Sans Pro -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="{{asset('admin-asset/plugins/fontawesome-free/css/all.min.css')}}">
		<!-- Theme style -->
		<link rel="stylesheet" href="{{asset('admin-asset/css/adminlte.min.css')}}">
		<link rel="stylesheet" href="{{asset('admin-asset/css/custom.css')}}">
		<link rel="stylesheet" href="{{asset('admin-asset/plugins/dropzone/min/dropzone.css')}}">
        <link rel="stylesheet" href="{{asset('admin-asset/plugins/summernote/summernote-bs4.min.css')}}">

		
		<meta name="csrf-token" content="{{csrf_token()}}">
	</head>
	<body class="hold-transition sidebar-mini">
		<!-- Site wrapper -->
		<div class="wrapper">
			<!-- Navbar -->
			@yield('navbar')
			<!-- /.navbar -->
			<!-- Main Sidebar Container -->
			@yield('sidebar')
			<!-- Content Wrapper. Contains page content -->
			@yield('content')
			<!-- /.content-wrapper -->
			<footer class="main-footer">
				
				<strong>Copyright &copy; 2014-2022 AmazingShop All rights reserved.
			</footer>			
		</div>
		<!-- ./wrapper -->
		<!-- jQuery -->
		<script src="{{ asset('admin-asset/plugins/jquery/jquery.min.js')}}"></script>
		
		<!-- Bootstrap 4 -->
		<script src="{{asset('admin-asset/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
		<!-- AdminLTE App -->
		<script src="{{asset('admin-asset/js/adminlte.min.js')}}"></script>
		<script src="{{ asset('admin-asset/plugins/dropzone/min/dropzone.min.js')}}"></script>
		<script src="{{asset('admin-asset/plugins/summernote/summernote-bs4.min.js')}}"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="{{asset('admin-asset/js/demo.js')}}"></script>

		<script type="text/javascript">
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
  
            $(document).ready(function(){
				$('.summernote').summernote({
					height: 200
				});
			});
		</script>
 
		@yield('customJs')
	</body>

	
</html>