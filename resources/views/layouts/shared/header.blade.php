<header class="navbar navbar-full navbar-light bg-faded">
	<div class="container">

		<ul class="nav navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="/">Bracket</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/teams">Teams</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/players">Members</a>
			</li>
		</ul>

		<ul class="nav navbar-nav pull-right">
		  @if(Auth::guest())
		  <li class="nav-item"><a href="{{ url('/login' )}}" class="btn btn-primary-outline">Login</a></li>
		  <li class="nav-item"><a href="{{ url('/register' )}}" class="btn btn-danger-outline">Signup</a></li>
		  @else
		  <li class="nav-item dropdown">
		    <a class="nav-link dropdown-toggle"
		        data-toggle="dropdown" href="#"
		        role="button" aria-haspopup="true"
		        aria-expanded="false">Welcome back, {{ Auth::user()->name }}!</a>
		    <div class="dropdown-menu">
		      <a class="dropdown-item" href="{{ url('/admin') }}">Go to Admin</a>
		      <div class="dropdown-divider"></div>
		      <a class="dropdown-item" href="#">View Profile</a>
		      <a class="dropdown-item" href="/settings/teams">Team Settings</a>
		      <div class="dropdown-divider"></div>
		      <a class="dropdown-item" href="#">Settings</a>
		      <div class="dropdown-divider"></div>
		      <a class="dropdown-item" href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Logout</a>
		    </div>
		  </li>
		  @endif
		</ul>

	</div>
</header>