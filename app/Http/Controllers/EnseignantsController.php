<?php

namespace App\Http\Controllers;

use App\Models\Enseignants;
use Illuminate\Http\Request;

class EnseignantsController extends Controller
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
            
            'nom'=>'required',
            'niveau'=>'required',
            'cours'=>'required',
            'telephone'=>'required',
            'email'=>'required',
            'adresse'=>'required',
            
        ]);
        
        Enseignants::create($request->all());

        return redirect()->route('admin.enseignants')
                         ->with('success',' Ajout de l\'Enseignants reussie!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Enseignants  $enseignants
     * @return \Illuminate\Http\Response
     */
    public function show(Enseignants $enseignants)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Enseignants  $enseignants
     * @return \Illuminate\Http\Response
     */
    public function edit(Enseignants $enseignants)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Enseignants  $enseignants
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enseignants $enseignants)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Enseignants  $enseignants
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enseignants $enseignants)
    {
        //
    }
}
