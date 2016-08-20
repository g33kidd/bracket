<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
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

    public function platforms()
    {
        return $this->belongsToMany('App\Models\Platform', 'platform_game');
    }

    public function toArray()
    {
    	$data = parent::toArray();

        if ($this->platforms) {
            $data['platforms'] = $this->platforms->toArray();
        } else {
            $data['platforms'] = null;
        }

        return $data;
    }
}
