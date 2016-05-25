@extends('admin.games-platforms')

@section('main')
<div class="row">
  <div class="col-md-8">
    @include('admin.partials.form.new-game')
  </div>
  <div class="col-md-3">
    @include('admin.partials.games-actions')
  </div>
</div>
@endsection
