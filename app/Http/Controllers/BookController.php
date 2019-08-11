<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function bookpage(Book $book)
    {
        $sames = Book::where('genre_id', $book->genre_id)->get();

        return view('pages/book_page',['book' => $book, 'sames' => $sames]);
    }
}
