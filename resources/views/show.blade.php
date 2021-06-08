<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Affichage') }}
        </h2>
    </x-slot>
             
        <div class="py-4">
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
                                                @if (auth()->user()->name == $topics->user->name)

                                                <small class="border border-light">Posté le {{$topics->created_at->format('d/m/Y à H:s')}} par Moi</small> 
                                                
                                                @else

                                                <small class="border border-light">Posté le {{$topics->created_at->format('d/m/Y à H:s')}} par : {{$topics->user->name}}</small> 
                                                
                                                @endif
                                                
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
                               
                                @if (auth()->user()->name==$topics->user->name)

                                <p>Pour toute modification ou suppression d'un Topic </p>
                                
                                <div class="form-group d-flex justify-content-between">
                                    @can('update',$topics)
                                    <a href="{{route('topic.edit',[$topics->id])}}" class="btn btn-warning">Modifier</a>
                                    @endcan
                                    
                                    @can('delete',$topics)
                                    <a href="{{route('topic.destroy',[$topics->id])}}" class="btn btn-danger">Supprimer</a>
                                    @endcan
                                    
                                </div>
                                @else
                                    <p>Seul l'auteur qui peut modifier le topic ou le supprimer</p>
                                
                                 @endif
                                    
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
        
                                            <textarea rows="6" id="content" class="form-control @error('content') is-invalid @enderror" name="content" aria-label="With textarea"></textarea>
                                            @error('content')
                                                <div class="invalid-feedback">{{$errors->first('content')}}</div>
                                                
                                            @enderror
                                        </div>
                                        <div class="form-group d-flex justify-content-end mt-4">
                                            <button type="submit" class="btn btn-info submit">Commenter <span class="fa fa-paper-plane"></span></button>
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
                                    <div class="card md-1 contenu-blanc-avec-scroll">
                                        <div class="card-body d-flex justify-content-between">
                                            <div> 
                                                {{$comment->content}}
                                                <div class="d-flex justify-content-between align-item-center">   
                                                    @if (auth()->user()->name == $comment->user->name)
                                                    
                                                    <small >Posté le {{$comment->created_at->format('d/m/Y à H:s')}} par Moi</small> 
                                                    
                                                    @else
                                                    
                                                    <small >posté le {{$comment->created_at->format('d/m/Y à H:s')}} par : {{$comment->user->name}}</small> 
                                                    
                                                    @endif
                                                </div>
                                            </div>
                                            <div>
                                                @if (!$topics->solution && auth()->user())

                                                    @can('update',$topics)
                                                    
                                                        <form action="{{route('comment.markAsSolution',[$comment->id, $topics->id] )}}" method="post">
                                                            <button id="marquer" class="btn btn-success"> Marqué</button>
                                                        </form>
                                                    @endcan
                                                @else
                                                        @if ($topics->solution==$comment->id)
                                                        <span class="badge badge-success"><i class="fas fa-lock"> Solution</i></span>
                                                        @endif
                                                
                                                @endif
                                               
                                            </div>
                                        </div>
                                        
                                        <div class="form-group d-flex justify-content-between align-item-center">
                                          
                                            <button class="btn btn-dark" onclick="toggleSeeComment({{$comment->id }})">Afficher les réponses du commentaire</button>
                                            <button class="btn btn-info" onclick="toggleReplyComment({{$comment->id }})">Répondre</button>
                                        </div>
                                    </div>
                                    
                                    <div class="card-body ml-8 d-none alert alert-dark" role="alert" id="SeeComment-{{$comment->id }}">
                                        @foreach ($comment->comments as $replyComment )
                                            {{$replyComment->content}}
                                            <div class="d-flex justify-content-between align-item-center " >  
                                                
                                                @if (auth()->user()->name == $replyComment->user->name)

                                                <small class="badge badge-light border border-light">Répondu le {{$replyComment->created_at->format('d/m/Y à H:s')}} par Moi</small> 
                                                
                                                @else

                                                <small class="badge badge-light border border-light">Répondu le {{$replyComment->created_at->format('d/m/Y à H:s')}} par : {{$replyComment->user->name}}</small> 
                                                
                                                @endif

                                            </div> 
                                        @endforeach
                                    </div>
                                    <form action="{{route('comment.storeReply',[$comment])}}" method="POST" class="ml-4 d-none" id="replyComment-{{$comment->id }}" >
                                        @csrf
                                        <div class="form-group">
                                               <label class="label" for="replyComment">Réponse du Commentaire</label>
                                                <textarea rows="4" id="replyComment" class="form-control @error('replyComment') is-invalid @enderror" name="replyComment" aria-label="With textarea"></textarea>
                                                     @error('replyComment')
                                                        <div class="invalid-feedback">{{$errors->first('replyComment')}}</div>
                                                                                    
                                                     @enderror      
                                                <button type="submit" class="btn btn-success submit">Répondre <span class="fa fa-paper-plane"></span></button>
                                             </div>
                                    </form>

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
    <script>
        function toggleReplyComment(id)
        {
            let element =document.getElementById('replyComment-'+ id);
            element.classList.toggle('d-none'); 
        }
    </script>
    <script>
        function toggleSeeComment(id)
        {
            let element =document.getElementById('SeeComment-'+ id);
            element.classList.toggle('d-none'); 
        }
    </script>
