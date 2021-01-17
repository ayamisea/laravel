<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
        </h2>
    </x-slot>

    <div class=" py-6  max-w-4xl mx-auto sm:px-6 lg:px-8 ">

            @if($errors->any())
            <div class="bg-red-300 rounded-md py-2 px-3">
                <button class="float-right text-white hover:text-black" onclick="this.parentElement.style.display='none';">&times;</button> 
                <p class="font-bold">失敗</p>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
                
            </div>
            @endif
            <div class="flex py-5 lg:grid grid-cols-3 md:gap-5 justify-around">
                
                <!--left-->
                <div class=" max-w-xl lg:col-span-2 w-full">

                    <!--Profile =========================== -->
                    <div class=" bg-white overflow-hidden shadow-lg sm:rounded-lg py-3 mb-5">
                        @include('home.profile')
                        
                    </div>

                    <!-- Add Post  =========================== -->
                    @include('home.add-post')
                    
                    <!--Posts =========================== -->
                    @include('home.posts')
                </div>

                <!--Right-->
                <div class="lg:block hidden z-0">
                    
                </div>

            </div>
    </div>

</x-app-layout>