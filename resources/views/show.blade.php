@extends('layout.app')

@section('content')
<div class="movie-info border-b border-gray-800">
    <div class="container mx-auto px-12 py-16 flex flex-col md:flex-row">
        <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$popular['poster_path'] }}" class="w-64 md:w-96" alt="">
        <div class="md:ml-24 ">
            <h2 class="text-4xl font-semibold">{{ $popular['title'] }}</h2>
            <div class="flex flex-wrap items-center text-gray-400 text-sm mt-1">
                <svg class="w-6 h-6 fill-current text-orange-500 w-4" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                    </path>
                </svg>
                <span class="ml-1">{{ $popular['vote_average'] * 10 . '%' }}</span>
                <span class="mx-2">|</span>
                <span>{{ \Carbon\Carbon::parse($popular['release_date'])->format('M d, Y') }}</span>
                <span class="text-gray-400 text-sm">
                    @foreach ($popular['genres'] as $genre )
                    {{-- we only want the commas if its not the last iteration --}}
                    {{ $genre['name'] }}@if(!$loop->last), @endif
                    @endforeach
                </span>
            </div>

            <p class="text-gray-300 mt-8">
                {{ $popular['overview'] }}
            </p>

            <div class="mt-12">
                <h4 class="text-white font-semibold">Featured Cast</h4>
                <div class="flex mt-4">
                    @foreach ($popular['credits']['crew'] as $crew)
                    @if ($loop->index < 2) <div class="mr-8">
                        <div>{{ $crew['name'] }}</div>
                        <div class="text-sm text-gray-400">{{ $crew['job'] }}</div>
                </div>
                @endif
                @endforeach
            </div>
        </div>

        {{-- if there is result of videos then show if there is no results don't render--}}
        @if (count($popular['videos']['results']) > 0)

        <div class="mt-12">
            <a href="https://youtube.com/watch?v={{ $popular['videos']['results'][0]['key'] }}"
                class="flex inline-flex items-center bg-orange-500 text-gray-900  font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="ml-2">Play Trailer</span>
            </a>
        </div>
        @endif
    </div>
</div>
</div>

{{-- <div class="movie-cast border-b border-gray-800">
    <div class="container mx-auto px-12 py-16">
        <h2 class="text">Cast</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid:cols-3 lg:grid-cols-5 gap-16">
            <div class="mt-8">
                <a href="#">
                    <img src="{{ }}" alt="test" class="hover:opacity-75 transition ease-in-out duration-150">
                </a>
                <div class="mt-2">
                    <a href="#" class="text-lg mt-2 hover:text-gray:300">Test</a>
                    <div class="flex items-center text-gray-400 text-sm mt-1">
                        <svg class="w-6 h-6 fill-current text-orange-500 w-4" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                            </path>
                        </svg>
                        <span class="ml-1">85%</span>
                        <span class="mx-2">|</span>
                        <span>Feb 20, 2020</span>
                    </div>
                    <div class="text-gray-400">
                        Action, Thriller, Comdey
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection