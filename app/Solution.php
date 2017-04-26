<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    protected $table='solution';

	public function user() {
		return $this->belongsTo('App\User');
    }

	public function excersise() {
		return $this->belongsTo('App\Excersise');
    }
}
