<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class=" py-6  max-w-4xl mx-auto sm:px-6 lg:px-8 ">
        @include('home.posts')
    </div>

</x-app-layout>
