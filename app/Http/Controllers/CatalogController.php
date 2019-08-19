<?php

namespace App\Http\Controllers;

use App\Book;
use App\Genre;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        $books = Book::paginate(9);
        $genres = Genre::all();
        return view('pages.catalog',['books' => $books, 'genres' => $genres]);
    }

    public function genre(Genre $genre)
    {
        $genres = Genre::all();
        $books = Book::where('genre_id','=',$genre->id)->get();

        return view('pages.catalog',['books' => $books, 'genres' => $genres]);
    }

}
