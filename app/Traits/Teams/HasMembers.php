<?php
namespace App\Traits\Teams;

use App\Models\User;

trait HasMembers {

	// Invites a user to a team.
	public function invite(User $user)
	{
		$token = md5(uniqid(microtime()));
		// $invite = TeamInvitation::create([]);
		$notification = new ReceivedTeamInvitation($this, $token);
		return $user->notify($notification);
	}

	// Should re-send the invitation based on the invitation $id.
	public function resentInvite() { return false; }

	// Removes a user from a team.
	public function removeUser(User $user)
	{
		return $this->members()->toggle($user);
	}

	public function members()
	{
		return $this->belongsToMany('App\Models\User', 'team_user')
					->withPivot(['is_admin']);
	}

}