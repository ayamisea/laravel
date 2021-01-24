
<div class="border-t boader-grey-50">

    <div x-show="selected == 1" class="grid max-w-xl bg-white h-auto w-auto rounded-sm pt-2 mb-3">
        
        <div class="">
            <div class=" border-b-2 border-gray-100 px-2">
                <div class="text-xs text-gray-500 font-semibold">
                    留言
        
                </div>
            </div>
        
            <div class="h-44  px-2 ">
        
                <div class="h-full overflow-hidden relative">
                    <div class="flex flex-col h-full overflow-y-auto -mx-4">
                        
                        @if($messages->count())
                            @foreach($messages as $message)
                            @php
                                $message_user = App\Models\User::find($message->user_id);
                            @endphp

                            <div class=" flex flex-row items-center p-2 mx-2 ">
                                <div class=" items-center justify-center h-10 w-10 flex-shrink-0">
                                    <a href="{{route('profile',$message_user->username)}}">
                                        <img class="shadow rounded-full" src="{{cloudinary_url($message_user->profile_photo_path)??$message_user->profile_photo_url}}" alt="{{ $user->name }}" />
                                    </a>
                                </div>
                                <div class="flex flex-col flex-grow ml-3">
                                    <div class="flex justify-between items-center gap-1">
                                        <div class="text-sm font-medium">
                                            <a href="{{route('profile',$message_user->username)}}">
                                                {{$message_user->name}}
                                            </a>
                                        </div>

                                        <div class="text-xs flex  mr-2 text-gray-300">
                                            <div>{{$message->created_at->diffForHumans()}}</div>
                                            @auth
                                            @if($message_user->id === Auth::user()->id)
                                            <form action="{{route('delete_message',$message)}}" method="post">
                                                @csrf 
                                                @method('DELETE')
                                                <div class="flex">
                                                    <p class="mx-1">|</p>
                                                    <button class="hover:text-black w-full" type="submit">
                                                        <p>刪除</p> 
                                                    </button>
                                                </div>
                                            </form>
                                            
                                           
                                            @endif
                                            @endauth
                                        </div>
                                    </div>
                                
                                    <div class="text-xs text-justify bg-gray-100 w-auto p-2 rounded-md">
                                        <p class="">{{$message->content}}</p>
                                        
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                        <div class=" flex flex-row justify-center items-center p-2 mx-2 ">
                            <p class="text-xs  text-gray-500">目前無人留言 ...</p>
                        </div>
                        @endif
                    </div>
                </div>   
        
            </div>
        </div>
        
        <form action="{{route('add_message')}}" method="post">
            @csrf 
            <div class=" flex items-center justify-between border-t gap-2 px-2 p-2">
                @auth
                <textarea id="content" name="content" rows="1" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-1 h-auto w-full border border-gray-300 rounded-md"></textarea>
                <div>
                    <input id="post_id" name="post_id" type="hidden" value="{{$post->id }}">
                </div>
                <div class="w-auto">
                    <button type="submit" class="w-16 px-4 bg-indigo-500 p-1 rounded-lg text-white hover:bg-indigo-400">張貼</button>
                </div>
                @endauth
            </div>
            
        </form> 
    </div>
    
</div>
        
 