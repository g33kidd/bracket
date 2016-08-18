<?php
namespace App\Traits\Teams;

use App\Models\Team;

trait HasTeams {

	// toggle the membership.
	// Should be checked if there needs to be an invitation.
	public function toggle(Team $team)
	{
		return $this->teams()->toggle($team);
	}

	// define the relationship
	public function teams()
	{
		return $this->belongsToMany('App\Models\Team', 'team_user')
					->withPivot(['is_admin']);
	}

}