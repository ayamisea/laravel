<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Test') }}
        </h2>
    </x-slot>
    
    <ul class="block w-11/12 my-4 mx-auto" x-data="{selected:null}">
        <li class="flex align-center flex-col">
            <h4 @click="selected !== 0 ? selected = 0 : selected = null"
                class="cursor-pointer px-5 py-3 bg-indigo-300 text-white text-center inline-block hover:opacity-75 hover:shadow hover:-mb-3 rounded-t">Accordion item 1</h4>
            <p x-show="selected == 0" class="border py-4 px-2">
                This is made with Alpine JS and Tailwind CSS
            </p>
        </li>
        
    </ul>

</x-app-layout>