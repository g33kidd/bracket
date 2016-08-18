<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    
    // A team can have many members.
	public function members()
	{
        return $this->belongsToMany('App\Models\User', 'team_user');
	}

	// A team can be signed-up for many tournaments.
	public function tournaments()
	{
		return $this->belongsToMany('App\Models\Tournament', 'team_tournament');
	}

	// This should invite a user to the team and send them an email.
	public function invite(User $user)
	{

	}

}
