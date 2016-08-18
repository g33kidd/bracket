<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    
	public function members()
	{
        return $this->belongsToMany('App\Models\User', 'team_user');
	}

	public function tournaments()
	{
		return $this->belongsToMany('App\Models\Tournament', 'team_tournament');
	}

}
