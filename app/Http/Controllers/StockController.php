<?php

namespace App\Http\Controllers;

use App\Book;
use App\Stock;
use Doctrine\DBAL\Schema\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    public function create()
    {
        return view('stocks.create');
    }

    public function store(Request $request)
    {
        if(isset($request->id))
        {
            $stock = Stock::find($request->id);
//            dd($stock);
        }
        else
        {
            $stock = new Stock();
//            dd($stock);
        }
//        dd($request,'gg');
        $stock->name = $request->desc;
        $stock->date = $request->date;
        $stock->discount = $request->discount;

        if ($file = $request->file('image')) {
            $name = mb_strtolower("stocks/" . 'stockstype'. rand(1,1400) . '.png');
            if ($file->move('stocks', $name)) {
                $stock->image = $name; //remane img_path
                $stock->save();
            }
        }
        $stock->save();
        if ($request->type == 1)
        {
            $stock->type = $request->type;
            $stock->category = $request->category;


        $items = $request->items;
        $books = Book::find($items);

        if($stock->books)
        {
            foreach ($stock->books as $book) {
                $book->discount = null;
                $book->save();
            }
        }

        if($request->items){
            if ($bookssync = $request->items) {
                $stock->books()->sync($bookssync);
            }
            foreach ($books as $book)
            {
                $book->discount = $stock->discount;
                $book->save();
            }
        }

        elseif ($request->category)
        {
//            $books = Book::where('genre_id',$request->category)->get();
            $cons = [];
            $i = [];

            $genre = DB::table('genres')
                ->select('id')
                ->where('general_id', '=', $request->category)->get();
            foreach ($genre as $key=>$items){
                foreach ($items as $key_value=>$value){
                    array_push($cons, $value);
                }

            }

            $book_id = DB::table('books')
                ->select('*')
                ->join('book_genre', 'books.id', '=', 'book_genre.book_id')
                ->whereIn('book_genre.genre_id',$cons)->get();


            foreach ($book_id as $key=>$item){
                foreach ($item as $key_value_2=>$value_2){
                    if ($key_value_2 == 'isbn'){
                        array_push($i, $value_2);
                    }
                }
            }

            $books = Book::whereIn('isbn', $i)->get();

            $stock->books()->sync($books);

            foreach ($books as $book)
            {
                $book->discount = $stock->discount;
                $book->save();
            }
        }
            $stock->save();

        }elseif ($request->ula){
            $books = Book::all();
            foreach ($books as $book)
            {
                $book->discount = $stock->discount;
                $book->save();
            }
        }
        return redirect()->route('stock_edit', $stock->id);
    }

    public function edit($id)
    {
        $stock = Stock::find($id);

        return view ('stocks.create',['stock' => $stock]);
    }

    public function delete($id)
    {
        $stock = Stock::find($id);
        $books = $stock->books;

        foreach ($books as $book)
        {
            $book->discount = null;
            $book->save();
        }

        $stock->delete();

        return redirect()->route('user.index');
    }


    public function stock_type(Request $request)
    {
        if($request->type == 1)
        {
            $view = view('stocks.includes.genres')->render();

            return response()->json([
                'view' => $view,
            ]);
        }
    }

    public function stock_category(Request $request)
    {
        $cons = [];
        $i = [];

        $genre = DB::table('genres')
            ->select('id')
            ->where('general_id', '=', $request->category)->get();
        foreach ($genre as $key=>$items){
            foreach ($items as $key_value=>$value){
                array_push($cons, $value);
            }

        }

        $book_id = DB::table('books')
            ->select('*')
            ->join('book_genre', 'books.id', '=', 'book_genre.book_id')
            ->whereIn('book_genre.genre_id',$cons)->get();


            foreach ($book_id as $key=>$item){
                foreach ($item as $key_value_2=>$value_2){
                    if ($key_value_2 == 'isbn'){
                        array_push($i, $value_2);
                    }
                }
            }

        $books = Book::whereIn('isbn', $i)->get();

        $view = view('stocks.includes.books', ['books' => $books])->render();

        return response()->json([
            'view' => $view,
        ]);
    }
}
