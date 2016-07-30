<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    public $timestamps = false;

    public function games()
    {
        return $this->belongsToMany('App\Models\Game', 'platform_game');
    }
}
