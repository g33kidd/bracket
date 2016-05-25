@extends('layouts.admin')

@section('content')
<div class="row">
  <div class="col-md-9">
    Games Table or something of the likes
  </div>
  <div class="col-md-3">
    <div class="panel panel-default actions-panel">
      <div class="panel-heading">Actions</div>
      <div class="list-group">
        <a class="list-group-item" href="{{ url('/admin/games') }}">Games Overview</a>
        <a class="list-group-item" href="{{ url('/admin/games/create') }}">Add Game</a>
        <a class="list-group-item" href="{{ url('/admin/platforms') }}">Manage Platforms</a>
      </div>
    </div>
  </div>
</div>
@endsection
