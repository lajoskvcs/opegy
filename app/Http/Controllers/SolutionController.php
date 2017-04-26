<?php

namespace App\Http\Controllers;

use App\Excersise;
use App\Solution;
use Illuminate\Http\Request;

class SolutionController extends Controller
{


	public function __construct() {
		$this->middleware('auth');
	}

	public function index($id) {
		$excersise = Excersise::find($id);
		return view('app.solution')->with('excersise', $excersise);
    }
}
