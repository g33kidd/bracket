<div class="card">
  <div class="card-block">
    <h5 class="card-title">Consoles</h5>
    <p class="card-text">Platforms supported by your community.</p>
  </div>
  <div class="list-group list-group-flush">
    @foreach (App\Platform::all() as $platform)
    <a class="list-group-item" href="{{ url('/admin/platforms', $platform->id) }}">
        <span class="label label-default label-pill pull-xs-right">{{ $platform->games()->count() }}</span>
        {{ $platform->name }}
    </a>
    @endforeach
  </div>
  <div class="card-block">
    <a href="{{ url('/admin/platforms') }}" class="card-link">Manage Platforms</a>
  </div>
</div>
