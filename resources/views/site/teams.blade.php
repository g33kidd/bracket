@extends ('layouts.app')

@section('content')
@foreach($teams as $team)
	<h1>{{ $team->name }}</h1>
@endforeach
@endsection