<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
        </h2>
    </x-slot>

    <div class=" py-6  max-w-4xl mx-auto sm:px-6 lg:px-8 ">
        @if($post->ownedBy(Auth::user()))
        
            <form action="{{route('update_post')}}" method="post">
                @csrf
                <div x-show="selected == 0" class="grid max-w-xl bg-white h-auto w-auto rounded-sm pt-2 mb-3">
                    <div>
                        <!--Body-->
                        <div class="px-6 pb-3">
                            <!-- Title -->
                            <div class="col-span-6 sm:col-span-4 mb-1">
                                <label for="title">標題</label>
                                <input id="title" name="title" value="{{old('title') ?? $post->title }}" placeholder="(選填)" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500  w-full shadow-sm p-1 border border-gray-300 rounded-md" type="text">
                            </div>
                            <!-- Description -->
                            <div class="col-span-6 sm:col-span-4 mb-1">
                                <label for="content">內容</label>
                                <textarea id="content" name="content" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 p-1  w-full border border-gray-300 rounded-md">{{old('content') ?? $post->content }}</textarea>
                            
                            </div>
                            <!-- Tags -->
                            <div class="col-span-6 sm:col-span-4">
                                <label for="tag">標籤</label>
                                <input id="tag" name="tag" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500  w-full shadow-sm p-1 border border-gray-300 rounded-md" type="text" value="{{old('tag') ?? $post->tag }}">
                            </div>  

                            <!-- Post -->
                            <input id="post_id" name="post_id" type="hidden" value="{{$post->id }}">
                        </div>
                        <!--Footer-->
                        <div class="flex justify-end pt-2 bg-gray-50 px-6 pb-3">
            
                            <button type="submit" class=" px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">更新</button>
                        
                        </div>
                    </div>    
                </div>
            </form>
    @endif
           
    </div>

</x-app-layout>