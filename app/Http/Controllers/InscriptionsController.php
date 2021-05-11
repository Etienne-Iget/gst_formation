<?php

namespace App\Http\Controllers;

use App\Models\Inscriptions;
use App\Models\inscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class InscriptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
   
        var_dump($user->id);
          
        var_dump($user->name);
          
        var_dump($user->email);
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
            'numero_recu'=>'required',
            'genre'=>'required',
            'id_module'=>'required',
            
            
        ]);
        

        Inscriptions::create($request->all());

        return redirect()->route('inscription')
                         ->with('success',' Ajout de l\'inscription reussie!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inscriptions  $inscriptions
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = auth()->user();
        
        $user_name=$user->name;
        $data = inscription::all($columns = ['nom'=>$user_name]);
        return view('inscription',['data_inscription'=>$data]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inscriptions  $inscriptions
     * @return \Illuminate\Http\Response
     */
    public function edit(Inscriptions $inscriptions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inscriptions  $inscriptions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inscriptions $inscriptions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inscriptions  $inscriptions
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inscriptions $inscriptions)
    {
        //
    }
}
