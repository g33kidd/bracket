@extends('layouts.app')

@section('content')
<div class="container m-t-2">
    <div class="row">
        <div class="col-md-12">
          <div class="jumbotron">
            <h1 class="display-1">Homepage</h1>
            <p class="lead">You are a guest.</p>
            <hr class="m-y-2">
            <p class="lead"><a href="/register">Signup</a> or <a href="/login">Login</a></p>
            <p>There are {{$user_count}} users.</p>
          </div>
        </div>
    </div>

    <div class="row">
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
    </div>
</div>
@endsection
