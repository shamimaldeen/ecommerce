<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function brand()
    {
    	return $this->belongsTo('App\Brand');
    }

    public function color()
    {
    	return $this->belongsTo('App\Color');
    }

    public function wish()
    {
        return $this->belongsTo('App\Wish');
    }

    

}
