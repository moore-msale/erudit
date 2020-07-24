<?php

namespace App\Http\Controllers\Api;

use App\Genre;
use App\Genres;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GenreController extends Controller
{
    public function index(Request $request)
    {
//        dd('genre');
        $genre = Genres::all()->filterGenreCollection($request);
//        dd('genre');
//        $genres = Genre::all()->where()

//        dd($books);
        return response()->json([
            'genre' => $genre,
            'filters' => $request->query->all(),
        ]);
    }
}
