<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table='group';

	public function excersises()
	{
		return $this->hasMany('App\Excersise');
	}
}
