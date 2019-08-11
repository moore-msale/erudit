<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        $books = Book::paginate(9);
        return view('pages.catalog',['books' => $books]);
    }

}
