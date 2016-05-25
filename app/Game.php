<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public $timestamps = false;

    public function platform() {
      return $this->belongsTo('App\Platform', 'platform_id');
    }
}
