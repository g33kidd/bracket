<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    public $timestamps = false;

    protected $fillable = ['name', 'short_name', 'banner', 'logo'];

    public function games()
    {
        return $this->belongsToMany('App\Models\Game', 'platform_game');
    }
}
