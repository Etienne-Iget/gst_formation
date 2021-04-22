<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modules') }}
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
                                <img src="{{asset('/images/gstsoft.png')}}" alt="" margin width="128px;"/>
                                 <h3 class="mb-1">Enregistrement de Module</h3>
                             
                            </div>
                            <div class="col-md-5 order-md-last">
                                <div class=" col-p-4 p-md-5">
                               
                 
                                    <form action="{{route('modules.store')}}" class="signup-form" method="POST">
                                    
                                        @csrf
                                        
                                        <div class="form-group">
                                            <label class="label" for="name">Module</label>
                                            <input type="text" id="module" name="module" class="form-control"  placeholder="" required autofocus>
                                                        
                                        </div>

                                        <div class="form-group">

                                            <label class="label" for="name">Description du Module</label>
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
