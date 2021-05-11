<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Enseignants') }}
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
                                                            
                            <div class="ml-12">
                               <div class="mt-2 text-sm text-gray-500">
                                   
                                   <div  class="container box">
                                       <img src="{{asset('/images/gstsoft.png')}}" alt="" margin width="128px;"/>
                                       <h3 class="mb-1">Enregistrement de l'Enseignant</h3>

                                       <div class="table-responsive">
                                               <table id="customer_data" class="table table-bordered table-dark table-striped">
                                                   <thead>
                           
                                                       <tr>
                                                        <tr>
                                                            <th>Nom</th>
                                                            <th>Cours</th>
                                                            <th>Niveau d'etude</th>
                                                            <th>Téléphone</th>
                                                            <th>email</th>
                                                            
                            
                                                        </tr>
                                                           
                           
                                                       </tr>
                                                   </thead>
                                                   @foreach ( $enseignants as $enseignant )
                                                       
                                                       <tr>
                                                           <td>{{$enseignant['nom']}}</td>
                                                           <td>{{$enseignant['cours']}}</td>
                                                           <td>{{$enseignant['niveau']}}</td>
                                                           <td>{{$enseignant['telephone']}}</td>
                                                           <td>{{$enseignant['email']}}</td>
                                                                 
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
                               
                 
                                    <form action="{{route('enseignants.store')}}" class="signup-form" method="POST">
                                    
                                        @csrf
                                        
                                        <div class="form-group">
                                            <label class="label" for="name">Nom Enseignant</label>
                                            <input type="text" id="nom" name="nom" class="form-control"  placeholder="" required autofocus>
                                                        
                                        </div>

                                        <div class="form-group">
                                            <label class="label" for="name">Niveau</label>
                                            <input type="text" id="niveau" name="niveau" class="form-control"  placeholder="" required autofocus>
                                                        
                                        </div>
                                        <div class="form-group">
                                            <label class="label" for="name">Cours</label>
                                            <select class="form-control" name="cours" >
                                                <option disabled selected>Cours</option>
                                                @foreach ( $cours as $cour )
                                                 
                                                <option value="{{$cour['cours']}}" > {{$cour['cours']}} </option>
                                               
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="label" for="name">Téléphone</label>
                                            <input type="text" id="telephone" name="telephone" class="form-control"  placeholder="" required autofocus>
                                                        
                                        </div>
                                        <div class="form-group">
                                            <label class="label" for="name">Email</label>
                                            <input type="text" id="email" name="email" class="form-control"  placeholder="" required autofocus>
                                                        
                                        </div>
                                        <div class="form-group">
                                            <label class="label" for="name">Adresse</label>
                                            <input type="text" id="adresse" name="adresse" class="form-control"  placeholder="" required autofocus>
                                                        
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
</x-admin-layout>
