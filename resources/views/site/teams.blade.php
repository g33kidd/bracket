@extends ('layouts.app')

@section('content')
	<div class="container m-t-2">
		<h1>Just a list of teams.</h1>
		@foreach($teams as $team)
			<h4>{{ $team->name }}</h4>
		@endforeach
	</div>
@endsection