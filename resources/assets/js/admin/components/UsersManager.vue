<template>
	<div>
		<div v-if="users.length > 0">
			<table class="table">
				<thead class="thead-default">
					<tr>
						<th scope="row">ID</th>
						<th>Name</th>
						<th>Username</th>
						<th>Email</th>
						<th>Joined</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="user in users">
						<th scope="row">{{ user.id }}</td>
							<td>{{ user.name }}</td>
							<td>{{ user.username }}</td>
							<td>{{ user.email }}</td>
							<td>{{ user.created_at | moment "MMM Do YYYY, h:mm:ss a" }}</td>
							<td>
								<div class="btn-group">
									<button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Do Things
									</button>
									<div class="dropdown-menu">
										<a class="dropdown-item">Edit</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item text-danger" @click="destroy(user)">Remove User</a>
									</div>
								</div>
							</td>
						</tr>
					</tbody>
				</table>

				<!-- <div class="modal fade" id="modal-add-platform" tabindex="-1" role="dialog" aria-labelledby="modal-add-platform" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title" id="exampleModalLabel">Add a new platform</h4>
							</div>
							<div class="modal-body">
								<form>
									<div class="form-group">
										<label for="add-game-name" class="form-control-label">Name:</label>
										<input type="text" class="form-control" id="add-platform-name" v-model="addForm.name" placeholder="Xbox One">
									</div>
									<div class="form-group">
										<label for="add-game-short" class="form-control-label">Short Name:</label>
										<input type="text" class="form-control" id="add-platform-short" v-model="addForm.short_name" placeholder="XBONE">
									</div>
									<div class="form-group">
										<label for="add-game-slug" class="form-control-label">Slug:</label>
										<input type="text" class="form-control" id="add-platform-slug" v-model="addForm.slug" placeholder="xbox">
									</div>
								</form>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="button" class="btn btn-primary" @click="newPlatform">Save</button>
							</div>
						</div>
					</div>
				</div> -->

			</div>
		</div>
</template>

<script>
	export default {
		data() {
			return {
				users: []
			};
		},

		ready() {
			this.getUsers();

			$('#modal-add-platform').on('shown.bs.modal', () => {
	      $('#add-platform-name').focus();
      });
		},

		methods: {
			getUsers() {
				this.$http.get('/api/users').then(response => {
					this.users = response.json();
				});
			},

			destroy(user) {
				this.$http.delete('/api/users/' + user.id).then(response => {
          this.getUsers();
        });
			}
		}
	}
</script>
