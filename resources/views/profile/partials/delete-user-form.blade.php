<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Deletar conta') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Quando a conta é deletada os dados são excluídos permanentemente, tenha certeza antes de executar essa operação.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Deletar conta') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Tem certeza que deseja deletar sua conta?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Quando a conta é deletada os dados são excluídos permanentemente. Por favor insira sua senha para confirmar essa operação') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Senha') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancelar') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('Deletar conta') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
