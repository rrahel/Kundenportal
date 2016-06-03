<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
<meta charset="UTF-8">
<title>{{ $page_title or "Kunden Portal" }}</title>
<meta
	content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'
	name='viewport'>
 <link rel="shortcut icon" href="{{{ asset('public/img/favicon.ico') }}}">
<!-- Bootstrap 3.3.2 -->
<link href="{{ asset("
	public/bower_components/Admin-lte/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet"
	type="text/css" />
<!-- Font Awesome Icons -->
<link
	href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"
	rel="stylesheet" type="text/css" />
<!-- Ionicons -->
<link
	href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css"
	rel="stylesheet" type="text/css" />
<!-- Theme style -->
<link href="{{ asset("
	public/bower_components/Admin-lte/dist/css/AdminLTE.min.css")}}" rel="stylesheet"
	type="text/css" />

<link rel="stylesheet" href="{{asset("public/bower_components/jquery/jquery-ui.css")}}">


<!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
<link href="{{ asset("
	public/bower_components/Admin-lte/dist/css/skins/skin-red.min.css")}}" rel="stylesheet"
	type="text/css" />

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
<style>
.form-control[readonly] {
	background-color: #fff;
}
</style>
</head>
<body class="skin-red">
	<div class="wrapper">

		<!-- Header -->
		@include('header')

		<!-- Sidebar -->
		@include('sidebar')

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					{{ $page_title or "Page Title" }} <small>{{ $page_description or
						null }}</small>
				</h1>

			</section>

			<!-- Main content -->
			<section class="content">
				<!-- Your Page Content Here -->
				@yield('content')
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<!-- Footer -->
		@include('footer')

	</div>
	<!-- ./wrapper -->

	<!-- REQUIRED JS SCRIPTS -->

	<!-- datepicker -->
	<script src="{{asset("public/bower_components/jquery/jquery-1.10.2.js")}}"></script>
	<script src="{{asset("public/bower_components/jquery/jquery-ui.js")}}"></script>
	<link rel="stylesheet" href="{{asset("//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css")}}">
	<script>
					//datepicker
				  $(function() {
				    $( ".datepicker" ).datepicker();
				   
				  });
				  
					// datatables
				  $(document).ready(function() {
					    $('.dataTable').DataTable({

					    	"language": {
					    		
					    			"sEmptyTable":   	"Keine Daten in der Tabelle vorhanden",
					    			"sInfo":         	"_START_ bis _END_ von _TOTAL_ Einträgen",
					    			"sInfoEmpty":    	"0 bis 0 von 0 Einträgen",
					    			"sInfoFiltered": 	"(gefiltert von _MAX_ Einträgen)",
					    			"sInfoPostFix":  	"",
					    			"sInfoThousands":  	".",
					    			"sLengthMenu":   	"_MENU_ Einträge anzeigen",
					    			"sLoadingRecords": 	"Wird geladen...",
					    			"sProcessing":   	"Bitte warten...",
					    			"sSearch":       	"Suchen",
					    			"sZeroRecords":  	"Keine Einträge vorhanden.",
					    			"oPaginate": {
					    				"sFirst":    	"Erste",
					    				"sPrevious": 	"Zurück",
					    				"sNext":     	"Nächste",
					    				"sLast":     	"Letzte"
					    			},
					    			"oAria": {
					    				"sSortAscending":  ": aktivieren, um Spalte aufsteigend zu sortieren",
					    				"sSortDescending": ": aktivieren, um Spalte absteigend zu sortieren"
					    			}
					    		
					        }

						});
					} );

// 					password validation
					$(function() {
						$('#password').on('keyup', function() {
							if ($('#password').val().length < 6) {
									$('#message_user').html('Kenwort muss mindestens 6 Zeichnen lang sein').css('color', 'red');
									document.getElementById("submit-user").disabled = true;
							}else{
								$('#message_user').html('').css('color', 'green');
								document.getElementById("submit-user").disabled = false;
								}
						});

						$('#confirm-password').on('keyup', function() {
							if ($('#password').val() == $('#confirm-password').val()) {
								$('#message_user').html('Matching').css('color', 'green');
								document.getElementById("submit-user").disabled = false;
							} else {
								$('#message_user').html('Not Matching').css('color', 'red');
								document.getElementById("submit-user").disabled = true;
							}
							
							
						});
	
				});	
			
 	 </script>
	<!--  	 editor -->
	<script src="{{ asset ("public/bower_components/ckeditor/ckeditor.js") }}"></script>
	<!-- datatables-->
	<script src="{{ asset ("public/bower_components/datatables.net/js/jquery.dataTables.min.js") }}"></script>
	<script src="{{ asset ("public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js") }}"></script>
	<link rel="stylesheet" href="{{asset("public/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css")}}">
	<!-- jQuery 2.1.3 -->
	<!-- <script src="{{ asset ("/bower_components/admin-lte/plugins/jQuery/jQuery-2.2.0.min.js") }}"></script> -->
	<!-- Bootstrap 3.3.2 JS -->
	<script src="{{ asset ("
		public/bower_components/Admin-lte/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>
	<!-- AdminLTE App -->
	<script src="{{ asset ("
		public/bower_components/Admin-lte/dist/js/app.min.js") }}" type="text/javascript"></script>

	<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience -->
</body>
</html>