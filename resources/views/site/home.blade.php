@extends('layouts.app')

@section('content')

  <div class="container m-t-2 m-b-2">
    <div class="row">
      <div class="col-md-6">
        @include('site.partials.news')
        {{-- @include('site.partials.links') --}}
      </div>
      <div class="col-md-6">
        
      </div>
    </div>
  </div>

@endsection
