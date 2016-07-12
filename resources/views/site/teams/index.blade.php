@extends('layouts.app')

@section('content')

<div class="container m-t-2">
	<div class="row">
		<div class="col-md-9">
			<div class="m-b-1 clearfix">
				<h3 class="pull-left">My Teams</h3>
				<a class="pull-right btn btn-primary" href="{{route('teams.create')}}">
					Create Team
				</a>
      </div>
			<table class="table">
				<thead class="thead-inverse">
					<tr>
						<th>Name</th>
						<th>Status</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($teams as $team)
					<tr>
						<td>{{ $team->name }}</td>
						<td>
							@if(auth()->user()->isOwnerOfTeam($team))
								<span class="label label-success">Owner</span>
							@else
								<span class="label label-primary">Member</span>
							@endif
						</td>
						<td>
							@if(is_null(auth()->user()->currentTeam) || auth()->user()->currentTeam->getKey() !== $team->getKey())
                  <a href="{{route('teams.switch', $team)}}" class="btn btn-sm btn-default">
                      <i class="fa fa-sign-in"></i> Switch
                  </a>
              @else
                  <span class="label label-default">Current team</span>
              @endif

              <a href="{{route('teams.members.show', $team)}}" class="btn btn-sm btn-default">
                  <i class="fa fa-users"></i> Members
              </a>

              @if(auth()->user()->isOwnerOfTeam($team))

                  <a href="{{route('teams.edit', $team)}}" class="btn btn-sm btn-default">
                      <i class="fa fa-pencil"></i> Edit
                  </a>

                  <form style="display: inline-block;" action="{{route('teams.destroy', $team)}}" method="post">
                      {!! csrf_field() !!}
                      <input type="hidden" name="_method" value="DELETE" />
                      <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> Delete</button>
                  </form>
              @endif
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>

		</div>
	</div>
</div>

@endsection
