<template>
	<div>
		<div class="guest-info pull-xs-right">
			<button class="btn btn-secondary" @click="showLogin">Login</button>
			<button class="btn btn-secondary" @click="showSignup">Sign Up</button>
		</div>

		<div class="user-info">
			<span class="name">Hello, username!</span>
			<div class="actions">
				<a href="#">Settings</a>
				<a href="#">Logout</a>
			</div>
		</div>

		<div class="modal fade" id="modal-login" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button class="close" data-dismiss="modal" aria-label="Close" type="button">
							<span aria-hidden="true">&times;</span>
						</button>
						<h5>Login</h5>
					</div>
					<div class="modal-body">
						<form>
							<div class="form-group">
								<label for="login-username">Email Address</label>
								<input v-model="loginForm.username" type="text" class="form-control" id="login-username" placeholder="Enter Email">
							</div>
							<div class="form-group">
								<label for="login-password">Password</label>
								<input v-model="loginForm.password" type="password" class="form-control" id="login-password" placeholder="Enter Password">
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" v-model="loginForm.remember"> Remember Me
								</label>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" @click="login">Login</button>
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
				loginForm: {
					errors: [],
					username: '',
					password: '',
					remember: false
				},
				signupForm: {
					errors: [],
					username: '',
					name: '',
					email: '',
					password: '',
				}
			};
		},

		ready() {
			$('#modal-login').on('shown.bs.modal', () => {
				$('#login-username').focus();
			});
		}
	}
</script>