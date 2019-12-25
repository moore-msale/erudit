<?php

namespace App\Http\Controllers;

use App\Book;
use App\Genre;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function show(Book $book)
    {
        $sames = Book::where('genre_id', $book->genre_id)->get()->take(4)->reverse();
        return view('books/show', [
            'book' => $book,
            'sames' => $sames
        ]);
    }

    public function genre_sort()
    {
        $books = Book::where('genre_id', null);

        foreach ($books as $book)
        {
            if($book->attributes && $book->pages)
            {
                $genre = Genre::where('name', $book->attributes);

                if($genre)
                {
                    $book->genre_id = $genre->id;
                    $book->save();
                }
                else
                {
                    $genre = new Genre();
                    $genre->name = $book->attributes;
                    $genre->save();
                    $book->genre_id = $genre->id;
                    $book->save();
                }
            }
        }
    }

    public function site_sort()
    {
        $books = Book::all();

        foreach ($books as $book)
        {
            $book->site = 'labirint';
            $book->save();
        }
    }
}
