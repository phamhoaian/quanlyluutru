<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
	<!--<![endif]-->
	<!-- BEGIN HEAD -->
	<head>
		<meta charset="utf-8" />
		<title>@yield('title')Hệ thống khai báo lưu trú trực tuyến</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1" name="viewport" />
		<meta content="Hệ thống khai báo lưu trú trực tuyến" name="description" />
		<!-- BEGIN GLOBAL MANDATORY STYLES -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
		<link href="{{ asset('public/assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('public/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
		<!-- END GLOBAL MANDATORY STYLES -->
		<!-- BEGIN PAGES STYLES -->
	    @yield('css')
	    <!-- END PAGES STYLES -->
		<!-- BEGIN THEME GLOBAL STYLES -->
		<link href="{{ asset('public/assets/css/components-md.min.css') }}" rel="stylesheet" id="style_components" type="text/css" />
		<link href="{{ asset('public/assets/css/plugins-md.min.css') }}" rel="stylesheet" type="text/css" />
		<!-- END THEME GLOBAL STYLES -->
		<!-- BEGIN THEME LAYOUT STYLES -->
		<link href="{{ asset('public/assets/css/layout3.min.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('public/assets/css/themes/default.min.css') }}" rel="stylesheet" type="text/css" id="style_color" />
		<link href="{{ asset('public/assets/css/custom3.css') }}" rel="stylesheet" type="text/css" />
		<!-- END THEME LAYOUT STYLES -->
		<link rel="shortcut icon" href="favicon.ico" /> 
		<meta name="csrf-token" content="{{ csrf_token() }}">
	</head>
	<!-- END HEAD -->

	<body class="page-container-bg-solid page-md">
		<div class="page-wrapper">
			<div class="page-wrapper-row">
				<div class="page-wrapper-top">
					<!-- BEGIN HEADER -->
					<div class="page-header">
						<!-- BEGIN HEADER TOP -->
						@include('layouts.header')
						<!-- END HEADER TOP -->
						<!-- BEGIN HEADER MENU -->
						@include('layouts.navigation')
						<!-- END HEADER MENU -->
					</div>
					<!-- END HEADER -->
				</div>
			</div>
			<div class="page-wrapper-row full-height">
				<div class="page-wrapper-middle">
					<!-- BEGIN CONTAINER -->
					<div class="page-container">
						<!-- BEGIN CONTENT -->
						<div class="page-content-wrapper">
							<!-- BEGIN PAGE CONTENT BODY -->
							<div class="page-content">
								<div class="container">
									<!-- BEGIN PAGE CONTENT INNER -->
									<div class="page-content-inner">
										@yield('content')
									</div>
									<!-- END PAGE CONTENT INNER -->
								</div>
							</div>
							<!-- END PAGE CONTENT BODY -->
							<!-- END CONTENT BODY -->
						</div>
						<!-- END CONTENT -->
					</div>
					<!-- END CONTAINER -->
				</div>
			</div>
			@include('layouts.footer')
		</div>
		<!-- BEGIN CORE PLUGINS -->
		<script src="{{ asset('public/assets/scripts/jquery.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
		<!-- END CORE PLUGINS -->
		<!-- BEGIN THEME GLOBAL SCRIPTS -->
		<script src="{{ asset('public/assets/scripts/app.js') }}" type="text/javascript"></script>
		<!-- END THEME GLOBAL SCRIPTS -->
		<!-- BEGIN THEME LAYOUT SCRIPTS -->
		<script src="{{ asset('public/assets/scripts/layout3.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/scripts/demo3.min.js') }}" type="text/javascript"></script>
		<!-- END THEME LAYOUT SCRIPTS -->
		<!-- BEGIN PAGES STYLES -->
	    @yield('js')
	    <!-- END PAGES STYLES -->
	</body>

</html>