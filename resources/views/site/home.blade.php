@extends('layouts.app')

@section('content')
	<div class="container m-t-2 m-b-2">
		<div class="row">
			<div class="col-md-6">
				<passport-clients></passport-clients>
				<personal-access-tokens></personal-access-tokens>
				<authorized-clients></authorized-clients>
			</div>
			<div class="col-md-6">
			</div>
		</div>
	</div>
@endsection
