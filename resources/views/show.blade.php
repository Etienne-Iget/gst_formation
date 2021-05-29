
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Affichage') }}
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
                                                <small class="badge badge-success border border-dark">posté le {{$topics->created_at->format('d/m/Y à H:s')}}</small> 
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
                               
                                <p>Seul l'auteur qui peut modifier le topic</p>
                                    <div class="form-group d-flex justify-content-between">
                                        @can('update',$topics)
                                        <a href="{{route('topic.edit',[$topics->id])}}" class="btn btn-warning">Modifier</a>
                                        @endcan
                                      
                                        @can('delete',$topics)
                                        <a href="{{route('topic.destroy',[$topics->id])}}" class="btn btn-danger">Supprimer</a>
                                        @endcan

                                    </div>
                                    
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200">
                            <div class="flex items-center">
                                
                                <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="#">Votre Commentaire</a></div>
                            </div>
                    
                            <div class="ml-12">
                                <div class="mt-2 text-sm text-gray-500">
                                    <form action="{{route('comment.store', [$topics->id])}}" class="signup-form" method="POST">
                                        
                                        @csrf
                                                                               
                                        <div class="form-group">
        
                                            {{-- <label class="label" for="name">Votre Commentaire</label> --}}
                                            <textarea rows="6" id="content" class="form-control @error('content') is-invalid @enderror" name="content" aria-label="With textarea"></textarea>
                                            @error('content')
                                                <div class="invalid-feedback">{{$errors->first('content')}}</div>
                                                
                                            @enderror
                                        </div>
                                        <div class="form-group d-flex justify-content-end mt-4">
                                            <button type="submit" class="btn btn-success submit">Commenter <span class="fa fa-paper-plane"></span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    
                        <div class="p-6 border-t border-gray-200 md:border-l">
                            <div class="flex items-center">
                                
                                <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Les Commentaires</div>
                            </div>
                    
                            <div class="ml-12">
                                <div class="mt-2 text-sm text-gray-500">
                                    @forelse($comments as $comment)
                                    <div class="card md-1">
                                        <div class="card-body">
                                            {{$comment->content}}
                                            <div class="d-flex justify-content-between align-item-center">   
                                                <small class="badge badge-light border border-light">posté le {{$comment->created_at->format('d/m/Y à H:s')}}</small> 
                                                <span class="badge badge-light border border-light">{{$comment->user->name}}</span>
                                
                                            </div> 
                                        </div>
                                    </div>
                                    @empty
                                    <div class=" alert alert-info">Pas de commentaires pour le moment </div>
                                    @endforelse
                                </div>
                                {{$comments ->links()}}
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    </x-app-layout>