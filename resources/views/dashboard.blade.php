<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Forum') }}
        </h2>
    </x-slot>

<div class="container">
    <div class="list-group">
        @foreach ( $topics as $topic )
        <div class="list-group-item">
            <h4><a href="{{route('topic.show',[$topic->id])}}">{{ $topic->title}}</a></h4>
            <p>{{ $topic->content }}</p>
 
            <div class="d-flex justify-content-between align-item-center">   
                <small class="badge badge-success border border-dark">posté le {{$topic->created_at->format('d/m/Y à H:s')}}</small> 
                <span class="badge badge-light border border-dark">{{$topic->user->name}}</span>

            </div> 

        </div>
            
        @endforeach
    </div>
    <div class="d-flex justify-content-center mt-3"></div>
    {{$topics->links()}}
</div>

</x-app-layout>
