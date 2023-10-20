<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Clientes
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if($haveSameClient && $isNewClient)
                <div class="max-w-md mx-auto bg-gray-200 rounded-md shadow-md p-6">
                    <h2 class="text-xl font-semibold text-gray-700 mb-4">Erro</h2>
                    <p class="text-gray-600">Sua empresa já possui esse cliente.</p>
                    <div class="mt-4 flex justify-end">
                        <button wire:click="$toggle('haveSameClient')" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">Ok</button>
                    </div>
                </div>
            @endif

        <button wire:click="goBack" class="bg-blue-500 hover:bg-blue-700 text-white font-bold p-2 mb-4 rounded">
            {{  !$isNewClient ? 'Adicionar cliente' : 'Voltar'}}
        </button>

        @if($isNewClient)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex p-8">
                    <input placeholder="Procurar cliente" wire:model="searchValue" type="text">

                    <button wire:click="search" >
                        <i class="fa-solid fa-magnifying-glass text-xl ml-4"></i>
                    </button>
                </div>

                <div class="flex p-8">
                    <div class=" text-gray-900 w-full">
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-slate-200 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nome
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        CPF
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Celular
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Adicionar
                                    </th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($people as $person)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $person['name'] }}
                                        </th>

                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $person['document_number'] }}
                                        </th>

                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $person['phone']  ?? '-'}}
                                        </th>

                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <button
                                                onclick="confirm('Você tem certeza?') || event.stopImmediatePropagation()"
                                                wire:click="createCustomer({{ $person['id'] }})"
                                            >
                                                <i class="fa-sharp fa-solid fa-plus"></i>
                                            </button>
                                        </th>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-slate-200 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nome
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        CPF
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Celular
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Ações
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($clients as $client)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $client['person']['name'] }}
                                        </th>

                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $client['person']['document_number'] }}
                                        </th>

                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $client['person']['phone']  ?? '-'}}
                                        </th>

                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <button>
                                                <i class="fa-solid fa-pen"></i>
                                            </button>
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
