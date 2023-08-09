<div class="p-4">
    <h2 class="text-2xl font-bold mb-4 text-center">Cellars</h2>

    @error('cellars')
    <div class="text-red-500">{{ $message }}</div>
    @enderror

    <div class="flex items-center justify-between  mb-8  ml-0">
        <div class="flex items-center space-x-2 ">
            <a href="{{ route('add-cellar') }}" class="bg-gold  text-white px-3 py-1 rounded hover:bg-dark-red  block w-28 ml-6 mx-auto">@livewire('button', ['label' => 'Créer cellier'])
            </a>
        </div>
        <div>
            <button class='w-full flex justify-center items-center mr-14 ' wire:click="$emit('toggleSearch')">
                <svg class="h-6 w-6 text-red" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </button>
        </div>
    </div>
  
    <div>
    @if ($showSearch)
        <livewire:cellar-search wire:loading.attr="disabled" />
        @endif
    </div>

    <a href="{{ route('add-cellar') }}" class="bg-gold opacity-80 text-white px-3 py-1 rounded hover:bg-dark-red mt-8 block w-24 mx-auto">
        <svg class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z" />
        </svg>


    </a>
    <div class="flex flex-col gap-4 max-w-full mx-auto mt-4"> <!-- Set max-width to full here -->
        @if ($cellars->isEmpty())
        <p class="text-center">Aucune cellier trouvée.</p>
        @else
        @foreach ($cellars as $cellar)
        <div class="col bg-red rounded-lg p-4 text-white hover:bg-white hover:text-red shadow mx-auto flex justify-between items-center w-full"> <!-- Apply w-full class here -->

            @if($cellar->id== $updateMode)
            <form wire:submit.prevent="editCellar({{ $cellar->id }})">
                <input type="text" wire:model="cellar_name" id="name" class="w-full px-3 py-2 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500">

                @error('cellar_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                <button class="bg-gold opacity-80 text-white px-3 py-1 rounded hover:bg-dark-red mt-8 block w-24 mx-auto" type="submit">Submit</button>
            </form>


            @else
            <a href="{{ route('singleCellar', ['cellar_id' => $cellar->id]) }}">
                <p class="mb-4 font-bold">Nom: {{ $cellar->name }}</p>
            </a>

            <div class="flex items-center space-x-2">
                <button class="h-6 w-6 text-red-500" wire:click="updateCellarMode({{ $cellar->id }})">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </button>
                <button class="h-6 w-6 text-red-500" wire:click="deleteCellar({{ $cellar->id }})">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </button>
            </div>
            @endif
        </div>
        @endforeach
        @endif

        @if ($cellars->isEmpty() && !empty($search))
        <p class="text-center">Aucune cellier trouvée pour le terme de recherche "{{ $search }}".</p>
        @endif
    </div>
