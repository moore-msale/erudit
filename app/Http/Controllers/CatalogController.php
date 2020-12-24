<?php

namespace App\Http\Controllers;

use App\Book;
use App\Cart;
use App\Category;
use App\Certificate;
use App\Discount;
use App\Genre;
use App\Promo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatalogController extends Controller
{
    public function index()
    {
        $books = DB::table('books')->select('*')->get()->sortBy('recommend');
        $genres = DB::table('general_genre')->select('*')->get();
        $categories = DB::table('categories')->select('*')->get()->sortBy('name');
        return view('pages.catalog',['books' => $books, 'genres' => $genres, 'categories' => $categories]);
    }

    public function genre(Genre $genre)
    {
        $genres = Genre::all()->sortBy('name');
        $categories = Category::all();
        $books = DB::table('books')
            ->select('*')
            ->join('book_genre', 'books.id', '=', 'book_genre.book_id')
            ->where('book_genre.genre_id', '=', $genre->id)->get();

        return view('pages.catalog',['books' => $books, 'genres' => $genres, 'categories' => $categories]);
    }

    public function category(Category $category)
    {
        $categories = Category::all();
        $books = Book::where('category_id', '=', $category->id)->get();
        $genres = Genre::all()->sortBy('name');
        return view('pages.catalog',['books' => $books, 'genres' => $genres, 'categories' => $categories]);
    }

    public function check(Request $request)
    {

        if($request->type == 1)
        {
            if ($request->phone == null or $request->phone == ''){
                $item = 'none';
            }else{
                $item = Promo::where('promo',$request->discount)->where('active',null)->orWhere('promo',$request->discount)->where('active',0)->first();
                $find_cart = Cart::where('promo', $item->promo)->where('phone', $request->phone)->first();
//                dd($find_cart != null);
                if ($find_cart != null){
                    $item = null;
                }
//            dd($item);
            }

        }
        if($request->type == 2)
        {
            $item = Certificate::where('name',$request->discount)->where('active',null)->orWhere('name',$request->discount)->where('active',0)->first();

        }
        if($request->type == 3)
        {
            $item = Discount::where('name', $request->discount)->where('active',null)->orWhere('name',$request->discount)->where('active',0)->first();
        }

        if ($item == "none")
        {
            $check = 'none';
        }
        else if ($item)
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
