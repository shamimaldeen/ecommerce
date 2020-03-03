<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wish extends Model
{
    protected $table = 'wishes';

    public function product()
    {
    	return $this->belongsTo('App\Product');
    }
}
