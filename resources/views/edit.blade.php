<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modification') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 ">
                    @foreach ($topic as $topics )
                    <div class="p-6 ">
                        <div class="flex items-center">
            
                            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="#">Mon Poste</a></div>
                        </div>
            
                        <div class="ml-12">
                        
                            <div class="container">
                                <div class="card">
                                    <div class="card-body">
                                       
                                        <h5 class="card-title">{{$topics->title}}</h5>
                                        <p>{{ $topics->content }}</p>

                                        <div class="d-flex justify-content-between align-item-center">   
                                            <small>posté le {{$topics->created_at->format('d/m/Y à H:s')}}</small> 
                                            <span class="badge badge-light border border-dark">{{$topics->user->name}}</span>
                                          
                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                
                    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
                        <div class="flex items-center">
                            
                            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="#">Le Topic à modifier : {{$topics->title}} </a></div>
                        </div>
                
                        <div class="ml-4">
                            <form action="{{route('topic.update',$topics)}}" class="signup-form" method="POST">
                                 
                                @csrf
                                
                                <div class="form-group">
                                    <label class="label" for="name"> Titre </label>
                                    <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror"  placeholder="{{$topics->title}}" required value="{{$topics->title}}" >

                                    @error('title')
                                        <div class="invalid-feedback">{{$errors->first('title')}}</div>
                                        
                                    @enderror
                                </div>
                                <div class="form-group">

                                    <label class="label" for="name">Contenu</label>
                                    <textarea rows="6" id="content" class="form-control @error('content') is-invalid @enderror" name="content" aria-label="With textarea">{{$topics->content}}</textarea>
                                    @error('content')
                                        <div class="invalid-feedback">{{$errors->first('content')}}</div>
                                        
                                    @enderror
                                </div>
                                <div class="form-group d-flex justify-content-end mt-4">
                                    <button type="submit" class="btn btn-warning submit">Modifier <span class="fa fa-paper-plane"></span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


</x-app-layout>
