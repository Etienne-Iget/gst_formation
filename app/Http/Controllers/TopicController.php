<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except(['welcome','show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        $topics = Topic::latest()->paginate(10);
        return view('/welcome', compact('topics'));
    }
    public function index()
    {
        $topics = Topic::latest()->paginate(10);
        return view('/dashboard', compact('topics'));
    }
    public function mesPosts()
    {
        $id=auth()->user()->id;
        $topics = Topic::where('user_id',$id)->latest()->paginate(10);
        return view('/postes', compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = $request->validate([
            'title'=>'required',
            'content'=>'required',
        
        ]);
      
        $topic=Topic::create(['user_id' => auth()->id()] + $data);
       
        return redirect::route('topic.show', $topic->id);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic, $id)
    {
        
        $comments= Comment::where('commentable_id',$id)->latest()->paginate(3);
        $topic = Topic::where('id',$id)->get();
        
        return view('show', ['topic'=>$topic, 'comments'=>$comments]);
       
    }

    public function showFromNotification(Topic $topic, DatabaseNotification $notification)
    {
        
        $notification->markAsRead();

        $comments= Comment::where('commentable_id',$topic->id)->latest()->paginate(3);
        $topic = Topic::where('id',$topic->id)->get();
        
        return view('show', ['topic'=>$topic, 'comments'=>$comments]);  
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic, $id)
    {
        $user=Auth()->id();
        $topic = Topic::where('id',$id)->get();
        foreach($topic as $topics) 
        $user_id= $topics->user_id;
        // dd($user_id);
            if($user === $user_id) {

                $topic = Topic::where('id',$id)->get();
                return view('/edit', compact('topic'));
            
            } else {
                return view('/show', compact('topic'))->with('success', 'Vous etes paas autoris??');
            }
      
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topic $topic, $id)
    {
        

        $user=Auth()->id();
        $topic = Topic::where('id',$id)->get();
        foreach($topic as $topics) 
        $user_id= $topics->user_id;
        // dd($user_id);
            if($user === $user_id) {

                $data = $request->validate([
                    'title'=>'required',
                    'content'=>'required',
                ]);
                DB::table('topics')
                    ->where('id', $id)
                    ->update($data);
                
                $topic = Topic::where('id',$id)->get();
                return view('/show', compact('topic'));
            
            } else {
                return view('/show', compact('topic'))->with('success', 'Vous etes paas autoris??');
            }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic, $id)
    {
        $user=Auth()->id();
        $topic = Topic::where('id',$id)->get();
        foreach($topic as $topics) 
        $user_id= $topics->user_id;
        
        // dd($user_id);
            if($user === $user_id) {

                DB::table('topics')->where('id', '=', $id)->delete();
                return redirect('/user/dashboard')->with('success', 'La poste supprimer avec succ??s');
            
            } else {
                return view('/show', compact('topic'))->with('success', 'Vous etes paas autoris??');
            }
      
      
    }
}
