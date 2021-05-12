<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Cour;
use App\Models\enseignant;
use App\Models\module;
use Illuminate\Http\Request;

class CoursController extends Controller
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
            
            'module_id'=>'required',
            'cours'=>'required',
            'nombre_heure'=>'required',
            'description'=>'required',
            
        ]);
        
        Cours::create($request->all());

        return redirect()->route('admin.cours')
                         ->with('success',' Ajout du Cours reussie!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cours  $cours
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = cour::all();
        $data_enseignants = enseignant::all();
        return view('admin.enseignants',['cours'=>$data], ['enseignants'=>$data_enseignants]);
    }
   
    public function show_cours()
    {
        $data = cour::all();
        $data_module =  module::all();
        return view('admin.cours',['modules'=>$data_module], ['cours'=>$data]);
    }
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cours  $cours
     * @return \Illuminate\Http\Response
     */
    public function edit(Cours $cours)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cours  $cours
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cours $cours)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cours  $cours
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cours $cours)
    {
        //
    }
}
