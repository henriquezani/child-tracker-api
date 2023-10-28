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
    <div class="bg-slate-100 col-span-3 min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div class="w-full grid justify-center mt-32 " >
            <img src="{{ asset('images/logo_side.png') }}" alt="Logo" width="600px"/>
        </div>
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

                <form wire:submit.prevent="test">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block font-medium text-sm text-gray-700">Email</label>

                        <input wire:model="email" id="email" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                               type="email"
                               name="email"
                               required="required"
                               autofocus="autofocus"
                               autocomplete="username"/>

                        <div class="text-red-600 font-semibold">@error('email') {{ $message }} @enderror</div>
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <label for="password" class="block font-medium text-sm text-gray-700">Senha</label>

                        <input wire:model="password" id="password" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                               type="password"
                               name="password"
                               required="required"
                               autocomplete="current-password" />
                               
                        <div class="text-red-600 font-semibold">@error('password') {{ $message }} @enderror</div>
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Lembrar senha') }}</span>
                            @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ml-28" href="{{ route('password.request') }}">
                                {{ __('Esqueceu sua senha?') }}
                            </a>
                        @endif
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">


                        <button class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-3" wire:click="cadastro">
                                Cadastrar-se
                        </button>

                        <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-3" type="submit">
                            {{ __('Entrar') }}
                        </button>

                    </div>
                </form>
            </div>
    </div>
</div>
