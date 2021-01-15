
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