<nav class="navbar navbar-full navbar-light bg-faded">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">Bracket</a>
    <ul class="nav navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/home') }}">Home</a>
      </li>
    </ul>

    @include('layouts.shared.user-dropdown')
  </div>
</nav>
