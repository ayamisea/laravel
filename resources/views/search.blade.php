<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Search') }}
        </h2>
    </x-slot>
    
        
    <div class=" py-6  max-w-4xl mx-auto sm:px-6 lg:px-8 ">
        <div class="flex py-5 lg:grid grid-cols-3 md:gap-5">
                
            
            <div class=" max-w-xl lg:col-span-2 w-full grid justify-items-center">
            <!--Search Bar -->
                <form action="{{route('search')}}" method="GET">
                    @csrf
                    <div class="flex text-gray-600 items-center">
                        <input type="search" name="search" placeholder="Search" value="{{request()->search}}" class=" h-10  pl-5 rounded-full pr-10 bg-white text-sm focus:outline-none">
                        <button type="submit" class="-ml-8">
                            <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
                                <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"/>
                            </svg> 
                        </button>
                    </div>
                    <div class="flex gap-2 mt-3">
                        
                        <button class="hover:bg-blue-50" type="submit" name="sort_type" value="0">按時間排序</button>
                        <span>|</span>
                        <button class="hover:bg-blue-50" type="submit" name="sort_type" value="1">按愛心數排序</button>
                        
                    </div>
                </form>
            </div>
        </div>
        <!--Posts =========================== -->
        <div class="mt-3">
            @include('home.posts')
        </div>
        




    </div>


</x-app-layout>