<div class="p-6 h-screen">
    <h1 class="text-3xl font-bold mb-4">{{ $cellar->name }}</h1>
    <h2 class="text-xl font-semibold mb-2">Bouteilles:</h2>
    <a href="{{ route('bottles') }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
        @livewire('button', ['label' => 'Ajouter bottles'])
    </a>
    <ul class="grid grid-cols-1 gap-4">

        @foreach($cellar->bottles as $bottle)
        <li class="bg-white p-4 shadow-md rounded-md flex justify-around items-center" wire:key="{{ $bottle->id }}">


            <article class="mx-6 my-2 flex border-2 border-gold rounded-lg items-center gap-2">
                <img src="{{ $bottle->image }}" alt="{{ $bottle->name }}" class="w-36 h-40">
                <div class="flex flex-col justify-end items-end p-4  sm:flex-row sm:justify-between sm:gap-4">
                    <h1 class="text-right font-bold font-roboto">{{ $bottle->name }}</h1>
                    <p class="text-xs mt-2 mb-2">{{ $bottle->description }}</p>
                </div>
                <div class="flex flex-col p-3 space-y-2.5 items-center ">
                    <p class="text-sm text-gray-500 mb-4">Quantité: {{ $bottle->pivot->quantity }}</p>

                    <div class="flex items-center space-x-2 mb-4">

                        <button wire:click="$emit('incrementListen',{{ $bottle->id}})" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </button>

                        <button wire:click="decrement({{$bottle->id , $cellar->cellar_id}})" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                            </svg>
                        </button>

                    </div>
                    <!-- <button wire:click="deleteBottle({{ $bottle->id }})" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                        Supprimer Bottle
                    </button> -->


                    <div x-data="{ open: false }" class="relative">
                        <div class="inline-flex items-center overflow-hidden rounded-md border bg-white">
                            <a href="#" class="border-e px-4 py-2 text-sm/none text-gray-600 hover:bg-gray-50 hover:text-gray-700">
                                Supprimer
                            </a>

                            <button @click="open = !open" class="h-full p-2 text-gray-600 hover:bg-gray-50 hover:text-gray-700">
                                <span class="sr-only">Menu</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>

                        <div x-show="open" @click.away="open = false" class="absolute end-0 z-10 mt-2 w-56 rounded-md border border-gray-100 bg-white shadow-lg" role="menu">
                            <div class="p-2">
                                <button wire:click="deleteBottle({{ $bottle->id }})" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                    Supprimer Bottle
                                </button>

                                <a href="#" class="block rounded-lg px-4 py-2 text-sm text-gray-500 hover:bg-gray-50 hover:text-gray-700" role="menuitem">
                                    boire bouteille
                                </a>
                            </div>
                        </div>
                    </div>


                    <a href="{{ route('update_bottle', ['cellar_id' => $cellar->id,'bottle_id' => $bottle->id]) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                        modifier cellier
                    </a>

                </div>
            </article>

        </li>

        @endforeach
    </ul>
</div>

</div>