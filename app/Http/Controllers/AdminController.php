<?php

namespace App\Http\Controllers;

use App\Solution;
use Illuminate\Http\Request;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
	public function __construct() {
		$this->middleware('auth');
		$this->middleware(AdminMiddleware::class);

    }

	public function index() {
		$solutions = Solution::where('is_good', 0)->orderby('excersise_id')->get();
		return view('admin.index')->with(compact('solutions'));
    }

	public function badSolutions() {
		$solutions = Solution::where('is_good', 2)->orderby('excersise_id')->get();
		return view('admin.index')->with(compact('solutions'));
	}

	public function solvedSolutions() {
		$solutions = Solution::where('is_good', 1)->orderby('excersise_id')->get();
		return view('admin.index')->with(compact('solutions'));
	}

	public function markSolved($id) {

		$solution = Solution::findOrFail($id);

		$solution->is_good = 1;
		$solution->save();
		return \Redirect::back();
    }

    public function markBad($id) {

		$solution = Solution::findOrFail($id);

		$solution->is_good = 2;
		$solution->save();
		return \Redirect::back();
	}

	public function getSolution($id) {
		$solution = Solution::findOrFail($id);
		return view('admin.getSolution', compact('solution'));

	}
}
