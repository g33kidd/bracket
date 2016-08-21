<template>
	<div class="user-bar">
		<div class="container">
			<div class="pull-xs-right">
				<div class="guest-info pull-xs-right">
					<a href="/login" class="btn-login">Login</a>
					<a href="/register" class="btn-register">Sign Up</a>
				</div>
				<div class="user-info">
					<span class="name">Hello, username!</span>
					<div class="actions">
						<a href="#">Settings</a>
						<a href="#">Logout</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				username: '',
				password: ''
			};
		}
	}
</script>