<?php

use App\Http\Controllers\MoviesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TvController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::redirect('/movies', '/en');

// Route::group(['prefix' => 'locale'], function () {
    
// });
        Route::get('/', [MoviesController::class,'index'])->name('movies.index');
        Route::get('/movies/{id}', [MoviesController::class,'show'])->name('movies.show');

        Auth::routes();

        Route::get('/tv', [TvController::class,'index'])->name('tv.index');
        Route::get('/tv/{id}', [TvController::class,'show'])->name('tv.show');
// Route::get('/test', function() {
//     App::setLocale('ar');
//     if(App::isLocal('ar')) {
//       dd(App::getLocale());  
//     }
// });