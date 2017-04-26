<?php

namespace App\Http\Controllers;

use App\Excersise;
use App\Group;
use Illuminate\Http\Request;

class AppController extends Controller
{
	function __construct() {
		$this->middleware('auth');
	}


	public function index() {
		$excersises = Excersise::all();
		return view('app.index')->with('excersises',$excersises);
    }

	public function waiting() {
		$excersises = Excersise::whereHas('solutions', function ($query) {
			$query->where('is_good',0);
		})->get();
		return view('app.index')->with('excersises',$excersises);
    }

	public function solved() {
		$excersises = Excersise::whereHas('solutions', function ($query) {
			$query->where('is_good',1);
		})->get();
		return view('app.index')->with('excersises',$excersises);
    }

	public function notgood() {
		$excersises = Excersise::whereHas('solutions', function ($query) {
			$query->where('is_good',2);
		})->get();
		return view('app.index')->with('excersises',$excersises);
    }

	public function notsolved() {
		$excersises = Excersise::doesntHave('solutions')->get();
		return view('app.index')->with('excersises',$excersises);
    }

    public function groups() {
		$groups = Group::all();
		return view('app.groups')->with('groups', $groups);
    }

	public function group( $id ) {
		$excersises = Excersise::where('group_id', $id)->get();
		return view('app.group')->with('excersises',$excersises);
    }
}
