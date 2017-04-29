<?php

namespace App\Http\Controllers;

use App\Excersise;
use App\Solution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Irazasyed\LaravelGAMP\Facades\GAMP;

class SolutionController extends Controller
{

	public function __construct() {
		$this->middleware('auth');
	}

	public function index($id) {
        $gamp = GAMP::setClientId( Auth::user()->id );
        $gamp->setDocumentPath( route(\Route::currentRouteName(), $id) );
        $gamp->sendPageview();

		$excersise = Excersise::findOrFail($id);
		return view('app.solution')->with('excersise', $excersise);
    }

	public function sendSolution($id, Request $request) {

        $gamp = GAMP::setClientId( Auth::user()->id );

		$excersise = Excersise::findOrFail($id);
		$solution_input = $request->input('solution');
		if($excersise->userSolution()) {
			$solution = $excersise->userSolution();
			$solution->solution = $solution_input;
			$solution->is_good = 0;
			$solution->save();

            $gamp->setEventCategory('Solution')
                ->setEventAction('Update')
                ->setEventLabel('user solution')
                ->sendEvent();

		} else {
			$solution = new Solution();
			$solution->solution = $solution_input;
			$solution->user_id = Auth::user()->id;
			$solution->excersise_id = $id;
			$solution->save();

            $gamp->setEventCategory('Solution')
                ->setEventAction('Send')
                ->setEventLabel('user solution')
                ->sendEvent();
		}

		return redirect(route('solution', $id));
    }
}
