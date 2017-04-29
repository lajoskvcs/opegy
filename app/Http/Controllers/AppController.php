<?php

namespace App\Http\Controllers;

use App\Excersise;
use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Irazasyed\LaravelGAMP\Facades\GAMP;

class AppController extends Controller
{
	function __construct() {
		$this->middleware('auth');
	}


	public function index() {

        $gamp = GAMP::setClientId( Auth::user()->id );
        $gamp->setDocumentPath( route(\Route::currentRouteName()) );
        $gamp->sendPageview();

		$excersises = Excersise::all();
		return view('app.index')->with('excersises',$excersises);
    }

	public function waiting() {
        $gamp = GAMP::setClientId( Auth::user()->id );
        $gamp->setDocumentPath( route(\Route::currentRouteName()) );
        $gamp->sendPageview();

		$excersises = Excersise::whereHas('solutions', function ($query) {
			$query->where('is_good',0);
		})->get();
		return view('app.index')->with('excersises',$excersises);
    }

	public function solved() {
        $gamp = GAMP::setClientId( Auth::user()->id );
        $gamp->setDocumentPath( route(\Route::currentRouteName()) );
        $gamp->sendPageview();

		$excersises = Excersise::whereHas('solutions', function ($query) {
			$query->where('is_good',1);
		})->get();
		return view('app.index')->with('excersises',$excersises);
    }

	public function notgood() {
        $gamp = GAMP::setClientId( Auth::user()->id );
        $gamp->setDocumentPath( route(\Route::currentRouteName()) );
        $gamp->sendPageview();

		$excersises = Excersise::whereHas('solutions', function ($query) {
			$query->where('is_good',2);
		})->get();
		return view('app.index')->with('excersises',$excersises);
    }

	public function notsolved() {
        $gamp = GAMP::setClientId( Auth::user()->id );
        $gamp->setDocumentPath( route(\Route::currentRouteName()) );
        $gamp->sendPageview();

		$excersises = Excersise::doesntHave('solutions')->get();
		return view('app.index')->with('excersises',$excersises);
    }

    public function groups() {
        $gamp = GAMP::setClientId( Auth::user()->id );
        $gamp->setDocumentPath( route(\Route::currentRouteName()) );
        $gamp->sendPageview();

		$groups = Group::all();
		return view('app.groups')->with('groups', $groups);
    }

	public function group( $id ) {
        $gamp = GAMP::setClientId( Auth::user()->id );
        $gamp->setDocumentPath( route(\Route::currentRouteName()) );
        $gamp->sendPageview();

		$excersises = Excersise::where('group_id', $id)->get();
		return view('app.group')->with('excersises',$excersises);
    }
}
