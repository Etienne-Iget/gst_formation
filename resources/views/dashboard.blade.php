<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Forum') }}
        </h2>
    </x-slot>
{{-- 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 ">
                    <div class="p-6 ">
                        <div class="flex items-center">
                            
                            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="#">Blog</a></div>
                        </div>
                
                        <div class="ml-12">
                            
                        </div>
                    </div>
                
                    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
                        <div class="flex items-center">
                            
                            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="#">Repondre</a></div>
                        </div>
                
                        <div class="ml-4">
                            <form action="#" class="signup-form" method="POST">
                                    
                                @csrf
                                
                                <div class="form-group">

                                    <label class="label" for="name">Contacter le blog</label>
                                    <textarea rows="6" class="form-control" name="description" aria-label="With textarea"></textarea>
                                   
                                </div>
                                <div class="form-group d-flex justify-content-end mt-4">
                                    <button type="submit" class="btn btn-primary submit">Enregistrer <span class="fa fa-paper-plane"></span></button>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="container">
    <div class="list-group">
        @foreach ( $topics as $topic )
        <div class="list-group-item">
            <h4><a href="{{route('topic.show',[$topic->id])}}">{{ $topic->title}}</a></h4>
            <p>{{ $topic->content }}</p>
 
            <div class="d-flex justify-content-between align-item-center">   
                <small>posté le {{$topic->created_at->format('d/m/Y à H:s')}}</small> 
                <span class="badge badge-light border border-dark">{{$topic->user->name}}</span>

            </div> 

        </div>
            
        @endforeach
    </div>
    <div class="d-flex justify-content-center mt-3"></div>
    {{$topics->links()}}
</div>

</x-app-layout>
