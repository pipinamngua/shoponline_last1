<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuggestProduct extends Model
{
     public function product()
    {
    	return $this->belongsTo('App\Product', 'redirect_to_product_id', 'id');
    }
}
