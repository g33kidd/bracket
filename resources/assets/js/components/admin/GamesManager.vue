<template>
	<div>
		<div v-if="games.length > 0">
			<div class="m-b-2">
				<button class="btn btn-primary" id="add-game" @click="showNewGameForm">New Game</button>
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
					<tr v-for="game in games">
						<th scope="row">{{ game.id }}</td>
							<td>{{ game.name }}</td>
							<td>{{ game.short_name }}</td>
							<td>{{ game.slug }}</td>
							<td>
								<div class="btn-group">
									<button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Do Things
									</button>
									<div class="dropdown-menu">
										<a class="dropdown-item">Edit</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item text-danger" @click="destroy(game)">Delete</a>
									</div>
								</div>
							</td>
						</tr>
					</tbody>
				</table>

				<div class="modal fade" id="modal-add-game" tabindex="-1" role="dialog" aria-labelledby="modal-add-game" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title" id="exampleModalLabel">Add a new game</h4>
							</div>
							<div class="modal-body">
								<form>
									<div class="form-group">
										<label for="add-game-name" class="form-control-label">Name:</label>
										<input type="text" class="form-control" id="add-game-name" v-model="addForm.name" placeholder="Rocket League">
									</div>
									<div class="form-group">
										<label for="add-game-short" class="form-control-label">Short Name:</label>
										<input type="text" class="form-control" id="add-game-short" v-model="addForm.short_name" placeholder="RL">
									</div>
									<div class="form-group">
										<label for="add-game-slug" class="form-control-label">Slug:</label>
										<input type="text" class="form-control" id="add-game-slug" v-model="addForm.slug" placeholder="rocket-league">
									</div>
									<div class="form-group">
										<label for="add-game-slug" class="form-control-label">Platform:</label>
										<select class="form-control" v-model="addForm.platform_id">
											<option v-for="platform in platforms" value="{{ platform.id }}">{{ platform.name }}</option>
										</select>
										<small id="emailHelp" class="form-text text-muted">This form does not support adding multiple games.</small>
									</div>
								</form>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="button" class="btn btn-primary" @click="newGame">Send message</button>
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
				games: [],
				platforms: [],
				addForm: {
					name: '',
					short_name: '',
					slug: '',
					banner: '',
					logo: '',
					platform_id: ''
				}
			};
		},

		ready() {
			this.getGamesAndPlatforms();

			$('#modal-add-game').on('shown.bs.modal', () => {
                $('#add-game-name').focus();
            });
		},

		methods: {
			getGamesAndPlatforms() {
				this.$http.get('/api/games').then(response => {
					this.$set('games', response.json());
				});
				this.$http.get('/api/platforms').then(response => {
					this.$set('platforms', response.json());
				});
			},

			newGame() {
				this.$http.post('/api/games', this.addForm).then(response => {
					this.getGamesAndPlatforms();
					this.addForm.name = '';
					this.addForm.short_name = '';
					this.addForm.slug = '';
					this.addForm.banner = '';
					this.addForm.logo = '';
					$('#modal-add-game').modal('hide');
				});
			},

			showNewGameForm() {
				$('#modal-add-game').modal('show');
			},

			destroy(game) {
				this.$http.delete('/api/games/' + game.id).then(response => {
                    this.getGamesAndPlatforms();
                });
			}
		}
	}
</script>