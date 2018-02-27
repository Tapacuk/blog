<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pcategory extends Model
{
    protected $guarded = ['id'];
    
    public function products()
    {
    		return $this->belongsToMany('App\Products')->withTimestamps();
    }
}
