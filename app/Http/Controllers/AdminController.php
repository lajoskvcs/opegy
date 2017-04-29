<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Excersise;
use App\Group;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Solution;
use App\User;
use Illuminate\Http\Request;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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

        foreach($solution->comments as $comment) {
            $comment->resolved = 1;
            $comment->save();
        }
		return \Redirect::back();
    }

    public function markBad($id) {

		$solution = Solution::findOrFail($id);

		$solution->is_good = 2;
		$solution->save();

		foreach($solution->comments as $comment) {
		    $comment->resolved = 1;
		    $comment->save();
        }

		return \Redirect::back();
	}

	public function getSolution($id) {
		$solution = Solution::findOrFail($id);
		return view('admin.getSolution', compact('solution'));
	}


    public function listExcersises()
    {
        $excersises = Excersise::all();
        return view('admin.listExcersises', compact('excersises'));
	}

    public function getExcersise($id)
    {
         $excersise = Excersise::findOrFail($id);
        return view('admin.getExcersise', compact('excersise'));
    }

    public function editExcersise($id)
    {
        $groups = Group::all();
        $excersise = Excersise::findOrFail($id);
        return view('admin.editExcersise', compact('excersise', 'groups'));
	}

    public function updateExcersise($id, Request $request)
    {
        $excersise = Excersise::findOrFail($id);
        $excersise->name = $request->input('name');
        $excersise->group_id = $request->input('group');
        $excersise->excersise = $request->input('excersise');
        $excersise->save();
        return \Redirect::route('admin:excersise:get', $id);
	}

    public function deleteExcersise($id)
    {
        $excersise = Excersise::findOrFail($id);
        $excersise->delete();
        return \Redirect::route('admin:excersise:list');
	}


    public function addExcersise()
    {
        $groups = Group::all();
        return view('admin.addExcersise', compact('groups'));
    }

    public function storeExcersise(Request $request)
    {
        $excersise = new Excersise();

        $excersise->name = $request->input('name');
        $excersise->group_id = $request->input('group');
        $excersise->excersise = $request->input('excersise');
        $excersise->save();
        return \Redirect::route('admin:excersise:get', $excersise->id);
    }

    public function listGroups()
    {
        $groups = Group::all();
        return view('admin.listGroups', compact('groups'));
    }

    public function addGroup()
    {
        return view('admin.addGroup');
    }

    public function storeGroup(Request $request)
    {
        $group = new Group();
        $group->name = $request->input('name');
        $group->save();

        return \Redirect::route('admin:group:list');
    }

    public function editGroup($id)
    {
        $group = Group::findOrFail($id);
        return view('admin.editGroup', compact('group'));
    }

    public function updateGroup($id, Request $request)
    {
        $group = Group::findOrFail($id);
        $group->name = $request->input('name');
        $group->save();
        return \Redirect::route('admin:group:list');
    }

    public function deleteGroup($id)
    {
        $group = Group::findOrFail($id);
        $group->delete();
        return \Redirect::route('admin:group:list');
    }

    public function listUsers()
    {
        $users = User::all();
        return view('admin.listUsers', compact('users'));
    }

    public function getUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.getUser', compact('user'));
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        if($user->level == 2) {
            return \Redirect::route('admin:user:list');
        }
        $user->delete();
        return \Redirect::route('admin:user:list');
    }

    public function storeComment(Request $request)
    {
        $comment = new Comment();
        $comment->comment = $request->input('comment');
        $comment->user_id = Auth::user()->id;
        $comment->solution_id = $request->input('solution_id');
        $comment->save();

        return redirect(route('admin:getSolution', $comment->solution_id));
    }

    public function editComment($id)
    {
        $comment = Comment::findOrFail($id);
        return view('admin.editComment', compact('comment'));
    }

    public function updateComment($id, Request $request)
    {
        $comment = Comment::findOrFail($id);
        $comment->comment = $request->input('comment');
        $comment->save();
        return redirect(route('admin:getSolution', $comment->solution_id));
    }

    public function deleteComment($id)
    {
        $comment = Comment::findOrFail($id);
        $solution_id = $comment->solution_id;
        $comment->delete();
        return redirect(route('admin:getSolution', $solution_id));

    }

    public function makeAdmin($id)
    {
        $user = User::findOrFail($id);
        return view('admin.makeAdmin', compact('user'));
    }

    public function storeAdmin($id)
    {
        $user = User::findOrFail($id);
        $user->level = 2;
        $user->save();
        return redirect(route('admin:user:get',$user->id));
    }

}
