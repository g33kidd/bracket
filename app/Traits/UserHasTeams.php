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
		return (
			Team::where('owner_id', '=', $this->getKey())
				->where('id', '=', $team->id)->first()
		) ? true : false;
	}

	public function attachTeam($team, $pivotData = [])
	{
		$this->load('teams');

		if(!$this->teams->contains($team)) {
			$this->teams()->attach($team, $pivotData);
			if($this->relationLoaded('teams')) {
				$this->load('teams');
			}
		}

		return $this;
	}

	public function detachTeam($team)
	{
		$this->teams()->detach($team);
		if($this->relationLoaded('teams')) {
			$this->load('teams');
		}

		if($this->teams()->count() === 0 || $this->primary_team_id === $team->id) {
			$this->primary_team_id = null;
			$this->save();

			if($this->relationLoaded('primaryTeam')) {
				$this->load('primaryTeam');
			}
		}

		return $this;
	}

	public function attachTeams($teams)
	{
		foreach($teams as $team)
		{
			$this->attachTeam($team);
		}

		return $this;
	}

	public function detachTeams($teams)
	{
		foreach($teams as $team)
		{
			$this->detachTeam($team);
		}

		return $this;
	}

}