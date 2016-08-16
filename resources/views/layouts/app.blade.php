<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Bracket</title>

	{{-- stylesheets --}}
	<link href="https://fonts.googleapis.com/css?family=Lato:700,900,400,100,300,300italic,400italic,700,700italic,900,900italic" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
	<link rel="stylesheet" href="/css/app.css" title="no title" charset="utf-8">
</head>
<body id="app-layout default">

	@include('site.shared.header')
	@yield('content')
	@include('site.shared.footer')
	
	{{-- If you have scripts that you need, add them here: --}}
	<script type="text/javascript" src="/js/app.js"></script>

</body>
</html>