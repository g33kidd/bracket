@extends('layouts.app')

@section('content')
<div class="container m-t-2">
    <div class="row">
        @if(Auth::user())
            <div class="col-md-12">
              <div class="jumbotron">
                <h1 class="display-1">Homepage</h1>
                <p class="lead">Some placeholder text until something gets put here..</p>
                <hr class="m-y-2">
                <p class="lead">You are now logged in! Checkout the dropdown on the top-right of the screen to get started.</p>
              </div>
            </div>
        @else
            <div class="col-md-6">
                <h1>Games</h1>
                @foreach($games as $game)
                    <div>{{$game->name}}</div>
                @endforeach
            </div>
            <div class="col-md-6">
                <h1>Platforms</h1>
                @foreach($platforms as $platform)
                    <div>{{$platform->name}}</div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection
