<?php

namespace App\Models;

use App\Models\Team;
use App\Traits\Users\HasTeams;
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

    /**
     * The attributes that should be mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'name', 'password'
    ];

    public function acceptInvite($invite)
    {
        $this->teams()->toggle($invite->team);
        $invite->delete();
    }

}
