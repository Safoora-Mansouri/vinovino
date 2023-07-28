<div>
    @if (session()->has('message'))
    <div class="mb-4 text-green-500">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent class='w-full p-4 bg-white shadow-lg rounded-lg'>
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="border-b border-gray-900/10 pb-12">

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nom</label>
                            <div class="mt-2">
                                <input type="text" name="name" id="name" autocomplete="name" wire:model='name' class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                @error('name') <span class="text-red">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-4">
                            <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                            <div class="mt-2">
                                <textarea rows="2" wire:model='description' class="focus:placeholder-transparent block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Délicieux Bourgogne, gourmand et tout en fruit."></textarea>
                                @error('description') <span class="text-red">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-4">
                            <label for="price" class="block text-sm font-medium leading-6 text-gray-900">Prix</label>
                            <div class="mt-2">
                                <input type="number" id="price" name="price" autocomplete="price" wire:model='price' class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                @error('price') <span class="text-red">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-4">
                            <label for="format" class="block text-sm font-medium leading-6 text-gray-900">Format</label>
                            <div class="mt-2">
                                <input type="string" id="format" name="format" autocomplete="format" wire:model='format' class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                @error('format') <span class="text-red">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-4">
                            <label for="vintage" class="block text-sm font-medium leading-6 text-gray-900">Vintage</label>
                            <div class="mt-2">
                                <input type="number" id="vintage" name="vintage" autocomplete="vintage" wire:model='vintage' class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                @error('vintage') <span class="text-red">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Pays</label>
                            <div class="mt-2">
                                <select id="country_id" name="country_id" autocomplete="country_id" wire:model='country_id' class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                                @error('country_id') <span class="text-red">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="type" class="block text-sm font-medium leading-6 text-gray-900">Type</label>
                            <div class="mt-2">
                                <select id="type_id" name="type_id" autocomplete="type_id" wire:model='type_id' class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    @foreach ($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                                @error('type_id') <span class="text-red">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-4">
                            <label for="type" class="block text-sm font-medium leading-6 text-gray-900">Image URL</label>
                            <div class="mt-2">
                                <input wire:model="image" id="image" type="text" name="image" autocomplete="image" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                @error('image') <span class="text-red">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>


                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Annuler</button>
                        <button wire:click="saveUnlistedBottle" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Ajouter</button>
                    </div>
                </div>
            </div>
    </form>
</div>