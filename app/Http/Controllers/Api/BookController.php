<?php

namespace App\Http\Controllers\Api;

use App\Book;
use App\Genre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\ModelFilters\BookFilter;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $books = Book::all()->sortByDesc('id')->filterCollection($request)->paginate(15);
//        $genres = Genre::all()->where()
//        $books = DB::table('books')->filterCollection($request)->paginate(15);

//        dd($books);
        return
            response()->json([
            'html' => view('api.books',
                [
                'books' => $books,

            ])->render(),
            'books' => $books,
            'count' => count($books),
            'filters' => $request->query->all(),
        ]);
    }
}
