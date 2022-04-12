<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forum;
use App\Comment;
use Auth;

class CommentController extends Controller
{
    public function addComment(Request $request, Forum $forum)
    {
        $comment = New Comment;
        $comment->user_id = Auth::user()->id;
        $comment->content = $request->content;

        $forum->comments()->save($comment);

        return back()->with('sukses','Komentar berhasil dikirim!');
    }

    public function replyComment(Request $request, Comment $comment)
    {
        $reply = New comment;
        $reply->user_id = Auth::user()->id;
        $reply->content = $request->content;

        $comment->comments()->save($reply);

        return back()->with('sukses','Komentar balasan berhasil dikirim!');;
    }
}
