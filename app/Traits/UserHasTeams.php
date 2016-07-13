<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

use App\Team;
use App\User;
use App\TeamInvite;

trait UserHasTeams
{

	public function teams()
	{
		return $this->belongsToMany(Team, User, 'user_id', 'team_id')->withTimestamps();
	}

	public function primaryTeam()
	{
		return $this->hasOne(Team, 'id', 'primary_team_id');
	}

	public function ownedTeams()
	{
		return $this->teams()->where('owner_id', '=', $this->getKey());
	}

	public function invites()
	{
		return $this->hasMany(TeamInvite, 'email', 'email');
	}

	public function isTeamOwner($team)
	{
		
	}

}