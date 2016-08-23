<style scoped>
.title {
	font-weight: 600;
}
</style>

<template>
	<nav class="navbar navbar-full navbar-light bg-faded">
		<div class="container">
			<div class="nav navbar-nav">
				<li class="nav-item dropdown open" id="menu-dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Navigation</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" v-link="{ path: '/'}">Dashboard</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" v-link="{ path: '/tournaments' }">Tournaments</a>
						<a class="dropdown-item" v-link="{ path: '/users' }">Users</a>
						<a class="dropdown-item" v-link="{ path: '/teams' }">Teams</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item title" v-link="{ path: '/settings' }">Settings</a>
						<a class="dropdown-item" v-link="{ path: '/games' }">Games</a>
						<a class="dropdown-item" v-link="{ path: '/platforms' }">Platforms</a>
						<a class="dropdown-item" v-link="{ path: '/oauth' }">OAuth</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="/" target="_blank">Visit Site</a>
					</div>
				</li>
			</div>
			<div class="nav navbar-nav pull-xs-right">
				<a class="nav-item nav-link text-info" v-link="{ path: '/mod-hub' }">Moderator Hub</a>
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