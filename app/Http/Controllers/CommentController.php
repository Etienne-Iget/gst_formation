<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Notifications\NewCommentPosted;

class CommentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function store(Topic $topic, $id)
    {
        
        request()->validate([
            'content'=>'required'
        ]);

        $topic = Topic::find($id);

        $comment = new Comment();
        $comment->content=request('content');
        $comment->user_id = auth()->user()->id;
            
        $topic->comments()->save($comment);

        //Notification
        $topic->user->notify(new NewCommentPosted($topic, auth()->user()));

        return redirect()->route('topic.show', $id);
       
    }

    public function storeCommentReply(Comment $comment){

        request()->validate([
            'replyComment'=>'required'
        ]);

        $comment = Comment::find($comment->id);

        $commentReply = new comment();
        $commentReply->content = request('replyComment');
        $commentReply->user_id = auth()->user()->id;

        $comment->comments()->save($commentReply);

       
        return redirect()->back();

    }
}
