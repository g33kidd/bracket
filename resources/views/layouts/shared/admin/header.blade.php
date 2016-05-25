<nav class="navbar navbar-full navbar-dark bg-inverse">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/admin') }}">Bracket Admin</a>
    <ul class="nav navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin') }}">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin/games') }}">Games</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin/platforms') }}">Platforms</a>
      </li>
    </ul>

    @include('layouts.shared.user-dropdown')
  </div>
</nav>
