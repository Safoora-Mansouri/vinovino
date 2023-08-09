<div class="mb-16">
    <div class="mt-6">
        <div class="max-w-1200px">
            <div class="flex items-center justify-between space-x-2 mb-8 mt-5 ml-5">
                <div class="flex items-center space-x-2">
                    <button wire:click="$emit('Filter', false)" class="bg-white text-black px-3 py-1 rounded border border-red hover:bg-red hover:text-white transition-colors duration-300">
                        SAQ
                    </button>
                    <button wire:click="$emit('Filter', true)" class="bg-white text-black px-3 py-1 rounded border border-red hover:bg-red hover:text-white transition-colors duration-300">
                        Unique
                    </button>
                </div>
                <div>
                    <button class='w-full flex justify-center items-center mr-16' wire:click="$emit('toggleSearch')">
                        <svg class="h-6 w-6 text-red" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Center the search component in mobile mode -->
            <div class="flex items-center justify-center sm:justify-start sm:items-start sm:space-x-2 sm:mb-4 ">
                @if ($showSearch)
                    @livewire('bottle-search')
                @endif
            </div>
            @if ($unlisted)
                <a href="{{ route('add-bottle') }}"  class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                @livewire('button', ['label' => 'Ajouter nouvelle bouteille'])
                </a>
            @endif

            @foreach($bottles as $bottle)
                <article class="relative mx-6 my-2 flex border-2 border-red bg-white rounded-3xl items-center gap-2 mb-12">
                    <img src="{{ $bottle->image }}" alt="{{ $bottle->name }}" class="max-w-80 relative bottom-3 -mt-4 transform transition-transform duration-300 hover:scale-125 hover:brightness-80">

                    <div class="flex flex-col justify-end items-left p-4 sm:flex-row sm:justify-between sm:gap-4">
                        <h1 class="text-left font-bold font-roboto">{{ $bottle->name }}</h1>
                        <p class="text-xs mt-2 mb-2">{{ $bottle->description }}</p>
                        <h2 class="text-left  font-montserrat">${{ $bottle->price }}</h2>
                    </div>
                    <a href="{{ route('add-bottles-to-cellar', ['bottle_id' => $bottle->id]) }}"  class="absolute bottom-3 right-3 rounded-md text-sm font-semibold  shadow-sm flex items-center">
                        <svg class="h-6 w-6 text-red mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293h3.172a1 1 0 00.707-.293l2.414-2.414a1 1 0 01.707-.293H20"/>
                        </svg>
                    </a>   
                </article>
            @endforeach

            @if ($bottles->count())
            <div class="col-span-2">
                <div class="flex justify-center flex-col-reverse items-center">
                    <div class="text-sm text-gray-500 mb-2">
                        Affichage de {{ $bottles->firstItem() }} sur {{ $bottles->lastItem() }} of {{ $bottles->total() }} résultats
                    </div>

                    <div class="flex justify-center mb-2">
                        {{ $bottles->links() }}
                    </div>
                </div>
            </div>
            @else
            <p>No bottles found.</p>
            @endif
        </div>
    </div>
</div>




