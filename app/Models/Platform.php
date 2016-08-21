<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    public $timestamps = false;

    /**
     * The attributes that should be mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'short_name', 'slug', 'logo', 'banner'
    ];

    public function games()
    {
        return $this->belongsToMany('App\Models\Game', 'platform_game');
    }
}
