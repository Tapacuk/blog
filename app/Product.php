<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'slug', 'price', 'priceText',
    ];
    
    protected $guarded = ['id'];
    
    public function pcategories()
    {
    		return $this->belongsToMany('App\Pcategory')->withTimestamps();
    }
}
