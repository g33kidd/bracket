@extends('layouts.app')

@section('content')

<div class="container m-t-2">
	@foreach($users as $user)
		<h3><a href="/players/{{ $user->username }}">{{ $user->username }}</a></h3>
	@endforeach
</div>

@endsection