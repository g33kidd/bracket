<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamInvite extends Model
{
	// will do with comments some time later.. yeah? lol
	public function getFromToken($token)
	{
		return $this->where('accept_token', '=', $token)->first();
	}

    public function team()
    {
    	return $this->hasOne('App\Models\Team', 'id', 'team_id');
    }

    public function user()
    {
    	return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
