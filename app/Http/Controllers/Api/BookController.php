<?php

namespace App\Http\Controllers\Api;

use App\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $books = Book::all()->filterCollection($request);

        return response()->json([
            'html' => view('api.books', [
                'books' => $books,
            ])->render(),
            'filters' => $request->query->all(),
        ]);
    }
}
