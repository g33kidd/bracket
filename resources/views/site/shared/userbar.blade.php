<div class="user-bar">
	<div class="container">
		<div class="pull-xs-right">
			@if(Auth::guest())
			<div class="guest-info pull-xs-right">
				<a href="/login" class="btn-login">Login</a>
				<a href="/register" class="btn-register">Sign Up</a>
			</div>
			@else
			<div class="user-info">
				<span class="name">SomeLongAssName</span>
				<div class="actions">
					<a href="#">Settings</a>
					<a href="#">Logout</a>
				</div>
			</div>
			@endif
		</div>
	</div>
</div>