<div class="relative mt-3 md:mt-0" x-data="{ isOpen: true}" @click.away="isOpen = false">
    <input wire:model.debounce.500ms="search" 
           type="text" 
           id="search-navbar" 
           class="block p-2 pl-10 w-full text-gray-900 bg-blue-200
                  border border-gray-300 sm:text-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 
                  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 
                  focus:outline-none focus:shadow-outline"
           placeholder="Search..."
           x-ref="search"
           @keydown.window="
             if(event.keyCode == 191) {
                 event.preventDefault();
                 $refs.search.focus();
             }
           "
           @focus="isOpen = true"
           @keydown="isOpen = true"
           @keydown.escape.window="isOpen = false"
           @keydown.shift.tab="isOpen = false"
           >
    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none ">
        <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                clip-rule="evenodd"></path>
        </svg>
    </div>

    {{-- Search drop down --}}
    <div wire:loading class="spinner top-0 right-0 mr-4 mt-3"></div>
  
    @if (strlen($search) >= 2)
    <div class="z-50 absolute bg-blue-800 text-sm w-full mt-4" 
        x-show.transition.opacity="isOpen"
        @keydown.escape.window="isOpen = false"
    >
        @if ($searchResults->count() > 0)

        <ul>
            @foreach ($searchResults as $res)
            <li class="border-b border-gray-700">
                <a 
                   href="{{ route('movies.show', $res['id']) }}" 
                   class="block hover:bg-gray-700 px-3 py-3 flex items-center transition ease-in-out duration-150"
                   @if ($loop->last) @keydown.tab="isOpen = false" @endif
                   >
                @if ($res['poster_path'])
                   <img src="http://image.tmdb.org/t/p/w92/{{ $res['poster_path'] }}" alt="poster" class="w-8">  
                   @else 
                     <img src="http://via.placeholder.com/50x75" alt="poster" class="w-8">
                @endif
                   <span class="ml-4">{{ $res['title'] }}</span>  
                </a>
            </li>
            @endforeach
        </ul>
        @else
        <div class="px-3 py-3">No results for "{{ $search }}"</div>
        @endif
    </div>
    @endif
</div>