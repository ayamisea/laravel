@if($posts->count())
    @foreach ($posts as $post)
    <ul id="{{__('post-').$post->id}}" class="grid max-w-xl  h-auto w-auto rounded-sm mb-2 " x-data="{selected:null}">
    <li class="flex align-center flex-col">
    <div class="grid max-w-xl bg-white h-auto w-auto rounded-sm p-3 pb-1 pt-1 ">
        
        <div  class="place-self-start w-full">
            <!--Author-->
            <div class="max-w-3xl flex  mb-3 justify-between">
                <div class="flex items-stretch">
                    <div class="mr-3 self-center">
                        <a href="{{route('profile',$post->user->username)}}">
                        <img class="shadow h-10 w-10 rounded-full mx-auto" src="{{cloudinary_url($post->user->profile_photo_path)??$post->user->profile_photo_url}}" alt="{{ $user->name }}" />
                        </a> 
                    </div>

                    <div class="self-center">
                        <a href="{{route('profile',$post->user->username)}}">
                            <h2 class="font-bold text-base">{{ $post->user->name }}</h2>
                        </a>
                        <div class="sm:flex ">
                            <p class="text-xs mr-1">{{ $post->created_at->diffForHumans()}} </p>
                            @if($post->created_at != $post->updated_at)
                                <p class="text-xs text-gray-400">(更新:{{ $post->updated_at->diffForHumans()}}) </p>
                            @endif
                        </div>
                        
                    </div>
                </div>
                
                

                <div class="self-center flex gap-3 items-stretch">
                    @auth
                    @if(Auth::user()!==$user)
                        <button class="self-center w-auto p-1 items-center justify-center rounded-md bg-gray-400 text-white text-xs" type="submit">追蹤</button>
                    @endif
                    @endauth
                    <!-- Post Manipulation -->
                    @auth
                    @if($post->ownedBy(Auth::user()))
                    <x-jet-dropdown align="right" width="48 ">
                        
                        <x-slot name="trigger">
                            
                            <button type="submit" class="hover:opacity-75 focus:outline-none">
                                <svg class="self-center text-gray-400 w-5 h-5 -mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path></svg>
                            </button>
                            
                        </x-slot>
                        
                        <x-slot name="content">
                            

                            <div class="block px-1 py-1 text-xs text-gray-400">
                                <a href="{{route('edit_post',$post)}}">
                                    <button class="hover:bg-gray-50 w-full">
                                        <p>編輯</p> 
                                    </button>
                                </a>
                                
                            </div>
                            <div class="block px-1 py-1 text-xs text-gray-400">
                                <form action="{{route('delete_post',$post)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="hover:bg-gray-50 w-full" type="submit">
                                        <p>刪除</p> 
                                    </button>
                                </form>
                            </div>
                    </x-slot>
                    </x-jet-dropdown>
                    @endif
                    @endauth
                </div>
            </div>  
        
            <!--Content-->
            <div class="bg-white text-justify pr-3">
                <h4 class="font-bold mt-0 md:text-lg text-md">{{$post->title}}</h4>
                <span class="md:text-base text-sm ">
                    {{$post->content}}
                </span>

                
            </div >
            <!--image-->
            @if(count($post->images)) 
            
            <div class="pa-carousel-widget w-full h-64 mt-2"
            style="display: none;">
                @foreach($post->images()->get() as $image)
                    <img data-src="{{cloudinary_url($image->filename)}}" >
                @endforeach
            </div>  
            @endif
            


        </div>
        
        <div class="place-self-end w-full mt-2">
            <!--tags-->
            <div class=" mb-2 flex justify-between items-stretch">
                <div class="self-center">
                    <!--
                   
                    <a class="bg-red-50 rounded mr-1 text-xs pl-1 pr-1" href="#" alt="tagValue" >tagitem</a>
                    
                    -->
                </div>
                <div class="justify-end mr-4 self-center  text-gray-400">
                <!--
                    <a class="text-xs flex gap-1" href="#">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z"></path></svg>
                        <p>查看合集 ...</p> 
                    </a>
                -->
                    
                </div>
                
            </div>

            
            <!--likes-->
            <div class="flex text-sm border-t border-gray-200 pt-1 justify-around">
                
                <div class="flex">
                    @auth
                    @if($post->likeBy(Auth::user()))
                    <!--ToUnlike-->
                    <form action="{{route('unlike_post',$post)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="hover:opacity-75 focus:outline-none">
                            <svg class="text-red-500 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
                        </button>
                    </form>
                    @else
                    <!--ToLike-->
                    <form action="{{ route('like_post',$post)}}" method="post">
                        @csrf
                        <button type="submit" class="hover:opacity-75 focus:outline-none">
                            
                            <svg class="text-gray-400 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                        </button>
                    </form>
                    @endif
                    @endauth
                    @unless (Auth::check())
                    <svg class="text-gray-400 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                    @endunless
                    <span class="ml-1">{{$post->likes->count()}}</span>
                    
                </div>
                
                <!--message-->
                @php
                    $messages = $post->messages()->get();
                @endphp
                <div class="flex">
                   
                    <button  @click="selected !== 1 ? selected = 1 : selected = null" class="hover:opacity-75 focus:outline-none">
                        <svg class="text-gray-400 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                    </button>
                    <span class="ml-1">{{$messages->count()}}</span>
                </div>

                
                
            </div>
        </div>
    </div>
    @include('home.post-message')
    </li>
    </ul> 
    
    @endforeach
    <div class="grid max-w-xl h-auto w-auto rounded-sm p-3 pb-1 pt-1 mb-1.5">
        {{ $posts->appends(['search' => request()->search,'sort_type'=>request()->sort_type])->links()}}
    </div>
    
@else 
    <div class="flex justify-center">
        @if(request()->search)
            <span>找不到符合搜尋字詞「{{request()->search}}」的貼文</span>
        @else
            <span>沒有任何貼文</span>
        @endif
        
    </div>
@endif

