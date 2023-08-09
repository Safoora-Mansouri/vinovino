<div class="p-4">
    <h2 class="text-2xl font-bold mb-4">Cellars</h2>

    @error('cellars')
        <div class="text-red-500">{{ $message }}</div>
    @enderror

    <livewire:cellar-search wire:loading.attr="disabled" />

    <a href="{{ route('add-cellar') }}" 
          class="bg-gold opacity-80 text-white px-3 py-1 rounded hover:bg-dark-red  mt-8 block w-32 ml-auto">
                         @livewire('button', ['label' => 'Créer cellier'])
    </a>

    <div class="flex flex-col gap-4 max-w-3xl mx-auto mt-4">
        @if ($cellars->isEmpty())
            <p class="text-center">Aucune cellier trouvée.</p>
        @else
            @foreach ($cellars as $cellar)
            <a href="{{ route('singleCellar', ['cellar_id' => $cellar->id]) }}" class="col bg-red rounded-lg p-4 text-white hover:bg-white hover:text-red shadow">
                    <div class="card-body " style="margin-right: 1rem;">
                        <p class="mb-4">Name: {{ $cellar->name }}</p>
                    </div>

            </a>
            @endforeach
        @endif

        @if ($cellars->isEmpty() && !empty($search))
            <p class="text-center">Aucune cellier trouvée pour le terme de recherche "{{ $search }}".</p>
        @endif
    </div>
</div>