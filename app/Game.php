<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public $timestamps = false;

    public function platforms() {
      return $this->belongsToMany('App\Platform', 'platform_game');
    }
}
