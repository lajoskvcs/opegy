<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use Irazasyed\LaravelGAMP\Facades\GAMP;

class CommentController extends Controller
{
    function __construct() {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->comment = $request->input('comment');
        $comment->user_id = Auth::user()->id;
        $comment->solution_id = $request->input('solution_id');
        $comment->save();


        $gamp = GAMP::setClientId( Auth::user()->id );
        $gamp->setEventCategory('Comment')
            ->setEventAction('Send')
            ->setEventLabel('')
            ->sendEvent();

        return redirect(route('solution', $comment->solution_id));
    }

    public function edit($id)
    {
        $gamp = GAMP::setClientId( Auth::user()->id );
        $gamp->setDocumentPath( route(Route::currentRouteName()) );
        $gamp->sendPageview();

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

        $gamp = GAMP::setClientId( Auth::user()->id );
        $gamp->setEventCategory('Comment')
            ->setEventAction('Update')
            ->setEventLabel('')
            ->sendEvent();
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

        $gamp = GAMP::setClientId( Auth::user()->id );
        $gamp->setEventCategory('Comment')
            ->setEventAction('Delete')
            ->setEventLabel('')
            ->sendEvent();
        return redirect(route('solution', $solution_id));

    }
}
