<?php

namespace App\Http\Controllers;

use App\Excersise;
use App\Solution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SolutionController extends Controller
{


	public function __construct() {
		$this->middleware('auth');
	}

	public function index($id) {
		$excersise = Excersise::find($id);
		return view('app.solution')->with('excersise', $excersise);
    }

	public function sendSolution($id, Request $request) {
		$excersise = Excersise::find($id);
		$solution_input = $request->input('solution');
		if($excersise->userSolution()) {
			$solution = $excersise->userSolution();
			$solution->solution = $solution_input;
			$solution->is_good = 0;
			$solution->save();

		} else {
			$solution = new Solution();
			$solution->solution = $solution_input;
			$solution->user_id = Auth::user()->id;
			$solution->excersise_id = $id;
			$solution->comment = '';
			$solution->is_good = 0;
			$solution->save();
		}

		return redirect(route('solution', $id));
    }
}
