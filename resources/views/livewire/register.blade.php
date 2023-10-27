<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Child Tracker</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased">
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div>
        <a href="/">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-20 h-20 fill-current text-gray-500" />
        </a>
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <form wire:submit="save">
            @csrf


            <!-- User name -->
            <div class="mt-4">
                <label class="block font-medium text-sm text-gray-700" for="user_name">Nome do usuário:</label>
                <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm  mt-1 w-full" type="text" id="user_name" wire:model="user" required autocomplete="user">
                <div>@error('user') {{ $message }} @enderror</div>
            </div>

            <!-- User name -->
            <div class="mt-4  block w-full">
                <label class="block font-medium text-sm text-gray-700" for="state">Empresa</label>
                <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" id="state" wire:model="company" required>
                    <option value="AC">Hopi Hari</option>
                </select>
                <a href="/company-register"><small>Não encontrou a sua empresa</small></a>
            </div>



            <!-- Password -->
            <div class="mt-4">
                <label class="block font-medium text-sm text-gray-700" for="password">Senha:</label>
                <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" type="password" id="password" wire:model="password" required autocomplete="password">
                <div>@error('password') {{ $message }} @enderror</div>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <label class="block font-medium text-sm text-gray-700" for="password_confirmation">Confirmar senha:</label>
                <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" type="password" id="password_confirmation" wire:model="password_confirmation" required autocomplete="password">
                <div>@error('password') {{ $message }} @enderror</div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ url('/') }}">
                    Já é cadastrado?
                </a>

                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-4">
                    Cadastrar-se
                </button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
