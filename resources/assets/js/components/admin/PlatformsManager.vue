<template>
	<div>
		<div v-if="platforms.length > 0">
			<div class="m-b-2">
				<button class="btn btn-primary" id="add-platform" @click="showNewPlatformForm">New Platform</button>
			</div>

			<table class="table">
				<thead class="thead-default">
					<tr>
						<th scope="row">ID</th>
						<th>Name</th>
						<th>Short Name</th>
						<th>Slug</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="platform in platforms">
						<th scope="row">{{ platform.id }}</td>
							<td>{{ platform.name }}</td>
							<td>{{ platform.short_name }}</td>
							<td>{{ platform.slug }}</td>
							<td>
								<div class="btn-group">
									<button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Do Things
									</button>
									<div class="dropdown-menu">
										<a class="dropdown-item">Edit</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item text-danger" @click="destroy(platform)">Delete</a>
									</div>
								</div>
							</td>
						</tr>
					</tbody>
				</table>

				<div class="modal fade" id="modal-add-platform" tabindex="-1" role="dialog" aria-labelledby="modal-add-platform" aria-hidden="true">
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
				</div>

			</div>
		</div>
</template>

<script>
	export default {
		data() {
			return {
				platforms: [],
				addForm: {
					name: '',
					short_name: '',
					slug: '',
					banner: '',
					logo: ''
				}
			};
		},

		ready() {
			this.getPlatforms();

			$('#modal-add-platform').on('shown.bs.modal', () => {
                $('#add-platform-name').focus();
            });
		},

		methods: {
			getPlatforms() {
				this.$http.get('/api/platforms').then(response => {
					this.$set('platforms', response.json());
				});
			},

			newPlatform() {
				this.$http.post('/api/platforms', this.addForm).then(response => {
					this.getPlatforms();
					this.addForm.name = '';
					this.addForm.short_name = '';
					this.addForm.slug = '';
					this.addForm.banner = '';
					this.addForm.logo = '';
					$('#modal-add-platform').modal('hide');
				});
			},

			showNewPlatformForm() {
				$('#modal-add-platform').modal('show');
			},

			destroy(platform) {
				this.$http.delete('/api/platforms/' + platform.id).then(response => {
                    this.getPlatforms();
                });
			}
		}
	}
</script>