@extends('layouts.app')

@section('content')
<div class="container m-t-2">
	<div class="row">
		<div class="col-md-9">
			<div class="m-b-1 clearfix">
				<h3 class="pull-left">Manage Members 
					<span class="label label-default">{{ $team->name }}</span>
				</h3>
				<a class="pull-right btn btn-primary" href="{{route('teams.index')}}">
					View All Teams
				</a>
      </div>

      <table class="table">
      	<thead class="thead-inverse">
      		<tr>
      			<th>Username</th>
      			<th>Action</th>
      		</tr>
      	</thead>
      	<tbody>
      		@foreach($team->users as $user)
						<tr>
							<td>{{ $user->username }}</td>
							<td>
								@if(auth()->user()->isOwnerOfTeam($team))
                    @if(auth()->user()->getKey() !== $user->getKey())
                        <form style="display: inline-block;" action="{{route('teams.members.destroy', [$team, $user])}}" method="post">
                            {!! csrf_field() !!}
                            <input type="hidden" name="_method" value="DELETE" />
                            <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> Delete</button>
                        </form>
                    @endif
                @endif
							</td>
						</tr>
      		@endforeach
      	</tbody>
      </table>
		</div>

		<div class="col-md-3">
			<div class="card">
				<div class="card-header">Invite Users</div>
				<div class="card-block">
					<form method="post" action="{{route('teams.members.invite', $team)}}">
            {!! csrf_field() !!}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label class="form-control-label">E-Mail Address</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                @if ($errors->has('email'))
                  <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif
            </div>


            <div class="form-group">
              <button type="submit" class="btn btn-primary">
                Invite to Team
              </button>
            </div>
          </form>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-9">
			<div class="m-b-1 clearfix">
				<h3 class="pull-left">Team Invitations</h3>
      </div>
      <table class="table">
      	<thead>
      		<tr>
      			<th>Email Address</th>
      			<th>Actions</th>
      		</tr>
      	</thead>
      	<tbody>
      		@foreach($team->invites as $invite)
						<tr>
							<td>{{ $invite->email }}</td>
							<td>
								<a href="{{route('teams.members.resend_invite', $invite)}}" class="btn btn-sm btn-info pull-right">
                  Resend invite
                </a>
							</td>
						</tr>
      		@endforeach
      	</tbody>
      </table>
		</div>
	</div>
</div>
@endsection