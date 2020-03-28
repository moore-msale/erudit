<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use App\Certificate;
use App\Discount;
use App\Genre;
use App\Promo;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        $books = Book::all();
        $genres = Genre::all();
        $categories = Category::all();
        return view('pages.catalog',['books' => $books, 'genres' => $genres, 'categories' => $categories]);
    }

    public function genre(Genre $genre)
    {
        $genres = Genre::all();
        $books = Book::where('genre_id','=',$genre->id)->get();

        return view('pages.catalog',['books' => $books, 'genres' => $genres]);
    }

    public function category(Category $category)
    {
        $categories = Category::all();
        $books = Book::where('category_id', '=', $category->id)->get();

        return view('pages.catalog',['books' => $books, 'categoryes' => $categories]);
    }

    public function check(Request $request)
    {

        if($request->type == 1)
        {

            $item = Promo::where('promo',$request->discount)->where('active',null)->first();
//            dd($item);
        }
        if($request->type == 2)
        {
            $item = Certificate::where('name',$request->discount)->where('active',null)->first();

        }
        if($request->type == 3)
        {
            $item = Discount::where('name', $request->discount)->where('active',null)->first();
        }


        if ($item)
        {
            $check = 1;
        }
        else
        {
            $check = 0;
        }

        return response()->json([
            'status' => 'success',
            'item' => $item,
            'check' => $check,
        ]);
    }

}
