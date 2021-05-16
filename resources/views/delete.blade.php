<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Forum') }}
        </h2>
    </x-slot>
       
                            
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
                           
    </x-app-layout>