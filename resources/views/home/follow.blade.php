<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
        </h2>
    </x-slot>

    <div class=" py-6  max-w-4xl mx-auto sm:px-6 lg:px-8 ">
        
        @if($users->count())
        @foreach($users as $user)
        
        <div class="bg-white  flex items-center p-2 rounded-xl shadow border m-2">
            <div class="relative flex items-center space-x-4">
              <img src="{{cloudinary_url($user->profile_photo_path)??$user->profile_photo_url}}" alt="{{ $user->name }}" class="w-16 h-16 rounded-full">
              
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
       
        @endforeach
        @else
        <div class="flex justify-center">
            <span>沒有任何資料</span> 
        </div>
        @endif
           
    </div>

</x-app-layout>