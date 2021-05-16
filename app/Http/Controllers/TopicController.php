<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class TopicController extends Controller
{

    // public function __construct(){
    //     $this->middleware('auth')->except(['welcome','show']);
    // }
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
        // $topic=auth()->user()->topics()->create($data);
        return redirect::route('topic.show', $topic->id);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        
        $topic = Topic::where('id',$id)->get();
        // dd($topic);
        return view('/show', compact('topic'));
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $topic = Topic::where('id',$id)->get();
        // dd($topic);
        return view('/edit', compact('topic'));
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
        $data = $request->validate([
            'title'=>'required',
            'content'=>'required',
        ]);
        DB::table('topics')
            ->where('id', $id)
            ->update($data);
        
        $topic = Topic::where('id',$id)->get();
        return view('/show', compact('topic'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic, $id)
    {
       DB::table('topics')->where('id', '=', $id)->delete();
       return redirect('/user/dashboard');
    }
}
