<?php

namespace App\Http\Controllers;

use App\Models\modules;
use App\Models\module;
use App\Models\enseignant;
use App\Models\Cour;
use App\Models\inscription;
use Illuminate\Http\Request;

class ModulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'module'=>'required',
            'prix'=>'required',
            'description'=>'required',
            
        ]);
        
        modules::create($request->all());

        return redirect()->route('admin.modules')
                         ->with('success',' Ajout reussie!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\modules  $modules
     * @param  \App\Models\module  $module
     * @return \Illuminate\Http\Response
     */
    
    public function show_dash()
    {
        $data = module::all();
        $data_cours = cour::all();
        $data_enseignants = enseignant::all();
        
        return view('admin.dashboard',['modules'=>$data], ['cours'=>$data_cours,'enseignants'=>$data_enseignants]);
      
    }
    public function show_Modules()
    {
        $data1 = module::all();
       
        return view('admin.modules',['modules'=>$data1]);
       
    }
    public function show()
    {
        $data = module::all();
        $data_cours = cour::all();
       
        return view('admin.cours',['modules'=>$data], ['cours'=>$data_cours]);
    }
     /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cours  $cours
     * @return \Illuminate\Http\Response
     */
    public function inscription()
    {
        $data = module::all();
        $user = auth()->user();
        
        $user_name=$user->name;
        // dd($user->email);
        $data_inscription = inscription::where('nom',$user_name)->get();
       
        return view('inscription',['modules'=>$data],['nom'=>$user_name,'data_inscription'=>$data_inscription]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\modules  $modules
     * @return \Illuminate\Http\Response
     */
    public function edit(modules $modules)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\modules  $modules
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, modules $modules)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\modules  $modules
     * @return \Illuminate\Http\Response
     */
    public function destroy(modules $modules)
    {
        //
    }
}
