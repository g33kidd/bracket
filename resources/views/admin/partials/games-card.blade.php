<div class="card">
  <div class="card-block">
    <h5 class="card-title">Games</h5>
    <p class="card-text">Games supported by your community.</p>
  </div>
  <div class="list-group list-group-flush">
    @foreach (App\Game::all() as $game)
    <a class="list-group-item" href="{{ url('/admin/games', $game->id) }}">
        <span class="label label-default label-pill pull-xs-right">{{ $game->platforms()->count() }}</span>
        {{ $game->name }}
    </a>
    @endforeach
  </div>
  <div class="card-block">
    <a href="{{ url('/admin/games') }}" class="card-link">Manage Games</a>
  </div>
</div>
