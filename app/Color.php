<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
	protected $table = 'colors';

    public function products()
    {
    	return $this->morphMany('App\Product','taggable');
    }
}
