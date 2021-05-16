
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
                                                             
                             <div class="ml-8">
                                <div class="mt-2 text-sm text-gray-500">
                                    
                                    <div  class="container box">
                                        <img src="{{asset('/images/gstsoft.png')}}" alt="" margin width="128px;"/>
                                        <h3 class="mb-1">Les modules déjà inscrit et les cours </h3>
                                        <p> Pour certains changements et informations en rapport avec l'inscription contacter la direction de formation! </p>
                                        @if ($count>=2)
                                            <em style="color:red;"> Veuillez passer à la direction pour l'enregistrement des réçus, si non vous serez chassé!!!</em> 
                                        @elseif($count===1)
                                            <em style="color:red;"> Un réçu n'est pas enregisté, Veuillez passer à la direction, si non vous serez chassé!!!</em>
                                       
                                        @endif
                                      
                                        <div class="table-responsive">
                                                <table id="customer_data" class="table table-bordered table-dark table-striped">
                                                    <thead>
                            
                                                        <tr>
                                                         <tr>
                                                             <th>Modules</th>
                                                             <th>Prix</th>
                                                             <th>Cours</th>
                                                             <th>Heures</th>
                                                            
                                                         </tr>
                                                            
                            
                                                        </tr>
                                                    </thead>
                                                    
                                                    @foreach ( $affiches as $affiche )
                                                                                                            
                                                        <tr>
                                                            <td>{{$affiche->module}}</td>
                                                            <td>{{$affiche->prix}}</td>
                                                            <td>{{$affiche->cours}}</td>
                                                            <td>{{$affiche->nombre_heure}}</td>
                                                                                                                              
                                                        </tr>
                                                   
                                                   @endforeach
                                                </table>
                                             
                                        </div>
                                    </div>
                                </div>
                    
                            </div>
                        </div>
                        
                             
                             <div class="col-md-5 order-md-last">
                                 <div class=" col-p-4 p-md-5">
                                
                                 
                                    <form action="{{route('inscription.store')}}" class="signup-form" method="POST">
                                    
                                        @csrf
                                        
                                        <div class="form-group">
                                            <label class="label" for="name">Nom Complet</label>
                                            <input type="text" id="nom" name="nom" class="form-control" value="{{$nom}}" placeholder="{{$nom}}" required >
                                                        
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
                                            <select class="form-control" name="module_id" >
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
