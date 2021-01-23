<x-app-layout>

    <div class=" py-6  max-w-4xl mx-auto sm:px-6 lg:px-8 ">
        @if($post->ownedBy(Auth::user()))
            <!--Error messages ==================== -->
            @if($errors->any())
            <div class="max-w-xl bg-red-300 rounded-md py-2 px-3 mb-2">
                <button class="float-right text-white hover:text-black" onclick="this.parentElement.style.display='none';">&times;</button> 
                <p class="font-bold">失敗</p>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
                
            </div>
            @endif

            <form action="{{route('update_post')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div x-show="selected == 0" class="grid max-w-xl bg-white h-auto w-auto rounded-sm pt-2 mb-3">
                    <div>
                        <!--Body-->
                        <div class="px-6 pb-3">
                            <!-- Title -->
                            <div class="col-span-6 sm:col-span-4 mb-1">
                                <label for="title">標題</label>
                                <input id="title" name="title" value="{{old('title') ?? $post->title }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500  w-full shadow-sm p-1 border border-gray-300 rounded-md" type="text">
                            </div>
                            <!-- Description -->
                            <div class="col-span-6 sm:col-span-4 mb-1">
                                <label for="content">內容</label>
                                <textarea id="content" name="content" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 p-1  w-full border border-gray-300 rounded-md">{{old('content') ?? $post->content }}</textarea>
                            
                            </div>
                            <!-- Tags 
                            <div class="col-span-6 sm:col-span-4">
                                <label for="tag">標籤</label>
                                <input id="tag" name="tag" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500  w-full shadow-sm p-1 border border-gray-300 rounded-md" type="text" value="{{old('tag') ?? $post->tag }}">
                            </div>  
                            -->

                            
                            <!-- Images -->
                            @if(count($post->images)) 
                            <label for="image">圖片</label>
                            <div class="flex gap-1">
                                @foreach($post->images()->get() as $image)
                                <div class="my-2 relative">
                                    <img class="h-20 w-20 object-contain rounded " src="{{cloudinary_url($image->filename)}}" >
                                    <button class="absolute top-0 right-0 z-50 p-1 bg-white rounded-bl focus:outline-none" 
                                    type="submit" 
                                    name="delete_img_id" value="{{$image->id}}">
                                        <svg class="w-4 h-4 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        
                                    </button>
                                </div>
                                    
                                @endforeach

                            </div>
                            @endif
                            <label for="add_image">新增圖片</label>
                            @include('home.images')

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