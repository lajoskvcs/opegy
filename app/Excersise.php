<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Excersise extends Model
{
    protected $table='excersises';



	public function group() {
		return $this->belongsTo('App\Group');
	}

	public function solutions() {
		return $this->hasMany('App\Solution');
	}

	public function getSolution($id) {
		return $this->solutions()->where('user_id',$id)->first();
	}

	public function userSolution() {
		return $this->solutions()->where('user_id',Auth::user()->id)->first();
	}
}
