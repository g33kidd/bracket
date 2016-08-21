<template>
	<div v-if="games.length > 0">
		<table class="table">
			<thead class="thead-default">
				<tr>
					<th scope="row">ID</th>
					<th>Name</th>
					<th>Short Name</th>
					<th>Slug</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="game in games">
					<th scope="row">{{ game.id }}</td>
					<td>{{ game.name }}</td>
					<td>{{ game.short_name }}</td>
					<td>{{ game.slug }}</td>
				</tr>
			</tbody>
		</table>

		
	</div>
</template>

<script>
	export default {
		data() {
			return {
				games: [],
				platforms: [],
				newGameForm: {
					name: '',
					short_name: ''
				}
			};
		},

		ready() {
			this.getGamesAndPlatforms();
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

			}
		}
	}
</script>