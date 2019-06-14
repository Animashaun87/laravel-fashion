<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Gloudemans\Shoppingcart\Contracts\Buyable;
class Product extends Model implements Buyable
{
    use softDeletes;
    public function category()
    {
    	return $this->belongsTo(Category::class)->withTrashed();
    }
    public function getBuyableIdentifier($options = null) {
    	return $this->id;
    }
    public function getBuyableDescription($options = null) {
    	return $this->name;
    }
    public function getBuyablePrice($option = null) {
    	return $this->price/100;
    }

}
