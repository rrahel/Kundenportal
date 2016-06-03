<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Werbedesign</title>

 <link rel="shortcut icon" href="{{{ asset('public/img/favicon.ico') }}}">

<!-- Fonts -->
<link
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css"
	rel='stylesheet' type='text/css'>
<link
	href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700"
	rel='stylesheet' type='text/css'>

<!-- Styles -->
<link
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
	rel="stylesheet">
{{--
<link href="{{ elixir('css/app.css') }}" rel="stylesheet">
--}}

<style>
body {
	font-family: 'Lato';
	padding-top: 12%;
	background-color: #da5959;
}

.fa-btn {
	margin-right: 6px;
}
.col-md-8 {
    width: 55.666667%;
}
.col-md-4 {
     width: 42%;
}
.col-md-offset-2 {
    margin-left: 23.666667%;
}
img {
    margin-left: 10%;
}
.panel-default>.panel-heading {
    background-color: #da5959;
    border-color: #da5959;
}
.panel{
 background-color: #da5959;
	border: 0px;
    width: 10cm;
    margin-left: inherit;
}
.panel-body {
    width: 9cm;
    margin-left: 24px;
    background-color: #ddd;
	border-style: solid;
    border-color: white;
}
.link{
    margin-left: 4cm;
    color: #FDFDFD;
}
.color{
	color: #da5959;
}
.row{
    margin-right: 0%;
    margin-left: 0%;
}
</style>
</head>
<body id="app-layout">


	@yield('content')

	<!-- JavaScripts -->
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script
		src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	{{--
	<script src="{{ elixir('js/app.js') }}"></script>
	--}}
</body>
</html>
