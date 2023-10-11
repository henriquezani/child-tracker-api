    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Clientes
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <button wire:click="$toggle('isNewClient')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold p-2 mb-4 rounded">
                Adicionar Cliente
            </button>

            <button wire:click="$toggle('isNewClient')">
                Adicionar Cliente
            </button>



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
                                            {{ $client['user']['username'] }}
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
        </div>
    </div>

{{--<x-app-layout>--}}
{{--</x-app-layout>--}}
{{--<div>--}}
{{--    <x-slot name="header">--}}
{{--        <h2 class="font-semibold text-xl text-gray-800 leading-tight">--}}
{{--            Clientes--}}
{{--        </h2>--}}
{{--    </x-slot>--}}

{{--    <livewire:test />--}}

{{--    <button wire:click="toggleee">--}}
{{--        Sort--}}
{{--    </button>--}}

{{--    @if ($isNewClient)--}}
{{--        true--}}
{{--    @else--}}
{{--        false--}}
{{--    @endif--}}

{{--</div>--}}
