<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cours') }}
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
                                           <h3 class="mb-1">Enregistrement de Cours</h3>

                                           <div class="table-responsive">
                                                   <table id="customer_data" class="table table-bordered table-dark table-striped">
                                                       <thead>
                               
                                                           <tr>
                                                               <th>id</th>
                                                               <th>Cours</th>
                                                               <th>Module</th>
                                                               <th>Nombre_Heura</th>
                                                               
                                                           </tr>
                                                       </thead>
                                                       @foreach ( $cours as $cour )
                                                           
                                                           <tr>
                                                               <td>{{$cour['id']}}</td>
                                                               <td>{{$cour['cours']}}</td>
                                                               <td>{{$cour['module_id']}}</td>
                                                               <td>{{$cour['nombre_heure']}}</td>
                                                                                                                                    
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
                               
                 
                                    <form action="{{route('cours.store')}}" class="signup-form" method="POST">
                                    
                                        @csrf
                                        
                                        <div class="form-group">
                                            <label class="label" for="name">Module</label>
                                            <select class="form-control" name="module_id" >
                                                <option disabled selected>Modules</option>
                                                @foreach ( $modules as $module )
                                                 
                                                <option value="{{$module['id']}}" > {{$module['module']}} </option>
                                               
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="label" for="name">Cours</label>
                                            <input type="text" id="cours" name="cours" class="form-control"  placeholder="" required autofocus>
                                                        
                                        </div>
                                        <div class="form-group">
                                            <label class="label" for="name">Nombre d'Heure</label>
                                            <input type="text" id="heure" name="nombre_heure" class="form-control"  placeholder="" required autofocus>
                                                        
                                        </div>
                                        <div class="form-group">

                                            <label class="label" for="name">Description du Cours</label>
                                            <textarea class="form-control" name="description" aria-label="With textarea"></textarea>
                                           
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
