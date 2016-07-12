<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public $timestamps = false;

    public function platforms()
    {
        return $this->belongsToMany('App\Platform', 'platform_game');
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
