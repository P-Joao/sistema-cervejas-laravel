<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cadastro de Cervejas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="/cadastrar">
                        @csrf <!-- Token de Formulário -->

                        <div>
                            <x-input-label for="name" :value="__('Nome da Cerveja')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus placeholder="Ex: Heineken, Spaten..." />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="brand" :value="__('Marca / Cervejaria')" />
                            <x-text-input id="brand" class="block mt-1 w-full" type="text" name="brand" :value="old('brand')" required />
                            <x-input-error :messages="$errors->get('brand')" class="mt-2" />
                        </div>

                        <div class="block mt-4">
                            <label for="artesanal" class="inline-flex items-center">
                                <input type="hidden" name="artesanal" value="0">
                                <input id="artesanal" type="checkbox"
                                    class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                                    name="artesanal"
                                    value="1"
                                    {{ old('artesanal') ? 'checked' : '' }}>
                                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('É Cerveja Artesanal?') }}</span>
                            </label>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="embalagem" :value="__('Embalagem')" />

                            <select id="embalagem" name="embalagem" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                <option value="" disabled selected>Selecione...</option>
                                <option value="lata" {{ old('embalagem') == 'lata' ? 'selected' : '' }}>Lata</option>
                                <option value="garrafa" {{ old('embalagem') == 'garrafa' ? 'selected' : '' }}>Garrafa</option>
                                <option value="barril" {{ old('embalagem') == 'barril' ? 'selected' : '' }}>Barril</option>
                            </select>

                            <x-input-error :messages="$errors->get('embalagem')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="style" :value="__('Estilo')" />
                            <x-text-input id="style" class="block mt-1 w-full" type="text" name="style" :value="old('style')" required placeholder="Ex: IPA, Pilsen, Stout" />
                            <x-input-error :messages="$errors->get('style')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="ibu" :value="__('IBU (Amargor)')" />

                            <x-text-input id="ibu" class="block mt-1 w-full"
                                type="number"
                                name="ibu"
                                :value="old('ibu')"
                                placeholder="Ex: 40" />

                            <x-input-error :messages="$errors->get('ibu')" class="mt-2" />
                            <p class="text-sm text-gray-500 mt-1">Quanto maior, mais amarga.</p>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="abv" :value="__('Teor Alcoólico (%)')" />

                            <x-text-input id="abv" class="block mt-1 w-full"
                                type="number"
                                step="0.1"
                                name="abv"
                                :value="old('abv')"
                                required />

                            <x-input-error :messages="$errors->get('abv')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="descricao" :value="__('Descrição / Harmonização')" />

                            <textarea id="descricao" name="descricao" rows="4"
                                class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                placeholder="Ex: Combina com carnes vermelhas...">{{ old('descricao') }}</textarea>

                            <x-input-error :messages="$errors->get('descricao')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="/cadastrar">
                                {{ __('Cancelar') }}
                            </a>

                            <x-primary-button class="ms-4">
                                {{ __('Cadastrar Cerveja') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>