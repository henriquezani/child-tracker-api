<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <a href="/">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <form wire:submit.prevent="save">
                <!-- Name -->
                <div class="mt-4">
                    <label class="block font-medium text-sm text-gray-700" for="name">Razão Social:</label>
                    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" wire:model="name" type="text" id="name"  autofocus autocomplete="name">
                    <div class="text-red-600 font-semibold">@error('name') {{ $message }} @enderror</div>
                </div>

                <!-- Fancy Name -->
                <div class="mt-4">
                    <label class="block font-medium text-sm text-gray-700" for="fancy_name">Nome fantasia:</label>
                    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" type="text" id="fancy_name" wire:model="fancy_name" autocomplete="fancy_name">
                    <div class="text-red-600 font-semibold">@error('fancy_name') {{ $message }} @enderror</div>
                </div>

                <!-- CNPJ Company -->
                <div class="mt-4">
                    <label class="block font-medium text-sm text-gray-700" for="document_number">Cnpj:</label>
                    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" wire:model="document_number" type="text" id="document_number" autocomplete="document_number">
                    <div class="text-red-600 font-semibold">@error('document_number') {{ $message }} @enderror</div>
                </div>
            </form>

            <!-- Zipcode -->
            <div class="mt-4">
                <label class="block font-medium text-sm text-gray-700" for="zipcode">CEP:</label>
                <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" wire:model="zipcode" type="text" name="zipcode" id="zipcode">
                <div class="text-red-600 font-semibold">@error('zipcode') {{ $message }} @enderror</div>
            </div>

            <div class="mt-4 block w-full">
                <label class="block font-medium text-sm text-gray-700" for="state">Estado:</label>
                <select  class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" wire:model.live="state" id="state">
                    <option value="">Escolha o estado</option>
                    @foreach($states as $st)
                        <option value="{{$st->id}}">{{$st->uf}}</option>
                    @endforeach
                </select>
            </div>

            <!-- City -->
            <div class="mt-4 block w-full">
                <label class="block font-medium text-sm text-gray-700" for="city">Cidade:</label>
                <select id="city" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" wire:model="city">
                    <option value="" selected>Escolha a cidade</option>
                    @foreach($cities as $ct)
                        <option value="{{$ct->id}}">{{$ct->name}}</option>
                    @endforeach
                </select>
            </div>

            <!-- Street -->
            <div class="mt-4">
                <label class="block font-medium text-sm text-gray-700" for="street">Rua:</label>
                <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" wire:model="street" type="text" name="street" id="street">
                <div class="text-red-600 font-semibold">@error('street') {{ $message }} @enderror</div>
            </div>

            <!-- Neighborhood -->
            <div class="mt-4">
                <label class="block font-medium text-sm text-gray-700" for="neighborhood">Bairro:</label>
                <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" wire:model="neighborhood" type="text" name="neighborhood" id="neighborhood">
                <div class="text-red-600 font-semibold">@error('neighborhood') {{ $message }} @enderror</div>
            </div>

            <!-- Number -->
            <div class="mt-4">
                <label class="block font-medium text-sm text-gray-700" for="number">Número:</label>
                <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" wire:model="number" type="text" name="number" id="number">
                <div class="text-red-600 font-semibold">@error('number') {{ $message }} @enderror</div>
            </div>

            <div class="flex items-center justify-center mt-4">
                <button  wire:click="save" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-4">
                    Cadastrar
                </button>
            </div>

        </div>
</div>
