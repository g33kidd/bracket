@extends('layouts.admin')

@section('content')
<div class="row">
  <div class="col-md-9">
    Platforms Table or something similar
  </div>
  <div class="col-md-3">
    <div class="panel panel-default actions-panel">
      <div class="panel-heading">Actions</div>
      <div class="list-group">
        <a class="list-group-item" href="{{ url('/admin/platforms') }}">Platforms Overview</a>
        <a class="list-group-item" href="{{ url('/admin/platforms/create') }}">Add Platform</a>
        <a class="list-group-item" href="{{ url('/admin/games') }}">Manage Games</a>
      </div>
    </div>
  </div>
</div>
@endsection
