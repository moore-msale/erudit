<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome',['bestsellers' => \App\Book::where('bestseller',1)->get(), 'news' => \App\News::paginate(3)->reverse(), 'genres' => \App\Genre::all(), 'books' => \App\Book::all()]);
    }
}
