<div class="panel panel-default">
  <div class="panel-heading">Games</div>
  <div class="panel-body">
    @foreach (App\Game::all() as $game)
      <div><a href="{{ url('/admin/games', $game->id) }}">{{ $game->name }}</a> [{{ $game->platforms()->count() }}]</div>
    @endforeach
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">Consoles</div>
  <div class="panel-body">
    @foreach (App\Platform::all() as $platform)
      <div><a href="{{ url('/admin/platforms', $platform->id) }}">{{ $platform->name }}</a></div>
    @endforeach
  </div>
</div>
