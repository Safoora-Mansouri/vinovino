<div class=" mb-8 mt-0">
    <div class="relative flex items-center ">
        <input type="text" wire:model="search" wire:keydown="fetchResults" placeholder="Recherche..." class="flex-grow bg-transparent outline-none pl-6 pr-16 py-1 border border-gray-300 focus:border-red focus:ring-0 rounded mr-2">
        <svg wire:click="handleSearch" class="h-5 w-5  text-gray-500 cursor-pointer absolute top-1/2 
        transform -translate-y-1/2" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="positin:relative; right:40px;">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
        </svg>
        <a href="{{ route('bottle-advanced-form') }}" class="flex items-center text-decoration-none ">
             <svg class="h-6 w-6 text-gray-500 " width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z"/>
                <path d="M5.5 5h13a1 1 0 0 1 0.5 1.5L14 12L14 19L10 16L10 12L5 6.5a1 1 0 0 1 0.5 -1.5"/>
            </svg>
        </a>
        @if(!empty($results))
            <div class="absolute top-full left-0 z-10 bg-white border border-gray-300 rounded w-full max-h-[23rem] overflow-y-auto">
                <ul class="list-inside p-0">
                    @foreach($results as $result)
                        <li wire:click="selectResult('{{ $result['name'] }}')" class="px-4 py-2 border-b border-gray-300">
                        {{ $result['name'] }} - {{ $result['description'] }} - {{ $result['price'] }} - {{ $result['code_saq'] }}
                        </li>
                    @endforeach
                </ul>
                @if(count($results) >= 10)
                    <div class="text-center mt-1 mb-2">
                        <button wire:click="loadMore" class="mt-2 bg-red text-white border-none px-4 py-2 text-center text-sm cursor-pointer rounded">Charger plus</button>
                    </div>
                 @endif
            </div>
        @endif

    </div>
   
</div>
