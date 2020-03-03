<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';

    public function product()
    {
    	return $this->belongsTo('App\Product');
    }

    public function customer()
    {
    	return $this->belongsTo('App\Customer');
    }
}
