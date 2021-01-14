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
                <div class=" max-w-xl lg:col-span-2 w-full  grid ">

                    <!--Profile =========================== -->
                    <div class=" bg-white overflow-hidden shadow-lg sm:rounded-lg py-3 mb-5">
                        <div class="max-w-3xl mx-auto grid md:grid-cols-3 items-center ">
                            <div class="  mb-5 hidden md:block justify-items-center">
                                
                                <img class="h-32 w-32 rounded-full mx-auto mb-4" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" />
                                
                                
                                <div class= grid justify-items-stretch ">
                                    @if(Auth::user() === $user)
                                    <button class="justify-self-center px-1 modal-open w-auto bg-transparent border border-gray-500 hover:border-indigo-500 text-gray-500 hover:text-indigo-500 font-bold rounded-md text-sm">編輯簡介</button>
                                    @endif
                                </div>
                                
                            </div>
        
                            <div class=" grid justify-around mx-6 md:ml-0 col-span-2 ">
                                
                                <div class="flex mb-3 ">
                                    <div class="block md:hidden ">
                                        <img class="h-15 w-15 object-cover rounded-full" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" />
                                        
                                    </div>
                                    <div class="md:ml-0 ml-5">
                                        <div class="flex mb-1 items-stretch">
                                            <h2 class="self-center font-bold sm:text-lg text-base">{{ $user->name }}</h2>
                                            <p class="hidden md:block ml-3 self-center text-xs">{{ '@'.$user->username }}</p>
                                            <button class="self-center w-auto p-1 ml-5 items-center justify-center rounded-md bg-black text-white text-xs" type="submit">追蹤</button>
                                        </div>
                                        <div class="flex gap-4 sm:text-sm text-xs">
                                            <span class="grid justify-items-center sm:flex"><p class="sm:mr-1">{{$user->posts->count()}}</p> <p>貼文</p> </span>
                                            <span class="grid justify-items-center sm:flex"><p class="sm:mr-1">20</p> <p>粉絲</p></span>
                                            <span class="grid justify-items-center sm:flex"><p class="sm:mr-1">75</p> <p>追蹤中</p></span>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                
                                <p class="font-bold text-justify sm:text-base text-sm">
                                   {{$user->profile->title ?? ''}}
                                </p>
                                <p class="text-justify sm:text-base text-sm">
                                    {{$user->profile->description ?? ''}}
                                </p>
                                <p class="flex text-justify sm:text-sm text-xs text-blue-500">
                                    @if($user->profile->url)
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                                        <a class="ml-1" href="{{$user->profile->url}}" target="_blank">個人網站</a>
                                    @endif
                                    
                                </p>

                                <div class="block md:hidden grid justify-items-stretch mt-2">
                                    @if(Auth::user() === $user)
                                    <button class="justify-self-center px-1 modal-open w-auto bg-transparent border border-gray-500 hover:border-indigo-500 text-gray-500 hover:text-indigo-500 font-bold rounded-md text-sm">編輯簡介</button>
                                    @endif
                                </div>
                            </div>
                        </div>    
                    </div>

                    <!-- Add Post  =========================== -->
                    @if(Auth::user() === $user)
                    <ul class="grid max-w-xl  h-auto w-auto rounded-sm mb-2 " x-data="{selected:null}">
                        <li class="flex align-center flex-col">
                            <h4 @click="selected !== 0 ? selected = 0 : selected = null"
                                class="cursor-pointer  py-2 bg-indigo-300 text-white text-center inline-block hover:opacity-75 hover:shadow hover:-mb-3 rounded-md">
                                新增貼文
                            </h4>
                            <form action="{{route('add_post')}}" method="post">
                                @csrf
                                <div x-show="selected == 0" class="grid max-w-xl bg-white h-auto w-auto rounded-sm pt-2 mb-3">
                                    <div>
                                        <!--Body-->
                                        <div class="px-6 pb-3">
                                            <!-- Title -->
                                            <div class="col-span-6 sm:col-span-4 mb-1">
                                                <label for="title">標題</label>
                                                <input id="title" name="title" placeholder="(選填)" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500  w-full shadow-sm p-1 border border-gray-300 rounded-md" type="text">
                                            </div>
                                            <!-- Description -->
                                            <div class="col-span-6 sm:col-span-4 mb-1">
                                                <label for="content">內容</label>
                                                <textarea id="content" name="content" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 p-1  w-full border border-gray-300 rounded-md"></textarea>
                                           
                                            </div>
                                            <!-- Tags -->
                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="tag">標籤</label>
                                                <input id="tag" name="tag" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500  w-full shadow-sm p-1 border border-gray-300 rounded-md" type="text">
                                            </div>  
                                            
                                        </div>
                                        <!--Footer-->
                                        <div class="flex justify-end pt-2 bg-gray-50 px-6 pb-3">
                            
                                            <button type="submit" class=" px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">張貼</button>
                                        
                                        </div>
                                    </div>    
                                </div>
                            </form>
                            
                        </li>
                    </ul>  
                    @endif
                    
                    <!--Posts =========================== -->
                    
                    @if($posts->count())
                        @foreach ($posts as $post)
                        <div class="grid max-w-xl bg-white h-auto w-auto rounded-sm p-3 pb-1 pt-1 mb-3">
                            
                            <div class="place-self-start w-full">
                            <!--Author-->
                                <div class="max-w-3xl flex  mb-3 justify-between">
                                    <div class="flex items-stretch">
                                        <div class="mr-3 self-center">
                                            <img class="shadow h-10 w-10 rounded-full mx-auto" src="{{ $post->user->profile_photo_url }}" alt="{{ $user->name }}" />
                                        </div>
                    
                                        <div class="self-center">
                                            <h2 class="font-bold text-base">{{ $post->user->name }}</h2>
                                            <p class="text-xs">{{ $post->created_at->diffForHumans()}} </p>
                                        </div>
                                    </div>
                                    
                                    

                                    <div class="self-center flex gap-3 items-stretch">
                                        @if(Auth::user()!==$user)
                                            <button class="self-center w-auto p-1 items-center justify-center rounded-md bg-gray-400 text-white text-xs" type="submit">追蹤</button>
                                        
                                        @endif
                                        <svg class="self-center text-gray-400 w-5 h-5 -mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path></svg>
                                    </div>
                                    
                                </div>  
                            
                            <!--Content-->
                                <div class="bg-white text-justify pr-3">
                                    <h4 class="font-bold mt-0 md:text-lg text-md">{{$post->title}}</h4>
                                    <span class="md:text-base text-sm ">
                                        {{$post->content}}
                                    </span>
                                </div >
                            </div>
                            
                            <div class="place-self-end w-full mt-2">
                                <!--tags-->
                                <div class=" mb-2 flex justify-between items-stretch">
                                    <div class="self-center">
                                        @for($j=1;$j<3;$j++)
                                        <a class="bg-red-50 rounded mr-1 text-xs pl-1 pr-1" href="#" alt="tagValue" >tagitem</a>
                                        @endfor
                                    </div>
                                    <div class="justify-end mr-4 self-center  text-gray-400">
                                        <a class="text-xs flex gap-1" href="#">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z"></path></svg>
                                            <p>查看合集 ...</p> 
                                        </a>
                                        
                                    </div>
                                    
                                </div>
                                <!--likes-->
                                <div class="flex text-sm border-t boader-grey-50 pt-1 justify-around">
                                    
                                    <div class="flex">
                                        <!--like-->
                                        <form action="" method="post">
                                            @csrf
                                            <button type="submit" class="hover:opacity-75 focus:outline-none">
                                                <svg class="text-red-500 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
                                            </button>
                                        </form>

                                        <!--unlike-->
                                        <form action="" method="post">
                                            @csrf
                                            <button type="submit" class="hover:opacity-75 focus:outline-none">
                                                <svg class="text-gray-400 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                                            </button>
                                        </form>
                                        <span class="ml-1">123</span>
                                       
                                    </div>
                                    
                                    <div class="flex">
                                        <svg class="text-gray-400 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                                        <span class="ml-1">20</span>
                                    </div>

                                    <div class="flex">
                                        <svg class="text-gray-400 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                                        <span class="ml-1">5</span>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        @endforeach
                        <div class="grid max-w-xl h-auto w-auto rounded-sm p-3 pb-1 pt-1 mb-1.5">
                            {{ $posts->links()}}
                        </div>
                        
                    @else 
                        <div class="flex justify-center">
                            <span>沒有任何貼文</span>
                        </div>
                    @endif
                    
                
                </div>

                <!--Right-->
                <div class="lg:block hidden z-0">
                    <div class="sticky top-20 bg-red-300 h-64 w-auto sm:rounded-lg mb-2 ">

                       Test

                    </div>
                </div>

            </div>
            
        
    </div>

    <!--Modal-->
    <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center z-10">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
        
        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
        
        

        <!-- Add margin if you want to see some of the overlay behind the modal-->
        <div class="modal-content text-left ">
            <form action="{{ route('update_profile')}}" method="post">
                @csrf
                <!--Title-->
                <div class="flex justify-between items-center pb-3 pt-3 px-6">
                    <p class="text-2xl font-bold">編輯簡介</p>
                    <div class="modal-close cursor-pointer">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                        </svg>
                    </div>
                </div>

                <!--Body-->
                <div class="px-6 pb-3">
                    <!-- Title -->
                    <div class="col-span-6 sm:col-span-4 mb-1">
                        <label for="title">標題</label>
                        <input id="title" name="title" value="{{old('title') ?? $user->profile->title }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500  w-full shadow-sm p-1 border border-gray-300 rounded-md" type="text">
                    </div>
                    <!-- Description -->
                    <div class="col-span-6 sm:col-span-4 mb-1">
                        <label for="description">介紹</label>
                        <textarea id="description" name="description" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 p-1  w-full border border-gray-300 rounded-md">{{ old('description') ?? $user->profile->description }} </textarea>
                    </div>
                    <!-- Url -->
                    <div class="col-span-6 sm:col-span-4">
                        <label for="url">網址</label>
                        <input id="url" name="url" value="{{ old('url') ?? $user->profile->url}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500  w-full shadow-sm p-1 border border-gray-300 rounded-md" type="text">
                    </div>  
                    
                </div>
                <!--Footer-->
                <div class="flex justify-end pt-2 bg-gray-50 px-6 pb-3">
                    <button class="modal-close px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2">取消</button>
                    <button type="submit" class=" px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">更新</button>
                
                </div>
            </form>
        </div>
        </div>
    </div>
    <!--ModalEnd -->


</x-app-layout>