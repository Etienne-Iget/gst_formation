<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Forum') }}
        </h2>
    </x-slot>
       
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 ">
                        <div class="p-6 ">
                            <div class="flex items-center">
                
                                <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="#">Mon Poste</a></div>
                            </div>
                
                            <div class="ml-12">
                            
                                <div class="container">
                                    <div class="card">
                                        <div class="card-body">
                                            @foreach ($topic as $topics )
                                            <h5 class="card-title">{{$topics->title}}</h5>
                                            <p>{{ $topics->content }}</p>
 
                                            <div class="d-flex justify-content-between align-item-center">   
                                                <small>posté le {{$topics->created_at->format('d/m/Y à H:s')}}</small> 
                                                <span class="badge badge-light border border-dark">{{$topics->user->name}}</span>
                                                @endforeach
                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    
                        <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
                            <div class="flex items-center">
                                
                                <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="#">Actions</a></div>
                            </div>
                    
                            <div class="ml-4">
                               
                                    <div class="form-group d-flex justify-content-between">
                                        <a href="{{route('topic.edit',[$topics->id])}}" class="btn btn-warning">Modifier</a>
                                      
                                        {{-- <a href="{{route('topic.destroy',[$topics->id])}}" class="btn btn-danger">Supprimer</a> --}}
                                    </div>
                                    
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    </x-app-layout>