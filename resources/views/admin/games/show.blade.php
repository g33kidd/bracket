@extends('layouts.admin')

@section('content')
<h1>{{ $game->name }} [{{ $game->platform->short_name }}]</h1>
@endsection
