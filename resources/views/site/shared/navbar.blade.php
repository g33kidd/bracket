<header class="navbar navbar-full main-header">
	<div class="container">
		<a class="navbar-brand pull-xs-left" href="/">
			<img src="/images/prl-logo.png" alt="">
		</a>

		<ul class="nav navbar-nav pull-xs-right">
			<li class="nav-item">
				<a href="" class="nav-link">Home</a>
			</li>
			<li class="nav-item">
				<a href="" class="nav-link">News</a>
			</li>
			<li class="nav-item dropdown">
		    <a class="nav-link dropdown-toggle"
		        data-toggle="dropdown" href="#"
		        role="button" aria-haspopup="true"
		        aria-expanded="false">Tournaments</a>
		    <div class="dropdown-menu">
		    	{{-- Shouldn't have to access this directly... should be a thing... --}}
		    	@foreach(App\Models\Game::all() as $game)
			    	<a href="#" class="dropdown-item">{{ $game->name }}</a>
		    	@endforeach
		    </div>
		  </li>
			<li class="nav-item">
				<a href="/players" class="nav-link">Players</a>
			</li>
			<li class="nav-item">
				<a href="/teams" class="nav-link">Teams</a>
			</li>
			<li class="nav-item">
				<a href="http://store.prorl.com" class="nav-link" target="_blank">Store</a>
			</li>
		</ul>
	</div>
</header>