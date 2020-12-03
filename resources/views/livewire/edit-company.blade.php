<main class="py-5 mx-auto container">
    <section class="p-6 bg-white rounded-xl shadow-md">
        <h1 class="text-indigo-600 text-2xl mb-6">Editar minha empresa</h1>
        <form wire:submit.prevent="save">
            <div class="flex align-center space-x-4">
                <div class="flex-shrink-0 rounded-xl border-solid border-2 border-indigo-600 p-2 relative">
                    @if(isset($tempImage))
                        <img class="h-16 w-16 md:h-28 md:w-28" src="{{ $tempImage->temporaryUrl() }}" alt="Logo">
                    @else
                        <img class="h-16 w-16 md:h-28 md:w-28" src="{{$logo->url}}" alt="Logo">
                    @endif
                    <label for="logo">
                        <i class="material-icons text-indigo-700 absolute bg-white p-2 right-0 bottom-0 rounded-full shadow-md cursor-pointer hover:text-indigo-500 duration-150">create</i>
                        <input type="file" id="logo" class="hidden" autocomplete="no" wire:model="tempImage">
                        @error('tempImage')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </label>
                </div>
                <div class="flex-1">
                    <div class="mb-3">
                        <label for="name" class="block text-sm font-medium text-gray-700 leading-5">
                            Nome Empresarial
                        </label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input id="name" type="text" required wire:model.lazy="name" disabled
                                   class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('password') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red @enderror"/>
                        </div>
                    </div>
                    <div>
                        <label for="tradingName" class="block text-sm font-medium text-gray-700 leading-5">
                            Nome Fantasia
                        </label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input id="tradingName" type="text" required wire:model.lazy="tradingName"
                                   class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('password') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red @enderror"/>
                        </div>
                        @error('tradingName')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div>
                    <div class="mb-3">
                        <label for="cnpj" class="block text-sm font-medium text-gray-700 leading-5">
                            CNPJ
                        </label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input id="cnpj" type="text" required wire:model.lazy="cnpj" disabled
                                   class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('password') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red @enderror"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rounded-md shadow-sm mt-6">
                <button type="submit" class="mx-auto flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                    Finalizar Edição
                </button>
            </div>
        </form>
    </section>
</main>
