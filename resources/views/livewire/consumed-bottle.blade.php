<div class="flex justify-center items-center h-screen">
    <div class="w-full max-w-sm p-4 bg-white shadow-lg rounded-lg flex flex-col items-center">
        @if (session()->has('message'))
            <div class="mb-4 text-green-500">{{ session('message') }}</div>
        @endif

        <form wire:submit.prevent="store">
            @csrf

            <div class="mb-4">
                <label for="note" class="block text-sm font-medium text-gray-700" ></label>
                <textarea name="" id="" cols="30" rows="10"  wire:model="note" id="note" aria-placeholder="note" placeholder="écrivez votre commentaire" class="w-full px-3 py-2 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500"></textarea>

                @error('note') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="w-full px-4 py-2 mt-4 font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                envoyer
            </button>
        </form>
        <a href="{{ route('singleCellar', ['cellar_id' => $cellar_id] ) }}" class="text-sm mt-6 underline">retourner à mes celliers</a>
    </div>
</div>