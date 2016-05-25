@extends('admin.games-platforms')

@section('main')
<div class="row">
  <div class="col-md-9">
    @include('admin.partials.game-table')
  </div>
  <div class="col-md-3">
    @include('admin.partials.games-actions')
  </div>
</div>
@endsection
