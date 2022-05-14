@extends('layout.app')
@section('content')
<div class="container mx-auto px-16 pt-16">
   <div class="popular-movies">
      <h2 class="uppercase tracking-wider text-blue-100 text-lg font-semibold">{{ __('most watched') }}</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid:cols-3 lg:grid-cols-5 gap-16">@foreach($popularMovies as $popular)<x-movie-card :popular="$popular" :genres="$genres" />
         @endforeach
      </div>
   </div>
   <div class="now-playing-movies py-24">
      <h2 class="uppercase tracking-wider text-blue-100 text-lg font-semibold">{{ __('now playing') }}</h2>
      {{-- :genres="$genres" --}}
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid:cols-3 lg:grid-cols-5 gap-16">@foreach ($nowPlaying as $popular)<x-movie-card :popular="$popular"  />
         @endforeach
      </div>
   </div>
</div>
@endsection