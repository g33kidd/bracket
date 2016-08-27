<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    /**
     * The attributes that should be mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'content', 'excerpt', 'status'
    ];

	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}

}
