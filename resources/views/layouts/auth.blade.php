<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{__("Educatics Schooling management system")}} </title>
  
	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{global_asset("css/vendors_css.css")}}">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="{{global_asset("css/style.css")}}">
	<link rel="stylesheet" href="{{global_asset("css/skin_color.css")}}">	

</head>
	
<body class="hold-transition theme-primary bg-img" style="background-image: url(../images/auth-bg/bg-1.jpg)">
	
	<div class="container h-p100">
        <div class="row align-items-center justify-content-md-center h-p100">
        @yield("content")
        </div>
	</div>


	<!-- Vendor JS -->
	<script src="{{global_asset("js/vendors.min.js")}}"></script>

    <script src="{{global_asset("assets/icons/feather-icons/feather.min.js")}}"></script>	

</body>
</html>
