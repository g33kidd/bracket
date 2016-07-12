You have been invited to join team <b>{{$team->name}}</b>.<br><br>
Click here to join: <a href="{{route('teams.accept_invite', $invite->accept_token)}}">{{route('teams.accept_invite', $invite->accept_token)}}</a>
