<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class MovieViewModel extends ViewModel
{
    public $popular;
    public function __construct($popular)
    {
        $this->popular = $popular;
    }

    public function popular() {

        return collect($this->popular)->merge([
            'poster_path'  => 'https://image.tmdb.org/t/p/w500/' . $this->popular['poster_path'],
            'vote_average' =>  $this->popular['vote_average'] * 10 . '%',
            'release_date' =>  Carbon::parse($this->popular['release_date'])->format('M d, Y'),
            'genres'       =>  collect($this->popular['genres'])->pluck('name')->flatten()->implode(', '),
            'crew'         =>  collect($this->popular['credits']['crew'])->take(2)
        ])->only([
             'poster_path', 'id', 'title', 'vote_average','release_date','genres','overview','videos','crew','images',

        ]);
    }
}
