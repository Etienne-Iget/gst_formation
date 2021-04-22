<?php

namespace App\Http\Controllers;

use App\Models\modules;
use App\Models\module;
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
    public function show()
    {
        $data = module::all();
        return view('admin.cours',['modules'=>$data]);
        // return view('admin.cours');
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
