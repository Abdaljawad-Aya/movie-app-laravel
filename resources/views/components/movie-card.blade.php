<div class="mt-8">
    <a href="{{ route('movies.show', $popular['id']) }}">
        <img src="{{ $popular['poster_path'] }}" alt="poster"
            class="hover:opacity-75 transition ease-in-out duration-150"></a>
    <div class="mt-2">
        <a href="{{ route('movies.show', $popular['id']) }}" class="text-lg mt-2 hover:text-gray:300">{{
            $popular['title'] }}</a>
        <div class="flex items-center text-gray-400 text-sm mt-1">
            <svg class="w-6 h-6 fill-current text-orange-500 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
            <span class="ml-1">{{ $popular['vote_average'] }}</span>
            <span class="mx-2">|</span>
            <span>{{ $popular['release_date'] }}</span>
        </div>
    </div>{{-- we only want the commas if its not the last iteration --}}
    <div class="text-gray-400 text-sm">{{ $popular['genres'] }}</div>
</div>