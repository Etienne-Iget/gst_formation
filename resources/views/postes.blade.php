<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mes publications') }}
        </h2>
    </x-slot>

<div class="container py-2">

    @forelse ($topics as $topic )

    <div class="list-group">
        <div class="list-group-item">
            <h4><a href="{{route('topic.show',[$topic->id])}}">{{ $topic->title}}</a></h4>
            <p>{{ $topic->content }}</p>

            <div class="d-flex justify-content-between align-item-center">   
                <small class="badge badge-light border border-dark">posté le {{$topic->created_at->format('d/m/Y à H:s')}} par Moi</small> 
            
            </div> 
        </div>
        
    </div>
        
    @empty

    <div class="list-group">
        <div class="list-group-item">
            <div class=" alert alert-info">Pas de publications pour le moment </div>
        </div>
    </div>
        
    @endforelse
           
    <div class="d-flex justify-content-center mt-3"></div>
    {{$topics->links()}}
</div>

</x-app-layout>
