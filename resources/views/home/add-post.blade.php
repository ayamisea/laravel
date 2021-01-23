@if(Auth::user() === $user)
    <ul class="grid max-w-xl  h-auto w-auto rounded-sm mb-2 " x-data="{selected:null}">
        <li class="flex align-center flex-col">
            <h4 @click="selected !== 0 ? selected = 0 : selected = null"
                class="cursor-pointer  py-2 bg-indigo-300 text-white text-center inline-block hover:opacity-75 hover:shadow hover:-mb-3 rounded-md">
                新增貼文
            </h4>
            <form action="{{route('add_post')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div x-show="selected == 0" class="grid max-w-xl bg-white h-auto w-auto rounded-sm pt-2 mb-3">
                    <div>
                        <!--Body-->
                        <div class="px-6 pb-3">
                            <!-- Title -->
                            <div class="col-span-6 sm:col-span-4 mb-1">
                                <label for="title">標題</label>
                                <input id="title" name="title" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500  w-full shadow-sm p-1 border border-gray-300 rounded-md" type="text">
                            </div>
                            <!-- Description -->
                            <div class="col-span-6 sm:col-span-4 mb-1">
                                <label for="content">內容</label>
                                <textarea id="content" name="content" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 p-1  w-full border border-gray-300 rounded-md"></textarea>
                            
                            </div>
                            <!-- Tags -->
                            <div class="col-span-6 sm:col-span-4">
                                <!--<label for="tag">標籤</label>-->
                                <input id="tag" type="hidden" name="tag" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500  w-full shadow-sm p-1 border border-gray-300 rounded-md" type="text">
                            </div>  

                            <!-- Images -->
                            <label for="images">圖片</label>
                           @include('home.images')
                            
                         
                            
                            
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