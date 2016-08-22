<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	
	<title>{{ config('app.name') }} Admin</title>

	{{-- stylesheets --}}
	<link href="https://fonts.googleapis.com/css?family=Lato:700,900,400,100,300,300italic,400italic,700,700italic,900,900italic" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
	<link rel="stylesheet" href="/css/app.css" title="no title" charset="utf-8">

	<script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body id="app-layout default">
	<div id="app">
		<admin-header></admin-header>
		<div class="container m-t-2">
			<router-view
				class="animated"
				transition="fade"
				transition-mode="out-in"
				keep-alive>
			</router-view>
		</div>
	</div>
	{{-- If you have scripts that you need, add them here: --}}
	<script src="/js/admin.js"></script>
</body>
</html>