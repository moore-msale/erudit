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
        $books = Book::where('genre_id', null)->get();

        foreach ($books as $book)
        {
            if($book->attributes && $book->pages)
            {
                $genre = Genre::where('name', $book->attributes)->get()->first();

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
    public function delete_duplicate()
    {
        $books = Book::all();
        foreach ($books as $book)
        {
            $duplicates = Book::where('name',$book->name)->get();
            if(count($duplicates) > 1)
            {
                $count = 1;
                foreach ($duplicates as $duplicate)
                {
                    if ($count == 1)
                    {
                        $count = 2;
                        continue;
                    }
                    else
                    {
                        $duplicate->delete();
                    }
                }
            }
        }
    }

    public function site_sort()
    {
        $books = Book::where('genre_id', null)->get();
        foreach ($books as $book)
        {
            $lower = mb_strtolower($book->attributes);
            if (stristr($lower, 'фанта') == true && stristr($lower, 'фэнтэз') == true && stristr($lower, 'фентез') == true ) {
                $genre = Genre::where('name', 'Фантастика')->get()->first();
                if ($genre) {
                    $book->genre_id = $genre->id;
                    $book->save();
                    continue;
                } else {
                    $genre = new Genre();
                    $genre->name = 'Фантастика';
                    $genre->save();
                    $book->genre_id = $genre->id;
                    $book->save();
                    continue;
                }
            }
            if (stristr($lower, 'англ') == true)
            {
                $genre = Genre::where('name', 'Книги на английском')->get()->first();
                if($genre) {
                    $book->genre_id = $genre->id;
                    $book->save();
                    continue;
                }
                else
                {
                    $genre = new Genre();
                    $genre->name = 'Книги на английском';
                    $genre->save();
                    $book->genre_id = $genre->id;
                    $book->save();
                    continue;
                }
            }
            if (stristr($lower, 'класси') == true && stristr($lower, 'литера') == true)
            {
                $genre = Genre::where('name', 'Классическая литература')->get()->first();
                if($genre) {
                    $book->genre_id = $genre->id;
                    $book->save();
                    continue;
                }
                else
                {
                    $genre = new Genre();
                    $genre->name = 'Классическая литература';
                    $genre->save();
                    $book->genre_id = $genre->id;
                    $book->save();
                    continue;
                }
            }
            if (stristr($lower, 'дизайн') == true && stristr($lower, 'интерьер') == true && stristr($lower, 'архитек') == true)
            {
                $genre = Genre::where('name', 'Дизайн и архитектура')->get()->first();
                if($genre) {
                    $book->genre_id = $genre->id;
                    $book->save();
                    continue;
                }
                else
                {
                    $genre = new Genre();
                    $genre->name = 'Дизайн и архитектура';
                    $genre->save();
                    $book->genre_id = $genre->id;
                    $book->save();
                    continue;
                }
            }
            if (stristr($lower, 'детектив') == true )
            {
                $genre = Genre::where('name', 'Детективы')->get()->first();
                if($genre) {
                    $book->genre_id = $genre->id;
                    $book->save();
                    continue;
                }
                else
                {
                    $genre = new Genre();
                    $genre->name = 'Детективы';
                    $genre->save();
                    $book->genre_id = $genre->id;
                    $book->save();
                    continue;
                }
            }
            if (stristr($lower, 'детей') == true && stristr($lower, 'детск') == true)
            {
                $genre = Genre::where('name', 'Детские')->get()->first();
                if($genre) {
                    $book->genre_id = $genre->id;
                    $book->save();
                    continue;
                }
                else
                {
                    $genre = new Genre();
                    $genre->name = 'Детские';
                    $genre->save();
                    $book->genre_id = $genre->id;
                    $book->save();
                    continue;
                }
            }
            if (stristr($lower, 'комикс') == true)
            {
                
            }
        }
    }
}
