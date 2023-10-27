<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <a href="/">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <form wire:submit.prevent="save">

                <!-- User name -->
                <div class="mt-4">
                    <label class="block font-medium text-sm text-gray-700" for="username">Nome do usuário:</label>
                    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm  mt-1 w-full" type="text" id="username" wire:model="username" autofocus>
                    <div class="text-red-600 font-semibold">@error('username') {{ $message }} @enderror</div>
                </div>

                <!-- Document number -->
                <div class="mt-4">
                    <label class="block font-medium text-sm text-gray-700" for="document_number">CPF:</label>
                    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" type="text" id="document_number" wire:model="document_number">
                    <div class="text-red-600 font-semibold">@error('document_number') {{ $message }} @enderror</div>
                </div>

                <!-- Company -->
                <div class="mt-4  block w-full">
                    <label class="block font-medium text-sm text-gray-700" for="company">Empresa</label>
                    <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" id="company" wire:model="company_id">
                        <option>Escolha a empresa</option>
                        @foreach($companies as $com)
                            <option value='{{$com->id}}'>{{$com->name}}</option>
                        @endforeach
                    </select>
                    <a href="/company-register"><small>Não encontrou a sua empresa?</small></a>
                </div>

                <!-- Email -->
                <div class="mt-4">
                    <label class="block font-medium text-sm text-gray-700" for="email">Email:</label>
                    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" type="text" id="email" wire:model="email">
                    <div class="text-red-600 font-semibold">@error('email') {{ $message }} @enderror</div>
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <label class="block font-medium text-sm text-gray-700" for="password">Senha:</label>
                    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" type="password" id="password" wire:model="password">
                    <div class="text-red-600 font-semibold">@error('password') {{ $message }} @enderror</div>
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <label class="block font-medium text-sm text-gray-700" for="password_confirmation">Confirmar senha:</label>
                    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" type="password" id="password_confirmation" wire:model="password_confirmation">
                    <div class="text-red-600 font-semibold">@error('password_confirmation') {{ $message }} @enderror</div>
                </div>
            </form>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ url('/') }}">
                        Já é cadastrado?
                    </a>

                    <button wire:click="save" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-4">
                        Cadastrar-se
                    </button>
                </div>

        </div>
    </div>



