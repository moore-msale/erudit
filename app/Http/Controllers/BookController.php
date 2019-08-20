<?php

namespace App\Http\Controllers;

use App\Book;
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
}
