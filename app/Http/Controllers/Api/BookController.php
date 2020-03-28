<?php

namespace App\Http\Controllers\Api;

use App\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function index(Request $request)
    {
//        dd($request->all());
        $books = Book::all()->sortByDesc('id')->filterCollection($request)->paginate(15);
//        dd($books);
        return response()->json([
            'html' => view('api.books', [
                'books' => $books,
            ])->render(),
            'books' => $books,
            'count' => count($books),
            'filters' => $request->query->all(),
        ]);
    }
}
