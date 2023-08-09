<div >
    <h2 class="text-2xl text-center mt-4 font-bold mb-4">Celliers</h2>

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



    <div class="max-h-[400px] overflow-y-auto pb-12">
    <div class="flex flex-col gap-4 ">
        @if ($cellars->isEmpty())
            <p class="text-center">Aucune cellier trouvée.</p>
        @else
            @foreach ($cellars as $cellar)
            <div class="border border-red rounded-lg p-2 text-red hover:bg-white hover:text-red shadow mx-auto flex justify-between items-center w-5/6">
                <a href="{{ route('singleCellar', ['cellar_id' => $cellar->id]) }}" class="col">
                    <div class="col">
                        <div class="card-body text-center border-10 border-gray-300 rounded-lg" style="margin-right: 1rem;">
                            <p class="">{{ $cellar->name }}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        @endif

        @if ($cellars->isEmpty() && !empty($search))
            <p class="text-center">Aucune cellier trouvée pour le terme de recherche "{{ $search }}".</p>
        @endif
    </div>
</div>



