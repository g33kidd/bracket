<?php

namespace App\Models;

use App\Models\Team;
use App\Traits\Teams\HasTeams;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasTeams, HasApiTokens, Notifiable;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function teams()
    {
        return $this->belongsToMany('App\Models\Team', 'team_user');
    }

    // This should join a team, if they have been invited.
    // Currently it just toggles between joined and not-joined.
    // Teams also need roles for users...
    public function toggleTeam(Team $team)
    {
        return $this->teams()->attach($team);
    }

}
