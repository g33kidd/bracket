<?php
namespace App\Traits\Teams;

use App\Models\User;

trait TeamTrait {

	// Invites a user to a team.
	public function invite(User $user)
	{
		$token = md5(uniqid(microtime()));
		// $invite = TeamInvitation::create([]);
		$notification = new ReceivedTeamInvitation($this, $token);
		return $user->notify($notification);
	}

	// Should re-send the invitation based on the invitation $id.
	public function resendInvite() { return false; }

	// Removes a user from a team.
	public function removeUser(User $user)
	{
		return $this->members()->toggle($user);
	}

	public function hasMember(User $user)
	{
		return $this->members()->where('id', "=", $user->id)->first() ? true : false;
	}

	public function owner()
	{
		return $this->hasOne('App\Models\User', 'id', 'owner_id');
	}

	public function invites()
	{
		// should return all the invites that have been sent out! 
	}

	public function members()
	{
		return $this->belongsToMany('App\Models\User', 'team_user')
					->withPivot(['is_admin']);
	}

}