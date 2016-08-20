@extends ('layouts.app')

@section('content')
	<div class="container m-t-2">
		<h1>Just a list of teams.</h1>
		@foreach($teams as $team)
			<li>
				<p><b>{{ $team->name }}</b> | {{ $team->slug }}</p>
			</li>
		@endforeach
	</div>
@endsection