<?php

namespace App\Http\Controllers;

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
		return view('admin.index');
    }
}
