
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
            
                        @for($i=0;$i<20;$i++)
                        <div class=" flex flex-row items-center p-2 mx-2">
                            <div class="flex items-center justify-center h-10 w-10 rounded-full bg-pink-500 text-pink-300 font-bold flex-shrink-0">
                            T
                            </div>
                            <div class="flex flex-col flex-grow ml-3">
                                <div class="flex items-center">
                                    <div class="text-sm font-medium">Sarah D</div>
                                    <div class="h-2 w-2 rounded-full bg-green-500 ml-2"></div>
                                    <div class="text-xs ">2 hours</div>
                                </div>
                            
                                <div class="text-xs text-justify bg-gray-100 w-full p-2 rounded-md">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, doloribus?
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, doloribus?
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, doloribus?
                                </div>
                            </div>
                        </div>
                        @endfor
                        
                    </div>
                </div>   
        
            </div>
        </div>

        <form action="" method="post">
            @csrf 
            <div class=" flex items-center justify-between border-t gap-2 px-2 p-2">
                
                <textarea id="content" name="content" rows="1" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-1 h-auto w-full border border-gray-300 rounded-md"></textarea>
                
                <div class="w-auto">
                    <button type="submit" class="w-16 px-4 bg-indigo-500 p-1 rounded-lg text-white hover:bg-indigo-400">張貼</button>
                </div>
            </div>
            
        </form> 
    </div>
    
</div>
        
 