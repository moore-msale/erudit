<?php

namespace App\Http\Controllers\Api;

use App\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $books = Book::all()->sortByDesc('id')->filterCollection($request)->paginate(15);

        return response()->json([
            'html' => view('api.books', [
                'books' => $books,
            ])->render(),
            'books' => $books,
            'filters' => $request->query->all(),
        ]);
    }
}
