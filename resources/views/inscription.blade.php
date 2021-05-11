
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inscription au Module') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- <x-jet-welcome /> --}}
                <section id="section_1" class="ftco-section ftco-no-pb ftco-no-pt">
                    <div class="container">
                     
                       <div class="row ">
                            <div class="col-md-7 mx-auto ">
                                
                                 <h3 class="mb-1">Inscription</h3>
                                    <img src="{{asset('/images/gstsoft.png')}}" alt="" margin width="128px;"/>
                                
                            </div>
                            <div class="col-md-5 order-md-last">
                                <div class=" col-p-4 p-md-5">
                                   {{$data_inscription}}
                                    <form action="{{route('inscription.store')}}" class="signup-form" method="POST">
                                    
                                        @csrf
                                        
                                        <div class="form-group">
                                            <label class="label" for="name">Nom Complet</label>
                                            <input type="text" id="nom" name="nom" class="form-control"  placeholder="{{$nom}}" required disabled >
                                                        
                                        </div>
                                        <div class="form-group">
                                            <label class="label" for="name">Numéro du Réçu</label>
                                            <input type="text" id="recu" name="numero_recu" class="form-control"  placeholder="" required autofocus>
                                                        
                                        </div>
                                        <div class="form-group">
                                            <label class="label" for="name">Genre</label>
                                            <select class="form-control" name="genre" >
                                                <option disabled selected>Genre</option>
                                                <option value="Homme" > Homme </option>
                                                <option value="Femme" > Femme </option>
                                            </select>
                                                    
                                        </div>
                                        <div class="form-group">
                                            <label class="label" for="name">Module</label>
                                            <select class="form-control" name="id_module" >
                                                <option disabled selected>Module</option>
                                                @foreach ( $modules as $module )
                                                 
                                                <option value="{{$module['id']}}" > {{$module['module']}} Prix:{{$module['prix']}} </option>
                                               
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group d-flex justify-content-end mt-4">
                                            <button type="submit" class="btn btn-primary submit">Enregistrer <span class="fa fa-paper-plane"></span></button>
                                        </div>
                                    </form>
                  
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
