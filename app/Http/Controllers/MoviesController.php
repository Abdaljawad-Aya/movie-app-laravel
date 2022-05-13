<?php

namespace App\Http\Controllers;

use App\ViewModels\MoviesViewModel;
use App\ViewModels\MovieViewModel;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{
    public function index()
    {

        $popularMovies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/popular')
            ->json()['results'] ?? null;


        $nowPlaying = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/now_playing')
            ->json()['results'];

        $genres = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/genre/movie/list')
            ->json()['genres'];
        // $genres = collect($genresArray)->mapWithKeys(function ($genre) {
        //     return [$genre['id'] => $genre['name']];
        // });

        $viewModel = new MoviesViewModel(
            $popularMovies,
            $nowPlaying,
            $genres
        );
        return view('index', $viewModel);
        // return view('index', [
        //     // three endpoints
        //     'popularMovies' => $popularMovies,
        //     'nowPlaying' => $nowPlaying,
        //     'genres'   => $genres
        // ]);
    }

    public function show($id)
    {
        $popular = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/' . $id . '?append_to_response=credits,videos,images')
            ->json();
        // dump($popular);  
        $viewModel = new MovieViewModel($popular);
        
        return view('show', $viewModel);
    }
}
