<?php

namespace App\Http\Controllers;

use App\Book;
use App\Stock;
use Illuminate\Http\Request;

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
        }
        else
        {
            $stock = new Stock();
        }

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
            $books = Book::where('genre_id',$request->category)->get();

            $stock->books()->sync($books);

            foreach ($books as $book)
            {
                $book->discount = $stock->discount;
                $book->save();
            }
        }
            $stock->save();

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
        $books = Book::where('genre_id', $request->category)->get();

        $view = view('stocks.includes.books', ['books' => $books])->render();

        return response()->json([
            'view' => $view,
        ]);
    }
}
