<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactioncategory extends Model
{
	protected $table = 'transactioncategories';

	public function transactions()
    {
    	return $this->morphMany('App\Transaction');
    }
    
}
