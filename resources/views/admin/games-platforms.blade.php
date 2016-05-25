@extends('layouts.admin')

@section('content')
<div class="row">
  <div class="col-md-3">
    @include('admin.partials.games-card')
    @include('admin.partials.platforms-card')
  </div>
  <div class="col-md-9">
    @yield('main')
  </div>
</div>
@endsection
