<template>
	<div class="container m-t-2">
		<div v-if="games.length > 0">
			<table className="table table-sm">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Short Name</th>
						<th>Slug</th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="game in games">
						<td>{{ game.id }}</td>
						<td>{{ game.name }}</td>
						<td>{{ game.short_name }}</td>
						<td>{{ game.slug }}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</template>

<script>
	export default {

		data() {
			return {
				games: [],
				platforms: []
			};
		},

		ready() {
			this.getGames();
			this.getPlatforms();
		},

		methods: {
			getGames() {
				this.$http.get('/api/games').then(response => {
					this.$set('games', response.json());
				});
			},
			getPlatforms() {
				this.$http.get('/api/platforms').then(response => {
					this.$set('platforms', response.json());
				});
			}
		}

	}
</script>