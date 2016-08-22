<template>
	<nav class="navbar navbar-full navbar-light bg-faded">
		<div class="container">
			<div class="nav navbar-nav">
				<li class="nav-item dropdown" id="menu-dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Navigation</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" v-link="{ path: '/'}">Dashboard</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" v-link="{ path: '/tournaments' }">Tournaments</a>
						<a class="dropdown-item" v-link="{ path: '/users' }">Manage Users</a>
						<a class="dropdown-item" v-link="{ path: '/teams' }">Manage Teams</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item title" v-link="{ path: '/settings' }">Settings</a>
						<a class="dropdown-item" v-link="{ path: '/games' }">Games</a>
						<a class="dropdown-item" v-link="{ path: '/platforms' }">Platforms</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="/" target="_blank">Visit Site</a>
					</div>
				</li>
			</div>
			<div class="nav navbar-nav pull-xs-right">
				<a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
				<a class="nav-item nav-link" href="#">Features</a>
				<a class="nav-item nav-link" href="#">Pricing</a>
				<a class="nav-item nav-link" href="#">About</a>
			</div>
		</div>
	</nav>
</template>

<script>
export default {
	data() {
		return {};
	},

	ready() {
		$('#menu-dropdown').on('show.bs.dropdown', function(e) {
			$(this).find('.dropdown-menu').addClass('animated bounceIn');
		});
		$('#menu-dropdown').on('hide.bs.dropdown', function(e) {
			$(this).find('.dropdown-menu').removeClass('animated bounceIn');
		});
	}
}
</script>