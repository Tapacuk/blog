<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
		protected $guarded = ['id'];
		
		public function ticket()
		{			
  		return $this->belongsTo('App\Ticket');
		}
		public function post()
		{
		  return $this->morphTo();
		}
		public function author() {
    return $this->belongsTo('App\User'); 
  }
}
