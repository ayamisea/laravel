<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
        </h2>
    </x-slot>

    <div class="py-6 grid justify-center">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="flex py-5 lg:grid grid-cols-3 md:gap-5">
                <!--left-->
                <div class="lg:col-span-2 lg:col-span-2 w-full ">

                    <!--Profile =========================== -->
                    <div class="max-w-xl bg-white overflow-hidden shadow-lg sm:rounded-lg pt-4 pb-4 mb-5">
                        <div class="max-w-3xl mx-auto grid md:grid-cols-3 items-center ">
                            <div class="mb-5 hidden md:block justify-items-center">
                                <img class="h-32 w-32 rounded-full mx-auto" src="{{__('/storage/')}}{{ Auth::user()->profile_photo_path }}" alt="{{ Auth::user()->name }}" />
                            </div>
        
                            <div class="mr-6 ml-6 md:ml-0 col-span-2 ">
                                
                                <div class="flex mb-3 ">
                                    <div class="block md:hidden ">
                                        <img class="h-15 w-15 object-cover rounded-full" src="{{__('/storage/')}}{{ Auth::user()->profile_photo_path }}" alt="{{ Auth::user()->name }}" />
                                    </div>
                                    <div class="md:ml-0 ml-5">
                                        <div class="flex mb-1">
                                            <h2 class=" font-bold sm:text-lg text-base">{{ Auth::user()->name }}</h2>
                                            <button class=" w-auto p-1 ml-5 items-center justify-center rounded-md bg-black text-white text-xs" type="submit">追蹤</button>
                                        </div>
                                        <div class="flex gap-4 sm:text-sm text-xs">
                                            <p>10 貼文</p>
                                            <p>20 粉絲</p>
                                            <p>75 追蹤中</p>
                                        </div>
                                    </div>
                                    
                                </div>
                                <p class="text-justify sm:text-base text-sm">
                                    Tools like Vue and React are extremely powerful, but the complexity they add to a full-stack developer's workflow is insane.
                                </p>
                            </div>
                        </div>    
                    </div>

                    <!--Posts =========================== -->
                    @for ($i=0;$i<10;$i++)
                    <div class="grid max-w-xl bg-white h-auto w-auto rounded-sm p-3 pb-1 pt-1 mb-1.5">
                        
                        <div class="place-self-start w-full">
                           <!--Author-->
                            

                            <div class="max-w-3xl flex  mb-3 justify-between">
                                <div class="flex items-stretch">
                                    <div class="mr-3 self-center">
                                        <img class="shadow h-10 w-10 rounded-full mx-auto" src="{{__('/storage/')}}{{ Auth::user()->profile_photo_path }}" alt="{{ Auth::user()->name }}" />
                                    </div>
                
                                    <div class="self-center">
                                        <h2 class="font-bold text-base">{{ Auth::user()->name }}</h2>
                                        <p class="text-xs">2021/01/16 13:24 </p>
                                    </div>
                                </div>
                                
                                

                                <div class="self-center flex gap-3 items-stretch">
                                    <button class="self-center w-auto p-1 items-center justify-center rounded-md bg-gray-400 text-white text-xs" type="submit">追蹤</button>
                                    <svg class="self-center text-gray-400 w-5 h-5 -mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path></svg>
                                </div>
                                
                            </div>  
                          
                           <!--Content-->
                            <div class="bg-white text-justify pr-3">
                                <h4 class="font-bold mt-0 md:text-lg text-md">Test</h4>
                                <span class="md:text-base text-sm ">
                                    Tools like Vue and React are extremely powerful, but the complexity they add to a full-stack developer's workflow is insane.
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
                                    <!--
                                    <svg class="text-gray-400 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                                    -->
                                    <svg class="text-red-500 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
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
                    @endfor
                    
                </div>

                <!--Right-->
                <div class="lg:block hidden ">
                    <div class="sticky top-20 bg-red-300 h-64 w-auto sm:rounded-lg mb-2 "></div>
                </div>

            </div>
            
        </div>
    </div>
    

</x-app-layout>