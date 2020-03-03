<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
	protected $table = 'transactions';

    public function transactioncategory()
    {
    	new Request();
    	return $this->belongsTo('App\Transactioncategory','category_id');
    }
}
