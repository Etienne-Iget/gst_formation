<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Accueil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div>
                        <x-jet-application-logo class="block h-12 w-auto" />
                    </div>
                
                    <div class="mt-8 text-2xl">
                        Bienvenu Global Software and Technology 
                    </div>
                
                    <div class="mt-6 text-gray-500">
 
                    </div>
                </div>
                
                <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"></svg>
                            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{ route('admin.modules') }}">Modules</a></div>
                        </div>
                
                        <div class="ml-12">
                            <div class="mt-2 text-sm text-gray-500">
                                <div  class="container box">
                                    <div class="table-responsive">
                                            <table id="customer_data" class="table table-bordered table-dark table-striped">
                                                <thead>
                        
                                                    <tr>
                                                        <th>id</th>
                                                        <th>Modules</th>
                                                        <th>Prix</th>
                                                        <th>Descriptions</th>
                                                        
                        
                                                    </tr>
                                                </thead>
                                                @foreach ( $modules as $module )
                                                    
                                                    <tr>
                                                        <td>{{$module['id']}}</td>
                                                        <td>{{$module['module']}}</td>
                                                        <td>{{$module['prix']}}</td>
                                                        <td>{{$module['description']}}</td>
                                                              
                                                    </tr>
                                                @endforeach
                                            </table>
                                    </div>
                                </div>
                            </div>
                
                        </div>
                    </div>
                
                    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"></svg>
                            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{ route('admin.cours') }}">Cours</a></div>
                        </div>
                
                        <div class="ml-12">
                            <div class="mt-2 text-sm text-gray-500">
                                <div  class="container box">
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
                                                        <td>{{$cour['module']}}</td>
                                                        <td>{{$cour['nombre_heure']}}</td>
                                                                                                                             
                                                    </tr>
                                                @endforeach
                                            </table>
                                    </div>
                                </div>
                            </div>
                
                           
                        </div>
                    </div>
                
                    <div class="p-6 border-t border-gray-200">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"></svg>
                            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{ route('admin.enseignants') }}">Enseignants</a></div>
                        </div>
                
                        <div class="ml-12">
                            <div class="mt-2 text-sm text-gray-500">
                                <div  class="container box">
                                    <div class="table-responsive">
                                            <table id="customer_data" class="table table-bordered table-dark table-striped">
                                                <thead>
                        
                                                    <tr>
                                                        <th>Nom</th>
                                                        <th>Cours</th>
                                                        <th>Niveau d'etude</th>
                                                        <th>Téléphone</th>
                                                        <th>email</th>
                                                        
                        
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
                
                    <div class="p-6 border-t border-gray-200 md:border-l">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"></svg>
                            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{ route('admin.etudiants') }}">Etudiants Inscrits aux Modules</div>
                        </div>
                
                        <div class="ml-12">
                            <div class="mt-2 text-sm text-gray-500">
                                <div  class="container box">
                                    <div class="table-responsive">
                                            <table id="customer_data" class="table table-bordered table-dark table-striped">
                                                <thead>
                        
                                                    <tr>
                                                        <th>Nom</th>
                                                        <th>Modules</th>
                                                        <th>Numéro de Reçu</th>
                                                        
                        
                                                    </tr>
                                                </thead>
                        
                                                    
                                                    <tr>
                                                        <td><12></td>
                                                        <td><12></td>
                                                        <td><12></td>
                                                        
                                                                        
                                                    </tr>
                                            </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</x-admin-layout>
