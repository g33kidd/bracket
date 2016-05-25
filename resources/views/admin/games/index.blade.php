@extends('admin.games-platforms')

@section('main')
<div class="row">
  <div class="col-md-9">
    Games Table or something of the likes
  </div>
  <div class="col-md-3">
    @include('admin.partials.games-actions')
  </div>
</div>
@endsection
