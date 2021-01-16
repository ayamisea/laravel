<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Test') }}
        </h2>
    </x-slot>

<div class=" py-6  max-w-4xl mx-auto sm:px-6 lg:px-8 ">

    <div class="show-hide-text wrapper">
        <a  id="show-more" class="show-less" href="#show-less">Show less</a>
        <a  id="show-less" class="show-more" href="#show-more">Show more</a>
        <p>
          Lorem Ipsum is simply dummy text of  the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
        </p>
    </div>

</div>



</x-app-layout>