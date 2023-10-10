 <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <a href="/">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <form wire:submit="save">
            <!-- Name -->
                <div class="mt-4">
                <label class="block font-medium text-sm text-gray-700" for="name">Razão Social:</label>
                <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" type="text" id="name" wire:model="name" required autofocus autocomplete="name">
                <div>@error('name') {{ $message }} @enderror</div>
                </div>

            <!-- Fancy Name -->
                <div class="mt-4">
                    <label class="block font-medium text-sm text-gray-700" for="name">Nome fantasia:</label>
                    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" type="text" id="name" wire:model="fancy_name" required autocomplete="fancy_name">
                    <div>@error('fancy_name') {{ $message }} @enderror</div>
                </div>

            <!-- CNPJ Company -->
                <div class="mt-4">
                    <label class="block font-medium text-sm text-gray-700" for="cnpj">Cnpj:</label>
                    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" type="text" id="cnpj" wire:model="document_number" required autocomplete="cnpj">
                    <div>@error('cnpj') {{ $message }} @enderror</div>
                </div>

            <!-- State -->
                <div class="block w-full space-x-2">
                    <div class="mt-4  inline-block w-47">
                        <label class="block font-medium text-sm text-gray-700" for="state">Estado:</label>
                        <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" id="state" wire:model="state" required>
                            <option value="AC">SP</option>
                            <option value="AL">MG</option>
                        </select>
                    </div>

                <!-- City -->
                <div class="mt-4 inline-block w-47">
                    <label class="block font-medium text-sm text-gray-700" for="city">Cidade:</label>
                    <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" id="city" wire:model="city" required>
                        <option value="AC">Limeira</option>
                    </select>
                </div>
                </div>

                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-4">
                    Cadastrar-se
                </button>
            </form>
        </div>
 </div>

