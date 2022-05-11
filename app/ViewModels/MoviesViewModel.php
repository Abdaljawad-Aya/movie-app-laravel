<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class MoviesViewModel extends ViewModel
{
    public $popularMovies;
    public $nowPlaying;
    public $genres;
    public function __construct($popularMovies, $nowPlaying, $genres)
    {
        $this->popularMovies = $popularMovies;
        $this->nowPlaying    = $nowPlaying;
        $this->genres        = $genres;
    }

    public function popularMovies()
    {
        return $this->formatMovies($this->popularMovies);
    }

    public function nowPlaying()
    {
        return $this->formatMovies($this->nowPlaying);
    }


    // this is a way for not repeating code 
    private function formatMovies($popular)
    {
//         @foreach ($popular['genre_ids'] as $genre){{ $genres->get($genre) }}@if(!$loop->last), @endif
// @endforeach
        return collect($popular)->map(function ($popular) {
        
            $genreFormatted = collect($popular['genre_ids'])->mapWithKeys(function($value){
                return [$value => $this->genres()->get($value)];
            })->implode(', ');

            return collect($popular)->merge([
                'poster_path'  => 'https://image.tmdb.org/t/p/w500/' . $popular['poster_path'],
                'vote_average' =>  $popular['vote_average'] * 10 . '%',
                'release_date' =>  Carbon::parse($popular['release_date'])->format('M d, Y'),
                'genres'       => $genreFormatted, 
            ])->only([
                'poster_path', 'id', 'genre_ids', 'title', 'vote_average','release_date','genres','overview',
            ]);
        });
    }
    public function genres()
    {
        return collect($this->genres)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
    }
}
