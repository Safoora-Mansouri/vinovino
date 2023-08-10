<div class=" mb-8 mt-0">
    <div class="relative left-16 flex items-center justify-center w-3/4 lg:w-1/5 lg:left-8 ">
        <input type="text" wire:model="search" wire:keydown="fetchResults"  placeholder="Recherche cellier..." class="flex-grow bg-transparent outline-none py-1 border border-gray-300 focus:border-red focus:ring-0 rounded mr-8">
        <svg wire:click="handleSearch" class="h-5 w-5  text-gray-500 cursor-pointer absolute top-1/2  transform -translate-y-1/2" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="right:40px;">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
        </svg>
        @if($showDropdown && !empty($results))
            <ul class="absolute top-full left-[-1rem]  z-10 bg-white border border-gray-300 rounded w-full max-h-[23rem] overflow-y-auto list-inside p-0">
                @foreach($results as $result)
                    <li wire:click="selectResult('{{ $result }}')" class="px-4 py-2 border-b border-red">{{ $result }}</li>
                   
                @endforeach
            </ul>
        @endif
    </div>
</div>


