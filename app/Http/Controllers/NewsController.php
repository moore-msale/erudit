<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index()
    {
        $news = News::all()->reverse();

        return view('pages.news',['news' => $news]);
    }

    public function show(News $news)
    {
        return view('pages.news_page',['news' => $news]);
    }
}
