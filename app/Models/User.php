<?php

namespace App\Models;

use App\Models\Team;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Post relationship
    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    public function teams()
    {
        return $this->belongsToMany('App\Models\Team', 'team_user');
    }

    // This should join a team, if they have been invited.
    public function join(Team $team)
    {
        
    }

}
