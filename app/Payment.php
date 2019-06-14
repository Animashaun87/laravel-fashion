<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;
    
    function user() {
    	return $this->belongsTo(User::class, 'user_id')->withTrashed();
    	//return $this->belongsTo(Category::class)->withTrashed();
    }
    function orders() {
    	return $this->hasMany(Order::class);
    }
}
