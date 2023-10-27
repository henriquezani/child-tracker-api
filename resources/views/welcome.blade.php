<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Child Tracker' }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased selection:text-violet-500 selection:bg-violet-100">
        <div class="grid grid-cols-5 w-full h-screen relative">
            @if (Route::has('login'))
                <div class="absolute right-0 top-0 mr-2 mt-2">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-violet-500">Dashboard</a>
                    @else
                        <a href="{{ url('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-violet-500">Entrar</a>

                        <a href="{{ url('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-violet-500">Cadastrar-se</a>
                    @endauth
                </div>
            @endif
           <div class="bg-purple-400 col-span-2 border-r-purple-500 border-opacity-5 relative">
               <img src="{{ asset('images/imgApp.png')}}" alt="app"  class="w-2/4 rounded-lg inline-block absolute inset-x-1/4 inset-y-1/4"/>


           </div>
            <div class="bg-slate-50 col-span-3 bg-[url('/public/images/testefundo.jpg')] bg-cover">
                    <div class="w-full grid justify-center mt-32 " >
                        <img src="{{ asset('images/logo_side.png') }}" alt="Logo" width="600px"/>
                    </div>
                    <p class="mt-2.5 ml-5 mr-5 text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                        with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    </p>
            </div>
        </div>
    </body>
</html>
