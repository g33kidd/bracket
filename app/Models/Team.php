<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Notifications\ReceivedTeamInvitation;
use App\Traits\Teams\HasMembers;

class Team extends Model
{
	use HasMembers;
    
    // A team can have many members.
	public function members()
	{
        return $this->belongsToMany('App\Models\User', 'team_user')->withPivot(['is_admin']);
	}

	// A team can be signed-up for many tournaments.
	public function tournaments()
	{
		return $this->belongsToMany('App\Models\Tournament', 'team_tournament')->withPivot(['checked_in', 'disqualified']);
	}

	// This should invite a user to the team and send them an email.
	public function invite(User $user)
	{
		$token = md5(uniqid(microtime()));
		$user->notify(new ReceivedTeamInvitation($this, $token));
		return true;
		// $token = str_random(22);
		// $invite = TeamInvitation::create([
		// 	'user_id' => $user->id,
		// 	'team_id' => $this->id,
		// 	'token'	=> $token,
		// ]);
	}

	public function remove(User $user)
	{
		return $this->members()->toggle($user);
	}

}
