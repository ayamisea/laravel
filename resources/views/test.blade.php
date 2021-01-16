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


    <div class="bg-white  flex items-center p-2 rounded-xl shadow border m-2">
        <div class="relative flex items-center space-x-4">
          <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" class="w-16 h-16 rounded-full">
          
        </div>
        <div class="flex-grow p-3">
          <div class="font-semibold text-gray-700">
              <span>
                {{$user->name}}
              </span>
              <span class="text-sm text-gray-500">
                {{'@'.$user->username}}
              </span>
             
          </div>
          <div class="flex gap-2 text-sm text-gray-500">
                <span class="grid justify-items-center sm:flex"><p class="sm:mr-1"><a href="{{route('profile',$user->username)}}">{{$user->posts->count()}}</a></p> <p>貼文</p> </span>
                <span class="grid justify-items-center sm:flex"><p class="sm:mr-1"><a href="{{route('follower',$user->username)}}">{{$user->profile->follows->count()}}</a></p> <p>粉絲</p></span>
                <span class="grid justify-items-center sm:flex"><p class="sm:mr-1"><a href="{{route('follow',$user->username)}}">{{$user->follows->count()}}</a></p> <p>追蹤中</p></span>
          </div>
        </div>
        <div class="">
            @auth
                @if(Auth::user()->id!==$user->id)
                    @if($user->profile->followBy(Auth::user()))
                    <!-- ToUnfollow-->
                    <form action="{{route('unfollow_profile',$user->profile)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="self-center w-auto p-1 ml-5 items-center justify-center rounded-md bg-black text-white text-xs hover:opacity-75 focus:outline-none">
                            取消追蹤
                        </button>
                    </form>
                    @else
                    <!-- ToFollow-->
                    <form action="{{ route('follow_profile',$user->profile)}}" method="post">
                        @csrf
                        <button type="submit" class="self-center w-auto p-1 ml-5 items-center justify-center rounded-md bg-black text-white text-xs hover:opacity-75 focus:outline-none">
                            追蹤
                        </button>
                    </form>
                    @endif
                @endif
            @endauth
          
        </div>
    </div>
      

</x-app-layout>