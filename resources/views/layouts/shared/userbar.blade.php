<div class="user-bar">
	<div class="container">		
		<div class="row">
			<div class="col-md-6">
				
				@if(Auth::user())
				<div class="team-info pull-xs-left">
					<div class="team">
						<img class="pull-xs-left" src="http://prorl.com/logos/1467673224-Wot_the_Ballz.jpg" alt="">
						<div class="info pull-xs-right">
							<span class="current">Current Team</span>
							<span class="name">Fearless Poo Flingers</span>
						</div>
					</div>
				</div>
				@endif

			</div>
			<div class="col-md-6">
				
				@if(Auth::guest())
					<div class="guest-info pull-xs-right">
						<a href="/login" class="btn btn-login">Login</a>
						<a href="/register" class="btn btn-login">Sign Up</a>
					</div>
				@else
					<div class="user-info pull-xs-right">
						<div class="user">
							<img class="pull-xs-right" src="http://prorl.com/logos/1467673224-Wot_the_Ballz.jpg" alt="">
							<div class="info pull-xs-right">
								<span class="phrase">Holy cow!</span>
								<span class="name">SomeLongAssName</span>
							</div>
							<div class="actions pull-xs-right">
								<a href="#">Settings</a>
								<a href="#">Logout</a>
							</div>
						</div>
					</div>
				@endif

			</div>
		</div>
	</div>
</div>