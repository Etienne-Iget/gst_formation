<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function store(Topic $topic, Request $request, $id)
    {
        
        request()->validate([
            'content'=>'required'
        ]);

        $topic = Topic::find($id);

        $comment = new Comment();
        $comment->content=request('content');
        $comment->user_id = auth()->user()->id;
            
        $topic->comments()->save($comment);

        $comments= Comment::where('commentable_id',$id)->get();
        // dd($comments);
        return redirect()->route('topic.show', $id);
        
        
    }
}
