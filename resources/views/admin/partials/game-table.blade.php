<table class="table table-sm">
  <thead>
    <tr>
      <th>id</th>
      <th>Game</th>
      <th>Slug</th>
      <th>Consoles</th>
    </tr>
  </thead>
  <tbody>
    @foreach(App\Game::all() as $game)
    <tr>
      <th scope="row">{{ $game->id }}</th>
      <td>{{ $game->name }}</td>
      <td>{{ $game->slug }}</td>
      <td>
        @foreach($game->platforms as $platform)
          <span class="label label-default">{{ $platform->name }}</span>
        @endforeach
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
