<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    
    // A tournament can have many teams, a team can have many tournaments.
	public function teams()
	{
		return $this->belongsToMany('App\Models\Team', 'team_tournament');
	}

}
