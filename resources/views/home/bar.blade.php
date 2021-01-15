<div class="sticky top-20 p-3 bg-red-300 h-64 w-auto sm:rounded-lg mb-2 ">

    <p> 共有 {{$user->posts->count()}} {{Str::plural('post',$user->posts->count())}}</p>

 </div>