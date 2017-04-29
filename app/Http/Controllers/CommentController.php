<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->comment = $request->input('comment');
        $comment->user_id = Auth::user()->id;
        $comment->solution_id = $request->input('solution_id');
        $comment->save();

        return redirect(route('solution', $comment->solution_id));
    }

    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        if($comment->user_id != Auth::user()->id) {
            return redirect(route('/'));
        }
        return view('app.editComment', compact('comment'));
    }

    public function update($id, Request $request)
    {
        $comment = Comment::findOrFail($id);
        if($comment->user_id != Auth::user()->id) {
            return redirect(route('/'));
        }
        $comment->comment = $request->input('comment');
        $comment->save();
        return redirect(route('solution', $comment->solution_id));
    }

    public function delete($id)
    {
        $comment = Comment::findOrFail($id);
        if($comment->user_id != Auth::user()->id) {
            return redirect(route('/'));
        }
        $solution_id = $comment->solution_id;
        $comment->delete();
        return redirect(route('solution', $solution_id));

    }
}
