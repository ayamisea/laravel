<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>IreneGram</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
    <body class="">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 sm:items-center sm:pt-0">
            

            
        
              
            <main class="mt-10">
                
                <h1 class="text-center text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                    <span class="block xl:inline">IreneGram</span>
                    <span class="block text-indigo-600 xl:inline">Demo</span>
                </h1>
                <div class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                    <p>- 社群網站</p> 
                    <p>- 功能：貼文、追蹤</p>
                    <p>- 開發人員：Irene Lai</p>
                    <p>- <a class="hover:text-indigo-300" href="https://github.com/ayamisea/laravel"> Github</a></p>
                    
                </div>
                <div class="gap-2 mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                    @if (Route::has('login'))
                        
                        @auth
                            
                            <div class="m-1 rounded-md shadow">
                                <a href="{{ url('/dashboard') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-500 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
                                    Get Started
                                </a>
                            </div>
                        @else
                            <div class="m-1 rounded-md shadow">
                                <a href="{{ route('login') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-500 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
                                    Login
                                </a>
                            </div>

                            @if (Route::has('register'))
                                <div class="m-1 rounded-md shadow">
                                    <a href="{{ route('register') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-500 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
                                        Register
                                    </a>
                                </div>
                            @endif
                        @endauth
                        
                    @endif
                    
                    
                    
                </div>
                
            </main>
               



        </div>
    </body>
</html>
